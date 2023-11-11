<!DOCTYPE html>
<html lang="en">
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "2";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Calculator</title>
</head>
<body>
    <div class="w-full h-screen bg-gradient-to-r from-[#F9EF81] to-[#F2FBF4]">
        <div class="flex justify-center align-center text-2xl font-bold ">Calculator</div>
        <div class="flex text-xl justify-center align-center py-10">This is a Calculator made using PHP</div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="flex justify-center align-center py-10">
                <div class="grid grid-cols-4 gap-4">
                    <input type="text" id="display" name="expression" class="col-span-4 p-2 mb-4 text-right border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    <button class="col-span-1 p-2 bg-gray-300 rounded hover:bg-gray-400" type="submit" name="number" value="1">1</button>
                    <button class="col-span-1 p-2 bg-gray-300 rounded hover:bg-gray-400" type="submit" name="number" value="2">2</button>
                    <button class="col-span-1 p-2 bg-gray-300 rounded hover:bg-gray-400" type="submit" name="number" value="3">3</button>
                    <button class="col-span-1 p-2 bg-blue-500 text-white rounded hover:bg-blue-600" type="submit" name="operator" value="+">+</button>

                    <button class="col-span-1 p-2 bg-gray-300 rounded hover:bg-gray-400" type="submit" name="number" value="4">4</button>
                    <button class="col-span-1 p-2 bg-gray-300 rounded hover:bg-gray-400" type="submit" name="number" value="5">5</button>
                    <button class="col-span-1 p-2 bg-gray-300 rounded hover:bg-gray-400" type="submit" name="number" value="6">6</button>
                    <button class="col-span-1 p-2 bg-blue-500 text-white rounded hover:bg-blue-600" type="submit" name="operator" value="-">-</button>

                    <button class="col-span-1 p-2 bg-gray-300 rounded hover:bg-gray-400" type="submit" name="number" value="7">7</button>
                    <button class="col-span-1 p-2 bg-gray-300 rounded hover:bg-gray-400" type="submit" name="number" value="8">8</button>
                    <button class="col-span-1 p-2 bg-gray-300 rounded hover:bg-gray-400" type="submit" name="number" value="9">9</button>
                    <button class="col-span-1 p-2 bg-blue-500 text-white rounded hover:bg-blue-600" type="submit" name="operator" value="*">*</button>

                    <button class="col-span-1 p-2 bg-gray-300 rounded hover:bg-gray-400" type="submit" name="number" value="0">0</button>
                    <button class="col-span-1 p-2 bg-gray-300 rounded hover:bg-gray-400" type="submit" name="decimal" value=".">.</button>
                    <button class="col-span-1 p-2 bg-blue-500 text-white rounded hover:bg-blue-600" type="submit" name="equals" value="=">=</button>
                    <button class="col-span-1 p-2 bg-blue-500 text-white rounded hover:bg-blue-600" type="submit" name="operator" value="/">/</button>

                    <button class="col-span-2 p-2 bg-red-500 text-white rounded hover:bg-red-600" type="submit" name="clear" value="Clear">Clear</button>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $expression = $_POST["expression"];
            $number = $_POST["number"] ?? null;
            $operator = $_POST["operator"] ?? null;
            $decimal = $_POST["decimal"] ?? null;
            $equals = $_POST["equals"] ?? null;
            $clear = $_POST["clear"] ?? null;

            if ($clear) {
                $expression = '';
            } elseif ($number !== null) {
                $expression .= $number;
            } elseif ($decimal !== null) {
                $expression .= $decimal;
            } elseif ($operator !== null) {
                $expression .= $operator;
            } elseif ($equals !== null) {
                try {
                    $result = eval("return $expression;");
                    echo "<div class='flex justify-center align-center text-xl py-5'>Result: $result</div>";
                } catch (Exception $e) {
                    echo "<div class='flex justify-center align-center text-xl py-5'>Error</div>";
                }
            }

            // Display the current expression
            echo "<div class='flex justify-center align-center text-xl py-5'>$expression</div>";
        }
        ?>
    </div>
</body>
</html>
