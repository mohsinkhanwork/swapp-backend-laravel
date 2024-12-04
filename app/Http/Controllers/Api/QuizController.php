<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuizTestResource;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class QuizController extends ApiController
{
    public function quiz(Skill $skill)
    {
        try {
            $user = Auth::user();
            $lang = App::getLocale() ?? 'en';
            // Fetch passing criteria
            $passingPercentage = getSettingValue("skill-passing-percentage");

            $user_skill = $user->skills()->where('skill_id', $skill->id)->first();
            if (!$user_skill) {
                return $this->successResponseWithoutData(__('api.quiz.add-skill'));
            }

            //* Check if the user has already performed the test
            if ($user_skill->pivot->status == 1) {
                return $this->successResponse([
                    'passing_percentage' => $passingPercentage
                ],__('api.quiz.already-passed'));
            }

            //* Check if the user can retry the quiz
            $retry_exam_interval = $user->plan->retry_exam_duration;
            if ($user_skill->pivot->status == 2 && $user_skill->pivot->updated_at > now()->subHours($retry_exam_interval)) {
                $lastParticipation = strtotime($user_skill->pivot->updated_at);
                $currentTime = time();
                $timeDifference = $currentTime - $lastParticipation;
                $retryInterval = $retry_exam_interval * 3600;
                $remainingTime = $retryInterval - $timeDifference;
                $remainingHours = floor($remainingTime / 3600);
                $remainingMinutes = floor(($remainingTime % 3600) / 60);
                return $this->successResponse([
                    'passing_percentage' => $passingPercentage
                ], __('api.quiz.retry', ['remainingHours' => $remainingHours, 'remainingMinutes' => $remainingMinutes]));
            }

            $questions = Question::where('skill_id', $skill->id)
                ->where('language', $lang)
                ->with('answers')
                ->take(10)
                ->inRandomOrder()
                ->get();

            return $this->successResponse([
                'questions' => QuestionResource::collection($questions),
                'passing_percentage' => $passingPercentage
            ]);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function submitQuiz(Request $request, Skill $skill)
    {
        $request->validate([
            'answers' => ['required', 'array', 'min:1'],
        ]);
        try {
            $user = Auth::user();
            $user_skill = $user->skills()->where('skill_id', $skill->id)->first();
            if (!$user_skill) {
                return $this->errorResponse('Please add this skill in your profile to participate in this quiz', 400);
            }
            DB::beginTransaction();
            $total = count($request->answers);
            $questions = $skill->questions()->pluck('id')->toArray();
            $correct_answers = Answer::whereIn('id', $request->answers)
                ->whereIn('question_id', $questions)
                ->where('is_correct', true)
                ->count();
            $passing_percentage = getSettingValue("skill-passing-percentage");
            $percentage = ceil(($correct_answers / $total) * 100);
            $status = $percentage >= $passing_percentage ? 1 : 0;

            $quiz_test = $user->quizTests()->create([
                'skill_id' => $skill->id,
                'passed' => $status,
                'total_questions' => $total,
                'correct_answers' => $correct_answers,
                'result' => $percentage
            ]);
            $user->skills()->updateExistingPivot($skill->id, [
                'status' => $status ? 1 : 2
            ]);
            DB::commit();
            return $this->successResponse(new QuizTestResource($quiz_test));
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->serverException($th);
        }
    }

    public function quizList()
    {
        $user = Auth::user();
        $userSkills = Skill::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->withCount('questions')
            ->with(['quizTests' => function ($query) use ($user) {
                $query->where('user_id', $user->id);
            }])
            ->get()
            ->map(function ($skill) use ($user) {
                $quizTest = $skill->quizTests->first();
                $status = $quizTest ? $quizTest->passed : null;

                return [
                    'skill_id' => $skill->id,
                    'skill_name_en' => $skill->title_en,
                    'skill_name_tr' => $skill->title_tr,
                    'total_questions_for_skill' => $skill->questions_count,
                    'result' => $quizTest ? $quizTest->result : null,
                    'passed' => $status == 1 ? 'Passed' : ($quizTest && $status == 0 ? 'Failed' : ''),
                    'total_questions' => $quizTest ? $quizTest->total_questions : null,
                    'correct_answers' => $quizTest ? $quizTest->correct_answers : null,
                    'is_available' => $quizTest ? true : false,
                ];
            });

        return $this->successResponse($userSkills);
    }
}
