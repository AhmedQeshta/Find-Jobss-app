@extends('admin.AdminHome')
@section('title', 'All Questions')
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
                        <span>All Questions</span>
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
                <h1 class="page-title"> Table  Questions</h1>
                <!-- END PAGE TITLE-->
                <!-- Table begin-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"> Questions Table</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a href="{{route('admin.quiz.create')}}" id="sample_editable_1_new" class="btn sbold green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            {{-- begin Tools (Print - pdf - exel)--}}
                                            <div class="col-md-6">
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
                                            <th>Question Title</th>
                                            <th>Question Required Expertise</th>
                                            <th>Type Question</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         @if(isset($Quizzes) && $Quizzes->count()>0)
                                            @foreach($Quizzes as $Quiz)
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>{{$Quiz->questionTitle}}</td>
                                                    <td>{{$Quiz->requiredExpertise}}</td>
                                                    <td>{{$Quiz->type_question}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-left" role="menu">
                                                                <li>
                                                                    <a href="{{route('admin.quiz.show', [$Quiz->id,$Quiz->slug])}}">
                                                                        <i class="icon-eye"></i> show </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{route('admin.quiz.edit', [$Quiz->id,$Quiz->slug])}}">
                                                                        <i class="fa fa-edit"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a id="delete" href="{{ route('admin.quiz.destroy', $Quiz->id)}}"  ><i class="icon-trash"></i> Delete </a>
                                                                </li>
                                                            </ul>
                                                        </div>
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


