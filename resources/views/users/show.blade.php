@extends('layouts.app')

@section('content')
    <div class="greeting text-center m-4">
        <h5>こんにちは、{{ $user->name }}さん</h5>
    </div>
    <div class="users.edit text-center pb-4 border-bottom">
        {!! link_to_route('users.edit','アカウント設定はこちら',['id' => Auth::id()]) !!}
    </div>
    
    <div class="favorite_recipes_index">
        <div class="text-center m-2">
            <h5>お気に入りレシピ一覧</h5>
        </div>
        
        <div class="show_recipes">
            <?php $i = 0; ?>
            <div class="card-columns">
                @foreach ($favorite_recipes as $favorite_recipe)
                <?php $i++;$dtpId="datetimepicker".$i;?>
                    <div class="card img-thumbnail">
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
                            @include('commons.datetimepicker')
                  	    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

{{ $favorite_recipes->appends(['sort' => 'created_at'])->links() }}

    
@endsection
