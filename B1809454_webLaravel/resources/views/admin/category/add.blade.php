@extends('layouts.admin')

@section('title')
  <title>Admin</title>
@endsection

@section('css')
  <link href="{{ asset('public/admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
  <div class="content-wrapper" style="background: #ebcfe2;">
    @include('partials.content-header',['name' => 'Thêm danh mục','key' =>''])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('categories.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Tên danh mục</label>
                <input type="text" 
                class="form-control @error('name') is-invalid @enderror"
                name="name" 
                placeholder="Nhập tên danh mục"
                value="{{ old('name') }}">
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                  <label>Chọn danh mục cha</label>
                  <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
                    <option value="0">Chọn danh mục cha</option>
                    {!! $htmlOption !!}
                  </select>
                  @error('parent_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>

          </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection


  