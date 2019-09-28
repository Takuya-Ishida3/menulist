<div class="accordion" id="accordion2" role="tablist">
  <div class="card">
    <div class="card-header" role="tab" id="heading1">
      <h5 class="mb-0">
        <a data-toggle="collapse" class="text-body stretched-link text-decoration-none" href="#collapse1" aria-expanded="true" aria-controls="collapse1">肉類</a>
      </h5>
    </div>
    <div id="collapse1" class="collapse" role="tabpanel" aria-labelledby="heading1" data-parent="#accordion2">
      <div class="card-body">
        <div class="row">
          @foreach($meats as $ingredient)
              <div class="col-7 offset-sm-1 col-sm-3 mb-2">
                <span class="align-middle">{{$ingredient->name}}</span>
              </div>
              <div class="col-3 col-sm-2 mb-2">
                @include('commons.favorite_ingredient_button')
              </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="heading2">
      <h5 class="mb-0">
        <a class="collapsed text-body stretched-link text-decoration-none" data-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2">魚介類</a>
      </h5>
    </div>
    <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2" data-parent="#accordion2">
      <div class="card-body">
        <div class="row">
          @foreach($seafoods as $ingredient)
              <div class="col-7 offset-sm-1 col-sm-3 mb-2">
                <span class="align-middle">{{$ingredient->name}}</span>
              </div>
              <div class="col-3 col-sm-2 mb-2">
                @include('commons.favorite_ingredient_button')
              </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="heading3">
      <h5 class="mb-0">
        <a class="collapsed text-body stretched-link text-decoration-none" data-toggle="collapse" href="#collapse3" aria-expanded="false" aria-controls="collapse3">野菜・果物</a>
      </h5>
    </div>
    <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">
      <div class="card-body">
        <div class="row">
          @foreach($vegetables_fruits as $ingredient)
              <div class="col-7 offset-sm-1 col-sm-3 mb-2">
                <span class="align-middle">{{$ingredient->name}}</span>
              </div>
              <div class="col-3 col-sm-2 mb-2">
                @include('commons.favorite_ingredient_button')
              </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="heading4">
      <h5 class="mb-0">
        <a class="collapsed text-body stretched-link text-decoration-none" data-toggle="collapse" href="#collapse4" aria-expanded="false" aria-controls="collapse4">その他</a>
      </h5>
    </div>
    <div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="heading4" data-parent="#accordion2">
      <div class="card-body">
        <div class="row">
          @foreach($others as $ingredient)
              <div class="col-7 offset-sm-1 col-sm-3 mb-2">
                <span class="align-middle">{{$ingredient->name}}</span>
              </div>
              <div class="col-3 col-sm-2 mb-2">
                @include('commons.favorite_ingredient_button')
              </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>