@extends('dashboard')

@section('content')
<h2 class="mb-4">Employee Project Assignments</h2>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Employee Name</th>
            <th>Email</th>
            <th>Assigned Projects</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $index => $employee)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>
                    @forelse($employee->projects as $project)
                        <span class="badge bg-primary">{{ $project->name }}</span>
                    @empty
                        <span class="text-muted">No Projects Assigned</span>
                    @endforelse
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection