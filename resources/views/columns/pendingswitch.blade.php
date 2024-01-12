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
           <input type="checkbox" <?php echo $data_item['pendingswitch'] == 'approveds' ? 'checked="checked"' : '';?> onchange="sendRequest{{$data_item['id']}}(this)">
           <span class="slider round"></span>
        </label>
      </td>
    <script>
        function sendRequest{{$data_item['id']}}(item) {
            $.ajax({
                url = 'admin/orderProduct/pendingswitch',
                data: {'_token': "{{csrf_token()}}", 'pendingswitch' : item.checked, 'id' : '{{$data_item['id']}}'},
                type: 'post',
                success: function(data) {
                    Livewire.emit('refreshComponent');
                }
            });
        }
    </script>
    