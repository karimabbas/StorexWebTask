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
    <x-form.input label="Movie Name" class="form-control-lg" role="input" name="title" :value="$Movie->title" />
</div>

<div class="form-group">
    <label for="">Description</label>
    <x-form.textarea label="Description" name="description" :value="$Movie->description" />
</div>

<div class="form-group">
    <x-form.select name="category_id" label="Movie Category" selected="{{$Movie->id}}" class="form-control form-select" :options="$categories">
    </x-form.select>
</div>

<div class="form-group">
    <x-form.input label="Movie Rate" class="form-control-lg" role="input" name="rate" :value="$Movie->rate" />
</div>


<div class="form-group">
    <x-form.label id="image">Image</x-form.label>
    <x-form.input type="file" name="image" accept="image/*" />
    @if ($Movie->image)
        <img src="{{ asset($Movie->image) }}" alt="" height="60">
    @endif
</div>

<div class="form-group">
    <button type="submit" class="{{ $color ?? 'btn btn-primary' }}">{{ $button_label ?? 'Save' }}</button>
</div>
