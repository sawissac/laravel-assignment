@extends('backend.layout.master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title">Create List</h1>
                        </div>

                        <form action="{{ route('role.store') }}" method="POST">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name"
                                        name="name">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            @foreach ($permission as $per)
                                <div class="form-check">
                                    <input type="checkbox" name="role[]" value={{ $per->id }} id={{ $per->name }} checked>
                                    <label for={{ $per->name }}>
                                        {{ $per->name }}
                                    </label>
                                </div>
                            @endforeach
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
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
