<div class="make_menu">
    @if(Auth::check())
        <div class="row m-4 p-4">
            {!! link_to_route('menus.index', '献立を作成する！', [], ['class' => 'offset-sm-4 col-sm-4 text-center']) !!}
        </div>
    @else
        <p class="text-center m-4 p-4">献立作成機能を利用するにはログインが必要です</p>
        <div class="row m-4 p-4">
            {!! link_to_route('login', 'ログイン', [], ['class' => 'offset-sm-4 col-sm-2 text-center']) !!}
            {!! link_to_route('signup.get', '新規登録', [], ['class' => 'col-sm-2 text-center']) !!}
        </div>
    @endif
</div>