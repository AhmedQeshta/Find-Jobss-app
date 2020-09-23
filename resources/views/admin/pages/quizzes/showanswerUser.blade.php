@extends('admin.AdminHome')
@section('title', 'All Jobs')
@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="">Quizzes</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Details Answer</span>
                        <i class="fa fa-circle"></i>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Date">
                        {{date('d M Y | h:i')}}
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->

            {{--################## Content #################--}}

        <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Table Answer Questions</h1>
            <!-- END PAGE TITLE-->

            <br>
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase"> Details : <strong>Answer Questions</strong></span>
                    </div>
                    @if($user->status_question == 1)
                        <div class="actions">
                            <div class="btn-group">
                                <a class="btn red btn-outline btn-circle" href="{{route('admin.quiz.updateStatusUser',$user->id)}}" >
                                    <span class="hidden-xs"> Save To CV </span>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">

                            <div class="row">
                                @foreach($questions as $index=>$question)
                                    <div class="col-md-12 col-sm-12">
                                        <div class="portlet green-meadow box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Question</div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row static-info">
                                                <div class="col-md-5 name">Question #{{++$index}}</div>
                                                <div class="col-md-7 value">
                                                    {!! $question->questionDescription !!}
                                                </div>
                                            </div>

                                            <div class="row static-info">
                                                <div class="col-md-5 name">Answer Question:</div>
                                                <div class="col-md-7 value">
                                                    {!! $question->answerQuestionDescription !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                    @foreach($answer_user as $index=>$answer_user_row)
                                        @if($question->id == $answer_user_row->quiz_id)
                                            <div class="col-md-12 col-sm-12">
                                                <div class="portlet blue-hoki box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Answer Q# {{++$index}}</div>
                                                        @if($answer_user_row->status_answer == 0)
                                                            <div class="actions">
                                                                <a href="{{route('admin.quiz.updateStatusAnswer',$answer_user_row->id)}}" class="btn btn-default btn-sm">
                                                                    <i class="fa fa-pencil"></i> True </a>
                                                            </div>
                                                        @else
                                                            <div class="actions mt-5">
                                                                <label class="badge badge-danger ">This Answer is True</label>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name"> Answer: </div>
                                                            <div class="col-md-7 value"> {{$answer_user_row->answer}}</div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 name"> Percentage Truthy:
                                                                @if($answer_user_row->percentage!=0)
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
                                                                @endif
                                                            </div>
                                                            @if(!($answer_user_row->percentage>0 && $answer_user_row->percentage<=100))
                                                                <div class="form-group col-md-12 ">
                                                                    <form action="{{route('admin.quiz.updatePercentage',$answer_user_row->id)}}" method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-dollar"></i>
                                                                            </span>
                                                                            <input style="position: relative"  type="text" class="form-control mx-auto" name="percentage" value="{{ old('percentage')  }}"  placeholder="Enter percentage : 50 to 100">
                                                                            <button style="position:absolute;top:0px;right:0px;z-index:999" class="btn btn-dark " type="submit">Save</button>

                                                                        </div>
                                                                            @error('price')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                    </form>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{--   ###########   End Content #########      --}}


        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->


@endsection


