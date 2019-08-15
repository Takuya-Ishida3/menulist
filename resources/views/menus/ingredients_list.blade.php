@extends('layouts.app')

@section('content')
    <div class="show_ingredient_list">
        <table class="table table-striped table bordered">
            @if(!$exist)
                <p>献立が登録されていません。</p>
            @endif
            @foreach($ingredients as $ingredient)
                @if($sum[$ingredient->id]!=null)
                    <tr>
                        <th class="tect-center">{{ $ingredient->name }}</th>
                        
                    </tr>
                    <tr>
                        <td class="table-center">{{ $sum[$ingredient->id]." ".$ingredient->unit }}</td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection
