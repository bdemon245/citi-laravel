@extends('layouts.app')

@section('page-title', "View Post")

@section('content')
<div class="container-md">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Detail</th>
            <th scope="col" class="text-center">Actons</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $key=>$post)
              
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->detail}}</td>
            <td class="d-flex gap-3 justify-content-center">
              <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary">Edit</a>
             <form action="{{route('post.delete', $post->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">Delete</button>
             </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="paginate">
        {{$posts->links()}}
      </div>
      @if (session()->has('success'))
        {{toastr(session(success))}}
@endif

@if (session()->has('info'))
{{toastr(session(info))}}
@endif
</div>
@endsection