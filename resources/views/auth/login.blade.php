<x-layout>

    <div class="form-control">
        <form action="/login" method="POST" class="my-3">
            <h3 class="my-2" style="color: rgba(0, 0, 0, 0.5);text-align:center;" >Login User Account</h3>
            @csrf
            <div class="">
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
                <button type="submit" class="button">login</button>
            </div>
        </form>
    </div>

</x-layout>