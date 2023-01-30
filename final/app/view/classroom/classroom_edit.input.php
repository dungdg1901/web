<!DOCTYPE html>
<meta charset="utf-8">
<title>Chỉnh sửa thông tin phòng học</title>
<link rel="stylesheet" href="../../../assets/css/classroom/classroom_edit.css">
<form action="../../controller/classroom/classroom_edit.input.php" method="post" enctype="multipart/form-data">
	<table>
		<?php
		if (isset($es["name"])) {
			$txt = sprintf('<tr><td><p class="error">%s</p></td></tr>', $es["name"]);
			print($txt);
		}
		?>
		<tr>
			<td style="width:200px">
				<label for="classroom_name" class="required">Tên phòng học</label>
			</td>
			<td>
				<?php
				print('<input type="text" name="name" id="classroom_name" value = "' . $res["name"] . '" />')
				?>
			</td>
		</tr>
		<?php
		if (isset($es["building"])) {
			$txt = sprintf('<tr><td><p class="error">%s</p></td></tr>', $es["building"]);
			print($txt);
		}
		?>
		<tr>
			<td>
				<label for="classroom_building" class="required">Tòa nhà</label>
			</td>
			<td>
				<select name="building" id="classroom_building">
					<?php
					foreach ($buildings as $key => $value) {
						$txt = sprintf('<option value="%s" %s>%s</option>', $key, $key == $res["building"] ? 'selected' : '', $value);
						echo ($txt);
					}
					?>
				</select>
			</td>
		</tr>
		<?php
		if (isset($es["description"])) {
			$txt = sprintf('<tr><td><p class="error">%s</p></td></tr>', $es["description"]);
			print($txt);
		}
		?>
		<tr>
			<td>
				<label for="classroom_description" class="required">Mô tả chi tiết</label>
			</td>
			<td>
				<?php
				print('<textarea id="classroom_description" name="description">' . $res["description"] . '</textarea>');
				?>
			</td>
		</tr>
		<?php
		if (isset($es["avatar"])) {
			$txt = sprintf('<tr><td><p class="error">%s</p></td></tr>', $es["avatar"]);
			print($txt);
		}
		?>
		<tr>
			<td>
				<label for="classroom_avatar" class="required">Hình ảnh</label>
			</td>
			<td>
				<?php
				print('<input type="hidden" name="avatar_string" id="classroom_avatar" value = "' . $res["avatar"] . '" />')
				?>
				<?php
				echo ('<img id="avatar_preview" class="inform" src="../../../assets/avatar/temp/' . $res["avatar"] . '" alt="Anh loi">');
				?>
				<input type="file" name="avatar" id="avatar" accept="image/*" />
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="confirm_edit" value="Xác nhận" />
			</td>
		</tr>
	</table>
</form>

<script type="text/javascript">
	var avatar_choose = document.getElementById("avatar");
	var avatar_preview = document.getElementById("avatar_preview");

	avatar_choose.onchange = evt => {
		const [file] = avatar_choose.files
		if (file) {
			avatar_preview.src = URL.createObjectURL(file)
		}
	}
</script>