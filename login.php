<!DOCTYPE html>
<html>
  <head>
    <title>Inregistreaza-te gratis</title>
    <link rel="stylesheet" type="text/css" href="login.css" />
  </head>
  <body>
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Inregistreaza-te aici</h1>
          </div>
          <div class="panel-body">
            <form action="connect.php" method="post">
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

 
   
  
    









