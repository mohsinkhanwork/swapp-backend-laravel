<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Imports\ImportSkillQuestion;
use App\Models\Question;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:skill-quiz,admin');
    }

    public function index(Skill $skill){
        $langauge=request('language','en');
        $questions=$skill->questions->where('language',$langauge);
        return view('admin.skills.quiz.index',compact('skill','questions'));
    }

    public function addQuestions(Skill $skill){
        return view('admin.skills.quiz.add-questions',compact('skill'));
    }

    public function storeQuestion(Request $request,Skill $skill){
        $request->validate([
            'question'=>'required',
            'language'=>'required',
            'options'=>['required','array'],
            'correct_answer'=>'required'
        ]);
        try {
            DB::beginTransaction();
                $question=$skill->questions()->create([
                    'text'=>$request->question,
                    'language'=>$request->language
                ]);
                $options=[];
                $count=1;
                foreach($request->options as $option){
                    $options[]=[
                        'text'=>$option,
                        'is_correct'=>$count==$request->correct_answer
                    ];
                    $count++;
                }
                $answers=$question->answers()->createMany($options);
                $question->answers=$answers;
                activity()->causedBy(auth()->user())->performedOn($question)->withProperties($question)->log('Admin added a new quiz question');
            DB::commit();
            return $this->successResponse(new QuestionResource($question));
        } catch (\Throwable $th) {
            return $this->errorResponse('Something went wrong please try again',500);
        }
    }

    public function destroyQuestion(Request $request,Skill $skill){
        $request->validate([
            'id'=>'required'
        ]);
        $question=Question::findOrFail($request->id);
        $question->load('answers');
        $question->delete();
        activity()->causedBy(auth()->user())->performedOn($question)->withProperties($question)->log('Admin deleted a quiz question');
        if($request->wantsJson()){
            return $this->successResponse(null,'Question Deleted Successfully');
        }
        return redirect()->back()->with('success','Question Deleted Successfully');
    }

    public function editQuestion(Skill $skill, Question $question){
        return view('admin.skills.quiz.edit-question',compact('question','skill'));
    }

    public function updateQuestion(Request $request,Skill $skill, Question $question){
        $request->validate([
            'question'=>'required',
            'language'=>'required',
            'options'=>['required','array'],
            'correct_answer'=>'required'
        ]);
        try {
            DB::beginTransaction();
                $question->update([
                    'text'=>$request->question,
                    'language'=>$request->language
                ]);
                $question->answers()->delete();
                $options=[];
                $count=1;
                foreach($request->options as $option){
                    $options[]=[
                        'text'=>$option,
                        'is_correct'=>$count==$request->correct_answer
                    ];
                    $count++;
                }
                $answers=$question->answers()->createMany($options);
                $question->answers=$answers;
                activity()->causedBy(auth()->user())->performedOn($question)->withProperties($question)->log('Admin updated a quiz question');
            DB::commit();
            return redirect()->route('admin.skill-quiz',$skill->id)->with('success','Question Updated Successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['Something went wrong please try again']);
        }
    }

    public function importQuestions(Request $request, Skill $skill){
        $request->validate([
            'file'=>'required'
        ]);
        try {

            $items = Excel::toCollection(new ImportSkillQuestion, $request->file)->first();
            $questions=[];
            foreach($items as $item){
                $questions[]=[
                    'language'=>in_array($item[0],['en','tr'])?$item[0]:'en',
                    'text'=>$item[1],
                    'options'=>[
                        [
                            'text'=>$item[2],
                            'is_correct'=>in_array($item[6],['A','a'])
                        ],
                        [
                            'text'=>$item[3],
                            'is_correct'=>in_array($item[6],['B','b'])
                        ],
                        [
                            'text'=>$item[4],
                            'is_correct'=>in_array($item[6],['C','c'])
                        ],
                        [
                            'text'=>$item[5],
                            'is_correct'=>in_array($item[6],['D','d'])
                        ]
                    ]
                ];
            }
            DB::beginTransaction();
                foreach($questions as $question){
                    $skill_question=$skill->questions()->create($question);
                    $skill_question->answers()->createMany($question['options']);
                }
            DB::commit();
            return redirect()->route('admin.skill-quiz',$skill->id)->with('success','Questions imported successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['something went wrong. please confirm your file format.']);
        }
    }
}
