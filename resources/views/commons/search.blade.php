{!! Form::open(['route' => 'recipes']) !!}
    <form>
        <div class="search_form mt-2">
            <div class="form-row">
                <div class="col-6 col-sm-8 mb-2">
                    <input name="keyword" type="text" class="form-control" placeholder="レシピ名で検索">
                </div> 
                <div class="col-4 col-sm-2 mb-2">
                    <button type="submit" class="btn btn-primary btn-block">検索</button>
                </div>
                <div class="col-12 col-sm-2 mb-2">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal1">材料から検索</button>
                </div>
                <div class="modal fade" id="modal1" tabindex="-1"role="dialog" aria-labelledby="label1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="label1">材料検索</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @include('commons.acordion_search')
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">検索</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">閉じる</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
{!! Form::close() !!}
