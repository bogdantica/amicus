<div class="modal fade" id="registration_form-{{ $form->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            @if($form->id)
                {!! Form::open([
                    'url' => route('events.form.update',$form->id ?? 1),
                    'method' => 'PUT',
                    'class' => ''
                ]) !!}
            @else
                {!! Form::open([
                    'url' => route('events.form.create',$event->id ?? 1),
                    'method' => 'POST',
                    'class' => ''
                ]) !!}
            @endif
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ $form->id ? 'Editeza ' . $form->name : 'Formular Nou' }}</h4>
            </div>
            <div class="modal-body">
                @include('events.modals.registration_form.form.registration_form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Inchide</button>
                @if(empty($form->id))
                    <button type="submit" class="btn btn-success">Creaza Formular</button>
                @else
                    <button type="submit" class="btn btn-success">Modifica Formular</button>
                    <button type="button" class="btn btn-warning modal-options">Optiuni Formular</button>
                @endif
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>