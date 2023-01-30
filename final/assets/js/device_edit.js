$('#device_avatar').live('change', function (event) {
    var filename = $("#device_avatar").val();
    if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        document.getElementById("imgAvatar").src = "/web-final-team1/final/assets/avatar/device/default.png";
        document.getElementById("device_ava").value = "/web-final-team1/final/assets/avatar/device/default.png";
        $("#noFile").text("");
    } else {
        $(".file-upload").addClass('active');
        document.getElementById("imgAvatar").src = window.URL.createObjectURL(event.target.files[0]);
        $pathFile = filename.replace("C:\\fakepath\\", "")
        $("#noFile").text($pathFile.substr(0,42));
    }
});