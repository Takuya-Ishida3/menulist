@extends('layouts.app')

@section('content')


<div class="container-fluid">
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"> <a class="nav-link active" role="tab" href="#monday" id="monday-tab" data-toggle="tab" aria-controls="monday" aria-selected="true">{{$monday}}</a> </li>
    <li class="nav-item"> <a class="nav-link" role="tab" href="#tuesday" id="tuesday-tab" data-toggle="tab" aria-controls="tuesday" aria-selected="false">{{$tuesday}}</a> </li>
    <li class="nav-item"> <a class="nav-link" role="tab" href="#wednesday" id="wednesday-tab" data-toggle="tab" aria-controls="wednesday" aria-selected="false">{{$wednesday}}</a> </li>
    <li class="nav-item"> <a class="nav-link" role="tab" href="#thursday" id="thursday-tab" data-toggle="tab" aria-controls="thursday" aria-selected="false">{{$thursday}}</a> </li>
    <li class="nav-item"> <a class="nav-link" role="tab" href="#friday" id="friday-tab" data-toggle="tab" aria-controls="friday" aria-selected="false">{{$friday}}</a> </li>
    <li class="nav-item"> <a class="nav-link" role="tab" href="#saturday" id="saturday-tab" data-toggle="tab" aria-controls="saturday" aria-selected="false">{{$saturday}}</a> </li>
    <li class="nav-item"> <a class="nav-link" role="tab" href="#sunday" id="sunday-tab" data-toggle="tab" aria-controls="sunday" aria-selected="false">{{$sunday}}</a> </li>
  </ul>
  <div class="tab-content">
      <div class="tab-pane active" id="monday" role="tabpanel" aria-labelledby="monday-tab">
          <div class="p-3">
            {{'monday'}}
              @foreach($monday_menus as $monday_menu)
                <div class="show_recipes">
                  <div class="row">
                    <div class="offset-sm-1 col-sm-5">
                      <div class="card">
                        <div class="recipes_images">
                			    <a href="{{ route('recipes.show',$monday_menu->id) }}">
                            <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $monday_menu->image_name}}" alt="カードの画像">
                			    </a>
                		    </div>
                        <div class="card-body">
                          <h1 class="card-title">{{$monday_menu->name}}</h1>
                          <p class="card-text">{{$monday_menu->comment}}</p>
                          <a href="#" class="btn btn-primary">献立に追加</a>
                          @if (Auth::user()->confirm_menu($monday_menu->id))
                            {!! Form::open(['route' => ['unassociate_with_menu', $monday_menu->pivot->id], 'method' => 'delete']) !!}
                                {!! Form::submit('献立から削除', ['class' => "btn btn-danger"]) !!}
                            {!! Form::close() !!}
                          @endif
                		    </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
          </div>
      </div>
      <div class="tab-pane fade" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">
          <div class="p-3">
            {{'tuesday'}}
            @foreach($tuesday_menus as $tuesday_menu)
              <div class="show_recipes">
                <div class="row">
                  <div class="offset-sm-1 col-sm-5">
                    <div class="card">
                      <div class="recipes_images">
              			    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $tuesday_menu->image_name}}" alt="カードの画像">
              		    </div>
                      <div class="card-body">
                        <h1 class="card-title">{{$tuesday_menu->name}}</h1>
                        <p class="card-text">{{$tuesday_menu->comment}}</p>
                        <a href="#" class="btn btn-primary">献立に追加</a>
                        @if (Auth::user()->confirm_menu($tuesday_menu->id))
                          {!! Form::open(['route' => ['unassociate_with_menu', $tuesday_menu->pivot->id], 'method' => 'delete']) !!}
                              {!! Form::submit('献立から削除', ['class' => "btn btn-danger"]) !!}
                          {!! Form::close() !!}
                        @endif
              		    </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
      </div>
  	  <div class="tab-pane fade" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">
          <div class="p-3">
            {{'wednesday'}}
            @foreach($wednesday_menus as $wednesday_menu)
              <div class="show_recipes">
                <div class="row">
                  <div class="offset-sm-1 col-sm-5">
                    <div class="card">
                      <div class="recipes_images">
              			    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $wednesday_menu->image_name}}" alt="カードの画像">
              		    </div>
                      <div class="card-body">
                        <h1 class="card-title">{{$wednesday_menu->name}}</h1>
                        <p class="card-text">{{$wednesday_menu->comment}}</p>
                        <a href="#" class="btn btn-primary">献立に追加</a>
                        @if (Auth::user()->confirm_menu($wednesday_menu->id))
                          {!! Form::open(['route' => ['unassociate_with_menu', $wednesday_menu->pivot->id], 'method' => 'delete']) !!}
                              {!! Form::submit('献立から削除', ['class' => "btn btn-danger"]) !!}
                          {!! Form::close() !!}
                        @endif
              		    </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
      </div> 
      <div class="tab-pane" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">
          <div class="p-3">
            {{'thursday'}}
            @foreach($thursday_menus as $thursday_menu)
              <div class="show_recipes">
                <div class="row">
                  <div class="offset-sm-1 col-sm-5">
                    <div class="card">
                      <div class="recipes_images">
              			    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $thursday_menu->image_name}}" alt="カードの画像">
              		    </div>
                      <div class="card-body">
                        <h1 class="card-title">{{$thursday_menu->name}}</h1>
                        <p class="card-text">{{$thursday_menu->comment}}</p>
                        <a href="#" class="btn btn-primary">献立に追加</a>
                        @if (Auth::user()->confirm_menu($thursday_menu->id))
                          {!! Form::open(['route' => ['unassociate_with_menu', $thursday_menu->pivot->id], 'method' => 'delete']) !!}
                              {!! Form::submit('献立から削除', ['class' => "btn btn-danger"]) !!}
                          {!! Form::close() !!}
                        @endif
              		    </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
      </div>
      <div class="tab-pane fade" id="friday" role="tabpanel" aria-labelledby="friday-tab">
          <div class="p-3">
            {{'friday'}}
            @foreach($friday_menus as $friday_menu)
              <div class="show_recipes">
                <div class="row">
                  <div class="offset-sm-1 col-sm-5">
                    <div class="card">
                      <div class="recipes_images">
              			    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $friday_menu->image_name}}" alt="カードの画像">
              		    </div>
                      <div class="card-body">
                        <h1 class="card-title">{{$friday_menu->name}}</h1>
                        <p class="card-text">{{$friday_menu->comment}}</p>
                        <a href="#" class="btn btn-primary">献立に追加</a>
                        @if (Auth::user()->confirm_menu($friday_menu->id))
                          {!! Form::open(['route' => ['unassociate_with_menu', $friday_menu->pivot->id], 'method' => 'delete']) !!}
                              {!! Form::submit('献立から削除', ['class' => "btn btn-danger"]) !!}
                          {!! Form::close() !!}
                        @endif
              		    </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
      </div>
      <div class="tab-pane fade" id="saturday" role="tabpanel" aria-labelledby="saturday-tab">
          <div class="p-3">
            {{'saturday'}}
            @foreach($saturday_menus as $saturday_menu)
              <div class="show_recipes">
                <div class="row">
                  <div class="offset-sm-1 col-sm-5">
                    <div class="card">
                      <div class="recipes_images">
              			    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $saturday_menu->image_name}}" alt="カードの画像">
              		    </div>
                      <div class="card-body">
                        <h1 class="card-title">{{$saturday_menu->name}}</h1>
                        <p class="card-text">{{$saturday_menu->comment}}</p>
                        <a href="#" class="btn btn-primary">献立に追加</a>
                        @if (Auth::user()->confirm_menu($saturday_menu->id))
                          {!! Form::open(['route' => ['unassociate_with_menu', $saturday_menu->pivot->id], 'method' => 'delete']) !!}
                              {!! Form::submit('献立から削除', ['class' => "btn btn-danger"]) !!}
                          {!! Form::close() !!}
                        @endif
              		    </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
      </div>
      <div class="tab-pane" id="sunday" role="tabpanel" aria-labelledby="sunday-tab">
          <div class="p-3">
            {{'sunday'}}
            @foreach($sunday_menus as $sunday_menu)
              <div class="show_recipes">
                <div class="row">
                  <div class="offset-sm-1 col-sm-5">
                    <div class="card">
                      <div class="recipes_images">
              			    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $sunday_menu->image_name}}" alt="カードの画像">
              		    </div>
                      <div class="card-body">
                        <h1 class="card-title">{{$sunday_menu->name}}</h1>
                        <p class="card-text">{{$sunday_menu->comment}}</p>
                        <a href="#" class="btn btn-primary">献立に追加</a>
                        @if (Auth::user()->confirm_menu($sunday_menu->id))
                          {!! Form::open(['route' => ['unassociate_with_menu', $sunday_menu->pivot->id], 'method' => 'delete']) !!}
                              {!! Form::submit('献立から削除', ['class' => "btn btn-danger"]) !!}
                          {!! Form::close() !!}
                        @endif
              		    </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
      </div>
  </div>
</div>

@include('commons.create_menus_button')


{!! link_to_route('menus.ingredients_list', '材料一覧へ', ['id' => Auth::user()->id]) !!}











@endsection