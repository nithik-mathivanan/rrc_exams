
<!DOCTYPE html>
<html>
 
<head>
    <title> Import and Export Excel data to database Using Laravel 5.8 </title>
    <link rel="stylesheet"
        href=
"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
 
<body>

<body class="" style="background-image: linear-gradient(#3090C7, #3090C7)">
     <a href="{{ url('/dashboard') }}">
  <button class="btn btn-success mt-2" style="float: left; margin-left: 16px;">DASHBOARD</button></a>
        
    <a href="{{ url('/signout') }}">
  <button class="btn btn-danger mt-2" style="float: right;margin-right: 16px;">LOGOUT</button></a>

  <div style="display: flex;justify-content: center;" class="pt-5">
    <div class="text-center bg-light  mt-5 p-5 d-inline-block fs-7" >
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                TNPSC Hall Ticket Generator
            </div>
            <div class="card-body">
                <form action="{{ route('tnpsc-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="tnpsc" class="form-control" required>
                    <br>
                     @if($errors->any())
                        {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                    @endif
                    <button class="btn btn-primary" type="submit">
                          Generate Excel
                       </button><a href="{{asset('public/sample/tnpsc_sample.xlsx')}}" style="margin-left: 5px;">Download Sample</a>
                   
                </form>
            </div>
        </div>
    </div>
    </div>
 </div>
</div>
</body>
 
</html>