<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
</head>

<body>
    <div class="login-form">
        <img src="assets/images/logo.png" alt="" id="logo">
        <h1>Staff Login</h1>

        <?php if (isset($errors) && count($errors) > 0) : ?>
            <ul class="error">
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <!-- <p class="error">
            Credentials wrong! Try again
        </p>
         -->
        <form action="" method="POST">
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <button type="submit">Login</button>
        </form>

    </div>
</body>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-image: url('assets/images/admin-login.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
    }

    .login-form {
        height: 520px;
        width: 400px;
        background-color: rgba(57, 57, 57, 0.13);
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(5px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 30px 35px;
    }

    #logo {
        height: 150px;
        width: 300px;
        object-fit: contain;
    }

    .login-form h1 {
        color: aliceblue;
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
        margin-bottom: 25px;
    }

    form {
        width: 100%;
    }

    form > * {
        width: 100%;
        margin-bottom: 20px;
        border: none;
        margin: 0px;
    }

    input {
        display: block;
        height: 50px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.459);
        border-radius: 5px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 20px;
    }

    form > button{
        display: block;
        padding: 10px 20px;
        border-radius: 5px;
        background: orangered;
        color: white;
        font-size: 1.1rem;
        transition: 0.3s;
    }

    form > button:hover{
        
        background: rgb(140, 37, 0);
        
    }

    ::placeholder {
        color: #000000;
    }

    .error {
        text-align: center;
        color: white;
        background: rgb(212, 54, 54);
        padding: 5px;
        border-radius: 5px;
    }
</style>

</html>