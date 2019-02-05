<?php
$dbc = mysqli_connect('localhost','root','','hometask');
if(isset($_POST['submit']) && isset($_POST['checkbox'])){
  $username = trim($_POST['exampleInputEmail']);
  $password1 = trim($_POST['exampleInputPassword1']);
  $password2 = trim($_POST['exampleInputPassword2']);
  if(!empty($username) && !empty($password1) && !empty($password2) &&($password1 == $password2)){
    $query = "SELECT * FROM `signup` WHERE username = '$username'";
    $data = mysqli_query($dbc,$query);
    if(mysqli_num_rows($data) == 0){
      $query = "INSERT INTO `signup` (username,password) VALUES ('$username','$password2')";
      mysqli_query($dbc,$query);
      header("location:index.php");
      mysqli_close($dbc);
      exit();
    }
    else{
     echo "Error";
    }
  }
}
?>
<?php
$dbc = mysqli_connect('localhost','root','','hometask');
if(isset($_POST['submit2'])){
  $username = $_POST['exampleInputEmail'];
  $password = $_POST['exampleInputPassword1'];
  $query = "SELECT* FROM signup WHERE username ='$username' AND password = '$password'";
  $data = mysqli_query($dbc,$query);
  $result = mysqli_fetch_array($data);
  if($result){
    
    header("location:index.php");

  }else{
    

  }
}
?>


