@if(Auth::check())
    {!! Form::open(['route' => ['create_menus', $user->id]]) !!}
        <?php $dtpId="datetimepicker1";?>
        @include('commons.datetimepicker')
        {!! Form::submit('献立提案', ['class' => "btn btn-primary"]) !!}
    {!! Form::close() !!}
@endif