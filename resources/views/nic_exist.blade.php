<!DOCTYPE html>
<html lang="en">

<head>

    @include('home.header')

    @include('admin.header')

</head>

<body>
    
        <!-- Spinner Start -->
        @include('home.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            
            <!-- Navbar End -->
            <!-- Header Start -->
            <div class="container-fluid bg-primary py-5 mb-5 page-header">
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 text-center">
                            <h1 class="display-3 text-white animated slideInDown">Presidential Vocational Scholarship Program 2024/2025</h1>
                            @if($checknic)
                            <h4 class="display-6 text-white animated slideInDown">Your Application No. is {{$checknic->app_no}}</h4>
                            @endif
                            @if($checknicnew1)
                            <h4 class="display-6 text-white animated slideInDown">Your Application No. is {{$checknicnew1->app_no}}</h4>
                            @endif
                            @if($checknicnew2)
                            <h4 class="display-6 text-white animated slideInDown">Your Application No. is {{$checknicnew2->app_no}}</h4>
                            @endif
                            @if($checknicold)
                            <h4 class="display-6 text-white animated slideInDown">Your Application No. is {{$checknicold->app_no}}</h4>
                            @endif
                            <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">Courses</li>
                                </ol>
                            </nav> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->

            <div class="container-fluid pt-4 px-4">   
                <div class="row g-4">
                    <div class="col-md-2">&nbsp;</div>    
                    <div class="col-md-8">
                        <div class="bg-light rounded h-100 p-4">
                            <h4 class="mb-4" style=text-align:center;>Application Form for the Presidential Vocational Scholarship Program 2024/2025</h4>
                            <div class="row">&nbsp;</div>
                            @if($checknic)
                            <p class="mb-4" style="text-align: justify;">You have already submitted an application and  your application No. is {{$checknic->app_no}} </p>
                            @endif
                            @if($checknicnew1)
                            <p class="mb-4" style="text-align: justify;">You have already submitted an application and  your application No. is {{$checknicnew1->app_no}} </p>
                            @endif
                            @if($checknicnew2)
                            <p class="mb-4" style="text-align: justify;">You have already submitted an application and  your application No. is {{$checknicnew2->app_no}} </p>
                            @endif
                            @if($checknicold)
                            <p class="mb-4" style="text-align: justify;">You have already submitted an application and  your application No. is {{$checknicold->app_no}} </p>
                            @endif
                            <p class="mb-4" style="text-align: justify;">Due to a large number of applications received for this scholarship program, we have to limit one user to apply for only one course. </p>
                            <p class="mb-4" style="text-align: justify;">We are tring our best to give you this scholarship program. Therefore, please follow our official facebook page (<a href='www.facebook.com/president.fund'>President's Fund Official Facebook Page</a>) and get notify about your eligibality for this program once we published the list of selected applicants.  </p>
                            <div class="row mb-3">
                                <div class='col-md-2'><a href="{{url('/')}}" class="btn btn-primary py-2 px-4 mt-2">Go Back</a></div> 
                            <div>
                            
                        </div>

                        
                    </div>
                    
                </div>
            </div>

            <!-- Footer Start -->
            @include('home.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        
        <!-- Back to Top -->
        
    <!-- JavaScript Libraries -->
    @include('home.footerjs')
    @include('admin.footerjs')

    <script>

            // $('#selectInstitute').change(function() {       
            //     var id = $(this).val();   
            //     $.get("{{ route('getCourses', ':id') }}".replace(':id', id), function(data) {
            //         $('#selectCourses').empty();

            //     $.each(data, function(key, value) {
            //         $('#selectCourses').append('<option value="' + key + '">' + value + '</option>');
            //         });
            //     });
            // });    

            // $('#selectCourses').change(function() {       
            //     var id1 = $(this).val();   
            //     $.get("{{ route('getLocation', ':id') }}".replace(':id', id1), function(data) {
            //         $('#selectLocation').empty();
            //     $.each(data, function(key, value) {
            //         $('#selectLocation').append('<option value="' + key + '">' + value + '</option>');
            //         });
            //     });
            // });    

            $('#selectInstitute').change(function() {       
                var instituteId = $(this).val();   
                $.get("{{ route('getCourses', ':id') }}".replace(':id', instituteId), function(data) {
                    $('#selectCourses').empty();
                    $.each(data, function(key, value) {
                    $('#selectCourses').append('<option value="' + key + '">' + value + '</option>');
                    });

                // Trigger getLocation AJAX after appending options to selectCourses
                var courseId = $('#selectCourses').val();
                getLocation(courseId);
                });
            });

            $('#selectCourses').change(function() {       
                var courseId = $(this).val();   
                getLocation(courseId);
            });

            function getLocation(courseId) {
                $.get("{{ route('getLocation', ':id') }}".replace(':id', courseId), function(data) {
                    $('#selectLocation').empty();
                    $.each(data, function(key, value) {
                        $('#selectLocation').append('<option value="' + key + '">' + value + '</option>');
                    });
                });
            }     

</script>
</body>

</html>