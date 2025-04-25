<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Submitted</title>
</head>

<body style="background-color: beige;">
    <?php

    // Definition of the redisplayForm() function
    function redisplayForm($firstName, $lastName)
    {
        ?>
        <h2 style="text-align: center; color:green;">Learning Tree Scholarship Form</h2>
        <form action="process_scholarship.php" name="scholarship" method="POST" style="padding-left: 30px; background-color: beige;">
            <label for="first">First Name:</label>
            <input type="text" name="fName" id="first" autofocus value= "<?php echo $firstName ?>" />
            <br>
            <br>
            <label for="last">Last Name:</label>
            <input type="text" name="lName" id="last" value= "<?php echo $lastName ?>" />
            <br>
            <br>
            <label for="email">Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="email" name="email" id="email">
            <br>
            <br>
            <label for="essay">Essay: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <textarea cols="60" rows="20" name="essay" id="essay" style="font-family: Verdana, Geneva, Tahoma, sans-serif;"></textarea>
            <br>
            <br>
            <p><a href="">Reset Application</a>
                <!--<input type="reset" value="Clear Form">-->
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="submit" value="Apply Today!"style= "background-color: green; border-radius: 4px; color:white; padding-top: 4px; padding-bottom: 3px"></p>
        </form>
        <?php
    }

    // Definition fo the displayRequired() function
    function displayRequired($fieldName)
    {
        echo "<p style= 'color: red;'>The field \"$fieldName\" is required!</p>";
    } //end of function

    //Defintion of the validateInput() function
    function validateInput($data, $fieldName)
    {
        global $errorCount;
        if (empty($data)) {
            # this is when the form field is empty
            displayRequired($fieldName);
            ++$errorCount;
            $retval = "";
        } else {
            # clean up the input if field is NOT empty
            $retval = trim($data);
            $retval = stripslashes($retval);
        }
        return $retval;
    }
    $errorCount = 0;
    $firstName = validateInput($_POST["fName"], "First Name");
    $lastName = validateInput($_POST["lName"], "Last Name");
    $essay = $_POST["essay"];

    if ($errorCount > 0) {
        # data incomplete notification
        echo "Your application is not complete, please enter any missing information below and press the<em>Apply Today!</em> button. <br>";
        redisplayForm($firstName, $lastName);
        
    } else {
        # confirmation for valid data input
        echo "Thank you for submitting the Learning Tree Scholarship application, $firstName $lastName.";
    }
    

    ?>
</body>

</html>