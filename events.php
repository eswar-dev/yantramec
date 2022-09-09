<?php
session_start();

$_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
				"https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
				$_SERVER['REQUEST_URI'];


$auth = isset($_SESSION['access_token']) || isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email']);
require_once "components/database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sarvagnya - 2022</title>

    <?php require_once 'components/links.php'; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        .title{
            font-family: "Ubuntu", sans-serif !important;
        }
        .card
        {
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }
    </style>
</head>

<body>

    <?php require_once 'components/navbar.php'; ?>


<br><br><br><br>

<div class="text-center mx-auto">
    <h2 class="title">Workshops</h2>
</div>
<div class="container">
<?php
            $query = "SELECT * FROM events where type='workshop'";
            $query_run = mysqli_query($connection,$query);

            ?>
                                    <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>

              <div class="row">
<div class="col-md-3">
           
                    
                    <div class="card">
                        <img class="card-img-top pt-2" src="<?php echo $row['image']; ?>" alt="Card image cap">
                        <div class="card-body title">
                            <h3><?php echo $row['title'] ?></h3>
                            <p><?php echo $row['description']; ?></p>
                            <p><b>Duration : </b><?php echo $row['duration']; ?></p>
                            <p><b>Amount : </b><?php echo $row['price']; ?></p>
                            <div class="text-center mx-auto mb-2 d-flex justify-content-between">
                                

                                    <a href="" class="btn btn-info">View More</a>
                                    <?php
                                    if($auth)
                                    {
                                        $event_id = $row['id'];
                                        $user_id = $_SESSION['id'];
                                        $query1 = "SELECT * from transactions WHERE user_id='$user_id' and event_id = '$event_id' ";
                                        $query_run1 = mysqli_query($connection,$query1);
                                        $count = mysqli_num_rows($query_run1)
                                        ?>
                                        
                                        <form action="razorpay/pay.php" method="POST">
                                            <input class="d-none" type="text" value="<?php echo $row['id']; ?>" name="event_id">
                                            <input class="d-none" type="text" value="<?php echo $_SESSION['id']; ?>" name="user_id">
                                            <input class="d-none" type="text" value="<?php echo $row['price']; ?>" name="amount">
                                            <?php
                                            if($count > 0)
                                            {
                                                echo '<a class="btn btn-success pl-2">Registered</a>';
                                            }
                                            else if($count == 0)
                                            {
                                                echo '<button type="submit" class="btn btn-success">Register</button>';
                                            }
                                            ?>
                                        </form>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <a href="login-page" class="btn btn-success">Register</a>
                                    <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
                <?php
                }
                }
                else
                {
                    echo "<h5 class='alert alert-danger'>No workshops Found</h5>";
                }
                ?>
<hr>

            </div>






<div class="text-center mx-auto">
    <h2 class="title">Presentations</h2>
</div>
<?php
            $query = "SELECT * FROM events where type='presentation'";
            $query_run = mysqli_query($connection,$query);

            ?>
                                    <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>

                <div class="container">
                    <div class="card col-md-3">
                        <img class="card-img-top pt-2" src="<?php echo $row['image']; ?>" alt="Card image cap">
                        <div class="card-body title">
                            <h3><?php echo $row['title'] ?></h3>
                            <p><?php echo $row['description']; ?></p>
                            <p><b>Duration : </b><?php echo $row['duration']; ?></p>
                            <p><b>Amount : </b><?php echo $row['price']; ?></p>
                            <div class="text-center mx-auto mb-2 d-flex justify-content-between">
                                

                                    <a href="" class="btn btn-info">View More</a>
                                    <?php
                                    if($auth)
                                    {
                                        $event_id = $row['id'];
                                        $user_id = $_SESSION['id'];
                                        $query1 = "SELECT * from transactions WHERE user_id='$user_id' and event_id = '$event_id' ";
                                        $query_run1 = mysqli_query($connection,$query1);
                                        $count = mysqli_num_rows($query_run1)
                                        ?>
                                        
                                        <form action="razorpay/pay.php" method="POST">
                                            <input class="d-none" type="text" value="<?php echo $row['id']; ?>" name="event_id">
                                            <input class="d-none" type="text" value="<?php echo $_SESSION['id']; ?>" name="user_id">
                                            <input class="d-none" type="text" value="<?php echo $row['price']; ?>" name="amount">
                                            <?php
                                            if($count > 0)
                                            {
                                                echo '<a class="btn btn-success pl-2">Registered</a>';
                                            }
                                            else if($count == 0)
                                            {
                                                echo '<button type="submit" class="btn btn-success">Register</button>';
                                            }
                                            ?>
                                        </form>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <a href="login-page" class="btn btn-success">Register</a>
                                    <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                }
                else
                {
                    echo "<h5 class='alert alert-danger'>No workshops Found</h5>";
                }
                ?>
<hr>











<div class="text-center mx-auto">
    <h2 class="title">Technical Events</h2>
</div>
<div class="container">
    <div class="row">
<?php
            $query = "SELECT * FROM events where type='technical'";
            $query_run = mysqli_query($connection,$query);

            ?>
                                    <?php

                if(mysqli_num_rows($query_run) > 0)
                {
                while($row = mysqli_fetch_assoc($query_run))
                {

                ?>

                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top pt-2" src="<?php echo $row['image']; ?>" alt="Card image cap">
                        <div class="card-body title">
                            <h3><?php echo $row['title'] ?></h3>
                            <p><?php echo $row['description']; ?></p>
                            <p><b>Duration : </b><?php echo $row['duration']; ?></p>
                            <p><b>Amount : </b><?php echo $row['price']; ?></p>
                            <div class="text-center mx-auto mb-2 d-flex justify-content-between">
                                

                                    <a href="" class="btn btn-info">View More</a>
                                    <?php
                                    if($auth)
                                    {
                                        $event_id = $row['id'];
                                        $user_id = $_SESSION['id'];
                                        $query1 = "SELECT * from transactions WHERE user_id='$user_id' and event_id = '$event_id' ";
                                        $query_run1 = mysqli_query($connection,$query1);
                                        $count = mysqli_num_rows($query_run1)
                                        ?>
                                        
                                        <form action="razorpay/pay.php" method="POST">
                                            <input class="d-none" type="text" value="<?php echo $row['id']; ?>" name="event_id">
                                            <input class="d-none" type="text" value="<?php echo $_SESSION['id']; ?>" name="user_id">
                                            <input class="d-none" type="text" value="<?php echo $row['price']; ?>" name="amount">
                                            <?php
                                            if($count > 0)
                                            {
                                                echo '<a class="btn btn-success pl-2">Registered</a>';
                                            }
                                            else if($count == 0)
                                            {
                                                echo '<button type="submit" class="btn btn-success">Register</button>';
                                            }
                                            ?>
                                        </form>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <a href="login-page" class="btn btn-success">Register</a>
                                    <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                }
                else
                {
                    echo "<h5 class='alert alert-danger'>No workshops Found</h5>";
                }
                ?>
            </div>
            </div>
<hr>

    <?php require_once 'components/footer.php'; ?>
    <!-------- Mobile nav-------->

    <?php require_once 'components/mobile-nav.php'; ?>


</body>

</html>
