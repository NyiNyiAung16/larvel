@props(['comment'])

<div class="card px-3 py-1 shadow-sm my-2">
    <div class="card-title d-flex gap-3">
      <img src="https://i.pravatar.cc/300" alt="" style="width: 40px;height:40px;border-radius:50%; ">
      <div class="d-flex flex-column">
        <span>Nyi Nyi Aung</span>
        <span>{{$comment->created_at->diffForHumans()}}</span>
      </div>
    </div>
    <div class="card-content my-3">
      {{ $comment->body }}
    </div>
  </div>