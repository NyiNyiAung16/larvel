@props(['comment'])

<x-layout>
    <form action="/blogs/comments/update/{{$comment->id}}" method="post" class="my-3 mx-auto" style="max-width: 500px" >
        @csrf
        @method('put')
        <label for="body">Comment body</label>
        <textarea class="form-control" name="body" id="" cols="30" rows="10">{{$comment->body}}</textarea>
        <button class="btn btn-primary mt-3" type="submit">Edit Comment</button>
    </form>
</x-layout>