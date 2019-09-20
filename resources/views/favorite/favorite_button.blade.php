<div class="form-inline">  
    <div class="col-sm-2  form-group "> 
        @if (Auth::user()->is_favorites($micropost->id))
            {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
                {!! Form::submit('Unfavorite', ['class' => 'btn btn-primary btn-sm form-control']) !!}
            {!! Form::close()!!}
        @else
        {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
                {!! Form::submit('Favorite', ['class' => 'btn btn-light btn-sm form-control']) !!}
            {!! Form::close()!!}
        @endif
    </div>    
</div>        