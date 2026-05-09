<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Request Blood</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #ff4d4d, #990000);
            color: white;
            text-align: center;
        }

        form {
            background: white;
            color: black;
            padding: 20px;
            margin: 50px auto;
            width: 300px;
            border-radius: 15px;
        }

        input {
            margin: 10px;
            padding: 8px;
            width: 90%;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<h2>Request Blood</h2>

<form method="post">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="text" name="blood" placeholder="Blood Group" required><br>
    <input type="number" name="units" placeholder="Units" required><br>
    <button name="submit">Request</button>
</form>

<?php
if(isset($_POST['submit'])){
    mysqli_query($conn,"INSERT INTO request(name,blood_group,units_required,status)
    VALUES('{$_POST['name']}','{$_POST['blood']}','{$_POST['units']}','Pending')");
    echo "🟡 Request Sent!";
}
?>

</body>
</html>