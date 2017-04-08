@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- TAB CONTENT -->
        @include('events.show.tabs.event')

        <!-- TAB NAVIGATION -->
        </div>
    </div>

@stop

@section('scripts')

    <script>
        $(document).ready(function () {

        });

        $('.edit-event').dynamicModal({
            url: '{{ route('event.modal') }}',
            form: true,
            hookModal: function($modal){
                $modal.find('.editor').wysihtml5();
            }
        });

        $('.edit-registration-form').dynamicModal({
            url: '{{ route('events.form.modal',$d->event->form->id) }}',
            form: true,
            hookModal: function($modal){
                $modal.find('.editor').wysihtml5();
            }
        });

        $('.attend').dynamicModal({
            url: '{{ route('attend.modal',$d->event->form->id) }}',
            form: true,
            method: 'GET',
            hookModal: function($modal){
                $modal.find('.attend-option').dynamicModal({
                    url: '{{ route('events.form.option.modal') }}',
                    form: true,
                    hookModal: function($modal){
                        $modal.find('.editor').wysihtml5();
                    }
                });

                $modal.find('.option-new').dynamicModal({
                    url: '{{ route('events.form.option.modal') }}',
                    form: true,
                    hookModal: function($modal){
                        $modal.find('.editor').wysihtml5();
                    }
                });


                $modal.find('.attend-option-value').dynamicModal({
                    url: '{{ route('events.form.option.value.modal') }}',
                    form: true,
                    hookModal: function($modal){
                        $modal.find('.editor').wysihtml5();
                    }
                });

                $modal.find('.new-option-value').dynamicModal({
                    url: '{{ route('events.form.option.value.modal') }}',
                    form: true,
                    hookModal: function($modal){
                        $modal.find('.editor').wysihtml5();
                    }
                });



            }
        });

    </script>

@stop


