    @if (Auth::check())
        {!! link_to_route('recipes.edit', 'レシピを編集する', ['id' => $recipe->id], ['class' => 'btn btn-danger']) !!}
    @else
    <p>ログインしてないので編集できません</p>    
    @endif