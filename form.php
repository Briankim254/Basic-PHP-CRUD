

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
</head>
<body>
<?php require_once 'connect.php';
$update=false;
?>
<?php
if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg-type']?>">
        <?php
        echo$_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>

<?php endif; ?>
<div class="container">
    <?php
    $mysqli = new mysqli('localhost','root','','example');
    $result = $mysqli->query("SELECT * FROM `personalinfo`;");
    /*pre_r($result);
    pre_r($result->fetch_assoc());

    function pre_r($array){
        echo'<pre>';
        print_r($array);
        echo '</pre>';
    }*/
    ?>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone</th>
                <th colspan="2">Actions</th>
            </tr>
            </thead>
            <?php
            while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td> <?php echo $row['firstName'] ?></td>
                    <td> <?php echo $row['lastName'] ?></td>
                    <td> <?php echo $row['gender'] ?></td>
                    <td> <?php echo $row['email'] ?></td>
                    <td> <?php echo $row['password'] ?></td>
                    <td> <?php echo $row['number'] ?></td>
                    <td>
                        <a href="form.php?edit=<?php echo $row['id']; ?>"
                           class="btn btn-info">Edit</a>
                        <a href="connect.php?delete=<?php echo $row['id'];?>"
                           class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile;?>
        </table>
    </div>
</div>
<div class="container">
    <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h1>Personal Details Form</h1>
            </div>
            <div class="panel-body">
                <form action="connect.php" method="post">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName"  placeholder="Enter your firstname" />
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName"  placeholder="Enter your lastname"/>
                    </div>
                    <div class="form-group">
                        <label for=>Gender</label>
                        <div>
                            <label for="male" class="radio-inline">
                                <input type="radio" name="gender" value="male" id="male" />Male
                            </label>
                            <label for="female" class="radio-inline">
                                <input type="radio" name="gender" value="female" id="female"/>Female
                            </label>
                            <label class="radio-inline" for="others"
                            ><input id="others" name="gender" type="radio" value="others"/>Others
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"  placeholder="Enter your email"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"  placeholder="Enter your password"/>
                    </div>
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input type="number" class="form-control" id="number" name="number"  placeholder="Enter your number"/>
                    </div>
                    <input type="submit"  name="submit" class="btn btn-info"/>
                    <input type="hidden"  name="id" />
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>