
<div class="form-group">
    <x-form.input label="Name" class="form-control-lg" name="name" :value="$user->name" />
</div>
<div class="form-group">
    <x-form.input label="Email" type="email" name="email" :value="$user->email" />
</div>

<div class="form-group">
    <x-form.input label="Password" type="password" name="password" :value="$user->password" />
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_label ?? 'Save' }}</button>
</div>
