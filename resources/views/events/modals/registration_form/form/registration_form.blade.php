<div class="form-group">
    <label class="">Form Name</label>
    <div class="">
        {!! Form::text('name',$form->name,['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label class="">Details</label>
    <div class="">
        {!! Form::textarea('details',$form->details,['class' => 'form-control editor']) !!}
    </div>
</div>

<div class="form-group">
    <div class="">
        <label>
            {!! Form::checkbox('active',true,$form->active,['class' => '']) !!}
            Active
        </label>
    </div>
</div>