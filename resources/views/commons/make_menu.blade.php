<div class="make_menu">
    <h1 class="text-center pt-4">献立作成機能</h1>
    @if(Auth::check())
        <div class="row mt-4">
            <a href="#" class="offset-sm-5 col-sm-2">献立を作成する！</a>
        </div>
    @else
        <p class="text-center mt-4">献立作成機能を利用するにはログインが必要です</p>
        <div class="row mt-4">
            {!! link_to_route('login', 'ログイン', [], ['class' => 'offset-sm-4 col-sm-2 text-center']) !!}
            {!! link_to_route('signup.get', '新規登録', [], ['class' => 'col-sm-2 text-center']) !!}
        </div>
    @endif
</div>