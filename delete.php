<?php
$link = mysqli_connect("localhost", "root", "", "user_form");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM user_data WHERE id = $id";
    if (mysqli_query($link, $sql)) {

        echo "<script>window.location.href = 'showmessege.php';</script>";
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($link);
    }
} else {
    echo "Invalid request. No ID specified.";
}

mysqli_close($link);
?>
