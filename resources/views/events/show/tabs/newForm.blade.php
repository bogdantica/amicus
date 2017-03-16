<div class="box" style="border-top:0">
    <div class="box-header with-border text-right">
        <h4><i>{{ $d->event->name }}</i> Attend Form</h4>
    </div>
    {{--<hr/>--}}
    <div class="box-body">
        {!! Form::open([
        'url' => route('events.form.create',$d->event->id),
        'method' => 'POST',
        'class' => 'form-horizontal'
        ]) !!}

        <div class="form-group">
            <label class="col-sm-2 control-label">Form Name</label>
            <div class="col-sm-10">
                {!! Form::text('name',null,['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Details</label>
            <div class="col-sm-10">
                {!! Form::textarea('details',null,['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Active</label>
            <div class="col-sm-10">
                {!! Form::checkbox('active',false,['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>


        {!! Form::close() !!}
    </div>
</div>