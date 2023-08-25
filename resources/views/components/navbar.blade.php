<nav class="navbar" style="background-color: rgb(42, 57, 77)">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
        <a href="/" class="nav-link">Home</a>
        <a href="/#blogs" class="nav-link">Blogs</a>
        <a href="#subscribe" class="nav-link">Subscribe</a>
        @if (auth()->check())
          <span class="nav-link">{{ auth()->user()->name }}</span>
        @endif
        @if (!auth()->check())
          <a href="/login" class="nav-link">login</a>
          <a href="/register" class="nav-link">register</a>

        @else 
        <form action="/logout" method="POST">
          @csrf
          <button class="btn btn-link">logout</button> 
        </form>
        @endif
      </div>
    </div>
  </nav>