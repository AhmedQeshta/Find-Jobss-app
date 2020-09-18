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
                        <a href="">Jobs</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>create Job</span>
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
            <h1 class="page-title"> Create Job</h1>
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
                            <form method="POST"  action="{{ route('admin.jobs.store') }}">
                                @csrf
                                <div class="form-body row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Name Job</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')  }}" required placeholder="Enter Name Job">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Title Job</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')  }}" required placeholder="Enter Title Job">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label class="control-label">Age Group From:</label>
                                        <input type="text" class="form-control @error('ageGroupFrom') is-invalid @enderror" name="ageGroupFrom" value="{{ old('ageGroupFrom')  }}" required placeholder="Enter Age Group From:">
                                        @error('ageGroupFrom')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="control-label">Age Group To:</label>
                                        <input type="text" class="form-control @error('ageGroupTo') is-invalid @enderror" name="ageGroupTo" value="{{ old('ageGroupTo')  }}" required placeholder="Enter Age Group To:">
                                        @error('ageGroupTo')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Experience:</label>
                                        <input type="text" class="form-control input-large" value="{{ old('experience') }}" name="experience" required data-role="tagsinput">
                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Specialization:</label>
                                        <input type="text" class="form-control input-large" value="{{ old('specialization') }}" name="specialization" required data-role="tagsinput">
                                        @error('specialization')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Days Of Work:</label>
                                        <input type="text" class="form-control input-large" value="{{ old('DaysOfWork') }}" name="DaysOfWork" required data-role="tagsinput">
                                        @error('DaysOfWork')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Address</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required placeholder="Enter Place Job:">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required placeholder="Enter City:">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Country</label>
                                        <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required placeholder="Enter Country:">
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label class="control-label">Type Job: </label>
                                            <select class="form-control" name="typeJob" data-placeholder="Choose Type Jop" >
                                                <option value="partTime">Part Time</option>
                                                <option value="fullTime" selected>Full Time</option>
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
                                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price')  }}" placeholder="100.00">
                                        </div>
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="form-group col-md-2">
                                        <label class="control-label">Business Hours From:</label>
                                        <input type="text" class="form-control @error('BusinessHoursFrom') is-invalid @enderror" name="BusinessHoursFrom" value="{{ old('BusinessHoursFrom')  }}" required placeholder="12:00">
                                        @error('BusinessHoursFrom')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="control-label">Zone Time:</label>
                                        <select class="form-control" name="BusinessHoursFromTime" data-placeholder="Choose Zone Time" >
                                            <option value="PM">PM</option>
                                            <option value="AM" selected>AM</option>
                                        </select>
                                        @error('BusinessHoursFromTime')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="control-label">Business Hours To:</label>
                                        <input type="text" class="form-control @error('BusinessHoursTo') is-invalid @enderror" name="BusinessHoursTo" value="{{ old('BusinessHoursTo')  }}" required placeholder="10:00">
                                        @error('BusinessHoursTo')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="control-label">Zone Time:</label>
                                        <select class="form-control" name="BusinessHoursToTime" data-placeholder="Choose Zone Time" >
                                            <option value="PM">PM</option>
                                            <option value="AM" selected>AM</option>
                                        </select>
                                        @error('BusinessHoursToTime')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Description:</label>
                                        <textarea class="form-control"  name="description" id="summernote_1">{{old('description')}} </textarea>
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

