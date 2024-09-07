<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Final Project</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Customized Bootstrap Stylesheet -->    
        <link href="assets/css/index.css" rel="stylesheet">
    </head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
                <img class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2vTgS4HOgts25BhEX6TgIViV0UK-_HsFV2Q&s" alt="Image">
                <h1 class="font-weight-bold">Welcome to Uenr Search Engine </h1>
                <p class="mb-4">
                    Quickly find what you need with Uenr Search Engine – your fast and reliable search solution. Enjoy instant results, smart search features, and safe browsing. Discover images, articles, and more with ease. Start exploring now!
                </p>
              
                <a href="" class="btn btn-lg btn-block btn-primary mt-auto">Uenr Search Engine</a>
            </div>
            <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
                <i class="fas fa-2x fa-angle-double-right text-primary"></i>
            </div>
        </div>
        <div class="content">
            

            <form id="searchForm" action="{{ url('/searchContent') }}" method="POST">
                @csrf
                <div class="container py-5 px-2 bg-primary">
                    <div class="row py-5 px-4">
                        <div style="margin: auto; padding: 15px; border-radius: 10px; width: 150px;" class="col-sm-6 text-center text-md-right">
                            <input name="searContent" style="padding: 8px; border-radius: 3px;" type="text" placeholder="searching..." required>
                            <button style="padding: 8px; border-radius: 3px; color:  white; background-color: green;" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
                
            @if(!empty($data['message']))
                <p style="color: red;">{{$data['message']}}</p> 
            @endif
            

            <div class="container bg-white pt-5">
          
                @if (!empty($data))
                @foreach ($data as $item)
                <div  class="row blog-item px-3 pb-5">
                    <div style="height: 200px; width: 100px;" class="col-md-5">
                        <img style="object-fit: cover; height: 100%; width: 100%; display: cover;" class="img-fluid mb-4 mb-md-0" src="{{$item['image']}}" alt="Image">
                    </div>
                    <div class="col-md-7">
                        {{-- <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">{{$item['title']}}</h3> --}}
                        <div class="d-flex mb-3">
                            <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i>Source {{$item['source']}}</small>
                            <small class="mr-2 text-muted"><i class="fa fa-folder"></i>Height {{$item['height']}}</small>
                            <small class="mr-2 text-muted"><i class="fa fa-comments"></i>Width {{$item['width']}}</small>
                        </div>
                        <p>
                            {{ $item['title'] }}
                        </p>
                        <a class="btn btn-link p-0" href="{{$item['url']}}">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                @endforeach 
                @else
                {{-- <p style="margin: auto;">Search ...</p> --}}
                <img style="width: 100px;" class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2vTgS4HOgts25BhEX6TgIViV0UK-_HsFV2Q&s" alt="Image">
                @endif 


              
                    
                </div>
                <!-- Blog List End -->
                
                
                <!-- Footer Start -->
                <div class="container py-4 bg-secondary text-center">
                    <p class="m-0 text-white">
                        &copy; <a class="text-white font-weight-bold" href="#">Uenr Search Engine</a>
                    </p>
                </div>
                <!-- Footer End -->
            </div>

           
            
        </div>
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
