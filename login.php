<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./public/css/login.css">

    <title>Document</title>
</head>

<body>

    <div class="contain">
        <div class="form_contain">
            <div class="logo">
                <img src="./public/img/ic_logo_main.png" alt="" style="width: 100px">
            </div>
            <div id="login_contain">
                <form style="width: 100%" onsubmit="return false;" id="login_form">
                    <div class="title">
                        <h4>SIGN IN</h4>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="login_phone" name="login_email"
                            placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="login_pass" name="login_pass">
                    </div>
                    <div class="login_options">
                        <a href="#" class='options'>Forgot passwor?</a>
                        <a href="#" class='options' id="signup_click">Sign up</a>
                    </div>
                    <br>
                    <button type="button" class="btn btn_login" id="btn_login" style="width: 100%">LOG IN</button>
                </form>
            </div>

            <div id="signup_contain">
                <form style="width: 100%" onsubmit="return false;">
                    <div class="title">
                        <h4>SIGN UP</h4>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Shop's Name</label>
                        <input type="text" class="form-control" placeholder="ABC store" id="shop_name" name="shop_name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                        <input type="text" class="form-control" placeholder="Your shop address" id="shop_address"
                            name="shop_address">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Logo</label>
                        <input type="file" class="form-control" id="shop_logo" name="shop_logo">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Owner</label>
                        <input type="text" class="form-control" placeholder="Your full name" id="shop_owner"
                            name="shop_owner">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Your ID card:</label>
                        <input type="number" class="form-control" placeholder="ID card" id="id_card" name="id_card">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone:</label>
                        <input type="number" class="form-control" placeholder="0123456789" id="signup_phone"
                            name="signup_phone">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email:</label>
                        <input type="email" class="form-control" placeholder="example@gmail.com" id="signup_email"
                            name="signup_phone">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password:</label>
                        <input type="password" class="form-control" placeholder="Your password" id="signUp_pass"
                            name="signUp_pass">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" placeholder="Confirm your password"
                            id="confirm_pass" name="confirm_pass">
                    </div>

                    <br>
                    <button type="button" class="btn btn_login" id="btn_signup" style="width: 100%">SIGN UP</button>
                </form>
            </div>
        </div>


    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter OTP:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Enter OTP you was recieved in your mail."
                            id="otp">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn_otp_check">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
let base64String = "";


$('#signup_contain').hide();
$('#signup_click').click(() => {
    $('#signup_contain').slideToggle('slow');
    $('#login_contain').hide();
    $('.form_contain').css('width', '600px');
    $('.form_contain').css('margin', '50px');

})

$('#btn_signup').click(function() {
    // shop_name
    // shop_address
    // shop_logo
    // shop_owner
    // id_card
    // signup_phone
    // signup_email
    // signUp_pass
    if ($('#shop_name').val() == "" || $('#shop_address').val() == "" || $('#shop_logo').val() == "" || $(
            '#shop_owner').val() == "" || $('#id_card').val() == "" || $('#signup_phone').val() == "" || $(
            '#signup_email').val() == "" || $('#signUp_pass').val() == "") {
        alert('Fill the form agian');
    } else {
        let base64 = imageUploaded();
        if (base64 == "") {
            alert('click again!')
        } else {
            $.ajax({
                url: 'http://localhost/api/user_api.php',
                method: 'POST',
                data: {
                    shop_name: $('#shop_name').val(),
                    shop_address: $('#shop_address').val(),
                    shop_logo: base64,
                    shop_ower: $('#shop_owner').val(),
                    shop_idcard: $('#id_card').val(),
                    shop_phone: $('#signup_phone').val(),
                    shop_email: $('#signup_email').val(),
                    shop_password: $('#signUp_pass').val()
                },
                success: (data) => {
                    // console.log(data);
                    let status = JSON.parse(data).status;
                    if (status) {
                        $('#exampleModal').modal('show');
                    }
                }
            })

        }
    }
})

$('#btn_otp_check').click(function() {
    if ($('#otp').val() == "") {
        alert('Fill your otp before submit please!');
    } else {
        $.ajax({
            url: 'http://localhost/api/user_api.php',
            method: 'POST',
            data: {
                shop_otp: $('#otp').val()
            },
            success: (data) => {
                let status = JSON.parse(data).status;
                if (status) {
                    alert('Sign up success!');
                    $('#exampleModal').modal('hide');
                    window.location.reload();
                } else {
                    alert('Wrong OTP, enter agian please!');
                }
            }
        })
    }
})

function imageUploaded() {
    var file = document.querySelector(
        'input[type=file]')['files'][0];

    var reader = new FileReader();
    // console.log("next");

    reader.onload = function() {
        base64String = reader.result.replace("data:", "")
            .replace(/^.+,/, "");
        // console.log(base64String);
    }
    reader.readAsDataURL(file);
    return base64String;
}


$('#btn_login').click(function() {
    if ($('#login_email').val() == "" || $('#login_pass').val() == "") {
        alert('Wrong password or email!');
    } else {
        $.ajax({
            url: 'http://localhost/api/user_api.php',
            method: 'POST',
            data: $('#login_form').serialize(),
            success: (data) => {
                let status = JSON.parse(data).status;
                if (status) {
                    alert('Welcome back ' + $('#login_email').val() + '!');
                    window.location.replace('index.php')
                } else {
                    if ($('#login_email').val() == "" || $('#login_pass').val() == "") {}
                }
            }
        })
    }
})
</script>

</html>