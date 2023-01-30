<html>

<head>
    <meta charset="UTF-8">
    <title>CONFIRM</title>
    <link rel="stylesheet" href="../../../assets/css/device/device_edit.css" type="text/css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/device_edit.js"></script>
</head>

<body>
   
    <form method="post" action="../../controller/device/device_edit.confirm.php" enctype="multipart/form-data">
        <div class="container bg">
            <div class="row first-div">
                <div class="label-name">
                    <label> Tên thiết bị </label>
                </div>
                <input class="col-input-device-name" type=" text" name="device_name" readonly value="<?php echo $device_name; ?>">
            </div>
            <div class="row">
                <div class="label">
                    <label> Mô tả chi tiết </label>
                </div>
                <textarea class="col-input-device-des" type="text" name="device_description" rows="10" cols="40" readonly value="<?php echo $device_description; ?>"><?php echo $device_description; ?></textarea>
            </div>
            <div class="row">
                <label class="label"> Avatar</label>
                <div>
                    <img class="img-avatar" name="imgAvatar" id="imgAvatar" src="<?php echo $device_avatar; ?>">
                </div>

            </div>
            <div class="btn-submit">
                <input class="center" type="submit" name="fix" value="Sửa lại">
                <input class="center" type="submit" name="register" value="Đăng ký">
            </div>
        </div>
    </form>
</body>