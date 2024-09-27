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
        <button onclick="window.location.href='pitycalculator/pity-calc.php'" class="sidebarbuttonopen">Pity-calculator</button>
        <button onclick="window.location.href='../electric-calc/electric-calc.php'" class="sidebarbutton">Electric-calculator</button>
    </div> <!-- Ende von div Sidebar -->


    <div class="pitycalc1">
    <form action="" method= "POST">
        <label for="pity">Pity:</label>
        <input type="number" id="pity" name="pity" required><br><br>

        <label for="fates">Intertwined Fates:</label>
        <input type="number" id="fates" name="fates" required><br><br>

        <label for="primogems">Primogems:</label>
        <input type="number" id="primogems" name="primogems" required><br><br>

        <input class="buttonrechner" type="submit" value="Berechne">
    </form>

    </div>       </div>
    <?php // Anfang von PHP
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

        // Ergebnisse anzeigen
        echo "<h2>Ergebnisse:</h2>";
        echo "<p>Wishes bis zur Hardpity: $hardpity</p>";
        echo "<p>Wishes bis zur Softpity: $softpity</p>";
        echo "<p>Wishes verfügbar: $fates</p>";

        if ($softwish > 0) {
            echo "<p>Wishes bis zur Hardpity mit den verfügbaren Wishes: $hardwish</p>";
            echo "<p>Wishes bis zur Softpity mit den verfügbaren Wishes: $softwish</p>";
        } elseif ($hardwish > 0) {
            $softwish = abs($softwish);
            echo "<p>Softpity kann mit den verfügbaren Wishes erreicht werden, übrig nach Softpity: $softwish</p>";
            echo "<p>Wishes bis zur Hardpity mit den verfügbaren Wishes: $hardwish</p>";
        } else {
            $softwish = abs($softwish);
            $hardwish = abs($hardwish);
            echo "<p>Softpity kann mit den verfügbaren Wishes erreicht werden, übrig nach Softpity: $softwish</p>";
            echo "<p>Hardpity kann mit den verfügbaren Wishes erreicht werden, übrig nach Hardpity: $hardwish</p>";
        }
    }
    ?> <!-- Ende von PHP -->

</body>
</html>