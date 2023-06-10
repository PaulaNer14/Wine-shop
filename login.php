<!DOCTYPE html>
<html>
  <head>
    <title>Bine ai (re)venit!</title>
    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="format-detection" content="telephone=no">
	    <meta name="apple-mobile-web-app-capable" content="yes">
	    <meta name="author" content="">
	    <meta name="keywords" content="">
	    <meta name="description" content="">
      <link rel="stylesheet" type="text/css" href="/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Inregistreaza-te aici</h1>
          </div>
          <div class="panel-body">
            <form action="register.php" method="post">
              <div class="form-group">
                <label for="firstName">Nume</label>
                <input
                  type="text"
                  class="form-control"
                  id="firstName"
                  name="firstName"
                />
              </div>
              <div class="form-group">
                <label for="lastName">Prenume</label>
                <input
                  type="text"
                  class="form-control"
                  id="lastName"
                  name="lastName"
                />
              </div>
              <div class="form-group">
                <label for="ph">Numar de telefon</label>
                <input
                  type="text"
                  class="form-control"
                  id="ph"
                  name="ph"
                />
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                />
              </div>
              <div class="form-group">
                <label for="password">Parola</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                />
                  <input type="submit" class="btn btn-primary" />
             </form>
          <div class="panel-heading text-center">
              <h1>Bine ai revenit!</h1>
             </div>
            <div class="panel-body">
              <form action="connect.php" method="post">
                <div class="form-group">
                  <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  />
                </div>
                <div class="form-group">
                  <label for="password">Parola</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                />
              </div>
              <input type="submit" class="btn btn-primary" />
         </form>
         </div>        
     </div>
  </body>
</html>