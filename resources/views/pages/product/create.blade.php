@extends('layouts.app')
@section('title') {{ $form == 'create' ? 'Create Product' : 'Edit Product' }} | RMS @endsection
@section('content')
<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <form action="{{ $form == 'create' ? route('product.store') : route('product.update',['product' => $product->ProductId] ) }}" method="post" id="createProduct" novalidate>
                                        @if($form='edit')
                                        <input type="hidden" name="_method" value="PUT">
                                        @endif
                                        @csrf
                                        <span class="section">{{ $form == 'create' ? 'Create Product' : 'Edit Product' }}</span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Product Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="1" data-validate-words="1" name="product_name" placeholder="Product Name" value="{{ $form == 'create' ? '' : $product->ProductName }}" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Product Category<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="1" data-validate-words="1" name="product_category" placeholder="Product Category" value="{{ $form == 'create' ? '' : $product->ProductCategory }}" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Selling Price <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" class='number' name="selling_price" data-validate-minmax="1,9999"  value="{{ $form == 'create' ? '' : $product->SellingPrice }}" required='required'></div>
                                        </div>
                                        <div class="ln_solid">
                                            <div class="form-group mt-2">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Submit</button>
                                                    <button type='reset' class="btn btn-success">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
@section('scripts')
<script src="{{ asset('/vendors/validator/multifield.js') }}"></script>
<script src="{{ asset('/vendors/validator/validator.js') }}"></script>
<script>
    var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
            validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            // return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
</script>
@endsection