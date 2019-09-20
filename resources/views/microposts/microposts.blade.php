<ul class="media-list">
    @foreach($microposts as $micropost)
        <li class="media mb-3">
            <img class="mr-2 rouded" src="{{ Gravatar::src($micropost->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $micropost->user->name, ['id' => $micropost->user->id]) !!}<span class="text-muted"> posted at {{ $micropost->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                </div>
                <div class="form-inline">
                    <div class="col-sm-4 mr-0  form-group">
                        @if (Auth::id() == $micropost->user_id)
                             {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm form-control']) !!}
                             {!! Form::close() !!}   
                        @endif 
                        @include('favorite.favorite_button',['micropost' => $micropost])
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $microposts->links('pagination::bootstrap-4') }}