@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="timeline">

                <li class="time-label">
                  <span class="bg-red">
                    {{ \Carbon\Carbon::now()->format('m-d-Y') }}
                  </span>
                </li>

                @foreach($d->tl as $item)
                    {!! $item->body !!}
                @endforeach

                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>

            </ul>
        </div>
    </div>

@endsection
