@extends('layouts.app')
@section('title','Profile User')
<style>
    .profile{
        display: flex;
        justify-content: center;
        align-content: center;
        text-align: center;
        flex-direction: column;
        margin: auto;
    }
    .profileAvatar{
        width: 50%;
        margin: 15px auto;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    @if(!(Auth::user()->password) )
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="{{route('user.profile.update')}}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name , old('name')  }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email , old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone , old('phone') }}" required autocomplete="phone">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>
                                    <div class="col-md-6">
                                        <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ Auth::user()->age , old('age') }}" required autocomplete="age">
                                        @error('age')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                    <div class="col-md-6">
                                        <input id="age" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address , old('address') }}" required autocomplete="address">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="job" class="col-md-4 col-form-label text-md-right">{{ __('Job') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control @error('job') is-invalid @enderror" required name="job" id="job">
                                            <option @if(Auth::user()->job == 'work') selected @endif value="work">Work</option>
                                            <option @if(Auth::user()->job == 'student') selected @endif value="student">Student</option>
                                        </select>
                                        @error('job')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 m-auto">
                                        <div class="input-group mb-3">
                                            <input name="avatar" type="file" class=" @error('avatar') is-invalid @enderror" id="avatar" >
                                        </div>
                                        <input type="hidden" name="old_avatar" value="{{ Auth::user()->avatar }}">

                                        @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="card-body">
                            @include('message._message',['updateIt'=>'Update successfully','NotupdateIt'=>'Tray Again'])
                            <form method="POST" enctype="multipart/form-data" action="{{ route('user.password.update') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name , old('name')  }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email , old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone , old('phone') }}" required autocomplete="phone">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>
                                    <div class="col-md-6">
                                        <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ Auth::user()->age , old('age') }}" required autocomplete="age">
                                        @error('age')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                    <div class="col-md-6">
                                        <input id="age" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address , old('address') }}" required autocomplete="address">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="job" class="col-md-4 col-form-label text-md-right">{{ __('Job') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control @error('job') is-invalid @enderror" required name="job" id="job">
                                            <option @if(Auth::user()->job == 'work') selected @endif value="work">Work</option>
                                            <option @if(Auth::user()->job == 'student') selected @endif value="student">Student</option>
                                        </select>
                                        @error('job')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8 m-auto">
                                        <div class="input-group mb-3">
                                                <input name="avatar" type="file" class=" @error('avatar') is-invalid @enderror" id="avatar" >
                                        </div>
                                        <input type="hidden" name="old_avatar" value="{{ Auth::user()->avatar }}">

                                        @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group row">
                                    <label for="old_password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password"  autocomplete="old-password">

                                        @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
            <div class="col-4 profile">
                <h1 class="card-title card-header">{{ __('Profile') }}</h1>
                <div class="card card-body">
                    @if(!Auth::user()->avatar)
                        <img class="profileAvatar" style="border: 2px solid black; border-radius: 100%" src="{{Auth::user()->defaultProfilePhotoUrl()}}" alt="avatar">
                    @else
                        <img class="profileAvatar" src="{{asset(Auth::user()->avatar)}}" alt="{{asset(Auth::user()->avatar)}}">
                    @endif

                    @if(Auth::user()->status_question == 2)
                        <h3>{{Auth::user()->name}}</h3>
                        <hr>
                        <h5>{{Auth::user()->phone}}</h5>
                        <h4>{{Auth::user()->job}}</h4>
                        <h6><a class="btn badge-dark" href="{{route('user.quiz.show.cv')}}">My CV</a></h6>
                        <hr>
                        @if(Auth::user()->password)
                            <h6><button  class="btn badge-danger" href="" data-toggle="modal" data-target="#Delete_account_Modal">Delete Account</button></h6>
                        @else
                            <div class="alert alert-info">
                                <p>if you need delete Account,Add Password</p>
                            </div>
                        @endif
                    @elseif(Auth::user()->status_question == 1)
                        <div class="alert alert-warning">
                            <p>Questions are under review. <br> <strong><a href="{{route('user.quiz.show.answers')}}"> Show Your Answer!</a></strong> </p>
                        </div>
                    @else
                        <div class="alert alert-danger">
                            <p>You Must Complete Your Profile, <strong><a href="{{route('user.quiz')}}">Go!</a></strong> </p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="Delete_account_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('delete.account.user',Auth::id())}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <label for="password">Please Enter Your Password</label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autofocus autocomplete="old_password">
                             @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete Account</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // $('#myModal').on('shown.bs.modal', function () {
        //     e.preventDefault();
        //     $('#delete_account').trigger('focus')
        // })



        // $(document).on("click", "#delete_account", function(e){
        //     e.preventDefault();

            // var link = $(this).attr("href");
            // swal({
            //     title: "Are you Want to delete?",
            //     text: "Once Delete, This will be Permanently Delete!",
            //     icon: "warning",
            //     buttons: true,
            //     dangerMode: true,
            // })
            //     .then((willDelete) => {
            //         if (willDelete) {
            //             window.location.href = link;
            //         }
            //     });
        // });
    </script>
@endsection
