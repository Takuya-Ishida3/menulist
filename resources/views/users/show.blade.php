@extends('layouts.app')

@section('content')
    <h1>こんにちは、{{ $user->name }}さん</h1>
    {!! link_to_route('users.edit','詳細設定',['id' => Auth::id()]) !!}
    <div class="favorite_recipes_index">
        <h1>ここにお気に入りしたレシピが一覧で表示されます</h1>
    </div>
    
@endsection
