<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elovya Laundry | {{ $title }}</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="login-box">
        <div class="login-header">
            <header>Registrasi Admin</header>
            <p>Elovya Laundry</p>
        </div>
        <form action="/register" method="POST">
            @csrf
            <div class="input-box">
                <input type="email" class="input-field" name="email" id="email" autocomplete="off" required
                    value="{{ old('email') }}">
                <label for="email">Email</label>
            </div>
            <div class="input-box">
                <input type="username" class="input-field" name="username" id="username" autocomplete="off" required
                    value="{{ old('username') }}">
                <label for="username">Username</label>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" id="password" autocomplete="off" required>
                <label for="password">Password</label>
            </div>
            <div class="input-box">
                <input type="submit" class="input-submit" value="Register">
            </div>
        </form>
        <div class="sign-up">
            <p>Sudah Memiliki Akun? <a href="/">Login Sekarang</a></p>
        </div>
    </div>
</body>

</html>