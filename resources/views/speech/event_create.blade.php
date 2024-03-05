@extends('layouts.result_layout')
@section('content')

<div class="container">
    <form method="POST" action="{{ route('speech-store') }}">
        {{csrf_field()}}
            <div class="header-title margin-bt-2">
                    <div class="header" style="border-bottom: none;">CREATE SPPECH EVENT</div>
            </div>   
            @foreach($errors->all() as $error)
                <li style="color: red">{!!   $error !!}</li>
            @endforeach

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
           
            
            <label>Event Name:</label>
            <input type="text" name="name" class="mt-3 form-control"  placeholder="Enter Event Name" required  value="{{old('name')}}"><br>
            <label>Total Mark:</label>
            <input type="number" name="mark" class="mt-3 form-control"  placeholder="Enter Total Mark" required  value="{{old('mark')}}"><br>
            <label>Selected</label>
            <textarea class="mt-3 form-control" required name="select"></textarea><br>
             <label>Not Selected</label>
            <textarea class="mt-3 form-control" required name="notselect"></textarea><br>

            <div class="text-center">
                 <button id="ok" type="submit" class="text-center mt-3 text-white btn btn-danger form-control" style="width:30%">SUBMIT</button><br>
            </div>
           
            

    </form>
</div>

@endsection