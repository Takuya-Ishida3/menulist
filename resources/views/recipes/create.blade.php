@extends('layouts.app')

@section('content')
    <h1>こんにちは</h1>
    <h1>ここでレシピを投稿します</h1>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => 'recipes.store', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'レシピ名') !!}
                    {!! Form::text('name', null , ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image_name', '画像アップロード') !!}
                    {!! Form::file('image_name') !!}
                </div>
                @include('commons.checkbox')
                {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection