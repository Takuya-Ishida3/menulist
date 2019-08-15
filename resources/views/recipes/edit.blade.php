@extends('layouts.app')

@section('content')
<h1>ここではレシピを編集します</h1>
<p>レシピ名：{{ $recipe->name }} ID:{{ $recipe->id }}</p>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => ['recipes.update','id' => $recipe->id],'files' => true,'method' => 'post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'レシピ名') !!}
                    {!! Form::text('name', $recipe->name , ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image_name', '画像アップロード') !!}
                    {!! Form::file('image_name') !!}
                </div>
                
                <div class="form-inline mt-3">
                    @foreach($ingredients as $ingredient)
                    <div class="col-sm-12">
                        <div class="form-group col-sm-2">
                    	    <?php
                    	        $search_id = $ingredient['id'];
                    	        $result = array_key_exists($search_id, $required_amounts);
                                if($result){
                                    $amount = $required_amounts[$search_id];
                                }else{
                                    $amount = "";
                                }
                            ?>
                            <label for="ingredient_id_{{ $ingredient->id }}">{{ $ingredient->name }}</label>
                    	    <input type="text" class="form-control" name="{{ $ingredient->id }}" value="{{ $amount }}">
                    	</div>
                    	<div class="col-sm-10">
                    	    <p>{{ $ingredient->unit }}</p>
                    	</div>
                	</div>
                    @endforeach
                </div>
                <button type="button" id="add_button">工程を追加</button>
                <?php $i=0; ?>
                @if (empty($processes->toArray()))
                    <div class="form-group">
                        <div class="processes">
                            <label for="processes[]">工程</label>
                            <textarea class="form-control" name="processes[]" id="processes[]" rows="10"></textarea>
                        </div>
                    </div>
                @else
                    @foreach($processes as $process)
                    <?php $i++;?>
                    <div class="form-group">
                        <div class="processes">
                            <label for="processes[]">工程</label>
                            <textarea class="form-control" name="processes[]" id="processes[]" rows="10">{{ $process->process }}</textarea>
                        </div>
                    </div>
                    @endforeach    
                @endif
                <div class="append_area">
                    <!-- jsでここに工程を追加する。-->
                </div>
                <div class="form-group">
                    <label for="comment">簡単な料理の説明</label>
                    <textarea class="form-control" name="comment" rows="10">{{ $recipe->comment }}</textarea>
                </div>
                {!! Form::submit('更新する',['id' => $recipe->id], ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection