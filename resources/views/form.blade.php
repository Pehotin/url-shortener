@extends('layouts.app')

@section('content')
    <h1 class="text-center">Short your URL</h1>
    {{ Form::open(array('url' => '/', 'method' => 'POST')) }}
        <div class="form-group">
            {!! Form::text('link', null, ['class'=>'form-control', 'placeholder' => 'Paste Your Link Here']) !!}
        </div>
    {{ Form::close() }}
@stop

        
    