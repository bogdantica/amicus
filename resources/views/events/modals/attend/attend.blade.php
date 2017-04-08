<ul class="nav nav-tabs" role="tablist">
    {{--<li class="active"><a href="#details" role="tab" data-toggle="tab">Detalii</a></li>--}}
    @foreach($form->options as $key => $option)
        <li class="{{ $key == 0 ? 'active' : '' }}">
            <a href="#option-{{ $option->id }}" role="tab" data-toggle="tab">{{ $option->label }}</a>
        </li>
    @endforeach
    <li><a href="#inscriere" role="tab" data-toggle="tab">Inscriere</a></li>

    <li class="pull-right"><a href="#" class="text-danger option-new" data-id2="{{ $form->id }}">Adauga Optiune Noua</a></li>

</ul>

<div class="tab-content">
    {{--<div class="active tab-pane fade in" id="details">--}}
    {{--</div>--}}
    @foreach($form->options as $key => $option)
        <div class="tab-pane fade {{ $key == 0 ? 'active in' :'' }}" id="option-{{ $option->id }}">
            <h2>{{ $option->label }}
                <a href="#" title="Modifica optiunea {{ $option->label }}" data-id="{{ $option->id }}"
                   class="attend-option">
                    <i class="fa fa-pencil text-success" aria-hidden="true"></i>
                </a>

                <a href="#" title="Adauga Optiune Noua" class="new-option-value" data-id2="{{ $option->id }}">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                </a>

            </h2>
            <div class="form-group">
                @if($option->option_type_id == \App\Models\LuOptionType::TEXT)
                    @include('events.modals.attend.options.10')
                @endif

                @if($option->option_type_id == \App\Models\LuOptionType::ENUMERATION)
                    @include('.events.modals.attend.options.20')
                @endif

                @if($option->option_type_id == \App\Models\LuOptionType::MULTIPLE)
                    @include('.events.modals.attend.options.30')
                @endif
            </div>
            @php global $cost; $option->cost == true ? ($cost = true) : null; @endphp
        </div>
    @endforeach
    <div class="tab-pane fade" id="inscriere">
        <h2>Inscriere</h2>
        <p>{{ $form->details }}</p>
        <button type="submit" class="btn btn-success">Inscriere</button>

    </div>

</div>




