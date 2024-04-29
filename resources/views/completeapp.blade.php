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
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
            <!-- Go back button -->
            <div class="row mb-3">
                <div class='col-md-1'><&nbsp;</div> 
                <div class='col-md-2'><a href="{{route('view.form')}}" class="btn btn-primary py-2 px-4 mt-2">Go Back</a></div> 
            <div>
            <!--progressbar starts -->
            <div class="container-fluid pt-4 px-4">   
                <div class="row g-4">
                    <div class="col-md-2">&nbsp;</div>    
                    <div class="col-md-8">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                100%
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
                            <h5 class="mb-4" style=text-align:center;>Presonal Information</h5>
                            <div class="row">&nbsp;</div>
                            <!-- Form stars -->
                                <form action="{{route('submitApp')}}" method="POST" id="completeform" name="completeform" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                        <label for="forminstitute" class="col-sm-2 col-form-label">Institute</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" id="forminstitute" name="forminstitute" value="{{ Session::get('application_data')['institute_id'] }}" >
                                            <input type="text" class="form-control" value="{{ Session::get('application_data')['institute']['institute'] }}" readonly>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="formcourse" class="col-sm-2 col-form-label">Course</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" id="formcourse" name="formcourse" value="{{ Session::get('application_data')['course_id'] }}" >
                                            <input type="text" class="form-control"  value="{{ Session::get('application_data')['course_name']['course_name'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="formlocation" class="col-sm-2 col-form-label">Course Location</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" id="formlocation" name="formlocation" value="{{ Session::get('application_data')['course_town_id'] }}" >
                                            <input type="text" class="form-control" value="{{ Session::get('application_data')['town']['town'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="formnic" class="col-sm-2 col-form-label">Your NIC Number</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="formnic" name="formnic"  value="{{ Session::get('application_data')['nic_number'] }}" readonly>
                                        </div>
                                        <label for="formniccopy" class="col-sm-2 col-form-label" style="color:red;">Attach a NIC Copy</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="formniccopy" name="formniccopy">
                                        </div>
                                    </div>
                              
                                <p>&nbsp;</p>
                                <p class="mb-4" style="text-align: justify; font-style:italic;"><i class="fas fa-exclamation-circle"></i> Are the above information correct. Once submitted your application, you can't no longer be change the above details. If these are incorrect, Please go back and choose the correct one.   </p>
                                <hr class="hr" />
                                <div class="row mb-3">
                                    <label for="province" class="col-sm-2 col-form-label">Province</label>
                                    <div class="col-sm-2">
                                        <input type="hidden" class="form-control" id="province" name="formprovince" value="{{ Session::get('application_data')['provincial_id'] }}" >
                                        <input type="text" class="form-control" value="{{ Session::get('application_data')['province']['province'] }}" readonly>
                                    </div>
                                    <label for="district" class="col-sm-1 col-form-label">District</label>
                                    <div class="col-sm-2">
                                        <input type="hidden" class="form-control" id="district" name="formdistrict" value="{{ Session::get('application_data')['district_id'] }}" >
                                        <input type="text" class="form-control" value="{{ Session::get('application_data')['district']['district'] }}" readonly>
                                    </div>
                                    <label for="dsoffice" class="col-sm-2 col-form-label">DS Office</label>
                                    <div class="col-sm-3">
                                        <input type="hidden" class="form-control" id="dsoffice" name="formdsoffice" value="{{ Session::get('application_data')['ds_id'] }}" >
                                        <input type="text" class="form-control" value="{{ Session::get('application_data')['ds_office']['ds_office'] }}" readonly>
                                    </div>
                                </div>
                                <hr class="hr" />
                                <p>&nbsp;</p>
                                <div class="row mb-3">
                                    <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="fullname" name="formfullname" value="{{ Session::get('application_data')['full_name'] }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="namewithini" class="col-sm-2 col-form-label">Name with Initials</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namewithini" name="formnamewithini" value="{{ Session::get('application_data')['name_with_initials'] }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" id="dob" name="formdob" value="{{ Session::get('application_data')['date_of_birth'] }}" readonly>
                                    </div>
                                    <div class="col-md-1">&nbsp;</div>  
                                     
                                    <label for="formgender" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-md-1">
                                        @if(Session::get('application_data')['gender'] =="1")
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="formgender" id="male" value="1" checked>
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
                                        @else
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="formgender" id="male" value="1">
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="formgender" id="female" value="0" checked>
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address" name="formaddress" value="{{ Session::get('application_data')['address'] }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="formemail" value="{{ Session::get('application_data')['email'] }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="mobile" class="col-sm-2 col-form-label">Mobile No.</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="mobile" name="formmobile" value="{{ Session::get('application_data')['mobile'] }}" readonly>
                                    </div>
                                    <div class="col-md-1">&nbsp;</div>
                                    <label for="land" class="col-sm-2 col-form-label">Land Phone No.</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="land" name="formmland" value="{{ Session::get('application_data')['land_line'] }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">&nbsp;</div>
                                    <hr class="hr" />
                                    <div class="row mb-3">
                                    <label for="CourseName" class="col-sm-8 col-form-label">G.C.E. Ordinary Level (O/L)</label>
                                    </div>
                                    <div class="row mb-3">
                                        
                                        <label for="olschool" class="col-sm-2 col-form-label">School</label>
                                        <div class="col-sm-3">
                                        <input type="text" class="form-control" id="olschool" name="formolschool" value="{{ Session::get('application_data1')['ol_school'] }}" readonly>
                                        </div>
                                        <label for="olyear" class="col-sm-1 col-form-label">Year</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="olyear" name="formolyear" value="{{ Session::get('application_data1')['ol_year'] }}" readonly>
                                        </div>
                                        <label for="olindex" class="col-sm-2 col-form-label">Index No.</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="olindex" name="formolindex" value="{{ Session::get('application_data1')['ol_index'] }}" readonly>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                    <div class=col-md-2>&nbsp;</div>
</div> -->
                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-sm-12 col-xl-10">
                                                    <div class="bg-light rounded h-100 p-4">
                                                        <h6 class="mb-2 col-form-label">O/L Exam Results</h6>
                                                            <table class="table">
                                                            
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Subject Name</th>
                                                                        <th scope="col">Result</th>
                                                                    </tr>
                                                                </thead>
    
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td><input type="hidden" id="olsubject1" name="formolsub1" class="form-control" value="{{ Session::get('application_data1')['ol_sub_id1'] }}" >
                                                                            <input type="text" class="form-control" value="{{ Session::get('application_data1')['ol_sub1']['subject'] }}" readonly>      
                                                                        </td>
                                                                        <td><input type="text" id="olresult1" name="formolres1" class="form-control" value="{{ Session::get('application_data1')['ol_res1'] }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">2</th>
                                                                        <td><input type="hidden" id="olsubject2" name="formolsub2" class="form-control" value="{{ Session::get('application_data1')['ol_sub_id2'] }}" >
                                                                        <input type="text" class="form-control" value="{{ Session::get('application_data1')['ol_sub2']['subject'] }}" readonly> 
                                                                        </td>
                                                                        <td><input type="text" id="olresult2" name="formolres2" class="form-control" value="{{ Session::get('application_data1')['ol_res2'] }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">3</th>
                                                                        <td><input type="hidden" id="olsubject3" name="formolsub3" class="form-control" value="{{ Session::get('application_data1')['ol_sub_id3'] }}" >
                                                                        <input type="text" class="form-control" value="{{ Session::get('application_data1')['ol_sub3']['subject'] }}" readonly> 
                                                                        </td>
                                                                        <td>
                                                                        <input type="text" id="olresult3" name="formolres3" class="form-control" value="{{ Session::get('application_data1')['ol_res3'] }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">4</th>
                                                                        <td><input type="hidden" id="olsubject4" name="formolsub4" class="form-control" value="{{ Session::get('application_data1')['ol_sub_id4'] }}" >
                                                                        <input type="text" class="form-control" value="{{ Session::get('application_data1')['ol_sub4']['subject'] }}" readonly> 
                                                                        </td>
                                                                        <td><input type="text" id="olresult4" name="formolres4" class="form-control" value="{{ Session::get('application_data1')['ol_res4'] }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">5</th>
                                                                        <td><input type="hidden" id="olsubject5" name="formolsub5" class="form-control" value="{{ Session::get('application_data1')['ol_sub_id5'] }}" >
                                                                        <input type="text" class="form-control" value="{{ Session::get('application_data1')['ol_sub5']['subject'] }}" readonly> 
                                                                        </td>
                                                                        <td><input type="text" id="olresult5" name="formolres5" class="form-control" value="{{ Session::get('application_data1')['ol_res5'] }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">6</th>
                                                                        <td><input type="hidden" id="olsubject6" name="formolsub6" class="form-control" value="{{ Session::get('application_data1')['ol_sub_id6'] }}" >
                                                                        <input type="text" class="form-control" value="{{ Session::get('application_data1')['ol_sub6']['subject'] }}" readonly> 
                                                                        </td>
                                                                        <td><input type="text" id="olresult6" name="formolres6" class="form-control" value="{{ Session::get('application_data1')['ol_res6'] }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">7</th>
                                                                        <td><input type="hidden" id="olsubject7" name="formolsub7" class="form-control" value="{{ Session::get('application_data1')['ol_sub_id7'] }}" >
                                                                        <input type="text" class="form-control" value="{{ Session::get('application_data1')['ol_sub7']['subject'] }}" readonly> 
                                                                        </td>
                                                                        <td><input type="text" id="olresult7" name="formolres7" class="form-control" value="{{ Session::get('application_data1')['ol_res7'] }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">8</th>
                                                                        <td><input type="hidden" id="olsubject8" name="formolsub8" class="form-control" value="{{ Session::get('application_data1')['ol_sub_id8'] }}" >
                                                                        <input type="text" class="form-control" value="{{ Session::get('application_data1')['ol_sub8']['subject'] }}" readonly> 
                                                                        
                                                                        </td>
                                                                        <td><input type="text" id="olresult8" name="formolres8" class="form-control" value="{{ Session::get('application_data1')['ol_res8'] }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">9</th>
                                                                        <td><input type="hidden" id="olsubject9" name="formolsub9" class="form-control" value="{{ Session::get('application_data1')['ol_sub_id9'] }}" >
                                                                        <input type="text" class="form-control" value="{{ Session::get('application_data1')['ol_sub9']['subject'] }}" readonly> 
                                                                        </td>
                                                                        <td><input type="text" id="olresult9" name="formolres9" class="form-control" value="{{ Session::get('application_data1')['ol_res9'] }}" readonly>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                    <hr class="hr" />
                                    <div class="row mb-3">
                                    <label for="CourseName" class="col-sm-8 col-form-label">G.C.E. Advanced Level (A/L)</label>
                                    </div>
                                    <div class="row mb-3">
                                        
                                        <label for="alschool" class="col-sm-2 col-form-label">School</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="alschool" name="formalschool" value="{{ Session::get('application_data1')['al_school'] }}" readonly>
                                        </div>
                                        <label for="alyear" class="col-sm-1 col-form-label">Year</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="alyear" name="formalyear" value="{{ Session::get('application_data1')['al_year'] }}" readonly>
                                        </div>
                                        <label for="alindex" class="col-sm-2 col-form-label">Index No.</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="alindex" name="formalindex" value="{{ Session::get('application_data1')['al_index'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        
                                        <label for="aldrank" class="col-sm-2 col-form-label">District Rank</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="aldrank" name="formaldrank" value="{{ Session::get('application_data1')['al_drank'] }}" readonly>
                                        </div>
                                        <label for="alirank" class="col-sm-1 col-form-label">Island Rank</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="alirank" name="formalirank" value="{{ Session::get('application_data1')['al_irank'] }}" readonly>
                                        </div>
                                        <label for="alzscore" class="col-sm-2 col-form-label">Z-score</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="alzscore" name="formalzscore" value="{{ Session::get('application_data1')['al_zscore'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                    <label for="alstream" class="col-sm-2 col-form-label">Subject Stream</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="alstream" name="formalstream" class="form-control" value="{{ Session::get('application_data1')['al_stream_id'] }}" >
                                        
                                         
                                        <input type="text" class="form-control" value="{{ optional(Session::get('application_data1')['al_stream'])['stream_name'] ?? '' }}" readonly>

                                    </div>
                                    <div class="container-fluid">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-12 col-xl-10">
                                                <div class="bg-light rounded h-100 p-4">
                                                    <h6 class="mb-2 col-form-label">A/L Exam Results</h6>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Subject Name</th>
                                                                <th scope="col">Result</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td class="col-md-8"><input type="hidden" id="alsubject1" name="formalsub1" class="form-control" value="{{ Session::get('application_data1')['al_sub_id1'] }}" >
                                                                        <input type="text" class="form-control" value="{{ optional(Session::get('application_data1')['al_sub1'])['subject'] ?? ''}}" readonly> 
                                                                </td>
                                                                <td><input type="text" id="alresult1" name="formalres1" class="form-control" value="{{ Session::get('application_data1')['al_res1'] }}" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td class="col-md-8"><input type="hidden" id="alsubject2" name="formalsub2" class="form-control" value="{{ Session::get('application_data1')['al_sub_id2'] }}" >
                                                                        <input type="text" class="form-control" value="{{ optional(Session::get('application_data1')['al_sub2'])['subject'] ?? '' }}" readonly> 
                                                                </td>
                                                                <td><input type="text" id="alresult2" name="formalres2" class="form-control" value="{{ Session::get('application_data1')['al_res2'] }}" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td class="col-md-8"><input type="hidden" id="alsubject3" name="formalsub3" class="form-control" value="{{ Session::get('application_data1')['al_sub_id3'] }}" >
                                                                        <input type="text" class="form-control" value="{{ optional(Session::get('application_data1')['al_sub3'])['subject'] ?? '' }}" readonly> 
                                                                </td>
                                                                <td><input type="text" id="alresult3" name="formalres3" class="form-control" value="{{ Session::get('application_data1')['al_res3'] }}" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">4</th>
                                                                <td class="col-md-8"><input type="hidden" class="form-control" id="alsubject4" name="formalsub4" value="{{ Session::get('application_data1')['al_sub_id4'] }}" >
                                                                        <input type="text" class="form-control" value="{{ optional(Session::get('application_data1')['al_sub4'])['subject'] ?? ''}}" readonly> 

                                                                <td><input type="text" id="alresult4" name="formalres4" class="form-control" value="{{ Session::get('application_data1')['al_res4'] }}" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">5</th>
                                                                <td class="col-md-8"><input type="hidden" class="form-control" id="alsubject5" name="formalsub5" value="{{ Session::get('application_data1')['al_sub_id5'] }}" >
                                                                        <input type="text" class="form-control" value="{{ optional(Session::get('application_data1')['al_sub5'])['subject'] ?? '' }}" readonly> 

                                                                <td><input type="text" class="form-control" id="alresult5" name="formalres5" value="{{ Session::get('application_data1')['al_res5'] }}" readonly></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="hr" />
                                    <h5 class="mb-4" style=text-align:center;>Family Income Statement</h5>

                                    <div class="col-md-1">&nbsp;</div>  
                                     
                                    
                                <div class="row mb-3">
                                    <label for="income" class="col-sm-2 col-form-label">Monthly Family Income</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="income" name="formincome" value="{{ Session::get('application_data1')['income'] }}" readonly>
                                    </div>
                                <div class="col-md-1">&nbsp;</div>
                                    <label for="incomecert" class="col-sm-2 col-form-label" style="color:red;">Income Certificate</label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" id="incomecert" name="formincomecert">
                                    </div>
                                </div>
                                <hr class="hr" />
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">I certified that the above information are correct according to the best of my knowledge. I understands that, submitting false information will lead to disqualify my application for the scholarship program</label>
                                </div>
                                <div class="col-md-1">&nbsp;</div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2" name="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck1">By submitting this application, I indicate my consent for the collection and use of the provided information for the above scholarship program</label>
                                </div>
                                <hr class="hr" />
                                <div class="row mb-3">&nbsp;</div>
                                <div class="row mb-3">
                                    <div class="col-md-3">&nbsp;</div>
                                    <div class='col-md-2'><button type="submit" class="btn btn-primary py-2 px-5 mt-2">Submit</button></div>
                                    <div class="col-md-1">&nbsp;</div>
                                    <div class='col-md-2'><button id="btnform4clear" class="btn btn-primary py-2 px-5 mt-2">Clear</button></div> 
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
var form = document.getElementById("completeform");

// Add an event listener for the "submit" event
form.addEventListener("submit", function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Now you can handle the form submission manually or perform any other actions
    // For example, you can use AJAX to submit the form data asynchronously
});


    </script>

</body>

</html>