@extends('layouts.app')

@section('content')
    <div class="row">
        <div id="recipe_title" class="mx-auto">
            <h1>レシピ名：{{ $recipe->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="recipe_image col-sm-6">
            <img src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $recipe->image_name}}" class="img-fluid mx-auto d-block">
        </div>    
        <div class ="comment col-sm-6">
            <p class="mx-auto">コメント：{{ $recipe->comment }}</p>
                <div class="row">
                    @include('commons.favorite_button')    
                    <?php $i = 0; $i++; $dtpId="datetimepicker".$i; ?>
                    @include('commons.associate_with_menu_button_$recipe')
                </div>  
            </div>
        </div>
    </div>
    <div class="ingredients">
        <div class="row">
            @foreach($ingredients as $ingredient)
                <p class="col-sm-4">材料名：{{ $ingredient->name }} </p>
            @endforeach 
        </div>
    </div>
    <?php $i=0; ?>
        @foreach($processes as $process)
            <?php $i++; ?>
            <p>工程{{ $i }}：{{ $process->process }}</p>
        @endforeach
@endsection