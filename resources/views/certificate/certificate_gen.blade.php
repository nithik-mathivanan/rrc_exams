
@extends('layouts.result_layout')
@section('content')
 
        <div class="container">
           <div class="header-title margin-bt-2">
               <div class="row">
                  <div class="header col-sm-6" style="border-bottom: none;">CERTIFICATE GENERATE</div>
               </div>     
           </div>
            
            <div class="card-body">
                <form action="{{ route('certificate-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Enter Date:</label>
                    <input type="date" name="date" class="form-control mb-4" placeholder="Date">
                    <label>Attach Excel: <a href="{{asset('public/sample/certificate_sample.xlsx')}}" style="margin-left: 5px; display: inline;">(Download Sample)</a></label>
                    <input type="file" name="certificate" class="form-control" required>
                   
                    <br>
                     @if($errors->any())
                        {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                    @endif
                    <div class="text-center">
                        <button id="ok" type="submit" class="text-center mt-3 text-white btn btn-danger form-control" style="width:30%">Generate Certificate</button><br>
                   </div>
                   
                </form>
            </div>        
        </div>



 
  @endsection