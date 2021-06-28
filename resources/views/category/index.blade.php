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
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
              <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">          
          <a href="{{route('category.create')}}" class="btn btn-neutral">Add Data</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Light table</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Category Name</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach ($categories as $category)
                  <tr>                  
                    <th scope="row">
                      {{$loop->iteration}}
                    </th>
                    <td>
                      {{ \Str::limit($category->category_name, 30) }}
                    </td>
                    <td>
                      <a href=" {{route('category.edit', $category->id)}} " class="btn btn-secondary btn-sm float-right">                        
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                      </a>
                    </td>                    
                  </tr>                
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- Card footer -->
        <div class="card-footer py-4 d-flex justify-content-end">
          {{ $categories->links() }}
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