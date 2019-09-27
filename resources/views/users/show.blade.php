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
            @if($count->isEmpty())
                <h5 class="text-center mt-5">お気に入りのレシピはありません。</h5>
            @endif
            <?php $i = 0; ?>
            <div class="card-columns">
                @foreach ($favorite_recipes as $recipe)
                <?php $i++;$dtpId="datetimepicker".$i;?>
                    <div class="card img-thumbnail">
                        <div class="recipes_images">
                            <a href="{{ route('recipes.show',$recipe->id) }}">
                  		        <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $recipe->image_name}}" alt="カードの画像">
                  		    </a>
                  		</div>
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-2">{{$recipe->name}}</h5>
                            <p class="card-text border-bottom pb-2">{{$recipe->comment}}</p>
                            <div class="row mb-2">
                                <div class="col-7">
                                    {!! link_to_route('recipes.show', 'レシピ詳細', ['id' => $recipe->id], ['class' => 'btn btn-primary']) !!}
                                </div>
                                <div class="col-5">
                                    @include('commons.favorite_button')
                                </div>
                            </div>
                            @include('commons.associate_with_menu_button_$recipe')
                  	    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

{{ $favorite_recipes->appends(['sort' => 'created_at'])->links() }}

    
@endsection
