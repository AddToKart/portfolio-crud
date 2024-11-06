<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="error"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form action="<?php echo site_url('auth/register_process'); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <br><br>

            <button type="submit" class="btn">Register</button>
        </form>

        <p>Already have an account? <a href="<?php echo site_url('auth/login'); ?>">Login</a></p>
    </div>
</body>
</html>
