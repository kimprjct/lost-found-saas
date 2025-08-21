<!DOCTYPE html>
<html>
<body style="font-family: Arial, Helvetica, sans-serif; color:#0f172a">
  <h2 style="margin:0 0 12px">Welcome to FoundU, {{ $organization }}!</h2>
  <p>Your tenant account has been approved. Here are your credentials:</p>
  <ul>
    <li><strong>Admin Email:</strong> {{ $email }}</li>
    <li><strong>Temporary Password:</strong> {{ $tempPassword }}</li>
    <li><strong>Tenant Identifier:</strong> {{ $tenantSlug }} (ID: {{ $tenantId }})</li>
  </ul>
  <p>Login to your Admin Panel here: <a href="{{ $loginUrl }}">{{ $loginUrl }}</a></p>
  <p>For best practice, please change your password after your first login.</p>
  <p>— FoundU Team</p>
</body>
<html>


