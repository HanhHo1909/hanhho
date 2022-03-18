@extends('layouts.admin')

@section('title')
  <title>Settings</title>
@endsection

@section('css')
  <link href="{{ asset('public/admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
  <div class="content-wrapper" style="background: #ebcfe2;">
    @include('partials.content-header',['name' => 'Cập nhật liên hệ','key' =>''])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('settings.update', [ 'id' => $setting->id ]) }}" method="post">
              @csrf
              <div class="form-group">
                <label>Config key</label>
                <input type="text" 
                class="form-control"
                name="config_key" 
                placeholder="Nhập config key"
                value="{{ $setting->config_key }}">
              </div>

              @if(request()->type === 'Text')
                <div class="form-group">
                  <label>Config value</label>
                  <input type="text" 
                  class="form-control"
                  name="config_value" 
                  placeholder="Nhập config value"
                  value="{{ $setting->config_value }}">
                </div>
                @elseif(request()->type === 'Textarea')
                  <div class="form-group">
                    <label>Config value</label>
                    <textarea  
                    class="form-control"
                    name="config_value" 
                    placeholder="Nhập config value"
                    rows="4">{{ $setting->config_value }}</textarea>
                  </div>
              @endif

              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection


  