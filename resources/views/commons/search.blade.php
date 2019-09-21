{!! Form::open(['route' => 'recipes']) !!}
    @include('commons.checkbox')
    <form>
        <div class="search_form">
            <div class="form-row">
                <div class="offset-1 col-6 col-sm-8">
                    <input name="keyword" type="text" class="form-control" placeholder="レシピ名で検索">
                </div> 
                <div class="col-4 col-sm-2">
                    <button type="submit" class="btn btn-primary col-10">検索</button>
                </div> 
            </div>
        </div>
    </form>
{!! Form::close() !!}
