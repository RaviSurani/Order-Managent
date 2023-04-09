@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="btn-group w-100 mb-1" role="group" aria-label="Basic example">
                <a href="/order"type="button" class="btn btn-primary mx-1">Order</a>
                <a href="/item"type="button" class="btn btn-primary mx-1">Item</a>
                <a href="/project"type="button" class="btn btn-primary mx-1">Project</a>
                <a href="/categorys" class="btn btn-primary mx-1">categorys</a>
            </div>

            <div class="col-md-12">
                <div class="card">



                    @if (isset($itemMaster))
                        <form method="post" action="/item/{{ $itemMaster->id }}/update" enctype="multipart/form-data">
                        @else
                            <form method="post" action="/item" enctype="multipart/form-data">
                    @endif
                    @method('POST')
                    @csrf
                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ __('Item Details') }}</h4>
                        <div class=" mb-1" role="group" aria-label="Basic example">
                            <button class="btn btn-primary mx-1 h-100">Save</button>
                            <a href="/item" class="btn btn-danger mx-1 h-100">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div>
                            <label for="basic-url">Item Name</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                    @if (isset($itemMaster)) value="{{ $itemMaster->name }}" 
                                @else  value="{{ old('name') }}" @endif />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Code </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="code" name="code" placeholder="code"
                                    @if (isset($itemMaster)) value="{{ $itemMaster->code }}" 
                                @else  value="{{ old('code') }}" @endif />
                                @error('code')
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
                            <label for="basic-url">Gross Weight </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="gross_weight" name="gross_weight"
                                    placeholder="gross_weight"
                                    @if (isset($itemMaster)) value="{{ $itemMaster->gross_weight }}" 
                                @else  value="{{ old('gross_weight') }}" @endif />
                                @error('gross_weight')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="basic-url">Image </label>
                            <div class="mb-3">
                                @if (isset($itemMaster))
                                    <img src="{{ asset('image/' . $itemMaster->image) }}" style="width: 150px;" />
                                @else
                                    <input type="file" class="form-control" id="image" name="image"
                                        placeholder="image" />
                                @endif
                                @error('image')
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
