@if(Auth::check())
    {!! Form::open(['route' => ['associate_with_menu', $recipe->id]]) !!}
        <div class="row">
            <div class="col-sm-7 mb-2">
                <div class="input-group date" id="<?php echo $dtpId;?>" data-target-input="nearest">
                    <label for="<?php echo $dtpId;?>" class="pt-2 pr-2">日付:</label>
                    <input type="text" name="date" class="form-control datetimepicker-input" data-target="#<?php echo $dtpId;?>"/>
                    <div class="input-group-append" data-target="#<?php echo $dtpId;?>" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                @if(Auth::check())
                    {!! Form::submit('献立に追加', ['class' => "btn btn-primary form-group btn-block"]) !!}
                @endif
            </div>
        </div>
    {!! Form::close() !!}
@endif
