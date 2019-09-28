@if(Auth::check())
    {!! Form::open(['route' => ['create_menus', $user->id]]) !!}
    <div class="row">
        <div class="col-sm-10 mb-2">
            <?php $dtpId="datetimepicker".$i;?>
            @include('commons.datetimepicker')
        </div>
        <div class="offset-1 col-sm-1 mb-2">
            {!! Form::submit('献立提案', ['class' => "btn btn-primary float-right"]) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @if($favorite_ingredients->isEmpty())
                <strong>※献立提案には材料のお気に入りが必要です。{!! link_to_route('users.edit','アカウント設定',['id' => Auth::id()]) !!}から登録してください。</strong>
            @endif
            
        </div>
        
    </div>
    {!! Form::close() !!}
@endif