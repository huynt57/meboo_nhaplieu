<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
        <meta name="language" content="en">


        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap.min.css">
        <!-- Bootstrap responsive -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap-responsive.min.css">
        <!-- jQuery UI -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/jquery-ui/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
        <!-- dataTables -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/datatable/TableTools.css">
        <!-- chosen -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins/chosen/chosen.css">
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
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/jquery-ui/jquery.ui.datepicker.min.js"></script>
        <!-- slimScroll -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootstrap.min.js"></script>
        <!-- Bootbox -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins/bootbox/jquery.bootbox.js"></script>




        <title>Nhập liệu meboo</title>
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
                                alert(res.status);
                                if (res.status === 1) {
                                    window.location = "<?php echo Yii::app()->createAbsoluteUrl('user/input') ?>";
                                }
                            },
                            error: function (res) {
                                console.log(res);
                            }
                        });
                    }, {scope: 'publish_actions, public_profile, email'});
                });
            };
            function myFacebookLogout() {
                FB.logout(function (response) {
                    // user is now logged out
                });
            }
        </script>
    </head>

    <body> 


        <!-- BEGIN -->
        <div class="container">
            <?php echo $content; ?>
            <div class="clear"></div>
            <div id="footer">
            </div><!-- footer -->
        </div><!-- containder div -->

    </body>
</html>
