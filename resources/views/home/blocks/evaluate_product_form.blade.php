
<form action="" method="POST">
    <div class="box-from-evaluate p-5">
        <div class="checkbox-form">
            <h3>Rate For Product {{}}</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="checkout-form-list">
                        <label>Rate <span class="required">*</span></label>
                        <input name="rate" type="text" id="rate-value-{{}}">
                        <div class="rateit" id="rate-{{}}" data-rateit-ispreset="true"></div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="checkout-form-list">
                        <label>Leave a comment about this product <span class="required">*</span></label>
                        <textarea id="content" cols="30" rows="5" name="comment"
                        class="border rounded-0 w-100 custom-textarea input-area"
                        placeholder="Comment"></textarea>
                    </div>
                </div>

                    <script>
                        // $('#rate-{{$item->product_id}}').bind('rated', function (event, value) { $('#rate-value-{{$item->product_id}}').val(value); });
                        // document.getElementById('rate-{{$item->product_id}}').addEventListener('rated', function(event) {
                        //     var value = event.detail.value;
                        //     document.getElementById('rate-value-{{$item->product_id}}').value = value;
                        // });
                    </script>
                <button class="btn obrien-button primary-btn" onclick="alert($('#rate-{{$item->product_id}}').rateit('value'))">Get value</button>
                {{-- <a class="btn obrien-button primary-btn" href="{{route('cart.add',$product->id)}}">Add to cart</a> --}}
            </div>
        </div>

    </div>
</form>