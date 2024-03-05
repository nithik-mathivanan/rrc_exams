@extends('layouts.result_layout')
@section('content')
<div class="container">
    <form method="POST" id="form-error" action="{{ route('store-bank-mark') }}">
        {{csrf_field()}}
   
            <div class="header-title margin-bt-2">
                <div class="header" style="border-bottom: none;">BANK MARK ENTRIES</div>
            </div>  
            @foreach($errors->all() as $error)
                <li style="color: red">{!!   $error !!}</li>
            @endforeach

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <input type="hidden" id="exam_id" name="id" value="{{$exams->id}}">

            <label>Current Exam :</label>
            <select class="form-control mt-3" disabled  name="exam">  
                <option value="{{$exams->id}}">{{$exams->exam_name}}</option>   
            </select>

            <label>Candidate Mobile:</label><span id="error" style="color: red; "></span>
            <input type="number" id="number" name="mob_no" pattern="[1-9]{1}[0-9]{9}"class="mt-1 form-control inp"  placeholder="Enter Mobile Number" required value="{{old('mob_no')}}"><br>
           
            <label>Candidate Name:</label>
            <input type="text" name="name" class="mt-3 form-control"  placeholder="Enter Name" required  value="{{old('name')}}"><br>
            
            
             <label>English Mark :</label>     
            <input type="text" name="english" class="mt-3 form-control mark" id="english"  placeholder="Enter Mark" required value="{{old('english')}}"><br>

             <label>Aptitude Mark :</label>
            <input type="text" name="aptitude" class="mt-3 form-control mark" id="aptitude" placeholder="Enter Mark" required value="{{old('aptitude')}}"><br>

             <label>Reasoning Mark :</label>
            <input type="text" name="reasoning" class="mt-3 form-control mark" id="reasoning" placeholder="Enter Mark" required value="{{old('reasoning')}}"><br>

            <label>Total :</label>
            <input type="text" name="total" class="mt-3 form-control mark" id="total" placeholder="Enter Total Mark" required value="{{old('total')}}"><br>
            <div class="text-center">
                 <button id="ok" type="submit" class="text-center mt-3 text-white btn btn-danger form-control" style="width:30%">SUBMIT MARKS</button><br>
            </div>

    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.mark').change(function(){
            var english = $('#english').val();
            var aptitude = $('#aptitude').val();
            var reasoning = $('#reasoning').val();

            if(english>30){
                alert('english mark should be lesser than 30');
                $('#english').val('');
            }
            if(aptitude>35){
                alert('aptitude mark should be lesser than 35');
                $('#aptitude').val('');
            }
            if(reasoning>35){
                 alert('reasoning mark should be lesser than 35');
                $('#reasoning').val('');
            }


        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#form-error').submit(function(){
        var number = $('#number').val();
        var exam_id = $('#exam_id').val();   
         if (number.length!=10){  
            $('#error').html('Enter valid mobile number');
            return false;
         }  

         });
         $('#number').change(function(){
         var number = $('#number').val();
         var exam_id = $('#exam_id').val(); 
         console.log(exam_id);
         console.log(number); 
         $.ajax({
           url: "{{url('bank_mobile_validation')}}/"+number+"/"+exam_id,
           type:'GET',
           success:function(response){
            console.log(response);
            if(response==1){
                $('#error').html('The mobile number is already exist for this exam') ;
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