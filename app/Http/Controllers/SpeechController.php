<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\Speech;
use App\Models\SpeechScore;
use Illuminate\Http\Request;

class SpeechController extends Controller{
  
  public function SpeechCreate(){
  	return view('speech.event_create');
  }
  public function SpeechStore(Request $request){
    $store = new Speech();
    $store->name = $request->name;
    $store->mark = $request->mark;
    $store->selected = $request->select;
    $store->notselected = $request->notselect;
    $store->status = 0;
    $store->save();
    return redirect()->back()->with("success","Event has been stored successfullly");

  }
  public function SpeechIndex(){
    $event = Speech::where('is_deleted',0)->get();
    $active_event = Speech::where('status',1)->first();
    return view('speech.event_index')->with(["event"=>$event,"active"=>$active_event]);
  }
  public function SpeechActive($id){
       $reset_exam = Speech::where('id','!=',0)->update(['status'=>0]);
       $name = Speech::where('id',$id)->get();     
       $update_exam = Speech::where('id',$id)->first();
        $update_exam->status = 1;
        $update_exam->update();
        
       return response([1,$update_exam->name]);$update_exam->update();

  }
  public function SpeechMobileValidation($number,$id){
    $mobile_number = SpeechScore::where('number',$number)->where('event',$id)->first();
        if($mobile_number){
            return response(1);
        }
  }
  public function SpeechDelete($id){
    $delete = Speech::where('id',$id)->update(['is_deleted'=>1]);
    return redirect()->back()->with('success','Event has been deleted successfullly');
  }
  public function SpeechScoreEntry(){
    $event = Speech::where('status',1)->first();

    return view('speech.score_entry')->with(["event"=>$event]);
  }
  public function SpeechScoreStore(Request $request){
   
    
    
     $store = new SpeechScore();
     $store->name = $request->name;
     $store->title = $request->title;
     $store->score = $request->score;
     $store->number = $request->number;
     $store->event = $request->id;
     if($request->select){
      $store->status = 1;
     }
     else{
      $store->status = 0;
     }
     $store->save();
     return redirect()->back()->with('success','Score has been stored successfullly');

  }
   public function SpeechScoreList(){
    $score = SpeechScore::join('speech','speech.id','=','speech_score.event')->where('speech.status',1)->select('speech.name as event_name','speech_score.name as name','speech_score.number as number','speech_score.title as title','speech_score.score as score','speech_score.status as status','speech_score.id as id')->get();
    $event = Speech::where('is_deleted',0)->get();
     $active_event = Speech::where('status',1)->first();
    return view('speech.score_list')->with(["score"=>$score,"event"=>$event,"active"=>$active_event]);
   }
   public function SpeechActiveSelect($id){
    if($id){
            $details = SpeechScore::where('event',$id)->join('speech','speech.id','=','speech_score.event')->select('speech.name as event_name','speech_score.name as name','speech_score.number as number','speech_score.title as title','speech_score.score as score','speech_score.status as status','speech_score.id as id')->get();        
            $exams = Speech::where('is_deleted',0)->get();
            $active_exam = Speech::where('id',$id)->first();
            return view('speech.score_list')->with(["score"=>$details,"event"=>$exams,"active"=>$active_exam]);
         }
   }
  public function SpeechScoreGet(){
     $active = Speech::where('status',1)->first();
    return view('speech.score_get')->with(["active"=>$active]);
  }
  public function SpeechScoreView(Request $request){
    $active = Speech::where('status',1)->first();
     $getMark = SpeechScore::select('speech.name as event_name','speech_score.name as name','speech_score.number as number','speech_score.title as title','speech_score.score as score','speech_score.status as status','speech_score.id as id','speech.selected as select_con','speech.notselected as notselect_con')->join('speech','speech.id','=','speech_score.event')->where('speech_score.number',$request->mob_no)->where('speech.status',1)->first();

        if($getMark){
            return view('speech.score_view')->with(["getmark"=>$getMark,"active"=>$active]);
        }
        else{
               return redirect()->route('speech-score-get')->with('error','Your Mobile number is not registered with our event');
        }
  }
  public function SpeechScoreDelete($id){
     $delete = SpeechScore::where('id',$id)->delete();
     return redirect()->back()->with('success','Score has been deleted successfullly');
  }
}