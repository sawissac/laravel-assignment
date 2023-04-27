@extends('backend.layout.master')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="d-flex justify-content-between align-items-center px-4 pt-4">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
                            <div>
                                <a class="btn btn-primary" href="">go to create</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">title</th>
                                        <th scope="col">description</th>
                                        <th scope="col">image</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->description }}</td>
                                        <td>
                                            <img src="{{asset("storage/".$post->image)}}" alt="image" width="100" >
                                        </td>
                                        <td>{{ $post->author->name }}</td>
                                        @if ($post->is_active)
                                            <td class="text-success">active</td>
                                        @else
                                            <td class="text-danger">subspended</td>
                                        @endif

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
