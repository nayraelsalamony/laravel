@extends('layouts.app')

@section('title') create @endsection

@section('sec')

<form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Title</label>
      <input name="title" type="text" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descreption"></textarea>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
      <br>
      <select class="form-control" rows="3" name="creator">
        @foreach ($users as $user)
        <option value="{{$user->id}}"> {{$user->name}} </option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">select image</label>
      <input class="form-control" type="file" id="formFile" name="image">
    </div>
    <button type="submit" class="btn btn-success">Create Post</button>
</form>
@endsection