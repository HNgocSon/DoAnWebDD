<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gmail Confirmation Email</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f1f1f1;
    }

    .email-container {
      max-width: 400px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .email-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .email-body {
      text-align: center;
      line-height: 1.6;
    }

    .button-container {
      text-align: center;
      margin-top: 20px;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #009688;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    .button:hover {
      background-color: #00796b;
    }

    .button-container a {
      color: #fff; /* Màu trắng cho thẻ a */
      text-decoration: none;
    }
  </style>
</head>
<body>

<div class="email-container">
  <div class="email-header">
    <h2>Xác Nhận Tài Khoản</h2>
  </div>

  <div class="email-body">
    <p>Xin chào.</p>
    <p>Vui lòng xác nhận tài khoản của bạn bằng cách nhấn vào nút bên dưới:</p>
  </div>

  <div class="button-container">
    <a href="{{ route('khach-hang.accept', ['khachhang' => $khachHang->id, 'token' => $khachHang->token]) }}" class="button">Xác Nhận Tài Khoản</a>
  </div>
</div>

</body>
</html>
