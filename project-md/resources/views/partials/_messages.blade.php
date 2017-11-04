@if (Session::has('success'))
	<div class="alert alert-success extra" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>
@endif
@if (Session::has('status'))
	<div class="alert alert-danger extra" role="alert">
		{{ Session::get('status') }}
	</div>
@endif
@if (count($errors) > 0)
	<div class="alert alert-danger extra" role="alert">
		<strong>Deze fouten zijn opgetreden:</strong>
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach  
		</ul>
	</div>
@endif