@extends( 'crud.form', [
    'model'=> $student,
    'route' => 'students',
] )


@section( 'title' )
    @if( $student->exists )
        Editing student {{ $student->name }}
    @else
        Add a new student
    @endif
@endsection

@section( 'controls' )
    <a href="{{ route( 'students.index' ) }}" class="btn btn-default">Cancel</a>
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
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old( 'name', $student->name ) }}"/>
                @if( $errors->has( 'name') )
                    <label for="name" class="control-label">{{ $errors->first( 'name' ) }}</label>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group {{ $errors->has( 'lastname' ) ? 'has-error' : '' }}">
                <label class="control-label" for="lastname">Last name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" value="{{ old( 'lastname', $student->lastname ) }}"/>
                @if( $errors->has( 'lastname') )
                    <label for="lastname" class="control-label">{{ $errors->first( 'lastname' ) }}</label>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group {{ $errors->has( 'email' ) ? 'has-error' : '' }}">
                <label class="control-label" for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old( 'email', $student->email ) }}"/>
                @if( $errors->has( 'email') )
                    <label for="email" class="control-label">{{ $errors->first( 'email' ) }}</label>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group {{ $errors->has( 'telephone' ) ? 'has-error' : '' }}">
                <label class="control-label" for="telephone">Telephone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="{{ old( 'telephone', $student->telephone ) }}"/>
                @if( $errors->has( 'telephone') )
                    <label for="telephone" class="control-label">{{ $errors->first( 'telephone' ) }}</label>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group {{ $errors->has( 'address' ) ? 'has-error' : '' }}">
                <label class="control-label" for="address">Email</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old( 'address', $student->address ) }}"/>
                @if( $errors->has( 'address') )
                    <label for="address" class="control-label">{{ $errors->first( 'address' ) }}</label>
                @endif
            </div>
        </div>
    </div>
@endsection
