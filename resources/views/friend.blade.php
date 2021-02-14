<!--
"steamid" => "76561197960310178"
"communityvisibilitystate" => 3
"profilestate" => 1
"personaname" => "Orcons"
"commentpermission" => 1
"profileurl" => "https://steamcommunity.com/id/orcons/"
"avatar" => "https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/14/1454c7d29372359bf8b4b3f42b4158b837f41c9c.jpg"
"avatarmedium" => "https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/14/1454c7d29372359bf8b4b3f42b4158b837f41c9c_medium.jpg"
"avatarfull" => "https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/14/1454c7d29372359bf8b4b3f42b4158b837f41c9c_full.jpg"
"avatarhash" => "1454c7d29372359bf8b4b3f42b4158b837f41c9c"
"lastlogoff" => 1613320406
"personastate" => 0
"realname" => "Orcons - The Original"
"primaryclanid" => "103582791456502804"
"timecreated" => 1063364804
"personastateflags" => 0
"loccountrycode" => "NO"
-->

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
