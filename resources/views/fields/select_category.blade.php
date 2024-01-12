<div class="form-group">

    <style>
        select.form-control:not([size]):not([multiple]) {
            height: calc(2.25rem + 5px);
        }
    </style>
    @livewire('select-category', ['data' => isset($value) ? $field['model']::find($value) : null])
</div>

@livewireScripts

