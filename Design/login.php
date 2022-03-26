<!doctype html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Login / 1301190359</title>
  </head>
  <body>
    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-body">
              <label><b>LOGIN</b></label>
              <form action="process.php" method="POST">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" id="username">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password">
                </div>
                </form>
                <button class="btn btn-login btn-success">LOGIN</button>
                <button class="btn btn-register btn-link"><a href="register.php">REGISTER</a></button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
      $(document).ready(function() {
        $(".btn-login").click( function() {
          var username = $("#username").val();
          var password = $("#password").val();
          if(username.length == "") {
            Swal.fire({
              type: 'WARNING',
              title: 'GAGAL!',
              text: 'USERNAME WAJIB DI ISI!'
            });
          } else if(password.length == "") {
            Swal.fire({
              type: 'WARNING',
              title: 'GAGAL!',
              text: 'PASSWORD WAJIB DI ISI!'
            });
          } else {
            $.ajax({
              url: "cek-login.php",
              type: "POST",
              data: {
                  "username": username,
                  "password": password
              },
              success:function(response){
                if (response == "success") {
                  Swal.fire({
                    type: 'SUCCESS',
                    title: 'LOGIN BERHASIL!',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                } else {
                  Swal.fire({
                    type: 'ERROR',
                    title: 'GAGAL!',
                    text: 'SILAHKAN COBA LAGI!'
                  });
                }
                console.log(response);
              },
              error:function(response){
                  Swal.fire({
                    type: 'ERROR',
                    title: 'GAGAL!',
                    text: 'NOT FOUND!'
                  });
                  console.log(response);
              }
            });
          }
        });
      });
    </script>

  </body>
</html>