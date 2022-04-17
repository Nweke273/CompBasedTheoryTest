<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Result;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::all();
        return view('lecturer.results')
            ->with('results', $results);
    }

    public function selectCourseForResult(){
        $courses = Course::all();
        return view('course-result')
        ->with('courses',$courses);
    }

    public function studentResult(Request $request)
    { 
        $result = '';
        $response = Gate::inspect('seeResult', User::class);

        if ($response->denied()) {
            return view('exceptions.no-result');
        }

        $result = Result::where('user_id', auth()->user()->id)->first();
        return view('student.result')
            ->with('result', $result);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function resultSearch(Request $request)
    {
        if ($request['keyword']) {
            $keyword = $request['keyword'];
            $results =  Result::where('name', 'LIKE', '%' . $keyword . '%')->orWhere('reg_no', 'LIKE', '%' . $keyword . '%')->get();

            return view('search')
                ->with('results', $results);
        }
    }
}
