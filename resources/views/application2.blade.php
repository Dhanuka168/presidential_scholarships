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
                            <div class="progress-bar progress-bar-striped active" role="progressbar"aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%">
                                75%
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
                            <h5 class="mb-4" style=text-align:center;>Educational Qualification</h5>
                            <div class="row">&nbsp;</div>
                            <!-- Form stars -->
                                <form action="{{route('completeApp')}}" method="POST"id="applicationform2" name="applicationform2">
                                @csrf
                          
                                    <hr class="hr" />
                                    <div class="row mb-3">
                                    <label for="CourseName" class="col-sm-8 col-form-label">G.C.E. Ordinary Level (O/L)</label>
                                    </div>
                                    <div class="row mb-3">
                                        
                                        <label for="OlSchool" class="col-sm-2 col-form-label">School<span style="color: red;"> *</span></label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="olschool" name="formolschool" maxlength="60">
                                        </div>
                                        <label for="OlYear" class="col-sm-1 col-form-label">Year<span style="color: red;"> *</span></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="olyear" name="formolyear" maxlength="4">
                                        </div>
                                        <label for="OlIndex" class="col-sm-2 col-form-label">Index No.<span style="color: red;"> *</span></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="olindex" name="formolindex" maxlength="8">
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
                                                                    <th scope="col">Subject Name<span style="color: red;"> *</span></th>
                                                                    <th scope="col">Result<span style="color: red;"> *</span></th>
                                                                </tr>
                                                            </thead>
   
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td><select id="olsubject1" name="formolsub1" class="form-control" required>
                                                                            <option value="" disabled selected>Select Subject</option>
                                                                            @foreach ($subject1 as $subject)
                                                                            <option value="{{$subject['id']}}">{{$subject['subject']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><select id="olresult1" name="formolres1" class="form-control" required>
                                                                            <option value="" disabled selected>Select Result</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="S">S</option>
                                                                            <option value="W">W</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td><select id="olsubject2" name="formolsub2" class="form-control" required>
                                                                            <option value="" disabled selected>Select Subject</option>
                                                                            @foreach ($subject2 as $subject)
                                                                            <option value="{{$subject['id']}}">{{$subject['subject']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><select id="olresult2" name="formolres2" class="form-control" required>
                                                                            <option value="" disabled selected>Select Result</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="S">S</option>
                                                                            <option value="W">W</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td><select id="olsubject3" name="formolsub3" class="form-control" required>
                                                                            <option value="" disabled selected>Select Subject</option>
                                                                            @foreach ($subject3 as $subject)
                                                                            <option value="{{$subject['id']}}">{{$subject['subject']}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                    </td>
                                                                    <td>
                                                                        <select id="olresult3" name="formolres3" class="form-control" required>
                                                                            <option value="" disabled selected>Select Result</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="S">S</option>
                                                                            <option value="W">W</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                 <tr>
                                                                    <th scope="row">4</th>
                                                                    <td><select id="olsubject4" name="formolsub4" class="form-control" required>
                                                                            <option value="" disabled selected>Select Subject</option>
                                                                            @foreach ($subject4 as $subject)
                                                                            <option value="{{$subject['id']}}">{{$subject['subject']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><select id="olresult4" name="formolres4" class="form-control" required>
                                                                            <option value="" disabled selected>Select Result</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="S">S</option>
                                                                            <option value="W">W</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">5</th>
                                                                    <td><select id="olsubject5" name="formolsub5" class="form-control" required>
                                                                            <option value="" disabled selected>Select Subject</option>
                                                                            @foreach ($subject5 as $subject)
                                                                            <option value="{{$subject['id']}}">{{$subject['subject']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><select id="olresult5" name="formolres5" class="form-control" required>
                                                                            <option value="" disabled selected>Select Result</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="S">S</option>
                                                                            <option value="W">W</option>
                                                                        </select>
                                                                     </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">6</th>
                                                                    <td><select id="olsubject6" name="formolsub6" class="form-control" required>
                                                                            <option value="" disabled selected>Select Subject</option>
                                                                            @foreach ($subject6 as $subject)
                                                                            <option value="{{$subject['id']}}">{{$subject['subject']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><select id="olresult6" name="formolres6" class="form-control" required>
                                                                            <option value="" disabled selected>Select Result</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="S">S</option>
                                                                            <option value="W">W</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">7</th>
                                                                    <td><select id="olsubject7" name="formolsub7" class="form-control" required>
                                                                            <option value="" disabled selected>Select Subject</option>
                                                                            @foreach ($subject7 as $subject)
                                                                            <option value="{{$subject['id']}}">{{$subject['subject']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><select id="olresult7" name="formolres7" class="form-control" required>
                                                                            <option value="" disabled selected>Select Result</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="S">S</option>
                                                                            <option value="W">W</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">8</th>
                                                                    <td><select id="olsubject8" name="formolsub8" class="form-control" required>
                                                                            <option value="" disabled selected>Select Subject</option>
                                                                            @foreach ($subject8 as $subject)
                                                                            <option value="{{$subject['id']}}">{{$subject['subject']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><select id="olresult8" name="formolres8" class="form-control" required>
                                                                            <option value="" disabled selected>Select Result</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="S">S</option>
                                                                            <option value="W">W</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">9</th>
                                                                    <td><select id="olsubject9" name="formolsub9" class="form-control" required>
                                                                            <option value="" disabled selected>Select Subject</option>
                                                                            @foreach ($subject9 as $subject)
                                                                            <option value="{{$subject['id']}}">{{$subject['subject']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><select id="olresult9" name="formolres9" class="form-control" required>
                                                                            <option value="" disabled selected>Select Result</option>
                                                                            <option value="A">A</option>
                                                                            <option value="B">B</option>
                                                                            <option value="C">C</option>
                                                                            <option value="S">S</option>
                                                                            <option value="W">W</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <hr class="hr" />
                                    <div class="row mb-3">
                                    <label for="CourseName" class="col-sm-8 col-form-label">G.C.E. Advanced Level (A/L)</label>
                                    </div>
                                    <div class="row mb-3">
                                        
                                        <label for="AlSchool" class="col-sm-2 col-form-label">School</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="alschool" name="formalschool" maxlength="60">
                                        </div>
                                        <label for="AlYear" class="col-sm-1 col-form-label">Year</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="alyear" name="formalyear" maxlength="4">
                                        </div>
                                        <label for="AlIndex" class="col-sm-2 col-form-label">Index No.</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="alindex" name="formalindex" maxlength="8">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        
                                        <label for="AlDrank" class="col-sm-2 col-form-label">District Rank</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="aldrank" name="formaldrank" maxlength="5">
                                        </div>
                                        <label for="AlIrank" class="col-sm-1 col-form-label">Island Rank</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="alirank" name="formalirank" maxlength="5">
                                        </div>
                                        <label for="AlZscore" class="col-sm-2 col-form-label">Z-score</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="alzscore" name="formalzscore" maxlength="6">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                    <label for="AlStream" class="col-sm-2 col-form-label">Subject Stream</label>
                                    <div class="col-sm-10">
                                        <select id="alstream" name="formalstream" class="form-control">
                                            <option value="" disabled selected>Select Subject</option>
                                            @foreach ($alstreams as $alstream)
                                            <option value="{{$alstream['id']}}">{{$alstream['stream_name']}}</option>
                                            @endforeach
                                        </select>
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
                                                                <td class="col-md-8"><select id="alsubject1" name="formalsub1" class="form-control">
                                                                        <option value="" disabled selected>Select Subject</option>
                                                                    </select>
                                                                </td>
                                                                <td><select id="alresult1" name="formalres1" class="form-control">
                                                                        <option value="" disabled selected>Select Result</option>
                                                                        <option value="A">A</option>
                                                                        <option value="B">B</option>
                                                                        <option value="C">C</option>
                                                                        <option value="S">S</option>
                                                                        <option value="W">W</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td class="col-md-8"><select id="alsubject2" name="formalsub2" class="form-control">
                                                                        <option value="" disabled selected>Select Subject</option>
                                                                    </select>
                                                                </td>
                                                                <td><select id="alresult2" name="formalres2" class="form-control">
                                                                        <option value="" disabled selected>Select Result</option>
                                                                        <option value="A">A</option>
                                                                        <option value="B">B</option>
                                                                        <option value="C">C</option>
                                                                        <option value="S">S</option>
                                                                        <option value="W">W</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td class="col-md-8"><select id="alsubject3" name="formalsub3" class="form-control" >
                                                                        <option value="" disabled selected>Select Subject</option>
                                                                    </select>
                                                                </td>
                                                                <td><select id="alresult3" name="formalres3" class="form-control" >
                                                                        <option value="" disabled selected>Select Result</option>
                                                                        <option value="A">A</option>
                                                                        <option value="B">B</option>
                                                                        <option value="C">C</option>
                                                                        <option value="S">S</option>
                                                                        <option value="W">W</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">4</th>
                                                                <td class="col-md-8"><select id="alsubject4" name="formalsub4" class="form-control" >
                                                                        <option value="" disabled selected>Select Subject</option>
                                                                    </select></td>
                                                                <td><select id="alresult4" name="formalres4" class="form-control" >
                                                                        <option value="" disabled selected>Select Result</option>
                                                                        <option value="A">A</option>
                                                                        <option value="B">B</option>
                                                                        <option value="C">C</option>
                                                                        <option value="S">S</option>
                                                                        <option value="W">W</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">5</th>
                                                                <td class="col-md-8"><select id="alsubject5" name="formalsub5" class="form-control" >
                                                                        <option value="" disabled selected>Select Subject</option>
                                                                    </select></td>
                                                                <td><input type="text" class="form-control" id="alresult5" name="formalres5" maxlength="3"></td>
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
                                    <label for="Address" class="col-sm-2 col-form-label">Monthly Family Income Rs.<span style="color: red;"> *</span></label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="income" name="formincome" required maxlength="10">
                                    </div>
                                <div class="col-md-1">&nbsp;</div>
                                    <label for="email" class="col-sm-2 col-form-label">Income Certificate</label>
                                    <div class="col-sm-4">
                                    <p class="form-control" style="color:red;">Need to attach Income Certificate at the last page.</p>
                                    </div>
                                </div>
                                <hr class="hr" />
                                <!-- <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">I certified that the above information are correct according to the best of my knowledge. I understands that, submitting false information will lead to disqualify my application for the scholarship program</label>
                                </div>
                                <div class="col-md-1">&nbsp;</div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">By submitting this application, I indicate my consent for the collection and use of the provided information for the above scholarship program</label>
                                </div> -->
                                <!-- <hr class="hr" /> -->
                                <div class="row mb-3">&nbsp;</div>
                                <div class="row mb-3">
                                    <div class="col-md-3">&nbsp;</div>
                                    <div class='col-md-2'><button type="submit" class="btn btn-primary py-2 px-5 mt-2">View</button></div>
                                    <div class="col-md-1">&nbsp;</div>
                                    <div class='col-md-2'><button id="btnform3clear" class="btn btn-primary py-2 px-5 mt-2">Clear</button></div> 
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
            $('#alstream').change(function() {       
                var streamId = $(this).val(); 
                var genenglish = $(this).val(); 
                var comtest = $(this).val();   
                $.get("{{ route('getSubjects', ':id') }}".replace(':id', streamId), function(data) {
                    $('#alsubject1').empty();
                    $.each(data, function(key, value) {
                    $('#alsubject1').append('<option value="' + key + '">' + value + '</option>');
                    });

                    $('#alsubject2').empty();
                    $.each(data, function(key, value) {
                    $('#alsubject2').append('<option value="' + key + '">' + value + '</option>');
                    });

                    $('#alsubject3').empty();
                    $.each(data, function(key, value) {
                    $('#alsubject3').append('<option value="' + key + '">' + value + '</option>');
                    });
                });

                $.get("{{ route('getGenEnglish', ':id') }}".replace(':id', genenglish), function(data) {
                    $('#alsubject4').empty();
                    $.each(data, function(key, value) {
                    $('#alsubject4').append('<option value="' + key + '">' + value + '</option>');
                    });

                });
                $.get("{{ route('getComTest', ':id') }}".replace(':id', comtest), function(data) {
                    $('#alsubject5').empty();
                    $.each(data, function(key, value) {
                    $('#alsubject5').append('<option value="' + key + '">' + value + '</option>');
                    });

                });
            });


            </script>

</body>

</html>