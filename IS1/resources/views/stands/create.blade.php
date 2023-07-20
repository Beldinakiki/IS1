@extends('layout')

@section('content')
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
                <form method="POST" action="{{ route('stands.store', ['eventId' => $eventId]) }}">
                    @csrf
                    <div class="form-group">
                        <label> Type </label>
                        <input type="text" name="type" class="form-control" />
                        @if($errors->has('quantity'))
                            <span class="text-danger">{{ $errors->first('type') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label> Stand Size</label>
                        <select name="size" class="form-control">
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
                            <span class="text-danger">{{ $errors->first('quantity') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label> Price </label>
                        <input type="number" name="price" class="form-control" />
                        @if($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    /* Your CSS styles here */
</style>
@endsection
