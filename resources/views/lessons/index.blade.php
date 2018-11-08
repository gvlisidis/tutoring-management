@extends('crud.index' )

@section('title')
    Lessons history for {{ $student->name }}
@endsection

@section('index')
    <div class="row">
        <div class="col-xs-12">
            <h4>Summary</h4>
            <table class="table">
                <thead>
                <tr>
                    <td>Number of lessons</td>
                    <td>Amount</td>
                    <td>Paid amount</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $student->lessons->count() }}</td>
                    <td>&euro;{{ $student->totalAmount() }}</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br />
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Course</th>
            <th>Date</th>
            <th>Time</th>
            <th>Price(&euro;)</th>
            <th>Paid</th>
            <th class="notes">Notes</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @forelse( $lessons as $newlesson )
            <tr class="record" data-type="archive">
                <td>{{ $newlesson->course->name }}</td>
                <td>{{ $newlesson->formatted_date }}</td>
                <td>{{ $newlesson->formatted_time }}</td>
                <td>&euro;{{ $newlesson->formatted_price }}</td>
                <td>{{ $newlesson->formatted_paid }}</td>
                <td class="notes">{{ $newlesson->notes }}</td>
                <td class="text-right">
                    <a href="{{ route( 'lessons.edit', $newlesson ) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route( 'lessons.delete', $newlesson ) }}" class="btn btn-danger">Delete</a>
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


    <hr/>
    <h3>
        Add a new lesson
    </h3>

    <form action="{{ route( 'lessons.store',  $student ) }}" method="POST">
        {{ csrf_field() }}
        @if( $lesson->exists )
            {{ method_field( 'PUT' ) }}
        @endif
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="form-group {{ $errors->has( 'date' ) ? 'has-error' : '' }}">
                    <label class="control-label" for="date">Date</label>
                    <div class="input-group date datepicker">
                        <input type="text" class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" value="{{ old( 'date', $lesson->formatted_date ) }}"/>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>

                    @if( $errors->has( 'date') )
                        <label for="date" class="control-label">{{ $errors->first( 'date' ) }}</label>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="form-group">
                    <label class="control-label" for="time">Time</label>
                    <div class="input-group date timepicker">
                    <input type="text" class="form-control timepicker" id="time" name="time" placeholder="24:00" value="{{ old( 'time', $lesson->time ) }}"/>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="form-group {{ $errors->has( 'course_id' ) ? 'has-error' : '' }}">
                    <label class="control-label" for="courseID">Course</label>
                    <select class="form-control select-field" id="courseID" name="course_id">
                        @foreach($registeredCourses as  $course)
                            <option value="{{ $course->id }}" {{ $course->id == old( 'course_id' ) ? 'selected' : ''}} >{{ $course->name }}</option>
                        @endforeach
                    </select>
                    @if( $errors->has( 'course_id' ) )
                        <label for="courseID" class="control-label">{{ $errors->first( 'course_id' ) }}</label>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <div class="form-group {{ $errors->has( 'price' ) ? 'has-error' : '' }}">
                    <label class="control-label" for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ old( 'price', $lesson->price ) }}"/>
                    @if( $errors->has( 'price') )
                        <label for="email" class="control-label">{{ $errors->first( 'price' ) }}</label>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="form-group {{ $errors->has( 'paid' ) ? 'has-error' : '' }}">
                    <label class="control-label" for="paid">Paid</label>
                    <select class="form-control select-field" id="paid" name="paid">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="notes">Notes</label>
                    <textarea class="form-control" id="notes" name="notes">{{ old( 'notes', $lesson->notes ) }}</textarea>
                </div>
            </div>
        </div>
        <input type="submit" value="Add new lesson" class="btn btn-success"/>
    </form>
@endsection
@push( 'scripts' )
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="{{ asset('js/timepicker.js') }}"></script>
@endpush
