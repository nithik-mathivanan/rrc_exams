@extends('layouts.result_layout')
@section('content')
<div class="container">
    <form method="POST" id="form-error" action="{{ route('ca-mark-store') }}">
        {{csrf_field()}}
   
            <div class="header-title margin-bt-2">
                <div class="header" style="border-bottom: none;">CA MARK ENTRIES</div>
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
           <input type="hidden" name="type" id="type" value="{{$exams->type}}">
            <label>Current Exam :</label>
            <select class="form-control mt-3" disabled  name="exam">  
                <option value="{{$exams->id}}">{{$exams->name}}</option>   
            </select>

            <label>Candidate Mobile:</label><span id="error" style="color: red; "></span>
            <input type="number" id="number" name="mob_no" pattern="[1-9]{1}[0-9]{9}"class="mt-1 form-control inp"  placeholder="Enter Mobile Number" required value="{{old('mob_no')}}"><br>
           
            <label>Candidate Name:</label>
            <input type="text" name="name" class="mt-3 form-control"  placeholder="Enter Name" required  value="{{old('name')}}"><br>
            <div class="all_mark">
           <span id="mark_error" style="flood-color: red"></span>
            @if($exams->type==1)
             <label>Accounts Mark :</label>     
            <input type="text" name="accounts" class="mt-3 form-control mark" max="100" id="accounts"  placeholder="Enter Mark" required value="{{old('accounts')}}"><br>

             <label>Business Law Mark :</label>
            <input type="number" name="business_law" class="mt-3 form-control mark" max="100" message="you can give score -10 to +10 only" id="business_law" placeholder="Enter Mark" required value="{{old('business_law')}}"><br>

             <label>Quantitative Aptitude Mark :</label>
            <input type="text" name="quantitative_aptitude" class="mt-3 form-control mark" max="100" id="quantitative_aptitude" placeholder="Enter Mark" required value="{{old('quantitative_aptitude')}}"><br>

             <label>Business Economics Mark :</label>
            <input type="text" name="business_economics" class="mt-3 form-control mark" max="100" id="business_economics" placeholder="Enter Mark" required value="{{old('business_economics')}}"><br>
            
            @elseif($exams->type==2)
            <label>Advanced Accounting Mark :</label>     
            <input type="text" name="advanced_accounting" class="mt-3 form-control mark" max="100" id="advanced_accounting"  placeholder="Enter Mark" required value="{{old('advanced_accounting')}}"><br>

             <label>Corporate and Other Laws Mark :</label>
            <input type="text" name="COL" class="mt-3 form-control mark" id="COL" max="100" placeholder="Enter Mark" required value="{{old('COL')}}"><br>

             <label>Taxation Mark :</label>
            <input type="text" name="taxation" class="mt-3 form-control mark" id="taxation" max="100" placeholder="Enter Mark" required value="{{old('taxation')}}"><br>

             <label>Cost and Management Accounting Mark :</label>
            <input type="text" name="CMA" class="mt-3 form-control mark" id="CMA" max="100" placeholder="Enter Mark" required value="{{old('CMA')}}"><br>

            <label>Auditing and Ethics Mark :</label>
            <input type="text" name="auditing_ethics" class="mt-3 form-control mark" max="100" id="auditing_ethics" placeholder="Enter Mark" required value="{{old('auditing_ethics')}}"><br>

             <label>Financial Management Mark :</label>
            <input type="text" name="financial_management" class="mt-3 form-control mark" max="100" id="financial_management" placeholder="Enter Mark" required value="{{old('financial_management')}}"><br>

            <label>Strategic Management Mark :</label>
            <input type="text" name="strategic_management" class="mt-3 form-control mark" max="100" id="strategic_management" placeholder="Enter Mark" required value="{{old('strategic_management')}}"><br>

            @else
             <label>Business Laws and Ethics Mark :</label>
            <input type="text" name="BLE" class="mt-3 form-control mark" id="BLE" max="100" placeholder="Enter Mark" required value="{{old('BLE')}}"><br>

             <label>Financial Accounting Mark :</label>
            <input type="text" name="financial_accounting" class="mt-3 form-control mark" max="100" id="financial_accounting" placeholder="Enter Mark" required value="{{old('financial_accounting')}}"><br>

             <label>Direct and Indirect Taxation Mark :</label>
            <input type="text" name="DIT" class="mt-3 form-control mark" id="DIT" max="100" placeholder="Enter Mark" required value="{{old('DIT')}}"><br>

            <label>Cost Accounting Mark :</label>
            <input type="text" name="cost_accounting" class="mt-3 form-control mark" max="100" id="cost_accounting" placeholder="Enter Mark" required value="{{old('cost_accounting')}}"><br>

             <label>Operation Management and Strategic Management Mark :</label>
            <input type="text" name="OMSM" class="mt-3 form-control mark" id="OMSM" max="100" placeholder="Enter Mark" required value="{{old('OMSM')}}"><br>

            <label>Corporate Accounting and Auditing Mark :</label>
            <input type="text" name="CAA" class="mt-3 form-control mark" id="CAA" max="100" placeholder="Enter Mark" required value="{{old('CAA')}}"><br>

             <label>Financial Management and Business Data Analytics Mark :</label>
            <input type="text" name="FMBDA" class="mt-3 form-control mark" id="FMBDA" max="100" placeholder="Enter Mark" required value="{{old('FMBDA')}}"><br>

             <label>Management Accounting Mark :</label>
            <input type="text" name="management_accounting" class="mt-3 form-control mark" max="100" id="management_accounting" placeholder="Enter Mark" required value="{{old('management_accounting')}}"><br>
            @endif
           </div>
            <label>Total :</label>
            <input type="text" name="total" class="mt-3 form-control tmark" id="total" placeholder="Enter Total Mark" required value="{{old('total')}}"><br>
            <div class="text-center">
                 <button id="ok" type="submit" class="text-center mt-3 text-white btn btn-danger form-control" style="width:30%">SUBMIT MARKS</button><br>
            </div>

    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.tmark').change(function(){
          var mark=$('#total').val();
          var type=$('#type').val();
          if(type==1 && mark>400){
                alert('Total mark should be lesser than 400');
                $('#total').val('');
          }
           if(type==2 && mark>700){
                alert('Total mark should be lesser than 700');
                $('#total').val('');
          }
           if(type==3 && mark>800){
                alert('Total mark should be lesser than 800');
                $('#total').val('');
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
         var type=$('#type').val();
         console.log(exam_id);
         console.log(number); 
         $.ajax({
           url: "{{url('ca_number_validation')}}/"+number+"/"+exam_id+"/"+type,
           type:'GET',
           success:function(response){
            console.log(response);
            if(response==1){
                $('#error').html('The mobile number is already exist for this exam') ;
                $('#number').val('');
                 return false;
            }
            else{
                $('#error').html('') ;
             return true;
              }
           }
          });
         
       }); 
         $('.mark').change(function(){
              
               var max = parseInt($(this).attr('max'));
               var min = parseInt($(this).attr('min'));
   if ($(this).val() > max)
   {
      $(this).val('');
      $('#mark_error').val("The mark should be less than 100");
   }
   else if ($(this).val() < min)
   {
      $(this).val('');
   }       
 }); 

        
      });
    
</script>
@endsection