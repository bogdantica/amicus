<div class="box" style="border-top:0">

    <div class="box-header with-border">
        <h3>{{ $d->event->form->name }}</h3>
    </div>

    <div class="box-body">
        {!! Form::open(['class' => 'form-horizontal']) !!}

        <div class="form-group">
            <label class="col-sm-2 control-label">Details</label>
            <div class="col-sm-10">
                {!! Form::textarea('details',$d->event->form->details,['class' => 'form-control resize-none','rows' => 5]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Registration State</label>
            <div class="col-sm-10">
                <label>
                    {!! Form::checkbox('active',true,$d->event->active) !!}
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <label>
                    <button class="btn btn-success" type="submit">Update</button>
                </label>
            </div>
        </div>
        {!! Form::close() !!}

    </div>

    <div class="box-body">
        @foreach($d->event->form->options as $index => $option)
            @include('events.show.tabs.options.' . $option->option_type_id,$option)
        @endforeach

        @include('events.show.tabs.options.new')
    </div>


    {{--<p>Organized by {{ $d->event->subsidiary->name }}</p>--}}


    {{--<hr/>--}}

    <div class="box-body">
        {{--todo,--}}
    </div>

</div>
