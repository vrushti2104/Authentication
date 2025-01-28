<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
</head>
<body>
    <h1>Admin Registration</h1>
    <form method="POST" action="{{ route('register.admin') }}">
        @csrf
        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" required>
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <button type="submit">Register</button>
    </form>
</body>
</html>
