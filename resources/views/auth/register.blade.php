<x-layout>
<div class="form-control">
    <form action="/register" method="POST" class="my-3">
        <h3>Creater User Account</h3>
        @csrf
        <div>
            <label for="">Name:</label>
            <input type="text" value="{{old('name')}}" name="name">
        </div>
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div>
            <label for="">Username:</label>
            <input type="text" value="{{old('username')}}" name="username">
        </div>
        @error('username')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div>
            <label for="">Email:</label>
            <input type="email" value="{{old('email')}}" name="email">
        </div>
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div>
            <label for="">Password:</label>
            <input type="password" name="password">
        </div>
        <div>
            <label for="">Confirm Password:</label>
            <input type="password" name="password_confirmation">
        </div>
        @error('password')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div>
            <button type="submit" class="button">register</button>
        </div>
    </form>
</div>
</x-layout>