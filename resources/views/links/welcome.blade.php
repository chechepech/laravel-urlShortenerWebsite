@extends('layouts.app')
@section('content')    
   <div class="container">
        <div class="row">
        	<div class="col-12 col-sm-10 col-lg-6 mx-auto">
            @include('message')
            <h1 class="display-4 text-center">Url Shortener</h1>
            <p class="h2 text-center">Paste the URL to be shortened</p>
            <form class="bg-white py-3 px-4 shadow rounded" action="{{url('/')}}" method="post" accept-charset="utf-8">
                @csrf
            <div class="form-group">
            	<label for="link">Your link:</label>
                <input class="form-control" type="url" id="link" name="url" aria-describedby="urlHelp" value="{{old('url')}}" placeholder="Enter your url here and press enter" required onfocus>
                <small id="urlHelp" class="form-text text-muted">Use our URL Shortener to create a shortened link making it easy to remember.</small>
            </div>
                <input type="submit" class="btn btn-primary btn-sm" name="btn_url" value="Shorten URL">
            </form><br/>
            @if(empty($link))            
            @else
            <div class="card shadow rounded m-0 p-0">
  <div class="card-body">
    <p class="h6">Your url is: <a href="{{url('/'.$link->hash)}}" target="_blank" title="">{{url('/'.$link->hash)}}</a></p>
  </div>
</div>
            
            @endif
        	</div>
        </div>      
   </div>    
@endsection