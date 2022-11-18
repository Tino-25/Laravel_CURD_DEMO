<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
{
    public function index(){
        $all_product = DB::table('tbl_product')->get(); 
        return view('pages.product.all_product')->with('all_product', $all_product);
    }

    public function add_product(){
        return view('pages.product.add_product');
    }

    public function save_product(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = $request->product_slug;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['product_image'] = $request->product_image;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).$get_image->getClientOriginalExtension();

            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('/add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function edit_product($product_id){
        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        return view('pages.product.edit_product')->with('a', $product_id)->with('edit_product', $edit_product);
    }

    public function update_product(Request $request, $product_id){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $image_fullname_current = $get_image->getClientOriginalName();
            $image_name_current = current(explode('.', $image_fullname_current));
            $image_fullname_new = $image_name_current.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $image_fullname_new);
            $data['product_image'] = $image_fullname_new;

            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công!!');
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công, nhưng không cập nhật hình ảnh!!!');
        return Redirect::to('all-product');
    }

    public function delete_product($product_id){
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function details_product($product_id){
        $product_details = DB::table('tbl_product')->where('product_id', $product_id)->get();
        return view('pages.product.details_product')->with('product_details', $product_details);
    }

}
