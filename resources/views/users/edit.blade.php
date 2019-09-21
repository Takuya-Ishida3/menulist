@extends('layouts.app')

@section('content')
    <h4>こんにちは、{{ $user->name }}さん</h4>
    <p>アカウント設定画面です。</p>
    <div class="favorite_ingredients">
        <div class="about text-center">
            <h5>材料をお気に入りしましょう！</h5>
            <p>お気に入り登録すると<br>献立提案機能が使えます</p>
        </div>
        <div class="row">
            @foreach($ingredients as $ingredient)
                <div class="col-xs-2 col-sm-2 text-center m-2">
                    <span class="align-middle">{{$ingredient->name}}</span>
                </div>
                <div class="col-xs-4 col-sm-3 m-2">
                    @include('commons.favorite_ingredient_button')
                </div>
            @endforeach
        </div>
    </div>
    <div class="family_size">
        <div class="about text-center">
            <h5>家族構成を設定しましょう</h5>
            <p>設定すると材料一覧機能が<br>利用可能です。</p>
        </div>
        <div class="edit">
            {!! Form::open(['route' => ['users.update',$user->id], 'method' => 'post']) !!}
            <div class="row">
                <div class="offset-2 col-4">
                    {!! Form::label('family_size', '家族構成:') !!}
                </div>
                <div class="col-4">
                    {!! Form::select('family_size', [null,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]) !!}
                </div>
            </div>
            <div class="row">
                <div class="offset-3 col-6">
                {!! Form::submit('登録する', ['class' => 'btn btn-primary btn-block btn-sm']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
