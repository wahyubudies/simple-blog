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
        <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary ml-4 mt-5 mb-3">Add post*</a>        
        <ol>    
          @foreach ($posts as $post)
          <li class="mb-4">
            <img src="{{ Storage::url('public/posts/').$post->image }}" class="rounded" style="width: 150px">
            <h3>{{ \Str::limit($post->title, 30) }}</h3>
            <p class="m-0">{{ \Str::limit($post->content,100) }}</p>
            
            <form onsubmit="return confirm('Are U sure ?');" action="{{route('post.destroy', $post->id)}}" method="POST">
              <a href="{{route('post.edit', $post->id)}}" class="btn btn-sm btn-secondary">edit</a>                
              @csrf
              @method('DELETE')
              <a class="btn btn-danger btn-sm">Delete</a>
            </form>

          </li>    
          @endforeach
        </ol>
      </div>
    </div>  
  </div>
</body>
</html>