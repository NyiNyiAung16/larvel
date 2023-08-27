
<x-layout>
    <!-- single blog section -->
    <div class="container mb-3">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{ $blog->title }}</h3>
          <div>
            <div class="d-flex gap-4 justify-content-center">
                <span>
                    Author - <a href="/authors/{{$blog->author->name}}">{{$blog->author->name}}</a>
                </span>
                <p class="text-secondary">{{ $blog->created_at->diffForHumans() }}</p>
            </div>
            <p class="badge bg-primary">
              <a href="/categories/{{$blog->category->name}}" class="text-white text-decoration-none">{{ $blog->category->name }}</a>
            </p>
          </div>
          <p class="lh-md">{{ $blog->body }}</p>
        </div>
      </div>
    </div>

    <div class="container">
      <form class="container " style="width: 500px;" action="/blogs/{{$blog->slug}}/comments" method="post">
        @csrf
        <label for="" class="text-secondary">Comment Here</label>
        <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
        <button class="btn btn-primary my-2" type="submit">comment</button>
      </form>
    </div>

    <x-comments :comments="$blog->comments()->latest()->get()" />
    <x-subscribe />
    <x-blogs-you-may-like-section :randomBlogs="$randomBlogs" />
    <!-- footer -->
</x-layout>

