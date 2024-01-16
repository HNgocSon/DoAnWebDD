
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{asset('password.css')}}">
</head>
<body>

<main class="form-signin">
    <form method="POST" action="{{ route('reset-password-post') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <h1 class="h3 mb-3 fw-normal">Reset Password</h1>

        <div class="form-floating">
        <label for="email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Email" name="email">
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-floating">
        <label for="password">New Password</label>
            <input type="password" class="form-control" id="password" placeholder="New Password" name="password">
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-floating">
        <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
            @error('password_confirmation')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        
        <button class="btn btn-primary" type="submit">Reset Password</button>
        
        <p class="mt-5 mb-3 text-body-secondary">© 2023 Your Company</p>
    </form>
</main>

</body>
</html>
