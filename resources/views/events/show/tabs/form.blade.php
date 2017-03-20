<div class="box" style="border-top:0">

    <div class="box-header with-border">
        <h3 class="text-center">{{ $d->event->form->name }}</h3>
    </div>

    <div class="box-body">
        {!! Form::open(['url' => route('events.form.update',$d->event->form->id), 'method' =>'PUT', 'class' => 'form-horizontal']) !!}

        <div class="form-group">
            <label class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                {!! Form::text('name',$d->event->form->name,['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Details</label>
            <div class="col-sm-10">
                {!! Form::textarea('details',$d->event->form->details,['class' => 'form-control resize-none editor','rows' => 5]) !!}
            </div>
        </div>

        {{--<div class="form-group">--}}
        {{--<label class="col-sm-2 control-label">Registration State</label>--}}
        {{--<div class="col-sm-10">--}}
        {{--<label>--}}
        {{--{!! Form::checkbox('active',true,$d->event->active) !!}--}}
        {{--</label>--}}
        {{--</div>--}}
        {{--</div>--}}

        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-4">
                <label>
                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                </label>
            </div>
            <div class="col-sm-6 text-right">
                @if($d->event->form->active)
                    <label>
                        <button class="btn btn-danger" type="submit" name="active" value="0">Disable</button>
                    </label>
                @else
                    <label>
                        <button class="btn btn-success" type="submit" name="active" value="1">Enable</button>
                    </label>
                @endif
            </div>
        </div>
        {!! Form::close() !!}

    </div>

    <div class="box-body">
        <div class="row">

            @foreach($d->event->form->options as $index => $option)

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    @include('events.show.tabs.options.' . $option->option_type_id,$option)
                </div>

            @endforeach
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @include('events.show.tabs.options.new')
            </div>
        </div>

    </div>


    {{--<p>Organized by {{ $d->event->subsidiary->name }}</p>--}}


    {{--<hr/>--}}

    <div class="box-body">
        {{--todo,--}}
    </div>

</div>
