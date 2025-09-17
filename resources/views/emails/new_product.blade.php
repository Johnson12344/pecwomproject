<h3>New product added</h3>
<p><strong>{{ $product['title'] }}</strong></p>
<p>Price: £{{ $product['price'] }}</p>
<p>Category: {{ $product['category'] }}</p>
<p>{{ $product['description'] }}</p>
<p><a href="{{ url('product_details', $product['id']) }}">View product</a></p>

