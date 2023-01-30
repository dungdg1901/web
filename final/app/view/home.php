
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/home.css">
    <title>Document</title>
</head>
<body style="display:block">
        <div class="boxhome">
            <div class="navbar">
                <label for="">Tên login: 
                <?php  
                    if (isset($_SESSION['login_id'])){
                        echo $_SESSION['login_id'];
                    }
                ?></label>
                <a class ="logout" href="../controller/logout.php">Đăng xuất</a> <br>
                <label for=""> Thời gian login: <?php if (isset($_SESSION['login_time']))
                        {
                            echo $_SESSION['login_time'];
                        }
                ?></label>
                
            </div>
            
            <div class="row">
                <div class="col">
                    <p>Phòng học</p>
                    <a href="../controller/classroom/classroom_search.php">Tìm kiếm</a>
                    <a href="../controller/classroom/classroom_add.input.php">Thêm mới</a>
                </div>
                <div class="col">
                    <p>Giảng viên</p>
                    <a href="../controller/teacher/teacher_search.php">Tìm kiếm</a>
                    <a href="../controller/teacher/teacher_add.input.php">Thêm mới</a>
                </div>
                <div class="col">
                    <p>Thiết bị</p>
                    <a href="../controller/device/device_search.php">Tìm kiếm</a>
                    <a href="../controller/device/device_add.input.php">Thêm mới</a>
                </div>
                <div class="col " style ="margin-top: 40px">
                    <p>Mượn trả thiết bị</p>
                    <a href="../controller/device_transaction/device_transact.php">Tìm kiếm</a>
                    <a href="../view/device_transaction/device_advance_search.php">Tìm kiếm nâng cao</a>
                    <a href="../controller/device_transaction/device_return.php">Trả thiết bị</a>
                    <a href="../controller/device_transaction/device_history.php">Lịch sử mượn thiết bị</a>
                </div>
            </div>
        </div>
</body>
</html>