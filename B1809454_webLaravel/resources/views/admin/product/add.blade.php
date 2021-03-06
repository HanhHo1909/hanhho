  
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
    @include('partials.content-header',['name' => 'Thêm sản phẩm','key' =>''])
  <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
              @csrf
              <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" 
                class="form-control @error('name') is-invalid @enderror"
                name="name" 
                placeholder="Nhập tên sản phẩm"
                value="{{ old('name') }}">
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label>Giá sản phẩm</label>
                <input type="text" 
                class="form-control @error('price') is-invalid @enderror"
                name="price" 
                placeholder="Nhập giá sản phẩm"
                value="{{ old('price') }}">
                @error('price')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label>Số lượng sản phẩm</label>
                <input type="text" 
                class="form-control @error('quantity_product') is-invalid @enderror"
                name="quantity_product" 
                placeholder="Nhập giá sản phẩm"
                value="{{ old('quantity_product') }}">
                @error('quantity_product')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" 
                class="form-control-file"
                name="feature_image_path">
              </div>

              <div class="form-group">
                <label>Ảnh chi tiết</label>
                <input type="file" 
                multiple="multiple"
                class="form-control-file"
                name="image_path[]">
              </div>

              <div class="form-group">
                  <label>Chọn danh mục</label>
                  <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                    <option value="">Chọn danh mục</option>
                    {!! $htmlOption !!}
                  </select>
                  @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Nhập tags cho sản phẩm</label>
                  <select name="tags[]" class="form-control tags_select_choose" multiple="multiple"></select>
              </div>

              <div class="form-group">
                <label >Nhập mô tả</label>
                <textarea name="contents" id="ckeditor1" class="form-control @error('contents') is-invalid @enderror" rows="5" >{{ old('contents') }}</textarea>
                @error('contents')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

          </div>
          
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
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
    CKEDITOR.replace('ckeditor1');
  </script>
@endsection
  