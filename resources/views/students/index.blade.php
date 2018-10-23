@extends('crud.index')

@section('title', 'Students')

@section('controls')
    <a href="{{ route( 'students.create' ) }}" class="btn btn-success pull-right">Add a new student</a>
@endsection

@section('index')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Last name</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse( $students as $student )
            <tr class="record" data-type="archive">
                <td class="name">{{ $student->name }}</td>
                <td class="name">{{ $student->lastname }}</td>
                <td>{{ $student->email }}</td>
                <td class="text-right">
                    <a href="{{ route( 'students.edit', $student ) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route( 'students.delete', $student ) }}" class="btn btn-danger">Delete</a>
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
