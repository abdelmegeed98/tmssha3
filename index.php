<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Tourism Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>
<body>
<?php include('includes/header.php');?>

<div class="carousel_div">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $sql = "SELECT * from tblslider order by rand()";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
                $index=0;
                foreach($results as $result)
                {
                    $active="";
                    if($index==0)
                        $active="active";
                ?>
                <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $index; ?>" class="<?php echo $active; ?>"></li>
                <?php
                    $index++;
                }
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            if($query->rowCount() > 0)
            {
                $index=0;
                 foreach($results as $result)
                {
                    $active="";
                    if($index==0)
                        $active="active";
                   ?>
                    <div class="item <?php echo $active; ?>">
                        <img src="admin/sliderimages/<?php echo htmlentities($result->image);?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <h1><?php echo htmlentities($result->title);?></h1>
                        </div>
                    </div>
                  <?php
                    $index++;
                }
            }

            ?>
        </div>
        <?php
            if($query->rowCount() > 0)
            {
                ?>

                    <a class="left carousel-control" href="#carouselExampleCaptions" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carouselExampleCaptions" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
            <?php
            }
            ?>
    </div>



    </div>
</div>

<!--<div class="banner">-->
<!--	<div class="container">-->
<!--		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> TMS - Tourism Management System</h1>-->
<!--	</div>-->
<!--</div>-->



<a  class="whats-app" href="https://wa.me/201118344044" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>



			</div>

<!---holiday---->
<div class="container">
	<div class="holiday">

        <form class="search-container" action="search-results.php">
            <input type="text" id="search-bar" name="search" placeholder="Search for a package ...">
            <a class="img_icon" ><img class="search-icon" src="https://endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        </form>

<!---	<h3>Package List</h3> --->

					
<?php $sql = "SELECT * from tbltourpackages order by rand() limit 4";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
			<div class="rom-btm">
				<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
					<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
				</div>
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4>  <?php echo htmlentities($result->PackageName);?></h4>
					<h6> <?php echo htmlentities($result->PackageType);?></h6>
					<p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
					<h5>USD <?php echo htmlentities($result->PackagePrice);?></h5>
					<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="view">Details</a>
				</div>
				<div class="clearfix"></div>
			</div>

<?php }} ?>
			
		
<div><a href="package-list.php" class="view">View More Packages</a></div>
</div>
			<div class="clearfix"></div>
	</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 wow fadeInRight animated temple" data-wow-delay=".5s">
            <h3 class="u-custom-font u-font-raleway u-text u-text-1">Temples And Archaeology </h3>
            <br/>
            <p class="u-text u-text-2">
                
            </p>
        </div>
        <div class="col-md-6 wow fadeInRight animated text-center " data-wow-delay=".5s">
          <img src="images/istockphoto-1074327858-612x612.jpg" style="border-radius: 50%;   width: 443px;
    height: 443px;" />
        </div>
    </div>
    </div>
<hr/>

<div class="container">
    <div class="row">
        <div class="col-md-6 wow fadeInRight animated temple" data-wow-delay=".5s">
            <h3 class="u-custom-font u-font-raleway u-text u-text-1">pyramids  </h3>
            <br/>
            <p class="u-text u-text-2">
              A pyramid is a structure whose outer surfaces are triangular and converge to a single step at the top, making the shape roughly a pyramid in the geometric sense. The base of a pyramid can be trilateral, quadrilateral, or of any polygon shape. As such, a pyramid has at least three outer triangular surfaces.

            </p>
        </div>
        <div class="col-md-6 wow fadeInRight animated text-center " data-wow-delay=".5s">
          <img src="images/pyr.jpeg" style="border-radius: 50%;   width: 443px;
    height: 443px;" />
        </div>
    </div>
    </div>
<hr/>
<!--- routes ---->
<div class="routes">
	<div class="container">
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
                <a href="#"><i class="fa fa-list"></i></a>
			</div>
			<div class="rou-rgt wow fadeInDown animated" data-wow-delay=".5s">
				<h3>200+</h3>
				<p>Enquiries</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left">
			<div class="rou-left">
				<a href="#"><i class="fa fa-user"></i></a>
			</div>
			<div class="rou-rgt">
				<h3>600+</h3>
				<p>Regestered users</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="fa fa-ticket"></i></a>
			</div>
			<div class="rou-rgt">
				<h3>900+</h3>
				<p>Booking</p>
			</div>
				<div class="clearfix"></div>
	</div>
</div>
<!--- rupes ---->
<div class="container">
	<div class="rupes">
		<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a href="offers.html"><i class="fa fa-usd"></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Get UP TO 50% OFF</h3>
				<h4><a href=package-list.php>TRAVEL SMART</a></h4>
				
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a href="offers.html"><i class="fa fa-h-square"></i></a>
			</div>
			<div class="rup-rgt">
				<h3>UP TO 30% OFF</h3>
				<h4><a href=package-list.php>ON packages ACROSS Egypt</a></h4>
				
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a href="offers.html"><i class="fa fa-mobile"></i></a>
			</div>
			<div class="rup-rgt">
				<h3>GET USD.50$ OFF</h3>
				<h4><a href="enquiry.php">Book or Call us now</a></h4>
			
			</div>
				<div class="clearfix"></div>
		</div>
	
	</div>
</div>
<!--- /rupes ---->

<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>			
<!-- //write us -->
<script>
    $(document).ready(function(){
        $(".img_icon").click(function (){
            $(".search-container").submit();
       });
    });

</script>
</body>
</html>
