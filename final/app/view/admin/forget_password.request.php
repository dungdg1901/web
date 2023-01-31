<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../assets/css/admin/forget_password.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <title>REQUEST</title>
</head>

<body>
    
    <!-- ======================== -->
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    
                    <div class="text-center mt-4" >
                        <h1 class="h2">Đặt lại mật khẩu</h1>
                        <p class="lead">
                            Nhập login id để lấy lại mật khẩu.
                        </p>
                    </div>

                    <form class="card" method="POST" action="">
                        <div class="card-body" >
                            <div class="m-sm-4">
                            <span class="error"><?php echo $err?></span>
                            <br><br>
                                <form>
                                    <div class="form-group">
                                        <input id="reset-password" type="text" class="form-control form-control-lg" name="reset-input" placeholder="Nhập login id">
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary" name="reset-password">Gửi yêu cầu reset password</button>
                                    </div>
                                </form>
                            </div>
                        </div >
                    </form>
                </div>
            </div>
        </div>
	</div>

</body>

</html>
