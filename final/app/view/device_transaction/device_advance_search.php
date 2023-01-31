<html>
    <head>
        <title>Document</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
		<link rel="stylesheet" type="text/css" href="../../../assets/css/device_transaction/device_advance_search.css">
        <script src="../../../assets/js/device_advance_search.js"></script>
    </head>
<?php
    include "../../../app/controller/device_transaction/device_advance_search.php";
    $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
    $khoa = isset($_POST['type']) ? $_POST['type'] : '';
?>
<body> 
    <div class = 'wrapper'>
        <form action="../../../app/view/device_transaction/device_advance_search.php" method="post">

            
                <label class = 'info'>Từ khoá</label>
                <input class = 'profile' name="keyword" type='text' onkeyup="showResult(this.value)" value=<?php echo $keyword ?> >
            
                <label class = 'info'>Tình trạng</label>
                
                <select class="profile" name="type" id="item_type">

                    <?php foreach (DEVICE_STATUES as $key => $value) { ?>
                        <option class= 'profile' value="<?= $key ?>" <?php if ($key == $khoa) { echo 'selected="selected"';}?> > <?=$value?></option>
                    <?php }?>
                </select>
            
            <div id="livesearch">Gợi ý:</div>
            <input class='btn btn-search' name='register' type='submit' value='Tìm kiếm'>
        </form>
        <div class="data">
            <br>
            <label class = 'count-student'>Số thiết bị đã tìm thấy: <?php echo sizeof($result);?></label>
            <br>
            <button class = 'btn btn-delete' id = "delete">Xoá</button>
            <table>
                <tr>
                    <th class="no">No</th>
                    <th class="name">Tên thiết bị</th>
                    <th class="status">Trạng Thái</th>
                    <th class="action">Action</th>
                </tr>
                
                    <?php
                        foreach ($result as $key =>$value){ ?>
                            <tr>
                                <td><?php echo ($key+1); ?></td>
                                <td><?php echo $value["name"] ?></td>
                                <td> <?php echo $value["returned_date"] == "" ? DEVICE_STATUES["001"] : DEVICE_STATUES["002"]; ?> </td>
                                <td class="action">
                                    <form action = "../../../app/controller/device/device_edit.input.php" class="option">
                                        <button class="btn" type="submit">Sửa</button>
                                        <input name = "sua" type="hidden" value = <?php echo $value['id'];?>>
                                    </form>
                                    <form action = "../../../app/controller/device_transaction/device_transact.php" class="option">
                                        <?php
                                        if ($value["returned_date"] != ""){
                                            echo '<button class="btn" type = "submit">Mượn</button>';
                                        }
                                        ?>
                                        <input name = "muon" type="hidden" value = <?php echo $value['id'];?>>
                                    </form>
                                    
                                    
                                </td>
                            </tr>
                        <?php } 
                        ?>
            </table>
        </div>
    </div>
    
</body>
</html>
