<?php
// 🔒 Protect page: only logged in users can access
if (!isset($_SESSION['user_id'])) {
    header("Location: " . site_url('login'));
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f4f7fb, #e9eff5);
      margin: 0;
      padding: 0;
      color: #333;
    }

    /* 🔹 Header */
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: white;
      padding: 15px 30px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.08);
      border-bottom: 3px solid #007bff;
    }
    .header-left {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .header-left .logo {
      font-size: 24px;
      font-weight: 700;
      color: #007bff;
    }
    .header-left .subtitle {
      font-size: 14px;
      color: #555;
    }
    .header-right {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    .header-right .welcome {
      font-size: 15px;
      font-weight: 500;
      color: #444;
    }
    .header-right a {
      color: white;
      background: #007bff;
      text-decoration: none;
      padding: 8px 16px;
      border-radius: 25px;
      transition: 0.3s;
      font-size: 14px;
    }
    .header-right a:hover {
      background: #0056b3;
    }

    h1 {
      font-size: 28px;
      margin: 25px 0 15px;
      font-weight: 600;
      color: #2c3e50;
      text-align: center;
    }

    /* Add Button */
    .btn-add {
      background: linear-gradient(to right, #007bff, #0056b3);
      color: white;
      border: none;
      padding: 12px 24px;
      font-size: 15px;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    .btn-add:hover {
      background: linear-gradient(to right, #0056b3, #004099);
      transform: translateY(-2px);
    }

    .top-actions {
      text-align: center;
      margin-bottom: 20px;
    }

    /* Search */
    .search-container {
      text-align: center;
      margin: 20px 0;
    }
    .search-box {
      width: 50%;
      padding: 12px 18px;
      border: 1px solid #ccd1d9;
      border-radius: 25px;
      font-size: 15px;
      outline: none;
      transition: 0.3s;
    }
    .search-box:focus {
      border-color: #007bff;
      box-shadow: 0 0 6px rgba(0,123,255,0.2);
    }

    /* Table Header */
    .table-header {
      display: grid;
      grid-template-columns: 1.5fr 1fr 2fr 2fr 3fr 2fr;
      background-color: #007bff;
      color: white;
      font-weight: 600;
      padding: 12px 0;
      width: 90%;
      margin: 0 auto;
      border-radius: 8px 8px 0 0;
    }
    .table-header div {
      text-align: center;
    }

    /* Table */
    table {
      margin: 0 auto;
      border-collapse: collapse;
      width: 90%;
      background: white;
      border-radius: 0 0 8px 8px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    td {
      padding: 14px;
      text-align: center;
      border-bottom: 1px solid #f0f0f0;
      font-size: 14px;
    }
    tr:nth-child(even) {
      background-color: #f9fbfd;
    }
    tr:hover {
      background-color: #eef4fb;
    }

    /* Profile images */
    td img {
      border-radius: 50%;
      border: 2px solid #007bff20;
    }

    /* Action Buttons */
    .btn {
      display: inline-block;
      padding: 6px 14px;
      margin: 2px;
      font-size: 13px;
      font-weight: 500;
      text-decoration: none;
      border-radius: 6px;
      transition: 0.2s;
      color: #fff;
    }
    .btn.update {
      background: #6c63ff;
    }
    .btn.update:hover {
      background: #574bff;
    }
    .btn.delete {
      background: #ff6b6b;
    }
    .btn.delete:hover {
      background: #ff4c4c;
    }

    /* Pagination */
    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 8px;
      margin: 25px 0;
    }
    .pagination a,
    .pagination span {
      display: inline-block;
      padding: 8px 14px;
      background-color: #e9eff5;
      border-radius: 6px;
      color: #333;
      font-size: 14px;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s;
    }
    .pagination a:hover {
      background-color: #007bff;
      color: white;
    }
    .pagination .current {
      background-color: #007bff;
      color: white;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <!-- 🔹 New Header -->
  <div class="header">
    <div class="header-left">
      <div class="logo">📘 StudentMS</div>
      <div class="subtitle">Manage your records easily</div>
    </div>
    <div class="header-right">
      <div class="welcome">Hi, <?= htmlspecialchars($_SESSION['username']); ?> 👋</div>
      <a href="<?= site_url('logout'); ?>">Logout</a>
    </div>
  </div>

  <h1>Student Management</h1>

  <div class="top-actions">
    <a href="<?=site_url('create')?>">
      <button class="btn-add">+ Add Student</button>
    </a>
  </div>

  <div class="search-container">
    <input type="text" id="searchInput" class="search-box" placeholder="Search students...">
  </div>
  
  <div class="table-header">
    <div>Profile Picture</div>
    <div>ID</div>
    <div>First Name</div>
    <div>Last Name</div>
    <div>Email</div>
    <div>Actions</div>
  </div>

  <table id="studentTable">
    <tbody>
    <?php foreach($students as $i => $students): ?>
    <tr>
      <td>
        <?php if (!empty($students['profile_pic'])): ?>
          <img src="/upload/students/<?= $students['profile_pic'] ?>" 
               alt="Profile" width="60" height="60">
        <?php else: ?>
          <img src="/upload/default.png" 
               alt="No Profile" width="60" height="60">
        <?php endif; ?>
      </td>
      <td><?= $students['id']; ?></td>
      <td><?= $students['first_name']; ?></td>
      <td><?= $students['last_name']; ?></td>
      <td><?= $students['emails']; ?></td>
      <td class="actions">
        <a href="<?= site_url('/update/'.$students['id']); ?>" class="btn update">Update</a>
        <a href="<?= site_url('/delete/'.$students['id']); ?>" 
           class="btn delete"
           onclick="return confirm('Are you sure you want to delete this record?');">
           Delete
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

  <div class="pagination">
    <?= isset($pagination_links) ? $pagination_links : '' ?>
  </div>

  <script>
    let typingTimer;
    document.getElementById("searchInput").addEventListener("keyup", function() {
      clearTimeout(typingTimer);
      let keyword = this.value;

      typingTimer = setTimeout(() => {
        fetch("<?= site_url('students/search') ?>?keyword=" + keyword)
          .then(res => res.text())
          .then(data => {
            document.querySelector("#studentTable tbody").innerHTML = data;
          });
      }, 300);
    });
  </script>
</body>
</html>
