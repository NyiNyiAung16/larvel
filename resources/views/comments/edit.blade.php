@props(['comment'])

<x-layout>
    <form action="/blogs/comments/{{$comment->id}}/edit" method="post" class="my-3 mx-auto" style="max-width: 500px" >
        @csrf
        @method('put')
        <label for="body">Comment body</label>
        <input type="text" name="body" class="form-control">
        <button class="btn btn-primary mt-3" type="submit">Edit Comment</button>
    </form>
</x-layout>