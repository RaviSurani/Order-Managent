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



                    @if (isset($categoryMaster))
                        <form method="post" action="/categorys/{{ $categoryMaster->id }}/update">
                        @else
                            <form method="post" action="/categorys">
                    @endif
                    @method('POST')
                    @csrf
                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ __('category Details') }}</h4>
                        <div class=" mb-1" role="group" aria-label="Basic example">
                            <button class="btn btn-primary mx-1 h-100">Save</button>
                            <a href="/categorys" class="btn btn-danger mx-1 h-100">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div>
                            <label for="basic-url">Category Name</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="category" name="category"
                                    placeholder="Category"
                                    @if (isset($categoryMaster)) value="{{ $categoryMaster->category }}" 
                                @else  value="{{ old('category') }}" @endif />
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="basic-url">Code </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="code" name="code" placeholder="code"
                                    @if (isset($categoryMaster)) value="{{ $categoryMaster->code }}" 
                                @else  value="{{ old('code') }}" @endif />
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
