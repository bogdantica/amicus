<div class="form-group">
    <label class="">Label</label>
    <div class="">
        {!! Form::text('label',$option->label,['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label class="">Description</label>
    <div class="">
        {!! Form::textarea('details',$option->details,['class' => 'form-control resize-none editor','rows' => 3]) !!}
    </div>
</div>

<div class="label-group">
    <label>
        <input type="hidden" name="required" value="0"/>
        {!! Form::checkbox('required',true,$option->required,['class' => '']) !!}
    </label>
    <label class=" control-label">Required</label>
</div>

<div class="form-group">
    <label class="">Order</label>
    <div class="">
        {!! Form::selectRange('order',-10,10,$option->order,['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label class="">Type</label>
    <div class="">
        {!! Form::select('option_type_id',\App\Models\LuOptionType::all()->pluck('display','option_type_id'),$option->option_type_id,['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    @if($option->active)
        <button class="btn btn-danger" name="active" value="0">Disable</button>
    @else
        <button class="btn btn-success" name="active" value="1">Enable</button>
    @endif
</div>


