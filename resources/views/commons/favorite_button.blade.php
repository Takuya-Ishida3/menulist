    @if(Auth::check())
        @if (Auth::user()->is_favoring($recipe->id))
            {!! Form::open(['route' => ['unfavor.recipe', $recipe->id], 'method' => 'delete']) !!}
                <button type="submit" class="btn btn-link btn-sm">
                    <i class="fas fa-heart fa-lg"></i>
                </button>
            {!! Form::close() !!}
        @else
            {!! Form::open(['route' => ['favor.recipe', $recipe->id]]) !!}
                <button type="submit" class="btn btn-link btn-sm">
                    <i class="far fa-heart fa-lg"></i>
                </button>
            {!! Form::close() !!}
        @endif
    @endif