<?php include '../../common/db.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../assets/css/device_transaction/device_return.css">
</head>

<body>
    <div class="wrapper">

        <form action="../../../app/controller/device_transaction/device_return.php" method="get" enctype="multipart/form-data">

            <div class="input-box name-box">
                <label for="" class="label-input">
                    Thiết bị
                </label>
                <?php $keyword = "" ?>
                <input type="text" class="text-field" id="fullname" name="keyword" value=<?php echo $keyword ?>>
            </div>
            <div class="input-box faculty-box">
                <label class="label-input">
                    Giáo viên
                </label>
                <select name="teacher" id="teacher" class="select-field">
                    <option value=""> Chọn giáo viên</option>

                    <?php foreach ($teachers as $teacher) {
                    ?>

                        <option value=<?php echo $teacher['id'] ?>><?php echo $teacher['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-box faculty-box">
                <label for="faculty" class="label-input">
                    Lớp học
                </label>
                <select name="classroom" id="classroom" class="select-field">
                    <option value=""> Chọn lớp học</option>
                    <?php foreach ($classrooms as $classroom) { ?>
                        <option value=<?php echo $classroom['id'] ?>><?php echo $classroom['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="button-box1">
                <button class="button-submit" type="submit">Tìm kiếm</button>
            </div>
        </form>
        <div class="input-box name-box" style=" padding: 10px;">
            <p style="float: left;">Số thiết bị tìm thấy: <?php echo isset($result) ? count($result) : "" ?></p>
        </div>

        <div class="list_device">
            <table style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Tên thiết bị</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                </tr>
                <?php
                $a = 1;
                foreach ($result as $device) {
                ?>
                    <tr>
                        <td><?php echo $a;
                            $a += 1; ?></td>
                        <td><?php echo ($device['name']); ?></td>
                        <td><?php echo ($device['returned_date'] != NULL) ? 'Đang rảnh' : 'Đang mượn'  ?></td>
                        <form action="" method="POST">
                            <td>
                                <?php
                                if ($device['returned_date'] == NUll) {
                                ?>

                                    <button class="button_action" id="demo" type="submit" name="popupValue" style="border: 1px solid #41719c;padding: 3px 30px;background-color: #4273b1;opacity: 0.8; color: white;" value="<?php echo $device['id'] ?>">Trả</button>

                                <?php } ?>
                            </td>
                        </form>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
    <?php if (isset($isPopup)) { ?>
        <div class="popup">
            <div class="popup-wrap">
                <div class="popup--title" style="color: white">Bạn có muốn trả thiết bị <?php echo $device['name']  ?>?</div>
                <div class="popup--select">
                    <form action="" method="POST" class=button-box>
                        <div class="popup--select">
                            <button type="submit" name="cancel">NO</button>
                            <button type="submit" name="confirm">YES</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</body>

</html>