<?php
// set default variables
require('../../common/define.php');
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../../../assets/css/teacher/teacher_edit.css">
    <title>Chỉnh sửa thông tin giáo viên</title>
</head>

<body>
    <main>
        <form action="teacher_edit.input.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <div>
                    <?php
                    // print error
                    if (isset($error["name"])) {
                        $error_name = $error["name"];
                        echo "<font color='red'>$error_name.</font> </br>";
                    }
                    ?>
                    <label for="name">Họ và tên<span class="required">*</span></label>
                    <input type="text" class="input" name="name" value='<?php echo ($data["name"]); ?>'>
                </div>

                <div>
                    <?php
                    // print error
                    if (isset($error["specialized"])) {
                        $error_specialized = $error["specialized"];
                        echo "<font color='red'>$error_specialized.</font> </br>";
                    }
                    ?>
                    <label for="specialized">Chuyên ngành<span class="required">*</span></label>
                    <select name="specialized">
                        <?php
                        foreach ($specializations as $key => $value) {
                            if ($key == $data["specialized"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option value=$key $selected>$value</option>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <?php
                    // print error
                    if (isset($error["degree"])) {
                        $error_degree = $error["degree"];
                        echo "<font color='red'>$error_degree.</font> </br>";
                    }
                    ?>
                    <label for="degree">Học vị<span class="required">*</span></label>
                    <select name="degree">
                        <?php
                        foreach ($degrees as $key => $value) {
                            if ($key == $data["degree"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option value=$key $selected>$value</option>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <?php
                    // print error
                    if (isset($error["avatar"])) {
                        $error_avatar = $error["avatar"];
                        echo "<font color='red'>$error_avatar.</font> </br>";
                    }
                    ?>
                    <label for="avatar">Avatar<span class="required">*</span></label>
                    <input type="file" name="avatar">
                </div>

                <div>
                    <?php
                    // print error
                    if (isset($error["description"])) {
                        $error_description = $error["description"];
                        echo "<font color='red'>$error_description.</font> </br>";
                    }
                    ?>
                    <label for="description">Mô tả thêm<span class="required">*</span></label>
                    <textarea id="description" name="description" rows="4" cols="40"><?php echo ($data["description"]); ?></textarea>
                </div>

                <button type="submit" class="button" name="confirm">Xác nhận</button>
        </form>
    </main>
</body>

</html>