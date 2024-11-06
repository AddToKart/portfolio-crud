<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
</head>
<body>
    <div class="container dashboard">
        <header>
            <h1>Portfolio Dashboard</h1>
            <!-- Logout Button -->
            <a href="<?php echo site_url('auth/logout'); ?>" class="btn logout">Logout</a>
        </header>

        <!-- Names Section -->
        <section class="portfolio-section">
            <h2>Names</h2>
            <?php if (!empty($names)): ?>
                <?php foreach ($names as $name): ?>
                    <div class="entry">
                        <p><?php echo $name['content']; ?></p>
                        <a href="<?php echo site_url('dashboard/edit/' . $name['id']); ?>" class="btn edit">Edit</a>
                        <a href="<?php echo site_url('dashboard/delete/' . $name['id']); ?>" class="btn delete">Delete</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No names added yet.</p>
            <?php endif; ?>
            <a href="<?php echo site_url('dashboard/create'); ?>" class="btn add">Add Name</a>
        </section>

        <!-- Information Section -->
        <section class="portfolio-section">
            <h2>Information</h2>
            <?php if (!empty($information)): ?>
                <?php foreach ($information as $info): ?>
                    <div class="entry">
                        <p><?php echo $info['content']; ?></p>
                        <a href="<?php echo site_url('dashboard/edit/' . $info['id']); ?>" class="btn edit">Edit</a>
                        <a href="<?php echo site_url('dashboard/delete/' . $info['id']); ?>" class="btn delete">Delete</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No information added yet.</p>
            <?php endif; ?>
            <a href="<?php echo site_url('dashboard/create'); ?>" class="btn add">Add Information</a>
        </section>

        <!-- Skills Section -->
        <section class="portfolio-section">
            <h2>Skills</h2>
            <?php if (!empty($skills)): ?>
                <?php foreach ($skills as $skill): ?>
                    <div class="entry">
                        <p><?php echo $skill['content']; ?></p>
                        <a href="<?php echo site_url('dashboard/edit/' . $skill['id']); ?>" class="btn edit">Edit</a>
                        <a href="<?php echo site_url('dashboard/delete/' . $skill['id']); ?>" class="btn delete">Delete</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No skills added yet.</p>
            <?php endif; ?>
            <a href="<?php echo site_url('dashboard/create'); ?>" class="btn add">Add Skill</a>
        </section>
    </div>
</body>
</html>