<?php
session_start();
$product_ids = array();
if (filter_input(INPUT_POST, 'Add')) {
    if (isset($_SESSION['shopping_cart'])) {
        $count = count($_SESSION['shopping_cart']);
        $product_ids = array_column($_SESSION['shopping_cart'], 'id');
        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {
            $_SESSION['shopping_cart'][$count] =  array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            ); 
        } else { 
            for ($i=0; $i < count($product_ids); $i++) { 
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
    }
    else {  
        $_SESSION['shopping_cart'][0] =  array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}
if (filter_input(INPUT_GET, 'action') == 'delete') {
        foreach($_SESSION['shopping_cart'] as $key => $product){
            if ($product['id'] == filter_input(INPUT_GET,'id')) {
                unset($_SESSION['shopping_cart'][$key]);
            }
        }
        $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Online shop</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    html,
    body,
    header,
    .carousel{
      height: 60vh;
    }
    @media (max-width: 740px){
      html,
      body,
      header,
      .carousel{
        height: 100vh;
      }
    }
    @media (min-width: 800px) and (max-width: 850px){
      html,
      body,
      header,
      .carousel{
        height: 100vh;
      }
    }
  </style>
</head>

<body id="topnav">

  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">
      <a href="index.php" class="navbar-brand waves-effect">
        <strong class="black-text">
          <i class="fas fa-laptop"></i>
          Laptop Shop
        </strong>
      </a>
      <button class="navbar-toggler" type="button"
      data-toggle="collapse" data-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a href="#" class="nav-link waves-effect">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link waves-effect">Product</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link waves-effect">About us</a>
          </li>
          <li class="nav-item"> 
            <a href="#" class="nav-link waves-effect">Blog</a>
          </li>
        </ul>
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="#orders" class="nav-link waves-effect">
              <i class="fa fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block">Cart</span>
              </form>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link border border-light rounded waves-effect">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link waves-effect" data-toggle="modal" data-target="#exampleModalLong">Registration</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link waves-effect" data-toggle="modal" data-target="#exampleModalLong2">Log in</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLongTitle">Registration</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              
                <div class="form-group">
                  <label for="exampleInputEmail">Email address</label>
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail" aria-describdby="emailHelp" placeholder="Email" name="exampleInputEmail" required>
                  <small class="form-text text-muted" id="emailHelp">Enter your email</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword" placeholder="Password" name="exampleInputPassword1" required>
                  <small class="form-text text-muted" id="passwordHelp">Enter your password</small>
                </div>
                 <div class="form-group">
                  <label for="exampleInputPassword">Confirm Password</label>
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword" placeholder="Password" name="exampleInputPassword2" required>
                  <small class="form-text text-muted" id="passwordHelp">Enter your confirm password</small>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="checkbox" required>
                    Remember Me
                  </label>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Sign In</button>
            
            </div>
            ...
          </div>
            
        </div>
    </div>
    </div> 
  </form>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLongTitle">Log In</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              
                <div class="form-group">
                  <label for="exampleInputEmail">Email address</label>
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail" aria-describdby="emailHelp" placeholder="Email" name="exampleInputEmail" required>
                  <small class="form-text text-muted" id="emailHelp">Enter your email</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword" placeholder="Password" name="exampleInputPassword1" required>
                  <small class="form-text text-muted" id="passwordHelp">Enter your password</small>
                </div>
                <button class="btn btn-primary" type="submit" name="submit2">Log In</button>
            
            </div>
            ...
          </div>
            
        </div>
    </div>
    </div> 
  </form>
   <div id="carousel-ex" class="carousel slide carousel-fade pt-4" data-ride="carousel">
    <ol class="carousel-indicators">
      <li class="active" data-target="#carousel-ex" data-slide-to="0"></li>
      <li data-target="#carousel-ex" data-slide-to="1"></li>
      <li data-target="#carousel-ex" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <div class="view" style="background-image: url('https://images.pexels.com/photos/1124066/pexels-photo-1124066.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');background-repeat: no-repeat;
        background-size: cover;">
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Laptop Shop</strong>
              </h1>
              <p>
                <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, ea!</strong>
              </p>
              <p class="mb-4 d-none d-md-block">
                <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aperiam soluta explicabo nesciunt, earum quo.</strong>
              </p>
              <a href="#" class="btn btn-outline-white btn-lg">
                Lorem ipsum dolor. <i class="fa fa-graduation-cap ml-2"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item"> 
        <div class="view" style="background-image: url('https://images.pexels.com/photos/705164/computer-laptop-work-place-camera-705164.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');background-repeat: no-repeat;
        background-size: cover;">
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Laptop Shop</strong>
              </h1>
              <p>
                <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, ea!</strong>
              </p>
              <p class="mb-4 d-none d-md-block">
                <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aperiam soluta explicabo nesciunt, earum quo.</strong>
              </p>
              <a href="#" class="btn btn-outline-white btn-lg">
                Lorem ipsum dolor. <i class="fa fa-graduation-cap ml-2"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="view" style="background-image: url('https://images.pexels.com/photos/1449082/pexels-photo-1449082.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');background-repeat: no-repeat;
        background-size: cover;">
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Laptop Shop</strong>
              </h1>
              <p>
                <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, ea!</strong>
              </p>
              <p class="mb-4 d-none d-md-block">
                <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aperiam soluta explicabo nesciunt, earum quo.</strong>
              </p>
              <a href="#" class="btn btn-outline-white btn-lg">
                Lorem ipsum dolor. <i class="fa fa-graduation-cap ml-2"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <a href="#carousel-ex" class="carousel-control-prev" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a href="#carousel-ex" class="carousel-control-next" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
  </div>

  <main>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light white lighten-3 mt-3 mb-5">
        <span class="navbar-brand">Categories:</span>

        <button class="navbar-toggler" type="button"
        data-toggle="collapse" data-target="#nextNav"
        aria-controls="nextNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nextNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a href="#" class="nav-link">All</a>
            </li>
            <li class="nav-item active">
              <a href="#" class="nav-link">Laptop</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Devices</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Programms</a>
            </li>
          </ul>

          <form class="form-inline">
            <div class="md-form my-0">
              <input type="text" class="form-control mr-sm-2" placeholder="Search"
              aria-label="Search">
            </div>
          </form>
        </div>
      </nav>
      <section class="text-center mb-4">
        <div class="row wow fadeIn">
          <?php
            $connect=mysqli_connect('localhost','root','','cart');
            $query='SELECT * FROM `product` ORDER by id ASC';
            $result=mysqli_query($connect,$query);

            if (mysqli_num_rows($result)>0) :
              while ($product=mysqli_fetch_assoc($result)) :
          ?>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
              <div class="view overlay">
                <img class="card-img-top" src="<?php echo $product['image'];?>" alt="Laptop">
                <a href="#">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>

              <div class="card-body text-center">
                
                <a href="#" class="grey-text">
                  <h5>Laptop</h5>
                </a>

                <h5>
                  <strong>
                    <a href="#" class="dark-grey-text"><?php echo $product['name'];?> <span class="badge badge-pill danger-color">NEW</span></a>
                  </strong>
                </h5>
                <h4 class="font-weight-bold blue-text">
                  <strong><?php echo $product['price']; ?>$</strong>
                </h4>
                <form action="index.php?action=add&id=<?php echo $product['id']?>" method="post">
                  <input type="text" name="quantity" value="1" size="3" class="product-quantity">
                  <input type="submit" name="Add" value="Add to cart" class="btnAddAction btn btn-info">
                  <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                  <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                </form>
              </div>
            </div>
          </div>
          <?php
                endwhile;
              endif;
          ?>
        </div>
        <div class="table-responsive" id="orders">
                <table class="table">
                    <tr><th colspan="5"><h3>Order Details</h3></th></tr>
                    <tr>
                        <th width="40%">Product Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Total</th>
                        <th width="5%">Action</th>
                    </tr>

                    <?php 
                        if (!empty($_SESSION['shopping_cart'])):
                            $total = 0;
                            foreach ($_SESSION['shopping_cart'] as $key => $product):
                                ?>
                                <tr>
                                    <td><?php echo $product['name']; ?></td>
                                    <td><?php echo $product['quantity']; ?></td>
                                    <td>$<?php echo $product['price']; ?></td>
                                    <td>$<?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
                                    <td>
                                        <a href="index.php?action=delete&id=<?php echo $product['id']; ?>">
                                            <div class="btn-danger">Remove</div>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $total = $total + ($product['quantity'] * $product['price']);
                            endforeach;
                            ?>
                            <tr>
                                <td colspan="3" align="right">Total</td>
                                <td align="right">$ <?php echo number_format($total, 2); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <?php 
                                        if (isset($_SESSION['shopping_cart'])):
                                            if (count($_SESSION['shopping_cart']) > 0 ):
                                    ?>
                                            
                                    <?php
                                            endif;
                                        endif;
                                    ?>
                                </td>
                            
                            </tr>

                            <?php
                        endif;
                    ?>
                   


                </table>
            </div>
      </section>

      <nav class="d-flex justify-content-center wow fadeIn">
        <ul class="pagination pg-blue">
          <li class="page-item disabled">
            <a href="#" class="page-link" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item active">
            <a href="#" class="page-link" aria-label="Previous">
              <span aria-hidden="true">1</span>
            </a>
          </li>
          <li class="page-item">
            <a href="#" class="page-link" aria-label="Previous">
              <span aria-hidden="true">2</span>
            </a>
          </li>
          <li class="page-item">
            <a href="#" class="page-link" aria-label="Previous">
              <span aria-hidden="true">3</span>
            </a>
          </li>
          <li class="page-item">
            <a href="#" class="page-link" aria-label="Previous">
              <span aria-hidden="true">4</span>
            </a>
          </li>
          <li class="page-item">
            <a href="#" class="page-link" aria-label="Previous">
              <span aria-hidden="true">5</span>
            </a>
          </li>
          <li class="page-item">
            <a href="#" class="page-link" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </main>

  <footer class="page-footer blue accent-4 text-center font-small mt-4 wow fadeIn">
    <div class="pt-4 border-b">
      <a href="#" role="button" class="btn btn-outline-white">Laptop Shop 
      <i class="fa fa-graduation-cap ml-2"></i></a>

      <a href="#" role="button" class="btn btn-outline-white">Online Shop 
      <i class="fa fa-graduation-cap ml-2"></i></a>
    </div>
    <hr class="my-4">
    <div class="pb-4">
      <a href="#">
        <i class="fa fa-facebook mr-3"></i>
      </a>
      <a href="#">
        <i class="fa fa-instagram mr-3"></i>
      </a>
      <a href="#">
        <i class="fa fa-twitter mr-3"></i>
      </a>
      <a href="#">
        <i class="fa fa-google-plus mr-3"></i>
      </a>
      <a href="#">
        <i class="fa fa-pinterest mr-3"></i>
      </a>
    </div>
    <div class="footer-copyright py-3">
      Laptop Shop
    </div>
  </footer>

  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/mdb.js"></script>
  <script>
    
    new WOW().init();
    
  </script>
</body>

</html>