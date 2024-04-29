<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlExam;
use App\Models\AlResults;
use App\Models\AlStream;
use App\Models\AlSubjects;
use App\Models\Courses;
use App\Models\CourseTown;
use App\Models\District;
use App\Models\DivisionalSecretariat;
use App\Models\FamilyIncome;
use App\Models\Institutes;
use App\Models\MaxStudents;
use App\Models\OlExam;
use App\Models\OlResults;
use App\Models\OlSubjects;
use App\Models\PersonalInformation;
use App\Models\Province;
use App\Models\User;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function view_course($id)
    { 

        return view('course'.$id);
    }

    public function view_form()
    {
        $getInstitutes = Institutes::select('id', 'institute')->get()->toArray();

        return view('admin.index',compact('getInstitutes'));
    }

    
    public function getCourses($id)
    {

        $courses = Courses::where('institute_id', '=', $id)->pluck('course_name', 'id');

        return response()->json($courses);
    }

    public function getLocation($id) 
    {

        $location = CourseTown::where('course_id', '=', $id)->pluck('town', 'id');

        return response()->json($location);
    }

    public function getDistrict($id)
    {

        $districts = District::where('province_id', '=', $id)->pluck('district', 'id');

        return response()->json($districts);
    }

    public function getDsoffice($id)
    {

        $dsoffices = DivisionalSecretariat::where('district_id', '=', $id)->pluck('ds_office', 'id');

        return response()->json($dsoffices);
    }
    
    public function checkAvail(Request $request) 
    {
        $request->validate([
            'forminstitute' => 'required|max:100',
            'formcourses' => 'required|max:100',
            'formlocation' => 'required|max:100',
            'formnic' => 'required|numeric|digits:12',
        ], [
            'forminstitute.required' => 'The institute field is required.',
            'formcourses.required' => 'The courses field is required.',
            'formlocation.required' => 'The location field is required.',
            'formnic.required' => 'The NIC field is required.',
            'formnic.numeric' => 'The NIC field must contain only numbers.',
            'formnic.digits' => 'The NIC field must be exactly :digits digits.',
        ]);


        $institute = $request->forminstitute;
        $course = $request->formcourses;
        $location = $request->formlocation;
        $nic = $request->formnic;

        //check if submitted nic is existing
        $checknic = PersonalInformation::where('nic_number', '=', $nic)
        ->where('batch_number', '=', '202405')
        ->get()
        ->first();

        //new nic is converting to old nic and vice versa and check if there are existing
                   
        $nic_old = '';
        $nic_new1 = '';
        $nic_new2 = '';
        $checknicnew1 = '';
        $checknicnew2 = '';
        $checknicold = '';
        $decade_s = substr($nic,0,2);
        $decade = (int) $decade_s;
            if($decade == 0) {
                $nic_new1 = "19".substr($nic,3,5).'0'.substr($nic,8,4);
                $nic_new2 = "19".substr($nic,3,5).'1'.substr($nic,8,4);
                $checknicnew1 = PersonalInformation::where('nic_number', $nic_new1)->first();
                $checknicnew2 = PersonalInformation::where('nic_number', $nic_new2)->first();
            }
            else {
                        
                $nic_old = "000".substr($nic,2,5).substr($nic,8,4);
                $checknicold = PersonalInformation::where('nic_number', $nic_old)->first();
            }

            //dd($checknic, $checknicnew1, $checknicnew2, $checknicold);
        //check whether the entered nic is already in the system
        if ((!empty($checknic))||(!empty($checknicnew1))||(!empty($checknicnew2))||(!empty($checknicold))){
            return view('nic_exist', compact('checknic','checknicnew1','checknicnew2','checknicold'));
        }
        else{
            //check courses and locations
            $checkcoursecount = PersonalInformation::where('course_id', '=', $course)
            ->where('course_town_id', '=', $location)
            ->get()
            ->count();

            //check the maximum number of students for the selected course and town
            $checkmaxcount = MaxStudents::where('course_id', '=', $course)
            ->where('course_town_id', '=', $location)
            ->value('maxstudents');
            
            //check whether the selected course quorta is full
            if ($checkcoursecount >= $checkmaxcount){
                return back()->with('message', 'Relevant quota for the Course / Course-Location is full. Please select another Course or Course-Location');
            }


            else{

                //get the institute name and id
                // $institute = new Institutes();
                // $selectedInstitute = $institute->getInstitute($institute)->first();

                $selectedinstitute = Institutes::where('id', '=', $institute)
                ->select('id','institute')
                ->get()
                ->first();

                //get the course name and id
                $selectedcourse = Courses::where('id', '=', $course)
                ->select('id','course_name')
                ->get()
                ->first();

                //get the institute name and id
                $selectedlocation = CourseTown::where('id', '=', $location)
                ->select('id','town')
                ->get()
                ->first();

                //Get provinces
                $getProvinces = Province::select('id', 'province')->get()->toArray();

                 //get all the data from inputs
                $userdatapage = [
                    'institute_id' => $request->forminstitute,
                    'institute' => $selectedinstitute,
                    'course_id' => $request->formcourse,
                    'course_name' => $selectedcourse,
                    'course_town_id' => $request->formlocation,
                    'town' => $selectedlocation,
                    'nic_number' => $request->formnic,
                ];

                //Store the array in the session
                Session::put('application_data2', $userdatapage);

                return view('application',compact('selectedinstitute','selectedcourse','selectedlocation','nic','getProvinces'));
            }
        }

    
    }
    
    public function educationalQual(Request $request) 
    {
        $request->validate([

            'formnic' => 'required|numeric|digits:12',
            'formprovince' => 'required',
            'formdictrict' => 'required',
            'formdsoffice' => 'required',
            'formfullname' => ['required', 'max:100', 'regex:/^[A-Za-z\s]*$/'],
            'formnamewithini' => ['required', 'max:100', 'regex:/^[A-Za-z\s.]*$/'],
            'formdob' => 'required|date|before:2010-01-01',
            'formgender' => 'required',
            'formaddress' => ['required','max:200','regex:/^[a-zA-Z0-9\s.,#-]+$/'],
            'formmobile' => 'required|regex:/^07\d{8}$/|digits:10',
            
        ], [

            'formfullname.regex' => 'The Full Name field must contain only letters and spaces.',
            'formnamewithini.regex' => 'The Name with Initials field must contain only letters, spaces, and dots.',
            'formdob.before' => 'Please enter a date before 2010.01.01',
            'formdob.required' => 'Date of Birth field is required',
            'formaddress.required' => 'Address field is required',
            'formaddress.regex' => 'Please enter a valid address',           
            'formnic.required' => 'The NIC field is required.',
            'formnic.numeric' => 'The NIC field must contain only numbers.',
            'formnic.digits' => 'The NIC field must be exactly :digits digits.',
            'formmobile.required' => 'The Mobile Number field is required.',
            'formmobile.regex' => 'Please enter e valid mobile number',
                          
        ]);


        // Store the array in the session
        // Session::put('application_data', $userdatapage1);
       
        $subject1 = OlSubjects::select('id', 'subject')->where('category', '=', '1')->get();
        $subject2 = OlSubjects::select('id', 'subject')->where('category', '=', '2')->get();
        $subject3 = OlSubjects::select('id', 'subject')->where('category', '=', '3')->get();
        $subject4 = OlSubjects::select('id', 'subject')->where('category', '=', '4')->get();
        $subject5 = OlSubjects::select('id', 'subject')->where('category', '=', '5')->get();
        $subject6 = OlSubjects::select('id', 'subject')->where('category', '=', '6')->get();
        $subject7 = OlSubjects::select('id', 'subject')->where('category', '=', '7')->get();
        $subject8 = OlSubjects::select('id', 'subject')->where('category', '=', '8')->get();
        $subject9 = OlSubjects::select('id', 'subject')->where('category', '=', '9')->get();

        $alstreams = AlStream::select('id', 'stream_name')->get();

    
                //$selectInstitute = new Institutes
                $selectedinstitute = Institutes::where('id', '=', $request->forminstitute)
                // $selectedcourse = Courses::where('id', '=', $course)
                ->select('id','institute')
                ->get()
                ->first();

                //get the course name and id
                $selectedcourse = Courses::where('id', '=', $request->formcourse)
                ->select('id','course_name')
                ->get()
                ->first();

                //get the institute name and id
                $selectedlocation = CourseTown::where('id', '=', $request->formlocation)
                ->select('id','town')
                ->get()
                ->first();

                //get the province
                $selectedProvince = Province::where('id', '=', $request->formprovince)
                ->select('id','province')
                ->get()
                ->first();

                //get the District
                $selectedDistrict = District::where('id', '=', $request->formdictrict)
                ->select('id','district')
                ->get()
                ->first();

                //get the DS Office
                $selectedDsOffice = DivisionalSecretariat::where('id', '=', $request->formdsoffice)
                ->select('id','ds_office')
                ->get()
                ->first();

                //dd($selectedinstitute,$selectedcourse,$selectedlocation);

        //get all the data from inputs
        $userdatapage1 = [
            'institute_id' => $request->forminstitute,
            'institute' => $selectedinstitute,
            'course_id' => $request->formcourse,
            'course_name' => $selectedcourse,
            'course_town_id' => $request->formlocation,
            'town' => $selectedlocation,
            'nic_number' => $request->formnic,
            'provincial_id' => $request->formprovince,
            'province' => $selectedProvince,
            'district_id' => $request->formdictrict,
            'district' => $selectedDistrict,
            'ds_id' => $request->formdsoffice,
            'ds_office' => $selectedDsOffice,
            'full_name' => $request->formfullname,
            'name_with_initials' => $request->formnamewithini,
            'date_of_birth' => $request->formdob,
            'gender' => $request->formgender,
            'address' => $request->formaddress,
            'email' => $request->formemail,
            'mobile' => $request->formmobile,
            'land_line' => $request->formmland,
        ];

        //Store the array in the session
        Session::put('application_data', $userdatapage1);

        // Return view for the first page

        return view('application2',compact('subject1','subject2','subject3','subject4','subject5','subject6',
                'subject7','subject8','subject9','alstreams'));


        // // Define an array to hold subjects for each category
        // $olsubjects = [];

        // // Loop through categories 1 to 9
        // for ($i = 1; $i <= 9; $i++) {
        //     // Fetch subjects for the current category
        //     $olsubjects[$i] = OlSubjects::select('id', 'subject')->where('category', '=', $i)->get()->toArray();
        // }

        // // Fetch AL streams
        // $alstreams = AlStream::select('id', 'stream_name')->get();

        // // Define an array to hold AL subjects for each stream
        // $alSubjects = [];

        // // Loop through AL streams
        // foreach ($alstreams as $stream) {
        //     // Fetch AL subjects for the current stream
        //     $alSubjects[$stream->id] = AlSubjects::select('id', 'subject')->where('stream_id', '=', $stream->id)->get()->toArray();
        // }

        // //dd($olsubjects,$alstreams,$alSubjects);
        // // Return view with compacted data
        //return view('application2', compact('olsubjects', 'alstreams', 'alSubjects'));;


    }

    public function completeApp(Request $request) 
    {

        $request->validate([

            'formolschool' => ['required', 'max:100', 'regex:/^[A-Za-z\s.\/]*$/'],
            'formolyear' => 'required|numeric|digits:4',
            'formolindex' => 'required|numeric|digits_between:4,8',
            'formincome' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            
            
        ], [

            'formolschool.regex' => 'The O/L School Name field must contain only letters spaces dots and slashes (/).',
            'formolschool.required' => 'The O/L School Name should be provided',
            'formolyear' => 'Enter the year you sat for G.C.E.O/L exam',
            'formolindex' => 'Please enter your O/L index number',
            'formalschool.regex' => 'The A/L School Name field must contain only letters spaces dots and slashes (/).',
            'formalschool.required' => 'The A/L School Name should be provided',
            'formincome' => 'Enter your monthly family income',
                          
        ]);

        $ol_subjects = [];
        
        for ($i = 1; $i <= 9; $i++) {
        //get O/L Subjects
        $ol_subjects[$i] = OlSubjects::where('id', '=', $request->input('formolsub' . $i))
        ->select('id','subject')
        ->get()
        ->first();
        }

        $al_subjects = [];
        
        for ($i = 1; $i <= 3; $i++) {
        //get A/L/Subjects
        $al_subjects[$i] = AlSubjects::where('id', '=', $request->input('formalsub' . $i))
        ->select('id','subject')
        ->get()
        ->first();
        }

        $alstream = AlStream::where('id', '=', $request->formalstream,)
        ->select('id','stream_name')
        ->get()
        ->first();

        //get the genEng
        $genEng = AlSubjects::where('id', '=', $request->formalsub4)
        ->select('id','subject')
        ->get()
        ->first();

        //get the comTest
        $comTest = AlSubjects::where('id', '=', $request->formalsub5)
        ->select('id','subject')
        ->get()
        ->first();

        
        $userdatapage2 = [
            'ol_school' => $request->formolschool,
            'ol_year' => $request->formolyear,
            'ol_index' => $request->formolindex,
            'ol_sub_id1' => $request->formolsub1,
            'ol_sub_id2' => $request->formolsub2,
            'ol_sub_id3' => $request->formolsub3,
            'ol_sub_id4' => $request->formolsub4,
            'ol_sub_id5' => $request->formolsub5,
            'ol_sub_id6' => $request->formolsub6,
            'ol_sub_id7' => $request->formolsub7,
            'ol_sub_id8' => $request->formolsub8,
            'ol_sub_id9' => $request->formolsub9,
            'ol_sub1' => $ol_subjects[1],
            'ol_sub2' => $ol_subjects[2],
            'ol_sub3' => $ol_subjects[3],
            'ol_sub4' => $ol_subjects[4],
            'ol_sub5' => $ol_subjects[5],
            'ol_sub6' => $ol_subjects[6],
            'ol_sub7' => $ol_subjects[7],
            'ol_sub8' => $ol_subjects[8],
            'ol_sub9' => $ol_subjects[9],
            'ol_res1' => $request->formolres1,
            'ol_res2' => $request->formolres2,
            'ol_res3' => $request->formolres3,
            'ol_res4' => $request->formolres4,
            'ol_res5' => $request->formolres5,
            'ol_res6' => $request->formolres6,
            'ol_res7' => $request->formolres7,
            'ol_res8' => $request->formolres8,
            'ol_res9' => $request->formolres9,
            'al_school' => $request->formalschool,
            'al_year' => $request->formalyear,
            'al_index' => $request->formalindex,
            'al_drank' => $request->formaldrank,
            'al_irank' => $request->formalirank,
            'al_zscore' => $request->formalzscore,
            'al_stream_id' => $request->formalstream,  
            'al_stream' => $alstream,
            'al_sub_id1' => $request->formalsub1,
            'al_sub_id2' => $request->formalsub2,
            'al_sub_id3' => $request->formalsub3,
            'al_sub_id4' => $request->formalsub4,
            'al_sub_id5' => $request->formalsub5,
            'al_sub1' => $al_subjects[1],
            'al_sub2' => $al_subjects[2],
            'al_sub3' => $al_subjects[3],
            'al_sub4' => $genEng,
            'al_sub5' => $comTest,
            'al_res1' => $request->formalres1,
            'al_res2' => $request->formalres2,
            'al_res3' => $request->formalres3,
            'al_res4' => $request->formalres4,
            'al_res5' => $request->formalres5,
            'income' => $request->formincome,
        ];

        //Store the array in the session
        Session::put('application_data1', $userdatapage2);

        if (session()->has('application_data') && session()->has('application_data1')) {
            // Access session data
            $applicationData = session('application_data');
            $applicationData1 = session('application_data1');
        

        } else {
            return view("view_form")->with("error", "Your Session has Expired");
        }
        

        return view('completeapp', ['applicationData' => $applicationData]);

    }

    //Get al Subjects when selecting the stream
    public function getSubjects($id)
    {

        $alsubjects = AlSubjects::where('stream_id', $id)
            ->whereNotIn('subject', ['General English','Common General Test'])
            ->pluck('subject', 'id');

        return response()->json($alsubjects);
    }
     

    public function getGenEnglish($id)
    {

        $genenglish = AlSubjects::where('stream_id', $id)
            ->where('subject', ['General English'])
            ->pluck('subject', 'id');

        return response()->json($genenglish);
    }
    
    public function getComTest($id)
    {

        $comtest = AlSubjects::where('stream_id', $id)
            ->where('subject', ['Common General Test'])
            ->pluck('subject', 'id');

        return response()->json($comtest);
    }

    public function submitApp(Request $request)
    {
        $request->validate([
            'formniccopy' => 'required|file|mimes:pdf|max:5000',
            'formincomecert' => 'required|file|mimes:pdf|max:5000',
        ], [
            'formniccopy' => 'Please attach a PDF fime with maximum 5mb of size.',
            'formincomecert' => 'Please attach a PDF fime with maximum 5mb of size.',
        ]);

        $course = $request->formcourse;
        $location = $request->formlocation;

         //check courses and locations
         $checkcoursecount = PersonalInformation::where('course_id', '=', $course)
         ->where('course_town_id', '=', $location)
         ->get()
         ->count();

         //check the maximum number of students for the selected course and town
         $checkmaxcount = MaxStudents::where('course_id', '=', $course)
         ->where('course_town_id', '=', $location)
         ->value('maxstudents');
         
         //check whether the selected course quorta is full
         if ($checkcoursecount >= $checkmaxcount){
            Session::flush();
            return redirect()->route('view.form')->with('message', 'Relevant quota for the Course / Course-Location is full. Please select another Course or Course-Location');
         }

         else{

        $nextNo = PersonalInformation::generateApplicationNo();


        // Save the file to the storage
        $nic = $request->file('formniccopy');

        $nicpath = $nic->storeAs('uploads/nic_docs', 'nic-' . $nextNo . '.' . $nic->getClientOriginalExtension(), 'public');

        $income_certificate = $request->file('formincomecert');

        $income_docs = $income_certificate->storeAs('uploads/income_certificates', 'income_cert-' . $nextNo . '.' . $income_certificate->getClientOriginalExtension(), 'public');

        // Check if a file was uploaded
        if ($nicpath && $income_docs ) {

   
            //save to DB
            $personalinformation = PersonalInformation::create([
                'full_name' => $request->formfullname,
                'name_with_initials' => $request->formnamewithini,
                'date_of_birth' => $request->formdob,
                'gender' => $request->formgender,
                'nic_number' => $request->formnic,
                'address' => $request->formaddress,
                'email' => $request->formemail,
                'mobile' => $request->formmobile,
                'land_line' => $request->formmland,
                'nic_doc_path' => $nicpath,
                'batch_number' => "202405",
                'provincial_id' => $request->formprovince,
                'district_id' => $request->formdistrict,
                'ds_id' => $request->formdsoffice,
                'institute_id' => $request->forminstitute,
                'course_id' => $request->formcourse,
                'course_town_id' => $request->formlocation,
                'app_no' => $nextNo
            ]);

            $personal_information_id = $personalinformation->id;

            $familyIncome = FamilyIncome::create([
                'monthly_income' => $request->formincome,
                'income_certificate' => $income_docs,
                'personal_information_id' => $personal_information_id
            ]);

            $olexam = OlExam::create([
                'school' => $request->formolschool,
                'year' => $request->formolyear,
                'index_no' => $request->formolindex,
                'personal_information_id' => $personal_information_id
            ]);

            $olexamid = $olexam->id;


            for ($i=1; $i<=9; $i++){
            $olresults = OlResults::create([
                'ol_exam_id' => $olexamid,
                'ol_sub_id' => $request->input("formolsub$i"),
                'result' => $request->input("formolres$i")
            ]);    
        }
        
        if(!empty($request->formalschool)){

        $alexam = AlExam::create([
            'school' => $request->formalschool,
            'year' => $request->formalyear,
            'index_no' => $request->formalindex,
            'district_rank' => $request->formaldrank,
            'island_rank' => $request->formalirank,
            'z_score' => $request->formalzscore,
            'stream_id' => $request->formalstream,
            'personal_information_id' => $personal_information_id
        ]);

        $alexamid = $alexam->id;

            for ($y=1; $y<=5; $y++){
            $alresults = AlResults::create([
                'al_exam_id' => $alexamid,
                'al_sub_id' => $request->input("formalsub$y"),
                'stream_id' => $request->formalstream,
                'result' => $request->input("formalres$y")
            ]);
        }
    }

        $selectedcourse = Courses::where('id', '=', $request->formcourse)
                ->select('course_name')
                ->get()
                ->first();
            Session::flush();
            return view('successpage', compact('nextNo','selectedcourse'));

        } 
        else {
            return view('errorpage');
        }
    }
    }
}
