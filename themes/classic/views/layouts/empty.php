<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
        <meta name="language" content="en">

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap.min.css">
        <!-- Bootstrap responsive -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap-responsive.min.css">
        <!-- jQuery UI -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/jquery-ui/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
        <!-- PageGuide -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/pageguide/pageguide.css">
        <!-- Fullcalendar -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/fullcalendar/fullcalendar.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/fullcalendar/fullcalendar.print.css" media="print">
        <!-- Tagsinput -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/tagsinput/jquery.tagsinput.css">
        <!-- chosen -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/chosen/chosen.css">
        <!-- multi select -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/multiselect/multi-select.css">
        <!-- timepicker -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- colorpicker -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/colorpicker/colorpicker.css">
        <!-- Datepicker -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/datepicker/datepicker.css">
        <!-- Daterangepicker -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/daterangepicker/daterangepicker.css">
        <!-- Plupload -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/plupload/jquery.plupload.queue.css">
        <!-- select2 -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/select2/select2.css">
        <!-- icheck -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/icheck/all.css">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/style.css">
        <!-- Color CSS -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/themes.css">


        <!-- jQuery -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.min.js"></script>

        <!-- Nice Scroll -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- imagesLoaded -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
        <!-- jQuery UI -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/jquery-ui/jquery.ui.spinner.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/jquery-ui/jquery.ui.slider.js"></script>
        <!-- slimScroll -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootstrap.min.js"></script>
        <!-- Bootbox -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/bootbox/jquery.bootbox.js"></script>
        <!-- Bootbox -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/form/jquery.form.min.js"></script>
        <!-- Validation -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/validation/jquery.validate.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/validation/additional-methods.min.js"></script>
        <!-- Masked inputs -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/maskedinput/jquery.maskedinput.min.js"></script>
        <!-- TagsInput -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- Datepicker -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Daterangepicker -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/daterangepicker/moment.min.js"></script>
        <!-- Timepicker -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!-- Colorpicker -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/colorpicker/bootstrap-colorpicker.js"></script>
        <!-- Chosen -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/chosen/chosen.jquery.min.js"></script>
        <!-- MultiSelect -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/multiselect/jquery.multi-select.js"></script>
        <!-- CKEditor -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/ckeditor/ckeditor.js"></script>
        <!-- PLUpload -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/plupload/plupload.full.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/plupload/jquery.plupload.queue.js"></script>
        <!-- Custom file upload -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/fileupload/bootstrap-fileupload.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/mockjax/jquery.mockjax.js"></script>
        <!-- select2 -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/select2/select2.min.js"></script>
        <!-- icheck -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/icheck/jquery.icheck.min.js"></script>
        <!-- complexify -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/complexify/jquery.complexify-banlist.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/complexify/jquery.complexify.min.js"></script>
        <!-- Mockjax -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/mockjax/jquery.mockjax.js"></script>
        <!-- Theme framework -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/eakroko.min.js"></script>    
        <!-- Just for demonstration -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/demonstration.min.js"></script>  

        <title>Đăng nhập meboo</title>
        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '<?php echo Yii::app()->params['fb_app_id'] ?>',
                    xfbml: true,
                    version: 'v2.4'
                });
                FB.getLoginStatus(function (response) {
                    if (response.status === 'connected') {
                        console.log('Logged in.');
                    }
                });
            };
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=1493872717557948";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));


// Only works after `FB.init` is called
            function myFacebookLogin() {
                FB.login(function () {
                    FB.api('/me?fields=id,name,email,picture,first_name, last_name, gender, link, age_range, address, birthday, locale', function (response) {
                        //console.log(response);
                        $.ajax({
                            url: '<?php echo Yii::app()->createUrl('user/LoginWithFacebook') ?>',
                            type: 'POST',
                            data: {
                                facebook_id: response.id,
                                gender: response.gender,
                                name: response.name,
                                email: response.email,
                                location: response.locale,
                                birthday: response.birthday,
                                photo: response.picture.data.url,
                            },
                            dataType: 'json',
                            success: function (res) {
                                console.log(res);
                               
                                if (res.status === 1) {
                                    window.location = "<?php echo Yii::app()->createAbsoluteUrl('user/input') ?>";
                                }
                            },
                            error: function (res) {
                                console.log(res);
                            }
                        });
                    });
                }, {scope: 'publish_actions, public_profile, email'});
            }

            function myFacebookLogout() {
                FB.logout(function (response) {
                    // user is now logged out
                });
            }
        </script>
    </head>

    <?php echo $content; ?>
</html>