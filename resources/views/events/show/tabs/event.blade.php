{{--todo to css file--}}
<div class="box" style="border-top:0">
    <div class="box-header with-border">
        <h3>{{ $d->event->name }}</h3>
        <p>Organized by {{ $d->event->subsidiary->name }}</p>
    </div>
    {{--<hr/>--}}
    <div class="box-body">
        <i class="fa fa-clock-o" aria-hidden="true"></i>
        &nbsp;
        Start <strong>{{ $d->event->start_date->format('d-m-Y') }}</strong>
        &nbsp;
        <i class="fa fa-arrow-right" aria-hidden="true"></i>
        &nbsp;
        End <strong>{{ $d->event->end_date->format('d-m-Y') }}</strong>

        <hr/>

        <i class="fa fa-location-arrow" aria-hidden="true"></i>
        &nbsp;
        {{ $d->event->address }}
        {{ $d->event->location }}
        <hr/>
    </div>

    <div class="box-body">
        <p>{{ $d->event->description }}</p>
    </div>

    {{--todo event contact--}}

    {{--todo event resources--}}

    {{--todo attend--}}

</div>

