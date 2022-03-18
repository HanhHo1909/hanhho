<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Components\Recusive;
use App\Http\Requests\CategoryAddRequest;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {

        $this->category = $category;
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.add', compact('htmlOption'));
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    public function store(CategoryAddRequest $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' =>$request->parent_id,
            'slug' => str_slug($request->name)
        ]);

        return redirect()->route('categories.index');
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->category->where('id',$id)->get();
        foreach($category as $cate){
            $htmlOption = $this->getCategory($cate->parent_id);
        }

        return view('admin.category.edit',compact('category','htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->category->where('id',$id)->update([
            'name' => $request->name,
            'parent_id' =>$request->parent_id,
            'slug' => str_slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        try{
            $this->category->where('id',$id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        }catch (\Exception $exception){
            Log::error('Message: ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }


}
