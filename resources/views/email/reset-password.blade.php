<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.3/css/bootstrap.min.css')}}">  
    <link rel="stylesheet" href="{{asset('styles.css')}}">
    <link rel="stylesheet" href="{{asset('signin.css')}}">
</head>
<main class="form-signin w-100 m-auto">
<form method="POST" action="{{ route('reset-password-post') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <h1 class="h3 mb-3 fw-normal">Reset Password</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="#" placeholder="namesignin" name="email">
      <label for="floatingInput">Email</label>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="#" placeholder="Password" name="password">
      <label for="floatingPassword">mật khẩu mới</label>
      @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="#" placeholder="Password" name="password_confirmation">
      <label for="floatingPassword">nhập lại mật khẩu</label>
      @error('password_confirnation')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
   
    
    <button class="btn btn-primary w-100 py-2" type="submit">reset mật</button>
    <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
</form>
</main>