
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Team Management</title>

    <!-- Bootstrap core CSS -->
 <link rel="stylesheet" href="{{URL::to('public/css/bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{URL::to('public/css/custom.css')}}">

 

    <!-- Custom styles for this template -->
<style type="text/css">
    body {
  padding-top: 3.5rem;
}
</style>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="{{route('team.index')}}">Team Management</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('team.index')}}">Home <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Team</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{route('team.index')}}">View</a>
              <a class="dropdown-item" href="{{route('team.create')}}">Create</a>
            
            </div>
          </li>
        </ul>

      </div>
    </nav>

    <main role="main">


      <div class="container">

       

            @yield('content')

        

        <hr>

      </div> <!-- /container -->

    </main>

    <footer class="container">
      <p>&copy; Footer</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="{{URL::to('public/js/bootstrap.min.js')}}"></script>
  </body>
</html>
