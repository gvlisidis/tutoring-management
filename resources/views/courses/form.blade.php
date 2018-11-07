@extends( 'crud.form', [
    'model'=> $course,
    'route' => 'courses',
] )


@section( 'title' )
    @if( $course->exists )
        Editing course {{ $course->name }}
    @else
        Add a new course
    @endif
@endsection

@section( 'controls' )
    <a href="{{ route( 'courses.index' ) }}" class="btn btn-default">Cancel</a>
    <input type="submit" value="Save changes" class="btn btn-success"/>
@endsection

@section('form')
    @if( ! $errors->isEmpty() )
        <div class="alert alert-danger fade in">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group {{ $errors->has( 'name' ) ? 'has-error' : '' }}">
                <label class="control-label" for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old( 'name', $course->name ) }}"/>
                @if( $errors->has( 'name') )
                    <label for="name" class="control-label">{{ $errors->first( 'name' ) }}</label>
                @endif
            </div>
        </div>
    </div>
@endsection
