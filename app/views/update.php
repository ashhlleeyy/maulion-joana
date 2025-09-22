<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Student</title>
<style>
  * { margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
  body {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    overflow: hidden;
    color: #fff;
  }

  /* Floating decorative circles */
  .circle {
    position: absolute;
    border-radius: 50%;
    background: rgba(255,215,0,0.08);
    animation: float 12s infinite ease-in-out;
  }
  .circle.small { width: 100px; height: 100px; top: 10%; left: 10%; }
  .circle.medium { width: 180px; height: 180px; bottom: 10%; right: 15%; }
  .circle.large { width: 250px; height: 250px; top: -50px; right: -50px; }
  @keyframes float { 0%,100%{transform:translateY(0);} 50%{transform:translateY(20px);} }

  /* Form card */
  form {
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(12px);
    border-radius: 20px;
    padding: 40px 30px;
    width: 380px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    animation: fadeIn 0.8s ease-in-out;
  }

  h2 {
    text-align: center;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 25px;
    color: #ffd700;
  }

  label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #fff;
    font-size: 14px;
  }

  input[type="text"],
  input[type="email"],
  input[type="file"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid rgba(255,255,255,0.3);
    border-radius: 10px;
    font-size: 14px;
    outline: none;
    background: rgba(255,255,255,0.1);
    color: #fff;
    transition: 0.3s;
  }

  input:focus {
    border-color: #ffd700;
    box-shadow: 0 0 8px rgba(255,215,0,0.5);
  }

  input[type="submit"] {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg,#ffd700,#ffa500);
    color: #1e1e1e;
    font-size: 16px;
    font-weight: 700;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    margin-top: 5px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  }

  input[type="submit"]:hover {
    background: linear-gradient(135deg,#ffbf00,#e69500);
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.3);
  }

  .error {
    color: #ff6b6b;
    margin-bottom: 15px;
    font-size: 14px;
  }
  .error ul { padding-left:20px; }

  /* Profile preview */
  .profile-preview {
    text-align: center;
    margin-bottom: 15px;
  }
  .profile-preview img {
    border-radius: 50%;
    border: 2px solid #ffd700;
    width: 80px;
    height: 80px;
  }
  .profile-preview p {
    color: #ffd700;
    font-size: 14px;
    margin-top: 5px;
  }

  .actions {
    margin-top: 20px;
    text-align: center;
  }
  .back-link {
    display: inline-block;
    background: rgba(255,255,255,0.2);
    color: #ffd700;
    font-weight: 600;
    text-decoration: none;
    padding: 10px 18px;
    border-radius: 10px;
    transition: 0.3s;
  }
  .back-link:hover {
    background: #ffd700;
    color: #1e1e1e;
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

<?php if (!empty($errors)): ?>
  <div class="error">
    <ul>
      <?php foreach ($errors as $e): ?>
        <li><?= htmlspecialchars($e) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

<form action="<?=site_url('/update/'.segment(3));?>" method="POST" enctype="multipart/form-data">
  <h2>Update Student</h2>

  <label for="first_name">First Name</label>
  <input type="text" id="first_name" name="first_name" value="<?=$student['first_name'];?>" placeholder="Enter first name">

  <label for="last_name">Last Name</label>
  <input type="text" id="last_name" name="last_name" value="<?=$student['last_name'];?>" placeholder="Enter last name">

  <label for="emails">Email</label>
  <input type="email" id="emails" name="emails" value="<?=$student['emails'];?>" placeholder="you@example.com">

  <!-- Current Profile Picture -->
  <?php if (!empty($student['profile_pic'])): ?>
    <div class="profile-preview">
      <img src="/upload/students/<?=$student['profile_pic'];?>" alt="Current Profile">
      <p>Current Profile Picture</p>
    </div>
  <?php endif; ?>

  <label for="profile_pic">Change Profile Picture</label>
  <input type="file" id="profile_pic" name="profile_pic" accept="image/*">

  <input type="submit" value="Update">

  <div class="actions">
    <a class="back-link" href="<?=site_url('get_all')?>">← Back to Students</a>
  </div>
</form>

</body>
</html>
