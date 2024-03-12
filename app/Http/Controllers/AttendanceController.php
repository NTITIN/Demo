<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\calender;
use App\Models\Month;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    private $data;
    public function __construct()
    {
        $this->middleware('auth');
        $this->data = array();

    }
    public function monthlyattendance()
    {
        $this->data['title'] = 'Monthly-Attendance';
        $this->data['months'] = Month::get();
        $this->data['current_months'] = date('m');
        return view('backend/attendance/monthly',$this->data);
    }

    public function getmothlyattendace(Request $request)
    {
        $from = date('Y-'.$request->monthData.'-1');
        $to = date('Y-'.$request->monthData.'-31');
        $ajaxData = attendance::where('user_id',Auth::id())->whereBetween('att_date', [$from, $to])->get();
        return response()->json($ajaxData);
        //dd( $this->data['monthly_attendance']->toArray());
    }

    public function dailyattendance()
    {
        $this->data['title'] = 'Daily-Attendance';
        $this->data['months'] = Month::get();
        $this->data['current_day'] = date('d');
        return view('backend/attendance/daily',$this->data);
    }

    public function getdailyattendace(Request $request)
    {
        $day = date('Y-m-'.$request->dayData);
        $ajaxData = User::with(['attendance'=>function($att) use($day){
           $att->where('att_date', $day);
        }])->with('userrole')->where('id','!=',1)->get();

        
        return response()->json($ajaxData);
    }

    public function monthlyattendancereport(Request $request)
    {
        $this->data['title'] = 'Monthly-Attendance';
        $this->data['months'] = Month::get();
        

        //dd($request->toarray());
        if (isset($request->monthValue)){
            $previous_months= $request->monthFilter - 1;
            $current_months = $request->monthFilter;
            $from = date('Y-'.$previous_months.'-26');
            $to = date('Y-'.$current_months.'-25');
            $this->data['monthValue'] = 0;
            $this->data['current_months'] = $request->monthFilter;
        }else{
            $this->data['monthValue'] = 0;
            $previous_months= date("m",strtotime("-1 month"));
            $current_months = date('m');
            $from = date('Y-'.$previous_months.'-26');
            $to = date('Y-'.$current_months.'-25');
            $this->data['current_months'] = date('m');
        }
        // For Table Header
        $this->data['calender'] = calender::with('attendanceall.user')->whereBetween('date', [$from, $to])->get();
        $this->data['empattendance'] = User::with('attendanceall')->where('id','!=',1)->get();
        //dd($this->data['empattendance']->toarray());
        return view('backend/attendance/monthly-attendance-report',$this->data);
        
    }

    public function removeattendance(Request $request)
    {
        //dd($request->toArray());
        try {
            DB::beginTransaction();
            $attendance = new attendance();
            
                $attendance = attendance::find($request->id);
                if($attendance->delete()) {
                    DB::commit();
                    $response = array('status' => TRUE, 'message' => 'Attendance remove successfully');
                } else {
                    throw new \Exception('Something went wrong, please try again.', 1);
                }
          
            
        } catch (\Exception $exception) {
            DB::rollBack();
            $response = array('status' => FALSE, 'message' => 'Something went wrong, please try again.');
        }
        return response()->json($response);
    }
}
