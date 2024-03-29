@extends('layouts.app')

@section('content')
<div class="show_recipes">
  <?php $i = 0; ?>
    <?php
      if($search_flag == 1){
        ///検索した場合
        print("検索結果を表示中");
      }elseif($search_flag == 0){
        print("全レシピを表示中");
      }
    ?>
  <div class="card-columns">
    @foreach ($recipes as $recipe)
      <?php $i++;$dtpId="datetimepicker".$i;?>
            <div class="card img-thumbnail">
              <div class="recipes_images">
                <a href="{{ route('recipes.show',$recipe->id) }}">
      			      <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $recipe->image_name}}" alt="カードの画像">
      		      </a>
      		    </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <h5 class="card-title">{{$recipe->name}}</h5>
                  </div>
                </div>
                <div class="comment border-top border-bottom">
                  <p class="card-text">コメント<br>{{$recipe->comment}}</p>  
                </div>
                <div class="row mb-2">
                  <dic class="offset-7 col-5 mt-2 mb-2">
                    @include('commons.favorite_button')
                  </dic>
                  <div class="col-12">
                    {!! link_to_route('recipes.show', 'レシピ詳細', ['id' => $recipe->id], ['class' => 'btn btn-primary btn-sm btn-block']) !!}
                  </div>
                </div>
      		    </div>
            </div>
    @endforeach    
  </div>
  <div class="d-flex justify-content-center">
    {{ $recipes->appends(['sort' => 'created_at'])->links('pagination::bootstrap-4') }} 
  </div>
</div>
@endsection