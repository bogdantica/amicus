<div class="box box-primary">
    <div class="box-header text-center ">
        Option {{ $index + 1 }}
    </div>
    <div class="row">
        {!! Form::open([ 'url' => route('events.form.option.update',$option->id),'method' => 'PUT', 'class' => 'form-horizontal']) !!}
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
                    <label class="col-sm-2 control-label">Description</label>
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
                    {{--<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">--}}
                        {{--<label>--}}
                            {{--{!! Form::checkbox('cost',true,$option->cost,['class' => '']) !!}--}}
                        {{--</label>--}}
                        {{--<label class="control-label">Cost</label>--}}

                    {{--</div>--}}
                    {{--<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-right">--}}
                        {{--<label class="control-label">Slots</label>--}}
                        {{--<label>--}}
                            {{--{!! Form::checkbox('slots',true,$option->slots,['class' => '']) !!}--}}
                        {{--</label>--}}
                    {{--</div>--}}
                </div>


                <div class="box-body">
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
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                        <button class="btn btn-primary" name="update" value="1">Update</button>
                    </div>
                </div>

            </div>

        </div>

        {!! Form::close() !!}

    </div>

</div>
