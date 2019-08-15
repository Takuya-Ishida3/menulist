@extends('layouts.app')

@section('content')
<div class="show_recipes">
  <?php $i = 0; ?>
  {{$i}}
  @foreach ($recipes as $recipe)
    <?php $i++;$dtpId="datetimepicker".$i;?>
    {{$i}}
    {{$dtpId}}
    <div class="test"　id="#<?php echo $dtpId;?>">
      <h1>テスト</h1>
    </div>
      <div class="row">
        <div class="offset-sm-1 col-sm-5">
          <div class="card">
            <div class="recipes_images">
    			    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $recipe->image_name}}" alt="カードの画像">
    		    </div>
            <div class="card-body">
              <h1 class="card-title">{{$recipe->name}}</h1>
              <p class="card-text">{{$recipe->comment}}</p>
              @include('commons.favorite_button')
              @include('commons.associate_with_menu_button_$recipe')
              @include('commons.edit_recipe_button')
              @include('commons.delete_recipe_button')
    		    </div>
          </div>
        </div>
      </div>
  @endforeach
</div>

{{ $recipes->appends(['sort' => 'created_at'])->links() }}

@endsection