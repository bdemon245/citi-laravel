@extends('layouts.app')

@section('page-title', "Edit Post")

@section('content')
<div class="container-md">
    <div class="card">
        <div class="card-title">
            <div class="card-body">
                <form action="{{route('post.update', $post->id)}}" method="POST">
                  @csrf
                  @method('put')
                    <div class="mb-3">
                        <label for="title">Enter a title</label>
                      <input name="title" type="text" class="form-control" id="title" placeholder="Your Title.." value="{{$post->title}}">
                      @error('title')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label for="detail">Enter detail</label>
                     <textarea class="form-control" name="detail" id="detail" cols="" rows="10" placeholder="Enter your detail...">{{$post->detail}}</textarea>
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

@endsection