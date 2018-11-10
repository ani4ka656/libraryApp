<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
	<nav>
		<ul>
			
			<li>
				<a href="{{ route('authors') }}">
					Authors
				</a>
			</li>
			<li>
				<a href="{{ route('books') }}">
					Books
				</a>
			</li>
			<li>
				<a href="{{ route('mybooks') }}">
					MyBooks
				</a>
			</li>
		</ul>
	</nav>
	@yield('content')
</body>
</html>