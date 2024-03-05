@extends('layouts.result_layout')
@section('content')

<div class="container">
    <form method="POST" action="{{ route('update-input') }}">
        {{csrf_field()}}
            <div class="header-title margin-bt-2">
                    <div class="header" style="border-bottom: none;">NEET INPUT</div>
            </div>   
            @foreach($errors->all() as $error)
                <li style="color: red">{!!   $error !!}</li>
            @endforeach

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
             <label>Current Exam :</label>
            
            <input type="hidden" name="id" value="3">
              
            <label>Exam Date:</label>
            <input type="date" name="date" class="mt-1 form-control inp"  placeholder="Enter Exam Name" required value="{{old('date')}}"><br>
            
            <label>Exam Time:</label>
            <input type="text" name="time" class="mt-3 form-control"  placeholder="Enter Exam Time" required  value="{{old('time')}}"><br>
       

            <label>Exam Venue:</label>
            <input type="text" name="venue" class="mt-3 form-control"  placeholder="Enter Exam Venue" required value="{{old('venue')}}"><br>

            <label>Question Paper Medium:</label>
            <input type="text" name="medium" class="mt-3 form-control"  placeholder="Enter Medium" required value="{{old('medium')}}"><br>

            <div class="text-center">
                 <button id="ok" type="submit" class="text-center mt-3 text-white btn btn-danger form-control" style="width:30%">SUBMIT MARKS</button><br>
            </div>
           
            

    </form>
</div>

@endsection