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
          @can('edit',$comment)
            <form action="/blogs/comments/edit/{{$comment->id}}" method="GET">
              <button type="submit" class="icon">
                <i class="fa-solid fa-pen text-secondary cursor-wait"></i>
              </button>
            </form>
          @endcan

          @can('delete',$comment)
            <form action="/blogs/comments/delete/{{$comment->id}}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="icon">
                <i class="fa-solid fa-trash text-danger"></i>
              </button>
            </form>
          @endcan
      </div>
    </div>
    <div class="card-content my-3">
      {{ $comment->body }}
    </div>
  </div>