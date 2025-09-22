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
  /* Base */
  * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter',Arial,sans-serif; }
  body {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    color: #fff;
    min-height: 100vh;
  }

  /* Particles */
  .particle {
    position: absolute;
    border-radius: 50%;
    background: rgba(255,215,0,0.08);
    animation: float 15s infinite ease-in-out;
  }
  .particle:nth-child(1){width:100px;height:100px;top:10%;left:10%;}
  .particle:nth-child(2){width:150px;height:150px;bottom:15%;right:15%;}
  .particle:nth-child(3){width:80px;height:80px;top:50%;right:5%;}
  @keyframes float{0%,100%{transform:translateY(0);}50%{transform:translateY(25px);}}

  /* Header */
  .header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 40px;
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(12px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.25);
    border-bottom-left-radius:20px;
    border-bottom-right-radius:20px;
    margin-bottom: 30px;
  }
  .header .logo { font-size:28px; font-weight:700; color:#ffd700; }
  .header .subtitle { font-size:14px; color:rgba(255,255,255,0.8); }
  .header-right { display:flex; align-items:center; gap:15px; }
  .header-right .welcome { font-size:15px; font-weight:500; color:#fff; }
  .header-right a {
    color:#1e1e1e; background:#ffd700; text-decoration:none;
    padding:8px 16px; border-radius:25px; font-weight:600; transition:0.3s;
  }
  .header-right a:hover { background:#e6bf00; }

  h1 {
    text-align:center;
    font-size:28px;
    margin-bottom:20px;
    font-weight:600;
    color:#ffd700;
  }

  /* Buttons */
  .btn-add {
    background: linear-gradient(135deg,#ffd700,#ffa500);
    color:#1e1e1e; border:none; padding:12px 24px;
    font-weight:700; border-radius:10px; cursor:pointer;
    transition:all 0.3s ease; box-shadow:0 4px 12px rgba(0,0,0,0.2);
  }
  .btn-add:hover { background: linear-gradient(135deg,#ffbf00,#e69500); transform:translateY(-2px); }

  /* Container */
  .container { width:95%; max-width:1200px; margin:0 auto; }

  /* Search */
  .search-container { text-align:center; margin:20px 0; }
  .search-box {
    width:50%; padding:12px 18px; border:none;
    border-radius:25px; font-size:15px; outline:none;
    background: rgba(255,255,255,0.15); color:#fff;
    transition:0.3s;
  }
  .search-box::placeholder { color:rgba(255,255,255,0.7); }
  .search-box:focus { background: rgba(255,255,255,0.25); box-shadow:0 0 10px rgba(255,215,0,0.4); }

  /* Table */
  .student-table {
    width:100%;
    border-collapse: collapse;
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 8px 20px rgba(0,0,0,0.3);
    margin-bottom:30px;
  }
  .student-table thead { background:#007bff; color:#fff; }
  .student-table th, .student-table td {
    text-align:center; padding:14px; font-size:14px;
  }
  .student-table tr:nth-child(even){background:rgba(255,255,255,0.05);}
  .student-table tr:hover{background:rgba(255,255,255,0.15);}

  /* Profile box */
  .profile-pic {
    width:60px; height:60px; border-radius:20px;
    overflow:hidden; display:inline-block;
    border:2px solid rgba(255,215,0,0.4);
  }
  .profile-pic img { width:100%; height:100%; object-fit:cover; }

  /* Action Buttons */
  .btn {
    display:inline-block; padding:6px 14px; margin:2px;
    font-size:13px; font-weight:500; text-decoration:none;
    border-radius:6px; transition:0.2s; color:#fff;
  }
  .btn.update { background:#6c63ff; }
  .btn.update:hover { background:#574bff; }
  .btn.delete { background:#ff6b6b; }
  .btn.delete:hover { background:#ff4c4c; }

  /* Pagination */
  .pagination { display:flex; justify-content:center; gap:8px; margin-bottom:30px; }
  .pagination a, .pagination span {
    display:inline-block; padding:8px 14px; background: rgba(255,255,255,0.15);
    border-radius:6px; color:#fff; font-weight:500; text-decoration:none;
    transition:0.3s;
  }
  .pagination a:hover { background:#ffd700; color:#1e1e1e; }
  .pagination .current { background:#ffd700; color:#1e1e1e; font-weight:600; }
</style>
</head>
<body>
<!-- Particles -->
<div class="particle"></div>
<div class="particle"></div>
<div class="particle"></div>

<!-- Header -->
<div class="header">
  <div class="header-left">
    <div class="logo"></div>
    <div class="subtitle"></div>
  </div>
  <div class="header-right">
    <a href="<?= site_url('logout'); ?>">Logout</a>
  </div>
</div>

<div class="container">
  <h1>Student Management</h1>

  <div class="top-actions" style="text-align:center; margin-bottom:20px;">
    <a href="<?=site_url('create')?>"><button class="btn-add">+ Add Student</button></a>
  </div>

  <div class="search-container">
    <input type="text" id="searchInput" class="search-box" placeholder="Search students...">
  </div>

  <table class="student-table">
    <thead>
      <tr>
        <th>Profile</th>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="studentTable">
      <?php foreach($students as $i => $student): ?>
      <tr>
        <td>
          <div class="profile-pic">
            <?php if (!empty($student['profile_pic'])): ?>
              <img src="/upload/students/<?= $student['profile_pic'] ?>" alt="Profile">
            <?php else: ?>
              <img src="/upload/default.png" alt="No Profile">
            <?php endif; ?>
          </div>
        </td>
        <td><?= $student['id']; ?></td>
        <td><?= $student['first_name']; ?></td>
        <td><?= $student['last_name']; ?></td>
        <td><?= $student['emails']; ?></td>
        <td>
          <a href="<?= site_url('/update/'.$student['id']); ?>" class="btn update">Update</a>
          <a href="<?= site_url('/delete/'.$student['id']); ?>" 
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
</div>

<script>
let typingTimer;
document.getElementById("searchInput").addEventListener("keyup", function(){
  clearTimeout(typingTimer);
  let keyword = this.value;
  typingTimer = setTimeout(()=>{
    fetch("<?= site_url('students/search') ?>?keyword="+keyword)
      .then(res=>res.text())
      .then(data=>{
        document.querySelector("#studentTable").innerHTML = data;
      });
  },300);
});
</script>

</body>
</html>
