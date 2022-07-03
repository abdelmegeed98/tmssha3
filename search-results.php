<?php

session_start();

error_reporting(0);

include('includes/config.php');

$search = $_GET['search'];
$lower = $_GET['min_price'];
$upper = $_GET['max_price'];
$sorted = $_GET['sorted'];
if($lower == "" && $upper == "")
{
    $lower = 0;
    $upper = 10000;
}

?>

<!DOCTYPE HTML>

<html>

<head>

    <title>TMS  | Search Results</title>

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

<!--- banner ---->

<div class="banner-3">

    <div class="container">

        <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> TMS- Search Results</h1>

    </div>

</div>

<!--- /banner ---->

<!--- rooms ---->

<div class="rooms">

    <div class="container">

            <form class="search-container" style="padding: 2em 0 0em 0" action="search-results.php">
                <input type="text" id="search-bar" name="search" placeholder="Search for a package ...">
                <a class="img_icon" ><img class="search-icon" src="https://endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
            </form>


        <br class="room-bottom">

            <h3>Search : <span class="result_text"><?php echo $search; ?></span></h3>

<div class="rom-btm">
    <div class="col-md-9">
            <?php
            $order = " order by PackagePrice asc";
            $prices = " and PackagePrice >= '$lower' and PackagePrice <= '$upper'";

            $sql = "SELECT * from tbltourpackages where active='1' and (PackageName like '%".$search."%' 
            or PackageFetures like '%".$search."%'  or PackageDetails like '%".$search."%' or PackageType like '%".$search."%'  )";

            if($lower > 0 || $upper > 0)
            {
                $sql.= $prices;
            }
            if($sorted == "true")
            {
                $sql.= $order;
            }
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

                            <h4>Package Name: <?php echo htmlentities($result->PackageName);?></h4>

                            <h6> <?php echo htmlentities($result->PackageType);?></h6>

                            <p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>

                            

                        </div>

                        <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">

                            <h5>USD <?php echo htmlentities($result->PackagePrice);?></h5>

                            <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="view">Details</a>

                        </div>

                        <div class="clearfix"></div>

                    </div>



                <?php }
            }
            else{
                ?>
                    <br/>
            <h4 style="text-align: end;"> No results found , matches your search </h4>
    <br/>    <br/>    <br/>    <br/>
            <?php
            }?>
    </div>
   <?php if($query->rowCount() > 0)
    {
        ?>

    <div class="col-md-3">
        <div class="rom-btm">
            <div class="col-md-12" style="box-shadow: 0px 0px 5px -1px rgb(0 0 0 / 37%);background: #3F84B1">
                <fieldset class="filter-price">

                    <div class="price-field">
                        <input type="range"  min="0" max="10000" value="<?php echo $lower; ?>" id="lower">
                        <input type="range" min="0" max="10000" value="<?php echo $upper; ?>" id="upper">
                    </div>
                    <div class="price-wrap">
                        <span class="price-title">Price</span>
                        <div class="price-wrap-1">
                            <input id="one">

                        </div>
                        <div class="price-wrap_line">-</div>
                        <div class="price-wrap-2">
                            <input id="two">

                        </div>

                    </div>
                    <span class="price-title" > &nbsp; Sort by price
                        <input id="sorted" <?php
                        if($sorted == "true")
                            echo "checked";
                        ?> type="checkbox" style="transform: scale(1.2);" />
                    </span>

                    <br/>
                    <button style="width: 100%;margin:10px 0 10px 0;" class="btn btn-success filter pull-right">Apply Filter</button>
                    <br/>  <br/>
                </fieldset>
            </div>
        </div>
    </div>
</div>
        <?php
        }
        ?>



        </div>

    </div>
<br/>               <br/>
</div>

<!--- /rooms ---->



<!--- /footer-top ---->

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

    var lowerSlider = document.querySelector('#lower');
    var  upperSlider = document.querySelector('#upper');

    document.querySelector('#two').value=upperSlider.value;
    document.querySelector('#one').value=lowerSlider.value;

    var  lowerVal = parseInt(lowerSlider.value);
    var upperVal = parseInt(upperSlider.value);

    upperSlider.oninput = function () {
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);

        if (upperVal < lowerVal + 4) {
            lowerSlider.value = upperVal - 4;
            if (lowerVal == lowerSlider.min) {
                upperSlider.value = 4;
            }
        }
        document.querySelector('#two').value=this.value
    };

    lowerSlider.oninput = function () {
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);
        if (lowerVal > upperVal - 4) {
            upperSlider.value = lowerVal + 4;
            if (upperVal == upperSlider.max) {
                lowerSlider.value = parseInt(upperSlider.max) - 4;
            }
        }
        document.querySelector('#one').value=this.value
    };

    $(document).ready(function(){
        $(".img_icon").click(function (){
            $(".search-container").submit();
        });
        $(".filter").click(function (){
            let sorted = $('#sorted' ).is(":checked");
           location.href="search-results.php"+"?search="+"<?php echo $search; ?>"+"&min_price="+$("#lower").val()+"&max_price="+$("#upper").val()+"&sorted="+sorted;
        });
    });

</script>
</body>

</html>

