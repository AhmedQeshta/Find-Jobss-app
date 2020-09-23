@extends('layouts.app')
@section('title','Quiz User')
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
                                                @foreach($user->answerQuizUser as $answer)
                                                    @if($answer->quiz_id == $question->id)
                                                        <form action="{{route('user.quiz.update',$answer->id)}}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <label style="margin: 15px 10px">Answer Question </label>
                                                            <textarea style="margin: 15px 10px" name="answer" id="" cols="140" rows="7" placeholder="Enter your answer">{{$answer->answer}}</textarea>
{{--                                                            <input type="hidden" name="quiz_id" value="{{$question->id}}">--}}
{{--                                                            <input type="hidden" name="user_id" value="{{Auth::id()}}">--}}
                                                            <div class="form-group " style="margin: 15px 10px">
                                                                <button class="btn btn-success " type="submit">Send answer</button>
                                                                <button class="btn btn-danger " type="reset">cansel</button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                    @empty
                        <div class="alert-warning alert"> No Questions Add Yet</div>
                    @endforelse


{{--                    <form action="{{route('user.quiz.update.Status')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}
{{--                        <div class="alert-info alert mb-lg-2 m-lg-5  text-center d-flex flex-column">--}}
{{--                            <span class="d-flex flex-row justify-content-center mt-2">--}}
{{--                                <button id="Save_change" class="btn-success btn border-0 ml-2" type="submit">--}}
{{--                                    Save All--}}
{{--                                </button>--}}
{{--                           </span>--}}
{{--                        </div>--}}
{{--                    </form>--}}

                    <div class="alert-info alert mb-lg-2 m-lg-5  text-center d-flex flex-column">
                            <span class="d-flex flex-row justify-content-center mt-2">
                                <a id="Save_change" class="btn-success btn border-0 ml-2" href="{{route('user.quiz.update.Status')}}">Save All</a>
                           </span>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection