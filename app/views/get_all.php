
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
  *{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}

  body{
    background:linear-gradient(135deg,#e9dac1,#c8b6a6,#a27b5c);
    color:#3d2b1f;
    min-height:100vh;
  }

  /* Header */
  .header{
    padding:20px 40px;
    background:#a27b5c;
    color:#fff;
    display:flex;justify-content:space-between;align-items:center;
  }
  .header h1{font-size:22px;font-weight:600;}
  .header a{
    color:#fff;text-decoration:none;
    padding:8px 16px;border-radius:6px;background:#7f5539;transition:0.3s;
  }
  .header a:hover{background:#5c4033;}

  .container{width:95%;max-width:1200px;margin:30px auto;}

  /* Top actions */
  .top-actions{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;}
  .btn-add{
    background:#7f5539;color:#fff;border:none;padding:10px 20px;
    border-radius:6px;cursor:pointer;font-weight:600;transition:0.3s;
  }
  .btn-add:hover{background:#5c4033;}
  .search-box{
    padding:10px 15px;border:1px solid rgba(92,64,51,0.3);
    border-radius:6px;outline:none;width:250px;
  }
  .search-box:focus{border-color:#7f5539;}

  /* Flat Table */
  .student-table{
    width:100%;border-collapse:collapse;background:#fff;
    border:1px solid rgba(92,64,51,0.2);border-radius:8px;overflow:hidden;
  }
  .student-table th,.student-table td{
    padding:14px;text-align:center;font-size:14px;
    border-bottom:1px solid rgba(92,64,51,0.15);
  }
  .student-table thead{background:#a27b5c;color:#fff;}
  .student-table tr:hover{background:rgba(162,123,92,0.15);}
  .profile-pic{width:45px;height:45px;border-radius:8px;overflow:hidden;margin:0 auto;}
  .profile-pic img{width:100%;height:100%;object-fit:cover;}

  /* Buttons */
  .btn{
    padding:6px 12px;font-size:13px;font-weight:500;
    border-radius:4px;text-decoration:none;color:#fff;transition:0.3s;
  }
  .btn.update{background:#6c757d;}
  .btn.update:hover{background:#5a6268;}
  .btn.delete{background:#c85c5c;}
  .btn.delete:hover{background:#a94444;}

  /* Pagination */
  .pagination{display:flex;justify-content:center;gap:8px;margin:20px 0;}
  .pagination a,.pagination span{
    display:inline-block;padding:8px 14px;border-radius:6px;
    background:rgba(162,123,92,0.15);color:#4a3629;
    text-decoration:none;font-weight:500;transition:0.3s;
  }
  .pagination a:hover{background:#a27b5c;color:#fff;}
  .pagination .current{background:#7f5539;color:#fff;}
</style>
</head>
<body>

<div class="header">
  <h1>📚</h1>
  <a href="<?=site_url('logout')?>">Logout</a>
</div>

<div class="container">
  <div class="top-actions">
    <input type="text" id="searchInput" class="search-box" placeholder="Search students...">
    <a href="<?=site_url('create')?>"><button class="btn-add">+ Add Student</button></a>
  </div>

  <table class="student-table" id="studentTable">
    <thead>
      <tr>
        <th>Profile</th>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($students as $student): ?>
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
        <td><?= $student['first_name']." ".$student['last_name']; ?></td>
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
        document.querySelector("#studentTable tbody").innerHTML = data;
      });
  },300);
});
</script>

</body>
</html>

