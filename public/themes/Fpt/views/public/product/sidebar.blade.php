<!-- Shop Side Bar -->
<div class="col-md-3">
    <div class="shop-side-bar">
        <!-- Categories -->
        <h6>Categories</h6>
        <div class="checkbox checkbox-primary">
            <ul>
                @foreach ($categories as $category)
                <li>
                    <input id="cate{{$category->slug}}" class="styled" type="checkbox" name="category">
                    <label for="cate{{$category->slug}}"> {{ $category->name }} </label>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- Categories -->
        <h6>Price</h6>
        <!-- PRICE -->
        <div class="cost-price-content">
            <div id="price-range" class="price-range"></div>
            <span id="price-min" class="price-min">20</span> <span id="price-max"
                class="price-max">80</span> <a href="#." class="btn-round">Filter</a>
        </div>
        <!-- Featured Brands -->
        <h6>Featured Brands</h6>
        <div class="checkbox checkbox-primary">
            <ul>
                @foreach ($brands as $brand)
                <li>
                    <input id="brand{{ $brand->slug }}" class="styled" type="checkbox">
                    <label for="brand{{ $brand->slug }}"> {{ $brand->name }} <span>({{ $brand->products->count() }})</span> </label>
                </li>
                @endforeach
            </ul>
        </div>
        {{-- <!-- Rating -->
        <h6>Rating</h6>
        <div class="rating">
            <ul>
                <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star-o"></i> <span>(218)</span></a></li>
                <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star"></i><i class="fa fa-star-o"></i><i
                            class="fa fa-star-o"></i> <span>(178)</span></a></li>
                <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                            class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
                            class="fa fa-star-o"></i> <span>(79)</span></a></li>
                <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i
                            class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i
                            class="fa fa-star-o"></i> <span>(188)</span></a></li>
            </ul>
        </div>
        <!-- Colors -->
        <h6>Size</h6>
        <div class="sizes"> <a href="#.">S</a> <a href="#.">M</a> <a href="#.">L</a> <a href="#.">XL</a>
        </div>
        <!-- Colors -->
        <h6>Colors</h6>
        <div class="checkbox checkbox-primary">
            <ul>
                <li>
                    <input id="colr1" class="styled" type="checkbox">
                    <label for="colr1"> Red <span>(217)</span> </label>
                </li>
                <li>
                    <input id="colr2" class="styled" type="checkbox">
                    <label for="colr2"> Yellow <span> (179) </span> </label>
                </li>
                <li>
                    <input id="colr3" class="styled" type="checkbox">
                    <label for="colr3"> Black <span>(79)</span> </label>
                </li>
                <li>
                    <input id="colr4" class="styled" type="checkbox">
                    <label for="colr4">Blue <span>(283) </span></label>
                </li>
                <li>
                    <input id="colr5" class="styled" type="checkbox">
                    <label for="colr5"> Grey <span> (116)</span> </label>
                </li>
                <li>
                    <input id="colr6" class="styled" type="checkbox">
                    <label for="colr6"> Pink<span> (29) </span></label>
                </li>
                <li>
                    <input id="colr7" class="styled" type="checkbox">
                    <label for="colr7"> White <span> (38)</span> </label>
                </li>
                <li>
                    <input id="colr8" class="styled" type="checkbox">
                    <label for="colr8">Green <span>(205)</span></label>
                </li>
            </ul>
        </div> --}}
    </div>
</div>
