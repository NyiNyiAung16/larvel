
<x-admin-layout>
    <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label>Blog Title</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('title')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label>Blog Slug</label>
            <input type="text" name="slug" class="form-control" id="exampleInputPassword1" >
          </div>
          @error('slug')
              <p class="text-danger">{{$message}}</p>
          @enderror
        <div class="form-group">
            <label>Blog Photo</label>
            <input type="file" name="photo" class="form-control" id="exampleInputPassword1" >
          </div>
          @error('photo')
              <p class="text-danger">{{$message}}</p>
          @enderror
        <div class="form-group">
            <label>Blog Intro</label>
            <input type="text" name="intro" class="form-control" id="exampleInputPassword1" >
        </div>
        @error('intro')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label>Blog Body</label>
            <textarea class="form-control" name="body" id="" cols="30" rows="10">
            </textarea>
          </div>
          @error('body')
              <p class="text-danger">{{$message}}</p>
          @enderror
        <div class="form-group">
            <label>Blog Category</label>
            <select name="category_id" class="form-control" name="" id="">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        @error('category_id')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-2">Create Blog</button>
    </form>
</x-admin-layout>