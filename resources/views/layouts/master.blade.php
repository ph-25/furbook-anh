<!DOCTYPE html>
<html>
<head>
	<title>FurBook</title>
	
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/sh3.3.6/js/bootstrap.min.js"></script>


</head>
<body>
	<div class="container">
		<div class = "page-header">
			@yield('header')
		</div>		
		@if (Session::has('success'))
		<div class = "alert alert-success">
			{{Session::get('success')}}
		</div>
		@endif
		@yield('content')
	</div>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$( function() {
    		$( ".datepicker" ).datepicker({
    			dataFormat: 'yy-mm-dd'
   		 });
  });
	</script>
</body>
</html>