<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include SweetAlert2 stylesheet -->
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.min.css') }}">

    <!-- Include SweetAlert2 script -->
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
</head>
<body>

@if (session('thong_bao'))
  <script>
    Swal.fire({
      icon: 'success',
      title: "{{ session('thong_bao') }}",
      text: '',
      footer: '',
      confirmButtonColor: "#000000"
    });
  </script>
@endif

@if (session('error'))
  <script>
    Swal.fire({
      icon: 'error',
      title: "{{ session('error') }}",
      text: '',
      
      footer: '',
      confirmButtonColor: "#000000"
    });
  </script>
@endif

</body>
</html>
