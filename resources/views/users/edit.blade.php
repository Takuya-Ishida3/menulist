@extends('layouts.app')

@section('content')
    <h1>こんにちは、{{ $user->name }}さん</h1>
    <p>詳細設定画面です。</p>
    <div class="favorite_ingredients">
        <h1>材料をお気に入り登録します</h1>
        <ul>
            @foreach($ingredients as $ingredient)
                <li>{{$ingredient->name}}</li>
                @include('commons.favorite_ingredient_button')
            @endforeach
        </ul>
    </div>
    <div class="family_size">
        <h1>家族構成を設定します。</h1>
        <p>ドロップダウンリストで選択がいいかな？</p>
    </div>
@endsection
