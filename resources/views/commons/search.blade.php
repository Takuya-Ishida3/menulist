{!! Form::open(['route' => 'recipes']) !!}
    @include('commons.checkbox')
        
    <div class="form-group row justify-content-center">
        <input name="keyword" type="text" class="form-control ml-3 col-sm-7">
        <button type="submit" class="btn btn-primary col-sm-1">検索</button>
    </div>
{!! Form::close() !!}
