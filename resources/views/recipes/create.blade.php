@extends('layouts.app')

@section('content')
    <h3 class="text-center m-2">レシピ投稿画面</h3>
    {!! Form::open(['route' => 'recipes.store', 'files' => true]) !!}
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="form-group">
                    {!! Form::label('name', 'レシピ名') !!}
                    {!! Form::text('name', null , ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image_name', '画像アップロード') !!}
                    {!! Form::file('image_name') !!}
                </div>
                <div class="border-top pt-4">
                    <h5 class="mt-2 mb-2">分量を入力してください</h5>
                    @include('commons.acordion_create_recipes')
                    
                    
                    
                    
                    
                    
                    <!--
                    @foreach($ingredients as $ingredient)
                    <div class="row">
                        <div class="form-group col-sm-12 m-0">
                    	    <label for="ingredient_id_{{ $ingredient->id }}">{{ $ingredient->name }}</label>
                    	</div>
                    	<div class="col-8">
                    	    <input type="text" class="form-control" name="{{ $ingredient->id }}">
                    	</div>
                    	<div class="col-4">
                    	    <p>{{ $ingredient->unit }}</p>
                    	</div>
                	</div>
                    @endforeach
                    -->
                    
                </div>
                <button type="button" id="add_button" class="mt-2 mb-2">工程を追加</button>
                <div class="form-group">
                    <div class="processes">
                        {!! Form::label('processes[]', '工程') !!}
                        {!! Form::textarea('processes[]', null , ['class' => 'form-control'],['size' => '50x1']) !!}
                    </div>
                    <div class="append_area">
                        
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('comment', '簡単な料理の説明') !!}
                    {!! Form::textarea('comment', null , ['class' => 'form-control'],['size' => '50x3']) !!}
                </div>
                {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection