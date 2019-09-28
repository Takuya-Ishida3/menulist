<header>
    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top"> 
        <a class="navbar-brand" href="/">Menu-list</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())    
                    <li class="nav-item dropdowm">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">メニュー</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"><a href="/">トップページ</a></li>
                            <li class="dropdown-item">{!! link_to_route('users.show','お気に入り一覧', ['id' => Auth::id()]) !!}</li>
                            <li class="dropdown-item">{!! link_to_route('users.edit','アカウント設定', ['id' => Auth::id()]) !!}</li>
                            @if(Auth::user()->admin_flag == 1)
                            <li class="dropdown-item">{!! link_to_route('recipes.create', 'レシピ投稿') !!}</li>
                            @endif
                            <li class="dropdown-item">{!! link_to_route('menus.index', '献立作成', ['id' => Auth::id()]) !!}</li>
                            <li class="dropdown-item">{!! link_to_route('menus.ingredients_list', '材料一覧', ['id' => Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                        </ul>
                    </li>
                @else
                    <li>{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                    <li>{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>