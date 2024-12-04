<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizTestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'total_questions'=>$this->total_questions,
            'correct_answers'=>$this->correct_answers,
            'passed'=>$this->passed,
            'result'=>$this->result
        ];
    }
}
