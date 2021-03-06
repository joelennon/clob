<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title }} | @lang('app.name.setup')</title>

	<link rel="stylesheet" href="{{ elixir('css/admin.css') }}">
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>@lang('app.name.setup')</h1>
		</div>

		@yield('content')
	</div>

	@yield('scripts')
</body>
</html>