<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Personal Website</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- HEADER -->
  <header>
    <div class="logo">
      <img src="icons/logo.png" alt="Logo">
    </div>
    <div class="menu-toggle" onclick="toggleMenu()">☰</div>
    <nav id="navbar">
      <a href="#about">About Me</a>
      <a href="#service">Service</a>
      <a href="#education">Education</a>
      <a href="#project">Project</a>
      <a href="#contact" class="btn-nav">Get in Touch</a>
    </nav>
  </header>

  <!-- HOME -->
  <section id="home">
    <div class="home-text">
      <h1 class="intro-text">Welcome to Leia's</h1>
      <h1 class="animated-word">
        <span>P</span><span>O</span><span>R</span><span>T</span><span>F</span><span>O</span><span>L</span><span>I</span><span>O</span>
      </h1>
    </div>
  </section>

  <!-- ABOUT -->
  <section id="about">
    <div class="about-container">
      <div class="about-text">
        <h2><span class="wavy-underline">Hello!</span></h2>
        <p>
          I'm <strong>Aleiana Kimberly Halim</strong>, known as <strong>Leia</strong>.<br>
          A <strong>Graphic, Web, and UI/UX Designer</strong> based in <strong>Jakarta</strong>, driven by a passion for turning ideas into impactful visuals.
          My work blends creativity with attention to detail, aiming to tell stories, spark emotions, and leave lasting impressions.
        </p>
      </div>
      <div class="about-image">
        <img src="icons/Profile.png" alt="Profile"/>
      </div>
    </div>
  </section>

  <!-- SERVICE -->
  <section id="service">
    <h3>Services</h3>
  </section>

  <!-- EDUCATION -->
  <section id="education">
    <h4>Education</h4>
  </section>

  <!-- PROJECT -->
  <section id="project">
    <h5>Projects</h5>
  </section>

  <!-- CONTACT -->
  <section id="contact">
    <h6>Get in Touch</h6>
    <div class="contact-list">
      <div class="contact-item">
        <img src="icons/Instagram.png" alt="Instagram" />
        <a href="https://instagram.com/karina.design" target="_blank">Instagram</a>
      </div>
      <div class="contact-item">
        <img src="icons/X.png" alt="X" />
        <a href="https://x.com/karina_design" target="_blank">X (Twitter)</a>
      </div>
      <div class="contact-item">
        <img src="icons/Behance.png" alt="Behance" />
        <a href="https://behance.net/karinadesign" target="_blank">Behance</a>
      </div>
      <div class="contact-item">
        <img src="icons/LinkedIn.png" alt="LinkedIn" />
        <a href="https://linkedin.com/in/karinadesign" target="_blank">LinkedIn</a>
      </div>
      <div class="contact-item">
        <img src="icons/Email.png" alt="Email" />
        <a href="mailto:karina@email.com">Email</a>
      </div>
    </div>

    <!-- Tombol buka modal -->
    <button id="openFormBtn" class="commission-btn" style="margin-top:30px;">Buka Commission Form</button>

    <!-- Modal Commission Form -->
    <div id="commissionModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Commission Form</h3>
        <form method="POST" action="" class="commission-form">
          <input type="text" name="nama" placeholder="Nama Anda" required>
          <input type="email" name="email" placeholder="Email Anda" required>

          <select name="jenis" required>
            <option value="">Pilih Jenis Commission</option>
            <option value="Logo Design">Logo Design</option>
            <option value="Website">Website</option>
            <option value="UI/UX">UI/UX</option>
            <option value="Poster">Poster</option>
          </select>

          <textarea name="deskripsi" placeholder="Deskripsi Project" required></textarea>

          <button type="submit" name="submit">Kirim Request</button>
        </form>
      </div>
    </div>

    <?php
    // CREATE
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $jenis = $_POST['jenis'];
        $deskripsi = $_POST['deskripsi'];

        $conn->query("INSERT INTO commission (nama, email, jenis, deskripsi) 
                      VALUES ('$nama','$email','$jenis','$deskripsi')");
        header("Location: index.php#contact");
    }
    ?>

    <!-- Daftar Commission -->
    <h6 style="margin-top:40px;">Daftar Commission</h6>
    <div class="project-list">
      <table class="project-table">
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Jenis</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM commission");
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['nama']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['jenis']."</td>
                    <td>".$row['deskripsi']."</td>
                    <td>
                      <a class='btn-edit' href='edit.php?id=".$row['id']."'>Edit</a>
                      <a class='btn-delete' href='delete.php?id=".$row['id']."' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>
                    </td>
                  </tr>";
        }
        ?>
      </table>
    </div>
  </section>

 <script src="script.js"></script>
</body>
</html>