<form action="{{route('proses-login')}}" method="post">
	{{csrf_field()}}
	<input type="email" name="email" placeholder="email">
	<input type="password" name="password" placeholder="password">
	<input type="checkbox" name="remember"> Ingat?
	<button type="submit">login</button>
</form>