<div class="modal fade" id="registration_form_options-{{ $form->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Optiuni {{ $form->name }}</h4>
            </div>
            <div class="modal-body">
                @include('events.modals.attend.attend')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Inchide</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>