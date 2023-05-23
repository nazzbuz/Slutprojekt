<?php
session_start();
include("connection.php");
include("functions.php");

$signup_success = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $form_type = $_POST['form_type'];

    // Handle login request
// Handle login request
if ($form_type == "login") {
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];

  if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
      $query = "SELECT * FROM users WHERE user_name = ? LIMIT 1";
      $stmt = mysqli_prepare($con, $query);
      mysqli_stmt_bind_param($stmt, "s", $user_name);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($result && mysqli_num_rows($result) > 0) {
          $user_data = mysqli_fetch_assoc($result);

          // Verify the password using password_verify
          if (password_verify($password, $user_data['password'])) {
              $_SESSION['user_id'] = $user_data['user_id'];
              header("Location: index.php");
              die;
          }
      }
  }
}


    // Handle signup request
elseif ($form_type == "signup") {
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];

  if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
      // Validate password requirements
      if (preg_match("/^(?=.*\d)(?=.*[A-Z]).{8,}$/", $password)) {
          $query = "SELECT * FROM users WHERE user_name=?";
          $stmt = mysqli_prepare($con, $query);
          mysqli_stmt_bind_param($stmt, "s", $user_name);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);

          // Check if the username already exists
          if (mysqli_num_rows($result) > 0) {
          } else {
              $user_id = random_num(20);

              // Hash the password using password_hash
              $hashed_password = password_hash($password, PASSWORD_DEFAULT);

              $query = "INSERT INTO users (user_id, user_name, password) VALUES (?, ?, ?)";
              $stmt = mysqli_prepare($con, $query);
              mysqli_stmt_bind_param($stmt, "sss", $user_id, $user_name, $hashed_password);
              mysqli_stmt_execute($stmt);
              
              $signup_success = true;
              header("Location: process.php");
              die;
          }         
      } else {
          echo "Password must be at least 8 characters long and contain at least one capital letter and one number!";
      }
  } else {
      echo "Invalid username or password!";
  }
}

    
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Sign in/Sign up</title>
    <link rel="stylesheet" href="log.css?v=<?php echo time();?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  
      <style>
          body{
              background-image: url('img/Skärmbild.jpg');
              overflow-y: hidden;
          }
      </style>
    <main>
      <div class="container">
        <div class="inre-container">
          <div class="blanks">
            <form action="process.php" method="POST" class="logga-in">
              <div class="logo">
                <img src="./img/NJN.png" alt="NJN" />
              </div>
              <div class="headern">
              <?php if (isset($_POST['form_type']) && $_POST['form_type'] == "signup" && isset($user_name) && mysqli_num_rows($result) > 0): ?>
        <div class="error-msg">
          <p><?php echo "Username already taken." ?></p>
        </div>
      <?php endif; ?>
              <?php if (isset($_POST['form_type']) && $_POST['form_type'] == "login" && isset($user_name) && (mysqli_num_rows($result) == 0 || !password_verify($password, $user_data['password']))): ?>
    <div class="error-msg">
        <p><?php echo "Wrong username or password." ?></p>
    </div>
<?php endif; ?>
<?php if (isset($_GET['signup']) && $_GET['signup'] == "success"): ?>
    <div class="success-msg">
        <p><?php echo "signup successfully" ?></p>
    </div>
<?php endif; ?>

                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="vaxla">Sign up</a>
              </div>
              <div class="formularet">
                <div class="input">
                  <input type="text" class="falt" autocomplete="given-name" name="user_name" required />
                  <label>Username</label>
                </div>
                <div class="input">
                  <input type="password" class="falt" name="password" required />
                  <label>Password</label>
                </div>
                <input type="hidden" name="form_type" value="login" />
                <input type="submit" value="Log In" class="log-knapp" />
                <p class="termer">
                  Forgotten your password or you login details?
                  Call <a href="">0720154443</a> to get help loging in.
                </p>
              </div>
            </form>
            <form action="process.php" method="POST" class="signa-upp">
              <div class="logo">
                <img src="./img/NJN.png" alt="NJN" />
              </div>
              <div class="headern">
              <?php if (isset($_POST['form_type']) && $_POST['form_type'] == "signup" && isset($user_name) && mysqli_num_rows($result) > 0): ?>
        <div class="error-msg">
          <p><?php echo "Username already taken." ?></p>
        </div>
      <?php endif; ?>
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="vaxla">Log in</a>
              </div>
              <div class="formularet">
                <div class="input">
                  <input type="text" class="falt" autocomplete="given-name" name="user_name" required />
                  <label>Username</label>
                </div>
                
                <div class="input">
                <input type="password" class="falt" name="password" pattern="(?=.*\d)(?=.*[A-Z]).{8,}" title="Password must be at least 8 characters long and contain at least one capital letter and one number" required />
                  <label>Password</label>
                </div>
                <input type="hidden" name="form_type" value="signup" />
                <input type="submit" value="Sign Up" class="sign-knapp" />
                <p class="termer">
                  By signing up, I agree to the storing my data with the website owner.
                </p>
              </div>
            </form>
          </div>
          <div class="glidande">
            <div class="video-omslag">
              <video src="img/pexels-cottonbro-studio-3825398-2160x4096-50fps.mp4" class="video vid-1 show" autoplay loop playsinline muted></video>
            </div>
            <div class="text-wrap">
              <h2>Journey Just Started</h2>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="log.js?v=<?php echo time();?>"></script>
  </body>
</html>

