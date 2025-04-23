@extends('dashboard')

@section('content')

<h2 class="mb-4">All Projects</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Project Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $index => $project)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description ?? 'N/A' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection