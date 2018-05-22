<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <title>Twitter App</title>
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
      @if(!empty($data))
         @foreach($data as $key=>$tweet)
            <div class="well">
               <h3> {{ $key }} </h3>
            </div>
         @endforeach
      @else
         <p>No tweets found</p>
      @endif
   </div>
</body>
</html>
