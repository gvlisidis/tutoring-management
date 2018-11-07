@extends('crud.index')

@section('title', 'My courses')

@section('controls')
    <a href="{{ route( 'courses.create' ) }}" class="btn btn-success pull-right">Add a new course</a>
@endsection

@section('index')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse( $courses as $course )
            <tr class="record" data-type="archive">
                <td>{{ $course->name }}</td>
                <td class="text-right">
                    <a href="{{ route( 'courses.edit', $course ) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route( 'courses.delete', $course ) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="text-center">There are no courses in the database</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="text-center">
        {{ $courses->links() }}
    </div>
@endsection
