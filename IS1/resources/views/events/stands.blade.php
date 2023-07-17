@extends('layout')

@section('main')
<h1>STANDS</h1>

<!--@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong> {{$message}}</strong>
</div>


@endif
-->
    <div class="container">
         <div class="row justify-content-center">
             <div class="col-sm-8">
                     <div class="card mt-3 p-3">
                     <form method="POST" action="{{ route('stands.create', ['eventId' => $event->id]) }}" enctype="multipart/form-data">
                     @csrf 
                     <div class="form-group">
                         <label> Stand Size</label> 
                         <select size="size" class="form-control">
                                <option value="">Select an option</option>
                                <option value="small">SMALL</option>
                                <option value="medium">MEDIUM</option>
                                <option value="large">LARGE</option>
                            </select>
                            @if($errors->has('size'))
                                <span class="text-danger">{{ $errors->first('size') }}</span>
                            @endif
                     </div>
                     <div class="form-group">
                         <label> Available spots </label> 
                         <input type="number" name="quantity" class="form-control" />
                         @if($errors->has('quantity'))
                         <span class="text-danger">{{$errors->first('quantity') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label> Price </label> 
                         <input type="number" name="date" class="form-control" step="0.01" />
                         @if($errors->has('quantity'))
                         <span class="text-danger">{{$errors->first('quantity') }}</span>
                         @endif
                     </div>
                     

                     <button type="submit" class="btn btn-dark">Submit</button>
                 </form>
                     </div>
             </div>
         </div>
       

    </div>
    <style>
    .container {
  margin: 0 auto;
  max-width: 800px;
  padding: 20px;
}

.row {
  display: flex;
  justify-content: center;
}

.col-sm-8 {
  flex-basis: 66.67%;
  max-width: 66.67%;
}

.card {
  margin-top: 15px;
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  font-weight: bold;
}

.input-control {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.textarea-control {
  width: 100%;
  height: 120px;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.text-danger {
  color: #dc3545;
}

.btn {
  display: inline-block;
  padding: 8px 12px;
  margin-top: 15px;
  background-color: #343a40;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn:hover {
  background-color: #23272b;
}
 </style>
@endsection