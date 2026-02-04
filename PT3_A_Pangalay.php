<!DOCTYPE html>
<html>
<head>
    <title>Daily Calorie Recommendation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 30px;
        }
        .box {
            background-color: #ffffff;
            padding: 20px;
            width: 400px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="box">
    <h2>Calorie Recommendation</h2>

    <form method="post">
        <label>Enter your weight (lbs):</label>
        <input type="number" step="0.01" name="weight" required>

        <label>Lifestyle (A = Active, S = Sedentary):</label>
        <input type="text" name="lifestyle" maxlength="1" required>

        <input type="submit" name="submit" value="Calculate Calories">
    </form>

    <?php
    if (isset($_POST['submit'])) {

        $weight = $_POST['weight'];
        $lifestyle = strtoupper($_POST['lifestyle']);

        if ($lifestyle == 'A') {
            $activityFactor = 15;
            $type = "Active";
        } elseif ($lifestyle == 'S') {
            $activityFactor = 13;
            $type = "Sedentary";
        } else {
            echo "<p class='result'>Invalid lifestyle choice. Please enter A or S.</p>";
            exit;
        }

        $calories = $weight * $activityFactor;

        echo "<p class='result'>
                Lifestyle: $type <br>
                Recommended Daily Calories: $calories
              </p>";
    }
    ?>
</div>

</body>
</html>
