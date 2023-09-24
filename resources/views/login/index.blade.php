<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elovya Laundry | {{ $title }}</title>
    <link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body>
    <div class="login-box">
        <div class="login-header">
            <header>Login Admin</header>
            <p>Elovya Laundry</p>
        </div>

        @if (session()->has('success'))
        <!-- Bootstrap Alert -->
        <div class="alert alert-success alert-dismissible fade show text-lg-left" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session()->has('fail'))
        <!-- Bootstrap Alert -->
        <div class="alert alert-danger alert-dismissible fade show text-lg-left" role="alert">
            {{ session('fail') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form action="/" method="POST">
            @csrf
            <div class="input-box">
                <input type="text" class="input-field @error('username')
                    is-invalid
                @enderror" name="username" id="username" autocomplete="off" required autofocus
                    value="{{ old('username') }}">
                <label for="username">Username</label>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" id="password" autocomplete="off" required>
                <label for="password">Password</label>
            </div>
            <div class="input-box">
                <input type="submit" class="input-submit" value="Login">
            </div>
        </form>
        <div class="sign-up">
            <p>Tidak Memiliki Akun? <a href="/register">Registrasi Sekarang</a></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
          // Register a service worker hosted at the root of the
          // site using the default scope.
          navigator.serviceWorker.register("/sw.js").then(
          (registration) => {
             console.log("Service worker registration succeeded:", registration);
          },
          (error) => {
             console.error(`Service worker registration failed: ${error}`);
          },
        );
      } else {
         console.error("Service workers are not supported.");
      }
    </script>
</body>

</html>