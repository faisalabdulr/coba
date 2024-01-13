<html>

<head>
    <title>Add Data</title>
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
            background-color: #333;
            padding: 10px;
            color: white;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        form {
            margin: 20px;
        }

        table {
            width: 100%;
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

        input[type="text"],
        input[type="submit"] {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff; /* Blue color */
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }
    </style>
</head>

<body>
    <?php
    // Include the database connection file
    require_once("dbConnection.php");

    if (isset($_POST['submit'])) {
        // Escape special characters in string for use in SQL statement
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $age = mysqli_real_escape_string($mysqli, $_POST['age']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);

        // Check for empty fields
        if (empty($name) || empty($age) || empty($email)) {
            if (empty($name)) {
                echo "<font color='red'>Name field is empty.</font><br/>";
            }

            if (empty($age)) {
                echo "<font color='red'>Age field is empty.</font><br/>";
            }

            if (empty($email)) {
                echo "<font color='red'>Email field is empty.</font><br/>";
            }

            // Show link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else {
            // If all the fields are filled (not empty)

            // Insert data into database
            $result = mysqli_query($mysqli, "INSERT INTO users (`name`, `age`, `email`) VALUES ('$name', '$age', '$email')");

            // Display success message
            echo "<p><font color='green'>Data added successfully!</p>";
            echo "<a href='index.php'>View Result</a>";
        }
    }
    ?>
</body>

</html>
