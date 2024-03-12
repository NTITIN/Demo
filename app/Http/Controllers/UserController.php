<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use Excel;
use Carbon\Carbon;
use Hash;
use Session;
use App\Models\attendance;
use App\Models\ImportCSV;
use App\Models\User;
use App\Models\IPCount;
use Illuminate\Support\Facades\DB;
use App\Models\LeadDetails;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DataTables;

class UserController extends Controller
{
    function index()
    {
        return view('login');
    }

    function registration()
    {
        return view('registration');
    }

    function validate_registration(Request $request)
    {

        $data = $request->all();

        $validatedData = $request->validate([
            'name' => ['required', 'unique:posts', 'max:255'],
            'email' => ['required'],
            'password' => 'required|confirmed|min:6'
        ]);
        User::create([
            'name'  =>  $data['name'],
            'email_address' =>  $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        
        return redirect('login')->with('success', 'Registration Completed, now you can login');

    }

    function validate_login(Request $request)
    {
    
        $request->validate([
            'email_address' =>  'required',
            'password'  =>  'required'
        ]);
        
        $credentials = $request->only('email_address','password');
        
        if(Auth::attempt($credentials))
        {
            return redirect('dashboard'); 
        }

        return redirect('login')->with('success', 'Login details are not valid');

    }

    function dashboard()
    {
        // $punch_in = attendance::where('user_id', Auth::User()->id)->first();
        
        if(Auth::check())
        {
            return view('dashboard');
        }

        return redirect('login')->with('success', 'you are not allowed to access');

    }

    function logout()
    {

        Session::flush();

        Auth::logout();

        return Redirect('login');

    }

    // Add links
    function add_leads()
    {

        return view('add_leads');

    }

    
    // function for redirect to edit lead details
    function editlead (Request $request,$id)
    {
        $leads = LeadDetails::findOrFail($id);

        return view('editleads', compact('leads'));
    }


    // function for redirect to update function
    public function updateleads(Request $request, $id)
    {
        $lead = LeadDetails::findOrFail($id);
        
        // Validate request data
        
        $lead->update($request->all());

        return redirect()->route('view_leads', $lead->id)->with('success', 'Lead details updated successfully...');
    }


    // function for lead details stored 
    function leaddetails(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'track_date' => 'required|date',
            'camp_name' => 'required|string',
            'agent_name' => 'required|string',
            'email_address' => 'required|email',
            'salution' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'jobtitle' => 'required|string',
            'prospects_link' => 'required|string',
            'comp_name' => 'required|string',
            'comp_link' => 'required|string',
            'phone_no' => 'required|string',
            'direct_no' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            'country' => 'required|string',
            'emp_size' => 'required|string',
            'website' => 'required|string',
            'asset_title' => 'required|string',
            'timestamp' => 'required|date_format:H:i', // Assuming you want time in "HH:MM" format
            'agent_remark' => 'required|string',
            'address_link' => 'required|string',
            'custom_quest1' => 'required|string',
            'custom_quest2' => 'required|string',
            'custom_quest3' => 'required|string',
            'custom_quest4' => 'required|string',
            'custom_quest5' => 'required|string',
        ]);

        // If validation fails, return back with errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // If validation passes, proceed to create the LeadDetails instance
        $user_id = Auth::id();
        $store = LeadDetails::create([
            'user_id' => $user_id,
            'date'  =>  $request->input('track_date'),
            'camp_name'  =>  $request->input('camp_name'),
            'agent_name' =>  $request->input('agent_name'),
            'email_address' =>  $request->input('email_address'),
            'salution' =>  $request->input('salution'),
            'first_name' =>  $request->input('first_name'),
            'last_name' =>  $request->input('last_name'),
            'jobtitle' =>  $request->input('jobtitle'),
            'prospects_link' =>  $request->input('prospects_link'),
            'comp_name' =>  $request->input('comp_name'),
            'comp_link' =>  $request->input('comp_link'),
            'phone_no' =>  $request->input('phone_no'),
            'direct_no' =>  $request->input('direct_no'),
            'address' =>  $request->input('address'),
            'city' =>  $request->input('city'),
            'industry' =>  $request->input('industry'),
            'state' =>  $request->input('state'),
            'zipcode' =>  $request->input('zipcode'),
            'country' =>  $request->input('country'),
            'emp_size' =>  $request->input('emp_size'),
            'website' =>  $request->input('website'),
            'asset_title' =>  $request->input('asset_title'),
            'timestamp' =>  $request->input('timestamp'),
            'agent_remark' =>  $request->input('agent_remark'),
            'address_link' =>  $request->input('address_link'),
            'custom_quest1' =>  $request->input('custom_quest1'),
            'custom_quest2' =>  $request->input('custom_quest2'),
            'custom_quest3' =>  $request->input('custom_quest3'),
            'custom_quest4' =>  $request->input('custom_quest4'),
            'custom_quest5' =>  $request->input('custom_quest5'),
        ]);

        // Redirect with success message
        return redirect('/view_leads')->with('success', 'Lead Details stored successfully...');
    }


