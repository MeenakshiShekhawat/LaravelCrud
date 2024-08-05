@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3 p-3">
                    <h3 class="text-muted">Product Edit # {{ $product->name }}</h3>
                    <form action="/products/{{$product->id}}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $product->name) }}">
                          @if($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" rows="4" class="form-control" placeholder="Description">{{ old('description',$product->description) }}</textarea>
                            @if($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                            @if($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection