@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sell Item</h1>
        {!! Form::open(['action' => 'ItemsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Item Description'])}}
            </div>
            <div class="form-group">
                {{Form::label('price', 'Price')}}
                {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Item Price'])}}
            </div>
            <div class="form_group">
                {{Form::file('cover_image')}}
            </div>
            <br>
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection