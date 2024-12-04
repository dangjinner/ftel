<div class="row">
    <div class="col-md-10">
        @php
            $account = $affiliateCustomer->account;
        @endphp
        @if($account)
            <div class="form-group"><label for="name" class="col-md-2 text-left">Affiliate Account:</label>
                <div class="col-md-10">
                    <a href="{{ route('admin.affiliate_accounts.edit', ['id' => $account->id]) }}"
                       class="text-primary">{{ $account->full_name }}</a>
                </div>
            </div>

            <div class="form-group"><label for="name" class="col-md-2 text-left">Product:</label>
                <div class="col-md-10">
                    <a href="{{ route('admin.affiliate_products.edit', ['id' => $affiliateCustomer->product->id]) }}"
                       class="text-primary">{{ $affiliateCustomer->product->name }}</a>
                </div>
            </div>

            <div class="form-group"><label for="name" class="col-md-2 text-left">Link:</label>
                <div class="col-md-10">
                    <a href="{{ route('affiliate.ctv.link', ['code' => $affiliateCustomer->link->code]) }}"
                       target="_blank"
                       class="text-primary">{{ route('affiliate.ctv.link', ['code' => $affiliateCustomer->link->code]) }}</a>
                </div>
            </div>
        @endif
        {{ Form::text('name', trans('affiliate::customers.attributes.name'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('phone_number', trans('affiliate::customers.attributes.phone_number'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('address', trans('affiliate::customers.attributes.address'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('service_option', trans('affiliate::customers.attributes.service_option'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('note', trans('affiliate::customers.attributes.note'), $errors, $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::select('status', trans('affiliate::customers.attributes.status'), $errors, trans('affiliate::customers.form.status'), $affiliateCustomer, ['labelCol' => 2, 'required' => true]) }}
    </div>
</div>
