<div class="show_recipes">
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
              <a href="#" class="btn btn-primary">献立に追加</a>
              @include('commons.datetimepicker')
    		    </div>
          </div>
        </div>
      </div>
</div>