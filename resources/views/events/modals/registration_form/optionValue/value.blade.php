<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['url' => route('events.form.option.value.update',$value->id),'method' => 'PUT','class'=>'']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <label class="">Value</label>
                    <div class="">
                        {!! Form::text('value',$value->value,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="">Details</label>
                    {!! Form::textarea('details',$value->details,['class' => 'form-control editor']) !!}
                </div>

                <div class="row">
                    @if($value->option->cost)
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label class="">Cost Value</label>
                                {!! Form::text('cost_value',$value->cost_value,['class' => 'form-control']) !!}
                            </div>
                        </div>
                    @endif
                    @if($value->option->slots)
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label class="">Slots</label>
                                {!! Form::text('slots',$value->slots,['class' => 'form-control']) !!}
                            </div>

                        </div>
                    @endif
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label class="">Order</label>
                            {!! Form::selectRange('order',-10,10,$value->option->order,['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class=""></label>
                    @if($value->active)
                        <button class="btn btn-danger" name="active" value="0">Disable
                        </button>
                    @else
                        <button class="btn btn-success" name="active" value="1">Enable
                        </button>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
                <button type="submit" class="btn btn-success">Salveaza</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>