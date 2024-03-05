
@extends('layouts.result_layout')
@section('content')
 
        <div class="container">
   
           <div class="header-title margin-bt-2">
            <div class="row">
                  <div class="header col-sm-6" style="border-bottom: none;">TNPSC - HALL TICKET</div>
                  <div class="col-sm-6">
                       <a href="{{route('tnpsc-change-input')}}">
                       <button class="btn btn-primary" style="float:right;">CHANGE INPUTS</button></a>
                  </div>
                  
            </div>
                  
                   
            </div>
            
            <div class="card-body">
                <form action="{{ route('tnpsc-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="tnpsc" class="form-control" required>
                    <a href="{{asset('public/sample/excel_sample.xlsx')}}" style="margin-left: 5px; display: inline;">Download Sample</a>
                    <br>
                     @if($errors->any())
                        {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                    @endif
                    <div class="text-center">
                        <button id="ok" type="submit" class="text-center mt-3 text-white btn btn-danger form-control" style="width:30%">Generate Excel</button><br>
                   </div>
                   
                </form>
            </div>        
        </div>



 
  @endsection