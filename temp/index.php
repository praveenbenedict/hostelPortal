<!DOCTYPE html>
<html>
    <head>
        <title>Hostel Portal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="script/script.js"></script>
    </head>

    <body>
        <div id="selection" class="container-fluid">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h1>St.Joseph's College of Engineering</h1>
                <h2>Hostel Portal</h2>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form method="post" class="form-block" action="">
                    <div class="imgcontainer">
                        <img src="images/avatar.png" class="avatar">
                    </div>

                    <div class="forms">
                        <label><h3><b>Username : </b></h3></label>
                        <input type="text" placeholder="Enter Username" name="username" required>
                        <br>
                        <label><h3><b>Password : </b></h3></label>
                        <input type="password" placeholder="Enter Password" name="password" required>
                        <br>
                        <?php echo $error; ?>
                        <br>
                        <button type="submit">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>