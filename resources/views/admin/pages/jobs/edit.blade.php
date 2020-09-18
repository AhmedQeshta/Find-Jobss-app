@extends('admin.AdminHome')
@section('title', 'Jop | Create')
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
                        <a href="{{route('admin.jobs')}}">Jobs</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Update Job</span>
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
        <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Update Job</h1>
            <!-- END PAGE TITLE-->
            <!-- Table begin-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box red">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-briefcase"></i> Data Job
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form method="POST"  action="{{ route('admin.jobs.update',[$job->id,$job->slug])}}">
                                @csrf
                                <div class="form-body row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Name Job</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $job->name  , old('name')  }}" required placeholder="Enter Name Job">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Title Job</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $job->title  , old('title')  }}" required placeholder="Enter Title Job">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label class="control-label">Age Group From:</label>
                                        <input type="text" class="form-control @error('ageGroupFrom') is-invalid @enderror" name="ageGroupFrom" value="{{ $job->ageGroupFrom  ,  old('ageGroupFrom')  }}" required placeholder="Enter Age Group From:">
                                        @error('ageGroupFrom')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="control-label">Age Group To:</label>
                                        <input type="text" class="form-control @error('ageGroupTo') is-invalid @enderror" name="ageGroupTo" value="{{ $job->ageGroupTo  , old('ageGroupTo')  }}" required placeholder="Enter Age Group To:">
                                        @error('ageGroupTo')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Experience:</label>
                                        <input type="text" class="form-control input-large" value="{{ $job->experience  ,  old('experience') }}" name="experience" required data-role="tagsinput">
                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Specialization:</label>
                                        <input type="text" class="form-control input-large" value="{{ $job->specialization  , old('specialization') }}" name="specialization" required data-role="tagsinput">
                                        @error('specialization')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Days Of Work:</label>
                                        <input type="text" class="form-control input-large" value="{{ $job->DaysOfWork  ,  old('DaysOfWork') }}" name="DaysOfWork" required data-role="tagsinput">
                                        @error('DaysOfWork')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Address</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $job->address  , old('address') }}" required placeholder="Enter Place Job:">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $job->city  , old('city') }}" required placeholder="Enter City:">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Country</label>
                                        <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $job->country  , old('country') }}" required placeholder="Enter Country:">
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label class="control-label">Type Job: </label>
                                            <select class="form-control" name="typeJob" data-placeholder="Choose Type Jop" >
                                                <option @if($job->typeJob == 'partTime') selected @endif value="partTime">Part Time</option>
                                                <option @if($job->typeJob == 'fullTime') selected @endif value="fullTime">Full Time</option>
                                            </select>
                                            @error('typeJob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label class="control-label">Price</label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-dollar"></i>
                                                </span>
                                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $job->price  , old('price')  }}" placeholder="100.00">
                                        </div>
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="form-group col-md-2">
                                        <label class="control-label">Business Hours From:</label>
                                        <input type="text" class="form-control @error('BusinessHoursFrom') is-invalid @enderror" name="BusinessHoursFrom" value="{{ $job->BusinessHoursFrom  ,  old('BusinessHoursFrom')  }}" required placeholder="12:00">
                                        @error('BusinessHoursFrom')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="control-label">Zone Time:</label>
                                        <select class="form-control" name="BusinessHoursFromTime" data-placeholder="Choose Zone Time" >
                                            <option @if($job->BusinessHoursFromTime == 'PM') selected @endif value="PM">PM</option>
                                            <option @if($job->BusinessHoursFromTime == 'AM') selected @endif value="AM">AM</option>
                                        </select>
                                        @error('BusinessHoursFromTime')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="control-label">Business Hours To:</label>
                                        <input type="text" class="form-control @error('BusinessHoursTo') is-invalid @enderror" name="BusinessHoursTo" value="{{ $job->BusinessHoursTo  ,  old('BusinessHoursTo')  }}" required placeholder="10:00">
                                        @error('BusinessHoursTo')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="control-label">Zone Time:</label>
                                        <select class="form-control" name="BusinessHoursToTime" data-placeholder="Choose Zone Time" >
                                            <option @if($job->BusinessHoursToTime == 'PM') selected @endif value="PM">PM</option>
                                            <option @if($job->BusinessHoursToTime == 'AM') selected @endif value="AM">AM</option>
                                        </select>
                                        @error('BusinessHoursToTime')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Description:</label>
                                        <textarea class="form-control"  name="description" id="summernote_1">{{$job->description  ,old('description')}} </textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>
                                <div class="form-actions">
                                    <div class="btn-set pull-left">
                                        <button type="submit" class="btn green">Submit</button>
                                        <button type="reset" class="btn blue">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>

            </div>
            <!-- Table end-->
            {{--   ###########   End Content #########      --}}


        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->


@endsection

