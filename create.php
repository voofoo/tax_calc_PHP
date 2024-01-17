<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$Firstname = $Lastname = $Address = $Tel = $Birthdate = $Age = "";

// Processing form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Firstname = trim($_POST["Firstname"]);
    $Lastname = trim($_POST["Lastname"]);
    $Address = trim($_POST["Address"]);
    $Tel = trim($_POST["Tel"]);
    $Birthdate = trim($_POST["Birthdate"]);
    $Age = (date("Y") - date("Y", strtotime($Birthdate)));

    $sql = "INSERT INTO contactstbl (Firstname, Lastname, Address, Tel, Birthdate, Age) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssi", $param_Firstname, $param_Lastname, $param_Address, $param_Tel, $param_Birthdate, $param_Age);

        $param_Firstname = $Firstname;
        $param_Lastname =  $Lastname;
        $param_Address =  $Address;
        $param_Tel = $Tel;
        $param_Birthdate = $Birthdate;
        $param_Age = $Age;

        if (mysqli_stmt_execute($stmt)) {
            header("location: index.php");
            exit();
        } else {
            echo "Oops! Something is broken....";
        }
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Προσθήκη Επαφής</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Προσθήκη Επαφής</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Όνομα</label>
                <input type="text" name="Firstname" class="form-control <?php echo ''; ?>" value="<?php echo $Firstname; ?>">
            </div>
            <div>
                <label>Επώνυμο</label>
                <textarea name="Lastname" class="form-control <?php echo ''; ?>"><?php echo $Lastname; ?></textarea>
            </div>
            <div>
                <label>Διεύθυνση</label>
                <input type="text" name="Address" class="form-control <?php echo ''; ?>" value="<?php echo $Address; ?>">
            </div>
            <div>
                <label>Τηλέφωνο</label>
                <input type="text" name="Tel" class="form-control <?php echo ''; ?>" value="<?php echo $Tel; ?>">
            </div>
            <div>
                <label>Ημερομηνία Γέννησης</label>
                <input type="Date" name="Birthdate" class="form-control <?php echo ''; ?>" value="<?php echo $Birthdate; ?>"><br>
            </div>
            <button id="submit-btn" class="button" value="Προσθήκη">Υποβολη</button>
            <button id="clear-btn" class="button">Καθαρισμος</button>
        </form>
    </div>
</body>

</html>
