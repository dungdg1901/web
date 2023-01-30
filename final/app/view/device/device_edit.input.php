<html>

<head>
    <meta charset="UTF-8">
    <title>INPUT</title>
    <link rel="stylesheet" href="../../../assets/css/device/device_edit.css" type="text/css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/device_edit.js"></script>
</head>

<body>
    <?php
    echo isset($validate_device) ? '<div class ="alert">' . $validate_device . '</div>' : '';
    echo isset($validate_description) ? '<div class ="alert">' . $validate_description . '</div>' : '';
    echo isset($validate_avatar) ? '<div class ="alert">' . $validate_avatar . '</div>' : '';
    ?>

    <form method="post" action="../../controller/device/device_edit.input.php" enctype="multipart/form-data">
        <div class="container bg">
            <div class="row first-div">
                <div class="label-name">
                    <label> Tên thiết bị </label>
                </div>
                <input class="col-input-device-name" type=" text" name="device_name" value="<?php echo $device_name; ?>">
            </div>
            <div class="row">
                <div class="label">
                    <label> Mô tả chi tiết </label>
                </div>
                <textarea class="col-input-device-des" type="text" name="device_description" rows="10" cols="40" value="<?php echo $device_description; ?>"><?php echo $device_description; ?></textarea>
            </div>
            <div class="row">
                <label class="label"> Avatar</label>
                <div>
                    <img class="img-avatar" name="imgAvatar" id="imgAvatar"  src="<?php echo $device_avatar; ?>">
                    <input hidden type=" text" name="device_ava" id="device_ava" value = "<?php echo $device_avatar; ?>">
                    <div class="file-upload">
                        <div class="file-select ">
                            <input type="file" name="device_avatar" id="device_avatar">
                            <div class="file-select-name" id="noFile"><?php echo  isset($device_img_name) ?$device_img_name:"" ; ?></div>
                            <div class="file-select-button" id="fileName" style="float:right">Browse</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="btn-submit">
                <input class="center" type="submit" name="submit" value="Xác nhận">
            </div>
        </div>
    </form>
</body>