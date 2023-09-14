<?php
/**
 * Task 2: Temperature Converter
 * Design a PHP program called temperature_converter.php that converts temperatures between Celsius and Fahrenheit.
 * Provide a form where the user can input a temperature value and select the conversion direction (Celsius to Fahrenheit or vice versa). Display the converted temperature.
 * Or, Declare 3 variable temperature values and select the conversion direction (Celsius to Fahrenheit or vice versa). Display the converted temperature.
 */
$page_title = "Temperature Converter";
$temperature_output = '';
$temp_to = '';
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $temperature_input = (float) $_POST['temperature'];
    $temp_to = $_POST['temp_to'] ?: 'c';
    if ('c' == $temp_to) {
        $temperature = ($temperature_input - 32) * (5 / 9);
    } else {
        $temperature = ($temperature_input * (9 / 5)) + 32;
    }
    $temperature_output = sprintf('<h5>The temperature in %s is %.1f</h5>', $temp_to == 'c' ? 'farenheit' : 'celcius', $temperature);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 card border-info">
                <div class="card-body">
                    <h3 class="card-title mb-5"><?php echo $page_title; ?></h3>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="row mb-3 form-field-container">
                            <label for="temperature" class="form-label col-sm-4 ">Temperature: </label>
                            <div class="col-sm-8">
                                <input type="number" step="any" value="<?php echo isset($_POST['temperature']) ? $_POST['temperature'] : ''; ?>" class="form-control" id="temperature" name="temperature">
                            </div>
                        </div> <!-- /.form-field-container -->

                        <div class="row mb-3 form-field-container">
                            <p class="form-label col-sm-4 ">Convert Temperature To: </p>
                            <div class="col-sm-8">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="radio" name="temp_to" value="c" role="switch"
                                        id="to_celcius" <?php echo ($temp_to == 'c' || $temp_to == '') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="to_celcius">Farenheit to Celcius</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="radio"  name="temp_to" value="f" role="switch"
                                        id="to_faren" <?php ($temp_to == 'f') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="to_faren">Celcius to Farenheit</label>
                                </div>
                            </div>
                        </div> <!-- /.form-field-container -->
                        <div class="col-auto mb-3 text-center form-field-container">
                            <button type="submit" class="btn btn-dark mb-3">Convert</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer border-info bg-transparent text-center">
                    <?php
                        echo $temperature_output?:'<br>';
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>