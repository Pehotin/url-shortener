@extends('layouts.app')

@section('content')
    <h1 class="text-center">Short your URL</h1>

    {{ Form::open(array('url' => '/', 'method' => 'POST')) }}
        <div class="form-group">
            {!! Form::text('link', null, ['class'=>'form-control', 'placeholder' => 'Paste Your Link Here']) !!}
        </div>
    {{ Form::close() }}

    @if (Session::has('link'))
        <h3 class="success text-center">
            {!! link_to(Request::url() . '/' . Session::get('link'), Request::url() . '/' . Session::get('link')) !!}
        </h3>
    @endif

    @if (Session::has('message'))
        <h3 class="error">
            {{ Session::get('message')}}
        </h3>
    @endif

    @include('links.parts.errors')
@stop