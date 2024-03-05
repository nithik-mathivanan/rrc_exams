<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TnpscResult;
use App\Models\Bank;
use App\Models\BankName;
use App\Models\Input;

use PDF;
use Illuminate\Http\Request;

class BankController extends Controller
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
   
    public function BankMarkEntry(){
      $exams = BankName::where('status',1)->first();
        return view('bank.bank_mark_entry')->with(["exams"=>$exams]);
    }
    public function StoreBankMark(Request $request){
       
        $store = new Bank();

        $store->name = $request->name;
        $store->mob_no = $request->mob_no;
        $store->english = $request->english;
        $store->aptitude = $request->aptitude;
        $store->reasoning = $request->reasoning;
        $store->total = $request->total;
        $store->exam = $request->id;
        $store->save();

        return redirect()->route('bank-mark-entry')->with('success','Mark has been submitted successfullly');

    }
    public function ViewBankMark(){
        $mark = Bank::join('bank_exam_name','bank_exam_name.id','=','bank_mark.exam')->where('bank_exam_name.status',1)->with('getExam')->get();
        $exams = BankName::where('is_deleted',0)->get();
        $active_exam = BankName::where('status',1)->first();
       
        return view('bank.bank_view_mark')->with(["mark"=>$mark,"active"=>$active_exam,"exams"=>$exams]);
    }
     public function BankDelete($id){
        $delete = Bank::where('id',$id)->delete();
        return redirect()->back();

    }

    public function GetBankMark(){
      $active_exam = BankName::where('status',1)->first();
        return view('bank.get_bank_mark')->with(["active_exam"=>$active_exam]);
    } 
    public function BankMark(Request $request){
      $active_exam = BankName::where('status',1)->first();
      $getMark = Bank::join('bank_exam_name','bank_exam_name.id','=','bank_mark.exam')->where('bank_exam_name.status',1)->where('mob_no',$request->mob_no)->first();
      if($getMark){
          return view('bank.bankmark')->with(["getmark"=>$getMark,"active_exam"=>$active_exam]);
      }
      else{
             return redirect()->route('get-bank-mark')->with('error','Your Mobile number is not registered with our exam');
      }      
    }
    public function BankExamName(){
        return view('bank.name');
    }
    public function StorebankExamName(Request $request){
        $store = new BankName();
        $store->exam_name = $request->name;
        $store->save();
        return redirect()->route('bank-exam-name')->with('success','Exam Name has been stored successfullly');
    }
    public function BankExamList(){
      $exams = BankName::where('is_deleted',0)->get();
      $active_exam = BankName::where('status',1)->first();
      return view('bank.name_list')->with(["exams"=>$exams,"active"=>$active_exam]);
    }
    public function BankHallTicket(){
      return view('bank.hall_ticket_gen');
    }

    public function bankImport(Request $request){
         $request->validate([
            'tnpsc' => "required|mimes:xlsx|max:10000",
        ]);

        $path = $request->file('tnpsc')->getRealPath();
        $excel_data = Excel::toArray([],$path)[0];
       $exam_input = Input::where('id',2)->first();
        if(count($excel_data)>1){
            // remove tittle array
            $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'data' => $excel_data,
            'input'=>$exam_input,
        ];

            // pdf generation
            $pdf = PDF::loadView('bank.hall_ticket', $data);
            return $pdf->stream('RRC_Bank_HallTicket.pdf');
        }
        else{
            echo "empty";
            exit;
            return redirect()->route('home')->with('error','Cant Generated PDF with empty excel data');
        }

    }
  public function BankExamDelete($id){
    $delete = BankName::where('id',$id)->update(['is_deleted'=>1]);
    return redirect()->back()->with('success','BANK Exam deleted successfullly');
    
  } 
  public function BankActiveExam($id){
    $reset_exam = BankName::where('id','!=',0)->update(['status'=>0]);
     $name = BankName::where('id',$id)->get();     
     $update_exam = BankName::where('id',$id)->first();
        $update_exam->status = 1;
        $update_exam->update();
        
  return response([1,$update_exam->exam_name]);  
  }
  public function BankActiveExamSelect($exam_id){
  if($exam_id){
        $mark = Bank::where('exam',$exam_id)->get();
        $exams = BankName::where('is_deleted',0)->get();
        $active_exam = BankName::where('id',$exam_id)->first();
       
        return view('bank.bank_view_mark')->with(["mark"=>$mark,"active"=>$active_exam,"exams"=>$exams]);
  }
  }
  public function BankChangeInput(){
    
   return view('bank.change_input');
  }
  public function BankMobileValidation($number,$exam_id){
    $mobile_number = Bank::where('mob_no',$number)->where('exam',$exam_id)->first();
        if($mobile_number){
            return response(1);
        }
  }
   
}
