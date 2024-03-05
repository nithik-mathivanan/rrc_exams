@extends('layouts.result_layout')
@section('content')

<div class="container">
    <form method="POST" action="{{ route('store-tnpsc-exam-name') }}">
        {{csrf_field()}}
            <div class="header-title margin-bt-2">
                    <div class="header" style="border-bottom: none;">CREATE TNPSC EXAMS</div>
            </div> 
             
            @foreach($errors->all() as $error)
                <li style="color: red">{!!   $error !!}</li>
            @endforeach

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
           
            
            <label>Exam Name:</label>
            <input type="text" name="name" class="mt-3 form-control"  placeholder="Enter Exam Name" required  value="{{old('name')}}"><br>

            <div class="text-center">
                 <button id="ok" type="submit" class="text-center mt-3 text-white btn btn-danger form-control" style="width:30%">SUBMIT MARKS</button><br>
            </div>
           
            

    </form>
</div>

@endsection