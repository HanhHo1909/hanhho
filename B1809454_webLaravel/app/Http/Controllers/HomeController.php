<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use  Illuminate\Database\Eloquent;
use DB;
use Session;
use App\Slider;
use App\Category;
use App\Product;
use App\Tag;
use App\ProductImage;
use App\ProductTag;
session_start();

class HomeController extends Controller
{
    private $slider;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;

    public function __construct(Slider $slider, Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
       $this->slider = $slider;
       $this->category = $category;
       $this->product = $product;
       $this->productImage = $productImage;
       $this->tag = $tag;
       $this->productTag = $productTag;
    }

    public function index()
    {
        $sliders = $this->slider->latest()->get();
        $categorys = $this->category->where('parent_id',0)->get();
        $products = $this->product->latest()->take(6)->get();
        $productRecomment = $this->product->latest('views_count', 'desc')->take(12)->get();
        $categoryLimit = $this->category->where('parent_id',0)->take(3)->get();
        return view('home.home', compact('sliders', 'categorys', 'products', 'productRecomment','categoryLimit'));
    }

    public function showProductDetail($id)
    {
        $categorys = $this->category->where('parent_id',0)->get();
        $product_detail = $this->product->where('id',$id)->get();
        $product_image = $this->productImage->where('product_id', $id)->get();
        foreach ($product_detail as $key => $value){
            $category_id = $value->category_id;
        }
        $productRecomment = $this->product->where('category_id',$category_id)->whereNotIn('id', [$id])->get();
        $tagProduct = $this->product->join('product_tags','products.id','=','product_tags.product_id')
        ->join('tags','product_tags.tag_id','=','tags.id')
        ->where('products.id',$id)
        ->select('tags.name','tags.id')->get();
       // dd($tagProduct);
        return view('home.product.show_product_detail', compact('categorys','product_detail','product_image', 'productRecomment','tagProduct'));
    }

    public function searchProduct(Request $request)
    {
        
        $categorys = $this->category->where('parent_id',0)->get();

        $keywords = $request->keywords_submit;
        $searchProduct = $this->product->join('product_tags','products.id','=','product_tags.product_id')
        ->join('tags','product_tags.tag_id','=','tags.id')
        ->where('products.name','LIKE','%'.$keywords.'%')
        ->orWhere('tags.name','LIKE','%'.$keywords.'%')
        ->select('products.id','products.name','products.feature_image_path','products.price')->take(9)->get();

        
        return view('home.product.search', compact('categorys', 'searchProduct', 'keywords'));

    }

    public function showTag($id)
    {
        $categorys = $this->category->where('parent_id',0)->get();
       $tagProduct = $this->product->join('product_tags','products.id','=','product_tags.product_id')
        ->join('tags','product_tags.tag_id','=','tags.id')
        ->where('tags.id',$id)
        ->select('products.id','products.name','products.feature_image_path','products.price')->paginate(6);
 
       return view('home.product.show_tag_product', compact('categorys', 'tagProduct'));

    }

    
}
