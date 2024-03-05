<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\NeetName;
use App\Models\Neet;
use App\Models\Input;

use PDF;
use Illuminate\Http\Request;

class NeetController extends Controller
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
   
    
    public function NeetExamName(){
        return view('neet.name');
    }
    public function StoreNeetExamName(Request $request){
        $store = new NeetName();
        $store->exam_name = $request->name;
        $store->save();
        return redirect()->route('neet-exam-name')->with('success','Exam Name has been stored successfullly');
    }
    public function NeetExamList(){
        $exams = NeetName::where('is_deleted',0)->get();
        $active_exam = NeetName::where('status',1)->first();
        return view('neet.name_list')->with(["exams"=>$exams,"active"=>$active_exam]);
    }
    public function NeetHallTicket(){
        return view('neet.hall_ticket_gen');
    }

    public function neetImport(Request $request){
         $request->validate([
            'tnpsc' => "required|mimes:xlsx|max:10000",
        ]);

        $path = $request->file('tnpsc')->getRealPath();
        $excel_data = Excel::toArray([],$path)[0];
         $exam_input = Input::where('id',3)->first();


        if(count($excel_data)>1){
            // remove tittle array
            $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'data' => $excel_data,
             'input'=>$exam_input,
        ];

            // pdf generation
            $pdf = PDF::loadView('neet.hall_ticket', $data);
            return $pdf->stream('RRC_Neet_HallTicket.pdf');
        }
        else{
            echo "empty";
            exit;
            return redirect()->route('home')->with('error','Cant Generated PDF with empty excel data');
        }
    }
   public function NeetExamDelete($id){
    $delete = NeetName::where('id',$id)->update(['is_deleted'=>1]);
    return redirect()->back()->with('success','NEETexam deletd successfullly');
   }
   public function NeetMarkEntry(){
    $exams = NeetName::where('status',1)->first();
    return view('neet.mark_entry')->with(["exams"=>$exams]);
   }
   public function NeetMarkStore(Request $request){
    $store = new Neet();
    $store->name = $request->name;
    $store->number = $request->mob_no;
    $store->physics = $request->physics;
    $store->chemistry = $request->chemistry;
    $store->biology = $request->bio;
    $store->total = $request->total;
    $store->exam = $request->id;
    $store->save();
    return redirect()->route('neet-mark-entry')->with('success','Mark stored successfullly');

   }
   public function NeetMarkList(){
    $neet = Neet::join('neet_exam_name','neet_exam_name.id','=','neet_mark.exam')->where('neet_exam_name.status',1)->with('getExam')->get();
    $exams = NeetName::where('is_deleted',0)->get();
    $active_exam = NeetName::where('status',1)->first();
    return view('neet.mark_list')->with(["neet"=>$neet,"active"=>$active_exam,"exams"=>$exams]);
   }
   public function NeetMarkListDelete($id){
    $delete = Neet::where('id',$id)->delete();
    return redirect()->back();
   }
   public function NeetGetMark(){
    $active_exam = NeetName::where('status',1)->first();
    return view('neet.get_mark')->with(["active_exam"=>$active_exam]);
   }
   public function NeetMarkView(Request $request){
    $active_exam = NeetName::where('status',1)->first();
   $getMark = Neet::join('neet_exam_name','neet_exam_name.id','=','neet_mark.exam')->where('neet_exam_name.status',1)->where('number',$request->mob_no)->first();
   
        if($getMark){
            return view('neet.view_mark')->with(["getmark"=>$getMark,"active_exam"=>$active_exam]);
        }
        else{
               return redirect()->route('neet-get-mark')->with('error','Your Mobile number is not registered with our exam');
        }  
   }
   public function NeetActiveExam($id){

       $reset_exam = NeetName::where('id','!=',0)->update(['status'=>0]);
       $name = NeetName::where('id',$id)->get();     
       $update_exam = NeetName::where('id',$id)->first();
        $update_exam->status = 1;
        $update_exam->update();
        
       return response([1,$update_exam->exam_name]);
   }
   public function NeetActiveExamSelect($exam_id){
    if($exam_id){
    $neet = Neet::where('exam',$exam_id)->get();
    $exams = NeetName::where('is_deleted',0)->get();
    $active_exam = NeetName::where('id',$exam_id)->first();
    return view('neet.mark_list')->with(["neet"=>$neet,"active"=>$active_exam,"exams"=>$exams]);
    }
   }
   public function NeetChangeInput(){
    return view('neet.change_input');
   }
   public function NeetMobileValidation($number,$exam_id){
     $mobile_number = Neet::where('number',$number)->where('exam',$exam_id)->first();
        if($mobile_number){
            return response(1);
        }

   }
}
