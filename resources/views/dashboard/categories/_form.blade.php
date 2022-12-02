@if ($errors->any())
    <div class="alert alert-danger">
        <h3>Error Occured</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <x-form.input label="Category Name" class="form-control-lg" role="input" name="title" :value="$category->title" />
</div>

<div class="form-group">
    <button type="submit" class="{{ $color ?? 'btn btn-primary' }}">{{ $button_label ?? 'Save' }}</button>
</div>
