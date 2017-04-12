@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('events.show.elements.event')
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
            url: '{{ route('events.form.modal',$d->event->id) }}',
            form: true,
            hookModal: function($modal){
                $modal.find('.editor').wysihtml5();

                $modal.find('.modal-options').dynamicModal({
                    url: '{{ route('events.form.options.modal',['event' => $d->event->id,'form' => $d->event->form->id ?? null]) }}',
                });
            }
        });

        $('.attend').dynamicModal({
            url: '{{ route('attend.modal',$d->event->form->id ?? null) }}',
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


