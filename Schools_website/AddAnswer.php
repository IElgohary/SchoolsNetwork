<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Answer Question</title>
    <?php
    include "header.php";
    ?>
</head>
<body>

</br>
</br>
</br>
</br>
<div class='container'>

<div class='row'>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-0"> </div>
<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'  >
<form align='center' action="AnswerQuestion.php" method="post">
    <fieldset>
        <legend>Answer Question</legend>
        <div class='input-group input-group-lg'>
            <span class='input-group-addon'>Answer: </span>
            <input name="answer" size="100" type="text" class='form-control' required="required" placeholder="Enter your answer here" />
        </div>
    </fieldset>
    </br>
    </br>
    <button class='btn btn-info btn-lg ' type="submit"> Answer<span class='glyphicon glyphicon-check'></span></button>
</form></div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-0"> </div></div></div>

</body>
</html>
<script src="js/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>