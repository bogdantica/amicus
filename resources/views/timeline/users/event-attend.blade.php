<li>
    <i class="fa fa-user bg-aqua"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i>{{ $d->timeline->create_at->diffForHumans() }}</span>

        <h3 class="timeline-header no-border"><a href="#">{{ $d->user->first_name }} {{ $d->user->last_name }}</a> attended to {{ $d->event->name }} </h3>

    </div>
</li>