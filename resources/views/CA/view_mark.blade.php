@extends('layouts.result_layout')
@section('content')
<style type="text/css">
    th{
        text-align: center;
    }

</style>
<div class="container">
    <div class="header-title margin-bt-2">
        <div class="header" style="border-bottom: none;">CA/CMA Result - {{$active_exam->name}}</div>
    </div>  
    <div class="table-responsive" style="width:50%;margin-left:25%">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Name :{{$getmark->name}}</th>
                </tr>
                <tr>
                    <th colspan="2">Mobile Number :{{$getmark->mob}}</th>
                </tr>
            </thead>
            <tbody>
               @if($active_exam->type==1){
                <tr>
                  <td><b>Accounts :</b></td>
                  <td>{{$getmark->accounts}}</td>
                </tr>
                <tr>
                  <td><b>Business Law :</b></td>
                  <td>{{$getmark->business_law}}</td>
                </tr>
                <tr>
                  <td><b>Quantitative Aptitude :</b></td>
                  <td>{{$getmark->quantitative_aptitude}}</td>
                </tr>
                <tr>
                  <td><b>Business Economics :</b></td>
                  <td>{{$getmark->business_economics}}</td>
                </tr>
              }
              @elseif($active_exam->type==2){
                <tr>
                  <td><b>Advanced Accounting :</b></td>
                  <td>{{$getmark->advanced_accounting}}</td>
                </tr>
                <tr>
                  <td><b>Corporate and Other Laws :</b></td>
                  <td>{{$getmark->COL}}</td>
                </tr>
                <tr>
                  <td><b>Taxation :</b></td>
                  <td>{{$getmark->taxation}}</td>
                </tr>
                <tr>
                  <td><b>Cost and Management Accounting:</b></td>
                  <td>{{$getmark->CMA}}</td>
                </tr>
                 <tr>
                  <td><b>Auditing and Ethics :</b></td>
                  <td>{{$getmark->auditing_ethics}}</td>
                </tr>
                 <tr>
                  <td><b>Financial Management:</b></td>
                  <td>{{$getmark->financial_management}}</td>
                </tr>
                 <tr>
                  <td><b>Strategic Management:</b></td>
                  <td>{{$getmark->strategic_management}}</td>
                </tr>
            }
            @else{
             <tr>
                  <td><b>Business Laws and Ethics :</b></td>
                  <td>{{$getmark->BLE}}</td>
                </tr>
                <tr>
                  <td><b>Financial Accounting :</b></td>
                  <td>{{$getmark->financial_accounting}}</td>
                </tr>
                <tr>
                  <td><b>Direct and Indirect Taxation :</b></td>
                  <td>{{$getmark->DIT}}</td>
                </tr>
                <tr>
                  <td><b>Cost Accounting:</b></td>
                  <td>{{$getmark->cost_accounting}}</td>
                </tr>
                 <tr>
                  <td><b>Operation Management and Strategic Management :</b></td>
                  <td>{{$getmark->OMSM}}</td>
                </tr>
                 <tr>
                  <td><b>Corporate Accounting and Auditing:</b></td>
                  <td>{{$getmark->CAA}}</td>
                </tr>
                 <tr>
                  <td><b>Financial Management and Business Data Analytics:</b></td>
                  <td>{{$getmark->FMBDA}}</td>
                </tr>
                 <tr>
                  <td><b>Management Accounting:</b></td>
                  <td>{{$getmark->Management_accounting}}</td>
                </tr>

          }
          @endif
                 <tr>
                  <td><b>Total :</b></td>
                  <td style="font-size:18px;"><b>{{$getmark->total}}</b></td>
                </tr>
            </tbody>
        </table>
    </div>   
</div>            
@endsection