<!DOCTYPE html>
<html lang="en">

<head>
<base href="/view" />
    @include('home.header')
</head>

<body>
    <!-- Spinner Start -->
    @include('home.spinner')
    <!-- Spinner End -->


    <!-- Navbar Start -->
    @include('home.navbar')
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">{{$selectedcourse->course_name}}</h1>
                    <nav aria-label="breadcrumb">
                        <!-- <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Courses</li>
                        </ol> -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Categories Start -->


            <div class="container-fluid pt-4 px-4">   
                <div class="row g-4">
                    <div class="col-md-2">&nbsp;</div>    
                    <div class="col-md-8">
                        <div class="bg-light rounded h-100 p-4">
                            <h4 class="mb-4" style=text-align:center;>Application Form for the Presidential Vocational Scholarship Program 2024/2025</h4>
                            <div class="row">&nbsp;</div>
                            <h5 class="mb-3" style="font-size:30px; color:green; text-align:center;">Success!</h5>
                            <p style="font-size:24px; text-align:center;">Your application for <strong>{{$selectedcourse->course_name}}</strong> is submitted Successfully. Your Application Number is <strong>{{$nextNo}}</strong></p>
        
                            <div class="row mb-3">
                            <div class="col-md-5">&nbsp;</div>
                                <div class='col-md-3'><a href="{{url('/')}}" class="btn btn-primary py-3 px-5 mt-3">Home</a></div> 
                            <div>
                        </div>

                        
                    </div>
                    
                </div>
            </div>
    <!-- Categories Start -->


    <!-- Courses Start -->
    
    <!-- Courses End -->


    <!-- Testimonial Start -->
    
    <!-- Testimonial End -->
        

    <!-- Footer Start -->
    @include('home.footer')


    <!-- JavaScript Libraries -->
    @include('home.footerjs')
    
</body>

</html>