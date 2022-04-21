<body class="customer">
  <div class="align-center">
    <h2 class="text-center">SIGN-UP</h2>
    <form action="?controller=customer&action=signup" method="POST">
      <table class="align-center">
        <tr>
          <td>Username</td>
          <td><input type="text" name="txtUsername" required /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="txtPassword" pattern=".{3,}" required /></td>
        </tr>
        <tr>
          <td>Name</td>
          <td><input type="text" name="txtName" required /></td>
        </tr>
        <tr>
          <td>Phone</td>
          <td><input type="tel" name="txtPhone" pattern="0[0-9]{9}" required /></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="email" name="txtEmail" required /></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="btnSubmit" value="SIGN-UP" /></td>
        </tr>
      </table>
    </form>
  </div>
</body>