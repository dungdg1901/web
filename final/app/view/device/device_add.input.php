<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" href="../../../assets/css/device/device_add.css" type="text/css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>


<body>
    <form method="post" enctype="multipart/form-data" action="../../controller/device/device_add.input.php">
        <div class="container bg">
            <?php if (isset($error["name"])) {
                echo ('<p style="color:red; margin-left: 30px; padding: 0px;">' . $error["name"] . '</p>');
            } ?>
            <div class="row first-div">
                <div class="label">
                    <label> Tên thiết bị </label>
                </div>
                <input class="col-input-device-name" type=" text" name="device_name" value="<?php echo $device_name; ?>">
            </div>
            <?php if (isset($error["description"])) {
                echo ('<p style="color:red; margin-left: 30px;padding: 0px;">' . $error["description"] . '</p>');
            } ?>
            <div class="row">
                <div class="label">
                    <label> Mô tả chi tiết </label>
                </div>
                <textarea class="col-input-des" type="text" name="device_description" rows="10" cols="40"><?php echo $device_description; ?></textarea>
            </div>
            <?php if (isset($error["img_err"])) {
                echo ('<p style="color:red; margin-left: 30px;padding: 0px;">' . $error["img_err"] . '</p>');
            } ?>
            <div class="row">
                <label class="label"> Avatar </label>
                <div class="file-upload">
                    <div class="file-select ">
                        <input type="file" name="choose_file" id="choose_file">
                        <div class="file-select-name" id="noFile"></div>
                        <div class="file-select-button" id="fileName" style="float:right">Browse</div>
                    </div>
                </div>
            </div>
            <div class="btn-submit">
                <input class="center button" type="submit" name="submit_device" value="Xác nhận">
            </div>
        </div>
    </form>
</body>

<script type="text/javascript">
    $('#choose_file').bind('change', function() {
        var filename = $("#choose_file").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass('active');
            $("#noFile").text("No file chosen...");
        } else {
            $(".file-upload").addClass('active');
            $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });
</script>