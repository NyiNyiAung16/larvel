<section class="container my-5 text-center" id="subscribe">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <h3 class="fw-bold mb-4">Subscribe For new blogs</h3>
        <form action="/subscribeNewBlogs" method="POST">
          @csrf
          <div class="mb-3">
            <input
              name="email"
              placeholder="Email Address"
              type="email"
              class="form-control"
              autocomplete="false"
            />
          </div>
          @error('email')
              <p class="text-danger">{{ $message }}</p>
          @enderror
          @auth
            @if (auth()->user()->is_subscribe)
                <button type="submit" class="btn btn-danger" >Unsubscribe</button>
            @else
                <button type="submit" class="btn btn-primary">Subscribe Now</button>
            @endif  
          @endauth
        </form>
      </div>
    </div>
  </section>