@extends('layouts.app')
@section('content')
    <div class="menus_tab mt-2 mb-2">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"> <a class="nav-link active" role="tab" href="#monday" id="monday-tab" data-toggle="tab" aria-controls="monday" aria-selected="true">{{$monday}}(月)</a> </li>
        <li class="nav-item"> <a class="nav-link" role="tab" href="#tuesday" id="tuesday-tab" data-toggle="tab" aria-controls="tuesday" aria-selected="false">{{$tuesday}}(火)</a> </li>
        <li class="nav-item"> <a class="nav-link" role="tab" href="#wednesday" id="wednesday-tab" data-toggle="tab" aria-controls="wednesday" aria-selected="false">{{$wednesday}}(水)</a> </li>
        <li class="nav-item"> <a class="nav-link" role="tab" href="#thursday" id="thursday-tab" data-toggle="tab" aria-controls="thursday" aria-selected="false">{{$thursday}}(木)</a> </li>
        <li class="nav-item"> <a class="nav-link" role="tab" href="#friday" id="friday-tab" data-toggle="tab" aria-controls="friday" aria-selected="false">{{$friday}}(金)</a> </li>
        <li class="nav-item"> <a class="nav-link" role="tab" href="#saturday" id="saturday-tab" data-toggle="tab" aria-controls="saturday" aria-selected="false">{{$saturday}}(土)</a> </li>
        <li class="nav-item"> <a class="nav-link" role="tab" href="#sunday" id="sunday-tab" data-toggle="tab" aria-controls="sunday" aria-selected="false">{{$sunday}}(日)</a> </li>
      </ul>
    </div>
    <div class="tab-content">
      <div class="tab-pane active" id="monday" role="tabpanel" aria-labelledby="monday-tab">
        <div class="card-columns">
          @foreach($monday_menus as $monday_menu)
            <div class="show_recipes">
              <div class="card">
                <div class="recipes_images">
                  <a href="{{ route('recipes.show',$monday_menu->id) }}">
                    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $monday_menu->image_name}}" alt="カードの画像">
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$monday_menu->name}}</h5>
                  <pre>
                    <p class="card-text">{{$monday_menu->comment}}</p>
                  </pre>
                  <div class="row">
                    <div class="col-6">
                      {!! link_to_route('recipes.show', 'レシピ詳細', ['id' => $monday_menu->id], ['class' => 'btn btn-primary']) !!}  
                    </div>
                    <div class="col-6">
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
        <?php $i = 0;?>
        @if($monday_menus->isEmpty())
          @include('commons.create_menus_button')
        @endif
      </div>
      <div class="tab-pane fade" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">
        <div class="card-columns">
          @foreach($tuesday_menus as $tuesday_menu)
            <div class="show_recipes">
              <div class="card">
                <div class="recipes_images">
                  <a href="{{ route('recipes.show',$tuesday_menu->id) }}">
                	  <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $tuesday_menu->image_name}}" alt="カードの画像">
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$tuesday_menu->name}}</h5>
                  <pre>
                    <p class="card-text">{{$tuesday_menu->comment}}</p>  
                  </pre>
                  <div class="row">
                    <div class="col-6">
                      {!! link_to_route('recipes.show', 'レシピ詳細', ['id' => $tuesday_menu->id], ['class' => 'btn btn-primary']) !!}  
                    </div>
                    <div class="col-6">
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
        <?php $i++; ?>
        @if($tuesday_menus->isEmpty())
          @include('commons.create_menus_button')
        @endif
      </div>
    	<div class="tab-pane fade" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">
        <div class="card-columns">
          @foreach($wednesday_menus as $wednesday_menu)
            <div class="show_recipes">
              <div class="card">
                <div class="recipes_images">
                  <a href="{{ route('recipes.show',$wednesday_menu->id) }}">
                    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $wednesday_menu->image_name}}" alt="カードの画像">
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$wednesday_menu->name}}</h5>
                  <pre>
                    <p class="card-text">{{$wednesday_menu->comment}}</p>  
                  </pre>
                  <div class="row">
                    <div class="col-6">
                      {!! link_to_route('recipes.show', 'レシピ詳細', ['id' => $wednesday_menu->id], ['class' => 'btn btn-primary']) !!}  
                    </div>
                    <div class="col-6">
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
        <?php $i++; ?>
        @if($wednesday_menus->isEmpty())
          @include('commons.create_menus_button')
        @endif
      </div> 
      <div class="tab-pane" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">
        <div class="card-columns">
          @foreach($thursday_menus as $thursday_menu)
            <div class="show_recipes">
              <div class="card">
                <div class="recipes_images">
                  <a href="{{ route('recipes.show',$thursday_menu->id) }}">
                    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $thursday_menu->image_name}}" alt="カードの画像">
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$thursday_menu->name}}</h5>
                  <pre>
                    <p class="card-text">{{$thursday_menu->comment}}</p>  
                  </pre>
                  <div class="row">
                    <div class="col-6">
                      {!! link_to_route('recipes.show', 'レシピ詳細', ['id' => $thursday_menu->id], ['class' => 'btn btn-primary']) !!}  
                    </div>
                    <div class="col-6">
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
        <?php $i++; ?>
        @if($thursday_menus->isEmpty())
          @include('commons.create_menus_button')
        @endif
      </div>
      <div class="tab-pane fade" id="friday" role="tabpanel" aria-labelledby="friday-tab">
        <div class="card-columns">
          @foreach($friday_menus as $friday_menu)
            <div class="show_recipes">
              <div class="card">
                <div class="recipes_images">
                  <a href="{{ route('recipes.show',$friday_menu->id) }}">
              	    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $friday_menu->image_name}}" alt="カードの画像">
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$friday_menu->name}}</h5>
                  <pre>
                    <p class="card-text">{{$friday_menu->comment}}</p>  
                  </pre>
                  <div class="row">
                    <div class="col-6">
                      {!! link_to_route('recipes.show', 'レシピ詳細', ['id' => $friday_menu->id], ['class' => 'btn btn-primary']) !!}  
                    </div>
                    <div class="col-6">
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
        <?php $i++; ?>
        @if($friday_menus->isEmpty())
          @include('commons.create_menus_button')
        @endif
      </div>
      <div class="tab-pane fade" id="saturday" role="tabpanel" aria-labelledby="saturday-tab">
        <div class="card-columns">
          @foreach($saturday_menus as $saturday_menu)
            <div class="show_recipes">
               <div class="card">
                <div class="recipes_images">
                  <a href="{{ route('recipes.show',$saturday_menu->id) }}">
                	  <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $saturday_menu->image_name}}" alt="カードの画像">
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$saturday_menu->name}}</h5>
                  <pre>
                    <p class="card-text">{{$saturday_menu->comment}}</p>  
                  </pre>
                  <div class="row">
                    <div class="col-6">
                      {!! link_to_route('recipes.show', 'レシピ詳細', ['id' => $saturday_menu->id], ['class' => 'btn btn-primary']) !!}  
                    </div>
                    <div class="col-6">
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
        <?php $i++; ?>
        @if($saturday_menus->isEmpty())
          @include('commons.create_menus_button')
        @endif
      </div>
      <div class="tab-pane" id="sunday" role="tabpanel" aria-labelledby="sunday-tab">
        <div class="card-columns">
          @foreach($sunday_menus as $sunday_menu)
            <div class="show_recipes">
              <div class="card">
                <div class="recipes_images">
                  <a href="{{ route('recipes.show',$sunday_menu->id) }}">
                    <img class="card-img-top" src="{{'https://s3-ap-northeast-1.amazonaws.com/menu-list/'. $sunday_menu->image_name}}" alt="カードの画像">
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$sunday_menu->name}}</h5>
                  <pre>
                    <p class="card-text">{{$sunday_menu->comment}}</p>  
                  </pre>
                  <div class="row">
                    <div class="col-6">
                      {!! link_to_route('recipes.show', 'レシピ詳細', ['id' => $sunday_menu->id], ['class' => 'btn btn-primary']) !!}  
                    </div>
                    <div class="col-6">
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
        <?php $i++; ?>
          @if($sunday_menus->isEmpty())
            @include('commons.create_menus_button')
          @endif
      </div>
    </div>
    <div class="mt-2">
      {!! link_to_route('menus.ingredients_list', '材料一覧へ', ['id' => Auth::user()->id]) !!}
    </div>
@endsection