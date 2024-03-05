@extends('layouts.result_layout')
@section('content')
            <!-- TNPSC -->
            <div class="container">               
                <div class="row">
                    <div class="header-title margin-bt-2">
                        <div class="header-dash" style="background-color:#e6bf02;color: #e64305;"> 
                            <div class="header-square" style="background-color:#e64305;"></div>
                            TNPSC -  <font class="fs-2">@if($active_tnpsc){{$active_tnpsc->exam_name}}@endif</font>
                        </div>

                    </div>                    
                   <div class="col-sm-3">
                     <a href="{{route('tnpsc-hall-ticket')}}">   
                        <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\halltickets.png')}}">
                            </div>
                            <div class="title-card">
                                     <h4>Hall Ticket<br>Generator</h4>
                                </div>
                        </div>
                       </a> 
                    </div> 
                       <div class="col-sm-2">
                        <a href="{{route('tnpsc-exam-list')}}">  
                            <div class="card">
                                <div class="img-content">
                                        <img height="100px" width="150px" style="margin-left: 6px;" src="{{asset('public\images\exam.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>Create Exam</h4>
                                    </div>
                            </div>
                        </a> 
                    </div>        
                    <div class="col-sm-2">  
                        <a href="{{route('mark-entry')}}"> 
                        <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\mark_entry.png')}}">
                            </div>
                            <div class="title-card">
                                    <h4>Mark Entries</h4>
                                </div>
                        </div>
                        </a>
                    </div>   
                     <div class="col-sm-2">
                        <a href="{{route('view-details')}}">
                            <div class="card">
                                <div class="img-content">
                                        <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\mark_list.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>Mark List</h4>
                                    </div>
                            </div>
                        </a>
                    </div>   
                    <div class="col-sm-3"> 
                        <a href="{{route('get-mark')}}">
                            <div class="card">
                                <div class="img-content">
                                        <img height="100px" width="150px" style="margin-left: 6px;" src="{{asset('public\images\result.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>View Result</h4>
                                    </div>
                            </div>
                        </a>  
                    </div>                    
                </div>
            </div>
            <!-- BANK -->
            <div class="container">
               
                <div class="row">
                    <div class="header-title margin-bt-2">
                        <div class="header-dash" style="background-color:rgb(125 230 241);color:rgb(57 49 148) ;">
                            BANK - <font class="fs-2">@if($active_bank){{$active_bank->exam_name}}@endif</font>
                            <div class="header-square" style="background-color:rgb(57 49 148);"></div>
                        </div>

                    </div>                    
                      <div class="col-sm-3">
                       <a href="{{route('bank-hall-ticket')}}"> 
                        <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\halltickets.png')}}">
                            </div>
                            <div class="title-card">
                                     <h4>Hall Ticket<br>Generator</h4>
                                </div>
                           </div>
                       </a> 
                    </div> 
                       <div class="col-sm-2">
                        <a href="{{route('bank-exam-list')}}">  
                            <div class="card">
                                <div class="img-content">
                                        <img height="100px" width="150px" style="margin-left: 6px;" src="{{asset('public\images\exam.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>Create Exam</h4>
                                    </div>
                            </div>
                        </a> 
                    </div>        
                    <div class="col-sm-2">  
                        <a href="{{route('bank-mark-entry')}}"> 
                        <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\mark_entry.png')}}">
                            </div>
                            <div class="title-card">
                                    <h4>Mark Entries</h4>
                                </div>
                        </div>
                        </a>
                    </div>   
                     <div class="col-sm-2">
                        <a href="{{route('view-bank-mark')}}">
                            <div class="card">
                                <div class="img-content">
                                        <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\mark_list.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>Mark List</h4>
                                    </div>
                            </div>
                        </a>
                    </div>   
                     <div class="col-sm-3">
                      <a href="{{route('get-bank-mark')}}">     
                        <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="150px" style="margin-left: 6px;" src="{{asset('public\images\result.png')}}">
                            </div>
                            <div class="title-card">
                                     <h4>View Result</h4>
                                </div>
                        </div>
                        </a>
                    </div>                    
                </div>                   
                </div>
            </div>
            <!-- NEET -->
             <div class="container">
               
                <div class="row">
                    <div class="header-title margin-bt-2">
                        <div class="header-dash" style="background-color:#0865ab;color: #efecec;">
                            NEET - <font class="fs-2">@if($active_neet){{$active_neet->exam_name}}@endif</font>
                            <div class="header-square" style="background-color:#efecec;"></div>
                        </div>
                    </div>                    
                     <div class="col-sm-3">
                      <a href="{{route('neet-hall-ticket')}}">  
                        <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\halltickets.png')}}">
                            </div>
                            <div class="title-card">
                                     <h4>Hall Ticket<br>Generator</h4>
                                </div>
                         </div>
                       </a> 
                    </div> 
                    <div class="col-sm-2">
                        <a href="{{route('neet-exam-list')}}">  
                            <div class="card">
                                <div class="img-content">
                                        <img height="100px" width="150px" style="margin-left: 6px;" src="{{asset('public\images\exam.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>Create Exam</h4>
                                    </div>
                            </div>
                        </a> 
                     </div>        
                    <div class="col-sm-2">  
                        <a href="{{route('neet-mark-entry')}}"> 
                        <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\mark_entry.png')}}">
                            </div>
                            <div class="title-card">
                                    <h4>Mark Entries</h4>
                                </div>
                        </div>
                        </a>
                    </div>   
                     <div class="col-sm-2">
                        <a href="{{route('neet-mark-list')}}">
                            <div class="card">
                                <div class="img-content">
                                        <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\mark_list.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>Mark List</h4>
                                    </div>
                            </div>
                        </a>
                    </div>   
                     <div class="col-sm-3">   
                        <div class="card">
                          <a href="{{route('neet-get-mark')}}"> 
                            <div class="img-content">
                                    <img height="100px" width="150px" style="margin-left: 6px;" src="{{asset('public\images\result.png')}}">
                            </div>
                            <div class="title-card">
                                     <h4>View Result</h4>
                            </div>
                          </a>
                        </div>
                    </div>                    
                </div>                   
                </div>
            </div>

             <!-- JEE -->
             <div class="container">
               
                <div class="row">
                    <div class="header-title margin-bt-2">
                        <div class="header-dash" style="background-color:rgb(242 56 80);color: white;">
                            JEE - <font class="fs-2">@if($active_jee){{$active_jee->exam_name}}@endif</font>
                            <div class="header-square" style="background-color:#dccf02"></div>
                        </div>
                    </div>                    
                      <div class="col-sm-3"> 
                        <a href="{{route('jee-hall-ticket')}}">
                          <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\halltickets.png')}}">
                            </div>
                            <div class="title-card">
                                     <h4>Hall Ticket<br>Generator</h4>
                                </div>
                        </div>
                      </a>
                    </div> 
                       <div class="col-sm-2">
                        <a href="{{route('jee-exam-list')}}">  
                            <div class="card">
                                <div class="img-content">
                                        <img height="100px" width="150px" style="margin-left: 6px;" src="{{asset('public\images\exam.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>Create Exam</h4>
                                    </div>
                            </div>
                        </a> 
                    </div>        
                    <div class="col-sm-2">  
                        <a href="{{route('jee-mark-entry')}}"> 
                        <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\mark_entry.png')}}">
                            </div>
                            <div class="title-card">
                                    <h4>Mark Entries</h4>
                                </div>
                        </div>
                        </a>
                    </div>   
                     <div class="col-sm-2">
                        <a href="{{route('jee-mark-list')}}">
                            <div class="card">
                                <div class="img-content">
                                        <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\mark_list.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>Mark List</h4>
                                    </div>
                            </div>
                        </a>
                    </div>   
                    <div class="col-sm-3">   
                        <div class="card">
                           <a href="{{route('jee-get-mark')}}">
                                <div class="img-content">
                                        <img height="100px" width="150px" style="margin-left: 6px;" src="{{asset('public\images\result.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>View Result</h4>
                                </div>                        
                            </a>                                
                        </div>                   
                    </div>
                </div>
            </div>

       <!--   speech -->
            <div class="container">
                <div class="row">
                    <div class="header-title margin-bt-2">
                        <div class="header-dash" style="background-color:#e6bf02;color: #e64305;">
                           Speech Compettion
                            <div class="header-square" style="background-color:#e64305;"></div>
                        </div>
                    </div>                    
                     <div class="col-sm-3">
                      <a href="{{route('speech-index')}}">  
                        <div class="card">
                            <div class="img-content">
                                    <img height="120px" width="120px" style="margin-left: 6px;" src="{{asset('public\images\speech.png')}}">
                            </div>
                            <div class="title-card">
                                     <h4>Create Event</h4>
                                </div>
                         </div>
                       </a> 
                    </div>
                     <div class="col-sm-2">  
                        <a href="{{route('speech-score-entry')}}"> 
                        <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\mark_entry.png')}}">
                            </div>
                            <div class="title-card">
                                    <h4>Score Entries</h4>
                                </div>
                        </div>
                        </a>
                    </div>    
                     <div class="col-sm-2">
                        <a href="{{route('speech-score-list')}}">
                            <div class="card">
                                <div class="img-content">
                                        <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\mark_list.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>Score List</h4>
                                    </div>
                            </div>
                        </a>
                    </div> 

                    <div class="col-sm-3">   
                        <div class="card">
                           <a href="{{route('speech-score-get')}}">
                                <div class="img-content">
                                        <img height="100px" width="150px" style="margin-left: 6px;" src="{{asset('public\images\Results-rewind-2020.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>View Result</h4>
                                </div>                        
                            </a>                                
                        </div>                   
                    </div>  
                                       
                </div>                   
            </div>
              <!-- certificate -->
            <div class="container">
                <div class="row">
                    <div class="header-title margin-bt-2">
                        <div class="header-dash" style="background-color:#0865ab;color: #efecec;">
                            Certificate Generator
                            <div class="header-square" style="background-color:#efecec;"></div>
                        </div>
                    </div>                    
                     <div class="col-sm-3">
                      <a href="{{route('certificate-gen')}}">  
                        <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\halltickets.png')}}">
                            </div>
                            <div class="title-card">
                                     <h4>Certificate<br>Generator</h4>
                                </div>
                         </div>
                       </a> 
                    </div> 
                                       
                </div>                   
            </div>

            <!-- CA exam -->
               <div class="container">
                <div class="row">
                    <div class="header-title margin-bt-2">
                        <div class="header-dash" style="background-color:#e6bf02;color: #e64305;">
                           CA EXAM
                            <div class="header-square" style="background-color:#e64305;"></div>
                        </div>
                    </div>                    
                     <div class="col-sm-3">
                      <a href="{{route('ca-index')}}">  
                        <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="150px" style="margin-left: 6px;" src="{{asset('public\images\exam.png')}}">
                            </div>
                            <div class="title-card">
                                     <h4>Create Exam</h4>
                                </div>
                         </div>
                       </a> 
                    </div>
                     <div class="col-sm-2">  
                        <a href="{{route('ca-mark-entry')}}"> 
                        <div class="card">
                            <div class="img-content">
                                    <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\mark_entry.png')}}">
                            </div>
                            <div class="title-card">
                                    <h4>Score Entries</h4>
                                </div>
                        </div>
                        </a>
                     </div>    
                     <div class="col-sm-2">
                        <a href="{{route('ca-mark-index')}}">
                            <div class="card">
                                <div class="img-content">
                                        <img height="100px" width="100px" style="margin-left: 6px;" src="{{asset('public\images\mark_list.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>Score List</h4>
                                    </div>
                            </div>
                        </a>
                    </div> 
                    <div class="col-sm-3">   
                        <div class="card">
                           <a href="{{route('ca-get-mark')}}">
                                <div class="img-content">
                                        <img height="100px" width="150px" style="margin-left: 6px;" src="{{asset('public\images\Results-rewind-2020.png')}}">
                                </div>
                                <div class="title-card">
                                         <h4>View Result</h4>
                                </div>                        
                            </a>                                
                        </div>                   
                    </div>  
                                       
                </div>                   
            </div>
                       
            </div>
        
           
@endsection