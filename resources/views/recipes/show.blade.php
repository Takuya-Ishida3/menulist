@extends('layouts.app')

@section('content')
    <div class="row mt-2">
        <div class="offset-sm-3 col-sm-6">
            <div class="card img-thumbnail">
                <div class="recipes_images">
              	    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $recipe->image_name}}" alt="カードの画像">
              	</div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-7">
                            <h5 class="card-title">{{$recipe->name}}</h5>
                        </div>
                        <div class="col-5">
                            @include('commons.favorite_button')
                        </div>
                    </div>
                    <?php $dtpId="datetimepicker1";?>
                    @include('commons.associate_with_menu_button_$recipe')
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            @include('commons.edit_recipe_button')
                        </div>
                    </div>
                    <pre>
                        <p class="card-text border-top border-bottom pb-2 pt-2">{{$recipe->comment}}</p>   
                    </pre>
                    <div class="ingredients">
                        <div class="row">
                            <h5 class="col-12">材料({{ $family_size }}人分)</h5>
                        </div>
                        <div class="row">
                            <div class="table-responsive col-12">
                                <table class="table">
                                    <tbody>
                                        @foreach($ingredients as $ingredient)
                                            <tr>
                                                <td class="text-left">{{ $ingredient->name }} </td>
                                                <td class="text-right">{{ $required_amounts[$ingredient->id] * $family_size }} {{ $ingredient->unit }}</td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php $i=0; ?>
                            @foreach($processes as $process)
                                <?php $i++; ?>
                                <div class="row border-top pt-2">
                                    <div class="col-12">
                                        <p>工程{{ $i }}：</p>    
                                    </div>
                                </div>
                                <div class="row border-bottom pb-2">
                                    <div class="col-12">
                                        <pre>
                                            <p class="card-text">{{ $process->process }}</p>
                                        </pre>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
              	</div>
            </div>    
        </div>
    </div>
@endsection