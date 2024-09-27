<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACC-Pity-Calculator</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="main-container">
    <div class="sidebar"> <!-- Anfang von div Sidebar -->
        <button onclick="window.location.href='../index.html'" class="sidebarbutton">Home</button>
        <button onclick="window.location.href='../pitycalculator/pity-calc.php'" class="sidebarbuttonopen">Pity-calculator</button>
        <button onclick="window.location.href='../electric-calc/electric-calc.php'" class="sidebarbutton">Electric-calculator</button>
    </div> <!-- Ende von div Sidebar -->


    <div class="pitycalc1">
    <form action="" method="POST">
        <label for="pity">Pity:</label>
        <input type="number" id="pity" name="pity" value="<?php echo isset($_POST['pity']) ? intval($_POST['pity']) : ''; ?>" required><br><br>

        <label for="fates">Intertwined Fates:</label>
        <input type="number" id="fates" name="fates" value="<?php echo isset($_POST['fates']) ? intval($_POST['fates']) : ''; ?>" required><br><br>

        <label for="primogems">Primogems:</label>
        <input type="number" id="primogems" name="primogems" value="<?php echo isset($_POST['primogems']) ? intval($_POST['primogems']) : ''; ?>" required><br><br>

        <input class="buttonrechner" type="submit" value="Berechne"><br><br>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Daten verarbeiten
            $pity = isset($_POST['pity']) ? intval($_POST['pity']) : 0;
            $primogems = isset($_POST['primogems']) ? intval($_POST['primogems']) : 0;
            $fates = isset($_POST['fates']) ? intval($_POST['fates']) : 0;

            $fates = $fates + floor($primogems / 160);
            $hardpity = 90 - $pity;
            $softpity = 70 - $pity;
            $hardwish = 90 - $pity - $fates;
            $softwish = 70 - $pity - $fates;
        }
        ?>

        <label for="hardpity">Wishes bis zur Hardpity:</label>
        <input type="text" id="hardpity" value="<?php echo isset($hardpity) ? $hardpity : ''; ?>" readonly><br><br>

        <label for="softpity">Wishes bis zur Softpity:</label>
        <input type="text" id="softpity" value="<?php echo isset($softpity) ? $softpity : ''; ?>" readonly><br><br>

        <label for="availablewishes">Wishes verfügbar:</label>
        <input type="text" id="availablewishes" value="<?php echo isset($fates) ? $fates : ''; ?>" readonly><br><br>

        <label for="hardwish">Wishes bis zur Hardpity mit den verfügbaren Wishes:</label>
        <input type="text" id="hardwish" value="<?php echo isset($hardwish) && $hardwish > 0 ? $hardwish : 0; ?>" readonly><br><br>

        <label for="softwish">Wishes bis zur Softpity mit den verfügbaren Wishes:</label>
        <input type="text" id="softwish" value="<?php echo isset($softwish) && $softwish > 0 ? $softwish : 0; ?>" readonly><br><br>

        <?php
        if (isset($softwish) && $softwish <= 0) {
            $softwish = abs($softwish);
            echo "<p>Softpity kann mit den verfügbaren Wishes erreicht werden, übrig nach Softpity: $softwish</p>";
        }

        if (isset($hardwish) && $hardwish <= 0) {
            $hardwish = abs($hardwish);
            echo "<p>Hardpity kann mit den verfügbaren Wishes erreicht werden, übrig nach Hardpity: $hardwish</p>";
        }
        ?>
    </form>
</div>

</body>
</html>