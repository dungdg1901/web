<?php
// set default variables
require('../../common/define.php');
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../../../assets/css/teacher/teacher_edit.css">
    <title>Xác nhận chỉnh sửa thông tin giáo viên</title>
</head>

<body>
    <main>
        <form action="teacher_edit.confirm.php" method="post">
            <div class="container">
                <div>
                    <label for="name">Họ và tên</label>
                    <?php
                    echo $_SESSION["name"] . '</br>';
                    ?>
                </div>

                <div>
                    <label for="specialized">Chuyên ngành</label>
                    <?php
                    echo $specializations[$_SESSION["specialized"]] . '</br>';
                    ?>
                </div>

                <div>
                    <label for="degree">Học vị</label>
                    <?php
                    echo  $degrees[$_SESSION["degree"]] . '</br>';
                    ?>
                </div>

                <div>
                    <label for="avatar">Avatar</label>
                    <?php
                    $image = $_SESSION["avatar"];
                    echo "<img src=$image width='200px'>";
                    ?>
                </div>

                <div>
                    <label for="description">Mô tả thêm</label>
                    <?php
                    echo $_SESSION["description"] . '</br>';
                    ?>
                </div>

                <div>
                    <button type="submit" class="button" name="edit">Sửa lại</button>
                    <button type="submit" class="button" name="complete">Đăng ký</button>
                </div>

        </form>
    </main>
</body>

</html>