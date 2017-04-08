<div class="modal fade" id="attend-{{ $form->id }}">
    <div class="modal-dialog modal-mlg">
        <div class="modal-content">
            {!! Form::open([ 'url' => route('events.form.attend',$form->id), 'class' => '','id' => 'attendForm']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ $form->name }}</h4>
            </div>
            <div class="modal-body">
                @php $cost = false; @endphp
                @include('events.modals.attend.attend')

            </div>
            <div class="modal-footer">
                @php global $cost; @endphp
                @if($cost)
                    <button type="button" disabled class="btn btn-primary" id="totalCost">0 lei</button>
                @endif
                <button type="button" class="btn btn-danger" data-dismiss="modal">Anuleaza</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>