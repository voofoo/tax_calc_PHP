<?php
session_start();

require_once "config.php";
include("functions.php");
$user_data = check_login($link);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaxCalcApp</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <form id="taxForm" action="" method="post">
                <div class="row">
                    <label for="monthly_income">Μηνιαίος Μισθός:</label>
                    <input type="number" id="monthly_income" name="monthly_income" required>
                </div>

                <div class="row">
                    <label for="children">Αριθμός Παιδιών:</label>
                    <input type="number" id="children" name="children" required>
                </div>

                <div class="rowbtn">
                    <button type="submit" id="submit-btn">Υπολογισμός</button>
                    <button type="button" id="clear-btn" onclick="clearForm()">Καθαρισμός</button>
                </div>
            </form>
        </div>

        <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Your PHP calculations and results display code here
            }
            ?>
        </div>
    </div>

    <div class="contacts">
        <a href="logout.php"> Αποσύνδεση</a>
        <h2>Κατάλογος Επαφών</h2>
        <a href="create.php"> Προσθήκη Επαφής</a>
    </div>

    <script>
        function clearForm() {
            document.getElementById("taxForm").reset();
            document.querySelector(".result").innerHTML = ""; // Clear the result content
        }
    </script>
</body>

</html>
