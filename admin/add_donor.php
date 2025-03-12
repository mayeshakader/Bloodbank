<!DOCTYPE html>
<html>
<head>
    <title>Add Donor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background: url('https://e1.pxfuel.com/desktop-wallpaper/594/786/desktop-wallpaper-solid-color-background-one-colour.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }
        .container {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 10px;
            margin-top: 50px;
        }
        .btn-danger {
            background-color: red;
            border: none;
        }
        .btn-danger:hover {
            background-color: darkred;
        }
        .toast-container {
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 9999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Add Donor</h2>
        <form method="post">
            <div class="form-group">
                <label>Full Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label>Blood Group:</label>
                <input type="text" class="form-control" name="blood_group" required>
            </div>
            <div class="form-group">
                <label>Mobile Number:</label>
                <input type="text" class="form-control" name="contact" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>Address:</label>
                <textarea class="form-control" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label>Age:</label>
                <input type="number" class="form-control" name="age" required>
            </div>
            <button type="submit" class="btn btn-danger" name="submit">Add Donor</button>
            <button type="button" class="btn btn-secondary ml-2" onclick="history.back();">Go Back</button>
        </form>
    </div>
</body>
</html>
