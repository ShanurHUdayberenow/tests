<div id="shop-1" class="tab-pane active">
                                <div class="row">
                                
                                
                                
                                  @foreach($products as $key => $product)
                               
                                   
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <div class="product-wrap mb-35 productData">
                                            <div class="product-img mb-15">
                                                <a href="{{route('product-detail.show', $product->id)}}">
                                                 
                                                
                                                    <img src="{{$product['images']['0']['image']}}" data-original="" alt="product" style="height: 200px;">
                                                    
                                                </a>
                                                @if($product->discount != null)<span class="price-dec font-dec">{{$product->discount}}</span>@endif
                                                @if($product->isNew != null)<span class="price-dec font-dec">{{$product->isNew}}</span>@endif
                                                <input type="hidden" value="{{$product->id}}" class="productId">
                                                
                                                <div class="product-action">
                                                    <a title="Sebede goş" class="addToCart" data-id="{{$product->id}}" href="#"><i class="la la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="{{route('product-detail.show', $product->id)}}">{{$product['name_'.$locale]}}</a></h4>
                                                <div class="price-addtocart">
                                                    <div class="product-price">
                                                        <span>{{$product->price}} man.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   
                                
                                   @endforeach
                                
                                </div>
                                
                            </div>
