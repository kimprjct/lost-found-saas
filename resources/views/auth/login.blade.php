<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign in — {{ config('app.name', 'FoundU') }}</title>
	<style>
		:root {
			--bg-start: #667eea;
			--bg-end: #764ba2;
			--card-bg: #ffffff;
			--text: #1a202c;
			--muted: #4a5568;
			--muted-2: #718096;
			--ring: #e2e8f0;
			--brand: #3182ce;
			--brand-600: #2b6cb0;
			--accent: #38a169;
			--accent-light: #9ae6b4;
			--gradient-1: #667eea;
			--gradient-2: #764ba2;
			--gradient-3: #f093fb;
			--gradient-4: #f5576c;
		}
		html, body { 
			height: 100%; 
			margin: 0;
			padding: 0;
		}
		body {
			font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
			background: linear-gradient(135deg, var(--gradient-1), var(--gradient-2), var(--gradient-3), var(--gradient-4));
			background-size: 400% 400%;
			animation: gradientShift 15s ease infinite;
			color: var(--text);
			position: relative;
			overflow-x: hidden;
		}
		
		@keyframes gradientShift {
			0% { background-position: 0% 50%; }
			50% { background-position: 100% 50%; }
			100% { background-position: 0% 50%; }
		}
		
		/* Floating elements */
		.floating-shapes {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			pointer-events: none;
			z-index: 1;
		}
		
		.shape {
			position: absolute;
			border-radius: 50%;
			background: rgba(255, 255, 255, 0.1);
			animation: float 6s ease-in-out infinite;
		}
		
		.shape:nth-child(1) {
			width: 80px;
			height: 80px;
			top: 20%;
			left: 10%;
			animation-delay: 0s;
		}
		
		.shape:nth-child(2) {
			width: 120px;
			height: 120px;
			top: 60%;
			right: 10%;
			animation-delay: 2s;
		}
		
		.shape:nth-child(3) {
			width: 60px;
			height: 60px;
			bottom: 20%;
			left: 20%;
			animation-delay: 4s;
		}
		
		@keyframes float {
			0%, 100% { transform: translateY(0px) rotate(0deg); }
			50% { transform: translateY(-20px) rotate(180deg); }
		}
		
		/* Main container */
		.main-container {
			position: relative;
			z-index: 2;
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 20px;
		}
		
		/* Header */
		.header {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			padding: 24px;
			z-index: 3;
		}
		
		.brand {
			display: flex;
			align-items: center;
			gap: 16px;
			max-width: 1200px;
			margin: 0 auto;
		}
		
		.brand img {
			height: 48px;
			width: auto;
			object-fit: contain;
			filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
		}
		
		.brand-text {
			display: flex;
			flex-direction: column;
			gap: 2px;
		}
		
		.brand-name {
			font-size: 20px;
			font-weight: 700;
			color: white;
			text-shadow: 0 2px 4px rgba(0,0,0,0.2);
		}
		
		.brand-slogan {
			font-size: 12px;
			color: rgba(255,255,255,0.8);
			font-weight: 500;
		}
		
		/* Login container */
		.login-container {
			background: rgba(255, 255, 255, 0.95);
			backdrop-filter: blur(20px);
			border-radius: 24px;
			box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
			border: 1px solid rgba(255, 255, 255, 0.2);
			padding: 40px;
			width: 100%;
			max-width: 420px;
			position: relative;
			overflow: hidden;
		}
		
		.login-container::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			height: 4px;
			background: linear-gradient(90deg, var(--gradient-1), var(--gradient-2), var(--gradient-3), var(--gradient-4));
			background-size: 400% 400%;
			animation: gradientShift 15s ease infinite;
		}
		
		.card h2 {
			margin: 0 0 32px;
			font-size: 28px;
			font-weight: 700;
			text-align: center;
			background: linear-gradient(135deg, var(--gradient-1), var(--gradient-2));
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			background-clip: text;
		}
		
		.form {
			display: grid;
			gap: 20px;
		}
		
		.input-group {
			position: relative;
		}
		
		.label {
			display: block;
			font-size: 14px;
			color: var(--muted);
			margin-bottom: 8px;
			font-weight: 600;
		}
		
		.input {
			width: 100%;
			border: 2px solid var(--ring);
			border-radius: 12px;
			padding: 16px 18px;
			font-size: 16px;
			outline: none;
			transition: all 0.3s ease;
			background: rgba(255, 255, 255, 0.8);
			box-sizing: border-box;
		}
		
		.input:focus {
			border-color: var(--brand);
			box-shadow: 0 0 0 4px rgba(49, 130, 206, 0.1);
			background: white;
			transform: translateY(-2px);
		}
		
		.input::placeholder {
			color: var(--muted-2);
		}
		
		.row {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 12px;
		}
		
		.checkbox-wrapper {
			display: flex;
			align-items: center;
			gap: 8px;
		}
		
		.checkbox {
			width: 18px;
			height: 18px;
			border-radius: 4px;
			border: 2px solid var(--ring);
			accent-color: var(--brand);
		}
		
		.checkbox-label {
			font-size: 14px;
			color: var(--muted);
			font-weight: 500;
		}
		
		.btn {
			width: 100%;
			background: linear-gradient(135deg, var(--gradient-1), var(--gradient-2));
			color: white;
			border: 0;
			border-radius: 12px;
			padding: 16px 18px;
			font-size: 16px;
			font-weight: 600;
			cursor: pointer;
			transition: all 0.3s ease;
			position: relative;
			overflow: hidden;
		}
		
		.btn::before {
			content: '';
			position: absolute;
			top: 0;
			left: -100%;
			width: 100%;
			height: 100%;
			background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
			transition: left 0.5s;
		}
		
		.btn:hover::before {
			left: 100%;
		}
		
		.btn:hover {
			transform: translateY(-2px);
			box-shadow: 0 10px 25px rgba(49, 130, 206, 0.3);
		}
		
		.btn:active {
			transform: translateY(0);
		}
		
		.note {
			margin-top: 20px;
			color: var(--muted-2);
			font-size: 12px;
			text-align: center;
			line-height: 1.5;
		}
		
		.error {
			color: #e53e3e;
			font-size: 14px;
			margin-top: 8px;
			padding: 12px 16px;
			background: #fed7d7;
			border: 1px solid #feb2b2;
			border-radius: 8px;
			text-align: center;
		}
		
		/* Decorative elements */
		.decorative-dots {
			position: absolute;
			top: 20px;
			right: 20px;
			display: flex;
			gap: 4px;
		}
		
		.dot {
			width: 8px;
			height: 8px;
			border-radius: 50%;
			background: var(--accent);
			animation: pulse 2s infinite;
		}
		
		.dot:nth-child(2) {
			animation-delay: 0.5s;
		}
		
		.dot:nth-child(3) {
			animation-delay: 1s;
		}
		
		@keyframes pulse {
			0%, 100% { opacity: 1; transform: scale(1); }
			50% { opacity: 0.5; transform: scale(1.2); }
		}
		
		/* Responsive */
		@media (max-width: 480px) {
			.login-container {
				padding: 30px 20px;
				margin: 20px;
			}
			
			.card h2 {
				font-size: 24px;
			}
			
			.brand-name {
				font-size: 18px;
			}
		}
	</style>
