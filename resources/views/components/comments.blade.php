@props(['comments'])

<div class="" style="width: 450px;margin:auto;">
    <h3 style="color: rgba(0, 0, 0,0.5)">Comments ({{$comments->count()}})</h3>

    @foreach ($comments as $comment)
        <x-single-comment :comment="$comment" /> 
    @endforeach

  </div>