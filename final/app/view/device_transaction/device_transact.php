<!DOCTYPE html>
<html>

<head>
    <title>Mượn thiết bị</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../assets/css/device_transaction/device_transact.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
    </script>

    <script src="../../../assets/js/device_transact.js"></script>
</head>

<body>
    <div class="form">
    
        <form method="post" action="../../controller/device_transaction/device_transact.php" enctype="multipart/form-data">
        <?php
            echo isset($validate_deviceid) ? '<div class ="alert">'.$validate_deviceid.'</div>' : '';
            echo isset($validate_teacher_id) ? '<div class ="alert">'.$validate_teacher_id.'</div>' : '';
            echo isset($validate_classroom_id) ? '<div class ="alert">'.$validate_classroom_id.'</div>' : '';
            echo isset($validate_start_transaction_plan) ? '<div class ="alert">'.$validate_start_transaction_plan.'</div>' : '';
            echo isset($validate_end_transaction_plan) ? '<div class ="alert">'.$validate_end_transaction_plan.'</div>' : '';
            echo isset($validate_time) ? '<div class ="alert">'.$validate_time.'</div>' : '';
        ?>
            <div class="row_first">
                <div class="label">Tên thiết bị<span class="span">*</span></div>
                <div class="column"></div>
                <input class="input1" type="text" name="device_id" 
                value="<?php echo isset($device_name) ? $device_name : ''; ?>" disabled >
            </div>
            <div class="row">
                <div class="label">Giáo viên<span class="span">*</span></div>
                <div class="column"></div>
                <select name="teacher_id" id="" value="<?php echo $teacher_id; ?>">
                    <option></option>
                    <?php
                    foreach ($teachers as $key => $value) {
                    ?>
                        <option <?php 
                                    if ($teacher_id == $key) {
                                        echo 'selected';
                                    } ?> value="<?php echo $key; ?>"><?php echo $value ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="label">Lớp học<span class="span">*</span></div>
                <div class="column"></div>
                <select name="classroom_id" id="" value="<?php echo $classroom_id; ?>">
                    <option></option>
                <?php
                    foreach ($classrooms as $key => $value) {
                    ?>
                        <option <?php 
                                    if ($classroom_id == $key) {
                                        echo 'selected';
                                    } ?> value="<?php echo $key; ?>"><?php echo $value ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="label">Thời gian bắt đầu<span class="span">*</span></div>
                <div class="column"></div>
                <input class="datetimepicker" type="text" placeholder="dd-mm-yyyy H:i" id="startDate" name="startDate"
                value = ""
                >
            </div>
            <div class="row" id="end_date">
                <div class="label">Thời gian kết thúc<span class="span">*</span></div>
                <div class="column"></div>
                <input class="datetimepicker" type="text" placeholder="dd-mm-yyyy H:i" id="endDate" name="endDate"
                value = ""
                >
            </div>

            <input class="button" type="submit" value="Mượn" name="submit">
        </form>

    </div>
</body>

</html>