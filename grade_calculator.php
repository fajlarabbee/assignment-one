<?php
/**
 * Task 3: Grade Calculator
 * Develop a PHP script named grade_calculator.php that computes the average of three test scores and determines the corresponding letter grade. 
 * Create a form where the user can input three test scores. Calculate the average and display it along with the corresponding grade (A, B, C, D, F).
 * Or, declare 3 variable test scores and calculate the average and display it along with the corresponding grade (A, B, C, D, F)
 */
$page_title = "Grade Calculator";
$final_grade = '';
define('MAX', 100);
define('MIN', 0);
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $minimum_passing_mark = 33;
    $total_subject = 3;
    $subject_one = (int) $_POST['subject_one'];
    $subject_two = (int) $_POST['subject_two'];
    $subject_three = (int) $_POST['subject_three'];
    $mark_average = 0;
    $grade = '';

    if(MAX < $subject_one || MAX < $subject_two || MAX < $subject_three || MIN > $subject_one || MIN > $subject_two || MIN > $subject_three) {
        $final_grade = '<p>Wrong input! Please check your given marks and try again!</p>';
    } else if($minimum_passing_mark > $subject_one || $minimum_passing_mark > $subject_two || $minimum_passing_mark > $subject_three ) {
        $grade = 'F';
        $final_grade = "<p>Sorry, you've scored a little less to be promoted(grade is <strong>{$grade}</strong>). Better luck next time.</p>";
    } else {
        $mark_average = ($subject_one + $subject_two + $subject_three) / $total_subject;
        if($mark_average >= 80) {
            $grade = 'A';
        } else if($mark_average >= 60) {
            $grade = 'B';
        } else if($mark_average >= 50) {
            $grade = 'C';
        } else if($mark_average >= 33) {
            $grade = 'D';
        } else {
            $grade = 'F';
        }
        $final_grade = sprintf('<p>You have scored an average of <strong>\'%.2f\'</strong> with a grade of <strong>\'%s\'</strong></p>', $mark_average, $grade);
    }

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
                            <label for="subject_one" class="form-label col-sm-4 ">Subject One: </label>
                            <div class="col-sm-8">
                                <input type="number" value="<?php echo isset($_POST['subject_one']) ? $_POST['subject_one'] : ''; ?>" class="form-control" id="subject_one" name="subject_one">
                            </div>
                        </div> <!-- /.form-field-container -->

                        
                        <div class="row mb-3 form-field-container">
                            <label for="subject_two" class="form-label col-sm-4 ">Subject Two: </label>
                            <div class="col-sm-8">
                                <input type="number" value="<?php echo isset($_POST['subject_two']) ? $_POST['subject_two'] : ''; ?>" class="form-control" id="subject_two" name="subject_two">
                            </div>
                        </div> <!-- /.form-field-container -->

                        <div class="row mb-3 form-field-container">
                            <label for="subject_three" class="form-label col-sm-4 ">Subject Three: </label>
                            <div class="col-sm-8">
                                <input type="number" value="<?php echo isset($_POST['subject_three']) ? $_POST['subject_three'] : ''; ?>" class="form-control" id="subject_three" name="subject_three">
                            </div>
                        </div> <!-- /.form-field-container -->



                        <div class="col-auto mb-3 text-center form-field-container">
                            <button type="submit" class="btn btn-dark mb-3">Calculate Grade</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer border-info bg-transparent text-center">
                    <?php
                        echo $final_grade?:'<br>';
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