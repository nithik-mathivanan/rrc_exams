<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/signout', function () {
	Auth::logout();
    return redirect()->route('login');
});

Auth::routes();

Route::get('/get_mark', [App\Http\Controllers\TNPSCController::class, 'GetMark'])->name('get-mark');
Route::post('/view_mark', [App\Http\Controllers\TNPSCController::class, 'ViewMark'])->name('view-mark');

Route::get('/get_bank_mark', [App\Http\Controllers\BankController::class, 'GetBankMark'])->name('get-bank-mark');
Route::post('/bank_mark', [App\Http\Controllers\BankController::class, 'BankMark'])->name('bank-mark');

Route::get('/neet_get_mark', [App\Http\Controllers\NeetController::class, 'NeetGetMark'])->name('neet-get-mark');
Route::post('/neet_mark_view', [App\Http\Controllers\NeetController::class, 'NeetMarkView'])->name('neet-mark-view');

Route::get('/jee_get_mark', [App\Http\Controllers\JeeController::class, 'JeeGetMark'])->name('jee-get-mark');
Route::post('/jee_mark_view', [App\Http\Controllers\JeeController::class, 'JeeMarkView'])->name('jee-mark-view');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/update_input', [App\Http\Controllers\HomeController::class, 'UpdateInput'])->name('update-input');

   // TNPSC
    Route::get('/tnpsc_hall_ticket', [App\Http\Controllers\TNPSCController::class, 'TnpscHallTicket'])->name('tnpsc-hall-ticket');
    Route::post('/tnpsc_import', [App\Http\Controllers\TNPSCController::class, 'tnpsc'])->name('tnpsc-import');
    Route::get('/mark_entry', [App\Http\Controllers\TNPSCController::class, 'markEntry'])->name('mark-entry');
    Route::post('/store_mark', [App\Http\Controllers\TNPSCController::class, 'storeMark'])->name('store-mark');
    Route::get('/view_details', [App\Http\Controllers\TNPSCController::class, 'ViewDetails'])->name('view-details');
    Route::get('/delete/{id}', [App\Http\Controllers\TNPSCController::class, 'delete'])->name('delete');
    Route::get('/tnpsc_exam_list', [App\Http\Controllers\TNPSCController::class, 'TnpscExamList'])->name('tnpsc-exam-list');
    Route::get('/tnpsc_exam_name', [App\Http\Controllers\TNPSCController::class, 'TnpscExamName'])->name('tnpsc-exam-name');
    Route::post('/store_tnpsc_exam_name', [App\Http\Controllers\TNPSCController::class, 'StoreTnpscExamName'])->name('store-tnpsc-exam-name');
    Route::get('/active_exam/{id}', [App\Http\Controllers\TNPSCController::class, 'ActiveExam'])->name('active-exam');
    Route::get('/exam_delete/{id}', [App\Http\Controllers\TNPSCController::class, 'ExamDelete'])->name('exam-delete');
    Route::get('/active_exam_select/{exam_id}', [App\Http\Controllers\TNPSCController::class, 'ActiveExamSelect'])->name('active-exam-select');
   Route::get('/tnpsc_change_input', [App\Http\Controllers\TNPSCController::class, 'TnpscChangeInput'])->name('tnpsc-change-input');
   Route::get('/tnpsc_mobile_validation/{number}/{exam_id}', [App\Http\Controllers\TNPSCController::class, 'TnpscMobileValidation'])->name('tnpsc-mobile-validation');







    // BANK
    Route::get('/bank_mark_entry', [App\Http\Controllers\BankController::class, 'BankMarkEntry'])->name('bank-mark-entry');
    Route::post('/store_bank_mark', [App\Http\Controllers\BankController::class, 'StoreBankMark'])->name('store-bank-mark');
    Route::get('/view_bank_mark', [App\Http\Controllers\BankController::class, 'ViewBankMark'])->name('view-bank-mark');
    Route::get('/bank_delete/{id}', [App\Http\Controllers\BankController::class, 'BankDelete'])->name('bank-delete');
    Route::get('/bank_exam_name', [App\Http\Controllers\BankController::class, 'BankExamName'])->name('bank-exam-name');
    Route::post('/store_bank_exam_name', [App\Http\Controllers\BankController::class, 'StorebankExamName'])->name('store-bank-exam-name');
    Route::get('/bank_exam_list', [App\Http\Controllers\BankController::class, 'BankExamList'])->name('bank-exam-list');
    Route::get('/bank_hall_ticket', [App\Http\Controllers\BankController::class, 'BankHallTicket'])->name('bank-hall-ticket');
    Route::post('/bank_import', [App\Http\Controllers\BankController::class, 'bankImport'])->name('bank-import');
   Route::get('/bank_exam_delete/{id}', [App\Http\Controllers\BankController::class, 'BankExamDelete'])->name('bank-exam-delete');
   Route::get('/bank_active_exam/{id}', [App\Http\Controllers\BankController::class, 'BankActiveExam'])->name('bank-active-exam');
    Route::get('/bank_active_exam_select/{exam_id}', [App\Http\Controllers\BankController::class, 'BankActiveExamSelect'])->name('bank-active-exam-select');
    Route::get('/bank_change_input', [App\Http\Controllers\BankController::class, 'BankChangeInput'])->name('bank-change-input');
    Route::get('/bank_mobile_validation/{number}/{exam_id}', [App\Http\Controllers\BankController::class, 'BankMobileValidation'])->name('bank-mobile-validation');





    // NEET
    Route::get('/neet_exam_name', [App\Http\Controllers\NeetController::class, 'NeetExamName'])->name('neet-exam-name');
    Route::post('/store_neet_exam_name', [App\Http\Controllers\NeetController::class, 'StoreNeetExamName'])->name('store-neet-exam-name');
    Route::get('/neet_exam_list', [App\Http\Controllers\NeetController::class, 'NeetExamList'])->name('neet-exam-list');
    Route::get('/neet_hall_ticket', [App\Http\Controllers\NeetController::class, 'NeetHallTicket'])->name('neet-hall-ticket');
    Route::post('/neet_import', [App\Http\Controllers\NeetController::class, 'neetImport'])->name('neet-import');
    Route::get('/neet_exam_delete/{id}', [App\Http\Controllers\NeetController::class, 'NeetExamDelete'])->name('neet-exam-delete');
    Route::get('/neet_mark_entry', [App\Http\Controllers\NeetController::class, 'NeetMarkEntry'])->name('neet-mark-entry');
     Route::post('/neet_mark_store', [App\Http\Controllers\NeetController::class, 'NeetMarkStore'])->name('neet-mark-store');
     Route::get('/neet_mark_list', [App\Http\Controllers\NeetController::class, 'NeetMarkList'])->name('neet-mark-list');
     Route::get('/neet_mark_list_delete/{id}', [App\Http\Controllers\NeetController::class, 'NeetMarkListDelete'])->name('neet-mark-list_delete');
    
    Route::get('/neet_active_exam/{id}', [App\Http\Controllers\NeetController::class, 'NeetActiveExam'])->name('neet-active-exam');
    Route::get('/neet_active_exam_select/{exam_id}', [App\Http\Controllers\NeetController::class, 'NeetActiveExamSelect'])->name('neet-active-exam-select');
    Route::get('/neet_change_input', [App\Http\Controllers\NeetController::class, 'NeetChangeInput'])->name('neet-change-input');
    Route::get('/neet_mobile_validation/{number}/{exam_id}', [App\Http\Controllers\NeetController::class, 'NeetMobileValidation'])->name('neet-mobile-validation');





    //JEE
    Route::get('/jee_exam_name', [App\Http\Controllers\JeeController::class, 'JeeExamName'])->name('jee-exam-name');
    Route::post('/store_jee_exam_name', [App\Http\Controllers\JeeController::class, 'StoreJeeExamName'])->name('store-jee-exam-name');
    Route::get('/jee_exam_list', [App\Http\Controllers\JeeController::class, 'JeeExamList'])->name('jee-exam-list');
    Route::get('/jee_hall_ticket', [App\Http\Controllers\JeeController::class, 'JeeHallTicket'])->name('jee-hall-ticket');
    Route::post('/jee_import', [App\Http\Controllers\JeeController::class, 'jeeImport'])->name('jee-import');
    Route::get('/jee_exam_delete/{id}', [App\Http\Controllers\JeeController::class, 'JeeExamDelete'])->name('jee-exam-delete');
    Route::get('/jee_mark_entry', [App\Http\Controllers\JeeController::class, 'JeeMarkEntry'])->name('jee-mark-entry');
    Route::post('/jee_mark_store', [App\Http\Controllers\JeeController::class, 'JeeMarkStore'])->name('jee-mark-store');
    Route::get('/jee_mark_list', [App\Http\Controllers\JeeController::class, 'JeeMarkList'])->name('jee-mark-list');
    Route::get('/jee_mark_list_delete/{id}', [App\Http\Controllers\JeeController::class, 'JeeMarkListDelete'])->name('jee-mark-list_delete');
   
    Route::get('/jee_active_exam/{id}', [App\Http\Controllers\JeeController::class, 'JeeActiveExam'])->name('jee-active-exam');
    Route::get('/jee_active_exam_select/{exam_id}', [App\Http\Controllers\JeeController::class, 'JeeActiveExamSelect'])->name('jee-active-exam-select');
   Route::get('/jee_change_input', [App\Http\Controllers\JeeController::class, 'JeeChangeInput'])->name('jee-change-input');
    Route::get('/jee_mobile_validation/{number}/{exam_id}', [App\Http\Controllers\JeeController::class, 'JeeMobileValidation'])->name('jee-mobile-validation');

   // certificate
   Route::get('/cirtificate_gen', [App\Http\Controllers\CertificateController::class, 'CertificateGen'])->name('certificate-gen');
    Route::post('/certificate_import', [App\Http\Controllers\CertificateController::class, 'certificate'])->name('certificate-import');


   // Speech Competetion
     Route::get('/speech_create', [App\Http\Controllers\SpeechController::class, 'SpeechCreate'])->name('speech-create');
     Route::post('/speech_store', [App\Http\Controllers\SpeechController::class, 'SpeechStore'])->name('speech-store');
     Route::get('/speech_index', [App\Http\Controllers\SpeechController::class, 'SpeechIndex'])->name('speech-index');
     Route::get('/speech_active/{id}', [App\Http\Controllers\SpeechController::class, 'SpeechActive'])->name('speech-active');
     Route::get('/speech_mobile_validation/{number}/{id}', [App\Http\Controllers\SpeechController::class, 'SpeechMobileValidation'])->name('speech-mobile-validation');
     Route::get('/speech_active_select/{id}', [App\Http\Controllers\SpeechController::class, 'SpeechActiveSelect'])->name('speech-active-select');

     Route::get('/speech_delete/{id}', [App\Http\Controllers\SpeechController::class, 'SpeechDelete'])->name('speech-delete');
     Route::get('/speech_score_entry', [App\Http\Controllers\SpeechController::class, 'SpeechScoreEntry'])->name('speech-score-entry');
     Route::post('/speech_score_store', [App\Http\Controllers\SpeechController::class, 'SpeechScoreStore'])->name('speech-score-store');
    Route::get('/speech_score_list', [App\Http\Controllers\SpeechController::class, 'SpeechScoreList'])->name('speech-score-list');
     Route::get('/speech_score_get', [App\Http\Controllers\SpeechController::class, 'SpeechScoreGet'])->name('speech-score-get');
     Route::post('/speech_score_view', [App\Http\Controllers\SpeechController::class, 'SpeechScoreView'])->name('speech-score-view');
     Route::get('/speech_score_delete/{id}', [App\Http\Controllers\SpeechController::class, 'SpeechScoreDelete'])->name('speech-score-delete');


   //CA
    Route::get('/ca_create', [App\Http\Controllers\CaController::class, 'CaCreate'])->name('ca-create');
    Route::post('/ca_store', [App\Http\Controllers\CaController::class, 'CaStore'])->name('ca-store');
    Route::get('/ca_index', [App\Http\Controllers\CaController::class, 'CaIndex'])->name('ca-index');
    Route::get('/ca_delete/{id}', [App\Http\Controllers\CaController::class, 'CaDelete'])->name('ca-delete');
    Route::get('/ca_active_exam/{id}', [App\Http\Controllers\CaController::class, 'CaActiveExam'])->name('ca-active-exam');
    Route::get('/ca_mark_entry', [App\Http\Controllers\CaController::class, 'CaMarkEntry'])->name('ca-mark-entry');
    Route::post('/ca_mark_store', [App\Http\Controllers\CaController::class, 'CaMarkStore'])->name('ca-mark-store');
    Route::get('/ca_number_validation/{number}/{id}/{type}', [App\Http\Controllers\CaController::class, 'CaNumberValidation'])->name('ca-number-validation');
    Route::get('/ca_mark_index', [App\Http\Controllers\CaController::class, 'CaMarkIndex'])->name('ca-mark-index');
    Route::get('/ca_fo_mark_delete/{id}', [App\Http\Controllers\CaController::class, 'CaFoMarkDelete'])->name('ca-fo-mark-delete');
    Route::get('/ca_cai_mark_delete/{id}', [App\Http\Controllers\CaController::class, 'CaCaiMarkDelete'])->name('ca-cai-mark-delete');
    Route::get('/ca_cmai_mark_delete/{id}', [App\Http\Controllers\CaController::class, 'CaCmaiMarkDelete'])->name('ca-cmai-mark-delete');
    Route::get('/ca_get_mark', [App\Http\Controllers\CaController::class, 'CaGetMark'])->name('ca-get-mark');
    Route::post('/ca_mark_view', [App\Http\Controllers\CaController::class, 'CaMarkView'])->name('ca-mark-view');
    Route::get('/ca_exam_select/{id}', [App\Http\Controllers\CaController::class, 'CaExamSelect'])->name('ca-exam-select');





    

});