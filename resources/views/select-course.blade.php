@extends('layouts.app')
@section('content')
<div class="relative flex items-top justify-center min-h-screen col-md-12">


    <div class="container-contact100" style="margin-top: 4%;">
        <div class="wrap-contact100">
            <div class="contact100-form validate-form" id="form">
                @if(!$courses->isEmpty())
                <span class="contact100-form-title" style="color: steelBlue;">
                    Please Select a course to take exam
                </span>
                <form action="/students/{{auth()->user()->student->id}}/exam" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Select Course</label>

                        <div class="col-md-8 mb-5">
                            <select class="form-control" name="title" required>
                                <option selected disabled value="">Select Course</option>
                                @foreach($courses as $course)
                                <option value="{{$course->title}}">{{$course->title ?? ''}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="container-contact100-form-btn">
                            <a href="/students/{{auth()->user()->id}}/exam">
                                <button class="contact100-form-btn" id="submit" value="submit" type="submit">
                                    <span>
                                        Start Exam
                                        <i class="zmdi zmdi-arrow-right m-l-8"></i>
                                    </span>
                                </button>
                        </div>
                        </a>
                    </div>
                </form>
                @else
                <div class="col-md-12 text-center">
                    <h4 class="mb-3" style="text-align: center; font-size: 35px;">No Exam Is Ready!! <br><span class="text-primary mt-5" style="font-size: 20px;">Contact Admins For Examination Time</span></h4>
                    <div class="container-contact100-form-btn mt-5">
                        <a href="/home">
                            <button class="contact100-form-btn">
                                <span>
                                    Dismiss
                                    <i class="zmdi zmdi-arrow-right m-l-8"></i>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>

                @endif
            </div>
        </div>
    </div>
    @endsection