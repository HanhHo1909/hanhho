@extends('layouts.admin')

@section('title')
  <title>Admin</title>
@endsection

@section('css')
  <link href="{{ asset('public/admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
  <div class="content-wrapper" style="background: #ebcfe2;">
    @include('partials.content-header',['name' => 'Cập nhật Slider','key' =>''])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('slider.update', [ 'id' => $slider->id ]) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Tên slider</label>
                <input type="text" 
                class="form-control"
                name="name" 
                placeholder="Nhập tên slider"
                value="{{ $slider->name }}">
              </div>

              <div class="form-group">
                <label>Mô tả slider</label>
                <textarea name="description" class="form-control" rows="4" >{{ $slider->description }}</textarea>
              </div>
              
              <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" 
                class="form-control"
                name="image_path" >

                <div class="col-md-4 container-image-detail">
                  <div class="row">
                    <img class="image_detail" src="{{ asset('public'.$slider['image_path']) }}">
                  </div>
                </div>
                
              </div>

              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection


  