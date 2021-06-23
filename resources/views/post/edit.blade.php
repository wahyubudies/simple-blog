<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <a href="{{ route('post.index') }}" class="btn btn-sm btn-secondary mb-3 mt-5">Back</a>
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">      
            <label for="">Title</label>
            <input class="form-control form-control-sm" type="text" name="title" placeholder="Enter title.." value="{{ old('title', $post->title) }}">
          </div>    
          <div class="form-group">      
            <label for="">Content</label>
            <input class="form-control form-control-sm" type="text" name="content" placeholder="Enter content.." value="{{ old('content', $post->content) }}">
          </div>    
          <div class="form-group">
            <label for="">Input Photo</label>
            <input type="file" class="form-control-file form-control-sm pl-0" id="" name="image">
          </div>
          <div class="form-group">      
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>      
          </div>
        </form>
      </div>
    </div>       
  </div>
</body>
</html>