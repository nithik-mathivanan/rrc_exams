<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TnpscResult;
use App\Models\TnpscName;
use App\Models\BankName;
use App\Models\NeetName;
use App\Models\JeeName;
use App\Models\Bank;
use App\Models\Input;
use PDF;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
   
    public function dashboard(){
         $tnpsc_active_exam = TnpscName::where('status',1)->first();
        $bank_active_exam = BankName::where('status',1)->first();
        $neet_active_exam = NeetName::where('status',1)->first();
        $jee_active_exam = JeeName::where('status',1)->first();
    
        return view('dashboard')->with(['active_tnpsc'=>$tnpsc_active_exam,'active_bank'=>$bank_active_exam,'active_neet'=>$neet_active_exam,'active_jee'=>$jee_active_exam]);
    }
    // public function BankMarkEntry(){
    //     return view('bank_mark_entry');
    // }
    // public function StoreBankMark(Request $request){
    //     $validated = $request->validate([
    //     'mob_no' => 'required|unique:bank_mark,mob_no|max:10|min:10',
        
    //     ]);

    //     $store = new Bank();

    //     $store->name = $request->name;
    //     $store->mob_no = $request->mob_no;
    //     $store->english = $request->english;
    //     $store->aptitude = $request->aptitude;
    //     $store->reasoning = $request->reasoning;
    //     $store->total = $request->total;
       
    //     $store->save();

    //     return redirect()->route('bank-mark-entry')->with('success','Mark has been submitted successfullly');

    // }
    // public function ViewBankMark(){
    //     $mark = Bank::get();
    //     return view('bank_view_mark')->with(["mark"=>$mark]);
    // }
    //  public function BankDelete($id){
    //     $delete = Bank::where('id',$id)->delete();
    //     return redirect()->back();

    // }
    public function UpdateInput(Request $request){
        $update_input = Input::where('id',$request->id)->first();
        $update_input->date = $request->date;
        $update_input->time = $request->time;
        $update_input->venue = $request->venue;
        $update_input->qp_medium = $request->medium;
        $update_input->update();
        return redirect()->back();
    }
   
}
