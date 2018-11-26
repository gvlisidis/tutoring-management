@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h2>
                    @yield( 'title' )

                    <div class="pull-right">
                        @yield( 'controls' )
                    </div>
                </h2>
            </div>
        </div>
        <br />
        @include( 'includes.messages' )
        @yield('index')
    </div>
@endsection

@push( 'styles' )
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css"/>
@endpush

@push( 'scripts' )
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.min.js"></script>
    <script src="{{ asset('js/confirm-delete.js') }}"></script>
    <script src="{{ asset('js/archive-restore.js') }}"></script>
@endpush
