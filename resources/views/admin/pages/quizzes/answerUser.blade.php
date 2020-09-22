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
            <!-- Table begin-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase">Answer Questions Table</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    {{-- begin Tools (Print - pdf - exel)--}}
                                    <div class="col-md-12">
                                        <div class="btn-group pull-right">
                                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-print"></i> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- End Tools (Print - pdf - exel)--}}
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                <tr>
                                    <th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th>name</th>
                                    <th>job</th>
                                    <th>status_question</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($users) && $users->count()>0)
                                    @foreach($users as $user)
                                        <tr class="odd gradeX">
                                            <td>
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="checkboxes" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->job}}</td>
                                            <td>
                                                <label class="@if($user->status_question == 0)
                                                                    badge-danger
                                                                @elseif($user->status_question == 1)
                                                                    badge-warning
                                                                @else
                                                                    badge-info
                                                                @endif badge">
                                                    {{$user->getStatusQuestion()}}
                                                </label>
                                            </td>
                                            <td>
                                                @if($user->status_question == 0)
                                                    <div class="btn-group">
                                                        <label for="" class="badge badge-danger">Not Add Answer!</label>
                                                    </div>
                                                @else
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="{{route('admin.quiz.showAnswerUser', $user->id)}}">
                                                                    <i class="icon-eye"></i> show </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- Table end-->
            {{--   ###########   End Content #########      --}}


        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->


@endsection


