@extends('layouts.app')

@section('content')
    
    {!! Form::open(['route' => ['recipes.update','id' => $recipe->id],'files' => true,'method' => 'post']) !!}
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
            <h3 class="mt-2">レシピ編集フォーム</h3>
            <p>レシピ名：{{ $recipe->name }} ID:{{ $recipe->id }}</p>
                <div class="form-group">
                    {!! Form::label('name', 'レシピ名') !!}
                    {!! Form::text('name', $recipe->name , ['class' => 'form-control']) !!}
                </div>
                <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $recipe->image_name}}" alt="カードの画像">
                <div class="form-group">
                    {!! Form::label('image_name', '画像アップロード') !!}
                    {!! Form::file('image_name') !!}
                </div>
                <div class="border-top pt-4">
                    <h5 class="mt-2 mb-2">分量を入力してください</h5>
                </div>
                @include('commons.acordion_edit_recipes')
                <button type="button" id="add_button" class="mt-2 mb-2">工程を追加</button>
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
                {!! Form::submit('更新する',['id' => $recipe->id,'class' => 'btn btn-primary btn-block']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    <div class="row mt-3">
        <div class="col-sm-6 offset-sm-3">
            @include('commons.delete_recipe_button')
        </div>
    </div>
@endsection