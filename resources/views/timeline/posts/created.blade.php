<li>
    <i class="fa fa-newspaper-o" aria-hidden="true"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> {{ $d->post->create_at->diffForHumans() }}</span>

        <h3 class="timeline-header"><a href="{{ route('users.profile',$d->post->owner_id) }}">{{ $d->post->owner->first_name }} {{ $d->post->owner->last_name }}</a> posted something.</h3>

        <div class="timeline-body">
            <h2>{{ $d->post->title }}</h2>
            {{ $d->post->content }}
        </div>
        <div class="timeline-footer">

            {{--todo href to post--}}

            <a class="btn btn-primary btn-xs" href="#">Read more</a>
        </div>
    </div>
</li>