<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rodeo Skateboard</title>
    <!-- CSS -->
    <link href="../../../../Views/css/bootstrap.css" rel="stylesheet">
    <link href="../../../../Views/css/sb-admin.css" rel="stylesheet">

    <!-- ICONOS -->
    <link href="../../../../Views/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- JS -->
    <script src="../../../../Views/js/jquery.js"></script>
    <script src="../../../../Views/js/redi2.js"></script>
    <script src="../../../../Views/js/bootstrap.min.js"></script>

</head>

<body>

    <div id="wrapper">
        <?php include_once( '../../../../Views/Container/nav.html');?>
        <div id="page-wrapper" class="abc animated fadeIn">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Productos</h1>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1>Modificar</h1>

                    <form role="form" method="post" class="animated bounceInRight">

                        <fieldset disabled>
                            <div class="form-group">
                                <label for="disabledSelect">ID Producto</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_POST['ide'];?>" disabled>
                            </div>
                        </fieldset>

                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
