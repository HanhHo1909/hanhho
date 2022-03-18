<?php

namespace App\Http\Controllers;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteModelTrait;
use App\Components\Recusive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Storage;
use DB;
use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductTag;
use App\Tag;
use App\Http\Requests\ProductAddRequest;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    use DeleteModelTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function index()
    {
        $all_products = $this->product->latest()->paginate(5);
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index', compact('products','all_products'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add',compact('htmlOption'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function upload(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('public/photos', $fileName);
        return response()->json(['location' => "/storage/$path"]);
    }

    public function store(ProductAddRequest $request)
    {
        try{
            DB::beginTransaction();
            $dataProductCreate = [
            'name' => $request->name,
            'price' => $request->price,
            'content' =>$request->contents,
            'user_id' => auth()->id(),
            'quantity_product'=> $request->quantity_product,
            'category_id' => $request->category_id
            ];
            $dataUpload = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUpload)){
                $dataProductCreate['feature_image_name'] = $dataUpload['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUpload['file_path'];

            }
            $product = $this->product->create($dataProductCreate);

            //insert to product_images
            if ($request->hasFile('image_path'))
            {
                foreach ($request->image_path as $fileItem){
                        $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                        $product->images()->create([
                            'image_path' => $dataProductImageDetail['file_path'],
                            'image_name' => $dataProductImageDetail['file_name']

                        ]);

                }

            }

            //insert to tags and product_tag
            if(!empty($request->tags))
            {
                foreach($request->tags as $tagItem){
                            
                    $tagInstance =  $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id; 
                }
                $product->tags()->attach($tagIds);
            }
            
            DB::commit();
            return redirect()->route('product.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
        
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption','product'));
    }

    public function update(Request $request, $id)
    {
       try{
            DB::beginTransaction();
            $dataProductUpdate = [
            'name' => $request->name,
            'price' => $request->price,
            'content' =>$request->contents,
            'user_id' => auth()->id(),
            'quantity_product' => $request->quantity_product,
            'category_id' => $request->category_id
            ];
            $dataUpload = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUpload)){
                $dataProductUpdate['feature_image_name'] = $dataUpload['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUpload['file_path'];

            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);


            //insert to product_images
            if ($request->hasFile('image_path'))
            {
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem){
                        $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                        $product->images()->create([
                            'image_path' => $dataProductImageDetail['file_path'],
                            'image_name' => $dataProductImageDetail['file_name']

                        ]);

                }

            }

            //insert to tags and product_tag
            if(!empty($request->tags))
            {
                foreach($request->tags as $tagItem){
                            
                    $tagInstance =  $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id; 
                }
                $product->tags()->sync($tagIds);
            }
            
            DB::commit();
            return redirect()->route('product.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->product);
    }
}
