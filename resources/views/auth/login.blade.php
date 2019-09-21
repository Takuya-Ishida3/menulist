@extends('layouts.app')

@section('content')
    <div class="text-center mt-2">
        <h1>ログイン</h1>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}

            <p class="mt-2">初めてのご利用ですか？ {!! link_to_route('signup.get', '新規登録はこちら') !!}</p>
        </div>
    </div>
    
        <div class="row">
            
                <div class="offset-sm-3 col-sm-6 mt-5 border">
                    <P>新規ユーザーは管理権限がありません。<br>レシピ投稿機能を利用するには<br>下記ID・パスワードを用いてログインしてください</P>
                    <P>ID：admin@admin.com<br>パスワード：admin1</p>
                </div>
            
        </div>
@endsection