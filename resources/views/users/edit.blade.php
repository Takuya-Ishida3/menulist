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
        {!! Form::open(['route' => ['users.update',$user->id], 'method' => 'post']) !!}
            {!! Form::label('family_size', '家族構成:') !!}
            {!! Form::select('family_size', [null,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20], ['class' => "btn btn-primary"]) !!}
            {!! Form::submit('登録する', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection
