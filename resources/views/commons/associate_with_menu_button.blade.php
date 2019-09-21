@if (Auth::user()->confirm_menu($menu->id))
    {!! Form::open(['route' => ['unassociate_with_menu', $menu->id], 'method' => 'delete']) !!}
        {!! Form::submit('献立から削除', ['class' => "btn btn-danger"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['associate_with_menu', $menu->id]]) !!}
        {!! Form::submit('献立に追加', ['class' => "btn btn-primary"]) !!}
        @include('commons.datetimepicker')
    {!! Form::close() !!}
@endif