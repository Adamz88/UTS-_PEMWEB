<?php
include "koneksi.php";
include "templates/header.php";

$sql = "SELECT * FROM experiences";
$result = $conn->query($sql);
$experiences = null;

if ($result->num_rows > 0) {
    // Ambil semua pengalaman dan simpan dalam array
    while ($row = $result->fetch_assoc()) {
        $experiences[] = $row; // Mengumpulkan semua pengalaman dalam array
    }
} else {
    echo "error";
}
$conn->close();
?>

<!-- Experiences Section -->
<section id="features" class="features section" style="padding-top: 200px !important;">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Experiences</h2>
        <p>Explore my diverse experiences in web development, mobile applications, and collaborative projects.</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="d-flex justify-content-center">
            <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
                <?php foreach ($experiences as $e) : ?>
                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                            <h4><?= $e["nama"]; ?></h4>
                        </a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
            <?php foreach ($experiences as $e) : ?>
                <div class="tab-pane fade active show" id="features-tab-1">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                            <h3><?= $e['nama']; ?></h3>
                            <p class="fst-italic">
                                <?= $e['description']; ?>
                            </p>
                            <ul>
                                <?php
                                // Cek apakah ada pengalaman untuk ditampilkan
                                if (isset($e["points"])) {
                                    $points = $e['points']; // Ambil deskripsi pengalaman dari database

                                    // Pisahkan string berdasarkan titik koma
                                    $items = explode(';', $points);

                                    // Tampilkan dalam format daftar
                                    foreach ($items as $item) {
                                        $trimmedItem = trim($item);
                                        if (!empty($trimmedItem)) {
                                            echo '<li><i class="bi bi-check2-all"></i> <span>' . htmlspecialchars($trimmedItem) . '</span></li>';
                                        }
                                    }
                                } else {
                                    echo '<li>No experience available.</li>'; // Pesan jika tidak ada pengalaman
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="assets/img/features-illustration-1.webp" alt="" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End tab content item -->
            <?php endforeach; ?>

        </div>

    </div>

</section><!-- /Experiences Section -->

<?php
include "templates/footer.php";
?>