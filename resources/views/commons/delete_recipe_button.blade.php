    @if(Auth::user()->admin_flag == 1)
        {!! Form::open(['route' => ['recipes.destroy', $recipe->id], 'method' => 'delete']) !!}
            {!! Form::submit('レシピを削除する', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @endif