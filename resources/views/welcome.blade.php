
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ config('app.name', 'FoundU SaaS') }} — Lost & Found</title>
	<style>
		:root {
			--bg-start:#667eea; --bg-end:#764ba2; --text:#0f172a; --muted:#475569; --muted2:#64748b;
			--card:#ffffff; --ring:#e2e8f0; --brand:#2563eb; --brand-700:#1d4ed8; --accent:#10b981; --accent-700:#059669; --outline:#f59e0b;
		}
		
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
		
		body {
			font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
			background: linear-gradient(135deg, var(--bg-start), var(--bg-end), var(--accent), var(--outline));
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
			width: 120px;
			height: 120px;
			top: 10%;
			left: 5%;
			animation-delay: 0s;
		}
		
		.shape:nth-child(2) {
			width: 80px;
			height: 80px;
			top: 40%;
			right: 10%;
			animation-delay: 2s;
		}
		
		.shape:nth-child(3) {
			width: 100px;
			height: 100px;
			bottom: 30%;
			left: 15%;
			animation-delay: 4s;
		}
		
		.shape:nth-child(4) {
			width: 60px;
			height: 60px;
			top: 70%;
			right: 20%;
			animation-delay: 6s;
		}
		
		@keyframes float {
			0%, 100% { transform: translateY(0px) rotate(0deg); }
			50% { transform: translateY(-30px) rotate(180deg); }
		}
		
		/* Button styles */
		.btn {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			padding: 12px 24px;
			border-radius: 12px;
			font-weight: 600;
			text-decoration: none;
			transition: all 0.3s ease;
			border: 2px solid transparent;
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
		
		.btn:active {
			transform: translateY(1px);
		}
		
		.btn-primary {
			background: linear-gradient(135deg, var(--brand), var(--brand-700));
			color: #fff;
			box-shadow: 0 8px 25px rgba(37, 99, 235, 0.35);
			border-color: rgba(255,255,255,0.15);
		}
		
		.btn-primary:hover {
			transform: translateY(-2px);
			box-shadow: 0 14px 40px rgba(37, 99, 235, 0.5);
			filter: brightness(1.03);
		}
		
		.btn-accent {
			background: linear-gradient(135deg, var(--accent), var(--accent-700));
			color: #fff;
			box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
		}
		
		.btn-accent:hover {
			transform: translateY(-2px);
			box-shadow: 0 12px 35px rgba(16, 185, 129, 0.4);
		}
		
		.btn-outline {
			background: rgba(255, 255, 255, 0.1);
			backdrop-filter: blur(10px);
			border-color: rgba(255, 255, 255, 0.2);
			color: white;
		}
		
		.btn-outline:hover {
			background: rgba(255, 255, 255, 0.2);
			border-color: rgba(255, 255, 255, 0.4);
			transform: translateY(-2px);
		}
		
		/* Layout */
		.container {
			max-width: 1400px;
			margin: 0 auto;
			padding: 0 20px;
			position: relative;
			z-index: 2;
		}
		
		.header {
			padding: 24px 0;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		
		.brand {
			display: flex;
			align-items: center;
			gap: 16px;
		}
		
		.brand img {
			height: 78px;
			width: auto;
			object-fit: contain;
			filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
		}
		
		.brand-text {
			display: flex;
			flex-direction: column;
			gap: 2px;
		}
		
		.brand-name {
			font-size: 32px;
			font-weight: 800;
			color: white;
			letter-spacing: -0.02em;
			line-height: 1;
			text-shadow: 0 2px 4px rgba(0,0,0,0.2);
		}
		
		.brand-slogan {
			font-size: 14px;
			color: rgba(255, 255, 255, 0.8);
			font-weight: 500;
		}
		
		.nav a {
			margin-left: 18px;
		}
		
		/* Hero */
		.hero {
			display: grid;
			grid-template-columns: 1fr;
			gap: 40px;
			align-items: center;
			padding: 60px 0 80px;
		}
		
		@media(min-width:992px) {
			.hero {
				grid-template-columns: 1.1fr .9fr;
			}
		}
		
		.h-title {
			font-size: clamp(36px, 5vw, 56px);
			line-height: 1.1;
			margin: 0;
			font-weight: 900;
			letter-spacing: -0.02em;
			color: white;
			text-shadow: 0 4px 8px rgba(0,0,0,0.2);
		}
		
		.h-sub {
			margin-top: 16px;
			color: rgba(255, 255, 255, 0.9);
			font-size: 20px;
			line-height: 1.6;
		}
		
		.h-ctas {
			margin-top: 32px;
			display: flex;
			gap: 16px;
			flex-wrap: wrap;
		}
		
		.illus-wrap {
			position: relative;
		}
		
		.illus-blur {
			display: none;
		}
		
		.illus {
			position: relative;
			background: transparent;
			backdrop-filter: none;
			border: none;
			border-radius: 20px;
			box-shadow: none;
			padding: 0;
			overflow: hidden;
		}
		
		.illus img {
			display: block;
			width: 100%;
			height: auto;
			border-radius: 0;
		}
		
		/* Sections */
		.section {
			padding: 60px 0;
		}
		
		.section h2 {
			margin: 0 0 24px;
			font-size: 32px;
			text-align: center;
			font-weight: 800;
			color: white;
			text-shadow: 0 2px 4px rgba(0,0,0,0.2);
		}
		
		.features {
			display: grid;
			grid-template-columns: 1fr;
			gap: 20px;
		}
		
		@media(min-width:768px) {
			.features {
				grid-template-columns: repeat(4, 1fr);
			}
		}
		
		.card {
			background: var(--card);
			backdrop-filter: blur(20px);
			border: 1px solid rgba(255, 255, 255, 0.2);
			border-radius: 20px;
			padding: 24px;
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
			transition: all 0.3s ease;
		}
		
		.card:hover {
			transform: translateY(-8px);
			box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
		}
		
		.card .icon {
			width: 48px;
			height: 48px;
			border-radius: 12px;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			margin-bottom: 16px;
			font-size: 24px;
		}
		
		.card .title {
			font-weight: 700;
			margin-bottom: 8px;
			font-size: 18px;
		}
		
		/* Steps */
		.steps {
			display: grid;
			grid-template-columns: 1fr;
			gap: 20px;
		}
		
		@media(min-width:768px) {
			.steps {
				grid-template-columns: repeat(3, 1fr);
			}
		}
		
		.step-num {
			width: 48px;
			height: 48px;
			border-radius: 12px;
			background: linear-gradient(135deg, var(--gradient-1), var(--gradient-2));
			color: white;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			font-weight: 700;
			font-size: 18px;
			margin-bottom: 16px;
		}
		
		/* Stats */
		.stats {
			background: var(--card);
			backdrop-filter: blur(20px);
			border: 1px solid rgba(255, 255, 255, 0.2);
			border-radius: 24px;
			padding: 40px;
			margin: 60px 0;
			box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
		}
		
		.stats-grid {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			gap: 32px;
		}
		
		@media(min-width:768px) {
			.stats-grid {
				grid-template-columns: repeat(4, 1fr);
			}
		}
		
		.stat-item {
			text-align: center;
		}
		
		.stat-number {
			font-size: 36px;
			font-weight: 800;
			background: linear-gradient(135deg, var(--gradient-1), var(--gradient-2));
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			background-clip: text;
			margin-bottom: 8px;
		}
		
		.stat-label {
			color: var(--muted2);
			font-size: 16px;
			font-weight: 500;
		}
		
		/* Footer */
		.footer {
			background: rgba(0, 0, 0, 0.1);
			backdrop-filter: blur(10px);
			border-top: 1px solid rgba(255, 255, 255, 0.1);
			margin-top: 60px;
			padding: 24px 0;
			color: rgba(255, 255, 255, 0.8);
			font-size: 14px;
		}
		
		.footer a {
			color: rgba(255, 255, 255, 0.8);
			text-decoration: none;
			margin-left: 20px;
			transition: color 0.3s ease;
		}
		
		.footer a:hover {
			color: white;
		}
		
		/* Animations */
		@keyframes fadeInUp {
			from {
				opacity: 0;
				transform: translateY(30px);
			}
			to {
				opacity: 1;
				transform: translateY(0);
			}
		}
		
		.animate-fade-in {
			animation: fadeInUp 0.8s ease-out;
		}
		
		/* CTA Section */
		.cta-section {
			background: var(--card);
			backdrop-filter: blur(20px);
			border: 1px solid rgba(255, 255, 255, 0.2);
			border-radius: 24px;
			padding: 60px 40px;
			text-align: center;
			margin: 40px 0;
			box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
		}
		
		.cta-section h2 {
			font-size: 36px;
			margin-bottom: 16px;
			background: linear-gradient(135deg, var(--gradient-1), var(--gradient-2));
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			background-clip: text;
		}
		
		.cta-section p {
			color: var(--muted);
			font-size: 18px;
			margin-bottom: 32px;
		}
		
		.cta-buttons {
			display: flex;
			gap: 16px;
			justify-content: center;
			flex-wrap: wrap;
		}
		
		/* Modal */
		.modal {
			display: none;
			position: fixed;
			z-index: 1000;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			backdrop-filter: blur(5px);
		}
		
		.modal-content {
			background: linear-gradient(180deg, rgba(255,255,255,0.98), rgba(255,255,255,0.96));
			margin: 5% auto;
			padding: 40px;
			border-radius: 20px;
			width: 90%;
			max-width: 720px;
			position: relative;
			box-shadow: 0 30px 70px rgba(0, 0, 0, 0.25);
			border: 1px solid rgba(2,6,23,0.06);
		}
		
		.close {
			position: absolute;
			right: 20px;
			top: 20px;
			font-size: 28px;
			font-weight: bold;
			cursor: pointer;
			color: var(--muted2);
		}
		
		.close:hover {
			color: var(--text);
		}
		
		.form-group {
			margin-bottom: 20px;
		}
		
		.form-group label {
			display: block;
			margin-bottom: 8px;
			font-weight: 600;
			color: var(--text);
		}
		
		.form-group input,
		.form-group select,
		.form-group textarea {
			width: 100%;
			padding: 12px 16px;
			border: 1px solid var(--ring);
			border-radius: 12px;
			font-size: 14px;
			transition: border-color 0.3s ease, box-shadow 0.2s ease, transform 0.1s ease;
			background: #f8fafc;
		}
		
		.form-group input:focus,
		.form-group select:focus,
		.form-group textarea:focus {
			outline: none;
			border-color: var(--brand);
			box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
			background: #ffffff;
			transform: translateY(-1px);
		}
		
		.form-row {
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 16px;
		}
		
		@media (max-width: 768px) {
			.form-row {
				grid-template-columns: 1fr;
			}
		}
		
		/* Responsive */
		@media (max-width: 768px) {
			.stats-grid {
				grid-template-columns: repeat(2, 1fr);
				gap: 20px;
			}
			
			.features {
				grid-template-columns: repeat(2, 1fr);
			}
			
			.steps {
				grid-template-columns: 1fr;
			}
			
			.cta-section {
				padding: 40px 20px;
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
		<div class="shape"></div>
	</div>

	<header class="container header">
		<div class="brand">
			<img src="/images/foundulogo.png" alt="FoundU Logo">
			<div class="brand-text">
				<div class="brand-name">FoundU</div>
				<div class="brand-slogan">Discover. Connect. Reclaim.</div>
			</div>
		</div>
		<nav class="nav">
			<a href="{{ route('login') }}" class="btn btn-outline">Login</a>
			<a href="javascript:void(0)" onclick="openModal()" class="btn btn-primary">Register</a>
		</nav>
	</header>

	<main class="container">
		<!-- Hero -->
		<section class="hero animate-fade-in">
			<div>
				<h1 class="h-title">Easily Report, Find, and Claim Lost Items</h1>
				<p class="h-sub">Our Lost and Found system helps your community securely report and recover items across schools, malls, and workplaces.</p>
				<div class="h-ctas">
					<a href="#get-app" class="btn btn-accent">Get App</a>
				</div>
			</div>
			<div class="illus-wrap" aria-hidden="true">
				<div class="illus-blur"></div>
				<div class="illus">
					<img src="/images/searchitems.jpg" alt="Search for lost items">
				</div>
			</div>
		</section>

		<!-- Get App CTA (removed as requested) -->

		<!-- Stats (removed as requested) -->

		<!-- Features -->
		<section class="section">
			<h2>Why Choose FoundU?</h2>
			<div class="features">
				<div class="card">
					<div class="icon" style="background:#eff6ff;color:#1e40af">🔍</div>
					<div class="title">Smart Search</div>
					<div class="desc" style="color:var(--muted2)">AI-powered matching algorithm finds lost items quickly</div>
				</div>
				<div class="card">
					<div class="icon" style="background:#ecfeff;color:#155e75">📱</div>
					<div class="title">Mobile-First</div>
					<div class="desc" style="color:var(--muted2)">Native mobile apps for iOS and Android</div>
				</div>
				<div class="card">
					<div class="icon" style="background:#fff7ed;color:#9a3412">🔔</div>
					<div class="title">Instant Alerts</div>
					<div class="desc" style="color:var(--muted2)">Real-time notifications when matches are found</div>
				</div>
				<div class="card">
					<div class="icon" style="background:#ecfdf5;color:#065f46">🛡️</div>
					<div class="title">Secure & Private</div>
					<div class="desc" style="color:var(--muted2)">End-to-end encryption and privacy protection</div>
				</div>
			</div>
		</section>

		<!-- How it works -->
		<section class="section" id="how">
			<h2>How it works</h2>
			<div class="steps">
				<div class="card">
					<div class="step-num">1</div>
					<h3 style="margin:8px 0 6px;font-size:18px;font-weight:700">Register</h3>
					<p style="margin:0;color:var(--muted2);font-size:15px">Submit your organization details and get approved by our admin</p>
				</div>
				<div class="card">
					<div class="step-num">2</div>
					<h3 style="margin:8px 0 6px;font-size:18px;font-weight:700">Setup</h3>
					<p style="margin:0;color:var(--muted2);font-size:15px">Receive login credentials and configure your lost & found system</p>
				</div>
				<div class="card">
					<div class="step-num">3</div>
					<h3 style="margin:8px 0 6px;font-size:18px;font-weight:700">Launch</h3>
					<p style="margin:0;color:var(--muted2);font-size:15px">Start helping your community recover lost items efficiently</p>
				</div>
			</div>
		</section>

		<!-- CTA Section -->
		<section class="cta-section">
			<h2>Ready to get started?</h2>
			<p>Join thousands of organizations using FoundU</p>
			<div class="cta-buttons">
				<button onclick="openModal()" class="btn btn-primary">Register Organization</button>
				<a href="javascript:void(0)" class="btn btn-accent">Contact Sales</a>
			</div>
		</section>
	</main>

	<!-- Registration Modal -->
	<div id="registrationModal" class="modal">
		<div class="modal-content">
			<span class="close" onclick="closeModal()">&times;</span>
			<h2 style="font-size: 28px; font-weight: 700; margin-bottom: 8px; text-align: center;">Organization Registration</h2>
			<p style="text-align: center; color: var(--muted2); margin-bottom: 32px;">Request to join FoundU as an organization partner</p>
			
			<form id="registrationForm" method="POST" action="{{ route('tenant.register') }}">
				@csrf
				<div class="form-group">
					<label for="organization_name">Organization Name *</label>
					<input type="text" id="organization_name" name="organization_name" required placeholder="e.g., SNSU, Gaisano Mall, ABC Corporation">
				</div>
				
				<div class="form-row">
					<div class="form-group">
						<label for="contact_person">Contact Person *</label>
						<input type="text" id="contact_person" name="contact_person" required placeholder="Full name">
					</div>
					<div class="form-group">
						<label for="email">Email Address *</label>
						<input type="email" id="email" name="email" required placeholder="admin@organization.com">
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group">
						<label for="address">Address *</label>
						<input id="address" name="address" required placeholder="Complete address of your organization">
					</div>
					<div class="form-group">
						<label for="phone">Phone Number</label>
						<input type="tel" id="phone" name="phone" placeholder="+1 (555) 123-4567">
					</div>
				</div>
				
				<div class="form-group">
					<label for="plan">One-time License *</label>
					<select id="plan" name="plan" required>
						<option value="">Select a license</option>
						<option value="basic">Starter — One-time payment</option>
						<option value="premium">Pro — One-time payment</option>
						<option value="enterprise">Enterprise — One-time payment</option>
					</select>
				</div>
				
				<div style="margin-top: 24px; text-align: center;">
					<button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px 18px; font-size: 16px; border-radius: 14px;">Submit Registration Request</button>
				</div>
				
				<p style="font-size: 12px; color: var(--muted2); text-align: center; margin-top: 16px;">
					By submitting this form, you agree to our Terms of Service and Privacy Policy. Our team will review your application and contact you within 24-48 hours.
				</p>
			</form>
		</div>
	</div>


<!-- Pending Approval Modal -->
<div id="pendingModal" class="modal">
	<div class="modal-content">
		<span class="close" onclick="closePendingModal()">&times;</span>
		<h2 style="font-size: 28px; font-weight: 700; margin-bottom: 8px; text-align: center;">Registration Submitted</h2>
		<p style="text-align: center; color: var(--muted2); margin-bottom: 16px;">
			Thank you! Your organization registration is under review.
		</p>
		<p style="text-align: center; color: var(--muted2);">
			An administrator will approve your request and create your Tenant account. You’ll receive an email with your login credentials soon.
		</p>
		<div style="margin-top: 24px; text-align: center;">
			<button class="btn btn-primary" onclick="closePendingModal()">Okay</button>
		</div>
	</div>
</div>


	<div id="registrationSubmittedFlag" data-flag="{{ session('registration_submitted') ? '1' : '0' }}" style="display:none"></div>

	<footer class="footer">
		<div class="container" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px">
			<div>© {{ date('Y') }} {{ config('app.name', 'FoundU SaaS') }}. All rights reserved.</div>
			<div>
				<a href="#">About</a>
				<a href="#">Contact</a>
				<a href="#">Terms</a>
				<a href="#">Privacy</a>
			</div>
		</div>
	</footer>

	<script>
		function openModal() {
			document.getElementById('registrationModal').style.display = 'block';
		}
		
		function closeModal() {
			document.getElementById('registrationModal').style.display = 'none';
		}

		function openPendingModal() {
			document.getElementById('pendingModal').style.display = 'block';
		}

		function closePendingModal() {
			document.getElementById('pendingModal').style.display = 'none';
		}
		
		// Close modal when clicking outside of it
		window.onclick = function(event) {
			var regModal = document.getElementById('registrationModal');
			var pendingModal = document.getElementById('pendingModal');
			if (event.target == regModal) {
				regModal.style.display = 'none';
			}
			if (event.target == pendingModal) {
				pendingModal.style.display = 'none';
			}
		}

		// Intercept form submit, send via fetch, then show Pending modal
		document.addEventListener('DOMContentLoaded', function () {
			var form = document.getElementById('registrationForm');
			if (!form) return;

			form.addEventListener('submit', function (e) {
				e.preventDefault();

				fetch(form.action, {
					method: 'POST',
					body: new FormData(form),
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
						'X-Requested-With': 'XMLHttpRequest',
						'Accept': 'application/json'
					}
				})
				.then(async (res) => {
					if (res.ok) {
						document.getElementById('registrationModal').style.display = 'none';
						openPendingModal();
						form.reset();
						return;
					}
					if (res.status === 422) {
						const data = await res.json().catch(() => ({}));
						const first = data?.errors ? Object.values(data.errors)[0][0] : 'Please check the form and try again.';
						alert(first);
						return;
					}
					throw new Error('Request failed');
				})
				.catch(() => {
					alert('Something went wrong. Please try again.');
				});
			});

			// Fallback: if server-side redirect was used, auto-open based on session flag
			var submissionFlagElem = document.getElementById('registrationSubmittedFlag');
			var submissionFlag = submissionFlagElem && submissionFlagElem.getAttribute('data-flag') === '1';
			if (submissionFlag) {
				openPendingModal();
			}
		});
	</script>
</body>
</html>