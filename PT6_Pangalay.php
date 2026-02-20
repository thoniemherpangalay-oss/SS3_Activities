<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Public Library Expansion Project</title>

<?php
$items = [
    "Lumber" => 150000,
    "Concrete" => 78000,
    "Drywall" => 69000,
    "Paint" => 12000,
    "Miscellaneous" => 20000
];

function increaseCost($amount, $percent) {
    return $amount + ($amount * $percent);
}

function formatMoney($amount) {
    return number_format($amount, 2);
}

$totalEstimated = 0;
$total10 = 0;
$total15 = 0;
$total20 = 0;
?>

<style>

body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    background: linear-gradient(-45deg,#d9b3d9,#ece9e6,#cce0ff,#fdfbfb);
    background-size:400% 400%;
    animation: gradientMove 12s ease infinite;
    perspective:1200px; 
}

@keyframes gradientMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

.container{
    width:900px;
    margin:60px auto;
    padding:40px;
    background:rgba(255,255,255,0.25);
    backdrop-filter:blur(15px);
    border-radius:20px;
    box-shadow:0 20px 40px rgba(0,0,0,0.3);
    transform-style:preserve-3d;
    transition: transform 0.6s ease, box-shadow 0.6s ease;
    animation: floatUp 1.2s ease;
}

.container:hover{
    transform: rotateX(8deg) rotateY(-8deg) scale(1.03);
    box-shadow:0 40px 70px rgba(0,0,0,0.5);
}

@keyframes floatUp{
    from{opacity:0; transform:translateY(60px);}
    to{opacity:1; transform:translateY(0);}
}

h1,h2{
    text-align:center;
    margin:0;
}

h2{
    color:darkred;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
    border-radius:15px;
    overflow:hidden;
}

th{
    padding:15px;
    background:linear-gradient(45deg,#7a4e7a,#5c375c);
    color:white;
}

td{
    padding:12px;
    text-align:center;
    transition:all 0.4s ease;
}

tbody tr{
    opacity:0;
    transform:translateY(40px);
    animation: rowAppear 0.7s forwards cubic-bezier(.17,.67,.83,.67);
}

@keyframes rowAppear{
    to{
        opacity:1;
        transform:translateY(0);
    }
}

tbody tr{
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}

tbody tr:hover{
    transform: translateZ(40px) scale(1.04);
    box-shadow:0 20px 30px rgba(0,0,0,0.3);
    background:rgba(0,123,255,0.15);
}

tbody tr:nth-child(even){
    background:rgba(255,255,255,0.35);
}

tbody tr:nth-child(odd){
    background:rgba(255,255,255,0.2);
}

.total-row{
    background:linear-gradient(90deg,#c2f0c2,#99e699);
    font-weight:bold;
}

.total-row:hover{
    transform: translateZ(60px) scale(1.06);
    box-shadow:0 0 30px #66ff66;
}

.footer{
    margin-top:25px;
    text-align:right;
    font-style:italic;
}

</style>
</head>
<body>

<div class="container">

<h1>Public Library Expansion Project</h1>
<h2>Cost Estimates</h2>

<table border="0">
<thead>
<tr>
    <th>Expenditures</th>
    <th>Estimated Cost</th>
    <th>10% Increase</th>
    <th>15% Increase</th>
    <th>20% Increase</th>
</tr>
</thead>
<tbody>

<?php
$delay = 0;

foreach($items as $name => $cost){

    $cost10 = increaseCost($cost, 0.10);
    $cost15 = increaseCost($cost, 0.15);
    $cost20 = increaseCost($cost, 0.20);

    $totalEstimated += $cost;
    $total10 += $cost10;
    $total15 += $cost15;
    $total20 += $cost20;

    echo "<tr style='animation-delay: {$delay}s'>
        <td>$name</td>
        <td>$ " . formatMoney($cost) . "</td>
        <td>$ " . formatMoney($cost10) . "</td>
        <td>$ " . formatMoney($cost15) . "</td>
        <td>$ " . formatMoney($cost20) . "</td>
    </tr>";

    $delay += 0.25;
}
?>

<tr class="total-row" style="animation-delay: <?php echo $delay; ?>s">
    <td>Total Expenditures:</td>
    <td>$ <?php echo formatMoney($totalEstimated); ?></td>
    <td>$ <?php echo formatMoney($total10); ?></td>
    <td>$ <?php echo formatMoney($total15); ?></td>
    <td>$ <?php echo formatMoney($total20); ?></td>
</tr>

</tbody>
</table>

<div class="footer">
Created by: Thonie Mher Pangalay
</div>

</div>

</body>
</html>