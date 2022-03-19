@extends('layouts.dashboard')
@section('content')

    <div class="container-contact100" style="margin-top: 4%;">
        <div class="wrap-contact100">
            <div class="contact100-form validate-form" id="form">
                <span class="contact100-form-title" style="color: steelBlue;">
                   You Have Succesfully Submitted Your Test!!
                </span>
                <div class="container-contact100-form-btn">
                    <a href="/students/{{auth()->user()->id}}/result">
                        <button class="contact100-form-btn" id="submit">
                            <span>
                                Check Result
                                <i class="zmdi zmdi-arrow-right m-l-8"></i>
                            </span>
                        </button>
                </div>
                </a>
            </div>
        </div>
    @endsection