
<x-layout>
    <!-- singloe blog section -->
    <div class="container mb-3" style="border-bottom: 1px solid gray">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{ $blog->title }}</h3>
          <p class="lh-md">{{ $blog->body }}</p>
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
        </div>
      </div>
    </div>

    <!-- subscribe new blogs -->
    <x-subscribe />
    <x-blogs-you-may-like-section :randomBlogs="$randomBlogs" />
    <!-- footer -->
</x-layout>

