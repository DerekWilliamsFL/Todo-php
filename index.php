<?php
require_once 'Database/init.php';

$query = $db->prepare("
    SELECT id, name, done
    FROM items
    WHERE user = :user
");
    
$query->execute([
    'user' => $_SESSION['user_id']
]);

$blue = $query->rowCount() ? $query : [];

foreach($blue as $item){
    echo  $item['name'], '<br>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>Get It Done</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="list">
        <h1 class="header">Log it.</h1>
        
        <form class="list-add" sction="add.php" method="post">
            <input type="text" name="name" placeholder="Add a new task here" class="add">
            <input type="submit" value="Add" class="submit">
        </form>
        
        <ul class="list">
            <li>
                <span class="list-item">Watch Golden Girls.</span>
                <a href="#" class="complete-button">Complete</a>
            </li>
            
        </ul>
    </div>
</body>
</html> 