{!! Form::open(['route' => 'recipes']) !!}
    <div class="form-inline mt-3">
        <div class="form-check ml-3 mr-3 mb-3">
            <input class="form-check-input" type="checkbox" id="checkA" name="ingredients[]" value="牛肉">
            <label class="form-check-label" for="checkA">牛肉</label>
        </div>
        <div class="form-check ml-3 mr-3 mb-3">
            <input class="form-check-input" type="checkbox" id="checkB" name="ingredients[]" value="鶏肉">
            <label class="form-check-label" for="checkB">鶏肉</label>
        </div>
        <div class="form-check ml-3 mr-3 mb-3">
            <input class="form-check-input" type="checkbox" id="checkC" name="ingredients[]" value="豚肉">
            <label class="form-check-label" for="checkC">豚肉</label>
        </div>
        <div class="form-check ml-3 mr-3 mb-3">
            <input class="form-check-input" type="checkbox" id="checkD" name="ingredients[]" value="玉ねぎ">
            <label class="form-check-label" for="checkD">玉ねぎ</label>
        </div>
        <div class="form-check ml-3 mr-3 mb-3">
            <input class="form-check-input" type="checkbox" id="checkE" name="ingredients[]" value="人参">
            <label class="form-check-label" for="checkE">人参</label>
        </div>
        <div class="form-check ml-3 mr-3 mb-3">
            <input class="form-check-input" type="checkbox" id="checkF" name="ingredients[]" value="じゃがいも">
            <label class="form-check-label" for="checkF">じゃがいも</label>
        </div>
        <div class="form-check ml-3 mr-3 mb-3">
            <input class="form-check-input" type="checkbox" id="checkG" name="ingredients[]" value="大根">
            <label class="form-check-label" for="checkG">大根</label>
        </div>
        <div class="form-check ml-3 mr-3 mb-3">
            <input class="form-check-input" type="checkbox" id="checkH" name="ingredients[]" value="キャベツ">
            <label class="form-check-label" for="checkH">キャベツ</label>
        </div>
        <div class="form-check ml-3 mr-3 mb-3">
            <input class="form-check-input" type="checkbox" id="checkI" name="ingredients[]" value="ピーマン">
            <label class="form-check-label" for="checkI">ピーマン</label>
        </div>
        
    </div>
    <div class="form-group row justify-content-center">
        <input name="keyword" type="text" class="form-control ml-3 col-sm-7">
        <button type="submit" class="btn btn-primary col-sm-1">検索</button>
    </div>
{!! Form::close() !!}
