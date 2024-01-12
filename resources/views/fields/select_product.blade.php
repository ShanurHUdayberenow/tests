<div class="form-group">
    <link rel="stylesheet" href="\storage/css/multiple-select.css">
<style>
    select.form-control:not([size]):not([multiple]) {
        height: calc(2.25rem + 5px);
    }
</style>
    @livewire('select-product', ['data' => isset($value) ? $field['model']::find($value) : null])
</div>
<script src="\storage/js/multiple-select.js"></script>
<script>
    window.addEventListener('contentChanged', event => {
        new MultipleSelect('#variation-select', {

        })
    });
    new MultipleSelect('#variation-select', {

    })
</script>
@livewireScripts

