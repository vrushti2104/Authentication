<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h1>Verify Your Email Address</h1>
    <p>Please check your inbox for a verification link.</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
</body>
</html>
