<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/nav.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <a href=""><strong class="bfname">PDF</strong> <strong>AGILE</strong></a>
        </div>
        <div class="main-search">
            <div class="search">
                <form action="search.php?q" class="search-form">
                    <input type="text" name="q" id="search" placeholder="Search for books">
                    <button type="submit">
                        <i class="fa fa-search search-button" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="menu">
            <?php
            if(isset($_SESSION['username'])){
                $id = $_SESSION['id'];
  
                ?>
                <ul class="navbar-nav user_dashboard">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php
                        echo $_SESSION['username'];
                        ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">My Favorite <i class="fa fa-heart"
                                    aria-hidden="true"></i></a></li>
                        <li><a class="dropdown-item" href="user_upload.php">Upload <i class="fa fa-upload" aria-hidden="true"></i></a>
                        </li>
                        <li><a class="dropdown-item" href="account_setting.php">Account Setting <i class="fa fa-cog"
                                    aria-hidden="true"></i></a></li>
                        <!-- <li><a class="dropdown-item" href="#">Go Premium <i class="fa fa-check-circle-o"
                                    aria-hidden="true"></i></a></li>
                        <li> -->
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="_partial/_logout.php">Logout <i class="fa fa-sign-out"
                                    aria-hidden="true"></i></a></li>
                    </ul>
                </li>
            </ul>
            <?php               
              }
              else{
                echo '
                <button data-toggle="modal" data-target="#signupModal">Sign Up</button>';
            }
            
            
            ?>
           
        </div>
    </div>
    <?php include '_login_signup_modals.php'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

</html>