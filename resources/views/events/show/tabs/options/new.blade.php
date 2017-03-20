<div class="box box-warning">
    <div class="box-header text-center ">
        New Option
    </div>
    <div class="row">
        {!! Form::open(['url' => route('events.form.option.create',['form' => $d->event->form->id]),  'class' => 'form-horizontal']) !!}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Label</label>
                    <div class="col-sm-10">
                        {!! Form::text('label',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        {!! Form::textarea('details',null,['class' => 'form-control resize-none editor','rows' => 3]) !!}
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-left">
                        <label>
                            <input type="hidden" name="required" value="0">
                            {!! Form::checkbox('required',true,null,['class' => '']) !!}
                        </label>
                        <label class=" control-label">Required</label>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                        <label>
                            <input type="hidden" name="cost" value="0"/>
                            {!! Form::checkbox('cost',true,null,['class' => '']) !!}
                        </label>
                        <label class=" control-label">Cost</label>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-right">
                        <label>
                            <input type="hidden" name="slots" value="0"/>
                            {!! Form::checkbox('slots',true,null,['class' => '']) !!}
                        </label>
                        <label class=" control-label">Slots</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Order</label>
                    <div class="col-sm-10">
                        {!! Form::selectRange('order',-10,10,0,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-10">
                        {!! Form::select('option_type_id',\App\Models\LuOptionType::all()->pluck('display','option_type_id'),null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <button class="btn btn-success" name="active" value="1">Save</button>
                    </div>

                </div>
            </div>

        </div>

    </div>

    {!! Form::close() !!}

</div>

