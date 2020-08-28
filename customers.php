<?php
    require_once('lib/pdo_db.php');
    require_once('models/Customer.php');

    $customer = new Customer();

    $customers = $customer->getCustomers();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>View Customers</title>
</head>
<body>
    <div class="container mt-4">
        <div class="btn-group" role="group">
            <a href="customers.php" class="btn btn-primary">Customers</a>
            <a href="transactions.php" class="btn btn-secondary">Transactions</a>
        </div>
        <hr>
        <h2>Customers</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $c): ?>
                    <tr>
                        <td><?= $c->id ?></td>
                        <td><?= $c->first_name ?> <?= $c->last_name ?></td>
                        <td><?= $c->email ?></td>
                        <td><?= $c->created_at ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <p><a href="index.php">Pay Page</a></p>
    </div>
</body>
</html>
