<!-- Product -->
<div class="product">
    <article>
        <img class="img-responsive"
            src="{{ $product->base_image->path }}" alt="">
        @if ($product->hasSpecialPrice())
        <span class="sale-tag">-{{ $product->price_percent_convert }}%</span>
        @endif
        <!-- Content -->
        <span class="tag">{{ join(', ', $product->tags->pluck('name')->toArray()) }}</span>
        <a href="{{ route('product.shop.single', ['slug' => $product->slug]) }}" class="tittle">
            {{ $product->name }}
        </a>
        <!-- Reviews -->
        @php
        $avg_rating = round($product->reviews->avg->rating) ?? 0;
        @endphp
        <p class="rev">
            @for ($i = 0; $i < $avg_rating; $i++)
            <i class="fa fa-star"></i>
            @endfor
            @for ($i = 0; $i < 5 - $avg_rating; $i++)
                <i class="fa fa-star-o"></i>
            @endfor
            <span class="margin-left-10">{{ $product->reviews->count() }}
                Review(s)</span>
        </p>
        @if ($product->hasSpecialPrice())
        <div class="price">
            {{ $product->selling_price->format() }}<span>{{ $product->price->format() }}</span>
        </div>
        @else
        <div class="price">{{ $product->selling_price->format() }}</div>
        @endif
        <a href="#" data-productid="{{ $product->id }}" class="cart-btn"><i
                class="icon-basket-loaded"></i></a>
    </article>
</div>
