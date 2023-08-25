<x-layout>
    <h2>Login User Account</h2>
    <form action="/login" method="POST">
        @csrf
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
        @error('password')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <div>
            <button type="submit">login</button>
        </div>
    </form>
    </x-layout>