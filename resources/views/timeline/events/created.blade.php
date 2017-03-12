<li>
    <i class="fa fa-calendar" aria-hidden="true"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i>
            {{ $d->event->start_date->format('d-m-Y') }}
            @if($d->event->end_date)
                <i class="fa fa-arrow-circle-right"></i>
                {{ \Carbon\Carbon::now()->format('d-m-Y') }}
            @endif
        </span>

        <h3 class="timeline-header"><a href="{{ route('subsidiary.show',$d->event->subsidiary_id) }}">{{ $d->event->subsidiary->name }}</a> opened an event</h3>

        <div class="timeline-body">
            <h2><a href="{{ route('event.show',$d->event->id) }}">{{ $d->event->name }}</a></h2>
            {{ $d->event->description }}
        </div>
        <div class="timeline-footer">
            <a class="btn btn-primary btn-xs" href="{{ route('event.show', $d->event->id) }}">Read more</a>
            <a class="btn btn-success btn-xs">Attend</a>
        </div>
    </div>
</li>