</head>
<body>
	<!-- Floating background shapes -->
	<div class="floating-shapes">
		<div class="shape"></div>
		<div class="shape"></div>
		<div class="shape"></div>
	</div>

	<!-- Header -->
	<header class="header">
		<div class="brand">
			<img src="/images/foundulogo.png" alt="FoundU Logo">
			<div class="brand-text">
				<div class="brand-name">FoundU</div>
				<div class="brand-slogan">Discover. Connect. Reclaim.</div>
			</div>
		</div>
	</header>

	<!-- Main login container -->
	<div class="main-container">
		<div class="login-container">
			<div class="decorative-dots">
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
			</div>
			
				<div class="card">
				<h2>Welcome Back</h2>
					<form method="POST" action="{{ route('login') }}" class="form">
						@csrf
					<div class="input-group">
						<label class="label">Email Address</label>
						<input type="email" name="email" class="input" required autofocus placeholder="Enter your email address" />
						</div>
					<div class="input-group">
							<label class="label">Password</label>
						<input type="password" name="password" class="input" required placeholder="Enter your password" />
						</div>
						<div class="row">
						<div class="checkbox-wrapper">
							<input type="checkbox" name="remember" class="checkbox" id="remember" /> 
							<label for="remember" class="checkbox-label">Remember me</label>
						</div>
							<div></div>
						</div>
					<button type="submit" class="btn">Sign in to FoundU</button>
						@if ($errors->any())
							<div class="error">{{ $errors->first() }}</div>
						@endif
					</form>
				<div class="note">By signing in, you agree to our Terms of Service and Privacy Policy.</div>
			</div>
				</div>
		</div>
</body>
</html> 