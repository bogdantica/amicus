{{--<label class="control-label">--}}
    {{--{{ $option->label }}--}}
    {{--<div class="text-right">--}}

    {{--</div>--}}
{{--</label>--}}
<div class="">
    {!! Form::textarea('textOptions['.$option->id.']',null,['class' => 'form-control resize-none','rows' => 3, 'placeholder' => $option->details]) !!}
</div>