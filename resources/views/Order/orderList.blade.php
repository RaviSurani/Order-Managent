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
                        <h4>{{ __('City List') }}</h4>
                        <a href="/order/create" class="btn btn-primary btn-sm h-100">Add New</a>
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
                                    <th scope="col">name</th>
                                    <th scope="col">remarks</th>
                                    <th scope="col">qnt</th>
                                    <th scope="col">category</th>
                                    <th scope="col">item</th>
                                    <th scope="col">project_id</th>
                                    <th scope="col" class="w-25">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderList as $order)
                                    <tr>
                                        <th scope="row">{{ $order->id }}</th>
                                        <th scope="row">{{ $order->name }}</th>
                                        <th scope="row">{{ $order->remarks }}</th>
                                        <th scope="row">{{ $order->qnt }}</th>
                                        <th scope="row">{{ $order->Category->category }}</th>
                                        <th scope="row">{{ $order->Item->name }}</th>
                                        <th scope="row">{{ $order->Project->project }}</th>
                                        <td>
                                            <form method="post" action="{{ "order/$order->id/delete" }}">
                                                @method('post')
                                                @csrf
                                                <div class="btn-group w-100 mb-1" role="group" aria-label="Basic example">
                                                    <a href="{{ "order/$order->id/edit" }}"
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
