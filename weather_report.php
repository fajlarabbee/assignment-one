<?php
/**
 * Task 5: Weather Report
 * Create a PHP script named weather_report.php that provides weather information based on temperature. Use a variable to store the temperature. Depending on the temperature range, display messages like "It's freezing!", "It's cool.", or "It's warm."
 */
$page_title = 'Weather Report';
$weather_report = '';
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $temperature_input = (float) $_POST['temperature'];
    $temp_in = $_POST['temp_in'] ?: 'c';
    $temperature_in_celcius = $temperature_input;
    if ('c' != $temp_in) {
        $temperature_in_celcius = ($temperature_input - 32) * (5/9);
    }
    
    if($temperature_in_celcius <= 10) {
        $temperature_mood = 'freezing';
    } else if($temperature_in_celcius <= 22) {
        $temperature_mood = 'cool';
    } else {
        $temperature_mood = 'warm';
    }
    $weather_report = sprintf('<h5>It\'s %s</h5>', $temperature_mood);
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
                                <input type="number" value="<?php echo isset($_POST['temperature']) ? $_POST['temperature'] : ''; ?>" class="form-control" id="temperature" name="temperature">
                            </div>
                        </div> <!-- /.form-field-container -->
                        <div class="row mb-3 form-field-container">
                            <label for="temp_in" class="form-label col-sm-4">Temperature In: </label>
                            <div class="col-sm-8">
                                <select class="form-select" name="temp_in">
                                    <option>Temperature In</option>
                                    <option value="c" <?php echo (isset($_POST['temp_in']) && $_POST['temp_in'] == 'c') ? 'selected' : ''; ?>>Celcius</option>
                                    <option value="f" <?php echo (isset($_POST['temp_in']) && $_POST['temp_in'] == 'f') ? 'selected' : ''; ?>>Farenheit</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-auto mb-3 text-center form-field-container">
                            <button type="submit" class="btn btn-dark mb-3">Check Weather</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer border-info bg-transparent text-center">
                    <?php
                        echo $weather_report?:'<br>';
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