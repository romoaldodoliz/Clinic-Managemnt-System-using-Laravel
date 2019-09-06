<!DOCTYPE html>
<html>
    <head>
       
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset('css/gallerystyle.css') }}" rel="stylesheet">
        
	<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        
        <link rel="stylesheet" href="css/fontAwesome.css">
	<link rel="stylesheet" href="css/light-box.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
        

        <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        
    </head>

<body>

        <div class="container">
                @if(count($errors)>0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
        
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
        
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
             </div>

    

    <div id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
              <h1>Gallery</h1>
              <p>Get to know us more</p>
              <p>Check out these photos</p>
                <div class="scroll-icon">
                    <a class="scrollTo" data-scrollTo="photo" href="#"><img src="img/scroll-icon.png" alt=""></a>
                </div> 
                @if(!auth::guest())
                <a class="btn btn-primary" href="/gallery/create">Add New Photo</a>
                <button class="btn btn-primary">Edit background video</button>  
        @endif 
            </div>
        </div>
        <video autoplay="" loop="" muted>
        	<source src="img/highway-loop.mp4" type="video/mp4" />
        </video>
    </div>
    <div class="services" id="photo" >
    <div class="container">
        @if (count($articles)>0)
        @foreach ($articles as $article)
            <div class="service left col-lg-6 col-md-12 col-sm-12 p-5">
                    
            <a href="/storage/images/{{$article->image}}" data-lightbox="image-1">
                <img src="/storage/images/{{$article->image}}" >  
            
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
            
        </a>
       
                @if(!auth::guest())
                    @if(auth::user()->id == $article->doctor_id)
                        <a class="btn btn-primary" href="/gallery/{{ $article->article_id }}/edit">Edit</a>
                        <form class="form" action="/gallery/{{ $article->article_id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger" value="Remove">
                        </form>
                    @endif
                @endif
            </div>
        @endforeach
        @else
        <p>No posts to show</p>
        @endif    
    </div>
    @if(!auth::guest())
    <a class="btn btn-primary" href="/AdHome">Back to Dashboard</a>
    @endif 
    </div>
   

    
              


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>
</html>