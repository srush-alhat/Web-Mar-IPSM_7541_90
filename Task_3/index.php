<?php
    include("database.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="top-heading">Hope's To DO List</h1>
    <div class="container">
        
        <form action="handleActions.php" method="post"> 
            <div class="input-container">
                <input type="text" name="inputBox" id="inputBox" >
                <button type="submit" name="add" id="add">ADD TASK</button>
            </div>

            <ul class="list">
                <?php
                    $itemList = get_items(); 
                    while($row=$itemList->fetch_assoc())
                    {
                ?>
                <li class="item">
                    <p><?php echo $row["item"]; ?></p>
                    <div class="icon-container">
                        <button type="submit" name="checked" id="check" value="<?php echo $row["id"]; ?>" ><i class="fa-solid fa-calendar-check"style="color: #06FF00;cursor: pointer;font-size :25px;transition: all 0.3s;"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>" ><i class="fa-solid fa-square-xmark" style=" color: #FF1700;cursor: pointer; font-size: 25px;transition: all 0.3s;"></i></button>

                    </div>
                </li>
                <?php } ?>
            
            </ul>
            <hr>
            <ul class="list">
                <?php
                    $itemList = get_items_checked(); 
                    while($row=$itemList->fetch_assoc())
                    {
                ?>
                <li class="item fade">
                    <p class="deleted-text"><span><?php echo $row["item"]; ?></span></p>
                    <div class="icon-container">
                        <button type="submit" name="" id="check" ><i class="fa-solid fa-calendar-check" style="color: #06FF00;cursor: pointer;font-size :25px;transition: all 0.3s;"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i class="fa-solid fa-square-xmark" style=" color: #FF1700;cursor: pointer; font-size: 25px;transition: all 0.3s;"></i></button>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </form>
    </div>


    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/06088bb5d1.js" crossorigin="anonymous"></script>
</body>
</html>