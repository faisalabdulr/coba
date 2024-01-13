<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (latest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>

<head>
    <title>Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
        }

        p {
            background-color: #007bff;
            padding: 10px;
            color: white;
            margin: 0; /* Remove default margin */
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #fff;
        }

        a.edit-link,
        a.delete-link {
            color: #007bff;
            margin-right: 10px;
        }

        a.edit-link:hover,
        a.delete-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Homepage</h2>
    <p>
        <a href="add.php">Add New Data</a>
    </p>
    <table>
        <tr bgcolor='#DDDDDD'>
            <td><strong>Name</strong></td>
            <td><strong>Age</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Action</strong></td>
        </tr>
        <?php
        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $res['name'] . "</td>";
            echo "<td>" . $res['age'] . "</td>";
            echo "<td>" . $res['email'] . "</td>";
            echo "<td>
                    <a class='edit-link' href=\"edit.php?id=$res[id]\">Edit</a>
                    <a class='delete-link' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
                  </td>";
        }
        ?>
    </table>
</body>

</html>
