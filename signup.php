<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - BloodBank</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1524721696987-b9527df9e512?q=80&w=1933&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
        }
        .signup-container {
            max-width: 400px;
            margin: 80px auto;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card-header {
            background: #dc3545;
            color: white;
            text-align: center;
            font-size: 1.5rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .btn-primary {
            background-color: #dc3545;
            border: none;
        }
        .btn-primary:hover {
            background-color: #b52b39;
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
    <script>
        function calculateAge() {
            let birthDate = document.getElementById('birth_date').value;
            if (birthDate) {
                let today = new Date();
                let birth = new Date(birthDate);
                let age = today.getFullYear() - birth.getFullYear();
                let monthDiff = today.getMonth() - birth.getMonth();
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
                    age--;
                }
                document.getElementById('age').value = age;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="signup-container">
            <div class="card">
                <div class="card-header">Sign Up</div>
                <div class="card-body">
                    <?php 
                        $signup_error = "";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $birth_date = $_POST['birth_date'];
                            $age = $_POST['age'];
                            
                            if ($age < 18) {
                                $signup_error = "Age must be 18 or above.";
                            } else {
                                // Process the signup (e.g., store in database)
                                echo "<div class='alert alert-success'>Signup successful!</div>";
                            }
                        }
                    ?>
                    <?php if (!empty($signup_error)): ?>
                        <div class="alert alert-danger"> <?php echo $signup_error; ?> </div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Birth Date</label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control" required onchange="calculateAge()">
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" id="age" class="form-control" readonly required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </form>
                    <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
