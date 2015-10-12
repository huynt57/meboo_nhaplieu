<div class="row-fluid">
    <div class="span12">
        <div class="alert alert-success" id="ss">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Thành công!</strong> Dữ liệu đã được thêm thành công
        </div>
        <div class="alert alert-error" id="err">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Lỗi !</strong> Đã có lỗi nhập liệu xảy ra, vui lòng thử lại sau
        </div>
        <div class="box">
            <div class="box-title">
                <h3>
                    <i class="icon-ok"></i>
                    Nhập dữ liệu bác sĩ
                </h3>
            </div>
            <div class="box-content">
                <form action="#" method="POST" class='form-horizontal form-validate' id="bb">
                    <div class="control-group">
                        <label for="name" class="control-label">Tên</label>
                        <div class="controls">
                            <input type="text" name="name" id="name" class="input-xlarge" data-rule-required="true" data-rule-minlength="2">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="address" class="control-label">Địa chỉ</label>
                        <div class="controls">
                            <input type="text" name="address" id="address" class="input-xlarge" data-rule-email="true" data-rule-required="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="province" class="control-label">Thành phố</label>
                        <div class="controls">
                            <select name="province" id="province">
                                <?php foreach ($province as $item): ?>
                                    <option value="<?php echo $item->provinceid ?>"><?php echo $item->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="district" class="control-label">Quận huyện</label>
                        <div class="controls">
                            <select name="district" id="district">

                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="ward" class="control-label">Phường xã</label>
                        <div class="controls">

                            <select name="ward" id="ward">
                               
                            </select>

                        </div>
                    </div>
                    <input type="hidden" value="<?php echo Yii::app()->session['user_id'] ?>" name="user_id">


                    <!--                    <div class="control-group">
                                            <label for="city" class="control-label">Tỉnh thành</label>
                                            <div class="controls">
                                                <select>
                                                    <option value="volvo">Volvo</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="mercedes">Mercedes</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>
                                        </div>-->
                    <div class="control-group">
                        <label for="specialist" class="control-label">Chuyên khoa</label>
                        <div class="controls">
                            <input type="text" name="specialist" id="specialist" class="input-xlarge" data-rule-email="true" data-rule-required="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="phone" class="control-label">Phone</label>
                        <div class="controls">
                            <input type="number" name="phone" id="address" class="input-xlarge" data-rule-email="true" data-rule-required="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="email" class="control-label">Email</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" class="input-xlarge" data-rule-email="true" data-rule-required="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="register_number" class="control-label">Số đăng ký khám chữa bệnh</label>
                        <div class="controls">
                            <input type="text" name="register_number" id="register_number" class="input-xlarge" data-rule-email="true" data-rule-required="true">
                        </div>
                    </div>


                    <div class="control-group">
                        <label for="description" class="control-label">Thông tin bổ sung, miêu tả</label>
                        <div class="controls">
                            <textarea name="description" id="description" class="input-xlarge" data-rule-email="true" data-rule-required="true"></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#ss').hide();
        $('#err').hide();

        $('#bb').submit(function (e) {
            var data = $('#bb').serialize();
            e.preventDefault();
            $.ajax({
                beforeSend: function () {
                    $('#ss').hide();
                    $('#err').hide();
                },
                url: '<?php echo Yii::app()->createUrl('user/addDoctor') ?>',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function (response)
                {
                    if (response.status === 1)
                    {
                        $('#ss').show();
                        $("#bb").trigger('reset'); //jquery
                    }
                    else {
                        $('#err').show();
                        $("#bb").trigger('reset'); //jquery
                    }
                },
            });
        });
    });

    $(document).ready(function () {
        $(document).on('change', '#province', function (e) {
            e.preventDefault();
            var province_id = $(this).val();
            if (province_id !== '') {
                $.ajax({
                    beforeSend: function (xhr) {
                        $('#district').empty();
                        $('#ward').empty();
                    },
                    type: 'POST',
                    url: '<?php echo Yii::app()->createUrl('user/getDistrictByProvince') ?>',
                    dataType: 'json',
                    data: {province_id: province_id},
                    success: function (response)
                    {
                        var cnt = Object.keys(response).length;
                        if (cnt > 1) {
                            $.each(response, function (key, value) {
                                var html = '<option value="' + this.districtid + '">' + this.name + '</option>';
                                $('#district').append(html);

                            });
                        }
                    }
                });
            }
        });
        
        $(document).on('change', '#district', function (e) {
            e.preventDefault();
            var district_id = $(this).val();
            if (district_id !== '') {
                $.ajax({
                    beforeSend: function (xhr) {
                        $('#ward').empty();
                    },
                    type: 'POST',
                    url: '<?php echo Yii::app()->createUrl('user/getWardByDistrict') ?>',
                    dataType: 'json',
                    data: {district_id: district_id},
                    success: function (response)
                    {
                        var cnt = Object.keys(response).length;
                        if (cnt > 1) {
                            $.each(response, function (key, value) {
                                var html = '<option value="' + this.wardid + '">' + this.name + '</option>';
                                $('#ward').append(html);

                            });
                        }
                    }
                });
            }
        });

    });
</script>