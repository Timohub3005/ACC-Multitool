<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACC-Genshin-Calculator</title>
    <link rel="stylesheet" href="stylepity.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="main-container">
    <div class="sidebar"> 
        <button onclick="window.location.href='../index.html'" class="sidebarbutton">Home</button>
        <button onclick="window.location.href='../pitycalculator/genshincalc.php'" class="sidebarbuttonopen">Genshin-Calc</button>
        <button onclick="window.location.href='../electric-calc/electric-calc.php'" class="sidebarbutton">Electric-calculator</button>
    </div> 

    <div class="pitycalc1">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1 class="titleforcalcs">Pity Calculator</h1>

            <?php if ($_SERVER["REQUEST_METHOD"] != "POST"): ?>
                <label for="pity">Pity:</label>
                <input class="inputcalc" type="number" id="pity" name="pity" required><br><br>

                <label for="fates">Intertwined Fates:</label>
                <input class="inputcalc" type="number" id="fates" name="fates" required><br><br>

                <label for="primogems">Primogems:</label>
                <input class="inputcalc" type="number" id="primogems" name="primogems" required><br><br>

                <input class="submitbuttoncalc" type="submit" value="Submit"><br><br>
            <?php else: ?>
                <?php 
                    $pity = isset($_POST['pity']) ? intval($_POST['pity']) : 0;
                    $primogems = isset($_POST['primogems']) ? intval($_POST['primogems']) : 0;
                    $fates = isset($_POST['fates']) ? intval($_POST['fates']) : 0;

                    $totalFates = $fates + floor($primogems / 160);
                    $hardpity = max(0, 90 - $pity);
                    $softpity = max(0, 70 - $pity);
                    $hardwish = max(0, 90 - $pity - $totalFates);
                    $softwish = max(0, 70 - $pity - $totalFates);
                ?>

                <label for="hardpity">Wishes until Hardpity:</label>
                <input type="text" id="hardpity" readonly value="<?php echo ($hardpity > 0 ? $hardpity : "Reached Hardpity!"); ?>"><br><br>

                <label for="softpity">Wishes until Softpity:</label>
                <input type="text" id="softpity" readonly value="<?php echo ($softpity > 0 ? $softpity : "Reached Softpity!"); ?>"><br><br>

                <label for="hardwish">Wishes until hardpity (w/ counting the available wishes):</label>
                <input type="text" id="hardwish" readonly value="<?php echo $hardwish; ?>"><br><br>

                <label for="softwish">Wishes until softpity (w/ counting the available wishes)</label>
                <input type="text" id="softwish" readonly value="<?php echo $softwish; ?>"><br><br>
            <?php endif; ?>
        </form>
    </div>
</div>

</body>
</html>
