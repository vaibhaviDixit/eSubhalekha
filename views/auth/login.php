<?php
$config['APP_TITLE'] = "Login | ".$config['APP_TITLE'];

DB::connect();
$customers = DB::select('users', '*', "status <> 'deleted'")->fetchAll();
DB::close();

if (App::getSession())
  redirect('/');

?>

<!doctype html>
<html lang="en">
<?php include("views/partials/head.php"); ?>

<style>
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

  #eye {
    cursor: pointer;
  }

  .logo img {
    max-height: 12vh;
  }
</style>

<body class="text-center">
  <?php require('views/partials/nav.php'); ?>
  <div class="logo mt-5 pt-5">
    <a href="<?php echo home() ?>"><img src="<?php echo home() . $config['APP_ICON']; ?>" alt="graphene"
        class="img-fluid"></a>
  </div>
  <form  method="POST" name="Login" class="form-signin" id="loginForm">

    <h2 class="mb-3 fw-bolder">Log In</h1>
      <?php if ($_GET['loggedout']) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo "Logged Out Successfully"; ?>
        </div>
      <?php } ?>
      <?php if ($user['error']) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $user['errorMsg']; ?>
        </div>
      <?php } ?>

      <?php csrf() ?>
      
      <label for="phone">Phone Number</label>
        
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="<?php echo (!empty($_REQUEST['phone'])) ? $_REQUEST['phone'] : ''; ?>" required <?php if(!empty($_REQUEST['phone'])){echo "readonly";}else{echo ""; } ?> >

        <strong id="phoneMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>

        <?php if(isset($_POST["action"]) && $_POST["action"] == "verifyUser"){ ?>
        <div id="otpInput">
            <label for="otp">OTP</label>
            <input type="text" name="otp" id="otp" class="form-control" placeholder="OTP" required>

          <strong id="otpMsg" class="text-danger errorMsg my-2 fw-bolder"></strong>
          <br>

        </div>
        <button class="btn btn-lg btn-primary rounded-pill" type="submit" name="action" value="registerUser">Login</button>
        <?php }else{ ?>

        <button class="btn btn-lg btn-primary rounded-pill" id="btn-register" type="submit" name="action" value="verifyUser">Verify</button>
      <?php } ?>


      <p class="mt-3">Don't Have an account? <a href="<?php echo route('register').queryString(); ?>">Create Account</a></p>
  </form>

<?php
 
function registerUser()
{
    controller("Auth");
    $user = new Auth();

    $phone = $_POST["phone"];
    $otp = $_POST["otp"];

    $register=$user->verifyOTP($phone,$otp);

    if( isset($register['phone']) || (isset($register['error']) && !$register['error'])){

        $login=$user->loginByOtp($phone,$otp);
        echo "<script>alert('Registration Successful!');</script>";
        print_r($login); //debug
        die(); // debug
        // redirect to user profile page here
        redirect("esubhalekha/user/profile");
        
    }
    else{
        echo "<script>alert('Registration Failed!');</script>"; 
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["action"] == "verifyUser") {
        // send otp
        controller("Auth");
        $user = new Auth();

        $phone = $_POST["phone"];

        // generate OTP and store in DB
        $otp = rand(1000, 9999);
        //otp send here

        $getUser=$user->getUserByPhone($phone);
        if($getUser['phone']){
              
          $userID=$getUser['userID'];
              
          $updateData = [
              'phone' => $phone,
              'otp'=>$otp
          ];


          DB::connect();
          $updateOTP = DB::update('users', $updateData, "userID = '$userID'");
          DB::close();

          if($updateOTP){
            echo "<script>alert('OTP Sent Successfully !');</script>";
          }

        }else{
          $register = $user->registerByOTP($phone,$otp,'user');   
          if($register){
            echo "<script>alert('OTP Sent Successfully !');</script>";
          } 
        }


    } elseif ($_POST["action"] == "registerUser") {
        registerUser(); // verify otp and register
    }
}

?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
  
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
      } else if (!phones.includes(CryptoJS.MD5(phoneValue).toString())) {
        phoneError = true
        checkErrors()
        phoneMsg.innerText = "Phone does not exists!"
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
        // document.getElementById("phone").disabled = true;
        // document.getElementById("otpInput").style.display = "block";
        
      }
    }
     

  </script>

</body>

</html>