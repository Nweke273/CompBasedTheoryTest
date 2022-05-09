@extends('layouts.app')
@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        @else
        <a href="{{ route('login') }}" style="font-size: 20px; margin-right: 100px; background-color: steelblue; border-radius: 4px; padding: 8px 12px 8px 12px; color: white;">Log in</a>
        @endauth
    </div>
    @endif

    <div class="container-contact100" style="margin-top: 4%;">
        <div class="wrap-contact100">
            <div class="contact100-form validate-form" id="form">
                <span class="contact100-form-title" style="color: steelBlue;">
                    Exam Time Out!!
                </span>
                <div class="container-contact100-form-btn">
                    <a href="/students/{{auth()->user()->id}}/course">
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
    </div>
  @endsection