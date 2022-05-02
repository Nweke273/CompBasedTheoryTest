<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function course()
    {
        $courses = Course::all();
        return view('select-course')
        ->with('courses',$courses);
    }

    public function questions(Request $request)
    {  
        //$result = Result::where('user_id', auth()->user()->id)
    //     ->where('course_title', $request['title'])
    //     ->where('exam_status','0')->get();
    //     dd($result);
     
        $title = $request['title'];

        $courseResult = Result::where('user_id',auth()->user()->id)
        ->where('course_title',$title)->get();
    //    if (!$courseResult->isEmpty()) {
    //        dd('Has Result');
    //    }
    //    else{
    //        dd('No result');
    //    }
        $course = Course::where('title',$request['title'])->first();
        $examDuration = $course->exam_duration;
        
        $questions = Question::where('course', $title)->get();

        return view('student.test')
            ->with('questions', $questions)
            ->with('title',$title)
            ->with('examDuration',$examDuration)
            ->with('courseResult', $courseResult);
            //->with('currentPage', $currentPage);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $questions = DB::table('questions')->pluck('question');
        $items = array();
        foreach($questions as $question){
            $items[] = $question;
        }
        return view('welcome')->with('items', $items);
    }
}
