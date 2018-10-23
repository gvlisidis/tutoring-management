
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <form method="post" action="{{ route( "$route.$method", $model ) }}">
                    {{ csrf_field() }}
                    @if( $model->exists )
                        {{ method_field( 'PUT' ) }}
                    @endif
                    <h2 id="page-title">
                        @yield( 'title' )
                        <div class="pull-right">
                            @yield( 'controls' )
                        </div>
                    </h2>
                    @include( 'includes.messages' )
                    @yield( 'form' )
                </form>
            </div>
        </div>
    </div>
@endsection
