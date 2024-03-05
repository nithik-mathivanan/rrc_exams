@extends('layouts.result_layout')
@section('content')
<style type="text/css">
    .width-3{
        width: 30%;
    }
</style>
    <div class="container">
              <div class="header-title margin-bt-2">
                    <div class="header" style="border-bottom: none;">BANK EXAMS LIST</div>
                    <a href="{{route('bank-exam-name')}}"><button class="btn btn-dark" style="float: right;margin-top: 2px;">ADD EXAMS</button></a>

            </div> 
            <div class="w-6 mb-4">
               <label>Active Exam</label>
                <select class="form-control width-3" id="exam">
                  
                  @foreach($exams as $data)
                  @if($active && $data->id==$active->id)
                    <option value="{{$data->id}}" selected>{{$data->exam_name}}</option>
                   @else
                    <option value="{{$data->id}}" >{{$data->exam_name}}</option>
                    @endif
                   @endforeach 
                </select>
               <span class="text-success " id="exam-success"></span> 
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table" id="datatable">
                	<thead>
                    <tr>
                           <th>#</th>
                           <th>Exams Name</th>
                           <th>Delete</th>
                    </tr>
                   </thead>
                  <tbody>
                 <?php $i=1; ?>
                 @foreach($exams as $data)
                 <tr>
                        <td scope="row">{{$i}}</td>
                        <td>{{$data->exam_name}}</td>
                        @if($data->status==0)
                        <td><a href="{{url('bank_exam_delete')}}/{{$data->id}}">
                        <i class="fa fa-trash"></i>
                        </a></td>
                        @else
                        <td></td>
                        @endif 
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
      var exam = $('#exam').val();
     

      $.ajax({
        url:"{{url('bank_active_exam')}}/"+exam,
        type:'GET',
        success:function(response){
          console.log(response);

        if(response){
            alert(response[1]+' '+'updated successfully');
            window.location.reload();
         }
        }
      });

    });
  });
</script>      
@endsection