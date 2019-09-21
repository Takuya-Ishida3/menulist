<div class="check">
    @foreach($meats as $meat)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="checkA" name="ingredients[]" value="{{$meat->name}}">
            <label class="form-check-label" for="checkA">{{ $meat->name }}</label>
       	</div>
    @endforeach
    @foreach($ingredients as $ingredient)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="checkA" name="ingredients[]" value="{{$ingredient->name}}">
            <label class="form-check-label" for="checkA">{{ $ingredient->name }}</label>
        </div>
    @endforeach
</div>
