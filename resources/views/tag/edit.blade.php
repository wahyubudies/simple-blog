@extends('layouts.default')
@section('title')
<title>Tag - Simple Blog</title>
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
                <li class="breadcrumb-item"><a href="#">Tag</a></li>
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
              <h3 class="mb-0">Edit Tag </h3>
            </div>
            <div class="col-4 text-right">                                 
              <form onsubmit="return confirm('Are u sure to delete ?');" action="{{route('tag.destroy', $tag->id)}}" method="POST">
                <a href="{{ route('tag.index') }}" class="btn btn-sm btn-primary">Back</a>  
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>              
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('tag.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Tag Name</label>
                  <input type="text" class="form-control" name="tag_name" placeholder="Enter tag name.." value="{{ old('tag_name', $tag->tag_name) }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Tag Slug</label>
                  <input type="text" class="form-control" value="{{ $tag->tag_slug }}" readonly>
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