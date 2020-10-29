<div class="col-lg-6 col-md-6">
    <div class="products-image">
        <img src="{{$product->productImage()}}" alt="image">
    </div>
</div>

<div class="col-lg-6 col-md-6">
    <div class="products-content">
        <h3><a href="#">{{@$product['name']}}</a></h3>

        <div class="price">
            <span class="old-price">${{$product['price']+10}}</span>
            <span class="new-price">${{$product['price']}}</span>
        </div>


        <ul class="products-info">
            <li><span>Vendor:</span> {{$product->uploadBy()}} </li>
            <li><span>rent available:</span> {{$product->getType()}}</li>
            <li><span>description:</span> {{$product['description']}}</li>
        </ul>



        <div class="products-add-to-cart">
            <form action="{{url('/checkout')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                @if($product->type == '1')
                <div class="row">
                    <div class="col-lg-12">
                        <input type="date" name="start-date" required id="">
                        <input type="date" name="end-date" required id="">
                    </div>
                </div>
                <br>
                @endif
                <button type="submit" class="default-btn"><i class="flaticon-trolley"></i> proceed to checkout</button>
            </form>
        </div>
    </div>
</div>