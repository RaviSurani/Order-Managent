@extends('layouts.app')

{{-- <link href="{{ asset('bootstrap-select.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('bootstrap-select.min.js') }}"></script> --}}

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



                    @if (isset($orderMaster))
                        <form method="post" action="/order/{{ $orderMaster->id }}/update">
                        @else
                            <form method="post" action="/order">
                    @endif
                    @method('POST')
                    @csrf
                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ __('order Details') }}</h4>
                        <div class=" mb-1" role="group" aria-label="Basic example">
                            <button class="btn btn-primary mx-1 h-100">Save</button>
                            <a href="/order" class="btn btn-danger mx-1 h-100">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div>
                            <label for="basic-url">Party Name</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                    @if (isset($orderMaster)) value="{{ $orderMaster->name }}" 
                                @else  value="{{ old('name') }}" @endif />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Remarks </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="remarks" name="remarks"
                                    placeholder="remarks"
                                    @if (isset($orderMaster)) value="{{ $orderMaster->remarks }}" 
                                @else  value="{{ old('remarks') }}" @endif />
                                @error('remarks')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="basic-url">Category </label>
                            <div class="mb-3">

                                <select class="selectpicker form-control " name="category_id">
                                    @foreach ($categoryList as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="basic-url">Project </label>
                            <div class="mb-3">

                                <select class="selectpicker form-control " name="project_id">
                                    @foreach ($projectList as $project)
                                        <option value="{{ $project->id }}">{{ $project->project }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Item </label>
                            <div class="mb-3">
                                <select class="selectpicker form-control " 
                                    name="item_id">
                                    >
                                    @foreach ($itemList as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Qnt</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="qnt" name="qnt" placeholder="qnt"
                                    @if (isset($orderMaster)) value="{{ $orderMaster->qnt }}" 
                                @else  value="{{ old('qnt') }}" @endif />
                                @error('qnt')
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
