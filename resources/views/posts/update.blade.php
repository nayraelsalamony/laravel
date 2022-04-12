<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update</title>
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
    <form action="{{ route('posts.update',['post' => $postShow['id']]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="my-5">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{$postShow->title}}">
    </div>
    <div class="mb-5">
        <label class="form-label d-block">Description</label>
        <textarea rows="5" name="descreption" class="w-100 form-control">{{$postShow->description}}</textarea>
    </div>
    <div class="mb-5">
        <label class="form-label d-block">Post Creator</label>
        <select class="w-100 form-control" name="creator">
            @foreach ($creators as $creator){
            <option value="{{$creator->id}}"> {{$creator->name}} </option>
            @endforeach

        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>