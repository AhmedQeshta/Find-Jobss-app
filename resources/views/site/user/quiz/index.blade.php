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
                        @if( $userAnswers->count() ==  $questions->count())
                            <div class="alert-info alert"> End Questions</div>
                        @else
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
                                            <form action="{{route('user.quiz.store')}}" method="post">
                                                @csrf
                                                <label style="margin: 15px 10px">Answer Question </label>
                                                <textarea style="margin: 15px 10px" name="answer" id="" cols="140" rows="7" placeholder="Enter your answer"></textarea>
                                                <input type="hidden" name="quiz_id" value="{{$question->id}}">
                                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                                <div class="form-group " style="margin: 15px 10px">
                                                    <button class="btn btn-success " type="submit">Send answer</button>
                                                    <button class="btn btn-danger " type="reset">cansel</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="alert-warning alert"> No Questions Add Yet</div>
                    @endforelse

{{--                    <div style="margin: auto; text-align: center;padding-top: 15px ; display: flex">--}}
{{--                        {{ $questions->links() }}--}}
{{--                    </div>--}}


                </div>
            </div>
        </div>
    </div>
@endsection
