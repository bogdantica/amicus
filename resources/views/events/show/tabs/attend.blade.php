<div class="box" style="border-top:0">
    <div class="box-header with-border">
        <h3 class="text-center">{{ $d->event->form->name }}</h3>
    </div>

    {!! Form::open([ 'url' => route('events.form.attend',['event'=> $d->event->id,'form' => $d->event->form->id]), 'class' => 'form-horizontal']) !!}
    <div class="box-body with-border">
        @php $cost = false; @endphp
        @foreach($d->event->form->options as $option)
            <div class="form-group">
                <label class="col-sm-2 control-label">{{ $option->label }}</label>
                @if($option->option_type_id == \App\Models\LuOptionType::TEXT)
                    <div class="col-sm-10">
                        {!! Form::textarea('options['.$option->id.']',null,['class' => 'form-control resize-none','rows' => 3]) !!}
                    </div>
                @endif
                {{--todo details print --}}
                @if($option->option_type_id == \App\Models\LuOptionType::ENUMERATION)
                    @foreach($option->values as $value)
                        <div class="col-sm-4">
                            <label>
                                {!! Form::checkbox('options['.$option->id.'][values][]',$value->id,null) !!}
                            </label>
                            <label class="control-label">
                                {{ $value->value }}
                            </label>
                        </div>
                    @endforeach
                @endif

                @if($option->option_type_id == \App\Models\LuOptionType::MULTIPLE)
                    <div class="col-sm-10">
                        {!! Form::select('options['.$option->id.']',$option->values->pluck('value','id'),null,['class' => 'form-control']) !!}
                    </div>
                @endif

            </div>

            @php if($option->cost) $cost = true; @endphp

        @endforeach

        @if($cost)

            <div class="form-group">
                <label class="col-sm-2 control-label">Total Cost</label>
                <div class="col-sm-2">
                    <input type="text" id="totalCost" class="form-control" disabled/>
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
