<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <title>Twitter App</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
   <nav class="navbar navbar-default">
      <div class="container">
         <div class="navbar-header">
            <a href="/" class="navbar-brand">My tweets</a>
         </div>
      </div>
   </nav>

   <div class="container">

      <form action="{{ route('post.tweet') }}" method="POST" class="card" enctype="multipart/form-data">
         {{ csrf_field() }}
         @if(count($errors) > 0)
            @foreach($errors->all() as $error)
               <div class="alert alert-danger">
                  {{ $error }}
               </div>
            @endforeach
         @endif

         <div class="form-group">
            <label for="">Tweet Text</label>
            <input type="text" class="form-control" name="tweet">
         </div>

         <div class="form-group">
            <label for="">Upload images</label>
            <input type="file" class="form-control" name="images[]" multiple>
         </div>

         <div class="form-group">
            <button class="btn btn-success">Create tweet</button>
         </div>

      </form>

      @if(!empty($data))
         @foreach($data as $tweet)
            <div class="card my-3">
               <div class="card-body">
                  <h4> {{ $tweet->text }}
                     <i class="fa fa-heart" aria-hidden="true"></i> {{ $tweet->favorite_count }}
                     <i class="fa fa-retweet" aria-hidden="true"></i> {{ $tweet->retweet_count }}
                  </h4>

                  @if(!empty($tweet->extended_entities->media))
                     @foreach($tweet->extended_entities->media as $image)
                        <img src="{{ $image->media_url_https }}" style="width: 100px">
                     @endforeach
                  @endif
               </div>
            </div>
         @endforeach
      @else
         <p>No tweets found</p>
      @endif
   </div>
</body>
</html>
