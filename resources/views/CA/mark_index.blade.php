@extends('layouts.result_layout')
@section('content')
<style type="text/css">
    .width-3{
        width: 30%;
    }
</style>
<div class="container">
 <div class="w-6 mb-4">
               <label>Filter Exam</label>
                <select class="form-control width-3" id="exam">
                  <option value="0">Select Exam</option>
                  @foreach($exams as $data)
                  @if($data->id==$active->id)
                    <option value="{{$data->id}}" selected>{{$data->name}}</option>
                   @else
                     <option value="{{$data->id}}" >{{$data->name}}</option>
                    @endif  
                   @endforeach 
                </select>
                <span class="text-success " id="exam-success"></span> 
            </div>
@if($active->type==1)
                <div class="header-title margin-bt-2">
                    <div class="header" style="border-bottom: none;">FOUNDATION MARK LIST</div>
                </div>        
    <div class="table-responsive">
        <table class="table datatable"  id="datatable">
        <thead>
           <tr>
               <th>#</th>
               <th>Mobile Number</th>
               <th>Name</th>
               <th>Accounts</th>
               <th>Business Law</th>
               <th>Quantitative Aptitude</th>
               <th>Business Economics</th>
               <th>Total</th>
               <th>Action</th>
           </tr>
       </thead>
        <tbody>
         <?php $i=1; ?>
         @foreach($foundation as $data)
           <tr>
               <td scope="row">{{$i}}</td>
               <td>{{$data->mob}}</td>
               <td>{{$data->name}}</td>
               <td>{{$data->accounts}}</td>
               <td>{{$data->business_law}}</td>
               <td>{{$data->quantitative_aptitude}}</td>
               <td>{{$data->business_economics}}</td>
               <td>{{$data->total}}</td>
               <td>
                    <a href="{{url('ca_fo_mark_delete')}}/{{$data->id}}">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
          <?php $i++ ?> 
          @endforeach
          </tbody>   
        </table>
     </div>
  
  
  @elseif($active->type==2)
    
                <div class="header-title margin-bt-2">
                    <div class="header" style="border-bottom: none;">CA-INTER MARK LIST</div>
                </div>
       
       <div class="table-responsive">
        <table class="table datatable"  id="datatable">
        <thead>
           <tr>
               <th>#</th>
               <th>Mobile Number</th>
               <th>Name</th>
               <th>Advanced Accounting</th>
               <th>Corporate and Other Laws</th>
               <th>Taxation</th>
               <th>Cost and Management Accounting</th>
               <th>Auditing and Ethics</th>
               <th>Financial Management</th>
               <th>Strategic Management</th>
               <th>Total</th>
               <th>Action</th>
           </tr>
       </thead>
        <tbody>
         <?php $i=1; ?>
         @foreach($ca_inter as $data)
           <tr>
               <td scope="row">{{$i}}</td>
               <td>{{$data->mob}}</td>
               <td>{{$data->name}}</td>
               <td>{{$data->advanced_accounting}}</td>
               <td>{{$data->COL}}</td>
               <td>{{$data->taxation}}</td>
               <td>{{$data->CMA}}</td>
               <td>{{$data->auditing_ethics}}</td>
               <td>{{$data->financial_management}}</td>
               <td>{{$data->strategic_management}}</td>
               <td>{{$data->total}}</td>
             
               <td>
                    <a href="{{url('ca_cai_mark_delete')}}/{{$data->id}}">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
          <?php $i++ ?> 
          @endforeach
          </tbody>   
        </table>

    </div>
</div>

@else

                <div class="header-title margin-bt-2">
                    <div class="header" style="border-bottom: none;">CMA-INTER MARK LIST</div>
                </div>
      
       <div class="table-responsive">
        <table class="table datatable"  id="datatable">
        <thead> 
            <tr>
               <th>#</th>
               <th>Mobile Number</th>
               <th>Name</th>
               <th>Business Laws and Ethics</th>
               <th>Financial Accounting</th>
               <th>Direct and Indirect Taxation</th>
               <th>Cost Accounting</th>
               <th>Operation Management and Strategic Management</th>
               <th>Corporate Accounting and Auditing</th>
               <th>Financial Management and Business Data Analytics</th>
               <th>Management Accounting</th>
               <th>Total</th>
               <th>Action</th>
           </tr>
       </thead>
           <tbody>
         <?php $i=1; ?>
         @foreach($cma_inter as $data)
           <tr>
               <td scope="row">{{$i}}</td>
               <td>{{$data->mob}}</td>
               <td>{{$data->name}}</td>
               <td>{{$data->BLE}}</td>
               <td>{{$data->financial_accounting}}</td>
               <td>{{$data->DIT}}</td>
               <td>{{$data->cost_accounting}}</td>
               <td>{{$data->OMSM}}</td>
               <td>{{$data->CAA}}</td>
               <td>{{$data->FMBDA}}</td>
                <td>{{$data->Management_accounting}}</td>
               <td>{{$data->total}}</td>
             
               <td>
                    <a href="{{url('ca_cmai_mark_delete')}}/{{$data->id}}">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
          <?php $i++ ?> 
          @endforeach
          </tbody>   
        </table>

    </div>
                              

@endif
   </div> 
<script type="text/javascript">
     $(document).ready(function(){
            new DataTable('.datatable');
        });
</script>    
<script type="text/javascript">
    $(document).ready(function(){
      $('#exam').change(function(){
       var id = $(this).val(); 
        var url = "{{url('ca_exam_select')}}/"+id;
         if(id!=0){
       location.href = url;
      }
      });
    });
</script>             
@endsection               