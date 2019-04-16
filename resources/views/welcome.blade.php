@extends('layouts.app')

@section('content')
    <div class="menu_search">
        <div class="center jumbotron jumbotron-extend">
            <div class="text-center mt-5">
                <h1>Welcome to the Menu-list</h1>
            </div>
        </div>
        @include('commons.search')
    </div>
    @include('commons.make_menu')
@endsection