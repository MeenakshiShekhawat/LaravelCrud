@extends('layouts.app')
@section('main')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3 p-3">
                    <form action="/products/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                          @if($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" rows="4" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
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