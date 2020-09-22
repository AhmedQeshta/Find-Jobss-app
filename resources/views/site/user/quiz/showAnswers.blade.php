@extends('layouts.app')
@section('title','home User')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Questions  </div>
                    @include('message._message')
                    @forelse($questions as $index=>$question)
                            <div class="container py-3">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card" >
                                            <h4 class="title" style="margin: 15px 10px">Title Question : {{$question->questionTitle}}</h4>
                                            <span style="margin: 15px 10px">
                                            <label >Required Expertise : <strong>{{$question->requiredExpertise}}</strong></label>
                                            <label >Type Question : <strong>{{$question->type_question}}</strong></label>
                                        </span>
                                            <p class="card-title " >{!! $question->questionDescription !!}</p>
                                            @foreach($answer_user as $answer_user_row)
                                                @if($question->id == $answer_user_row->quiz_id)
                                                    <label class="card-header" for="answer">Answer</label>
                                                    <p class="text-center card-body">{!! $answer_user_row->answer !!}</p>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                    @empty
                        <div class="alert-warning alert"> No Answer Questions Add Yet</div>
                    @endforelse




                </div>
            </div>
        </div>
    </div>
@endsection
