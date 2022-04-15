@extends('layouts.app')

@section('index') create @endsection

@section('sec')
    <div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titel</th>
        <th scope="col">descrption </th>
        <th scope="col">Posted_by </th>
        <th scope="col">created_at </th>
        <th scope="col">Action </th>
      </tr>
    </thead>
    <tbody>
      @foreach ( $allPosts as $post)
      <tr>
        <td>{{$post['id']}}</th>
        <td>{{$post['title']}}</td>
        <td>{{$post['descreption']}}</td>
        <td>{{$post->user}}</td>    
        <td>{{$post['created_at']->format('Y-m-d')}}</td>
        <td>
          <a href="{{route('posts.show', ['post' => $post['id']])}}" class="btn btn-info">View</a>
          <a href="/posts/{{$post['id']}}/edit" class="btn btn-primary">Edit</a>
          <form action="{{ route('posts.delete',['post' => $post['id']]) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onClick="if(!confirm('Is the form filled out correctly?')){return false;}" type="submit" class="btn btn-danger mr-2">Delete</button>
                </form>
        </td>
      </tr>
      @endforeach
  </table>
  <div class="text-center">
    <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
  </div>
</div>
{{ $allPosts->links() }}
@endsection
