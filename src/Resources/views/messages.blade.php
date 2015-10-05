@if( Session::get('error') == false )
	<div class="alert alert-success alert-dismissable">{{ Session::get('message') }}</div>
@endif
@if( Session::has('formErrors') )
	@if( Session::get('formErrors')->any() )
	    <div class="alert alert-danger alert-dismissable">
	    	<strong>{{ Session::get('message') }}</strong>
	        <ul>
	            @foreach( Session::get('formErrors')->all() as $error )
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
@endif
