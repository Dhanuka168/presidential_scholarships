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
    <div class="container-fluid bg-primary py-5 mb-5 page-header" style="background-image: url('home/img/house_keeping2.jpeg'); height: 500px;">
        <!-- <img class="img-fluid" src="home/img/house_keeping.jpeg" /> -->
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-secondary animated slideInDown">Craft Level Hotel House Keeping (NVQ 4)</h1>
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

    <div class="container-xxl py-5">
        <div class="container">
        
        <div class="col-lg-12">
                    <div class="row">&nbsp;</div>
                    <h2 class="mb-4 text-center">Institute - Sri Lanka Institute of Tourism and Hotel Management</h2>
                    <p class="mb-4 text-center">Craft Level Hotel House Keeping is NVQ level 4 course conducted by Sri Lanka Institute of Tourism and Hotel Management.</p>
                    <!-- <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p> -->
                    
                    <h6 class="section-title bg-white text-start text-primary pe-3">General Information</h6>
                    <div class="row">&nbsp;</div>
                    <div class="row gy-1 gx-4 mb-4">
                        
                        <div class="col-sm-8">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i><strong>Notional Hourse 360</strong> including Theory - 210 & Practical - 150</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>1 year Industrial Training</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i><strong>Centers -</strong>Colombo, Kandy, Anuradhapura, Kurunegala, Koggala, Ratnapura, Bandarawela </p>
                        </div>
                    </div>
                    <h6 class="section-title bg-white text-start text-primary pe-3">Entry Qualification</h6>
                    <div class="row">&nbsp;</div>
                    <div class="row gy-1 gx-4 mb-4">
                        <div class="col-sm-8">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Sat for the G.C.E.O/L Examination</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Age Limit - Above 16 years</p>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class='col-md-2'><a href="{{url('/')}}" class="btn btn-primary py-2 px-5 mt-2">Go Back</a></div>
                <div class='col-md-2'><a href="{{route('view.form')}}" class="btn btn-primary py-2 px-5 mt-2">Apply</a></div>  
            </div>
        </div>
        
    </div>
    <!-- Categories Start -->
    <!-- @include('home.categories') -->
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