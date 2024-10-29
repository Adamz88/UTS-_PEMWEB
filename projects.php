<?php
include "templates/header.php";
include "koneksi.php";
$sql = "SELECT title, description, img_path FROM projects";
$result = $conn->query($sql);
?>

<main class="main" style="margin-top:200px;">
    <div class="container">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Latest Projects</h2>
            <p>Explore The Recent Most Bought Shakes This Week</p>
        </div><!-- End Section Title -->


        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                // Output data dari setiap baris
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-4">
                        <div class="project-card">
                            <img alt="<?php echo htmlspecialchars($row['title']); ?>" src="<?= $row['img_path']; ?>" style="object-fit: cover !important;" />
                            <div class="project-content">
                                <h5><?php echo htmlspecialchars($row['title']); ?></h5>
                                <p><?php echo htmlspecialchars($row['description']); ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No projects found.</p>";
            }
            ?>
        </div>
    </div>
</main>


<?php
include "templates/footer.php";
$conn->close();
?>