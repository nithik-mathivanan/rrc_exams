<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\CaExam;
use App\Models\Foundation;
use App\Models\CaInter;
use App\Models\CmaInter;
use Illuminate\Http\Request;

class CaController extends Controller{
  
  public function CaCreate(){
    return view('CA.create');
  }
  public function CaStore(Request $request){
     echo "<pre>";
        print_r($request->all());
        exit;
    $store = new CaExam();
    $store->name = $request->name;
    $store->type = $request->type;
    $store->save();
     return redirect()->route('ca-create')->with('success','Exam Name has been stored successfullly');

  }
   public function CaIndex(){
        $exams = CaExam::where('is_deleted',0)->get();
        $active_exam = CaExam::where('status',1)->first();

        return view('CA.index')->with(["exams"=>$exams,"active"=>$active_exam]);
   }
   public function CaActiveExam($id){
       $reset_exam = CaExam::where('id','!=',0)->update(['status'=>0]);
     $name = CaExam::where('id',$id)->get();     
     $update_exam = CaExam::where('id',$id)->first();
        $update_exam->status = 1;
        $update_exam->update();
        
  return response([1,$update_exam->name]);
   }
  public function CaDelete($id){

    $delete = CaExam::where('id',$id)->update(['is_deleted'=>1]);
    return redirect()->back()->with('success','BANK Exam deleted successfullly');
  }
  public function CaMarkEntry(){
    $exams = CaExam::where('status',1)->first();
    return view('CA.mark_entry')->with(["exams"=>$exams]);
  }
  public function CaMarkStore(Request $request){
    $active_exam = CaExam::where('status',1)->first();
    if($request->type==1){

        $store = new Foundation();
        $store->name = $request->name;
        $store->mob = $request->mob_no;
        $store->accounts = $request->accounts;
        $store->business_law = $request->business_law;
        $store->quantitative_aptitude = $request->quantitative_aptitude;
        $store->business_economics = $request->business_economics;
        $store->total = $request->total;
        $store->exam = $active_exam->id;
        $store->save();
    }
    elseif($request->type==2){
        $store_ca = new CaInter();
        $store_ca->name = $request->name;
        $store_ca->mob = $request->mob_no;
        $store_ca->advanced_accounting = $request->advanced_accounting;
        $store_ca->COL = $request->COL;
        $store_ca->taxation = $request->taxation;
        $store_ca->CMA = $request->CMA;
        $store_ca->auditing_ethics = $request->auditing_ethics;
        $store_ca->financial_management = $request->financial_management;
        $store_ca->strategic_management = $request->strategic_management;
        $store_ca->total = $request->total;
        $store_ca->exam = $active_exam->id;
        $store_ca->save();
    }
    else{
        $store_cma = new CmaInter();
        $store_cma->name = $request->name;
        $store_cma->mob = $request->mob_no;
        $store_cma->BLE = $request->BLE;
        $store_cma->financial_accounting = $request->financial_accounting;
        $store_cma->DIT = $request->DIT;
        $store_cma->cost_accounting = $request->cost_accounting;
        $store_cma->OMSM = $request->OMSM;
        $store_cma->CAA = $request->CAA;
        $store_cma->FMBDA = $request->FMBDA;
        $store_cma->Management_accounting = $request->management_accounting;
         $store_cma->total = $request->total;
        $store_cma->exam = $request->id;
       $store_cma->save();
    }
    return redirect()->back();
  }
  public function CaNumberValidation($number,$id,$type){
   if($type==1){ 
     $mobile_number = Foundation::where('mob',$number)->where('exam',$id)->first();
        if($mobile_number){
            return response(1);
        }
   }
   elseif($type==2){ 
     $mobile_number = CaInter::where('mob',$number)->where('exam',$id)->first();
        if($mobile_number){
            return response(1);
        }
   }
    else{ 
     $mobile_number = CmaInter::where('mob',$number)->where('exam',$id)->first();
        if($mobile_number){
            return response(1);
        }
   }
 } 
 public function CaMarkIndex(){
      $active_exam = CaExam::where('status',1)->first();
        $foundation  = Foundation::with('getFoundation')->where('exam',$active_exam->id)->get();
         $ca_inter  = CaInter::with('getCaInter')->where('exam',$active_exam->id)->get();
         $cma_inter  = CmaInter::with('getCmaInter')->where('exam',$active_exam->id)->get();
        $exams = CaExam::where('is_deleted',0)->get();
        
        return view('CA.mark_index')->with(["foundation"=>$foundation,"ca_inter"=>$ca_inter,"cma_inter"=>$cma_inter,"exams"=>$exams,"active"=>$active_exam]);
    
 }
 public function CaExamSelect($id){
    $active_exam = CaExam::where('id',$id)->first();
        $foundation  = Foundation::with('getFoundation')->where('exam',$active_exam->id)->get();
         $ca_inter  = CaInter::with('getCaInter')->where('exam',$active_exam->id)->get();
         $cma_inter  = CmaInter::with('getCmaInter')->where('exam',$active_exam->id)->get();
        $exams = CaExam::where('is_deleted',0)->get();
         return view('CA.mark_index')->with(["foundation"=>$foundation,"ca_inter"=>$ca_inter,"cma_inter"=>$cma_inter,"exams"=>$exams,"active"=>$active_exam]);

 }
 public function CaFoMarkDelete($id){
     $delete = Foundation::where('id',$id)->delete();
    return redirect()->back()->with('success','Mark deleted successfullly');

 }
 public function CaCaiMarkDelete($id){
     $delete = CaInter::where('id',$id)->delete();
    return redirect()->back()->with('success','Mark deleted successfullly');

 }
  public function CaCmaiMarkDelete($id){
     $delete = CmaInter::where('id',$id)->delete();
    return redirect()->back()->with('success','Mark deleted successfullly');

 }
 public function CaGetMark(){
    $active_exam = CaExam::where('status',1)->first();
    return view('CA.get_mark')->with(["active_exam"=>$active_exam]);
 }
 public function CaMarkView(Request $request){
     $active_exam = CaExam::where('status',1)->first();
if($active_exam->type==1){
     $getMark = Foundation::where('mob',$request->mob_no)->where('exam',$active_exam->id)->first();
   }
 elseif($active_exam==2){
      $getMark = CaInter::where('mob',$request->mob_no)->where('exam',$active_exam->id)->first();

 }  
 else{
     $getMark = CmaInter::where('mob',$request->mob_no)->where('exam',$active_exam->id)->first();
 }
   if($getMark){
            return view('CA.view_mark')->with(["getmark"=>$getMark])->with(["active_exam"=>$active_exam]);
        }
        else{
               return redirect()->route('ca-get-mark')->with('error','Your Mobile number is not registered with our exam');
        }
   
 }
}