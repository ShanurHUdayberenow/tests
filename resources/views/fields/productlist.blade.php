<style>
      td {
        border: 1px solid #dee2e6;
        
    }
    .pro-details-quality{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }
    .cart-plus-minus{
        border: 1px solid #0065a8;
  display: inline-block;
  height: 41px;
  overflow: hidden;
  padding: 0;
  position: relative;
  width: 100px;
  border-radius: 100px;
    }
    .qtybutton{
        color: #333;
  cursor: pointer;
  float: inherit;
  font-size: 18px;
  line-height: 20px;
  margin: 0;
  position: absolute;
  text-align: center;
  -webkit-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;

    }
    .cart-plus-minus-box{
        background: transparent none repeat scroll 0 0;
  border: medium none;
  color: #333333;
  float: left;
  font-size: 18px;
  height: 39px;
  margin: 0;
  padding: 0;
  text-align: center;
  width: 100px;
    }
    .qtybutton.dec{
        height: 60px;
  left: 21px;
  padding-top: 9px;
  top: 0;
    }
    .qtybutton.inc{
        height: 60px;
  padding-top: 9px;
  right: 18px;
  top: 0;
    }
</style>
<div class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Product</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="{{route('pacet.store')}}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div id="table_data">
                                <div class="container">
                                    @if(session('errors'))
                                    <div class="alert alert-danger" style="padding: 1rem 2rem">
                                        <ul style="list-style-type: circle">
                                            @foreach($errors->all() as $error)
                                            <li style="font-size: 14px">{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    @endif

                                    <input type="text" id="search-products" class="form-control"
                                        placeholder="Start search">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product name</th>
                                            </tr>
                                        </thead>


                                        <tbody id="dynamic-row">
                                            @foreach($searchs as $search)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="selectproduct[]" id="{{$search->id}}"
                                                            value="{{$search->id}}">
                                                        <label class="custom-control-label"
                                                            for="{{$search->id}}"></label>
                                                    </div>
                                                </td>
                                                <td>{{$search->name_tm}}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="form-group">
    <label for="example-text-input" class="col-form-label">{{$field['label']}}</label>
    <div class="input-group">
        
        <input class="form-control" data-toggle="modal" data-target=".bd-example-modal-lg" type="text" name="{{$field['name']}}" id="{{$field['name']}}" value="">

    </div>
</div>




@if(Request::url() != 'http://akyllyenjam.com.tm/admin/pacet/create')
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
            @if($pacet_product->product != null)
            <tbody class="productData">

           
                <tr id="sid{{$pacet_product->id}}">
                    <td style="vertical-align: middle !important;">{{$pacet_product->product->name_tm}}</td>
                    <td style="vertical-align: middle !important;">@if($pacet_product->product['images'])<img src="{{$pacet_product->product['images']['0']['image']}}" width="20%">@endif</td>
                    
                    <td style="vertical-align: middle !important;">
                    <form action="{{route('pacet_product_destroy', $pacet_product->id )}}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="action delete"><i
                                                                    class="m-1 ti-trash"></i></button>
                                                        </form>
                    </td> 
                    
                    
                </tr>

            </tbody>
            @endif
            @endforeach
            
        </table>
    </div>
</div>
@endif


<br>
