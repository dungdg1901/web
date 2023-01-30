
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" href="../../../assets/css/device/device_add.css" type="text/css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>


<body>
    <form method="post" enctype="multipart/form-data" action="../../controller/device/device_add.confirm.php">
        <div class="container bg">
            <div class="row first-div">
                <div class="label">
                    <label> Tên thiết bị </label>
                </div>
                <p><?php echo $_SESSION['device_name'] ?></p>
            </div>
            <?php if (isset($error["description"])) {
                echo ('<p style="color:red;">' . $error["description"] . '</p>');
            } ?>
            <div class="row">
                <div class="label">
                    <label> Mô tả chi tiết </label>
                </div>
                <p><?php echo $_SESSION['device_description'] ?></p>
            </div>
            <div class="row">
                <label class="label"> Avatar</label>
                <img src="../../../assets/avatar/temp/<?php echo $_SESSION['file_name_new'] ?>" style="width: 400px" alt="">
            </div>
            <div class="btn-submit">
                <input class="center button" style='margin-right: 10px;' type="submit" name="edit_device" value="Sửa lại">
                <input class="center button" type="submit" name="submit_device" value="Đăng ký">
            </div>
        </div>
    </form>
</body>