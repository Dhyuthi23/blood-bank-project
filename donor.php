<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Donor</title>
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
            margin: 20px auto;
            width: 300px;
            border-radius: 15px;
        }

        input {
            margin: 10px;
            padding: 8px;
            width: 90%;
        }

        table {
            margin: auto;
            background: white;
            color: black;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid black;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<h2>Register Donor</h2>

<form method="post">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="number" name="age" placeholder="Age" required><br>
    <input type="text" name="blood" placeholder="Blood Group" required><br>
    <input type="text" name="phone" placeholder="Phone" required><br>
    <button name="submit">Register</button>
</form>

<?php
if(isset($_POST['submit'])){
    mysqli_query($conn,"INSERT INTO donor(name,age,blood_group,phone)
    VALUES('{$_POST['name']}','{$_POST['age']}','{$_POST['blood']}','{$_POST['phone']}')");
    echo "✅ Donor Added!";
}
?>

<h3>Donor List</h3>

<form method="get">
    <input type="text" name="search" placeholder="Search Blood Group">
    <button>Search</button>
</form>

<table>
<tr>
<th>ID</th><th>Name</th><th>Age</th><th>Blood</th><th>Phone</th>
</tr>

<?php
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $result = mysqli_query($conn,"SELECT * FROM donor WHERE blood_group='$search'");
}else{
    $result = mysqli_query($conn,"SELECT * FROM donor");
}

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
    <td>{$row['donor_id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['age']}</td>
    <td>{$row['blood_group']}</td>
    <td>{$row['phone']}</td>
    </tr>";
}
?>

</table>

</body>
</html>