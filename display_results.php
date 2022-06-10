<?php
    // get the data from the form
    $investment = filter_input(INPUT_POST, 'investment', 
            FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate', 
            FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years', 
            FILTER_VALIDATE_INT);

            function redirect_to($location) {
                header("Location: " . $location);
                exit;
              }
             function is_post_request() {
                return $_SERVER['REQUEST_METHOD'] == 'POST';
              }
            if (is_post_request()) {
                $investment = $_POST['investment'] ;
                $interest_rate = $_POST['interest_rate'];
                $years = $_POST['years'];
                $expire = time() + 60*60*24*2;
                setcookie('investment', $investment, $expire);
                setcookie('interest_rate', $interest_rate, $expire);
                setcookie('years', $years, $expire);
             
            } 
            
            // if ('display_results.php' === header('refresh:100')) {
            //     redirect_to('index.php');
            //}
            require_once('validate.php');
    // calculate the future value
    $future_value = $investment;
    for ($i = 1; $i <= $years; $i++) {
        $future_value = 
            $future_value + ($future_value * $interest_rate * .01); 
    }

    // apply currency and percent formatting
    $investment_f = '$'.number_format($investment , 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br>
    </main>
</body>
</html>
