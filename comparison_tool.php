<?php
/**
 * Task 6: Comparison Tool
 * Develop a PHP tool named comparison_tool.php that compares two numbers and displays the larger one using the ternary operator. 
 * Create a form where the user can input two numbers. Use the ternary operator to determine the larger number and display the result.
 * Or, declare 2 variable numbers and use the ternary operator to determine the large number and display the result
 */

 $page_title = 'Comparison Tool';
 $comparison_output = '';
 if ('POST' == $_SERVER['REQUEST_METHOD']) {
     $number_one = $_POST['number_one'];
     $number_two = $_POST['number_two'];
     $comparison_output = ($number_one == $number_two) ? '<p>Both numbers are same</p>' : sprintf('<p>The largest number is %d</p>', (($number_one > $number_two) ? $number_one : $number_two));
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
                             <label for="number_one" class="form-label col-sm-4 ">First Number: </label>
                             <div class="col-sm-8">
                                 <input type="number" step="any" value="<?php echo isset($_POST['number_one']) ? $_POST['number_one'] : ''; ?>" class="form-control" id="number_one" name="number_one">
                             </div>
                         </div> <!-- /.form-field-container -->

                         <div class="row mb-3 form-field-container">
                             <label for="number_two" class="form-label col-sm-4 ">Second Number: </label>
                             <div class="col-sm-8">
                                 <input type="number" step="any" value="<?php echo isset($_POST['number_two']) ? $_POST['number_two'] : ''; ?>" class="form-control" id="number_two" name="number_two">
                             </div>
                         </div> <!-- /.form-field-container -->
 
                         <div class="col-auto mb-3 text-center form-field-container">
                             <button type="submit" class="btn btn-dark mb-3">Find Largest</button>
                         </div>
                     </form>
                 </div>
                 <div class="card-footer border-info bg-transparent text-center">
                     <?php
                         echo $comparison_output?:'<br>';
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