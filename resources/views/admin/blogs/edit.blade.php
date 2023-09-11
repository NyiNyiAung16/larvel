@props(['categories','blog'])
<x-admin-layout>
    <form action="/admin/blogs/{{$blog->slug}}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
          <label>Edit Title</label>
          <input type="text" name="title" class="form-control" value="{{old('title',$blog->title)}}" >
        </div>
        @error('title')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label>Edit Slug</label>
            <input type="text" name="slug" class="form-control" value="{{old('slug',$blog->slug)}}" >
          </div>
          @error('slug')
              <p class="text-danger">{{$message}}</p>
          @enderror
          <div class="form-group">
            <label>Edit Photo</label>
            <input type="file" name="photo" class="form-control" value="{{old('photo',$blog->photo)}}" >
          </div>
          @error('photo')
              <p class="text-danger">{{$message}}</p>
          @enderror
        <div class="form-group">
            <label>Edit Intro</label>
            <input type="text" name="intro" class="form-control"  value="{{old('slug',$blog->intro)}}" >
        </div>
        @error('intro')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label for="body">Edit Body</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10">
                {{old('body',$blog->body)}}
            </textarea>
          </div>
          @error('body')
              <p class="text-danger">{{$message}}</p>
          @enderror
        <div class="form-group">
            <label for="category">Edit Category</label>
            <select name="category_id" class="form-control" id="category">
                @foreach ($categories as $category)
                    <option {{$category->id == old('category_id',$blog->category_id) ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        @error('category_id')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-2">Edit Blog</button>
    </form>
</x-admin-layout>