<?php
$link = mysqli_connect("localhost", "root", "", "user_form");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM user_data";
$result = mysqli_query($link, $sql);

echo '<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            background-color: #ffffff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }
        a:hover {
            color: #45a049;
        }
      a.edit {
            color: #4CAF50;
        }
        a.edit:hover {
            color: #45a049;
        }
        a.delete {
            color: #ff4c4c;
        }
        a.delete:hover {
            color: #ff1a1a;
        }
    </style>';

if ($result) {
    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Number</th><th>Message</th><th>Edit</th><th>Delete</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['fName'] . "</td>";
        echo "<td>" . $row['lName'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['number'] . "</td>";
        echo "<td>" . $row['messege'] . "</td>";
        echo "<td><a href='edit.php?id=" . $row['id'] . "' class='edit'>Edit</a></td>";
        echo "<td><a href='delete.php?id=" . $row['id'] . "' class='delete'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";

    mysqli_free_result($result);
} else {
    echo "Error: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>