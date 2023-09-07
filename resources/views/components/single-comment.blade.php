@props(['comment'])

<div class="card px-3 py-1 shadow-sm my-2">
    <div class="card-title d-flex gap-3 justify-content-between align-items-center">
      <div class="d-flex align-items-center gap-3">
        <img src="https://i.pravatar.cc/300" alt="" style="width: 40px;height:40px;border-radius:50%; ">
        <div class="d-flex flex-column">
          <span>{{ $comment->user->name }}</span>
          <span>{{$comment->created_at->diffForHumans()}}</span>
        </div>
      </div>
      <div  class="comment d-flex flex-column gap-2">
          @if (auth()->id() === $comment->user->id)
            <form action="/blogs/comments/{{$comment->id}}/edit" method="GET">
              <button type="submit" class="icon">
                <i class="fa-solid fa-pen text-secondary cursor-wait"></i>
              </button>
            </form>

            <form action="/blogs/comments/{{$comment->id}}/delete" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="icon">
                <i class="fa-solid fa-trash text-danger"></i>
              </button>
            </form>
          @endif
      </div>
    </div>
    <div class="card-content my-3">
      {{ $comment->body }}
    </div>
  </div>