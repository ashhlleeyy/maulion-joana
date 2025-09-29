
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
    body {
      background: linear-gradient(135deg, #f5e6d3, #d6bfa7);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
      color: #4b3832;
    }

    /* Decorative background circles */
    .circle {
      position: absolute;
      border-radius: 50%;
      background: rgba(139, 94, 60, 0.12);
      filter: blur(50px);
      animation: float 10s infinite ease-in-out;
    }
    .circle.one { width: 240px; height: 240px; top: -70px; left: -70px; }
    .circle.two { width: 200px; height: 200px; bottom: -60px; right: -50px; }
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(25px); }
    }

    /* Login card */
    .login-box {
      position: relative;
      background: rgba(255, 255, 255, 0.65);
      backdrop-filter: blur(14px);
      border-radius: 20px;
      padding: 40px 35px;
      width: 380px;
      box-shadow: 0 12px 28px rgba(0,0,0,0.15);
      text-align: center;
      animation: fadeIn 0.8s ease;
      z-index: 2;
    }
    .login-box h2 {
      font-size: 26px;
      font-weight: 700;
      margin-bottom: 6px;
      color: #6e4b3a;
    }
    .login-box p.subtitle {
      font-size: 14px;
      margin-bottom: 22px;
      color: #8c6a55;
    }

    /* Inputs */
    .input-group {
      position: relative;
      margin-bottom: 18px;
    }
    .input-group input {
      width: 100%;
      padding: 14px 45px 14px 16px;
      border-radius: 12px;
      border: 1px solid #cbbeb5;
      background: #fdfaf6;
      font-size: 15px;
      color: #4b3832;
      outline: none;
      transition: 0.3s;
    }
    .input-group input:focus {
      border-color: #a9826d;
      box-shadow: 0 0 8px rgba(169, 130, 109, 0.3);
      background: #fff;
    }
    .input-group span {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 16px;
      color: #9a8578;
    }

    /* Error */
    .error {
      color: #d9534f;
      margin-bottom: 12px;
      font-size: 14px;
      text-align: left;
    }

    /* Button */
    .login-box button {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 600;
      color: #fff;
      background: linear-gradient(135deg, #a9826d, #c7a27c);
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 5px;
    }
    .login-box button:hover {
      background: linear-gradient(135deg, #8c6a55, #b89478);
      transform: translateY(-2px);
      box-shadow: 0 6px 14px rgba(169, 130, 109, 0.3);
    }

    /* Links */
    .login-box p.footer {
      margin-top: 18px;
      font-size: 14px;
      color: #6e4b3a;
    }
    .login-box a {
      color: #8c6a55;
      font-weight: 600;
      text-decoration: none;
    }
    .login-box a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <!-- Background circles -->
  <div class="circle one"></div>
  <div class="circle two"></div>

  <div class="login-box">
    <h2>Welcome Back</h2>
    <p class="subtitle">Sign in to continue to your dashboard</p>

    <form action="<?= site_url('login') ?>" method="POST">
      <?php if (!empty($error)) : ?>
        <p class="error"><?= $error ?></p>
      <?php endif; ?>

      <div class="input-group">
        <input type="text" name="username" placeholder="Username" required>
        <span>👤</span>
      </div>

      <div class="input-group">
        <input type="password" name="password" placeholder="Password" required>
        <span>🔒</span>
      </div>

      <button type="submit">Login</button>

      <p class="footer">Don’t have an account? <a href="<?= site_url('register') ?>">Register here</a></p>
    </form>
  </div>
</body>
</html>
