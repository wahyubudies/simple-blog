@extends('layouts.default')
@section('title')
<title>Category - Simple Blog</title>
@endsection
@section('content')
  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item"><a href="#">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">            
              <h3 class="mb-0">Edit Category </h3>
            </div>
            <div class="col-4 text-right">                                 
              <form onsubmit="return confirm('Are u sure to delete ?');" action="{{route('category.destroy', $category->id)}}" method="POST">
                <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary">Back</a>  
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>              
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Category Name</label>
                  <input type="text" class="form-control" name="category_name" placeholder="Enter category name.." value="{{ old('category_name', $category->category_name) }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Category Slug</label>
                  <input type="text" class="form-control" value="{{ $category->category_slug }}" readonly>
                </div>
              </div>
            </div>
            <div class="row">              
              <div class="col-lg-8">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Edit</button> 
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    @include('layouts.footer')
  </div>     
@endsection('content')
@section('toastr')
  <script>      
      @if(session()->has('success'))      
        toastr.success('{{ session('success') }}', 'SUCCESS!'); 
      @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'FAILED!');           
      @endif
  </script>
@endsection('toastr')