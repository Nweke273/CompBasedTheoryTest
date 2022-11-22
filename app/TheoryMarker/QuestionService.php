<?php

namespace App\TheoryMarker;

use App\Models\Question;
use Illuminate\Support\Facades\Validator;

class QuestionService
{
    public function addQuestion(array $questionInfo)
    {

        //extract answers and store them in a json fields

        $question = new Question();
        $questionInfo = $questionInfo;

        $this->uploadQuestion($questionInfo, $question);
    }

    public function updateQuestion(array $questionInfo, int $id)
    {
        $question = Question::find($id);
        $questionInfo = $questionInfo;

        $this->uploadQuestion($questionInfo, $question);
    }
    private function uploadQuestion(array $questionInfo, Question $question)
    {
        $question->course = $questionInfo['course'];
        $question->question = $questionInfo['question'];
        $question->marks_obtainable = $questionInfo['marks_obtainable'];
        $answers = [];
        foreach ($questionInfo as $key => $value) {

            $inputParts = explode('_', $key);

            if ($inputParts[0] === "answer") {
                $answers[$inputParts[1]]['answer'] = $value;
            }
            if ($inputParts[0] === "mark") {
                $answers[$inputParts[1]]['mark'] = $value;
            }
        }

        $question->answers = json_encode(array_values($answers));
        $question->save();
        return $question;
    }
    
}
