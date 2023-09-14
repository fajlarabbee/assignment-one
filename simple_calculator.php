<?php
/**
 * Task 7: Simple Calculator
 * Build a PHP calculator named simple_calculator.php that performs basic arithmetic operations. Provide input fields for two numbers and a dropdown to select the operation (addition, subtraction, multiplication, division). Display the result of the chosen operation.
 * Complete these tasks by writing PHP code that fulfills the requirements of each task. Feel free to enhance the tasks or add extra features if you'd like. 
 * This assignment will help you practice your PHP skills and apply the concepts you've learned. Good luck!
 */
$page_title = 'Simple Calculator';
$calculation_output = '';
$math_operation = '';
 if ('POST' == $_SERVER['REQUEST_METHOD']) {
     $operand_one = $_POST['operand_one'];
     $operand_two = $_POST['operand_two'];

     $math_operation = $_POST['math_operation'];
     $math_result = 0;
     switch($math_operation) {
        case 'summation': 
            $math_result = $operand_one + $operand_two;
            break;
        case 'subtraction': 
            $math_result = $operand_one - $operand_two;
            break;
        case 'multiplication': 
            $math_result = $operand_one * $operand_two;
            break;
        case 'division': 
            $math_result = ($operand_two == 0) ? 'Not possible' : ($operand_one / $operand_two);
            break;
        default:
            $calculation_output = '<h5>Please select the math operation to proceed.</h5>';
            break;   
     }
     $calculation_output = $calculation_output?: sprintf('<h5>The %s of %s and %s is %s</h5>', $math_operation, $operand_one, $operand_two, $math_result);
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
                             <label for="operand_one" class="form-label col-sm-4 ">First Number: </label>
                             <div class="col-sm-8">
                                 <input type="number" step="any" value="<?php echo isset($_POST['operand_one']) ? $_POST['operand_one'] : ''; ?>" class="form-control" id="operand_one" name="operand_one">
                             </div>
                         </div> <!-- /.form-field-container -->

                         <div class="row mb-3 form-field-container">
                             <label for="operand_two" class="form-label col-sm-4 ">Second Number: </label>
                             <div class="col-sm-8">
                                 <input type="number" step="any" value="<?php echo isset($_POST['operand_two']) ? $_POST['operand_two'] : ''; ?>" class="form-control" id="operand_two" name="operand_two">
                             </div>
                         </div> <!-- /.form-field-container -->
                         <div class="row mb-3 form-field-container">
                             <label for="math_operation" class="form-label col-sm-4">Math Operation: </label>
                             <div class="col-sm-8">
                                 <select class="form-select" name="math_operation">
                                     <option>Select Operation</option>
                                     <option value="summation" <?php echo ($math_operation == 'summation') ? 'selected' : ''; ?>>Addition</option>
                                     <option value="subtraction" <?php echo ($math_operation == 'subtraction') ? 'selected' : ''; ?>>Subtraction</option>
                                     <option value="multiplication" <?php echo ($math_operation == 'multiplication') ? 'selected' : ''; ?>>Multiplication</option>
                                     <option value="division" <?php echo ($math_operation == 'division') ? 'selected' : ''; ?>>Division</option>
                                 </select>
                             </div>
                         </div>
 
                         <div class="col-auto mb-3 text-center form-field-container">
                             <button type="submit" class="btn btn-dark mb-3">Calculate</button>
                         </div>
                     </form>
                 </div>
                 <div class="card-footer border-info bg-transparent text-center">
                     <?php
                         echo $calculation_output?:'<br>';
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