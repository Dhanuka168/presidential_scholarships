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
                            <h1 class="display-3 text-white animated slideInDown">Application Form</h1>
                            <h4 class="display-6 text-white animated slideInDown">Presidential Vocational Scholarship Program 2024/2025</h4>
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
            @if(session('message'))
            <div id= "overlay">
                <div class="alert alery-info alert-dismissible col-md-7" id="message">
                    <!-- <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button> -->
                    <h5><i class="icon fas fa-exclamation-circle" style="text-align:center;"></i>Alert!</h5>
                    {{session('message')}}
                </div>
            </div>
            @endif
            @if(session('error'))
            <div id= "overlay">
                <div class="alert alery-danger alert-dismissible col-md-7" id="error">
                    <!-- <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button> -->
                    <h5><i class="icon fas fa-exclamation-circle" style="text-align:center;"></i>Alert!</h5>
                    {{session('error')}}
                </div>
            </div>
            @endif
            <!-- Go back button -->
            <div class="row mb-3">
                <div class='col-md-1'>&nbsp;</div> 
                <div class='col-md-2'><a href="{{url('/')}}" class="btn btn-primary py-2 px-4 mt-2">Go Back</a></div> 
            <div>
            <!--progressbar starts -->
            <div class="container-fluid pt-4 px-4">   
                <div class="row g-4">
                    <div class="col-md-2">&nbsp;</div>    
                    <div class="col-md-8">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%">
                                25%
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <!--progressbar ends -->

            <div class="container-fluid pt-4 px-4">   
                <div class="row g-4">
                    <div class="col-md-2">&nbsp;</div>    
                    <div class="col-md-8">
                        <div class="bg-light rounded h-100 p-4">
                            <h4 class="mb-4" style=text-align:center;>Application Form for the Presidential Vocational Scholarship Program 2024/2025</h4>
                            <div class="row">&nbsp;</div>
                            <!-- Form stars -->
                            <form action="{{route('checkAvail')}}" method="POST" id="indexform" name="indexform">
                                @csrf
                                <div class="row mb-3">
                                    <label for="forminstitute" class="col-sm-2 col-form-label">Institute <span style="color: red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <select id="selectInstitute" name="forminstitute" class="form-control" required>
                                            <option value="" disabled selected>Select Institute</option>
                                            @foreach ($getInstitutes as $institute)
                                            <option value="{{$institute['id']}}">{{$institute['institute']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="CourseName" class="col-sm-2 col-form-label">Course<span style="color: red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <select id="selectCourses" name="formcourses" class="form-control" required>
                                            <option value="" disabled selected>Select Courses</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="formlocation" class="col-sm-2 col-form-label">Course Location<span style="color: red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <select id="selectLocation" name="formlocation" class="form-control" required>
                                            <option value="" disabled selected>Select Course Location</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="formnic" class="col-sm-2 col-form-label">Your NIC Number<span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nic" name="formnic" required maxlength="12">
                                    </div>
                                    <div class="col-md-12">&nbsp;</div>
                                    <div class="col-form-label">- If your identity card number has 12 digits (New Identity card), please enter the number as it is <br>
                                         - If your identity card number has 9 digits and a letter (Old Identity Card), please enter the number
                                         prefixed with "000" (3 zeros) and without the letter <br>
                                        For example if NIC Number is 701234567V, Enter as 000701234567</div>
                                </div>
                                <div class="row mb-3">&nbsp;</div>
                                <!-- Display backend validation errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row mb-3">
                                    <div class="col-md-3">&nbsp;</div>
                                    <div class='col-md-2'><button type="submit" class="btn btn-primary py-2 px-5 mt-2">Check</button></div>
                                    <div class="col-md-1">&nbsp;</div>
                                    <div class='col-md-2'><button id="btnform1clear"  class="btn btn-primary py-2 px-5 mt-2">Clear</button></div> 
                                <div>
                                <!-- Form Ends -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        
    <!-- JavaScript Libraries -->
    @include('home.footerjs')
    @include('admin.footerjs')

    <script>


            //after selecting the institute name, default value of course name and location will be automatically filled 
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

            //after selecting the course name, default value of location will be automatically filled  
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
            
            //appear the popup and disappers after 10 seconds
            $(document).ready(function(){
                $('#overlay').show();
                $('#message').show();
                $('#error').show();

                setTimeout(function(){
                    $('#overlay').hide();
                    $('#message').hide();
                    $('#error').hide();
                }, 10000);
            });

            

</script>
</body>

</html>