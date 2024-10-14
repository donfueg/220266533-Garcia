<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Scripts Showcase</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #333;
        }
        .code {
            background-color: #eaeaea;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .result {
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h1>Loops</h1>

<section>
    <h2>1. Number Counter</h2>
    <div class="code">
        <?php
        echo "<pre>";
        $count = 1;
        while ($count <= 10) {
            echo $count . " ";
            $count++;
            
        }
        echo "\n";
        $evenCount = 2;
        while ($evenCount <= 20) {
            echo $evenCount . " ";
            $evenCount += 2;
        }
        echo "</pre>";
        ?>
    </div>
</section>

<section>
    <h2>2. Password Validator</h2>
    <div class="code">
        <form method="post">
            <label for="password">Please enter the password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Submit</button>
        </form>
        
        <div class="result">
            <?php
            $correctpass = "password123";
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $password = $_POST['password'];
                if ($password === $correctpass) {
                    echo "Access granted.";
                } else {
                    echo "Incorrect password.";
                }
            }
            ?>
        </div>
    </div>
</section>

<section>
    <h2>3. Multiplication Table</h2>
    <div class="code">
        <?php
        $number = 7;
        for ($i = 1; $i <= 10; $i++) {
            $result = $number * $i;
            echo "$number x $i = $result<br>"; // Use <br> for line breaks
        }
        ?>
    </div>
</section>

<section>
    <h2>4. Loop Control with Break and Continue</h2>
    <div class="code">
        <?php
        for ($i = 1; $i <= 10; $i++) {
            if ($i === 5) {
                continue;
            }
            if ($i === 9) {
                break;
            }
            echo "$i ";
        }
        ?>
    </div>
</section>

<section>
    <h2>5. Sum of Numbers</h2>
    <div class="code">
        <?php
        $sum = 0;
        $number = 1;

        while($number <= 100){
            $sum += $number;
            $number++;
        }
        echo "The sum of numbers from 1 to 100 is: $sum";
        ?>
    </div>
</section>

<section>
    <h2>6. Array Iteration with Foreach</h2>
    <div class="code">
        <?php
        $favoriteMovies = [
            "Top Gun",
            "Gran Turismo",
            "Avengers",
            "Bad Boys",
            "Insidious"
        ];
        foreach ($favoriteMovies as $index => $movie) {
            echo ($index + 1) . ". $movie\n";
        }
        ?>
    </div>
</section>

<section>
    <h2>7. Array Iteration with Foreach</h2>
    <div class="code">
        <?php
            $student = [
                "Name" => "Isaac",
                "Age" => 21,
                "Grade" => "College",
                "City" => "Baguio"
            ];

            foreach ($student as $key => $value) {
                echo "$key: $value<br>";
            }
    ?>

    </div>
</section>

<section>
<h1>8. Factorial Calculator</h1>

<form method="post">
    <label for="number">Enter a positive integer:</label>
    <input type="number" id="number" name="number" required>
    <button type="submit">Calculate Factorial</button>
</form>
<div>
    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $number = intval($_POST['number']);
            function calculateFactorial($number) {
                $factorial = 1;
                for ($i = $number; $i > 1; $i--) {
                    $factorial *= $i;
                }
                return $factorial;
            }
            $result = calculateFactorial($number);
            echo "Factorial of $number is: $result";
        }
    ?>
</div>
<section>

<section>
    <h2>9. FizzBuzz Challenge</h2>
    <div class="code">
    <?php
        for ($i = 1; $i <= 50; $i++) {
            if ($i % 3 === 0 && $i % 5 === 0) {
                echo "FizzBuzz ";
            } elseif ($i % 3 === 0) {
                echo "Fizz ";
            } elseif ($i % 5 === 0) {
                echo "Buzz ";
            } else {
                echo "$i ";
            }
        }
?>

    </div>
</section>

<section>
<h2>10. Prime Number Checker</h2>

<form method="post">
    <label for="number">Enter a positive integer:</label>
    <input type="number" id="number" name="number" required>
    <button type="submit">Check Prime</button>
</form>

<div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $number = intval($_POST['number']);
        function isPrime($num) {
            if ($num <= 1) {
                return false;
            }
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i === 0) {
                    return false;
                }
            }
            return true;
        }
        if (isPrime($number)) {
            echo "$number is a prime number.";
        } else {
            echo "$number is not a prime number.";
        }
    }
    ?>
</div>
<section>

<section>
    <h2>11. Fibonacci Sequence</h2>
    <div class="code">
            <?php

        $fib1 = 0;
        $fib2 = 1;

        $count = 0;
        echo "Fibonacci Sequence: ";

        while ($count < 10) {
            echo "$fib1 ";
            $nextFib = $fib1 + $fib2;
            $fib1 = $fib2;
            $fib2 = $nextFib;
            $count++;
        }
        ?>
    </div>
</section>

<h2>12. Reverse a String</h2>

<form method="post">
    <label for="inputString">Enter a string:</label>
    <input type="text" id="inputString" name="inputString" required>
    <button type="submit">Reverse String</button>
</form>

<div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $inputString = $_POST['inputString'];
        $reversedString = "";
        for ($i = strlen($inputString) - 1; $i >= 0; $i--) {
            $reversedString .= $inputString[$i];
        }
        echo "Input: \"$inputString\"<br>";
        echo "Output: \"$reversedString\"";
    }
    ?>
</div>
</body>
</html>
