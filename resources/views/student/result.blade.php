@extends('layouts.app')
@section('content')

    <div style="margin-top: 4%;">
        <div class="wrap-contact100">
            <div>
                <h1 class="text-center mb-3">Smart Gap Computer Institute</h1>
                <h2 class="text-center mb-3">Student Summer Exam Result</h2>
                <h5 class="text-center mb-3">Course: {{$result['course_title']??''}}</h5>
            </div>
            <span class="contact100-form-title text-center mb-2">
                Score!!
            </span>
            <div class="container-contact100-form-btn text-center mb-3">
                <a href="javascript::void['0']">
                    <button class="p-2">
                        <h1 class="{{$result->score==0 ? 'text-danger' : ''}}">
                            {{$result->score ?? ''}}
                        </h1>
                    </button>
                    @if($result->score)
                    <form>
                        <input class="text-center" id="print-result" type="button" value="Print Result" onClick="window.print()" style="padding: 10px; margin-top: 35px;">
                    </form>
                    @else
                    <div class="container-contact100-form-btn mt-3">
                        <a href="/home">
                            <button class="contact100-form-btn">
                                <span>
                                    Dismiss
                                    <i class="zmdi zmdi-arrow-right m-l-8"></i>
                                </span>
                            </button>
                        </a>
                    </div>
                    @endif
            </div>
            </a>
        </div>
    </div>
@endsection