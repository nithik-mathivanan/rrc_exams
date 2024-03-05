@extends('layouts.result_layout')
@section('content')
<style type="text/css">
    th{
        text-align: center;
    }
</style>
<div class="container">
    <div class="header-title margin-bt-2">
        <div class="header" style="border-bottom: none;">Result - {{$getmark->event_name}}</div>
    </div>  
  
    <div class="table-responsive" style="width:50%;margin-left:25%">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Name: {{$getmark->name}}</th>
                </tr>
                <tr>
                  <th colspan="2">Mobile: {{$getmark->number}}</th>
                </tr>
                <tr>
            </thead>
            <tbody>
                <tr>
                  <td><b>Title :</b></td>
                  <td>{{$getmark->title}}</td>
                </tr>
                <tr>
                  <td><b>Score :</b></td>
                  <td>{{$getmark->score}}</td>
                </tr>
              
                <tr>
                   @if($getmark->status==1)
                   <td><b>Status</b></td>
                  <td style="color: green;"><b>Selected</b></td>
                    
                @else
                 <td><b>Status</b></td>
                   <td style="color: red;"><b>Not Selected</b></td>
                  
                @endif   
                </tr>
            </tbody>
        </table>

    </div> 
    
      @if($getmark->status==1)
      <div style="width:52%;margin-left:24%;border: solid   #E9DCC9 1px;color: black;padding: 5px; margin-top: 4px;background-color: #FAF9F6">
        <span><b>{{$getmark->select_con}}</b></span>
       </div> 
        @else
        <div style="width:60%;margin-left:21%;border: solid   #E9DCC9 1px;color: black;padding: 5px; margin-top: 4px;background-color: #FAF9F6">
        <span><b>{{$getmark->notselect_con}}</b></span>
        @endif 
      </div>   
</div>            
@endsection