<div class="box box-primary">
    <div class="box-header text-center ">
        Option {{ $index + 1 }}
    </div>
    <div class="row">
        {!! Form::open(['class' => 'form-horizontal']) !!}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Label</label>
                    <div class="col-sm-10">
                        {!! Form::text('label',$d->event->form->details,['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        {!! Form::textarea('description',$d->event->form->details,['class' => 'form-control resize-none','rows' => 3]) !!}
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label class="control-label pull-right">Parameters</label>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label class=" control-label">Required</label>
                        <label>
                            {!! Form::checkbox('required',$d->event->form->details,['class' => 'form-control']) !!}
                        </label>

                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label class="control-label">Cost</label>
                        <label>
                            {!! Form::checkbox('cost',$d->event->form->details,['class' => 'form-control']) !!}
                        </label>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label class="control-label">Slots</label>
                        <label>
                            {!! Form::checkbox('slots',$d->event->form->details,['class' => 'form-control']) !!}
                        </label>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <label class="control-label">Option Type</label>
                        <label>
                            {!! Form::select('option_type_id',\App\Models\LuOptionType::all()->pluck('display','option_type_id'),['class' => 'form-control']) !!}
                        </label>
                    </div>
                </div>
            </div>

        </div>

        {!! Form::close() !!}

    </div>


</div>
