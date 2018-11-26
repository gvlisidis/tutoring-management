@extends( 'crud.index' )

@section( 'title', 'Archived students' )

@section( 'controls' )
    <a href="{{ route( 'students.index' ) }}" class="btn btn-primary pull-right">View active</a>
@endsection

@section('index')
    <table class="table table-bordered table-hover">
        <thead class="dark-purple">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse( $archived_students as $student )
            <tr class="record" data-type="restore">
                <td class="name">{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td class="text-right">
                    <a href="{{ route( 'students.restore', $student->id ) }}" class="btn btn-success archive">Restore</a>
                    <form id="restore-student" action="{{ route( 'students.restore', $student->id ) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="{{  empty( $student ) ? 3 : 2 }}" class="text-center">There are no students in the archive</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
