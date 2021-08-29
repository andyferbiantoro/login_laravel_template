<head>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

</head>
<form action="{{route('proses-register')}}" method="post">
	{{csrf_field()}}

	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

	<input type="nama" name="email" placeholder="nama">
	<input type="email" name="email" placeholder="email">
	<input type="password" name="password" placeholder="password">
	<input type="password" name="repassword" placeholder="re password">
	<button type="submit">login</button>
</form>