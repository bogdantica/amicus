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
            </div>

            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        {!! Form::textarea('description',null,['class' => 'form-control resize-none','rows' => 3]) !!}
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-left">
                        <label>
                            {!! Form::checkbox('required',true,null,['class' => '']) !!}
                        </label>
                        <label class=" control-label">Required</label>

                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                        <label>
                            {!! Form::checkbox('cost',true,null,['class' => '']) !!}
                        </label>
                        <label class="control-label">Cost</label>

                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-right">
                        <label class="control-label">Slots</label>
                        <label>
                            {!! Form::checkbox('slots',true,null,['class' => '']) !!}
                        </label>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-10">
                                {!! Form::select('option_type_id',\App\Models\LuOptionType::all()->pluck('display','option_type_id'),$option->option_type_id,['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <button class="btn btn-success">Create Option</button>
                    </div>
                </div>
            </div>

        </div>

        {!! Form::close() !!}

    </div>


</div>
