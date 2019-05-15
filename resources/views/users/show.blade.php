@extends('layouts.app')

@section('content')
    <h1>こんにちは、{{ $user->name }}さん</h1>
    {!! link_to_route('users.edit','詳細設定',['id' => Auth::id()]) !!}
    <div class="favorite_recipes_index">
        <h1>ここにお気に入りしたレシピが一覧で表示されます</h1>
    </div>

    <div class="show_recipes">
      @foreach ($favorite_recipes as $favorite_recipe)
          <div class="row">
            <div class="offset-sm-1 col-sm-5">
              <div class="card">
                    <div class="recipes_images">
        			    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $favorite_recipe->image_name}}" alt="カードの画像">
        		    </div>
                    <div class="card-body">
                      <h1 class="card-title">{{$favorite_recipe->name}}</h1>
                      <p class="card-text">{{$favorite_recipe->comment}}</p>
                      @if (Auth::user()->is_favoring($favorite_recipe->id))
                          {!! Form::open(['route' => ['unfavor.recipe', $favorite_recipe->id], 'method' => 'delete']) !!}
                              {!! Form::submit('Unfavor', ['class' => "btn btn-danger"]) !!}
                          {!! Form::close() !!}
                      @else
                          {!! Form::open(['route' => ['favor.recipe', $favorite_recipe->id]]) !!}
                              {!! Form::submit('Favor', ['class' => "btn btn-primary"]) !!}
                          {!! Form::close() !!}
                      @endif
                      <a href="#" class="btn btn-primary">献立に追加</a>
        		    </div>
              </div>
            </div>
          </div>
      @endforeach
    </div>

{{ $favorite_recipes->appends(['sort' => 'created_at'])->links() }}

    
@endsection
