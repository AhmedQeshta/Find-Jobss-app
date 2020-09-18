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
                        <a href="">Jobs</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Details Job</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>{{$job->name}}</span>
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
                        <span class="caption-subject font-dark sbold uppercase"> Details : <strong>{{$job->title}}</strong>
                            <span class="hidden-xs">| {{$job->date}} </span>
                        </span>
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
                                                    <i class="fa fa-cogs"></i>Job Details</div>
                                                <div class="actions">
                                                    <a href="{{route('admin.jobs.edit', [$job->id,$job->slug])}}" class="btn btn-default btn-sm">
                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Name Job</th>
                                                            <th>Title</th>
                                                            <th>Experience</th>
                                                            <th>Specialization</th>
                                                            <th>price</th>
                                                            <th>country</th>
                                                            <th>typeJob</th>
                                                            <th>Suitable age</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="{{route('admin.jobs.show', [$job->id,$job->slug])}}">{{$job->name}}</a>
                                                            </td>
                                                            <td> {{$job->title}} </td>
                                                            <td>
                                                                @foreach($job_experience as $job_experience_row)
                                                                    <span class="label label-success" style="margin: 0px 2px"> {{$job_experience_row}} </span>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($job_specialization as $job_specialization_row)
                                                                    <span class="label label-info" style="margin: 0px 2px"> {{$job_specialization_row}} </span>
                                                                @endforeach
                                                            </td>
                                                            <td>$ {{$job->price}} </td>
                                                            <td> {{$job->country}} </td>
                                                            <td> {{$job->typeJob}} </td>
                                                            <td>
                                                                <span class="label label-info"> {{$job->ageGroupFrom}} years old</span>
                                                                <span > To </span>
                                                                <span class="label label-info">  {{$job->ageGroupTo}} years old</span>
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
                                        <div class="portlet green-meadow box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Job Time</div>
                                                <div class="actions">
                                                    <a href="{{route('admin.jobs.edit', [$job->id,$job->slug])}}" class="btn btn-default btn-sm">
                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Days Of Work: </div>
                                                    <div class="col-md-7 value">
                                                        @foreach($job_DaysOfWork as $job_DaysOfWork_row)
                                                            <span class="label label-info label-sm">{{$job_DaysOfWork_row}}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Business Hours: </div>
                                                    <div class="col-md-7 value">
                                                        <span class="label label-info"> {{$job->BusinessHoursFrom}} {{$job->BusinessHoursFromTime}}</span>
                                                        <span > To </span>
                                                        <span class="label label-info"> {{$job->BusinessHoursTo}} {{$job->BusinessHoursToTime}}</span>
                                                    </div>
                                                </div>

                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Year : </div>
                                                    <div class="col-md-7 value">
                                                        <span class="label label-info"> {{$job->Year}} </span>
                                                   </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Month : </div>
                                                    <div class="col-md-7 value">
                                                        <span class="label label-info"> {{$job->month}} </span>
                                                    </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Day : </div>
                                                    <div class="col-md-7 value">
                                                        <span class="label label-info"> {{$job->day}} </span>
                                                    </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Date: </div>
                                                    <div class="col-md-7 value">
                                                        <span class="label label-info"> {{$job->date}} </span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="portlet blue-hoki box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Job Address</div>
                                                <div class="actions">
                                                    <a href="{{route('admin.jobs.edit', [$job->id,$job->slug])}}" class="btn btn-default btn-sm">
                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Address: </div>
                                                    <div class="col-md-7 value"> {{$job->address}}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> City: </div>
                                                    <div class="col-md-7 value"> {{$job->city}}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Country: </div>
                                                    <div class="col-md-7 value"> {{$job->country}}</div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Address: </div>
                                                    <div class="col-md-7 value"> {{$job->address}}</div>
                                                </div>
                                                @if($hoursAM >= 0)
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Hours: </div>
                                                        <div class="col-md-7 value"> {{$hoursAM}} hours</div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="portlet red-sunglo box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Job Description</div>
                                                <div class="actions">
                                                    <a href="{{route('admin.jobs.edit', [$job->id,$job->slug])}}" class="btn btn-default btn-sm">
                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <br>
                                                {!! $job->description !!}
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


