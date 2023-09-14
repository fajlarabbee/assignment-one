<?php
/**
 * Task 4: Even or Odd Checker
 * Build a PHP program called even_odd_checker.php that checks whether a given number is even or odd. Provide an input field where the user can enter a number. Display a message indicating whether the number is even or odd.
 */
$page_title = "Even or Odd Checker";
$even_odd = '';
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $number_input = (int) $_POST['number_input'];
    $even_odd = sprintf('The given number(%d) is %s', $number_input, ($number_input % 2 == 0) ? 'even': 'odd');
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
                            <label for="number_input" class="form-label col-sm-4 ">Number to check: </label>
                            <div class="col-sm-8">
                                <input type="number" value="<?php echo isset($_POST['number_input']) ? $_POST['number_input'] : ''; ?>" class="form-control" id="number_input" name="number_input">
                            </div>
                        </div> <!-- /.form-field-container -->

                        <div class="col-auto mb-3 text-center form-field-container">
                            <button type="submit" class="btn btn-dark mb-3">Check</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer border-info bg-transparent text-center">
                    <?php
                        echo $even_odd?:'<br>';
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