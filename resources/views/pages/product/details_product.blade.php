@extends('layout')
@section('content')
<h1>Trang chi tiết sản phẩm</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">product_id</th>
			<th scope="col">name</th>
			<th scope="col">slug</th> <!-- phần sau cùng của url -->
			<th scope="col">category_id</th>
			<th scope="col">brand_id</th>
			<th scope="col">description</th>
			<th scope="col">content</th>
			<th scope="col">price</th>
			<th scope="col">image</th>
			<th scope="col">status</th>
			<th scope="col">action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($product_details as $key => $product)
		<tr>
			<th scope="row">{{$product->product_id}}</th>
			<td>
				{{$product->product_name}}
			</td>
			<td>
				{{$product->product_slug}}
			</td>
			<td>
				{{$product->category_id}}
			</td>
			<td>
				{{$product->brand_id}}
			</td>
			<td>
				{{$product->product_desc}}
			</td>
			<td>
				{{$product->product_content}}
			</td>
			<td>
				{{number_format($product->product_price).''.'VNĐ'}}
			</td>
			<td>
				{{$product->product_image}}
				<img src="{{asset('public/uploads/product/'.$product->product_image)}}" height="100" width="100" alt="">
			</td>
			<td>
				{{$product->product_status}}
			</td>
			<td>
				<a href="{{URL::to('/delete-product/'.$product->product_id)}}">xóa</a>
				<br/>
				<a href="{{URL::to('/edit-product/'.$product->product_id)}}">sửa</a>
				<br/>
				<a href="#">Chi tiết</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection