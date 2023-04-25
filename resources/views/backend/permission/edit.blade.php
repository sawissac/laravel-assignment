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
                        <form action="{{ route('permission.update', $permission->id) }}" method="POST">
                            <div class="card-body">
                                @csrf
                                @method('PATCH')
                                <div class="form-group  py-2 my-2">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" value="{{ $permission->name }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
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
