@if(Auth::check())
    {!! Form::open(['route' => ['associate_with_menu', $recipe->id]]) !!}
        @include('commons.datetimepicker')
        {!! Form::submit('献立に追加', ['class' => "btn btn-primary"]) !!}
    {!! Form::close() !!}
@endif