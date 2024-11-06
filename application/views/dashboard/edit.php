<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }
        select, input[type="text"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }
        .btn.save {
            background-color: #4CAF50;
            color: white;
        }
        .btn.cancel {
            background-color: #f44336;
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Entry</h1>

        <!-- Display the form for editing the entry -->
        <form action="<?php echo site_url('dashboard/edit/' . $entry['id']); ?>" method="post">
            <!-- Type dropdown (could be static or passed to the view) -->
            <label for="type">Type:</label>
            <select id="type" name="type">
                <option value="name" <?php echo $entry['type'] == 'name' ? 'selected' : ''; ?>>Name</option>
                <option value="information" <?php echo $entry['type'] == 'information' ? 'selected' : ''; ?>>Information</option>
                <option value="skill" <?php echo $entry['type'] == 'skill' ? 'selected' : ''; ?>>Skill</option>
            </select>

            <!-- Content input field populated with the existing data -->
            <label for="content">Content:</label>
            <input type="text" id="content" name="content" value="<?php echo htmlspecialchars($entry['content']); ?>" required>

            <!-- Submit button to update the entry -->
            <div class="form-actions">
                <button type="submit" class="btn save">Update</button>

                <!-- Cancel button to return to the dashboard -->
                <a href="<?php echo site_url('dashboard'); ?>" class="btn cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
