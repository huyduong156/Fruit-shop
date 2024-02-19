<h3>Hi: {{$order->customer->name}}</h3>


<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat provident iusto itaque numquam doloremque optio sed tempore eum illum, vitae soluta laudantium totam vel voluptatum repudiandae dicta ut architecto quasi!</p>

<h4>Your order detail</h4>
<table border="1" cellpadding="5" cellspacing="0" > 
    <tr>
        <th>STT</th>
        <th>Product name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Sub total</th>
    </tr>
    <?php $total = 0;?>
     @foreach ($order->details as $item)
        <tr>
            <th>{{$loop->index + 1}}</th>
            <th>{{$item->product->name}}</th>
            <th>{{$item->price}}</th>
            <th>{{$item->quantity}}</th>
            <th>{{number_format( $item->quantity * $item->price)}}</th>
            <?php $total +=  $item->quantity * $item->price;?>
        </tr>
    @endforeach
        <tr>
            <th colspan="4">Total Price</th>
            <th>{{number_format($total)}}</th>
        </tr>

</table>






<a href="{{route('cus.order.verify',$token)}}">Click here to verify your order</a>










