@extends('layouts.app')

@section('content')
     <div class="row">
         <aside class="col-sm-4">
             @include('users.card', ['user' => $user])
         </aside>
         <div class="col-sm-8">
             @include('users.navtabs', ['user' => $user])
             @if (count($favorites) > 0)
                 <ul class="media-list">
                     @foreach ($favorites as $favorite)
                     <li class="media mb-3">
                         <img class="mr-2 rouded" src="{{ Gravatar::src($favorite->user->email, 50) }}" alt="">
                         <div class="media-body">
                             <div>
                                {!! link_to_route('users.show', $favorite->user->name, ['id' => $favorite->user->id]) !!}<span class="text-muted"> posted at {{ $favorite->created_at }}</span>
                             </div>
                             <div>
                                 <p class="mb-0">{!! nl2br(e($favorite->content)) !!}</p>
                             </div>
                             <div class="form-inline">
                                 <div class="col-sm-1 form-group mr-4">
                                        @if (Auth::id() == $favorite->user_id)
                                             {!! Form::open(['route' => ['microposts.destroy', $favorite->id], 'method' => 'delete']) !!}
                                                      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm form-control']) !!}
                                             {!! Form::close() !!}   
                                        @endif     
                                 </div>
                                 <div class="col-sm-2 form-group ">
                                    @if (Auth::user()->is_favorites($favorite->id))
                                        {!! Form::open(['route' => ['favorites.unfavorite', $favorite->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('Unfavorite', ['class' => 'btn btn-primary btn-sm form-control']) !!}
                                        {!! Form::close()!!}
                                    @else
                                    {!! Form::open(['route' => ['favorites.favorite', $favorite->id]]) !!}
                                            {!! Form::submit('Favorite', ['class' => 'btn btn-light btn-sm form-control']) !!}
                                        {!! Form::close()!!}
                                    @endif
                                 </div>
                              </div> 
                         </div>
                     </li>
                     @endforeach
                 </ul>
             @endif
         </div>
     </div>
@endsection