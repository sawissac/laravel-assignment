<link rel='stylesheet' href='{{ asset('css/bootstrap.css') }}' />

<div class="container w-50 mx-auto mt-5">
    <a class="btn btn-primary" href="{{ route('post.index') }}">go to back</a>
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <h1 class="mt-4">Create Page</h1>
        <div class="form-group py-2 my-2">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="title" name="title">
        </div>
        <div class="form-group py-2 my-2">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="description" name="description">
        </div>
        
        <label for="active">
            <input type="radio" name="status" value="active" id="active" checked>
            active
        </label>
        <label for="suspended">
            <input type="radio" name="status" value="suspended" id="suspended">
            subspend
        </label>
        <br />
        <button type="submit" class="btn btn-primary mt-4">Create</button>
    </form>
</div>



<script src='{{ asset('js/bootstrap.js') }}'></script>
