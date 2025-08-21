<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create account — {{ config('app.name', 'FoundU') }}</title>
	<style>
		body { font-family: Inter, ui-sans-serif, system-ui; margin:0; background:#f8fafc }
		.container { max-width: 420px; margin: 40px auto; background:#fff; border:1px solid #e5e7eb; border-radius:16px; padding:28px; }
		.h { text-align:center; margin:0 0 16px; font-weight:800; font-size:22px; }
		.label { display:block; font-size:14px; color:#334155; margin:12px 0 6px }
		.input { width:100%; box-sizing:border-box; padding:12px 14px; border:1px solid #e5e7eb; border-radius:10px }
		.btn { width:100%; margin-top:18px; background:#2563eb; color:#fff; border:0; padding:12px 14px; border-radius:10px; font-weight:700 }
		.note { text-align:center; color:#64748b; font-size:12px; margin-top:10px }
	</style>
</head>
<body>
	<div class="container">
		<h1 class="h">Create your account</h1>
		<form method="POST" action="{{ route('register') }}">
			@csrf
			<label class="label">Name</label>
			<input class="input" type="text" name="name" required>
			<label class="label">Email</label>
			<input class="input" type="email" name="email" required>
			<label class="label">Password</label>
			<input class="input" type="password" name="password" required>
			<label class="label">Confirm Password</label>
			<input class="input" type="password" name="password_confirmation" required>
			<button class="btn" type="submit">Create account</button>
			@if ($errors->any())
				<div style="margin-top:10px; color:#b91c1c; font-size:13px; text-align:center">{{ $errors->first() }}</div>
			@endif
			<div class="note">Already have an account? <a href="{{ route('login') }}">Login</a></div>
		</form>
	</div>
</body>
</html>

