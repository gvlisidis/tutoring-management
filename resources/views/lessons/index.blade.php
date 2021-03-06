@extends('crud.index' )

@section('title')
    Lessons history for {{ $student->name }}
@endsection

@section('index')
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="personal-info" style="width: 500px; font-size: 14px;">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Student information</h3>
                    </div>
                    <div class="panel-body">
                        <p><strong>Name:</strong> <span>{{ $student->name }}</span></p>
                        <p><strong>Email:</strong> <span>{{ $student->email }}</span></p>
                        <p><strong>Adderess: </strong><span>{{ $student->address }}</span></p>
                        <p><strong>Telephone:</strong> <span>{{ $student->telephone }}</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="summary pull-right" style="width: 500px; font-size: 14px;">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lessons summary</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <td class="text-center">Number of lessons</td>
                                <td class="text-center">Amount</td>
                                <td class="text-center">Paid amount</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">{{ $student->lessons->count() }}</td>
                                <td class="text-center">&euro;{{ $student->totalAmount() }}</td>
                                <td class="text-center">&euro;{{ $student->calculatePaidLessons() }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <table class="table table-bordered table-hover lessons-table">
        <thead class="lessons-header">
        <tr>
            <th>Course</th>
            <th class="text-center">Date</th>
            <th class="text-center">Time from - Time to</th>
            <th class="text-center">Price(&euro;)</th>
            <th class="text-center">Paid</th>
            <th class="notes">Notes</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @forelse( $lessons as $newlesson )
            <tr style="background-color: {{ $newlesson->isOverdue() ? '#ef928d' : ''  }}">
                <td>{{ $newlesson->course->name }}</td>
                <td class="text-center">{{ $newlesson->formatted_date }}</td>
                <td class="text-center">{{ $newlesson->formatted_time_from }} - {{ $newlesson->formatted_time_to }}</td>
                <td class="text-center">&euro;{{ $newlesson->formatted_price }}</td>
                <td class="text-center">{{ $newlesson->formatted_paid }}</td>
                <td class="notes">{{ $newlesson->notes }}</td>
                <td class="text-right">
                    <a href="{{ route( 'lessons.edit', ['student'=>$student, 'lesson'=>$newlesson] ) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route( 'lessons.delete', ['student'=>$student, 'lesson'=>$newlesson] ) }}" class="btn btn-danger">Delete</a>
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
    <div class="panel panel-{{ $lesson->exists ? 'success' : 'primary' }}">
        <div class="panel-heading">
            <h3 class="panel-title">
                {{ $lesson->exists ? 'Update lesson ('. $lesson->formatted_date .' | '. $lesson->formatted_time_from . ' - '. $lesson->formatted_time_to. ')' : 'Add a new lesson' }}
            </h3>
        </div>
        <div class="panel-body">
            <form action="{{ route( 'lessons.'.$method,  ['student' => $student, 'lesson'=>$lesson ] ) }}" method="POST">
                {{ csrf_field() }}
                @if( $lesson->exists )
                    {{ method_field( 'PUT' ) }}
                @endif
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="date">Date</label>
                            <div class="input-group date datepicker">
                                <input type="text" class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" value="{{ old( 'date', $lesson->formatted_date ) }}"/>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <div class="form-group">
                            <label class="control-label" for="time_from">Time from</label>
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input type="text" class="form-control timepick" id="time_from" name="time_from" placeholder="24:00" value="{{ old( 'time_from', $lesson->time_from ) }}"/>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <div class="form-group">
                            <label class="control-label" for="time_to">Time to</label>
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input type="text" class="form-control timepick" id="time_to" name="time_to" placeholder="24:00" value="{{ old( 'time_to', $lesson->time_to ) }}"/>
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
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ old( 'price', $lesson->formatted_price ) }}"/>
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
                            <textarea class="form-control notes-area" id="notes" name="notes">{{ old( 'notes', $lesson->notes ) }}</textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" value="{{ $lesson->exists ? 'Update lesson' : 'Add new lesson' }}" class="btn btn-success"/>
                <a href="{{ route( 'lessons.index', $student ) }}" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
@endsection
@push( 'scripts' )
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="{{ asset('js/timepicker.js') }}"></script>
@endpush
