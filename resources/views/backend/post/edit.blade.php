@extends('backend.layout.master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title">
                                Edit List
                            </h1>
                        </div>
                        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PATCH')
                                <div class="form-group  py-2 my-2">
                                    <label for="email">Title</label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter email"
                                        name="title" value="{{ $post->title }}">
                                    @if ($errors->has('title'))
                                        <div class="text-danger">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                                <div class="form-group  py-2 my-2">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" placeholder="Password"
                                        name="description" value="{{ $post->description }}">
                                    @if ($errors->has('description'))
                                        <div class="text-danger">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                                <div class="form-check pl-0">
                                    <input type="radio" name="status" value="active" id="active"
                                        {{ $post->is_active ? 'checked' : '' }}>
                                    <label for="active">
                                        active
                                    </label>
                                    <input type="radio" name="status" value="suspended" id="suspended"
                                        {{ !$post->is_active ? 'checked' : '' }}>
                                    <label for="suspended">
                                        suspended
                                    </label>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" value="{{$post->image}}"
                                            id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                                @if ($errors->has('image'))
                                    <div class="text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
