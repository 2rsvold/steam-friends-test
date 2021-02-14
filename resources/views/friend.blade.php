<div class="col-2">
    <div class="card mb-3">
        <a href="{{ $friend['profileurl'] }}">
            <img src="{{ $friend['avatarfull'] }}" alt="{{ $friend['personaname'] }}" class="card-img-top">
        </a>
        <div class="card-body">
            <h5 class="card-title">{{ $friend['personaname'] }}</h5>
            @isset($friend['realname'])
                <p>
                    <small class="txt-muted">{{ $friend['realname'] }}</small>
                </p>
            @endif
        </div>
        <div class="card-footer">
            <a class="btn btn-sm btn-primary" href="{{ $friend['profileurl'] }}" class="card-link">Visit profile</a>
        </div>
    </div>
</div>
