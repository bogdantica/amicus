<div class="form-group">
    <label class="">Label</label>
    <div class="">
        {!! Form::text('label',null,['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label class="">Description</label>
    <div class="">
        {!! Form::textarea('details',null,['class' => 'form-control resize-none editor','rows' => 3]) !!}
    </div>
</div>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-left">
        <label>
            <input type="hidden" name="required" value="0">
            {!! Form::checkbox('required',true,null,['class' => '']) !!}
        </label>
        <label class=" control-label">Required</label>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
        <label>
            <input type="hidden" name="cost" value="0"/>
            {!! Form::checkbox('cost',true,null,['class' => '']) !!}
        </label>
        <label class=" control-label">Cost</label>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right">
        <label>
            <input type="hidden" name="slots" value="0"/>
            {!! Form::checkbox('slots',true,null,['class' => '']) !!}
        </label>
        <label class=" control-label">Slots</label>
    </div>
</div>

<div class="form-group">
    <label class="">Order</label>
    <div class="">
        {!! Form::selectRange('order',-10,10,0,['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label class="">Type</label>
    <div class="">
        {!! Form::select('option_type_id',\App\Models\LuOptionType::all()->pluck('display','option_type_id'),null,['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success" name="active" value="1">Creaza Optiune</button>
</div>


