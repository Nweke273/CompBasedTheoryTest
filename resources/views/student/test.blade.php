@extends('layouts.dashboard')
@section('content')
<div class="container-contact100" style="margin-top: 4%;">
    <div class="wrap-contact100">
        @if($questions->isEmpty())
        <h4 class="mb-3" style="text-align: center; font-size: 35px;">Exam Questions Not Uploaded Yet!! <br><span class="text-primary mt-5" style="font-size: 20px;">Contact Admins For More Clarificaiton</span></h4>
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
        @else
        @if(empty(auth()->user()->result))
        @csrf
        <button id="submitExam" onclick="" style="font-size: 18px; margin-right: 50px;border-radius: 4px; padding: 4px 8px 4px 8px; color: #fff; background-color: #01131C;">Submit And Go!</button>

        <span class="contact100-form-title" style="position: relative; right: 0px;" id="timer">
            0 1 : 1 0
        </span>
        <span id="exam-duration" class="contact100-form-title" data-title="{{$examDuration}}">
            {{$title}}
        </span>

        <label class="label-input100" for="message">Question No</label>
        <div class="wrap-input100 validate-input">
            <textarea id="question" class="input100" name="question" readonly></textarea>
            <span class="focus-input100"></span>
        </div>

        <div style="margin-left: 30%;">
        </div>


        <label class="label-input100" for="email" style="margin-top: 4%;">Answer</label>
        <div class="wrap-input100 validate-input">
            <textarea id="answer" class="input100" name="answer" placeholder="Enter Your Answer Here"></textarea>
            <span class="focus-input100"></span>
        </div>
        <div id="question_answer"></div>
        <div class="row col-md-6 m-auto text-center">
            <button class="bg-light text-primary p-2 mr-5" id="previous">Previous</button>
            <button class="bg-light text-primary p-2" id="next">Next</button>
        </div>

        @else
        <h1 style="margin-left:10%; color: red; margin-bottom: 30px;">You have taken your Exam!!</h1>
        <div class="container-contact100-form-btn">
            <a href="/students/{{auth()->user()->id}}/result">
                <button class="contact100-form-btn">
                    <span>
                        Check Result
                        <i class="zmdi zmdi-arrow-right m-l-8"></i>
                    </span>
                </button>
            </a>
        </div>
        @endif
        @endif
    </div>
</div>

<script>
    let data = [];
    const questions = JSON.parse('{!! $questions !!}'.replace(/]"/g, ']').replace(/"\[/g, '[').replace('\\', ''));
    const questionView = document.getElementById('question');
    const answerView = document.getElementById('answer')
    currentEntry = 0;
    questionView.value = questions[currentEntry].question
    const courseTitle = (questions[currentEntry].course);
    console.log(questions);

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('next').addEventListener('click', nextQuestion)
        document.getElementById('previous').addEventListener('click', previousQuestion)
        document.getElementById('submitExam').addEventListener('click', submitExam);
    });

    function nextQuestion() {
        console.log(currentEntry)
        if (currentEntry < questions.length - 1) {

            data[currentEntry] = {
                question: questions[currentEntry],
                answer: answerView.value
            }

            currentEntry++;
            showQuestionAndAnswer(questions[currentEntry].question, data[currentEntry]?.answer ?? '');
        }
        console.log(data)

    }

    function previousQuestion() {
        console.log(currentEntry)

        if (currentEntry > 0) {
            data[currentEntry] = {
                question: questions[currentEntry],
                answer: answerView.value
            }

            currentEntry--;
            showQuestionAndAnswer(questions[currentEntry].question, data[currentEntry]?.answer ?? '');
        }
        console.log(data)
    }


    function showQuestionAndAnswer(question, answer) {
        questionView.value = question;
        answerView.value = answer;
    }



    function submitExam() {
        $.ajax({
            type: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "data": data,
                "title": courseTitle,
            },
            url: "/store/answer",
            success: function(response) {
                window.location.href = '/test-submitted'
                //console.log(response.data);

            }
        });
    }
</script>
<script src="{{asset ('/js/timer.js')}}"></script>

@endsection