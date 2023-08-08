<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT?>assets/admin/css/test.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Admin</title>
    <style>
        .container-fluid{
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 100px;
        }
        .container-fluid:after
        {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background: url("<?= ROOT?>assets/admin/img/product.jpg") no-repeat center;
            background-size: cover;
            filter: blur(50px);
            z-index: -1;
        }
        .left
        {
            background: url("<?= ROOT?>assets/admin/img/product.jpg") no-repeat center;
            background-size: cover;
            height: 100%;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }
        .btn{
            width: 100%;
            padding: 0.5rem 1rem;
            background-color: #2ecc71;
            color: #fff;
            font-size: 1.1rem;
            border: none;
            outline: none;
            cursor: pointer;
            transition: .3s;
            margin-bottom: 10px;
        }

        .btn:hover{
            background-color: #27ae60;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                    <?php if (isset($_SESSION['thongbao'])) {
                    echo "<div class='alert alert-success'> {$_SESSION['thongbao']} </div>";
                    unset($_SESSION['thongbao']);
                } ?>
                <form method="POST" action="<?php echo  ROOT ?>admin_login/dangnhap">
                    <h4>ADMIN LOGIN</h4>
                    <input type="text" placeholder="Admin Name" name="name" id="username" class="field">
                    <input type="password" placeholder="Password" name="password" id="password" class="field">
                    <button type="submit" name="Login" id="btn_submit" class="btn">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>