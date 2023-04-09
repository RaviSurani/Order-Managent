@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="btn-group w-100 mb-1" role="group" aria-label="Basic example">
                <a href="/order"type="button" class="btn btn-primary mx-1">Order</a>
                <a href="/item"type="button" class="btn btn-primary mx-1">item</a>
                <a href="/project"type="button" class="btn btn-primary mx-1">project</a>
                <a href="/categorys" class="btn btn-primary mx-1">categorys</a>
            </div>
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ __('Project List') }}</h4>
                        <a href="/project/create" class="btn btn-primary btn-sm h-100">Add New</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Code</th>
                                    <th scope="col" class="w-25">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projectList as $project)
                                    <tr>
                                        <th scope="row">{{ $project->id }}</th>
                                        <th scope="row">{{ $project->project }}</th>
                                        <th scope="row">{{ $project->code }}</th>
                                        <td>
                                            <form method="post" action="{{ "project/$project->id/delete" }}">
                                                @method('post')
                                                @csrf
                                                <div class="btn-group w-100 mb-1" role="group" aria-label="Basic example">
                                                    <a href="{{ "project/$project->id/edit" }}"
                                                        class="btn btn-primary btn-sm ">Edit</a>
                                                    <button class="btn btn-danger btn-sm">Remove</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
