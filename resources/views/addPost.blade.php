@extends('layouts.app')

@section('page-title', "Add Post")

@section('content')
<div class="container-md">
    <div class="card">
        <div class="card-title">
            <div class="card-body">
                <form action="{{route('post.store')}}" method="POST">
                  @csrf
                    <div class="mb-3">
                        <label for="title">Enter a title</label>
                      <input name="title" type="text" class="form-control" id="title" placeholder="Your Title.." value="{{old('title')}}">
                      @error('title')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label for="detail">Enter detail</label>
                     <textarea class="form-control" name="detail" id="detail" cols="" rows="10" placeholder="Enter your detail...">{{old('detail')}}</textarea>
                     @error('detail')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>
@if (session()->has('success'))
        {{toastr(session(success))}}
@endif
@endsection