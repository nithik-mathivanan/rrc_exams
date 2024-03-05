@extends('layouts.result_layout')
@section('content')
<style type="text/css">
    th{
        text-align: center;
    }
</style>
<div class="container">
    <div class="header-title margin-bt-2">
        <div class="header" style="border-bottom: none;">NEET Result - {{$active_exam->exam_name}}</div>
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
                  <td><b>Physics :</b></td>
                  <td>{{$getmark->physics}}</td>
                </tr>
                <tr>
                  <td><b>Chemistry :</b></td>
                  <td>{{$getmark->chemistry}}</td>
                </tr>
                <tr>
                  <td><b>Biology :</b></td>
                  <td>{{$getmark->biology}}</td>
                </tr>
               
                <tr>
                  <td><b>Total :</b></td>
                  <td style="font-size:18px;"><b>{{$getmark->total}}</b></td>
                </tr>
            </tbody>
        </table>
    </div>   
</div>            
@endsection