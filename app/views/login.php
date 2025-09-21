<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #e9eff5, #f6f9fc);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      position: relative;
      overflow: hidden;
    }

    /* Decorative background circles */
    .circle {
      position: absolute;
      border-radius: 50%;
      background: rgba(0, 123, 255, 0.08);
      animation: float 12s infinite ease-in-out;
    }
    .circle.small { width: 120px; height: 120px; top: 15%; left: 10%; }
    .circle.medium { width: 220px; height: 220px; bottom: 10%; right: 15%; }
    .circle.large { width: 350px; height: 350px; top: -100px; right: -120px; }

    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(20px); }
    }

    form {
      background: #ffffff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.12);
      width: 360px;
      text-align: center;
      z-index: 10;
      animation: fadeIn 0.8s ease-in-out;
    }

    h2 {
      margin-bottom: 8px;
      color: #2c3e50;
      font-size: 22px;
      font-weight: 600;
    }
    .underline {
      width: 50px;
      height: 3px;
      background: #007bff;
      margin: 8px auto 20px;
      border-radius: 2px;
    }

    input {
      width: 100%;
      padding: 12px 15px;
      margin: 10px 0;
      border: 1px solid #ccd1d9;
      border-radius: 8px;
      outline: none;
      font-size: 14px;
      transition: 0.3s;
    }
    input:focus {
      border-color: #007bff;
      box-shadow: 0 0 6px rgba(0,123,255,0.2);
    }

    button {
      width: 100%;
      padding: 12px;
      margin-top: 18px;
      background: linear-gradient(to right, #007bff, #0056b3);
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 15px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    button:hover {
      background: linear-gradient(to right, #0056b3, #004099);
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .error {
      color: #d9534f;
      margin: 12px 0;
      font-size: 14px;
      font-weight: 500;
    }

    p {
      margin-top: 18px;
      font-size: 13px;
      color: #555;
    }
    a {
      color: #007bff;
      text-decoration: none;
      font-weight: 500;
    }
    a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <!-- Decorative background shapes -->
  <div class="circle small"></div>
  <div class="circle medium"></div>
  <div class="circle large"></div>

  <form action="<?= site_url('login') ?>" method="POST">
    <h2>Login to Your Account</h2>
    <div class="underline"></div>
    <?php if (!empty($error)) : ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>

    <p>Don't have an account? <a href="<?= site_url('register') ?>">Register here</a></p>
  </form>
</body>
</html>
