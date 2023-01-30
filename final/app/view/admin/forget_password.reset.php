<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../assets/css/admin/forget_password.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>RESET</title>
</head>

<body>
    
    <!-- ======================== -->
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    
                    <div class="text-center mt-4" >
                        <h1 class="h2">Các yêu cầu đặt lại mật khẩu</h1>
                        <p class="lead">
                            Nhập mật khẩu mới.
                        </p>
                    </div>

                    <form class="card" method="POST" action="">
                        <br>
                        <form class="card-body" >
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Tên người dùng</th>
                                    <th>Mật khẩu mới</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    for ($i = 0; $i < count($result); $i++) {
                                    ?>
                                    
                                    <td><?php echo $i + 1 ?></td>
                                    <td><?php echo $nameList[$i] ?></td>
                                    <td>
                                        <input type="text" style="cursor:pointer" class="newpassword" name="new_password<?php echo $i ?>">
                                    </td>
                                    <td>
                                        <input type="submit" value="Reset" style="cursor:pointer" class="reset" name="reset_password<?php echo $i ?>">
                                    </td>
                                </tr>   
                                <tr>
                                    <td></td>
                                    <td>
                                        <div>
                                            <span class="error"><?php echo $err[$i] ?></span>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>     
                                <?php
                                    }
                                ?>             
                            </tbody>
                        </table>
                        </form>
                    </form>

                </div>
            </div>
        </div>
	</div>
    
</body>

</html>







