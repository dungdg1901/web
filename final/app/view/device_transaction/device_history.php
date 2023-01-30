<html>

<head>
    <meta charset="UTF-8">
    <title>Thiết bị > Lịch sử mượn</title>
    <link rel="stylesheet" href="../assets/device_history.css">
</head>

<body>
    <div class="container">
        <form method="post" class="search-form">
            <div>
                <label for="device" class="search-label">Thiết bị</label>
                <input type="text" name="device" id="device" class="search-input">
            </div>
            <div class="select-wrapper">
                <label for="teacher" class="search-label">Giáo viên</label>
                <span class="select-arrow"></span>
                <select name="teacher" id="teacher" class="search-select">
                    <option value=""></option>
                    <?php foreach ($teachers_name as $key => $value) : ?>
                        <option value=<?= $key ?>><?= $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <input type="submit" value="Tìm kiếm" name="search" class="search-btn" />
            </div>
        </form>

        <div>
            <p>Số lần thiết bị tìm thấy: <?= count($histories) ?></p>
            <table class="list-wrapper">
                <tr>
                    <td style="width: 5%;">No</td>
                    <td style="width: 15%;">Tên thiết bị</td>
                    <td style="width: 35%;">Thời gian dự kiến muộn</td>
                    <td style="width: 20%;">Thời gian trả</td>
                    <td style="width: 15%;">Giáo viên mượn</td>
                </tr>
                <?php foreach ($histories as $key => $history) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $devices_name[$history['device_id']]; ?></td>
                        <td><?= $history['start_transaction_plan']; ?> ~ <?= $history['end_transaction_plan']; ?></td>
                        <td><?= $history['returned_date']; ?></td>
                        <td><?= $teachers_name[$history['teacher_id']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>