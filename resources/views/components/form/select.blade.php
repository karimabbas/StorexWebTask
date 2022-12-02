@props(['name', 'selected' => '', 'label' => false, 'options'])

@if ($label)
    <label for="">{{ $label }}</label>
@endif

<select name="{{ $name }}"
    {{ $attributes->class(['form-control', 'form-select', 'is-invalid' => $errors->has($name)]) }}>
    <option value="0">all movies </option>

    @foreach ($options as $value => $text)
        <option value="{{ $text->id }}" @selected($value == $text->id)>{{ $text->title }}</option>
    @endforeach
</select>

<x-form.validation-feedback :name="$name" />
