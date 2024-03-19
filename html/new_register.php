<!-- register with the username, fullname, email, password -->
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "forums";

    try {
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get data from form
        $username = $_POST['username'];
        $fullname = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Insert data into database
        // INSERT INTO user (username, full_name, email, password) VALUES ('ethanh', 'ethanhsu', 'eh@gmail.com', 'ethanh0000');
        $sql = "INSERT INTO user (username, full_name, email, password)
        VALUES (:username, :full_name, :email, :password)";
        // $stmt = $conn->prepare($sql);
        // $stmt->execute(['username' => $username, 'fullname' => $fullname, 'email' => $email, 'password' => $password]);
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            var_dump($conn->errorInfo());
        }
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':full_name', $fullname);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        // $executed = $stmt->execute(['username' => $username, 'full_name' => $fullname, 'email' => $email, 'password' => $password]);
        $executed = $stmt->execute();
        if ($executed === false) {
            var_dump($stmt->errorInfo());
        }

        echo "New record created successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
?>

