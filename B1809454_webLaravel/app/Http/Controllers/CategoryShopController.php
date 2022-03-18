<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Product;

class CategoryShopController extends Controller
{
    private $slider;
    private $category;
    private $product;

     public function __construct(Slider $slider, Category $category, Product $product)
    {
       $this->slider = $slider;
       $this->category = $category;
       $this->product = $product;
    }

    public function index($slug, $categoryId)
    {
        $categoryLimit = $this->category->where('parent_id',0)->take(3)->get();
        $categorys = $this->category->where('parent_id',0)->get();
        $danhmuc = $this->category->where('id',$categoryId)->get();
        $products = $this->product->where('category_id', $categoryId)->paginate(6);
        return view('home.product.category.list', compact('categoryLimit', 'products','categorys','danhmuc'));
    }
} 
 