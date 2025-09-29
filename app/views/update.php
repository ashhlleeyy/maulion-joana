
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Student</title>
<style>
  * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins', Arial, sans-serif; }
  body {
    background: linear-gradient(135deg, #f5ebe0, #e6ccb2);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    overflow: hidden;
    color: #4e342e;
  }

  /* Decorative blobs */
  .blob {
    position: absolute;
    border-radius: 50%;
    background: rgba(121, 85, 72, 0.15);
    filter: blur(40px);
    animation: float 12s infinite ease-in-out;
  }
  .blob.one { width: 200px; height: 200px; top: -60px; left: -60px; }
  .blob.two { width: 250px; height: 250px; bottom: -80px; right: -50px; }
  @keyframes float { 
    0%,100%{transform:translateY(0);} 
    50%{transform:translateY(25px);} 
  }

  /* Form card */
  form {
    background: #fffaf5;
    border-radius: 18px;
    padding: 40px 30px;
    width: 380px;
    box-shadow: 0 10px 25px rgba(78,52,46,0.2);
    animation: fadeIn 0.8s ease-in-out;
  }

  h2 {
    text-align: center;
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 25px;
    color: #6d4c41;
  }

  label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #5d4037;
    font-size: 14px;
  }

  input[type="text"],
  input[type="email"],
  input[type="file"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #d7ccc8;
    border-radius: 10px;
    font-size: 14px;
    outline: none;
    background: #fdf6f0;
    color: #4e342e;
    transition: 0.3s;
  }

  input:focus {
    border-color: #a1887f;
    box-shadow: 0 0 6px rgba(161,136,127,0.4);
  }

  input[type="submit"] {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #d7ccc8, #a1887f);
    color: #fff;
    font-size: 16px;
    font-weight: 700;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    margin-top: 5px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  }

  input[type="submit"]:hover {
    background: linear-gradient(135deg,#a1887f,#8d6e63);
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.25);
  }

  .error {
    color: #d32f2f;
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
    border: 2px solid #a1887f;
    width: 80px;
    height: 80px;
  }
  .profile-preview p {
    color: #6d4c41;
    font-size: 14px;
    margin-top: 5px;
  }

  .actions {
    margin-top: 20px;
    text-align: center;
  }
  .back-link {
    display: inline-block;
    background: #efebe9;
    color: #6d4c41;
    font-weight: 600;
    text-decoration: none;
    padding: 10px 18px;
    border-radius: 10px;
    transition: 0.3s;
  }
  .back-link:hover {
    background: #a1887f;
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

<div class="blob one"></div>
<div class="blob two"></div>

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

  <label for="profile_pic">Change Profile Picture</label>
  <input type="file" id="profile_pic" name="profile_pic" accept="image/*">

  <input type="submit" value="Update">

  <div class="actions">
    <a class="back-link" href="<?=site_url('get_all')?>">← Back to Students</a>
  </div>
</form>

</body>
</html>
