<?php

namespace App\TheoryMarker;

use App\Models\User;
use App\Models\Result;
use App\Models\Question;
use App\Models\Submission;
use Doctrine\Inflector\Language;
use Doctrine\Inflector\Inflector;
use Doctrine\Inflector\InflectorFactory;

class SubmissionService
{

    public function markExam(array $answers, $course): float{
        $totalMarks = 0;

        foreach ($answers['data'] as $key => $answer) {
            $marksObtained = $this->markQuestion($answer['question']['id'], $answer['answer']);

            $totalMarks += $marksObtained;
        }
        Result::create([
            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'reg_no' => auth()->user()->student->reg_no,
            'course_title' => $course,
            'score' => $totalMarks
        ]);


        return $totalMarks;
    }
    public function markQuestion(int $questionId, string $answer): float
    {
        //get question
        $question = Question::find($questionId);
        $answers = json_decode($question->answers);
        $marksObtained = 0;

        foreach ($answers as $partAnswer) {

            $partAnswerOptions = explode(';', $partAnswer->answer);

            foreach ($partAnswerOptions as $option) {

                if ($this->findInAnswer($option, $answer)) {
                    $marksObtained += $partAnswer->mark;
                    break;
                }
            }
        }
        Submission::create([
            'user_id' => auth()->user()->id,
            'question_id' => $questionId,
            'answer' => $answer,
            'marks' => $marksObtained
        ]);




        $marksObtained = $marksObtained > $question->marks_obtainable ? $question->marks_obtainable : $marksObtained;
return $marksObtained;
        //return ['mark' => $marksObtained, 'total' => $question->marks_obtainable];
    }

    public function findInAnswer(string $keyPhrase, string $answer): bool
    {
        $keyPhrase = trim($keyPhrase);
        $foundDirectly = stristr($answer, $keyPhrase);

        $inflector = InflectorFactory::createForLanguage(Language::ENGLISH)->build();

        $foundAlternative = false;
        $keyPhraseArray = explode(' ', $keyPhrase);
        $wordCount = count($keyPhraseArray);
        if ($wordCount > 1) {
            //adds articles 'a', 'an', 'the', 'some' and 'any' to two word answers
            $lastWord = $keyPhraseArray[$wordCount - 1];
            $alternatives = [];
            $articles = ['a', 'an', 'the', 'some', 'any', 'on'];

            foreach ($articles as $article) {
                $keyPhraseArray[$wordCount - 1] = $article;
                $keyPhraseArray[$wordCount] = $inflector->singularize($lastWord);
                $alternatives[] = implode(' ', $keyPhraseArray);

                $keyPhraseArray[$wordCount] = $inflector->pluralize($lastWord);
                $alternatives[] = implode(' ', $keyPhraseArray);
            }
            foreach ($alternatives as $alternative) {
                $foundAlternative = stristr($answer, $alternative);
                if ($foundAlternative) {
                    break;
                }
            }
        } else {
            //check for singular and plural forms of words

            $alternative = $inflector->pluralize($keyPhrase);
            $foundAlternative = stristr($answer, $alternative);

            if (!$foundAlternative) {
                //in any case the word was already plural
                $alternative = $inflector->singularize($keyPhrase);
                $foundAlternative = stristr($answer, $alternative);
            }
        }


        return $foundDirectly || $foundAlternative;
    }
}
