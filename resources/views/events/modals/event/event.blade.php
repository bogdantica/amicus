<div class="form-group">
    <label for="">Tip</label>
    {!! Form::select('event_type_id',\App\Models\LuEventType::all()->pluck('display','event_type_id'),$event->event_type_id,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="">
        {!! Form::checkbox('active',true,$event->active) !!}
        Activ
    </label>
</div>

<div class="row form-group">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="">Denumire Eveniment</label>
            {!! Form::text('name',$event->name,['class' => 'form-control']) !!}
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="">Data Inceput</label>
                    {!! Form::text('start_date',$event->start_date->format('Y-m-d'),['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="">Data Sfarsit</label>
                    {!! Form::text('start_date',$event->end_date->format('Y-m-d'),['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Adresa</label>
            <input type="text" name="address" class="form-control">
        </div>

    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <label for="">Tara</label>
            {!! Form::select('country',[],$event->country,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="">Regiune</label>
            {!! Form::select('county',[],$event->county,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="">Oras</label>
            {!! Form::select('city',[],$event->city,['class' => 'form-control']) !!}
        </div>

    </div>
</div>


<div class="form-group">
    <label for="">Descriere</label>
    {!! Form::textarea('description',$event->description,['class' => 'form-control editor']) !!}
</div>


