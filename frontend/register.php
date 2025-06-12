<?php 
include '../dbconnect.php';

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['userName']);
    $email = htmlspecialchars($_POST['userEmail']);
    $password = htmlspecialchars($_POST['userPassword']);
    $confirmPassword = htmlspecialchars($_POST['userConfirmPassword']);

        echo $name .',' . $email . ',' . $password . ',' . $confirmPassword;
    if($password !== $confirmPassword) {
        header('Location: register.php');
        exit();
    }else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword
        ]);
        header('Location: login.php');
    }        
}

?>

<!DOC
TYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
      <?php include 'navbar.php'; ?>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                    <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-6">
                    <h3>Register</h3>
                    <form action=""method ="post" class="p-4 p-md-5 border rounded-3 bg-light">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="floationgInputName"name="userName" placeholder="shewu" required>
                            <label for="floatingInputName">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="floatingInput" type="email" placeholder="name@example.com" name="userEmail" required>
                            <label for="floatingInput">Email address</label>
                        </div>    
                         <div class="form-floating mb-3">
                            <input class="form-control" id="floatingInputPassword" type="password" placeholder="Password" name="userPassword" required>
                            <label for="floatingPassword">Password</label>
                        </div> 
                         <div class="form-floating mb-3">
                            <input class="form-control" id="floatingConfirmPassword" type="password" placeholder="ConfirmPassword" name="userConfirmPassword" required>
                            <label for="floatingConfirmPassword">Confirm Password</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>
                        
                    </form>
                </div>
                <!-- Side widgets-->
             <?php include 'sidebar.php'; ?>
            </div>
        </div>
        <!-- Footer-->
       <?php include 'footer.php'; ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
