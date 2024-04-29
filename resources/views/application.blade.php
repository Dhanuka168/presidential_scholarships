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
            <!-- Go back button -->
            <div class="row mb-3">
                <div class='col-md-1'>&nbsp;</div> 
                <div class='col-md-2'><a href="{{route('view.form')}}" class="btn btn-primary py-2 px-4 mt-2">Go Back</a></div> 
            <div>
            <!--progressbar starts -->
            <div class="container-fluid pt-4 px-4">   
                <div class="row g-4">
                    <div class="col-md-2">&nbsp;</div>    
                    <div class="col-md-8">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                50%
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
                            <h5 class="mb-4" style=text-align:center;>Personal Information</h5>
                            <div class="row">&nbsp;</div>
                            <!-- Form stars -->
                                <form action="{{route('educationalQual')}}" method="POST" id="applicationform1" name="applicationform1">
                                @csrf
                                
                                    <div class="row mb-3">
                                        <label for="forminstitute" class="col-sm-2 col-form-label">Institute</label>
                                        <div class="col-sm-10">
                                        @if($selectedinstitute)
                                            <input type="hidden" id="forminstitute" name="forminstitute" value="{{$selectedinstitute->id}}">
                                            <input type="text" class="form-control" value="{{$selectedinstitute->institute}}" readonly>
                                        <!-- @endif
                                        @if(session()->has('application_data2.institute_id')) -->
                                        @else
                                            <input type="hidden" id="forminstitute" name="forminstitute" value="{{ session('application_data2.institute_id') }}">
                                            <input type="text" class="form-control" value="{{ session('application_data2.institute.institute') }}" readonly>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="formcourse" class="col-sm-2 col-form-label">Course</label>
                                        <div class="col-sm-10">
                                        @if($selectedcourse)
                                            <input type="hidden" id="formcourse" name="formcourse" value="{{$selectedcourse->id}}">
                                            <input type="text" class="form-control" value="{{$selectedcourse->course_name}}" readonly>
                                        @else
                                            <input type="hidden" id="formcourse" name="formcourse" value="{{ session('application_data2.course_id') }}">
                                            <input type="text" class="form-control" value="{{ session('application_data2.course_name.course_name') }}" readonly>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="formlocation" class="col-sm-2 col-form-label">Course Location</label>
                                        <div class="col-sm-10">
                                        @if($selectedlocation)
                                            <input type="hidden" id="formlocation" name="formlocation" value="{{$selectedlocation->id}}">
                                            <input type="text" class="form-control" value="{{$selectedlocation->town}}" readonly>
                                        @else
                                            <input type="hidden" id="formlocation" name="formlocation" value="{{ session('application_data2.course_town_id') }}">
                                            <input type="text" class="form-control" value="{{ session('application_data2.town.town') }}" readonly>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="formnic" class="col-sm-2 col-form-label">Your NIC Number</label>
                                        <div class="col-sm-3">
                                        @if($nic)
                                            <input type="text" class="form-control" id="formnic" name="formnic" value="{{$nic}}" readonly>
                                        @else
                                            <input type="text" class="form-control" id="formnic" name="formnic" value="{{ session('application_data2.nic_number') }}" readonly>
                                        @endif
                                        </div>
                                        <label for="NicCopy" class="col-sm-2 col-form-label">NIC Copy</label>
                                        <div class="col-sm-5">
                                            <p class="form-control" style="color:red;">Need to attach your NIC copy at the last page.</p>
                                        </div>
                                    </div>
                                <p>&nbsp;</p>
                                <p class="mb-4" style="text-align: justify; font-style:italic;"><i class="fas fa-exclamation-circle"></i> Are the above information correct?. Once submitted your application, you can't no longer be change the above details. If these are incorrect, Please go back and choose the correct one.   </p>
                                <hr class="hr" />
                                <div class="row mb-3">
                                    <label for="Province" class="col-sm-2 col-form-label">Province<span style="color: red;"> *</span></label>
                                    <div class="col-sm-2">
                                        <select id="selectProvince" name="formprovince" class="form-control" required>
                                            <option value="" disabled selected>Select Province</option>
                                            @foreach ($getProvinces as $province)
                                            <option value="{{$province['id']}}">{{$province['province']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="formdictrict" class="col-sm-1 col-form-label">District<span style="color: red;">*</span></label>
                                    <div class="col-sm-2">
                                        <select id="selectDistrict" name="formdictrict" class="form-control" required>
                                            <option value="" disabled selected>Select District</option>
                                        </select>
                                    </div>
                                    <label for="formdsoffice" class="col-sm-2 col-form-label">DS Office<span style="color: red;"> *</span></label>
                                    <div class="col-sm-3">
                                        <select id="selectdsoffice" name="formdsoffice" class="form-control" required>
                                            <option value="" disabled selected>Select DS Office</option>
                                        </select>
                                    </div>
                                </div>
                                <hr class="hr" />
                                <p>&nbsp;</p>
                                <div class="row mb-3">
                                    <label for="fullname" class="col-sm-2 col-form-label">Full Name<span style="color: red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="fullname" name="formfullname">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="namewithini" class="col-sm-2 col-form-label">Name with Initials<span style="color: red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namewithini" name="formnamewithini">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="dob" class="col-sm-2 col-form-label">Date of Birth<span style="color: red;"> *</span></label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="dob" name="formdob">
                                    </div>
                                    <div class="col-md-1">&nbsp;</div>  
                                     
                                    <label for="gender" class="col-sm-2 col-form-label">Gender<span style="color: red;"> *</span></label>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="formgender" id="male" value="1" required>
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="formgender" id="female" value="0">
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>
                                        <div id="genderError" class="text-danger"></div> <!-- Error message container -->
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="address" class="col-sm-2 col-form-label">Address<span style="color: red;"> *</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address" name="formaddress">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="formemail">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="mobile" class="col-sm-2 col-form-label">Mobile No.<span style="color: red;"> *</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="mobile" name="formmobile" maxlength="10" required>
                                    </div>
                                    <div class="col-md-1">&nbsp;</div>
                                    <label for="land" class="col-sm-2 col-form-label">Land Phone No.</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="land" name="formmland" maxlength="10">
                                    </div>
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
                                    <div class='col-md-2'><button type="submit" class="btn btn-primary py-2 px-5 mt-2">Proceed</button></div>
                                    <div class="col-md-1">&nbsp;</div>
                                    <div class='col-md-2'><button id="btnform2clear" class="btn btn-primary py-2 px-5 mt-2"> Clear </button></div> 
                                <div>

                            </div>
                                

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
        $('#selectProvince').change(function() {       
                var provinceId = $(this).val();   
                $.get("{{ route('getDistrict', ':id') }}".replace(':id', provinceId), function(data) {
                    $('#selectDistrict').empty();
                    $.each(data, function(key, value) {
                    $('#selectDistrict').append('<option value="' + key + '">' + value + '</option>');
                    });

                // Trigger getLocation AJAX after appending options to selectCourses
                var districtId = $('#selectDistrict').val();
                getDsoffice(districtId);
                });
            });

            //after selecting the course name, default value of location will be automatically filled  
            $('#selectDistrict').change(function() {       
                var districtId = $(this).val();   
                getDsoffice(districtId);
            });

            function getDsoffice(districtId) {
                $.get("{{ route('getDsoffice', ':id') }}".replace(':id', districtId), function(data) {
                    $('#selectdsoffice').empty();
                    $.each(data, function(key, value) {
                        $('#selectdsoffice').append('<option value="' + key + '">' + value + '</option>');
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