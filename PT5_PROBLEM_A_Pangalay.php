<!DOCTYPE html>
<html>
<head>
  <title>Grade Calculator</title>
    <style>
    body{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        display:flex;
        justify-content:center;
        align-items:center;
        height:100vh;
        margin:0;
    }

    .container{
        width:420px;
        background: rgba(255, 255, 255, 0.95);
        padding:30px;
        border-radius:15px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        backdrop-filter: blur(10px);
        animation: fadeIn 0.6s ease-in-out;
    }

    legend{
        font-size:20px;
        color:#1e3c72;
        padding:0 10px;
    }

    label{
        display:block;
        margin-bottom:6px;
        font-weight:600;
        color:#333;
    }

    input{
        width:100%;
        padding:10px;
        margin-bottom:15px;
        border-radius:8px;
        border:1px solid #ccc;
        outline:none;
        transition:0.3s;
        font-size:14px;
    }

    input:focus{
        border-color:#2a5298;
        box-shadow:0 0 8px rgba(42,82,152,0.3);
    }

    button{
        width:100%;
        padding:12px;
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color:white;
        border:none;
        border-radius:8px;
        font-size:16px;
        font-weight:bold;
        cursor:pointer;
        transition:0.3s ease;
    }

    button:hover{
        transform:translateY(-2px);
        box-shadow:0 8px 15px rgba(0,0,0,0.2);
    }

    .result{
        margin-top:25px;
        padding:15px;
        border-radius:10px;
        background:#f4f6fb;
        border-left:5px solid #2a5298;
        font-size:15px;
    }

    .result p{
        margin:8px 0;
    }

    .passed{
        color:#28a745;
        font-weight:bold;
    }

    .failed{
        color:#dc3545;
        font-weight:bold;
    }

    @keyframes fadeIn{
        from{opacity:0; transform:translateY(15px);}
        to{opacity:1; transform:translateY(0);}
    }
    .progress-container{
    margin-top:15px;
    background:#e0e0e0;
    border-radius:20px;
    height:22px;
    overflow:hidden;
}

.progress-bar{
    height:100%;
    width:0%;
    text-align:center;
    line-height:22px;
    color:white;
    font-size:13px;
    font-weight:bold;
    border-radius:20px;
    transition: width 1s ease-in-out;
}

.progress-pass{
    background: linear-gradient(90deg, #28a745, #5dd67a);
}

.progress-fail{
    background: linear-gradient(90deg, #dc3545, #ff6b6b);
}
</style>
</head>
<body>
<div class="container">
<form method="POST">
    <fieldset>
        <legend><b>Grade Calculator</b></legend>
        <label>1st Quarter Grade:</label>
        <input type="number" name="q1" placeholder="Enter your Grade" min="70" max="99" step="0.01" required><br>

        <label>2nd Quarter Grade:</label>
        <input type="number" name="q2" placeholder="Enter your Grade" min="70" max="99" step="0.01" required><br>

        <label>3rd Quarter Grade:</label>
        <input type="number" name="q3" placeholder="Enter your Grade" min="70" max="99" step="0.01" required><br>

        <label>4th Quarter Grade:</label>
        <input type="number" name="q4" placeholder="Enter your Grade" min="70" max="99" step="0.01" required><br>

       <button type="submit" name="calc">Calculate</button>
    </fieldset>
</form>

<?php
if(isset($_POST['calc'])){
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];

    $avg = ($q1 + $q2 + $q3 + $q4) / 4;

    if($avg >= 90){
        $desc = "Outstanding";
        $rem = "Passed";
        $class = "passed";
    }
    elseif($avg >= 85){
        $desc = "Very Satisfactory";
        $rem = "Passed";
    }
    elseif($avg >= 80){
        $desc = "Satisfactory";
        $rem = "Passed";
        $class = "passed";
    }
    elseif($avg >= 75){
        $desc = "Fairly Satisfactory";
        $rem = "Passed";
        $class = "passed";
    }
    else{
        $desc = "Did Not Meet Expectations";
        $rem = "Failed";
        $class = "failed";
    }

    echo "<div class='result'>";
    echo "Average Grade: " . number_format($avg,2) . "<br>";
    echo "Description: $desc<br>";
    echo "Remarks: $rem";
    echo "</div>";
}
?></div></body>
</html>
