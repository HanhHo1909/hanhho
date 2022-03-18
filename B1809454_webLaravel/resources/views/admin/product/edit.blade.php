@extends('layouts.admin')

@section('title')
  <title>Admin</title>
@endsection

@section('css')
  <link href="{{ asset('public/vendors/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('public/admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
  <div class="content-wrapper" style="background: #ebcfe2;">
    @include('partials.content-header',['name' => 'Cập nhật sản phẩm','key' =>''])

  <form action="{{ route('product.update', ['id' => $product->id ]) }}" method="post" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
              @csrf
              <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" 
                class="form-control"
                name="name" 
                placeholder="Nhập tên sản phẩm"
                value="{{ $product->name }}">
              </div>

              <div class="form-group">
                <label>Giá sản phẩm</label>
                <input type="text" 
                class="form-control"
                name="price" 
                placeholder="Nhập giá sản phẩm"
                value="{{ $product->price }}">
              </div>

              <div class="form-group">
                <label>Số lượng sản phẩm</label>
                <input type="text" 
                class="form-control"
                name="quantity_product" 
                placeholder="Nhập số lượng sản phẩm"
                value="{{ $product->quantity_product }}">
              </div>

              <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" 
                class="form-control-file"
                name="feature_image_path">
                <div class="col-md-12 container-image-detail">
                  <div class="row">
                    <img class="image_detail" src="{{ asset('public'.$product['feature_image_path']) }}">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Ảnh chi tiết</label>
                <input type="file" 
                multiple="multiple"
                class="form-control-file"
                name="image_path[]">
                <div class="col-md-12 container-image-detail">
                  <div class="row">
                    @foreach($product->productImages as $productImageItem)
                      <div class="col-md-3">
                        <img class="image_detail" src="{{ asset('public'.$productImageItem['image_path']) }}">
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>

              <div class="form-group">
                  <label>Chọn danh mục</label>
                  <select class="form-control select2_init" name="category_id">
                    <option value="">Chọn danh mục</option>
                    {!! $htmlOption !!}
                  </select>
              </div>
              <div class="form-group">
                  <label>Nhập tags cho sản phẩm</label>
                  <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                    @foreach($product->tags as $tagItem)
                    <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
                    @endforeach
                  </select>
              </div> 

              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <label >Nhập mô tả</label>
                    <textarea name="contents" class="form-control tinymce" id="ckeditor2" rows="3">{{ $product->content }}"</textarea>
                </div>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>

        </div>
      </div>
    </div>
  </form> 

  </div>
@endsection

@section('js')
  <script src="{{ asset('public/vendors/select2/select2.min.js') }}"></script>
  <script src="{{ asset('public/admins/product/add/add.js') }}"></script>
  <script>
    CKEDITOR.replace('ckeditor2');
  </script>
@endsection
  