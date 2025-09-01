<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM commission WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jenis = $_POST['jenis'];
    $deskripsi = $_POST['deskripsi'];

    $conn->query("UPDATE commission 
                  SET nama='$nama', email='$email', jenis='$jenis', deskripsi='$deskripsi' 
                  WHERE id=$id");
    header("Location: index.php#contact");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Commission</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <section id="contact">
    <h6>Edit Commission</h6>
    <form method="POST" class="commission-form">
      <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
      <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
      
      <select name="jenis" required>
        <option value="Logo Design" <?php if($row['jenis']=="Logo Design") echo "selected"; ?>>Logo Design</option>
        <option value="Website" <?php if($row['jenis']=="Website") echo "selected"; ?>>Website</option>
        <option value="UI/UX" <?php if($row['jenis']=="UI/UX") echo "selected"; ?>>UI/UX</option>
        <option value="Poster" <?php if($row['jenis']=="Poster") echo "selected"; ?>>Poster</option>
      </select>

      <textarea name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea>
      <button type="submit" name="update">Update</button>
    </form>
  </section>
</body>
</html>
