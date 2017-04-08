<div class="modal fade" id="option-{{ $option->id ?? '' }}">
    <div class="modal-dialog">
        <div class="modal-content">
            @if($option->id)
                {!! Form::open([ 'url' => route('events.form.option.update',$option->id),'method' => 'PUT', 'class' => '']) !!}
            @else
                {!! Form::open([ 'url' => route('events.form.option.create',$form->id),'method' => 'POST', 'class' => '']) !!}
            @endif
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ $option->id ? 'Editeaza - ' . $option->label : 'Adauga optiune noua'  }}</h4>
            </div>
            <div class="modal-body">
                @if($option->id)
                    @if($option->option_type_id == \App\Models\LuOptionType::TEXT)
                        @include('events.modals.registration_form.option.options.10')
                    @elseif($option->option_type_id == \App\Models\LuOptionType::ENUMERATION)
                        @include('events.modals.registration_form.option.options.20')
                    @elseif($option->option_type_id == \App\Models\LuOptionType::MULTIPLE)
                        @include('events.modals.registration_form.option.options.30')
                    @endif
                @else
                    @include('events.modals.registration_form.option.options.new')
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
                <button type="submit" class="btn btn-success">Salveaza</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>