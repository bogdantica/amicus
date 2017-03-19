<div class="box box-primary">
    <div class="box-header text-center with-border">
        Option {{ $index + 1 }}
    </div>
    <div class="row">
        {!! Form::open(['url' => route('events.form.option.update',$option->id), 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Label</label>
                    <div class="col-sm-10">
                        {!! Form::text('label',$option->label,['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Details</label>
                    <div class="col-sm-10">
                        {!! Form::textarea('details',$option->details,['class' => 'form-control resize-none editor','rows' => 3]) !!}
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-left">
                        <label>
                            <input type="hidden" name="required" value="0"/>
                            {!! Form::checkbox('required',true,$option->required,['class' => '']) !!}
                        </label>
                        <label class=" control-label">Required</label>

                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                        <label>
                            <input type="hidden" name="cost" value="0"/>
                            {!! Form::checkbox('cost',true,$option->cost,['class' => '']) !!}
                        </label>
                        <label class="control-label">Cost</label>

                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-right">
                        <label class="control-label">Slots</label>
                        <label>
                            <input type="hidden" name="slots" value="0"/>
                            {!! Form::checkbox('slots',true,$option->slots,['class' => '']) !!}
                        </label>
                    </div>
                </div>


                <div class="">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-10">
                            {!! Form::select('option_type_id',\App\Models\LuOptionType::all()->pluck('display','option_type_id'),$option->option_type_id,['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        @if($option->active)
                            <button class="btn btn-danger" name="active" value="0">Disable</button>
                        @else
                            <button class="btn btn-success" name="active" value="1">Enable</button>
                        @endif
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#option-{{ $option->id }}">
                            Values
                        </button>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-right">
                        <button class="btn btn-primary" name="update" value="1">Update</button>
                    </div>
                </div>

            </div>

        </div>
        {!! Form::close() !!}
        <div class="modal fade" id="option-{{ $option->id }}">
            <div class="modal-dialog modal-xlg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">{{ $option->label }} Values</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @foreach($option->values as $value)
                                {!! Form::open(['url' => route('events.form.option.value.update',$value->id),'method' => 'PUT','class'=>'form-horizontal']) !!}
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="box box-success">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Details</label>
                                                <div class="col-sm-10">
                                                    {!! Form::textarea('details',$value->details,['class' => 'form-control editor']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Value</label>
                                                <div class="col-sm-10">
                                                    {!! Form::text('value',$value->value,['class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Cost Value</label>
                                                <div class="col-sm-10">
                                                    {!! Form::text('cost_value',$value->cost_value,['class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Slots</label>
                                                <div class="col-sm-10">
                                                    {!! Form::text('slots',$value->slots,['class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-10">
                                                    @if($value->active)
                                                        <button class="btn btn-danger" name="active" value="0">Disable</button>
                                                    @else
                                                        <button class="btn btn-success" name="active" value="1">Enable</button>
                                                    @endif
                                                    <button class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            @endforeach
                                {!! Form::open(['url' => route('events.form.option.value.create',$option->id),'class'=>'form-horizontal']) !!}
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="box box-warning">
                                        <div class="box-header text-center">
                                            <h4>New Value</h4>
                                        </div>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Details</label>
                                                <div class="col-sm-10">
                                                    {!! Form::textarea('details',null,['class' => 'form-control editor']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Value</label>
                                                <div class="col-sm-10">
                                                    {!! Form::text('value',null,['class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Cost Value</label>
                                                <div class="col-sm-10">
                                                    {!! Form::text('cost_value',null,['class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Slots</label>
                                                <div class="col-sm-10">
                                                    {!! Form::text('slots',null,['class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-10">
                                                    <button class="btn btn-primary">Create</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
