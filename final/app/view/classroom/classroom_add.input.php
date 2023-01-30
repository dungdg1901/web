<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../assets/css/classroom/classroom_add.css" type="text/css">
</head>

<body>
    <div class='form'>
        <form enctype="multipart/form-data" method="post" action="../../controller/classroom/classroom_add.input.php">
            <div class="">
                <span class="clr-red"> <?= $errors->name ?> </span>
                <div class="flex my-1">
                    <div class="label">
                        Tên Phòng học
                    </div>
                    <input id="name" name="name" type='text' value="<?php echo isset($input->name) ? $input->name : ''; ?>" />
                </div>
            </div>

            <div class="">
                <span class="clr-red"> <?= $errors->building ?> </span>
                <div class="flex my-1">
                    <div class="label">
                        Tòa nhà
                    </div>
                    <select class="h-2d5" name="building">
                        <option value=""></option>
                        <?php
                        foreach ($buildings as $key => $value) {
                            if ($key == $input->building) {
                                echo "<option selected value='$key'>$value</option>";
                            } else {
                                echo "<option value='$key'>$value</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="">
                <span class="clr-red"> <?= $errors->description ?> </span>
                <div class="flex my-1">
                    <div class="label">
                        Mô tả chi tiết
                    </div>
                    <textarea name="description"><?php echo isset($input->description) ? $input->description : ''; ?></textarea>
                </div>
            </div>

            <div class="">
                <span class="clr-red"> <?= $errors->avatar ?> </span>
                <div class="flex my-1">
                    <div class="label">
                        Avatar
                    </div>
                    <div class="upload-file">
                        <label id="upload-label" class="" for=""><?php echo $avatar ?></label>
                        <div class="browse-btn">
                            <input class="btn" type='button' value="Browse">
                            <input type="file" name="avatar" id="avatar" onchange="updateFileName(this);">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2 flex jc-center">
                <input class="btn" type='submit' name="submit" value="Xác Nhận">
            </div>
        </form>
    </div>

    <script type="text/javascript">
        const updateFileName = (myFile) => {
            var file = myFile.files[0];
            var filename = file.name;
            document.getElementById('upload-label').innerHTML = filename;
        }
    </script>

</body>

</html>