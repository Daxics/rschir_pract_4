<html lang="en">

<head>
    <title>Hello page</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
    <h1>Таблица заказов</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Заказ</th>
        </tr>
        <?php
        $mysqli = new mysqli("mysql", "user", "mypass", "appDB2");
        $result = $mysqli->query("SELECT * FROM orders");
        foreach ($result as $row) {
            echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['type']}</td></tr>";
        }
        ?>
    </table>

</body>

</html>