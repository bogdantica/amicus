@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right" role="tablist">
                    <li><a href="#tab3" role="tab" data-toggle="tab">Form</a></li>
                    <li class="active"><a href="#tab2" role="tab" data-toggle="tab">Attend</a></li>
                    <li><a href="#tab1" role="tab" data-toggle="tab">Event</a></li>

                </ul>
                <!-- TAB CONTENT -->
                <div class="tab-content" style="padding:0;">
                    <div class=" tab-pane fade" id="tab1">
                        @include('events.show.tabs.event')
                    </div>
                    <div class="active tab-pane fade in" id="tab2">
                        @include('events.show.tabs.attend')
                    </div>
                    <div class=" tab-pane fade" id="tab3">

                        @if($d->event->form)
                            @include('events.show.tabs.form')
                        @else
                            @include('events.show.tabs.newForm')
                        @endif
                    </div>
                </div>

            </div>
            <!-- TAB NAVIGATION -->
        </div>
    </div>

@stop

@section('scripts')

    <script>
        $(document).ready(function(){
            $('.editor').wysihtml5();
        });

        $('#attendForm').ajaxForm();

    </script>

@stop


