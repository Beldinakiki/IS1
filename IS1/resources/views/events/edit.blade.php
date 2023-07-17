@extends('layout')

@section('main')
    <div class="container">
         <div class="row justify-content-center">
             <div class="col-sm-8">
                     <div class="card mt-3 p-3">
                        <h3 class="text-muted"> Event Edit #{{$event ->name}}</h3>
                        <form method="POST" action="/events/{{$event->id }}/update" enctype="multipart/form-data">
                     @csrf 
                     
                     @method('PUT')
                     <div class="form-group">
                         <label> Name </label> 
                         <input type="text" name="name" class="form-control" value="{{$event->name}}" />
                         @if($errors->has('name'))
                         <span class="text-danger">{{$errors->first('name') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label> Location </label> 
                         <input type="text" name="location" class="form-control" value="{{$event->location}}" />
                         @if($errors->has('location'))
                         <span class="text-danger">{{$errors->first('location') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label> Date </label> 
                         <input type="text" name="date" class="form-control" value="{{$event->date}}" />
                         @if($errors->has('date'))
                         <span class="text-danger">{{$errors->first('date') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label> Description </label> 
                         <textarea class="form-control" name="description" value="{{$event->description}}"></textarea>
                         @if($errors->has('description'))
                         <span class="text-danger">{{$errors->first('description') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label> Image </label> 
                         <input type="file" name="image" class="form-control" />
                         @if($errors->has('image'))
                         <span class="text-danger">{{$errors->first('image') }}</span>
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
</body>

@endsection