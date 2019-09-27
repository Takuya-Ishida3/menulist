@if(Auth::check())   
    @if (Auth::user()->admin_flag == 1)
        {!! link_to_route('recipes.edit', 'レシピを編集する', ['id' => $recipe->id], ['class' => 'btn btn-primary btn-sm btn-block']) !!}
    @endif
@endif