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
                        <span>Details Question</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>{{$Quiz->questionTitle}}</span>
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

            <br>
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase"> Details : <strong>{{$Quiz->questionTitle}}</strong></span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-share"></i>
                                <span class="hidden-xs"> Tools </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;"> Export to Excel </a>
                                </li>
                                <li>
                                    <a href="javascript:;"> Export to PDF </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;"> Print </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="portlet grey-cascade box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Question Details</div>
                                                <div class="actions">
                                                    <a href="{{route('admin.quiz.edit', [$Quiz->id,$Quiz->slug])}}" class="btn btn-default btn-sm">
                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Question Title</th>
                                                            <th>Question Required Expertise</th>
                                                            <th>Type Question</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                {{$Quiz->questionTitle}}
                                                            </td>
                                                            <td>
                                                                @foreach($QuizRequiredExpertise as $QuizRequiredExpertise_row)
                                                                    <span class="label label-success" style="margin: 0px 2px"> {{$QuizRequiredExpertise_row}} </span>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($QuizTypeQuestion as $QuizTypeQuestion_row)
                                                                    <span class="label label-info" style="margin: 0px 2px"> {{$QuizTypeQuestion_row}} </span>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="portlet red-sunglo box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Question Description</div>
                                                <div class="actions">
                                                    <a href="{{route('admin.quiz.edit', [$Quiz->id,$Quiz->slug])}}" class="btn btn-default btn-sm">
                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <br>
                                                {!! $Quiz->questionDescription !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="portlet green-meadow box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Answer Question Description</div>
                                                <div class="actions">
                                                    <a href="{{route('admin.quiz.edit', [$Quiz->id,$Quiz->slug])}}" class="btn btn-default btn-sm">
                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <br>
                                                {!! $Quiz->answerQuestionDescription !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
            <!-- End: life time stats -->
            {{--   ###########   End Content #########      --}}


        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->


@endsection


