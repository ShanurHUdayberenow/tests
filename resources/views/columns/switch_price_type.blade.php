<style>

    /* The switch - the box around the slider */
    .switch {
      position: relative;
      display: inline-block;
      width: 35px;
      height: 20px;
    }
    
    /* Hide default HTML checkbox */
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    
    /* The slider */
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #B22222;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 12px;
      width: 12px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .3s;
      transition: .3s;
    }
    input:checked + .slider {
      background-color: #2E8B57;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(15px);
      -ms-transform: translateX(1px);
      transform: translateX(15px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
    
    </style>
    
    @php
    
        $value = $data_item[$column['name']];
        
    @endphp
    
    <td>
      <label class="switch">
         <input class="switch" type="checkbox" <?php echo $data_item['price_type'] == 'tmt' ? 'checked="checked"' : '';?> onchange="sendRequest(this, {{$data_item['id']}})" data_id="{{$data_item['id']}}">
         <span class="slider round" data_id="{{$data_item['id']}}"></span>
      </label>
    </td>
    
    <script>
      var url = '{{url($column['request_url'])}}';
      function sendRequest(item, data_id) {
          $.ajax({
              url: url,
              data: {'_token': "{{csrf_token()}}", 'price_type' : item.checked, 'id' : data_id },
              type: 'post',
              success: function(data) {
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
    @section('script')
    <script src="\storage/noty/noty.js"></script>
    
    @endsection