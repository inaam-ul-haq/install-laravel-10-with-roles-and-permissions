<div class='input-group has-validation'>
    <input type='{{ $type }}' class='form-control {{$extraclasses}} @error($name) is-invalid @enderror' id='{{ $id }}'
        name='{{ $name }}' placeholder='{{ $place }}' {{$extraAttributes}} {{ $required == null ? '' : 'required' }}
        value='{{ $val == '' ? old($name) : $val }}'>

    <div class='valid-feedback'>
        Looks good!
    </div>
    <div class='invalid-feedback'>
        @if ($errors->has($name))
            {{ $errors->first($name) }}
        @else
            Please choose {{ $name }}.
        @endif
    </div>
</div>
