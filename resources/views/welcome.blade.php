@extends('layouts.app')

@section('content')
    <div class="top">
        <div class="row">
            <div class="col-12">
                <div class="center jumbotron jumbotron-extend">
                    <div class="title">
                        <div class="text-center">
                            <h1>Welcome to Menu-list</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::open(['route' => 'recipes']) !!}
        @include('commons.search')
    {!! Form::close() !!}
    </div>
    <div class="about">
        <div class="border-bottom text-center mb-4">
            <p>今日の夕飯が思いつかないな～</p>
            <p>そんな時はMenu-listにお任せ！</p>
            <p>ボタン1つでのその日の献立が作成できちゃいます!</p>
        </div>
    </div>
    <div class="about_box border-bottom pt-4">
        <div class="row">
            <div class="box offset-sm-2 col-sm-2">
                <div class="box_img">
                    <img src="{{ asset('/img/search.png') }}"></img>
                </div>
                <div class="box_contents">
                    <p>レシピを検索！</p>
                </div>
            </div>
            <div class="box offset-sm-1 col-sm-2">
                <div class="box_img">
                    <img src="{{ asset('/img/add.png') }}"></img>
                </div>
                <div class="box_contents">
                    <p>献立に追加して<br>買物リストを作成</p>
                </div>
            </div>
            <div class="box offset-sm-1 col-sm-2">
                <div class="box_img">
                    <img src="{{ asset('/img/cart.png') }}"></img>
                </div>
                <div class="box_contents">
                    <p>リストを手に、<br>買物へ！</p>
                </div>
            </div>
        </div>    
    </div>
    @include('commons.make_menu')
@endsection