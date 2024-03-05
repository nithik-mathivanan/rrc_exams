@extends('layouts.result_layout')
@section('content')
<style type="text/css">
    .width-3{
        width: 30%;
    }
</style>

    <div class="container">
              <div class="header-title margin-bt-2">
                    <div class="header" style="border-bottom: none;">EVENT LIST</div>
                    <a href="{{route('speech-create')}}"><button class="btn btn-dark" style="float: right;margin-top: 2px;">ADD EVENT</button></a>
            </div>
              <div class="w-6 mb-4">
               <label>Active Exam</label>
                <select class="form-control width-3" id="exam">
                  
                  @foreach($event as $data)
                  @if($active && $data->id==$active->id)
                    <option value="{{$data->id}}" selected>{{$data->name}}</option>
                   @else
                     <option value="{{$data->id}}" >{{$data->name}}</option>
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
                           <th>Name</th>
                           <th>Total Score</th>
                           <th>Select</th>
                           <th>Not select</th>
                           <th>Action</th>
                    </tr>
                   </thead>
                    <tbody>
                 <?php $i=1; ?>
                 @foreach($event as $data)
                 <tr>
                       <td scope="row">{{$i}}</td>
                        <td style="width: 10%">{{$data->name}}</td>
                        <td style="width: 10%">{{$data->mark}}</td>
                        
                        <td class="select_con" style="width: 40%"><?php echo substr($data->selected, 0,30) . '.....'; ?><a href="#" style="font-size: 13px" class="show_hide">Read More</a><input type="hidden" name="" value="{{$data->selected}}" class="select"></td>

                       
                        <td style="width: 40%"><?php echo substr($data->notselected, 0,30) . '.....'; ?><a href="#" style="font-size: 13px" class="show_hide" data-content="toggle-text">Read More</a><input type="hidden" name="" value="{{$data->notselected}}"></td>
                        @if($data->status==0)
                        <td><a href="{{url('speech_delete')}}/{{$data->id}}">
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
      $('#exam').change(function(){
           
        });
</script>    
<script type="text/javascript">
  $(document).ready(function(){
    $('#exam').change(function(){
      var exam = $('#exam').val();
      console.log(exam);
      $.ajax({
        url:"{{url('speech_active')}}/"+exam,
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
    $('.show_hide').click(function(){
      var select = $(this).next('input').val();
      $(this).parent().html(select);



    });

  });
</script>   
@endsection