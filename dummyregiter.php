<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JavaJam Coffee House</title>
    <!-- <link rel="stylesheet" type="text/css" href="./stylesheets/javajam.css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-primary bg-opacity-25 px-0">
        <header>
            <div class="container">
                <h1>JavaJam Coffee House</h1>
            </div>
        </header>
        <!-- <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="menu.html">Menu</a></li>
          <li><a href="music.html">Music</a></li>
          <li><a href="jobs.html">Jobs</a></li>
        </ul>
      </nav> -->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary bg-opacity-50 my-2">
            <div class="container-fluid">
                <div class="container-0">
                    <a class="navbar-brand" href="index.html">
                        <img src="./images/javajamlogo.jpg" alt="" width="30" height="24" />
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu.html">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="music.html">Music</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jobs.html">Job</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jobs.html">Logout</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <main class="px-4">
            <h1>Sign Up as JavaJam Member</h1>
            <p>Please fill in this form to create an account. Required information is marked with an asterisk (*).</p>
            <form method="POST" , action="assets\php\dummyprocess_register.php">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" class="form-control col-sm-4" id="name" name="name" required><br /><br />
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control col-sm-4" id="email" name="email" required><br /><br />
                </div>
                <div class="form-group">
                    <label for="tel">Tel: </label>
                    <input type="number" class="form-control col-sm-4" id="tel" name="tel" required><br /><br />
                </div>
                <div class="form-group">
                    <label for="unitno">Unit No: </label>
                    <input type="text" class="form-control col-sm-4" id="unitno" name="unitno" required><br /><br />
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control col-sm-4" id="password" name="password" required><br /><br />
                </div>
                <div class="form-group">
                    <label for="rpassword">Repeat password: </label>
                    <input type="password" class="form-control col-sm-4" id="rpassword" name="rpassword" required><br /><br />
                </div>
                <input type="submit" value="Sign Up">
            </form>
        </main>
        <footer>
            <hr />
            <div class="container pb-1">
                <p class="fst-italic text-center">
                    Copyright &copy; 2021 JavaJam Coffee House<br />
                    <a href="mailto:yourfirstname@yourlastname.com">yourfirstname@yourlastname.com</a><br />
                </p>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/scripts/script.js"></script>
    <script src="/scripts/calculateCost.js"></script>
</body>

</html>