
<link rel="stylesheet" href="assets/css/login.css">
<body class="admin">

  <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="?controller=admin&action=login" method="POST">
                    <div class="input-field">
                        <input type="text" name="txtUsername" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password"  name="txtPassword" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" id="login-button" name="btnSubmit"  value="Login Now"></a></input>
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Signup now</a>
                    </span>
                </div>
            </div>
        </div>
  </div>
</body>