<link rel='stylesheet' href='{{ asset('css/bootstrap.css') }}' />

<div class="container w-50 mx-auto mt-5">
    <a class="btn btn-primary" href="{{ route('post.create') }}">go to create</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">View</th>
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
                    <td>{{ $val->title }}</td>
                    <td>{{ $val->description }}</td>

                    {{-- ? this --}}
                    {{-- <td class="{{$val->is_active ? "text-success" : "text-danger"}}">
                        {{$val->is_active ? "active" : "suspended"}}
                    </td> --}}

                    {{-- ? or this what should I choose or is there another way --}}
                    @if ($val->is_active)
                        <td class="text-success">active</td>
                    @else
                        <td class="text-danger">suspended</td>
                    @endif

                    <td>
                        <a class="btn btn-success" href="{{ route('post.show', $val->id) }}">View</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('post.edit', $val->id) }}">Edit</a>
                    </td>

                    <td>
                        <form action="{{ route('post.destroy', $val->id) }}" method="POST">
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

<script src='{{ asset('js/bootstrap.js') }}'></script>
