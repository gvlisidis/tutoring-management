@extends( 'crud.form', [
    'model'=> $lesson,
    'route' => 'lessons',
] )


@section( 'title' )
    @if( $lesson->exists )
        Editing lesson
    @else
        Add a new lesson
    @endif
@endsection

{{--@section( 'controls' )
    <a href="{{ route( 'lessons.index', $student ) }}" class="btn btn-default">Cancel</a>
    <input type="submit" value="Save changes" class="btn btn-success"/>
@endsection--}}

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
        <div class="col-xs-12 col-md-6">
            <div class="form-group {{ $errors->has( 'date' ) ? 'has-error' : '' }}">
                <label class="control-label" for="date">Date</label>
                <input type="text" class="form-control" id="date" name="date" placeholder="Date" value="{{ old( 'date', $lesson->formatted_date ) }}"/>
                @if( $errors->has( 'date') )
                    <label for="date" class="control-label">{{ $errors->first( 'date' ) }}</label>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group {{ $errors->has( 'time' ) ? 'has-error' : '' }}">
                <label class="control-label" for="time">Time</label>
                <input type="text" class="form-control" id="time" name="time" placeholder="Time" value="{{ old( 'time', $lesson->formatted_time ) }}"/>
                @if( $errors->has( 'time') )
                    <label for="time" class="control-label">{{ $errors->first( 'time' ) }}</label>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group {{ $errors->has( 'price' ) ? 'has-error' : '' }}">
                <label class="control-label" for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ old( 'price', $lesson->price ) }}"/>
                @if( $errors->has( 'price') )
                    <label for="email" class="control-label">{{ $errors->first( 'price' ) }}</label>
                @endif
            </div>
        </div>
        {{--<div class="col-xs-12 col-md-6">
            <div class="form-group {{ $errors->has( 'course_id' ) ? 'has-error' : '' }}">
                <label class="control-label" for="courseID">Course</label>
                <select class="form-control select-field" id="courseID" name="course_id">
                    @foreach($registeredCourses as $id => $course)
                        <option value="{{ $id }}" {{ $id == old( 'course_id', $lesson->course_id ) ? 'selected' : ''}} >{{ $course->name }}</option>
                    @endforeach
                </select>
                @if( $errors->has( 'course_id' ) )
                    <label for="courseID" class="control-label">{{ $errors->first( 'course_id' ) }}</label>
                @endif
            </div>
        </div>--}}
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group {{ $errors->has( 'notes' ) ? 'has-error' : '' }}">
                <label class="control-label" for="notes">Notes</label>
                <textarea class="form-control" id="notes" name="notes" placeholder="Notes">{{ old( 'notes', $lesson->notes ) }}</textarea>
                @if( $errors->has( 'notes') )
                    <label for="telephone" class="control-label">{{ $errors->first( 'notes' ) }}</label>
                @endif
            </div>
        </div>
    </div>
@endsection
