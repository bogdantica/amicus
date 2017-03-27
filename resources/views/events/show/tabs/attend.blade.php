<div class="box" style="border-top:0">
    <div class="box-header with-border">
        <h3 class="text-center">{{ $d->event->form->name }}</h3>
    </div>

    {!! Form::open([ 'url' => route('events.form.attend',['event'=> $d->event->id,'form' => $d->event->form->id]), 'class' => 'form-horizontal','id' => 'attendForm']) !!}
    <div class="box-body with-border">
        @php $cost = false; @endphp
        @foreach($d->event->form->options as $option)

            @if($option->option_type_id == \App\Models\LuOptionType::TEXT)
                <label class="col-sm-2 control-label">{{ $option->label }}</label>
                <div class="col-sm-10 form-group">
                    {!! Form::textarea('textOptions['.$option->id.']',null,['class' => 'form-control resize-none','rows' => 3, 'placeholder' => $option->details]) !!}
                </div>
            @endif

            @if($option->option_type_id == \App\Models\LuOptionType::ENUMERATION)

                <label class="col-sm-2 control-label">{{ $option->label }}</label>
                <div class="col-sm-10 form-group">

                    @if(!empty($option->details))
                        <div class="checkbox">
                            <p class="help-block m-t-0">{!! $option->details !!}</p>
                        </div>

                    @endif

                    @foreach($option->values as $value)
                        @php $disabled = null;// (!is_null($value->slots) && $value->slots == 0) ? 'disabled' : null @endphp
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('enumerationValues['.$option->id.']['.$value->id.']',$value->id,null,['disabled' => $disabled]) !!}
                                {{ $value->value }}
                            </label>
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
                    @endforeach

                </div>
            @endif

            @if($option->option_type_id == \App\Models\LuOptionType::MULTIPLE)

                <label class="col-sm-2 control-label">{{ $option->label }}</label>
                <div class="col-sm-10 form-group">

                    @if(!empty($option->details))
                        <div class="radio">
                            <p class="help-block m-t-0">{!! $option->details !!}</p>
                        </div>

                    @endif

                    @foreach($option->values as $key => $value)
                        @php $disabled = $value->active ? null: true;
                            $required = null;//$option->required ? true: null;
                        @endphp
                        <div class="radio">
                            <label>
                                {!! Form::radio('multipleValues['.$option->id.']',$value->id,$key == 0 ? true: false,['disabled' => $disabled,'required' => $required]) !!}
                                {!! $value->value !!}
                            </label>
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

                    @endforeach

                </div>

            @endif

            @php if($option->cost) $cost = true; @endphp

        @endforeach

        @if($cost)

            <div class="form-group">
                <label class="col-sm-2 control-label">Total Cost</label>
                <div class="col-sm-2">
                    <input type="text" id="totalCost" class="form-control" disabled value="0 lei"/>
                </div>
            </div>

        @endif

    </div>

    <div class="box-footer">
        <p>{!! $d->event->form->details !!}</p>
    </div>

    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2"></label>
            <div class="col-sm-10">
                <button class="btn btn-success" type="submit">Attend</button>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

</div>
