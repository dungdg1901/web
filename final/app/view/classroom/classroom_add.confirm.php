<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../assets/css/classroom/classroom_add.css" type="text/css">
</head>

<body>
    <div class='form'>
        <form enctype="multipart/form-data" method="post" action="../../controller/classroom/classroom_add.confirm.php">

            <div class="">
                <div class="flex my-1">
                    <div class="label">
                        Tên Phòng học
                    </div>
                    <input id="name" name="name" type='text' value="<?php echo $input->name ?>" readonly />
                </div>
            </div>

            <div class="">
                <div class="flex my-1">
                    <div class="label">
                        Tòa nhà
                    </div>
                    <input id="name" name="name" type='text' value="<?php echo $building ?>" readonly />
                </div>
            </div>

            <div class="">
                <div class="flex my-1">
                    <div class="label">
                        Mô tả chi tiết
                    </div>
                    <textarea name="description" readonly><?php echo $input->description ?></textarea>
                </div>
            </div>

            <div class="">
                <div class="flex my-1">
                    <div class="label">
                        Avatar
                    </div>
                    <img class="mw-5" src="<?php echo $avatar_des ?>" alt="avatar" />
                </div>
            </div>

            <div class="flex jc-space-evenly mt-2">
                <input class="btn" type='submit' name="fix" value="Sửa lại">
                <input class="btn" type='submit' name="confirm" value="Đăng ký">
            </div>
        </form>
    </div>

    <script type="text/javascript">

    </script>

</body>

</html>