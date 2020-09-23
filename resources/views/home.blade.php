@extends('layouts.app')
@section('title','home User')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Job') }}</div>

                @if($user->status_question == 0)
                    <div class="alert alert-danger text-center" style="margin: 5px auto ; width: 50%" role="alert">
                        Sorry, You must be Completed your Profile!
                        <label class="badge badge-success">
                            <a class="alert-link" href="{{route('user.profile')}}">Profile</a>
                        </label>
                    </div>
                @elseif($user->status_question == 1)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hi {{$user->name}}!</strong> You can browse jobs, but if you want to apply for a job you must complete your profile.
                        <label class="badge badge-success">
                            <a class="link alert-link" href="{{route('user.profile')}}">Profile</a>
                        </label>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name Job</th>
                            <th scope="col">Title Job</th>
                            <th scope="col">Price</th>
                            <th scope="col">Experience</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>

                        @forelse($jobs as $index=>$job)
                            <tbody>
                            <tr>
                                <th scope="row">{{++$index}}</th>
                                <td>{{$job->name}}</td>
                                <td>{{$job->title}}</td>
                                <td>$ {{$job->price}}</td>
                                <td>{{$job->experience }}</td>
                                <td>
                                    <a class="btn btn-info" href="">Details</a>
                                </td>
                            </tr>

                            </tbody>
                        @empty
                            <tbody>
                                <tr>
                                    <th colspan="5">No Jop Add Yet</th>
                                </tr>
                            </tbody>
                        @endforelse

                    </table>
                </div>
                <div class="text-center">
                    {{ $jobs->links() }}
                </div>
                @else
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name Job</th>
                                <th scope="col">Title Job</th>
                                <th scope="col">Price</th>
                                <th scope="col">Experience</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>

                            @forelse($jobs as $index=>$job)
                                <tbody>
                                <tr>
                                    <th scope="row">{{++$index}}</th>
                                    <td>{{$job->name}}</td>
                                    <td>{{$job->title}}</td>
                                    <td>$ {{$job->price}}</td>
                                    <td>{{$job->experience }}</td>
                                    <td>
                                        <a class="btn btn-info" href="">Details</a>
                                    </td>
                                </tr>

                                </tbody>
                            @empty
                                <tbody>
                                <tr>
                                    <th colspan="5">No Jop Add Yet</th>
                                </tr>
                                </tbody>
                            @endforelse

                        </table>
                    </div>
                    <div class="text-center">
                        {{ $jobs->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
