<!DOCTYPE html>
<html>
  <head>
    <title>PDF Example by Object Tag</title>

    <style type="text/css">
    
    	td{
    		text-align: center;
    		font-size: 15px;
    		font-weight: bold;
    		padding: 10px;
    	}
    	.square{
    		margin-right: 3px;
    		height: 10px;
    		width: 10px;
    		border: 1px solid black;
    		display: inline-block
    	}
    </style>

  </head>
  <body>
  	@foreach($data as $key=> $value)
  	@if($key!=0)
    <table border="1" width="100%">
    	<tr>
    		<td >
    			<img src="{{asset('public/attachment/scan.png')}}" height="50px"><br>
                <span>For Website</span>
    		</td>
    		<td colspan="2">
    			
    			<img src="{{asset('public/attachment/rrc_logo.png')}}" height="70px" width="400px;" style="margin-left: 50px;">
    		</td>
    	</tr>
    	<tr>
    		<td colspan="3" style="height: 10px;">
    			<h3 class="txt-centre">HALL TICKET</h3>
    			<h3 class="txt-centre">JEE MODEL EXAM – 2024</h3>
    		</td>
    	</tr>
    	<tr style="border: none">
    		<td>Name</td>
    		<td>{{$value[1]}}</td>
    		<td style="border: none"><p>Affix your passport size photo</p></td>
    	</tr>
    	<tr style="border: none;">
    		<td>
    			Roll Number
    			
    		</td>
    		<td>
    			<?php echo 'NEET-B2-'.$key?>
    		</td>
    		<td style="border: none">
    			
    		</td>
    	</tr>
    		<tr>
    		<td>
    			Gender
    			
    		</td>
    		<td>
    			
    				<div class="square"></div>Male
	    			<div class="square"></div>Female
	    			<div class="square"></div>Others
    			
    			
    		</td>
    		<td style="border: none;height: 60px">
    			
    		</td>
    	</tr>
    	<!-- <tr>
    		<td>
    			Subject
    			
    		</td>
    		<td colspan="2">
    			General Studies (Degree Standard) + Aptitude and Mental Ability Test (SSLC Standard)
    		</td>
    	</tr> -->
    	<tr>
    		<td colspan="3" style="text-align: right; ">
    			<br><br>
    				<font style="margin-top: 20px;">Candidate Sign</font>
    		</td>
    	</tr>
    </table>
   <h4></h4>
    <table style="margin-top: 10px;" border="1" width="100%">
    	<tr>
    		<td>
    			Question Paper Medium
    		</td>
    		<td>
                {{$input->qp_medium}}
    			   <!-- <div class="square"></div>Tamil
              <div class="square"></div>English -->
    		</td>
    	</tr>
    	<tr>
    		<td>
    			Date of Examination
    		</td>
    		<td>
    			{{$input->time}}
    		</td>
    	</tr>
    	<tr>
    		<td>
    			Exam Time
    		</td>
    		<td>
    			{{$input->date}}
    		</td>
    	</tr>
    	<tr>
    		<td>
    			Venue
    		</td>
    		<td>
                {{$input->venue}}
               <!--  <div>RRC Educational Trust - Seminar Hall,</div>
                <div>Deen Complex,Marrys Corner </div>
                <div> Thanjavur.</div> -->
                <!-- <div>Mob: 8015696970</div> -->
    		</td>
    	</tr>
    </table>
    <h5><u>Instruction</u></h5>
    <ul>
      <li>Wear your identity card of your School</li>
      <li>Students are expected to be seated in the examination hall by 09:15 am</li>
      <li>Make sure that you are given the right question paper</li>
      <li>Do not write anything on the question paper except your roll number</li>
      <li>You are also not allowed to borrow calculators, or any other materials from other students</li>
    </ul>
   
    <table style="margin-top: 10px;width: 100%;" border="1">
    	
    	 <tr style="height:10px;" >
    		<td width="10px">
    			<br>
    		<h4>Invigilator Sign</h4>
    		</td>
    		<td width="10px" style="text-align: center;">
    			<img src="{{asset('public/attachment/signature.png')}}" ><br>
    			Controller of Examination
    		</td>
  		</tr>
    </table>
    @endif
    @endforeach
  </body>
</html>