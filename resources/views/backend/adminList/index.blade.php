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
                                <a class="btn btn-primary" href="{{ route('adminList.create') }}">go to create</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">name</th>
                                        <th scope="col">role</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) === 0)
                                        <tr>
                                            <td colspan="7" class="text-center"> No list created</td>
                                        </tr>
                                    @endif

                                    @foreach ($data as $val)
                                        <tr>
                                            <td>{{ $val->id }}</td>
                                            <td>{{ $val->name }}</td>
                                            <td>{{ !empty($val->roles->first()->name)? $val->roles->first()->name : 'NULL'}}</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('adminList.edit', $val->id) }}">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('adminList.destroy', $val->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('Are u sure want to delete')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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

@section('js')
    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                'ordering': true
            });
        });
    </script>
@endsection
