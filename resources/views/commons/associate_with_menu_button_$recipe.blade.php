        {!! Form::open(['route' => ['associate_with_menu', $recipe->id]]) !!}
            {!! Form::submit('献立に追加', ['class' => "btn btn-primary"]) !!}
            @include('commons.datetimepicker')
        {!! Form::close() !!}