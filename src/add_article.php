<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Добавть новую статью</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/froala_editor.css">
    <link rel="stylesheet" href="./css/froala_style.css">
    <link rel="stylesheet" href="./css/plugins/code_view.css">
    <link rel="stylesheet" href="./css/plugins/colors.css">
    <link rel="stylesheet" href="./css/plugins/emoticons.css">
    <link rel="stylesheet" href="./css/plugins/image_manager.css">
    <link rel="stylesheet" href="./css/plugins/image.css">
    <link rel="stylesheet" href="./css/plugins/line_breaker.css">
    <link rel="stylesheet" href="./css/plugins/table.css">
    <link rel="stylesheet" href="./css/plugins/char_counter.css">
    <link rel="stylesheet" href="./css/plugins/video.css">
    <link rel="stylesheet" href="./css/plugins/fullscreen.css">
    <link rel="stylesheet" href="./css/plugins/file.css">
    <link rel="stylesheet" href="./css/plugins/quick_insert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="post.html">Sample Post</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-color: #234565">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Персональный блог</h1>
                        <hr class="small">
                        <span class="subheading">на тему и без темы</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>Статья будет добавлена сразу после сохранения</p>

                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Title" id="name">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Description</label>
                            <input type="email" class="form-control" placeholder="Description">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>




                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
<!--                            <label>Text</label>-->

                            <div id="editor">
                                <div id='edit' style="margin-top: 30px;">

                                </div>
                                <!--<input type="text" class="form-control" placeholder="Text">-->


                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default">Сохронить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

    <script type="text/javascript" src="./js/froala_editor.min.js" ></script>
    <script type="text/javascript" src="./js/plugins/align.min.js"></script>
    <script type="text/javascript" src="./js/plugins/char_counter.min.js"></script>
    <script type="text/javascript" src="./js/plugins/code_beautifier.min.js"></script>
    <script type="text/javascript" src="./js/plugins/code_view.min.js"></script>
    <script type="text/javascript" src="./js/plugins/colors.min.js"></script>
    <script type="text/javascript" src="./js/plugins/draggable.min.js"></script>
    <script type="text/javascript" src="./js/plugins/emoticons.min.js"></script>
    <script type="text/javascript" src="./js/plugins/entities.min.js"></script>
    <script type="text/javascript" src="./js/plugins/file.min.js"></script>
    <script type="text/javascript" src="./js/plugins/font_size.min.js"></script>
    <script type="text/javascript" src="./js/plugins/font_family.min.js"></script>
    <script type="text/javascript" src="./js/plugins/fullscreen.min.js"></script>
    <script type="text/javascript" src="./js/plugins/image.min.js"></script>
    <script type="text/javascript" src="./js/plugins/image_manager.min.js"></script>
    <script type="text/javascript" src="./js/plugins/line_breaker.min.js"></script>
    <script type="text/javascript" src="./js/plugins/inline_style.min.js"></script>
    <script type="text/javascript" src="./js/plugins/link.min.js"></script>
    <script type="text/javascript" src="./js/plugins/lists.min.js"></script>
    <script type="text/javascript" src="./js/plugins/paragraph_format.min.js"></script>
    <script type="text/javascript" src="./js/plugins/paragraph_style.min.js"></script>
    <script type="text/javascript" src="./js/plugins/quick_insert.min.js"></script>
    <script type="text/javascript" src="./js/plugins/quote.min.js"></script>
    <script type="text/javascript" src="./js/plugins/table.min.js"></script>
    <script type="text/javascript" src="./js/plugins/save.min.js"></script>
    <script type="text/javascript" src="./js/plugins/url.min.js"></script>
    <script type="text/javascript" src="./js/plugins/video.min.js"></script>

<script>
    $(function(){
        $('#edit').froalaEditor()
    });
</script>

</body>

</html>
