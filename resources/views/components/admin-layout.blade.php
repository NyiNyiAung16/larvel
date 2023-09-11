<x-layout>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="/admin">Dashboard</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin/blogs/create">Blogs Create</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                {{$slot}}
            </div>
        </div>
    </div>
</x-layout>