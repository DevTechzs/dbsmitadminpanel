<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="assets/images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="assets/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <!-- color css -->
    <!-- select bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="assets/css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/custom.css" />
    <!-- calendar file css -->
    <link rel="stylesheet" href="assets/js/semantic.min.css" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>


<body class="register-page">
    <noscript>
        Please enable javascript support
    </noscript>
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
                <div class="login_section">
                    <div class="logo_login">
                        <div class="center">
                            <img width="210" src="images/logo/logo.png" alt="#" />
                        </div>
                    </div>
                    <div class="login_form">
                        <form action="" id="login-form" role="form" method="POST">
                            <fieldset>
                                <div class="field">
                                    <label class="label_field">User name</label>
                                    <input type="text" placeholder="User name" id="Username">
                                </div>
                                <div class="field">
                                    <label class="label_field">Passwords</label>
                                    <input type="password" placeholder="Password" id="Password">
                                </div>
                                <!-- <div class="field">
                              <label class="label_field hidden">hidden label</label>
                              <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label>
                              <a class="forgot" href="">Forgotten Password?</a>
                           </div> -->
                                <div class="field margin_0">
                                    <label class="label_field hidden">hidden label</label>
                                    <button class="main_bt">Sing In</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="js/animate.js"></script>
    <!-- select country -->
    <script src="js/bootstrap-select.js"></script>
    <!-- nice scrollbar -->
    <script src="js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="assets/js/argon-design-system.min.js?v=1.0.2" type="text/javascript"></script>
    <script src="assets/js/md5.js"></script>
    <script src="assets/js/loader/loadingoverlay.js"></script>
</body>

<script>
    $('#Password').on('keypress', function(e) {
        if (e.which == 13) {
            AuthCall();
        }
    });

    $(document).on('keypress', 'input', function(e) {
        if (e.which == 13) {
            e.preventDefault();
            var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
            console.log($next.length);
            if (!$next.length) {
                $next = $('[tabIndex=1]');
            }
            $next.focus();
        }
    });

    $("#login-form").on('submit', function(e) {

        e.preventDefault();
        AuthCall();
    });


    function AuthCall() {

        try {

            var json = new Object();
            json.Username = $("#Username")[0].value;
            json.Password = $("#Password")[0].value;

            var svcdta = new Object();
            svcdta.Module = "Auth";
            svcdta.Page_key = "Login";
            svcdta.JSON = json;

            Authenticate(svcdta);
        } catch (ex) {
            console.log(ex.stack);
            alert(ex.stack);
        }

    }

    var ipaddress;
    $(document).ready(function() {
        sessionStorage.clear();
        localStorage.clear();

        $("#Username")[0].focus();
    });
    var msgToDisplay;



    function clearForm() {
        $("#Username")[0].value = "";
        $("#Password")[0].value = "";
        $("#Username")[0].focus();
    }

    function Authenticate(svcdta) {

        $.LoadingOverlay("show");
        svcdta.MSC = $.md5(new Date().getDate().toString().padStart(2, "0"));
        var data = JSON.stringify(svcdta);
        $.ajax({
            data: data,
            type: 'POST',
            dataType: 'json',
            contentType: 'application/json',
            async: false,
            url: "index.php",
            success: function showData(arg) {
                onSuccess(arg);
            },
            error: function err(arg) {
                $.LoadingOverlay("hide");

                console.log(JSON.stringify(arg));

                if (arg.status == 404)
                    alert(arg.statusText);
                else if (arg.status == 0) {
                    alert(arg.statusText);
                } else {

                }
            }
        });
    }


    //on success call
    function onSuccess(rc) {

        $.LoadingOverlay("hide");
        console.log(JSON.stringify(rc));

        if (rc.return_code) // data was recieved successfully 
        {
            var f = rc.return_data;
            sessionStorage.setItem("PrayagEdu_user", f.username);
            sessionStorage.setItem("PrayagEdu_session", f.sessionkey);
            window.open(f["nextPage"], '_self');
        } else //data was recieved successfully but was returned by service with error code
        {
            try {
                alert(rc.return_data);
                clearForm();
            } catch (ex) {
                alert(ex.stack);
            }
        }
        //Hideloadingpanle();

    }
</script>

</html>