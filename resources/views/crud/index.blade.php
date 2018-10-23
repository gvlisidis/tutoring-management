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
