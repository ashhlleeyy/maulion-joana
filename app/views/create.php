
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Student</title>
<style>
  /* Base */
  * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins', sans-serif; }
  body {
    background: linear-gradient(135deg, #e9dac1, #c8b6a6);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    overflow: hidden;
    color: #5c4033;
  }

  /* Decorative floating soft shapes */
  .circle {
    position: absolute;
    border-radius: 50%;
    background: rgba(92,64,51,0.07);
    animation: float 12s infinite ease-in-out;
  }
  .circle.small { width: 90px; height: 90px; top: 12%; left: 8%; }
  .circle.medium { width: 160px; height: 160px; bottom: 12%; right: 12%; }
  .circle.large { width: 230px; height: 230px; top: -50px; right: -60px; }
  @keyframes float { 0%,100%{transform:translateY(0);} 50%{transform:translateY(18px);} }

  /* Form card */
  form {
    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(14px);
    border-radius: 20px;
    padding: 40px 30px;
    width: 380px;
    box-shadow: 0 8px 20px rgba(92,64,51,0.25);
    animation: fadeIn 0.8s ease-in-out;
  }

  h2 {
    text-align: center;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 25px;
    color: #5c4033;
  }

  label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #4a3629;
    font-size: 14px;
  }

  input[type="text"],
  input[type="email"],
  input[type="file"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid rgba(92,64,51,0.3);
    border-radius: 10px;
    font-size: 14px;
    outline: none;
    background: rgba(255,255,255,0.6);
    color: #3d2b1f;
    transition: 0.3s;
  }

  input:focus {
    border-color: #a27b5c;
    box-shadow: 0 0 8px rgba(162,123,92,0.5);
  }

  input[type="submit"] {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg,#d5b895,#a27b5c);
    color: #fff;
    font-size: 16px;
    font-weight: 700;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    margin-top: 5px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(92,64,51,0.25);
  }

  input[type="submit"]:hover {
    background: linear-gradient(135deg,#b08968,#7f5539);
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(92,64,51,0.3);
  }

  .error {
    color: #b23b3b;
    margin-bottom: 15px;
    font-size: 14px;
  }
  .error ul { padding-left:20px; }

  .actions {
    margin-top: 20px;
    text-align: center;
  }

  .back-link {
    display: inline-block;
    background: rgba(162,123,92,0.2);
    color: #5c4033;
    font-weight: 600;
    text-decoration: none;
    padding: 10px 18px;
    border-radius: 10px;
    transition: 0.3s;
  }

  .back-link:hover {
    background: #a27b5c;
    color: #fff;
    transform: translateY(-2px);
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>
</head>
<body>

<div class="circle small"></div>
<div class="circle medium"></div>
<div class="circle large"></div>

<form action="<?=site_url('/create');?>" method="POST" enctype="multipart/form-data">
  <h2>Add Student</h2>

  <?php if (!empty($errors)): ?>
    <div class="error">
      <ul>
        <?php foreach ($errors as $e): ?>
          <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <label for="first_name">First Name</label>
  <input type="text" id="first_name" name="first_name" placeholder="Enter first name">

  <label for="last_name">Last Name</label>
  <input type="text" id="last_name" name="last_name" placeholder="Enter last name">

  <label for="emails">Email</label>
  <input type="email" id="emails" name="emails" placeholder="you@example.com">

  <label for="profile_pic">Upload File</label>
  <input type="file" id="profile_pic" name="profile_pic">

  <input type="submit" value="Submit">

  <div class="actions">
    <a class="back-link" href="<?=site_url('get_all')?>">← Back to Students</a>
  </div>
</form>

</body>
</html>

