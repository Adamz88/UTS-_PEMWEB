<?php
include "koneksi.php";
include "templates/header.php";

$sql = "SELECT * FROM about";
$result = $conn->query($sql);
$about = null;

if ($result->num_rows > 0) {
    // Ambil semua pengalaman dan simpan dalam array
    while ($row = $result->fetch_assoc()) {
        $about[] = $row; // Mengumpulkan semua pengalaman dalam array
    }
} else {
    echo "error";
}

$conn->close();
?>

<!-- About Section -->
<section id="about" class="about section" style="margin-top: 100px !important;">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 align-items-center justify-content-between">
            <div class="col-xl-6" data-aos="fade-up" data-aos-delay="200">
                <?php foreach ($about as $a) : ?>
                    <span class="about-meta">MORE ABOUT ME</span>
                    <h2 class="about-title"><?= $a['title']; ?></h2>
                    <p class="about-description"><?= $a['description']; ?></p>

                    <div class="row feature-list-wrapper">
                        <ul class="feature-list">
                            <?php
                            // Cek apakah ada pengalaman untuk ditampilkan
                            if (isset($a["skills"])) {
                                $skills = $a['skills']; // Ambil deskripsi pengalaman dari database

                                // Pisahkan string berdasarkan titik koma
                                $items = explode(';', $skills);

                                // Tampilkan dalam format daftar
                                foreach ($items as $item) {
                                    $trimmedItem = trim($item);
                                    if (!empty($trimmedItem)) {
                                        echo '<li><i class="bi bi-check-circle-fill"></i> <span>' . htmlspecialchars($trimmedItem) . '</span></li>';
                                    }
                                }
                            } else {
                                echo '<li>No experience available.</li>'; // Pesan jika tidak ada pengalaman
                            }
                            ?>

                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                <div class="image-wrapper">
                    <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                        <img src="assets/img/illustration-1.webp" alt="Studying" class="img-fluid main-image rounded-4">
                    </div>
                    <div class="experience-badge floating">
                        <h3>5+ <span>Semesters</span></h3>
                        <p>Of academic excellence in Informatics</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /About Section -->

<?php
include "templates/footer.php";
?>