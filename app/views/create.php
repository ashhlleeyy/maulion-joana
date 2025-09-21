<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Student</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  form {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    width: 380px;
    animation: fadeIn 0.8s ease-in-out;
  }

  h2 {
    text-align: center;
    color: #4a4a4a;
    margin-bottom: 20px;
    font-size: 24px;
  }

  label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #333;
    font-size: 14px;
  }

  input[type="text"],
  input[type="email"],
  input[type="file"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 14px;
    transition: 0.3s;
  }

  input:focus {
    border-color: #6a82fb;
    box-shadow: 0 0 5px rgba(106,130,251,0.5);
    outline: none;
  }

  input[type="submit"] {
    width: 100%;
    padding: 12px;
    background: #6a82fb;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    margin-top: 5px;
    transition: 0.3s;
  }

  input[type="submit"]:hover {
    background: #5a72e5;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
  }

  .error {
    color: red;
    margin-bottom: 15px;
    font-size: 14px;
  }

  .error ul {
    margin: 0;
    padding-left: 20px;
  }

  .actions {
    margin-top: 20px;
    text-align: center;
  }

  .back-link {
    display: inline-block;
    background-color: #f1f1f1;
    color: #6a82fb;
    font-weight: 600;
    text-decoration: none;
    padding: 10px 18px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease-in-out;
  }

  .back-link:hover {
    background-color: #6a82fb;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>
</head>
<body>

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
