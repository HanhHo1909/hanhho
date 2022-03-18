@extends('layouts.admin')

@section('title')
  <title>Admin</title>

@endsection

@section('content')
  <div class="content-wrapper" style="background: #ebcfe2;">
    @include('partials.content-header',['name' => 'Cập nhật danh mục','key' =>''])
    @foreach($category as $cate)
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('categories.update', ['id' => $cate->id]) }}" method="post">
              @csrf
              <div class="form-group">
                <label>Tên danh mục</label>
                <input type="text" 
                  class="form-control"
                  name="name"
                  value="{{ $cate->name }}" 
                  placeholder="Nhập tên danh mục">
              </div>

              <div class="form-group">
                  <label>Chọn danh mục cha</label>
                  <select class="form-control" name="parent_id">
                    <option value="0">Chọn danh mục cha</option>
                    {!! $htmlOption !!}
                  </select>
              </div>

              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection


  