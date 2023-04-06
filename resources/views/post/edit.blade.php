<link rel='stylesheet' href='{{ asset('css/bootstrap.css') }}' />

<div class="container w-50 mx-auto mt-5">
    <a class="btn btn-primary" href="{{ route('post.index') }}">go to back</a>
    <form action="{{ route('post.update', $data->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <h1 class="mt-4">Edit Page</h1>
        <div class="form-group  py-2 my-2">
            <label for="email">Title</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="title"
                value="{{ $data->title }}">
        </div>
        <div class="form-group  py-2 my-2">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="Password" name="description"
                value="{{ $data->description }}">
        </div>
        <label for="active">
            <input type="radio" name="status" value="active" id="active"
                {{ $data->is_active ? 'checked' : '' }}>
            active
        </label>
        <label for="suspended">
            <input type="radio" name="status" value="suspended" id="suspended"
                {{ !$data->is_active ? 'checked' : '' }}>
            suspended
        </label>
        <br />
        <button type="submit" class="btn btn-primary mt-4">Update</button>
    </form>
</div>



<script src='{{ asset('js/bootstrap.js') }}'></script>
