<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <style>
        body {
            font-family: Arial;
            background: #222;
            color: white;
            text-align: center;
        }

        table {
            margin: auto;
            background: white;
            color: black;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            padding: 10px;
            border: 1px solid black;
        }

        button {
            background: green;
            color: white;
            padding: 5px;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<h2>Admin Panel</h2>

<table>
<tr>
<th>ID</th><th>Name</th><th>Blood</th><th>Units</th><th>Status</th><th>Action</th>
</tr>

<?php
$result = mysqli_query($conn,"SELECT * FROM request");

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
    <td>{$row['request_id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['blood_group']}</td>
    <td>{$row['units_required']}</td>
    <td>{$row['status']}</td>
    <td><a href='?approve={$row['request_id']}'><button>Approve</button></a></td>
    </tr>";
}
?>

</table>

<?php
if(isset($_GET['approve'])){
    $id = $_GET['approve'];

    $res = mysqli_query($conn,"SELECT * FROM request WHERE request_id=$id");
    $data = mysqli_fetch_assoc($res);

    mysqli_query($conn,"UPDATE blood SET units_available = units_available - {$data['units_required']} 
    WHERE blood_group='{$data['blood_group']}'");

    mysqli_query($conn,"UPDATE request SET status='Approved' WHERE request_id=$id");

    echo "<script>window.location='admin.php';</script>";
}
?>

</body>
</html>