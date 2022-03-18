@extends('layouts.admin')

@section('title')
  <title>Admin</title>
@endsection

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/admins/product/index/list.css') }}">
@endsection

@section('js')
  <script src="{{ asset('public/vendors/sweetalert2/sweetalert2@11.js') }}"></script>
  <script src="{{ asset('public/admins/product/index/list.js') }}"></script>
@endsection

@section('content')
  <div class="content-wrapper" style="background: #ebcfe2;">
    @include('partials.content-header',['name' => 'Danh sách danh mục','key' =>''])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Add</a>
          </div>

          <div class="col-md-6">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên danh mục</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)

                <tr>
                  <td><b>{{ $category->id }}</b></th>
                  <td>{{ $category->name }}</td>
                  <td>
                    <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-default">Edit</a>
                    <a href=""
                    data-url="{{ route('categories.delete', ['id' => $category->id]) }}"
                     class="btn btn-danger action_delete">Delete</a>

                  </td>
                </tr>
                @endforeach

              </tbody>
           </table>
          </div>
          <div class="col-md-12">
            {{ $categories->links() }}
          </div>
          
        </div>
    
      </div>
    </div>
  </div>

@endsection


  