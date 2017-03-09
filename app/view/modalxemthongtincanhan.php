<div id="layoutXemThongTin">

</div>
<script>
    $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on('click', "#btnThoatThongTin", function () {
            $('#ModalXemThongTin').modal('toggle');
            location.reload();
        });

        $(document).on('change', "#imgProFile", function () {
            readURL(this);
        });
        $(document).on('click', ".trogiup", function () {
            $("#tro_giup").toggle();
        });


        function validateEmail(email) {
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
        $(document).on('click', "#btnLuuThongTin", function () {
            var nameUpdate = $('#nameUpdate').val();
            var addressUpdate = $('#addressUpdate').val();
            var numberPhoneUpdate = $('#numberPhoneUpdate').val();
            var sexUpdate = $('input[name="sexUpdate"]:checked').val();

            var file_data = $('#imgProFile').prop('files')[0];
            var form_data = new FormData();
            form_data.append('imgProFile', file_data);
            form_data.append('nameUpdate', nameUpdate);
            form_data.append('addressUpdate', addressUpdate);
            form_data.append('numberPhoneUpdate', numberPhoneUpdate);
            form_data.append('sexUpdate', sexUpdate);
            if ( nameUpdate == "" || addressUpdate == "" || numberPhoneUpdate == "" || sexUpdate == "") {
                if(lang == "vi")
                    $('#thongbaocapnhat').text("Hãy nhập đầy đủ thông tin");
                else
                    $('#thongbaocapnhat').text("Please enter full information");
                return false;
            }else if (isNaN(numberPhoneUpdate)) {
                if(lang == "vi")
                    $('#thongbaocapnhat').text("Điện thoại phải là số");
                else
                    $('#thongbaocapnhat').text("Number phone must be number");
                return false;
            } else {
                $.ajax({
                    url: lang + "/controller/capNhatThongTin",
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function (dulieu) {
                        var x = Number(dulieu);
                        if (x == 2) {
                            $('#ModalXemThongTin').modal('toggle');
                            location.reload();
                            $('#thongbaocapnhat').text("");
                            if(lang == "vi")
                                alert("Cập nhật thông tin thành công");
                            else
                                alert("Update information successfull");
                        }
                        else {
                            modalxemthongtin.style.display = "block";
                            if (x == 3){
                                if(lang == "vi")
                                    $('#thongbaocapnhat').text("Cập nhật thông tin bị lỗi, mời bạn thực hiện lại");
                                else
                                    $('#thongbaocapnhat').text("Update information has been error, please do it later");
                            }
                        }
                    }
                }).done(function (data) {
                });
                return true;
            }
        });
    });
</script>