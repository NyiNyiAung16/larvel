<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />
</head>
<body>
    <div class="card mx-auto">
        <div class="card-body">
          <h3 class="card-title">{{$blog->title}}</h3>
          <p class="fs-6 text-secondary">
            <span class="text-decoration-none">{{$blog->author->name}}</span>
            <span> - {{ $blog->created_at->diffForHumans() }}</span>
          </p>
          <div class="tags my-3">
            <span class="badge bg-primary">
              <span class="text-white text-decoration-none">{{$blog->category->name}}</span>
            </span>
          </div>
          <p class="card-text">
           {{$blog->intro}}
          </p>
        </div>
      </div>
</body>
</html>