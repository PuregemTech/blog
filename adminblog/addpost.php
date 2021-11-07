<?php
define('serverName', 'localhost');
define('databaseUsername', 'root');
define('databasePassword', '');
define('databaseName', 'blog_admin');
if (
    !($databaseConnection = mysqli_connect(
        serverName,
        databaseUsername,
        databasePassword,
        databaseName
    ))
) {
    echo 'Could not connect to database';
}
$title = $content = '';
$errors = [];
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $file_name = basename($_FILES['photo']['name']);
    $tmp_name = $_FILES['photo']['tmp_name'];
    $file_size = $_FILES['photo']['size'];
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $path = 'images/' . $file_name;
    if ($_FILES['photo']['name'] == '') {
        $errors['empty_image_err'] = 'Please, choose a image';
    } elseif (
        $file_extension != 'jpg' &&
        $file_extension != 'jpeg' &&
        $file_extension != 'png' &&
        $file_size > 500000
    ) {
        $errors['size_extension_err'] = 'invalid file extension and size';
    } elseif ($file_size > 500000) {
        $errors['filesize_err'] =
            'The maximum file size must not more than 50kb';
    } elseif (
        $file_extension != 'jpg' &&
        $file_extension != 'jpeg' &&
        $file_extension != 'png'
    ) {
        $errors['fileextension_err'] = 'Invalid Image';
    } elseif (file_exists($path)) {
        $errors['duplicate_err'] = 'Image already exist';
    } elseif (!move_uploaded_file($tmp_name, $path)) {
        $errors['upload_err'] = "Your file can't be uploaded";
    } else {
        $path = 'images/' . $file_name;
    }

    if (empty($_POST['title'])) {
        $errors['title_error'] = 'Title is required';
    } else {
        $title = $_POST['title'];
    }

    if (empty($_POST['category'])) {
        $errors['category_error'] = 'Category is required';
    } else {
        $category = $_POST['category'];
    }

    if (empty($_POST['content'])) {
        $errors['content_error'] = 'Content is required';
    } else {
        $content = $_POST['content'];
    }

    if (isset($_POST['submit']) && !$errors) {
        $insert = "INSERT INTO addpost(title, category, imagepath, content) value('$title', '$category', '$path', '$content')";
        if (mysqli_query($databaseConnection, $insert)) {
            $success = 'You data has been successfully uploaded';
        } else {
            $errors['db_error'] =
                'Something went wrong' . mysqli_error($databaseConnection);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
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
            <div class="pb-3">
                <div class="card mt-3 ml-3 mr-3">
                    <div class="card-header brand-color">
                        <div class="row">
                            <div class="col-xs-12 col-sm-7 col-md-12 mb-3 result-head">
                                <h3 class="card-title">Create Post</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    if (
                                        isset($_POST['submit']) &&
                                        !$errors
                                    ) { ?>
                                    <div class="alert alert-success">
                                        <?php echo $success; ?>
                                    </div>
                                    <?php }
                                    if ($errors) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show"
                                        style="position: absolute; right:0; opacity: .8;">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Oops! Something went wrong</strong> <br />
                                        <?php foreach ($errors as $error) {
                                            echo $error . '<br/>';
                                        } ?>
                                    </div>
                                    <?php }
                                    ?>
                                    <form action="addpost.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" class="form-control <?php if (
                                                array_key_exists(
                                                    'title_error',
                                                    $errors
                                                )
                                            ) {
                                                echo 'is-invalid';
                                            } ?>" placeholder="Enter Post Title" name="title"
                                                value="<?php echo $title; ?>">
                                            <span style="color: red;">
                                                <?php if (
                                                    array_key_exists(
                                                        'title_error',
                                                        $errors
                                                    )
                                                ) {
                                                    echo $errors['title_error'];
                                                } ?>
                                            </span>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="">Author</label>
                                            <input type="text" class="form-control" id=""
                                                placeholder="Enter Author Name">
                                        </div> -->
                                        <div class="form-group">
                                            <label>Categories</label>
                                            <select class="form-control select2 <?php if (
                                                array_key_exists(
                                                    'category_error',
                                                    $errors
                                                )
                                            ) {
                                                echo 'is-invalid';
                                            } ?>" style="width: 100%;" name="category">
                                                <option selected="selected">Business</option>
                                                <option>Entertainment</option>
                                                <option>Health</option>
                                                <option>Music</option>
                                                <option>News</option>
                                                <option>Politics</option>
                                                <option>Sport</option>
                                                <option>Stories</option>
                                                <option>Tech</option>
                                                <option>Video</option>
                                                <option>Weather</option>
                                            </select>
                                            <span style="color: red;">
                                                <?php if (
                                                    array_key_exists(
                                                        'category_error',
                                                        $errors
                                                    )
                                                ) {
                                                    echo $errors[
                                                        'category_error'
                                                    ];
                                                } ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="file" class="form-label">Upload Image:</label>
                                            <input type="file" class="form-control-file border <?php if (
                                                array_key_exists(
                                                    'empty_image_err',
                                                    $errors
                                                ) ||
                                                array_key_exists(
                                                    'size_extension_err',
                                                    $errors
                                                ) ||
                                                array_key_exists(
                                                    'filesize_err',
                                                    $errors
                                                ) ||
                                                array_key_exists(
                                                    'fileextension_err',
                                                    $errors
                                                ) ||
                                                array_key_exists(
                                                    'duplicate_err',
                                                    $errors
                                                )
                                            ) {
                                                echo 'is-invalid';
                                            } ?>" name="photo">
                                            <span style="color: red;">
                                                <?php if (
                                                    array_key_exists(
                                                        'empty_image_err',
                                                        $errors
                                                    )
                                                ) {
                                                    echo $errors[
                                                        'empty_image_err'
                                                    ];
                                                } ?>
                                            </span>
                                            <span style="color: red;">
                                                <?php if (
                                                    array_key_exists(
                                                        'size_extension_err',
                                                        $errors
                                                    )
                                                ) {
                                                    echo $errors[
                                                        'size_extension_err'
                                                    ];
                                                } ?>
                                            </span>
                                            <span style="color: red;">
                                                <?php if (
                                                    array_key_exists(
                                                        'filesize_err',
                                                        $errors
                                                    )
                                                ) {
                                                    echo $errors[
                                                        'filesize_err'
                                                    ];
                                                } ?>
                                            </span>
                                            <span style="color: red;">
                                                <?php if (
                                                    array_key_exists(
                                                        'fileextension_err',
                                                        $errors
                                                    )
                                                ) {
                                                    echo $errors[
                                                        'fileextension_err'
                                                    ];
                                                } ?>
                                            </span>
                                            <span style="color: red;">
                                                <?php if (
                                                    array_key_exists(
                                                        'duplicate_err',
                                                        $errors
                                                    )
                                                ) {
                                                    echo $errors[
                                                        'duplicate_err'
                                                    ];
                                                } ?>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Content</label>
                                            <textarea name="content" id="content"
                                                value="<?php echo $content; ?>"></textarea>
                                            <span style="color: red;">
                                                <?php if (
                                                    array_key_exists(
                                                        'content_error',
                                                        $errors
                                                    )
                                                ) {
                                                    echo $errors[
                                                        'content_error'
                                                    ];
                                                } ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-outline-primary btn-add" name="submit"
                                                value="Add Post">
                                        </div>

                                    </form>
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
    <script src="../js/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    }
                ]
            }
        })
        .catch(error => {
            console.log(error);
        });
    </script>
</body>

</html>