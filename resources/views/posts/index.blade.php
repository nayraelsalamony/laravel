
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lap2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">ITI Blog Post</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" href="#">All Posts</a>
          </div>
        </div>
      </nav>
    <div class="container">
        
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
        <td>{{$post['creator']}}</td>
        <td>{{$post['created_at']}}</td>
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

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
    </html>
