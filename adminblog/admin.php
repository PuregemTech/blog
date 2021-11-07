<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <title>Admin Panel</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* .navbar-brand h5 {
        color: #1e1e1e;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: 900;
    }*/

    .dot {
        font-size: 44px;
        font-style: normal;
        color: #343a40;
    }

    .small-box {
        background-color: #343a40;
        color: #c2c7d0;
    }

    .brand-color {
        background-color: #343a40;
        color: #c2c7d0;
    }

    .card-title {
        font-size: 1.5rem !important;
    }

    .search-txt {
        font-size: 1.1rem;
        font-weight: 400;
    }

    .control-form {
        display: inline-block !important;
        width: 50% !important;
    }

    .card-header {
        padding-bottom: 0.5rem !important;
    }

    .card-title {
        font-size: 1.5rem !important;
    }

    .card {
        border: none !important;
    }

    .data-info {
        padding-top: .85em;
    }

    .page-link {
        color: #343a40 !important;
    }

    .page-item.active .page-link {
        background-color: #343a40 !important;
        border-color: #343a40 !important;
        color: #c2c7d0 !important;
    }

    .ul-pagination {
        margin: 2px 0;
        white-space: nowrap;
        justify-content: flex-end;
    }

    .btn-add {
        background: #fff;
        color: #343a40 !important;
        border-color: #343a40 !important;
    }

    .btn-add:hover {
        background: #343a40;
        color: #c2c7d0 !important;

    }

    .btn-outline-info.focus,
    .btn-outline-info:focus {
        box-shadow: 0 0 0 0 !important;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../images/avatar.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin Panel</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image text-light pt-2">
                        <i class="fas fa-user-circle" style="font-size: 30px;"></i>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" style="font-size: 20px;">Ademola Toheeb</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open mb-3 pb-3 user-panel">
                            <a href="admin.php" class="nav-link">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p>
                                    Manage Posts
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open mb-3 pb-3 user-panel">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>
                                    Manage Categories
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open mb-3 pb-3 user-panel">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Manage Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    LogOut
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->


        <div class="content-wrapper" style="background:  #454d55;">
            <div class="content-header text-light mb-3" style="border-bottom: 1px solid #4f5962;">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0" style="color:#c2c7d0;">PureGem Blog <span class="dot">.</span></h1>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <a href="addpost.php" class="btn btn-outline-info btn-block btn-add">
                            <i class="fas fa-plus"></i> Add Post
                        </a>
                    </div>
                </div>
            </div>
            <div class="pb-3">
                <div class="card mt-3 ml-3 mr-3">
                    <div class="card-header brand-color">
                        <div class="row">
                            <div class="col-xs-12 col-sm-7 col-md-8 mb-3 result-head">
                                <h3 class="card-title">Manage Posts</h3>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-4 result-head">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label for=""><span class="search-txt"> Search: </span><input type="search"
                                            class="form-control control-form small-search" placeholder
                                            aria-controls="example1" style="width: 60% !important;">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-head-fixed text-nowrap table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Author</th>
                                                <th colspan="3" style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>First Post</td>
                                                <td> Sport</td>
                                                <td>PureGem</td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="far fa-trash-alt"></i> Delete
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fas fa-upload"></i> Upload
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Second Post</td>
                                                <td> Sport</td>
                                                <td>PureGem</td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="far fa-trash-alt"></i> Delete
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fas fa-upload"></i> Upload
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Third Post</td>
                                                <td> Sport</td>
                                                <td>PureGem</td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="far fa-trash-alt"></i> Delete
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fas fa-upload"></i> Upload
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Fourth Post</td>
                                                <td> Sport</td>
                                                <td>PureGem</td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="far fa-trash-alt"></i> Delete
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fas fa-upload"></i> Upload
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Fifth Post</td>
                                                <td> Sport</td>
                                                <td>PureGem</td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="far fa-trash-alt"></i> Delete
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fas fa-upload"></i> Upload
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Sixth Post</td>
                                                <td> Sport</td>
                                                <td>PureGem</td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="far fa-trash-alt"></i> Delete
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app">
                                                        <i class="fas fa-upload"></i> Upload
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info data-info">
                                        Showing 1 to 10 of 5 entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination ul-pagination" style="margin-right: auto;">
                                            <li class="paginate_button page-item previous">
                                                <a href="" class="page-link">Previous</a>
                                            </li>
                                            <li class="paginate_button page-item active">
                                                <a href="" class="page-link">1</a>
                                            </li>
                                            <li class="paginate_button page-item">
                                                <a href="" class="page-link">2</a>
                                            </li>
                                            <li class="paginate_button page-item">
                                                <a href="" class="page-link">3</a>
                                            </li>
                                            <li class="paginate_button page-item">
                                                <a href="" class="page-link">4</a>
                                            </li>
                                            <li class="paginate_button page-item">
                                                <a href="" class="page-link">5</a>
                                            </li>
                                            <li class="paginate_button page-item">
                                                <a href="" class="page-link">6</a>
                                            </li>
                                            <li class="paginate_button page-item">
                                                <a href="" class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>



    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/adminlte.min.js"></script>
</body>

</html>