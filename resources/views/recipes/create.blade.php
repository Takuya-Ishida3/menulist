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
                
                <div class="form-inline mt-3">
                    @foreach($ingredients as $ingredient)
                    <div class="col-sm-12">
                        <div class="form-group col-sm-2">
                    	    <label for="ingredient_id_{{ $ingredient->id }}">{{ $ingredient->name }}</label>
                    	    <input type="text" class="form-control" name="{{ $ingredient->id }}">
                    	</div>
                    	<div class="col-sm-10">
                    	    <p>{{ $ingredient->unit }}</p>
                    	</div>
                	</div>
                    @endforeach
                </div>
                
                <div class="form-group">
                    {!! Form::label('processes[]', '工程') !!}
                    {!! Form::textarea('processes[]', null , ['class' => 'form-control'],['size' => '50x1']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('comment', '簡単な料理の説明') !!}
                    {!! Form::textarea('comment', null , ['class' => 'form-control'],['size' => '50x3']) !!}
                </div>
                {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection