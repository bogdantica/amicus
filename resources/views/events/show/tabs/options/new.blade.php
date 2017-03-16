<div class="box box-primary">
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
                        <label class="control-label pull-right">Parameters</label>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label>
                            {!! Form::checkbox('required',true,null,['class' => '']) !!}
                        </label>
                        <label class=" control-label">&nbsp;Required</label>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label>
                            {!! Form::checkbox('cost',true,null,['class' => '']) !!}
                        </label>
                        <label class="control-label">&nbsp;Cost</label>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label>
                            {!! Form::checkbox('slots',true,null,['class' => '']) !!}
                        </label>
                        <label class="control-label">&nbsp;Slots</label>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <label class="control-label">Option Type</label>
                        <label>
                            {!! Form::select('option_type_id',\App\Models\LuOptionType::all()->pluck('display','option_type_id'),null,['class' => 'form-control']) !!}
                        </label>
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
