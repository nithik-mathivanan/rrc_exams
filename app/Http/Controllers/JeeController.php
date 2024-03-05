<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\JeeName;
use App\Models\Jee;
use App\Models\Input;

use PDF;
use Illuminate\Http\Request;

class JeeController extends Controller
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
   
    
    public function JeeExamName(){
        return view('jee.name');
    }
    public function StoreJeeExamName(Request $request){
        $store = new JeeName();
        $store->exam_name = $request->name;
        $store->save();
        return redirect()->route('jee-exam-name')->with('success','Exam Name has been stored successfullly');
    }
    public function JeeExamList(){
        $exams = JeeName::where('is_deleted',0)->get();
        $active_exam = JeeName::where('status',1)->first();
        return view('jee.name_list')->with(["exams"=>$exams,"active"=>$active_exam]);
    }
    public function JeeHallTicket(){
        return view('jee.hall_ticket_gen');
        
    }
     public function jeeImport(Request $request){
         $request->validate([
            'tnpsc' => "required|mimes:xlsx|max:10000",
        ]);

        $path = $request->file('tnpsc')->getRealPath();
        $excel_data = Excel::toArray([],$path)[0];
        $exam_input = Input::where('id',4)->first();


        if(count($excel_data)>1){
            // remove tittle array
            $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'data' => $excel_data,
            'input'=>$exam_input,
        ];

            // pdf generation
            $pdf = PDF::loadView('jee.hall_ticket', $data);
            return $pdf->stream('RRC_Jee_HallTicket.pdf');
        }
        else{
            echo "empty";
            exit;
            return redirect()->route('home')->with('error','Cant Generated PDF with empty excel data');
        }

    }
    public function JeeExamDelete($id){
        $delete = JeeName::where('id',$id)->update(['is_deleted'=>1]);
        return redirect()->back();
    }
    public function JeeMarkEntry(){
        $exams = JeeName::where('status',1)->first();
        return view('jee.mark_entry')->with(["exams"=>$exams]);
    }
    public function JeeMarkStore(Request $request){
       $store = new Jee();
    $store->name = $request->name;
    $store->number = $request->mob_no;
    $store->physics = $request->physics;
    $store->chemistry = $request->chemistry;
    $store->maths = $request->maths;
    $store->total = $request->total;
    $store->exam = $request->id;
    $store->save();
        return redirect()->route('jee-mark-entry')->with('success','Mark stored successfullly');
  
    }
    public function JeeMarkList(){
        $jee = Jee::join('jee_exam_name','jee_exam_name.id','=','jee_mark.exam')->where('jee_exam_name.status',1)->with('getExam')->get();
        $exams = JeeName::where('is_deleted',0)->get();
        $active_exam = JeeName::where('status',1)->first();
        return view('jee.mark_list')->with(["jee"=>$jee,"exams"=>$exams,"active"=>$active_exam]);
    }
    public function JeeMarkListDelete($id){
    $delete = Jee::where('id',$id)->delete();
    return redirect()->back();
    }
   public function JeeGetMark(){
    $active_exam = JeeName::where('status',1)->first();
    return view('jee.get_mark')->with(["active_exam"=>$active_exam]);
   }
   public function JeeMarkView(Request $request){
    $active_exam = JeeName::where('status',1)->first();

    $getMark = Jee::join('jee_exam_name','jee_exam_name.id','=','jee_mark.exam')->where('jee_exam_name.status',1)->where('number',$request->mob_no)->first();
        if($getMark){
            return view('jee.view_mark')->with(["getmark"=>$getMark])->with(["active_exam"=>$active_exam]);
        }
        else{
               return redirect()->route('jee-get-mark')->with('error','Your Mobile number is not registered with our exam');
        }
   }
   public function JeeActiveExam($id){
   $reset_exam = JeeName::where('id','!=',0)->update(['status'=>0]);
       $name = JeeName::where('id',$id)->get();     
       $update_exam = JeeName::where('id',$id)->first();
        $update_exam->status = 1;
        $update_exam->update();
      return response([1,$update_exam->exam_name]);   

   }
   public function JeeActiveExamSelect($exam_id){
    if($exam_id){
        $jee = Jee::where('exam',$exam_id)->get();
        $exams = JeeName::where('is_deleted',0)->get();
        $active_exam = JeeName::where('id',$exam_id)->first();
        return view('jee.mark_list')->with(["jee"=>$jee,"exams"=>$exams,"active"=>$active_exam]);
    }
   }
   public function JeeChangeInput(){
    return view('jee.change_input');
   }
   public function JeeMobileValidation($number,$exam_id){
    $mobile_number = Jee::where('number',$number)->where('exam',$exam_id)->first();
        if($mobile_number){
            return response(1);
        }
   }
   
}
