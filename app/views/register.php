
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <style>
    /* Base styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', Arial, sans-serif;
    }

    body {
      background: linear-gradient(135deg, #f5e6d3, #d6bfa7);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
      color: #4b3832;
    }

    /* Container */
    .register-container {
      position: relative;
      max-width: 460px;
      width: 100%;
      padding: 45px 35px;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(12px);
      border-radius: 18px;
      box-shadow: 0 12px 32px rgba(0,0,0,0.15);
    }

    h2 {
      font-size: 26px;
      color: #6e4b3a;
      text-align: center;
      margin-bottom: 10px;
    }

    .underline {
      width: 60px;
      height: 3px;
      background: #a9826d;
      margin: 0 auto 25px;
      border-radius: 2px;
    }

    label {
      font-size: 14px;
      font-weight: 600;
      color: #6e4b3a;
      display: block;
      margin-top: 15px;
      margin-bottom: 6px;
    }

    input {
      width: 100%;
      padding: 14px 16px;
      border: 1px solid #cbbeb5;
      border-radius: 10px;
      background: #fdfaf6;
      color: #4b3832;
      font-size: 15px;
      outline: none;
      transition: all 0.3s;
    }
    input::placeholder {
      color: #9a8578;
    }
    input:focus {
      background: #fff;
      border-color: #a9826d;
      box-shadow: 0 0 8px rgba(169, 130, 109, 0.3);
    }

    button {
      width: 100%;
      padding: 14px;
      margin-top: 22px;
      background: linear-gradient(135deg, #a9826d, #c7a27c);
      color: #fff;
      font-size: 16px;
      font-weight: 600;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    button:hover {
      background: linear-gradient(135deg, #8c6a55, #b89478);
      transform: translateY(-2px);
      box-shadow: 0 6px 14px rgba(169, 130, 109, 0.3);
    }

    .error {
      color: #d9534f;
      text-align: center;
      margin-bottom: 15px;
      font-size: 14px;
    }

    p {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #6e4b3a;
    }
    p a {
      color: #8c6a55;
      font-weight: 600;
      text-decoration: none;
    }
    p a:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>

  <div class="register-container">
    <form method="POST" action="/index.php/register">
      <h2>Create Account</h2>
      <div class="underline"></div>

      <?php if (!empty($error)): ?>
        <p class="error"><?= $error ?></p>
      <?php endif; ?>

      <label>Username</label>
      <input type="text" name="username" placeholder="Enter username" required>

      <label>Password</label>
      <input type="password" name="password" placeholder="Enter password" required>

      <label>Confirm Password</label>
      <input type="password" name="confirm_password" placeholder="Re-enter password" required>

      <button type="submit">Register</button>

      <p>Already have an account? <a href="/index.php/login">Login here</a></p>
    </form>
  </div>

</body>
</html>