    // function for update lead details to datatable
    public function view_leads(Request $request)
    {

        if ($request->ajax()) {
            
            $data = LeadDetails::where('user_id',Auth::User()->id)->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $editBtn = '<a href="'.route('lead.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                        $deleteBtn = '<a href="'.route('lead.delete', $row->id).'" class="delete btn btn-danger delete-btn btn-sm">Delete</a>';
                        
                        return $editBtn . ' ' . $deleteBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('dashboard');
    }

    // function for delete lead details to datatable
    public function deleteleads(Request $request, $id)
    {
        $delete = LeadDetails::where('id', $id)->delete();


        return redirect()->back()->with('success', 'Lead deleted successfully');
    }

    public function leadexport(Request $request)
    {
        $user_id = $request->user_id;
        $fileName = Auth::user()->name.' All Leads.csv';
        $tasks = LeadDetails::where('user_id', Auth::user()->id)->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Date', 'First Name', 'Last Name', 'Contact No.', 'Email ID', 'Company Name', 'Designation', 'Agent Name');

        $callback = function() use ($tasks, $columns, $user_id) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['user_id'] = $user_id;
                $row['date'] = $task->date;
                $row['first_name'] = $task->first_name;
                $row['last_name'] = $task->last_name;
                $row['contact_no'] = $task->contact_no;
                $row['email_id'] = $task->email_id;
                $row['comp_name'] = $task->comp_name;
                $row['designation'] = $task->designation;
                $row['agent_name'] = $task->agent_name;

                fputcsv($file, array($row['date'], $row['first_name'], $row['last_name'], $row['contact_no'], $row['email_id'], $row['comp_name'], $row['designation'], $row['agent_name']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }


        public function samplecsv(Request $request)
        {
            $filepath = public_path('CSV/Lead Details Sample.csv');
            return Response::download($filepath); 
        }

        public function importCSV()
        {
            return view('users.import');
        }
    
        public function importBulkPOCCSV(Request $request)
        {
            try {
                $user_id = $request->user_id;
                $files = $request->file('file');
                $fileContents = file($files->getPathname());
        
                // Skip the first line (column names)
                $headerSkipped = false;
        
                foreach ($fileContents as $line) {
                    // Skip the header line
                    if (!$headerSkipped) {
                        $headerSkipped = true;
                        continue;
                    }
        
                    $data = str_getcsv($line);
        
                    InsertLink::create([
                        'user_id' => $user_id,
                        'tracker_date' => $data[0],
                        'client_name' => $data[1],
                        'company_name' => $data[2],
                        'work_done' => $data[3],
                        'cid' => $data[4],
                        'camp_name' => $data[5],
                        'poc_links' => $data[6],
                        'work_type' => $data[7],
                        'work_status' => $data[8],
                        'ip_counts' => $data[9],
                    ]);
                }
        
                return redirect()->back()->with('success', 'CSV file imported successfully.');
        
            } catch (QueryException $e) {
                // Handle the query exception here
                // You can log the error, display a user-friendly message, etc.
                return redirect()->back()->with('error', 'Error importing CSV file: ' . $e->getMessage());
            }
        }

       public function userpunchin($id)
        {
            $id = base64_decode($id);
            $var = Carbon::now('Asia/Kolkata'); 
            $time = $var->format('h:i:s');
            
            DB::beginTransaction();
            $punch = new attendance();
                
            $punch->att_date = date('Y-m-d');
            $punch->punchin_time = $time;
            $punch->user_id = $id;
            $punch->status = 1;
            
            $punch->save();
                    
            if ($punch->id) {                        
                DB::commit();
                return redirect('/dashboard')->with('success', 'Attendance Done!');
            } else {
                return redirect('/dashboard')->with('success', 'Something went wrong, please try again!');
            }
                
        }

        public function userpunchout($id)
        {
            $id = base64_decode($id);
            $var = Carbon::now('Asia/Kolkata'); 
            $time = $var->format('h:i:s');
            
            DB::beginTransaction();
            $punch = attendance::where('user_id', $id)->whereDate('att_date', now())->first();
            
            if ($punch) {
                $punch->punchout_time = $time;
                $punch->status = 2; // Assuming 2 represents Punch Out
                $punch->save();
                DB::commit();
                return redirect('/dashboard')->with('success', 'You are successfully logout !');
            } else {
                DB::rollBack();
                return redirect('/dashboard')->with('error', 'Punch Out failed. No matching Punch In found.');
            }
        }


        public function showloginreports(Request $request)
        {
            if ($request->ajax()) {

                $data = attendance::where('user_id',Auth::User()->id)->get();
                
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                               return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            
            return view('showlogin');
        }


}
