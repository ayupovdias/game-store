<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container d-flex">
    <div class="w-25 m-auto border rounded-5 mt-5 p-4">
        <h3 class="text-center">Login Page</h3>

        <form method="post" action="{{ route('login.post') }}">
            @csrf

            <div class="row">
                <label class="form-label">Login:
                    <input class="form-control" required name="login">
                </label>
            </div>

            <div class="row">
                <label class="form-label">Password:
                    <input type="password" class="form-control" required minlength="8" name="password">
                </label>
            </div>

            <div class="row mt-3">
                <input type="submit" class="btn btn-success" value="Login">
            </div>
        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
