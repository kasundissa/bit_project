<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Sun City Pharmacy & Grocery</title>
    <!--<meta name="description" content="Sufee Admin - HTML5 Admin Template">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
           <a class="navbar-brand" href="./"><!--<img src="images/logo.png" alt="Logo">-->Sun City <br/>Pharmacy & <br/>Grocery</a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="welcome.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>



                <li class="menu-item-has-children active dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Users</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="add_user.php">add user</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="user_list.php">view users</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="change_pwd.php">Change User Password</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children active dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Customers</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="add_customer.php">add customer</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="customer_list.php">view customers</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children active dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Suppliers</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="add_supplier.php">add supplier</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="supplier_list.php">view suppliers</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="sup_payments.php">Payments</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Drugs Category</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="add_drg_cat.php">Add Drugs Category</a></li>
                        <li><i class="fa fa-table"></i><a href="drg_cat_list.php">View Drugs Category</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Drugs</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="add_drugs.php">Add Drugs</a></li>
                        <li><i class="fa fa-table"></i><a href="drugs_list.php">View Drugs</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Grocery Items</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="add_grocery_items.php">Add Grocery Items</a></li>
                        <li><i class="fa fa-table"></i><a href="grocery_items_list.php">View Grocery Items</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>GRN</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="grn.php">Add GRN</a></li>
                        <li><i class="fa fa-table"></i><a href="grn_view.php">View GRN</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Employee's Salary</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="emp_salary.php">Add Salary</a></li>
                        <li><i class="fa fa-table"></i><a href="salary_list.php">View Salary</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Items</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="pos.php">Sell</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="return.php">Return</a></li>

                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Reports</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="sales_report.php">Sales</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="grn_report.php">GRN</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="customer_report.php">Customer Details Reports</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="stock_report.php">Stock</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="stock_over_report.php">Stocks Going Over</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="available_users.php">Available Users</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="sales_report%20_all_items.php">Sales For all items</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="view_sup_payments.php">Supplier Payments</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="daily_demand.php">Daily Demand</a></li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>

                    <div class="dropdown for-notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown for-message">
                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                        </div>
                    </div>
              &nbsp;    &nbsp;  &nbsp;  &nbsp;  &nbsp;      <span id="dt"></span> <!--&nbsp; &nbsp;&nbsp;&nbsp; Kasun-->

                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                        <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                        <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                        <a class="nav-link" href="page-login.php?logout=1"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>

                <div class="language-select dropdown" id="language-select">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                        <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="language">
                        <div class="dropdown-item">
                            <span class="flag-icon flag-icon-fr"></span>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-es"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-us"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-it"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->
<!--
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                   <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">UI Elements</a></li>
                        <li class="active">Typography</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
-->
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="ui-typography">
                <div class="row">
                    <div class="col-md-12">


                        <div class="card">
                            <div class="card-body">
<script>
    setInterval(function () {
        var date = new Date();
        jQuery('#dt').html(
            date.getFullYear()+"/" +  (date.getMonth()+1) +"/" + date.getDate()+" " + date.getHours()+":"+date.getMinutes()+":"+date.getSeconds()
        );
    },

        500);
</script>