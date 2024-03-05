@extends('layouts.result_layout')
@section('content')

<div class="container">
    <form method="POST" action="{{ route('speech-score-store') }}">
        {{csrf_field()}}
            <div class="header-title margin-bt-2">
                    <div class="header" style="border-bottom: none;">SCORE ENTRY</div>
            </div>   
            @foreach($errors->all() as $error)
                <li style="color: red">{!!   $error !!}</li>
            @endforeach

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <label>Active Event :</label>
            <input type="hidden" id="event_id" name="id" value="{{$event->id}}">
           <input type="hidden" value="{{$event->mark}}" id="total_mark">
             <select class="form-control mt-3" disabled  name="event">  
                <option value="{{$event->id}}">{{$event->name}}</option>   
            </select>
            
            <label>Name:</label>
            <input type="text" name="name" class="mt-3 form-control"  placeholder="Enter Name" required  value="{{old('name')}}"><br>
            
             <label>Mobile Number:</label> <span id="error" style="color: red; "></span>
            <input type="text" name="number" class="mt-3 form-control" id="number"  placeholder="Enter Mobile Number" required  value="{{old('number')}}"><br>

           

            <label>Title:</label>
            <input type="text" name="title" class="mt-3 form-control"  placeholder="Enter Title" required  value="{{old('title')}}"><br>

            

            <label>Score:</label><br>
            <span style="color: red;" id="error1"></span>
            <input type="text" name="score" class="mt-3 form-control"  placeholder="Enter Score" id="score" required  value="{{old('score')}}"><br>

            <input type="checkbox" name="select"> <span><b>Selected or Not Selected</b></span>

            <div class="text-center">
                 <button id="ok" type="submit" class="text-center mt-3 text-white btn btn-danger form-control" style="width:30%">SUBMIT</button><br>
            </div>
           
            

    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#score').change(function(){
            var score = parseInt($('#score').val());
            var total = parseInt($('#total_mark').val());
            console.log(score);
            console.log(total);
            if(score>total){
                $('#score').val('');
                $('#error1').html('Score Must be Less than'+' '+total);
            }
            else{

                $('#error1').hide();

            }

        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#form-error').submit(function(){
        var number = $('#number').val();
        var event_id = $('#event_id').val();   
         if (number.length!=10){  
            $('#error').html('Enter valid mobile number');
            return false;
         }  

         });  
         $('#number').change(function(){
         var number = $('#number').val();
         var event_id = $('#event_id').val();
          
         $.ajax({
           url: "{{url('speech_mobile_validation')}}/"+number+"/"+event_id,
           type:'GET',
           success:function(response){
            console.log(response);
            if(response==1){
                $('#error').html('The mobile number is already exist for this event') ;
                $('#number').val('');
                 return false;
            }
            else{
             return true;
            }
           }
          });
         
       }); 
      });
    
</script>

@endsection