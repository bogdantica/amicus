{{--<label class=" control-label">--}}
{{--<a href="#" title="Modifica optiunea {{ $option->label }}" data-id="{{ $option->id }}"--}}
{{--class="attend-option">--}}
{{--<i class="fa fa-pencil text-success" aria-hidden="true"></i>--}}
{{--</a>--}}

{{--<div class="">--}}

{{--</div>--}}
{{--{{ $option->label }}--}}

{{--</label>--}}

<div class="">
    @if(!empty($option->details))
        <p class="help-block m-t-0">{!! $option->details !!}</p>
    @endif
    <div class="row">
        @foreach($option->values as $index => $value)
            @php $disabled = (!is_null($value->slots) || $value->slots == 0 || !$value->active) ? 'disabled' : null;
                            $required = $option->required;//$option->required ? true: null;
            @endphp

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('enumerationValues['.$option->id.']['.$value->id.']',$value->id,null,['disabled' => $disabled,'required' => $required]) !!}
                        <strong>{{ $value->value }}</strong>
                    </label>
                    &nbsp;

                    <a href="#" title="Modifica optiunea {{ $value->value }}" data-id="{{ $value->id }}"
                       class="attend-option-value">
                        <i class="fa fa-pencil text-success" aria-hidden="true"></i>
                    </a>

                    @if($option->slots)
                        <p class="help-block m-b-0">{!! $value->slots !!} remaining slots</p>
                    @endif
                    @if($option->cost)
                        <p class="help-block m-b-0">{!! $value->cost_value !!} lei</p>
                    @endif
                    @if(!empty($value->details))
                        <p class="help-block">{!! $value->details !!}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

</div>

