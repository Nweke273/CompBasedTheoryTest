@extends('layouts.app')
@section('content')

    <div class="container-contact100" style="margin-top: 4%;">
        <div class="wrap-contact100">
            <div class="contact100-form validate-form" id="form">
                @if(!$results->isEmpty())
                <table class="table table-bordered">
                    <form action="/results/search" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg align-items-end">
                                <div class="form-group">
                                    <div>
                                        <input type="text" class="form-control" placeholder="Enter Keyword" name="keyword" style="border-color: steelblue;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form>
                        <input class="text-center" type="button" value="Print Result" onClick="window.print()" style="padding: 10px; margin-top: 35px;">
                    </form>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Reg No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td>{{$result->id}}</td>
                            <td>{{$result->reg_no}}</td>
                            <td>{{$result->name}}</td>
                            <td>{{$result->score}}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                @else
                <div style="width: 100%;">
                    <h2 class="text-center mb-3 text-danger">Result Not Found</h2>
                </div>
                <div class="container-contact100-form-btn mt-3">
                    <a href="/results">
                        <button class="contact100-form-btn">
                            <span>
                              Go Back
                                <i class="zmdi zmdi-arrow-right m-l-8"></i>
                            </span>
                        </button>
                    </a>
                </div>
                @endif
            </div>
        </div>
    @endsection