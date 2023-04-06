<link rel='stylesheet' href='{{ asset('css/bootstrap.css') }}' />

<div class="container w-50 mx-auto mt-5">
    <a class="btn btn-primary" href="{{ route('post.index') }}">go to back</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $result->id }}</td>
                <td>{{ $result->title }}</td>
                <td>{{ $result->description }}</td>

                @if ($result->is_active)
                    <td class="text-success">active</td>
                @else
                    <td class="text-danger">subspended</td>
                @endif

            </tr>
        </tbody>
    </table>
</div>

<script src='{{ asset('js/bootstrap.js') }}'></script>
