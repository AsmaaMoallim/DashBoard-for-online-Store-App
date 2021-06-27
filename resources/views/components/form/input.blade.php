{{--<div class="form-group{{ $errors->has($name) ? 'has-error' : '' }}" >--}}

    <div class="form-group col-sm-10 ">
        <label>{{ $label }}</label>
        <input class="{{$class}}" name="{{$name}}" type="{{$type}}" placeholder="{{$placeholder}}">
    </div>

{{--</div>--}}



