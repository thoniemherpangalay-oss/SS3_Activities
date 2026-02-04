<?php
$expenses = [
    "Lumber" => 150000,
    "Concrete" => 78000,
    "Drywall" => 69000,
    "Paint" => 12000,
    "Miscellaneous" => 20000
];

function increase($amount, $rate) {
    return $amount + ($amount * $rate);
}

$totalEstimated = 0;
$total10 = 0;
$total15 = 0;
$total20 = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Public Library Expansion Project</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4e1ff;
        }
        .container {
            width: 700px;
            margin: 40px auto;
            background-color: #f9d7ff;
            padding: 25px;
            border-radius: 10px;
        }
        h1, h2 {
            text-align: center;
        }
        h2 {
            color: #b1007d;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #c2c2c2;
        }
        tr:nth-child(even) {
            background-color: #e6f7ff;
        }
        tr:nth-child(odd) {
            background-color: #fff7cc;
        }
        .total {
            font-weight: bold;
            background-color: #d3d3d3;
        }
        .footer {
            text-align: right;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Public Library Expansion Project</h1>
    <h2>Cost Estimates</h2>

    <table>
        <tr>
            <th>Expenditures</th>
            <th>Estimated Cost</th>
            <th>10% Increase</th>
            <th>15% Increase</th>
            <th>20% Increase</th>
        </tr>

        <?php foreach ($expenses as $item => $cost): 
            $inc10 = increase($cost, 0.10);
            $inc15 = increase($cost, 0.15);
            $inc20 = increase($cost, 0.20);

            $totalEstimated += $cost;
            $total10 += $inc10;
            $total15 += $inc15;
            $total20 += $inc20;
        ?>
        <tr>
            <td><?= $item ?></td>
            <td>$<?= number_format($cost, 2) ?></td>
            <td>$<?= number_format($inc10, 2) ?></td>
            <td>$<?= number_format($inc15, 2) ?></td>
            <td>$<?= number_format($inc20, 2) ?></td>
        </tr>
        <?php endforeach; ?>

        <tr class="total">
            <td>Total Expenditures</td>
            <td>$<?= number_format($totalEstimated, 2) ?></td>
            <td>$<?= number_format($total10, 2) ?></td>
            <td>$<?= number_format($total15, 2) ?></td>
            <td>$<?= number_format($total20, 2) ?></td>
        </tr>
    </table>

    <div class="footer">
        Created by: <strong>Thonie Pangalay</strong>
    </div>
</div>
</body>
</html>E
