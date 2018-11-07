@extends('crud.index' )

@section('title', 'Lessons history')

@section('controls')
    <a href="{{ route( 'lessons.create', $student ) }}" class="btn btn-success pull-right">Add a new lesson</a>
@endsection

@section('index')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Course</th>
            <th>Date</th>
            <th>Time</th>
            <th>Notes</th>
            <th>Price</th>
            <th>Paid</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse( $lessons as $lesson )
            <tr class="record" data-type="archive">
                <td>{{ $lesson->course->name }}</td>
                <td>{{ $lesson->date }}</td>
                <td>{{ $lesson->time }}</td>
                <td>{{ $lesson->notes }}</td>
                <td>{{ $lesson->price }}</td>
                <td>{{ $lesson->paid }}</td>
                <td class="text-right">
                    <a href="{{ route( 'lessons.edit', $lesson ) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route( 'lessons.delete', $lesson ) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">There are no lessons in the database</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="text-center">
        {{ $lessons->links() }}
    </div>
@endsection
