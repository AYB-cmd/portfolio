<?php
session_start();
$username = $_SESSION['username'];
if (empty($username)) {
    header("location:login.html");
}
?>

<?php

?>
<!--custom style-->
<?php include "inc/head.php"; ?>
<style type="text/css">
    * {
        margin: 0px;
        padding: 0px;
    }

    .header {
        background: #0563bb;

    }

    .header h1 {
        text-align: center;
        color: white;
        margin: 0px;
        padding: 25px 0px;
        font-size: 40px;

    }

    .user-box {
        text-align: center;
    }

    .user-detail {
        width: 30%;
        min-height: 100px;
        display: inline-block;
        background: #e8e8e8;
        margin: 50px;
        padding: 10px;
    }

    .user-detail p {
        font-size: 25px;
    }

    .user-detail h3 {
        font-size: 30px;
        line-height: 100px;
        color: #ff8100;
    }

    .header a {
        float: right;
        position: relative;
        right: 60px;
        top: 10px;
        background: white;
        text-decoration: none;
        padding: 5px 20px;
        font-size: 25px;
        color: black;
        border-radius: 10px;

    }
</style>

<body>
<?php require_once('process.php')?>
<?php 
if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?> mb-0">
        <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message'])
        ?>
</div>
<?php endif?>
    <div class="header">
        <h1>Welcome <?php echo $username ?> <a href="logout.php">Logout</a></h1>
    </div>

    <section id="portfolio" class="portfolio section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Portfolio</h2>
                <p>
                    Many ideas grow better when transplanted into another mind than
                    the one where they sprang up.
                </p>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">





                <?php
                include_once("connection.php");
                $sql = "SELECT * FROM `projects`;";
                $result = mysqli_query($con, $sql);
                // $resultChek = mysqli_num_rows($result);
                
                    while ($row = mysqli_fetch_assoc($result)):



                        echo  '<div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="' . $row['image'] . '" class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>' . $row['title'] . '</h4>
                            <p>' . $row['type'] . '</p>
                            <div class="portfolio-links">
                                <a href="' . $row['link'] . '" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Portfolio Details"><i class="bx bx-link"></i></a>
                                <a href="process.php?delete='.$row['id'] .'"    ><i class="bx bx-eraser"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';
                    endwhile;
                ?>




            </div>
        </div>
    </section>
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>project</h2>
            </div>

            <div class=" mt-1">
                <div class="col-lg-12">
                    <div class="info">




                        <div class="col-lg-12 mt-5 mt-lg-0">
                            <form action="process.php" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <input type="file" name="image" class="form-control" placeholder="upload an image" data-rule="please uplaod an image" />
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="title" placeholder="title of the project" data-msg="Please enter a title" />
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="type" placeholder="type of the project" data-rule="minlen:4" data-msg="Please enter type of the project" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="link" data-msg="Please past the link of the project here" placeholder="link of the project"></textarea>
                                    <div class="validate"></div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="save">SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </section>

   


    <?php include "inc/script.php" ?>