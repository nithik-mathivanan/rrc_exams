<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TnpscResult;
use App\Models\Bank;
use App\Models\TnpscName;
use App\Models\Input;

use PDF;
use Illuminate\Http\Request;

class TNPSCController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function TnpscHallTicket(){
        return view('tnpsc.hall_ticket_gen');
    }

    public function tnpsc(Request $request){


         $request->validate([
            'tnpsc' => "required|mimes:xlsx,xls|max:10000",
        ]);

        $path = $request->file('tnpsc')->getRealPath();
        echo "<pre>";
        print_r($path);
        print_r($request->all());
        exit;

        $excel_data = Excel::toArray([],$path)[0];
          $exam_input = Input::where('id',1)->first();

        if(count($excel_data)>1){
            // remove tittle array
            $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'data' => $excel_data,
            'input'=>$exam_input,
        ];

            // pdf generation
            $pdf = PDF::loadView('tnpsc.hall_ticket', $data);

          
            return $pdf->stream('RRC_TNPSC_HallTicket.pdf');
        }
        else{
            echo "empty";
            exit;
            return redirect()->route('home')->with('error','Cant Generated PDF with empty excel data');
        }

    }

    public function markEntry(){
        $exams = TnpscName::where('status',1)->first();
       return view('tnpsc.mark_entry')->with(["exams"=>$exams]);
    }

    public function storeMark(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // exit;

        // $validated = $request->validate([
        // 'mob_no' => 'required|unique:tnpsc_result,mob_no|max:10|min:10',
        // ]);

        $store = new TnpscResult();
        $store->name = $request->name;
        $store->mob_no = $request->mob_no;
        $store->tamil = $request->tamil;
        $store->gs = $request->gs;
        $store->exam = $request->id;
        $store->save();

        return redirect()->route('mark-entry')->with('success','Mark has been submitted successfullly');

    }
    public function ViewDetails(){
        $details = TnpscResult::join('tnpsc_exam_name','tnpsc_exam_name.id','=','tnpsc_result.exam')->where('tnpsc_exam_name.status',1)->with('getExam')->get();
        
        $exams = TnpscName::where('is_deleted',0)->get();
        $active_exam = TnpscName::where('status',1)->first();
        return view('tnpsc.view')->with(["details"=>$details,"exams"=>$exams,"active"=>$active_exam]);
    }
    public function delete($id){
        $delete = TnpscResult::where('id',$id)->delete();
        return redirect()->back()->with('success','TNPSC exam hes been deleted successfullly');

    }


    public function GetMark(){
        $active_exam = TnpscName::where('status',1)->first();
        return view('tnpsc.getmark')->with(["active_exam"=>$active_exam]);
    }
    public function ViewMark(Request $request){
        $active_exam = TnpscName::where('status',1)->first();

        $getMark = TnpscResult::join('tnpsc_exam_name','tnpsc_exam_name.id','=','tnpsc_result.exam')->where('tnpsc_exam_name.status',1)->where('mob_no',$request->mob_no)->first();
        if($getMark){
            return view('tnpsc.viewmark')->with(["getmark"=>$getMark,"active_exam"=>$active_exam]);
        }
        else{
               return redirect()->route('get-mark')->with('error','Your Mobile number is not registered with our exam');
        }      
    }
    public function TnpscExamName(){
        return view('tnpsc.name');
    }
    public function StoreTnpscExamName(Request $request){
        $store = new  TnpscName();
        $store->exam_name = $request->name;
        $store->save();
        return redirect()->route('tnpsc-exam-name')->with('success','Exam Name has been stored successfullly');
    }
    public function TnpscExamList(){
        $exams = TnpscName::where('is_deleted',0)->get();
        $active_exam = TnpscName::where('status',1)->first();
        return view('tnpsc.name_list')->with(["exams"=>$exams,"active"=>$active_exam]);
    }
   
    public function ActiveExam($id){
        
       $reset_exam = TnpscName::where('id','!=',0)->update(['status'=>0]);
       $name = TnpscName::where('id',$id)->get();     
       $update_exam = TnpscName::where('id',$id)->first();
        $update_exam->status = 1;
        $update_exam->update();
        
       return response([1,$update_exam->exam_name]);$update_exam->update();
       } 
     
    public function ExamDelete($id){
        $delete = TnpscName::where('id',$id)->update(['is_deleted'=>1]);
        return redirect()->back();
    }
    public function ActiveExamSelect($exam_id){  
         if($exam_id){
            $details = TnpscResult::where('exam',$exam_id)->get();        
            $exams = TnpscName::where('is_deleted',0)->get();
            $active_exam = TnpscName::where('id',$exam_id)->first();
            return view('tnpsc.view')->with(["details"=>$details,"exams"=>$exams,"active"=>$active_exam]);
         }
    }
    public function TnpscChangeInput(){
         
        return view('tnpsc.change_input');
    }
    public function TnpscMobileValidation($number,$exam_id){
        // echo "<pre>";
        // print_r ($exam_id);
        // exit;
        $mobile_number = TnpscResult::where('mob_no',$number)->where('exam',$exam_id)->first();
        if($mobile_number){
            return response(1);
        }
    }

   
}
