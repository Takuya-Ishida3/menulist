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
                            <h5 class="card-title pb-2">{{$recipe->name}}</h5>
                                <div class="comment border-top border-bottom">
                                  <p class="card-text">コメント<br>{{$recipe->comment}}</p>  
                                </div>
                            <div class="row mt-2 mb-2">
                                <div class="offset-7 col-5">
                                    @include('commons.favorite_button')
                                </div>
                            </div>
                            @if(Auth::check())
                                {!! Form::open(['route' => ['associate_with_menu', $recipe->id]]) !!}
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <div class="input-group date" id="<?php echo $dtpId;?>" data-target-input="nearest">
                                                <label for="<?php echo $dtpId;?>" class="pt-2 pr-2">日付:</label>
                                                <input type="text" name="date" class="form-control datetimepicker-input" data-target="#<?php echo $dtpId;?>"/>
                                                <div class="input-group-append" data-target="#<?php echo $dtpId;?>" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            {!! link_to_route('recipes.show', 'レシピ詳細', ['id' => $recipe->id], ['class' => 'btn btn-primary']) !!}
                                        </div>
                                        <div class="col-6">
                                            @if(Auth::check())
                                                {!! Form::submit('献立に追加', ['class' => "btn btn-primary form-group"]) !!}
                                            @endif
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            @endif
                  	    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $favorite_recipes->appends(['sort' => 'created_at'])->links('pagination::bootstrap-4') }} 
    </div>
@endsection
