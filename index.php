<?php
include "koneksi.php";
include "templates/header.php";

$sql = "SELECT * FROM homepage";
$result = $conn->query($sql);
$homepage = null;

if ($result->num_rows > 0) {
  // Ambil semua pengalaman dan simpan dalam array
  while ($row = $result->fetch_assoc()) {
    $homepage[] = $row; // Mengumpulkan semua pengalaman dalam array
  }
} else {
  echo "error";
}
$conn->close();
?>
<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
            <div class="company-badge mb-4">
              <i class="bi bi-gear-fill me-2"></i>
              Pursuing Innovation in Technology
            </div>
            <?php foreach ($homepage as $h) : ?>

              <h1 class="mb-4">
                Hello, <br>
                I am <span class="accent-text"><?= $h['name']; ?></span><br>
              </h1>

              <p class="mb-4 mb-md-5">
                <?= $h['description']; ?>
              </p>

              <div class="hero-buttons">
                <a href="experiences.php" class="btn btn-primary me-0 me-sm-2 mx-1">Experiences</a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
            <img src="assets/img/homepage/profile.jpeg" alt="Hero Image" class="img-fluid shadow bg-body-tertiary rounded" style="border-radius: 50px !important;">
          </div>
        </div>
      </div>
    </div>

  </section><!-- /Hero Section -->
</main>

<?php include 'templates/footer.php'; ?>