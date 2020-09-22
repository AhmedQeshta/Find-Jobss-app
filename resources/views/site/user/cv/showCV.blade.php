@extends('layouts.app')
@section('title','home User')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Your CV</div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title Question</th>
                                <th scope="col">Your Answer</th>
                                <th class="text-center" scope="col">Percentage Answer</th>
                                <th class="text-center" scope="col">Answer <small>{TRUE-FALSE}</small></th>
                            </tr>
                            </thead>

                            @forelse($answer_user as $index=>$answer_user_row)
                                <tbody>
                                <tr>
                                    <th scope="row">{{++$index}}</th>
                                    <td>{{$answer_user_row->questionQuiz->questionTitle}}</td>
                                    <td>{{$answer_user_row->answer}}</td>
                                    <td class="text-center">
                                        <strong class="@if($answer_user_row->percentage>=90 && $answer_user_row->percentage<=100)
                                                    badge-success
                                                @elseif($answer_user_row->percentage>=80 && $answer_user_row->percentage<90)
                                                     badge-info
                                                @elseif($answer_user_row->percentage>=65 && $answer_user_row->percentage<80)
                                                     badge-warning
                                                @elseif($answer_user_row->percentage>=50 && $answer_user_row->percentage<65)
                                                     badge-danger
                                                @else
                                                     badge-dark
                                                @endif badge">
                                            {{$answer_user_row->percentage}} %

                                        </strong>
                                    </td>
                                    <td class="text-center">
                                        @if($answer_user_row->status_answer == 1)
                                            <label class="badge badge-success">True</label>
                                        @else
                                            <label class="badge badge-danger">False</label>
                                        @endif
                                    </td>
                                </tr>

                                </tbody>
                            @empty
                                <tbody>
                                <tr>
                                    <th colspan="5">No Jop Add Yet</th>
                                </tr>
                                </tbody>
                            @endforelse

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
