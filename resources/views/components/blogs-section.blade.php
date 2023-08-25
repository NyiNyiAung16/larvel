@props(['blogs'])

<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
      <x-categoryDropdown />
    </div>
    <form action="/" class="my-3">
      @if (request('category'))
          <input type="hidden" name="category" value="{{request('category')}}">
      @endif
      @if (request('author'))
          <input type="hidden" name="author" value="{{request('author')}}">
      @endif
      <div class="input-group mb-3">
        <input
          type="text"
          autocomplete="off"
          class="form-control"
          placeholder="Search Blogs..."
          name="search"
          value="{{request('search')}}"
        />
        <button
          class="input-group-text bg-primary text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
    <div class="row">
      @forelse ($blogs as $blog)
        <div class="col-md-4 mb-4">
          <x-blog-card :blog="$blog" />
        </div> 

      @empty
      <div>
        <img src="/images/nothingSearch.jpg" alt="..." class="border rounded-1" style="width: 250px">
        <p class="fs-4">Nothing to search!</p>
      </div>
      @endforelse
      {{$blogs->links()}}
    </div>
  </section>