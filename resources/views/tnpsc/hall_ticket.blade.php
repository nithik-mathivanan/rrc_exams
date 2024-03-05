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
    <table border="1"width="100%">
    	<tr>
    		<td >
    			<img src="{{asset('public/attachment/scan.png')}}" ><br>
                <span>For Website</span>
    		</td>
    		<td colspan="2">
    			
    			<img src="{{asset('public/attachment/rrc_logo.png')}}" height="70px" width="400px;" style="margin-left: 50px;">
    		</td>
    	</tr>
    	<tr>
    		<td colspan="3" style="height: 10px;">
    			<h3 class="txt-centre">HALL TICKET</h3>
    			<h3 class="txt-centre">TNPSC MODEL EXAM – 2023</h3>
    		</td>
    	</tr>
    	<tr style="border: none">
    		<td>
    			Name
    			
    		</td>
    		<td>
    			{{$value[1]}}
    		</td>
    		<td style="border: none">
    			<p>Affix your passport size photo</p>
    		</td>
    	</tr>
    	<tr style="border: none;">
    		<td>
    			Roll Number
    			
    		</td>
    		<td>
    			<?php echo 'RRC-BANK-C-'.$key?>
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
    		</td>
    	</tr>
    	<tr>
    		<td>
    			Date of Examination
    		</td>
    		<td>
    			{{$input->date}}
    		</td>
    	</tr>
    	<tr>
    		<td>
    			Exam Time
    		</td>
    		<td>
    			{{$input->time}}
    		</td>
    	</tr>
    	<tr>
    		<td>
    			Venue
    		</td>
    		<td>
                <div>{{$input->venue}}</div>
               <!--  <div>RRC Educational Trust - Seminar Hall,</div>
                <div>Deen Complex,Marrys Corner </div>
                <div> Thanjavur.</div> -->
                <!-- <div>Mob: 8015696970</div> -->
    		</td>
    	</tr>
    </table>
   
    <table style="margin-top: 10px;width: 100%;" border="1">
    	
    	 <tr style="height:20px;" >
    		<td width="10px">
    			<br><br>
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