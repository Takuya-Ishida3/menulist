@extends('layouts.app')

@section('content')
    @if(!$exist)
        <div class="mt-4">
            <h5 class="text-center">献立が登録されていません。<h5>
        </div>
        <div class="mt-2">
            <p class="text-center">材料一覧を表示するには献立を登録しましょう！</p>
        </div>
        @if(Auth::check())
        <div class="row mt-2">
            {!! link_to_route('menus.index', '献立を作成する！', [], ['class' => 'offset-sm-4 col-sm-4 text-center']) !!}
        </div>
        @else
        <p class="text-center mt-2">献立作成機能を利用するにはログインが必要です</p>
        <div class="row mt-2">
            {!! link_to_route('login', 'ログイン', [], ['class' => 'offset-sm-4 col-sm-2 text-center']) !!}
            {!! link_to_route('signup.get', '新規登録', [], ['class' => 'col-sm-2 text-center']) !!}
        </div>
        @endif
    @endif
    @if($exist)
    <div class="row">
        <div class="offset-1 col-10">
            <h5 class="mt-3">買い物リスト({{ Auth::user()->family_size }}人分)</h5>
            <div class="show_ingredient_list mt-4">
                <table class="table table-striped table-bordered">
                    @foreach($ingredients as $ingredient)
                        @if($sum[$ingredient->id]!=null)    
                            <tr>
                                <td class="text-left">{{ $ingredient->name }}</t>
                                <td class="text-right">{{ $sum[$ingredient->id]." ".$ingredient->unit }}</td>
                            </tr>
                        @endif
                    @endforeach    
                </table>
            </div>
        </div>
    </div>
    @endif
@endsection
