@extends('admin.AdminHome')
@section('title', 'Admin dashBord')
@section('content')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{route('admin.DashBord')}}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Admin : {{Auth::user()->name}}</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Profile</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Admin Profile | Account </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet ">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="{{asset(Auth::user()->avatar)}}" class="img-responsive" alt=""> </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> {{Auth::user()->name}} </div>
                                <div class="profile-usertitle-job"> Admin </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->

                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li class="active">
                                        <a href="{{route('admin.profile')}}">
                                            <i class="icon-settings"></i> Account Settings </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                        <!-- END PORTLET MAIN -->
                        <!-- PORTLET MAIN -->
                        <div class="portlet light ">
                            <div>
                                <h4 class="profile-desc-title">About {{Auth::user()->name}}</h4>
                                <span class="profile-desc-text">Hi, I'm <strong>{{Auth::user()->name}}</strong>, And My Phone : <strong>{{Auth::user()->phone}}</strong>, and  My Email : <strong> {{Auth::user()->email}} </strong> </span>
                                <div class="margin-top-20 profile-desc-link">
                                    <i class="fa fa-globe"></i>
                                    <a href="#">www.example.com</a>
                                </div>
                                <div class="margin-top-20 profile-desc-link">
                                    <i class="fa fa-twitter"></i>
                                    <a href="#">@example</a>
                                </div>
                                <div class="margin-top-20 profile-desc-link">
                                    <i class="fa fa-facebook"></i>
                                    <a href="#">example</a>
                                </div>
                            </div>
                        </div>
                        <!-- END PORTLET MAIN -->
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                <form role="form"  action="{{ route('admin.password.update') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label class="control-label">Name</label>
                                                        <input type="text" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name , old('name')  }}" required autofocus/>
                                                         @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Phone</label>
                                                        <input type="text" name="phone" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" value="{{ Auth::user()->phone , old('phone')  }}" required autofocus/>
                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">E-mail</label>
                                                        <input type="email" name="email" placeholder="example@example.com" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email , old('email')  }}" required autofocus/>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="margiv-top-10">
                                                        <button type="submit"  class="btn green"> Save Changes </button>
                                                        <button type="reset"  class="btn default"> Cancel </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END PERSONAL INFO TAB -->
                                            <!-- CHANGE AVATAR TAB -->
                                            <div class="tab-pane" id="tab_1_2">
                                                <form  role="form" enctype="multipart/form-data" action="{{ route('admin.password.update') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group text-center">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                                            <span class="btn default btn-file">
                                                                                <span class="fileinput-new"> Select image </span>
                                                                                <span class="fileinput-exists"> Change </span>
                                                                                <input type="file" name="admin_avatar"> </span>
                                                                <input type="hidden" name="old_avatar" value="{{ Auth::user()->avatar }}">
                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="margin-top-10 text-center">
                                                        <button type="submit"  class="btn green"> Update </button>
                                                        <button type="reset" class="btn default"> Cancel </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END CHANGE AVATAR TAB -->
                                            <!-- CHANGE PASSWORD TAB -->
                                            <div class="tab-pane" id="tab_1_3">
                                                <form action="{{ route('admin.password.update') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group">
                                                        <label class="control-label">Current Password</label>
                                                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password"/>
                                                            @error('old_password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">New Password</label>
                                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"/>
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Re-type New Password</label>
                                                            <input type="password" class="form-control" name="password_confirmation" />
                                                        </div>
                                                        <div class="margin-top-10">
                                                            <button type="submit"  class="btn green"> Change Password </button>
                                                            <button type="reset"  class="btn default"> Cancel </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- END CHANGE PASSWORD TAB -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE CONTENT -->
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>

    {{--    <!-- ########## START: profile PANEL ########## -->--}}
{{--    <div class="sl-mainpanel">--}}
{{--        <nav class="breadcrumb sl-breadcrumb">--}}
{{--            <a class="breadcrumb-item" href="http://findjobs-app.net">FindJop-app</a>--}}
{{--            <span class="breadcrumb-item active">profile</span>--}}
{{--        </nav>--}}

{{--        <div class="container py-5">--}}
{{--            <div class="card pd-20 pd-sm-40">--}}
{{--                <h6 class="card-body-title">Update Profile</h6>--}}
{{--                <hr style="width: 100%;height:1px">--}}
{{--                    @include('message._message',['updateIt'=>'Update successfully','NotupdateIt'=>'Tray Again'])--}}
{{--                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.password.update') }}">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}
{{--                        <div class="form-layout">--}}
{{--                            <div class="row mg-b-25">--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-control-label">Name: <span class="tx-danger">*</span></label>--}}
{{--                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ Auth::user()->name , old('name')  }}" required placeholder="Enter Name" autofocus>--}}
{{--                                        @error('name')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div><!-- col-4 -->--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>--}}
{{--                                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ Auth::user()->phone , old('phone')}}" placeholder="Enter Phone" required>--}}
{{--                                        @error('phone')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div><!-- col-4 -->--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>--}}
{{--                                        <input class="form-control  @error('email') is-invalid @enderror" type="text" name="email" value="{{ Auth::user()->email , old('phone')}}" placeholder="Enter email address" required>--}}
{{--                                        @error('email')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div><!-- col-4 -->--}}
{{--                                    <div class="col-lg-12 mg-t-45 mg-lg-t-0">--}}
{{--                                        <label class="custom-file">--}}
{{--                                            <input type="file" name="avatar" class="custom-file-input">--}}
{{--                                            <input type="hidden" name="old_avatar" value="{{ Auth::user()->avatar }}">--}}
{{--                                            <span class="custom-file-control custom-file-control-inverse"></span>--}}
{{--                                        </label>--}}
{{--                                        @error('avatar')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                        @enderror--}}
{{--                                    </div><!-- col -->--}}

{{--                            </div><!-- row -->--}}
{{--                            <hr>--}}
{{--                            <div class="row mg-b-25">--}}
{{--                                <div class="col-lg-5">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-control-label">Old Password: <span class="tx-danger">*</span></label>--}}
{{--                                        <input id="old_password" class="form-control  @error('old_password') is-invalid @enderror" type="password" name="old_password"  placeholder="Enter Old Password" >--}}
{{--                                        @error('old_password')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div><!-- col-4 -->--}}
{{--                                <div class="col-lg-3">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-control-label">Old Password: <span class="tx-danger">*</span></label>--}}
{{--                                        <input id="password" class="form-control  @error('password') is-invalid @enderror" type="password" name="password"  placeholder="Enter New Password" >--}}
{{--                                        @error('password')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div><!-- col-4 -->--}}
{{--                                <div class="col-lg-3">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-control-label">Password Confirmation: <span class="tx-danger">*</span></label>--}}
{{--                                        <input id="password_confirmation" class="form-control " type="password" name="password_confirmation"  placeholder="Enter Password" >--}}
{{--                                    </div>--}}
{{--                                </div><!-- col-4 -->--}}
{{--                             </div><!-- row -->--}}
{{--                            <div class="form-layout-footer">--}}
{{--                                <button type="submit" class="btn btn-info mg-r-5">Update</button>--}}
{{--                                <button type="reset" class="btn btn-secondary">Cancel</button>--}}
{{--                            </div><!-- form-layout-footer -->--}}
{{--                        </div><!-- form-layout -->--}}

{{--                    </form>--}}


{{--            </div><!-- card -->--}}
{{--        </div>--}}

{{--    </div><!-- sl-mainpanel -->--}}
{{--    <!-- ########## END: profile PANEL ########## -->--}}
@endsection
