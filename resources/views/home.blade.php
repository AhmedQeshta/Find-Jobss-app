@extends('layouts.app')
@section('title','home User')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Job') }}</div>

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
            </div>
        </div>
    </div>
</div>
@endsection
