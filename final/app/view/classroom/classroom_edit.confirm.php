<!DOCTYPE html>
<meta charset="utf-8">
<title>Chỉnh sửa thông tin phòng học (xác nhận)</title>
<link rel="stylesheet" href="../../../assets/css/classroom/classroom_edit.css">
<form action="../../controller/classroom/classroom_edit.confirm.php" method="post">
	<table>
		<tr>
			<td style="width:200px">
				<label for="classroom_name">Tên phòng học</label>
			</td>
			<td>
				<?php
				echo ('<input class="who_cares" type="text" name="name" value = "' . $_SESSION["name"] . '" readonly/>');
				?>
			</td>
		</tr>
		<tr>
			<td>
				<label for="classroom_building">Tòa nhà</label>
			</td>
			<td>
				<?php
				echo ('<input class="who_cares" type="text" name="building" value = "' . $buildings[$_SESSION["building"]] . '" readonly/>');
				?>
			</td>
		</tr>
		<tr>
			<td>
				<label for="classroom_description">Mô tả chi tiết</label>
			</td>
			<td>
				<?php
				// echo ('<input class="who_cares" type="text" name="description" value = "' . $_SESSION["description"] . '" readonly/>');
				print('<textarea class="who_cares" name="description" readonly>' . $_SESSION["description"] . '</textarea>');
				?>
			</td>
		</tr>
		<tr>
			<td>
				<label for="classroom_avatar">Hình ảnh</label>
			</td>
			<td>
				<?php
				echo ('<img class="inform" src="../../../assets/avatar/temp/' . $_SESSION["avatar"] . '" alt="Anh loi">');
				?>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="edit" value="Sửa lại" />
			</td>
			<td>
				<input type="submit" name="confirm" value="Sửa" />
			</td>
		</tr>
	</table>
</form>