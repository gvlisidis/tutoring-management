@extends('crud.index')

@section('title', 'My active students')

@section('controls')
    <a href="{{ route( 'students.create' ) }}" class="btn btn-success">Add a new student</a>
    <a href="{{ route( 'students.archive' ) }}" class="btn btn-primary">Archive</a>
@endsection

@section('index')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Address</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse( $students as $student )
            <tr class="record" data-type="archive">
                <td class="name">{{ $student->name }}</td>
                <td>{{ $student->lastname }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->telephone }}</td>
                <td class="student-address">{{ $student->address }}</td>
                <td class="text-right">
                    <a href="{{ route('lessons.index', $student) }}" class="btn btn-primary">Lessons</a>
                    <a href="{{ route( 'students.edit', $student ) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route( 'students.archive-student', $student ) }}" class="btn btn-danger archive">Archive</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">There are no students in the database</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="text-center">
        {{ $students->links() }}
    </div>
@endsection
