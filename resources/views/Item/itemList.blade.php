@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="btn-group w-100 mb-1" role="group" aria-label="Basic example">
                <a href="/order"type="button" class="btn btn-primary mx-1">Order</a>
                <a href="/item"type="button" class="btn btn-primary mx-1">Item</a>
                <a href="/project"type="button" class="btn btn-primary mx-1">project</a>
                <a href="/categorys" class="btn btn-primary mx-1">categorys</a>
            </div>
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ __('Item List') }}</h4>
                        <a href="/item/create" class="btn btn-primary btn-sm h-100">Add New</a>
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
                                    <th scope="col">Item</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Gross Weight</th>
                                    <th scope="col" class="w-25">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemList as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <th scope="row">{{ $item->name }}</th>
                                        <th scope="row">{{ $item->code }}</th>
                                        <th scope="row">{{ $item->Category->category }}</th>
                                        <th scope="row">{{ $item->Project->project }}</th>
                                        <th scope="row">{{ $item->gross_weight }}</th>
                                        <td>
                                            <form method="post" action="{{ "item/$item->id/delete" }}">
                                                @method('post')
                                                @csrf
                                                <div class="btn-group w-100 mb-1" role="group" aria-label="Basic example">
                                                    <a href="{{ "item/$item->id/edit" }}"
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
