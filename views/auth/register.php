<?php
// errors(1);
$config['APP_TITLE'] = "Register | ".$config['APP_TITLE'];
DB::connect();
$customers = DB::select('users', '*', "status <> 'deleted'")->fetchAll();
DB::close();
?>


<!doctype html>
<html lang="en">

  <style>
    html,
    body {
      height: 100%;
    }

    body {
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin-top: 2vh !important;
      margin: auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    .logo img {
      max-height: 12vh;
    }

    #eye {
      cursor: pointer;
    }
  </style>

<?php include("views/partials/head.php"); ?>

<body class="text-center">
  <?php require('views/partials/nav.php'); ?>
  <div class="logo mt-5 pt-5">
    <a href="<?php echo home() ?>"><img src="<?php echo home() . $config['APP_ICON']; ?>" alt="GraphenePHP"
        class="img-fluid"></a>
  </div>

  <form method="POST" name="Register" class="form-signin" id="loginForm">
    <h2 class="mb-3 fw-bolder">User Registration </h1>

      <?php csrf() ?>
        <label for="phone">Phone Number</label>
        <input name="phone" type="phone" id="phone" class="form-control" placeholder="phone"
                    value="<?php echo (!empty($_REQUEST['phone'])) ? $_REQUEST['phone'] : '9684552192'; ?>" required>
                  <strong id="phoneMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>


        <div id="otpInput" style="display: none;">
            <label for="otp">OTP</label>
            <input type="text" name="otp" id="otp" class="form-control" placeholder="OTP"
            value="<?php echo (!empty($_REQUEST['otp'])) ? $_REQUEST['otp'] : ''; ?>" required>

          <strong id="otpMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
          <br><br>
        </div>
        <button class="btn btn-lg btn-primary rounded-pill" id="btn-register" type="button" onclick="registerUser()">Register</button>

        <p class="mt-3">Already Have an account? <a href="<?php echo route('login'); ?>">Login Now</a></p>

    </form>

    <script>
        function registerUser() {
            var phone = document.getElementById("phone").value;
            var otp = document.getElementById("otp").value;

            console.log("Phone Number:", phone);
            console.log("OTP:", otp);

            // You can do further processing here, like sending the data to a server
            var xhr = new XMLHttpRequest();
    var url = "registerUser";
    var params = "phone=" + phone + "&otp=" + otp;
    xhr.open("POST", url, true);

    // Set up the callback function
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Request was successful, handle response here
                console.log(xhr.responseText);
                // Reset form inputs
                document.getElementById("loginForm").reset();
                // If you want to enable the OTP input again for another registration
                document.getElementById("otpInput").style.display = "none";
                document.getElementById("phone").disabled = false;
            } else {
                // Request failed, handle error here
                console.error("Request failed with status:", xhr.status);
            }
        }
    };

    // Set the appropriate headers
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the request
    xhr.send(params);

          
  }

   
    </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>


<?php
  
  if(isset($_REQUEST['btn-register'])){

    echo `<script>
        document.getElementById('btn-register').style.display='none'; 
        document.getElementById('otpBlock').style.display='block'; 
        document.getElementById('phone').disabled=true; 
        </script>`;

         controller("Auth");
          $user = new Auth();

          //send otp
          $otp = rand(1000, 9999);
          $phone=$_REQUEST['phone'];

          // echo "<script>alert('OTP has been sent to: ".$phone." ')</script>";

          // $register = $user->registerByOTP($phone,$otp,'user');


  }


?>

  <script>

    let phoneError = true;
    let phone = document.querySelector("#phone");

    let phones = []

    <?php
    foreach ($customers as $email) {
      echo "phones.push('" . md5($email['phone']) . "')\n";
    }
    ?>

  
    checkErrors();


    function validateMobile(mobilenumber) {
      var regmm = "^([6-9][0-9]{9})$";
      var regmob = new RegExp(regmm);
      if (regmob.test(mobilenumber)) {
        return true;
      } else {
        return false;
      }
    }

    function validatephone() {
      let phoneValue = phone.value.trim();
      let phoneMsg = document.querySelector("#phoneMsg")
      if (phone.value.trim() == "") {
        phoneError = true;
        checkErrors();
        phoneMsg.innerText = "Mobile number can't be empty";
        phone.classList.add("is-invalid");
      }
      else if (!validateMobile(phoneValue)) {
        phoneError = true;
        checkErrors();
        phoneMsg.innerText =
          "Mobile number is invalid (10 digits only)";
        phone.classList.add("is-invalid");
      } else if (phones.includes(CryptoJS.MD5(phoneValue).toString())) {
        phoneError = true
        checkErrors()
        phoneMsg.innerText = "Phone already in use"
        phone.classList.add("is-invalid")
      } else {
        phoneError = false;
        checkErrors();
        phone.classList.remove("is-invalid");
        phone.classList.add("is-valid");
        phoneMsg.innerText = "";
      }
    }

    phone.addEventListener("focusout", function () {
      validatephone();
    });
    phone.addEventListener("keyup", function () {
      validatephone();
    });

   
    function checkErrors() {
      errors = phoneError
      if (errors) {
        document.querySelector("#btn-register").disabled = true;
      } else {
        document.querySelector("#btn-register").disabled = false;
        document.getElementById("phone").disabled = true;
        document.getElementById("otpInput").style.display = "block";
      }
    }


     

  </script>
</body>

</html>

<?php


// verify OTP
if (isset($_REQUEST['btn-verify'])) {
  
  // code to verify otp

  $phone=$_REQUEST['phone'];
  $otp=$_REQUEST['otp'];

  errors(1);
  controller("Auth");
  $user = new Auth();

  $verify_otp = $user->verifyOTP($phone, $otp);
  if ($verify_otp){ 
    $user = new Auth();
    $user->loginByOtp($phone, $otp);
    redirect('/');
  }

} 

?>