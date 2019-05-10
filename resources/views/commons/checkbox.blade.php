<div class="form-inline mt-3">
    @foreach($ingredients as $ingredient)
        <div class="form-check ml-3 mr-3 mb-3">
            <input class="form-check-input" type="checkbox" id="checkA" name="ingredients[]" value="{{$ingredient->name}}">
            <label class="form-check-label" for="checkA">{{ $ingredient->name }}</label>
        </div>
    @endforeach
</div>