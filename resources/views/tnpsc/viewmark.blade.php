@extends('layouts.result_layout')
@section('content')
<style type="text/css">
    th{
        text-align: center;
    }
</style>
<div class="container">
    <div class="header-title margin-bt-2">
        <div class="header" style="border-bottom: none;">TNPSC Result - {{$active_exam->exam_name}}</div>
    </div>  

    <div class="table-responsive" style="width:50%;margin-left:25%">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Name: {{$getmark->name}}</th>
                </tr>
                <tr>
                  <th colspan="2">Mobile: {{$getmark->mob_no}}</th>
                </tr>
                <tr>
            </thead>
            <tbody>
                <tr>
                  <td><b>Tamil :</b></td>
                  <td>{{$getmark->tamil}}</td>
                </tr>
                <tr>
                  <td><b>GS :</b></td>
                  <td>{{$getmark->gs}}</td>
                </tr>
                <tr>
                  <td><b>Total :</b></td>
                  <td style="font-size:18px;"><b>{{$getmark->gs+$getmark->tamil}}</b></td>
                </tr>
            </tbody>
        </table>
    </div>   
</div>            
@endsection