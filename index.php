<?php include 'clock.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Talking clock</title>
</head>
<body>
    <div class="container">
        <h1>Talking Clock</h1>
        <h3>Enter Time in 24hr Format 00:00</h3>
        <h5 class="text-danger"><?php echo $error;?></h5>
        <h5 class="text-success"><?php echo $talkingClock;?></h5>


        <form class="form-inline" method="post">
            <div class="form-group mx-sm-3 mb-2">
                <label for="time" class="sr-only">Time</label>
                <input type="text" name="time" class="form-control" id="time" placeholder="00:00">
            </div>
            <button type="submit" name="button" class="btn btn-primary mb-2">Convert Time</button><br>
            <div class="col-auto">
                <button type="submit" class="btn btn-default mb-2">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>


