

@php
$model = $field['model'];
$items = $model::all();
@endphp
<style>
  select {
      width: 70em;

      }
      .multiselect-dropdown{
        padding: 10px 10px 10px 10px;
        
      }
      td {
    border: 1px solid #dee2e6;
    
}
</style>


    <div class="form-group">
        <label>Harytlary saýlaň</label>
        <br>
        <select name="selectproduct[]" id="" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3" onchange="console.log(this.selectedOptions)">
            @foreach($items as $item)
            <option value="{{$item['id']}}"
            @if(isset($value))
                @if($value == $item->id)
                    selected
                @endif
            @endif
            >{{$item[$field['relation_column']]}}</option>
            @endforeach
        </select>
    </div>




      
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td>Haryt ady</td>
                                <td>Haryt suraty</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        
                        @foreach($pacet_products as $pacet_product) 
                        <tbody>

                       
                            <tr>
                                <td style="vertical-align: middle !important;">{{$pacet_product->product->name_tm}}</td>
                                <td style="vertical-align: middle !important;"><img src="{{$pacet_product->product['images']['0']['image']}}" width="20%"></td>
                                <td style="vertical-align: middle !important;"><i
                                    class="m-1 ti-trash"></i></td> 
                                                       </tr>

                        </tbody>
                        @endforeach
                        
                    </table>
                </div>
            </div>


            <script src="\storage/noty/noty.js"></script>
    @if ($message = session('message'))
        <script>
            new Noty({
                type: 'success',
                layout: 'topRight',
                text: '{{$message}}',
                timeout: 2000,
            }).show();
        </script>
    @endif
    @if(session('errors'))
        <script>
            new Noty({
                type: 'error',
                layout: 'topRight',
                text: '<?php foreach ($errors->all() as $item) { echo $item . '<br>';}?>',
                timeout: 2000,
            }).show();
        </script>
    @endif
<script>

    $(document).on('click','.delete',function(){
        let id = $(this).attr('data-id');
        $('#deleteId').val(id);
    });
    function destroy() {
        var id = document.getElementById('deleteId').value;
        var url = '{{\Illuminate\Support\Facades\Request::url()}}/' + id;
        $.ajax({
            url: url,
            data: {'_token': "{{csrf_token()}}"},
            type: 'DELETE',  // user.destroy
            success: function(data) {
                Livewire.emit('refreshComponent');
                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: data.message,
                    timeout: 2000,
                }).show();
            },
            error: function () {
                new Noty({
                    type: 'error',
                    layout: 'topRight',
                    text: 'Error',
                    timeout: 2000,
                }).show();
            }
        });
    }
</script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="{{asset('../multiple-select/multiselect-dropdown.js')}}" ></script>


