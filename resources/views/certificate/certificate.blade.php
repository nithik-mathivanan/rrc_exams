<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Certificate</title>
	<style type="text/css">
		.container {
  position: relative;
  text-align: center;
  color: black;
	}


	.name {
		font-size: 25px;
	  position: absolute;
	  top: 51%;
	  left: 50%;
	  transform: translate(-50%, -50%);
	  font-family: sans-serif;
	  font-weight: bold;
	}
	.date {
		font-size: 25px;
	  position: absolute;
	  top: 71%;
	  left: 70%;
	  transform: translate(-50%, -50%);
	  font-family: sans-serif;
	  font-style: italic;
	  font-weight: bold;
	  color: #252441;
	}
	</style>
</head>
<body>

@foreach($excel as $key=> $value)
	@if($key!=0)
	  <div class="container">
	  	<img src="{{asset('public/certificate_images/certificate.jpg')}}" alt="Snow" style="width:100%;">
			<div class="name">{{$value[0]}}</div>
			<div class="date"><?php echo date('d-m-Y',strtotime($input_date)) ;?></div>
		</div>
	@endif
 @endforeach

</body>
</html>