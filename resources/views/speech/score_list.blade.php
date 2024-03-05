@extends('layouts.result_layout')
@section('content')
<style type="text/css">
    .width-3{
        width: 30%;
    }
</style>
    <div class="container">
              <div class="header-title margin-bt-2">
                    <div class="header" style="border-bottom: none;">SCORE LIST</div>
            </div> 
             <label>Filter Event</label>
             
                  {{csrf_field()}}
                <select class="form-control width-3" name="event" id="event">
                  <option value="0">Select Event</option>
                @foreach($event as $data)
                    @if($data->id==$active->id)
                        <option value="{{$data->id}}" selected>{{$data->name}}</option>
                    @else
                        <option value="{{$data->id}}" >{{$data->name}}</option>
                    @endif  
                @endforeach 
                </select>
                <span class="text-danger" id="error-info" ></span><br>
             
            <hr>
            <div class="table-responsive">
                <table class="table" id="datatable">
                	<thead>
                    <tr>
                           <th>#</th>
                           <th>Mobile Number</th>
                           <th>Event</th>
                           <th>Name</th>
                           <th>Title</th>
                           <th>Score</th>
                           <th>Selected or Not</th>
                          
                           <th>Action</th>
                    </tr>
                   </thead>
                    <tbody>
                 <?php $i=1; ?>
                 @foreach($score as $data)
                 <tr>
                  <th scope="row">{{$i}}</td>
                        <td>{{$data->number}}</td>
                        <td>{{$data->event_name}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->score}}</td>
                        @if($data->status==0)
                         <td>Selected</td>
                         @else
                         <td>Not Selected</td>
                        @endif
                        <td><a href="{{url('speech_score_delete')}}/{{$data->id}}">
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
       
     $('#event').change(function(){
      var id = $(this).val();
      var url = "{{url('speech_active_select')}}/"+id;
       if(id!=0){
       location.href = url;
      }
        });
     });
</script>      
@endsection