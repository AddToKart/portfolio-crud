<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="error"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form action="<?php echo site_url('auth/login_process'); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>

            <button type="submit" class="btn">Login</button>
        </form>


        <p>Don't have an account? <a href="<?php echo site_url('auth/register'); ?>">Register</a></p>
    </div>
</body>
</html>
