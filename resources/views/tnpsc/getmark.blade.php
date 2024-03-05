@extends('layouts.result_layout')
@section('content')
<div class="container">
    <div class="header-title margin-bt-2">
        <div class="header" style="border-bottom: none;">TNPSC Result - {{$active_exam->exam_name}}</div>
    </div>
    <div style="width:60%;margin-left: 20%;text-align: center;"> 
        <form method="POST" action="{{ route('view-mark') }}">
            {{csrf_field()}}
                 @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <input type="number" name="mob_no" pattern="[1-9]{1}[0-9]{9}"class="mt-1 form-control inp"  placeholder="Enter Candidate Mobile Number" id="number" required ><br> 
                 <button id="ok" type="submit" class="text-center mt-3 text-white btn btn-danger form-control" style="width:30%">GET MARKS</button><br>
        </form>
    </div>
</div>
   
  @endsection