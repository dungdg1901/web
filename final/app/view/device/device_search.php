<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../assets/css/device/device_search.css">
</head>

<body>
    <div class="container-fluid">
        <div class="deviceSearch">
            <div class="deviceForm">
                <form method="POST">

                    <div class="deviceForm--wrap d-flex col-8">
                        <div class="deviceForm--wrap__label col-4"><label for="">Từ khóa</label></div>
                        <input style="height: 36px;border-radius: 4px;border:1px solid black" type="text" class="col-8" name="deviceKey">
                    </div>
                    <div class="deviceForm--wrap d-flex col-8">
                        <div class="deviceForm--wrap__label col-4"><label for="">Tình trạng</label></div>
                        <select name="deviceStatus" id="" class="col-8">
                            <option value="0">Đang rảnh</option>
                            <option value="1">Đang mượn</option>
                        </select>
                    </div>
                    <div class="deviceForm--wrap d-flex col-8">
                        <div class="deviceForm--wrap__space col-4"></div>
                        <div class="deviceForm--wrap__search"><button type="submit" name="device_search" class="btn btn-primary">Tìm kiếm</button></div>

                    </div>
                </form>

            </div>
            <?php echo (isset($resultSearch)) ? "<div class='scheduleResult'>Số bản ghi tìm thấy: <span class='searchResult'> " . count($resultSearch) . " </span></div>" : '' ?>
            <div class="scheduleData">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tên thiết bị</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count=0;
                        if (isset($allDevice)) {
                            $tempList = $allDevice;
                        } else {
                            $tempList = $resultSearch;
                        }

                        foreach ($tempList as $arrs) {
                        ?>

                            <tr>
                                <th scope="row"><?php echo $count += 1 ?></th>
                                <td> <?php echo $arrs['name'] ?></td>
                                <td><?php echo 1 ?></td>
                                <td>
                                <form action="" method="POST">

                                    <div class="manageOption d-flex">
                                        <div class="manageOption--delete me-2"><button class="btn btn-primary" name="deleteDevice" type="submit" value=<?php echo $arrs['id'] ?>>Xoá</button></div>
                                    <div class="manageOption--edit"><button class="btn btn-primary " name="deviceEdit"  value=<?php echo $arrs['id'] ?> >Sửa</button></div>
                                    </div>
                                    </form>

                                </td>
                            </tr>
                        <?php  }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php if(isset($popUp)){ ?>
        <div class="ToastMsg" id="isToast">
            <div class="ToastMsg--wrap">
                <form method="POST">
                    <div class="ToastMsg--title">
                        <h5>Thông báo</h5>
                    </div>
                    <div class="ToastMsg--content">Bạn có muốn xoá thiết bị <?php echo  $_SESSION['name'] ?>?</div>
                    <div class="ToastMsg--btn">
                        <div class="ToastMsg--btn__cancel">
                            <button class="btn btn-primary" id="cancel">Cancel</button>
                        </div>
                        <div class="ToastMsg--btn__confirm">
                            <button type="submit" class="btn btn-primary" name="confirm" id="confirm">OK</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php }?>
    </div>
    <script>
        document.getElementById("cancel").addEventListener("click", function() {
            document.getElementById("isToast").style.display = "none";
        });

        function openToast() {
            document.getElementById("isToast").style.display = "flex";
        }
    </script>
</body>

</html>