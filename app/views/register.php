<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
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
    .circle.large { width: 350px; height: 350px; top: -120px; right: -120px; }

    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(20px); }
    }

    form {
      background: #ffffff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.12);
      width: 380px;
      z-index: 10;
      animation: fadeIn 0.8s ease-in-out;
    }

    h2 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 8px;
      font-size: 22px;
      font-weight: 600;
    }
    .underline {
      width: 60px;
      height: 3px;
      background: #007bff;
      margin: 10px auto 25px;
      border-radius: 2px;
    }

    label {
      font-size: 14px;
      font-weight: 500;
      color: #444;
      display: block;
      margin-top: 12px;
      margin-bottom: 5px;
      text-align: left;
    }

    input {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ccd1d9;
      border-radius: 8px;
      font-size: 14px;
      outline: none;
      background-color: #fff;
      transition: 0.3s;
    }
    input:focus {
      border-color: #007bff;
      box-shadow: 0 0 6px rgba(0,123,255,0.2);
    }

    button {
      width: 100%;
      padding: 12px;
      margin-top: 20px;
      background: linear-gradient(to right, #007bff, #0056b3);
      color: white;
      font-size: 15px;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    button:hover {
      background: linear-gradient(to right, #0056b3, #004099);
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .error {
      color: #d9534f;
      text-align: center;
      margin-bottom: 15px;
      font-size: 14px;
      font-weight: 500;
    }

    p {
      text-align: center;
      margin-top: 20px;
      font-size: 13px;
      color: #555;
    }
    p a {
      color: #007bff;
      font-weight: 500;
      text-decoration: none;
    }
    p a:hover {
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

  <form method="POST" action="/index.php/register">
    <h2>Create an Account</h2>
    <div class="underline"></div>

    <?php if (!empty($error)): ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <label>Username:</label>
    <input type="text" name="username" placeholder="Enter username" required>

    <label>Password:</label>
    <input type="password" name="password" placeholder="Enter password" required>

    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" placeholder="Re-enter password" required>

    <button type="submit">Register</button>

    <p>Already have an account? <a href="/index.php/login">Login here</a></p>
  </form>
</body>
</html>
