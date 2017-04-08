<div class="modal fade" id="event-{{ $event->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            @if($event->id)
                {!! Form::open(['url' => route('event.update',$event->id),'method' => 'PUT']) !!}
            @else
                {!! Form::open(['url' => route('event.save'),'method' => 'POST']) !!}
            @endif
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ $event->id ? 'Editeaza' . $event->name : 'Eveniment nou' }}</h4>
            </div>
            <div class="modal-body">
                @include('events.modals.event.event')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Salveaza Eveniment</button>
            </div>
        </div>
    </div>
</div>