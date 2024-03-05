@extends('layouts.result_layout')
@section('content')
<style type="text/css">
    .width-3{
        width: 30%;
    }
</style>
    <div class="container">
              <div class="header-title margin-bt-2">
                    <div class="header" style="border-bottom: none;">TNPSC MARK LIST</div>
            </div> 
               <div class="w-6 mb-4">
               <label>Filter Exam</label>
             
                  {{csrf_field()}}
                <select class="form-control width-3" name="exam" id="exam">
                  <option value="0">Select Exam</option>
                @foreach($exams as $data)
                    @if($data->id==$active->id)
                        <option value="{{$data->id}}" selected>{{$data->exam_name}}</option>
                    @else
                        <option value="{{$data->id}}" >{{$data->exam_name}}</option>
                    @endif  
                @endforeach 
                </select>
                <span class="text-danger" id="error-info" ></span><br>
             
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table" id="datatable">
                	<thead>
                    <tr>
                           <th>#</th>
                           <th>Mobile Number</th>
                           <th>Name</th>
                           <th>Exam</th>
                           <th>Tamil Mark</th>
                           <th>GS Mark</th>
                           <th>Action</th>
                    </tr>
                   </thead>
                    <tbody>
                 <?php $i=1; ?>
                 @foreach($details as $data)
                 <tr>
                  <th scope="row">{{$i}}</td>
                        <td>{{$data->mob_no}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->getExam->exam_name}}</td>
                        <td>{{$data->tamil}}</td>
                        <td>{{$data->gs}}</td>
                        <td><a href="{{url('delete')}}/{{$data->id}}">
                        <i class="fa fa-trash"></i>
                        </a></th>
                    </tr>
                  <?php $i++ ?> 
                  @endforeach
                  </tbody>   
                </table>
            </div>
    </div>   
<script type="text/javascript">
     $(document).ready(function(){
            new DataTable('#datatable');
        });
</script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#exam').change(function(){
        var id = $(this).val();
        var url = "{{ url('active_exam_select') }}/"+id;
        if(id!=0){
       location.href = url;
      }
      });
    });
</script> 

@endsection