<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Signup</title>
</head>

<body class="bg-secondary">

    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="container bg-white rounded my-2 px-0">
                        <div class="py-1 bg-danger text-white">
                            <h1 style="text-align: center;">LOGIN</h1>
                        </div>
                                    <div class="mt-3 " style="text-align: center;">
                                        <img src="login.jpg" width="100px" alt="">
                                    </div>
                            <form action="connect.php" method="post">
                      
                        <div class="py-3 mx-5">
                            <input type="email" class="form-control  border-info" placeholder="Enter Email Address">
                        </div>
                       
                        <div class="py-3 mx-5">
                            <input type="password" class="form-control  border-info" placeholder="Enter password">
                        </div>
                        <div class="py-3 mx-5 ">
                          <input type="button" class="form-control btn-danger text-white" value="LOGIN ">
                        </div>
                        <div class="py-3 mx-5 ">
                          <a href="login.php" style="text-decoration: none;"> <input type="button" class="form-control btn-info text-white" value="REGISTRATION "></a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>