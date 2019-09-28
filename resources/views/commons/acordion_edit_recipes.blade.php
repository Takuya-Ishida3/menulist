<div class="accordion" id="accordion2" role="tablist">
  <div class="card">
    <div class="card-header" role="tab" id="heading1">
      <h5 class="mb-0">
        <a data-toggle="collapse" class="text-body stretched-link text-decoration-none" href="#collapse1" aria-expanded="true" aria-controls="collapse1">肉類</a>
      </h5>
    </div>
    <div id="collapse1" class="collapse" role="tabpanel" aria-labelledby="heading1" data-parent="#accordion2">
      <div class="card-body">
        @foreach($meats as $ingredient)
          <div class="form-group col-sm-12 m-0">
            <div class="row">
              <label for="ingredient_id_{{ $ingredient->id }}">{{ $ingredient->name }}</label>
            </div>
            <?php
              $search_id = $ingredient['id'];
              $result = array_key_exists($search_id, $required_amounts);
              if($result){
                $amount = $required_amounts[$search_id];
              }else{
              $amount = "";
              }
            ?>
            <div class="row">
              <div class="col-8">
                <input type="text" class="form-control" name="ingredient_id_{{ $ingredient->id }}" value={{ $amount }}>
              </div>
              <div class="col-4">
                <p>{{ $ingredient->unit }}</p>
              </div>
            </div>
          </div>
        @endforeach
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
        @foreach($seafoods as $ingredient)
          <div class="form-group col-sm-12 m-0">
            <div class="row">
              <label for="ingredient_id_{{ $ingredient->id }}">{{ $ingredient->name }}</label>
            </div>
            <?php
              $search_id = $ingredient['id'];
              $result = array_key_exists($search_id, $required_amounts);
              if($result){
                $amount = $required_amounts[$search_id];
              }else{
              $amount = "";
              }
            ?>
            <div class="row">
              <div class="col-8">
                <input type="text" class="form-control" name="ingredient_id_{{ $ingredient->id }}" value={{ $amount }}>
              </div>
              <div class="col-4">
                <p>{{ $ingredient->unit }}</p>
              </div>
            </div>
          </div>
        @endforeach
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
        @foreach($vegetables_fruits as $ingredient)
          <div class="form-group col-sm-12 m-0">
            <div class="row">
              <label for="ingredient_id_{{ $ingredient->id }}">{{ $ingredient->name }}</label>  
            </div>
            <?php
              $search_id = $ingredient['id'];
              $result = array_key_exists($search_id, $required_amounts);
              if($result){
                $amount = $required_amounts[$search_id];
              }else{
              $amount = "";
              }
            ?>
            <div class="row">
              <div class="col-8">
                <input type="text" class="form-control" name="ingredient_id_{{ $ingredient->id }}" value={{ $amount }}>
              </div>
              <div class="col-4">
                <p>{{ $ingredient->unit }}</p>
              </div>
            </div>
          </div>
        @endforeach
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
        @foreach($others as $ingredient)
          <div class="form-group col-sm-12 m-0">
            <div class="row">
              <label for="ingredient_id_{{ $ingredient->id }}">{{ $ingredient->name }}</label>  
            </div>
            <?php
              $search_id = $ingredient['id'];
              $result = array_key_exists($search_id, $required_amounts);
              if($result){
                $amount = $required_amounts[$search_id];
              }else{
              $amount = "";
              }
            ?>
            <div class="row">
              <div class="col-8">
                <input type="text" class="form-control" name="ingredient_id_{{ $ingredient->id }}" value={{ $amount }}>
              </div>
              <div class="col-4">
                <p>{{ $ingredient->unit }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>