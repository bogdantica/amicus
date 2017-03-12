@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box box-primary">
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

        </div>
    </div>

@stop