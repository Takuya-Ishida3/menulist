@extends('layouts.app')

@section('content')
    <div class="show_recipes">

@foreach (recipes as $recipe)
        
      <div class="row">
        <div class="offset-sm-1 col-sm-5">
          <div class="card">
            <div class="recipes_images">
    			<img class="card-img-top" src="./img/ecae8ae294c4566891a249958ea6abd1_s.jpg" alt="カードの画像">
    		</div>
            <div class="card-body">
              <h1 class="card-title">$recipes->name</h1>
              <p class="card-text">料理の説明が入ります。コンテンツを抜き出して40文字くらい表示とかかな？</p>
              <a href="#" class="btn btn-primary">お気に入り</a> <a href="#" class="btn btn-primary">献立に追加</a>
    		</div>
          </div>
        </div>
        <div class="offset-sm-1 col-sm-5">
          <div class="card">
            <div class="recipes_images">
    			<img class="card-img-top" src="./img/ecae8ae294c4566891a249958ea6abd1_s.jpg" alt="カードの画像">
    		</div>
            <div class="card-body">
              <h1 class="card-title">料理のタイトル</h1>
              <p class="card-text">料理の説明が入ります。コンテンツを抜き出して40文字くらい表示とかかな？</p>
              <a href="#" class="btn btn-primary">お気に入り</a> <a href="#" class="btn btn-primary">献立に追加</a>
    		</div>
          </div>
        </div>
      </div>
</div>
    
@endforeach
    
    
@endsection