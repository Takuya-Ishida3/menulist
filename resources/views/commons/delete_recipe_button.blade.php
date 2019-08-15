    @if(Auth::check())
        {!! Form::open(['route' => ['recipes.destroy', $recipe->id], 'method' => 'delete']) !!}
            {!! Form::submit('レシピを削除する', ['class' => "btn btn-danger"]) !!}
        {!! Form::close() !!}
    @endif