<div class="check">
    @foreach($meats as $ingredient)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="checkA" name="ingredients[]" value="{{$ingredient->name}}">
            <label class="form-check-label" for="checkA">{{ $ingredient->name }}</label>
        </div>
    @endforeach
    @foreach($seafoods as $ingredient)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="checkA" name="ingredients[]" value="{{$ingredient->name}}">
            <label class="form-check-label" for="checkA">{{ $ingredient->name }}</label>
        </div>
    @endforeach
    @foreach($vegetables_fruits as $ingredient)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="checkA" name="ingredients[]" value="{{$ingredient->name}}">
            <label class="form-check-label" for="checkA">{{ $ingredient->name }}</label>
        </div>
    @endforeach
    @foreach($others as $ingredient)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="checkA" name="ingredients[]" value="{{$ingredient->name}}">
            <label class="form-check-label" for="checkA">{{ $ingredient->name }}</label>
        </div>
    @endforeach
</div>
