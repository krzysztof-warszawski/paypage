<?php
require_once('lib/pdo_db.php');
require_once('models/Transaction.php');

$transaction = new Transaction();

$transactions = $transaction->getTransactions();

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

    <title>View Transactions</title>
</head>
<body>
<div class="container mt-4">
    <div class="btn-group" role="group">
        <a href="customers.php" class="btn btn-secondary">Customers</a>
        <a href="transactions.php" class="btn btn-primary">Transactions</a>
    </div>
    <hr>
    <h2>Transactions</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Transaction ID</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($transactions as $t): ?>
            <tr>
                <td><?= $t->id ?></td>
                <td><?= $t->customer_id ?></td>
                <td><?= $t->product ?></td>
                <td><?= sprintf('%.2f', $t->amount / 100) ?> <?= strtoupper($t->currency) ?></td>
                <td><?= $t->created_at ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <p><a href="index.php">Pay Page</a></p>
</div>
</body>
</html>
