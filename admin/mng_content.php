<?php
    require_once '../load.php';
    confirm_logged_in();
    $home_tbl = "tbl_home";
    $home_contents = getAll($home_tbl);
    if(isset($_GET['edit'])){
        $id = $_GET['id'];
        if($_GET['home']){
            $edit_item = getItem($id, $home_tbl);
        }
    }
    if(isset($_GET['delete'])){
        $id = $_GET['id'];
        if($_GET['home']){
            $delete_item = deleteItem($id, $home_tbl);
        }
    }
    if(isset($_POST['addhome'])){
        $title = trim($_POST['title']);
        $text = trim($_POST['text']);
        $add = addHomeItem($title, $text);
    }
    if(isset($_POST['edithome'])){
        $id = $_POST['id'];
        $title = trim($_POST['title']);
        $text = trim($_POST['text']);
        $edit = editHomeItem($id, $title, $text);
        if(!$edit){
            $home_message = "Something went wrong..";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="../public/css/main.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <header>
        <img src="../public/images/fip_logo.svg" alt="logo">
    </header>
    <div class="sub-dashboard">
        <h2>Manage Content</h2>
        <h3>Home Page - <a href="mng_content.php?add=true&home=true">Add Content <i class="fas fa-arrow-circle-right"></i></a></h3>
        <?php echo !empty($home_message)? $home_message:'';?>
        <?php if(isset($_GET['add']) && isset($_GET['home'])):?>
            <form action="mng_content.php" method="post" class="dashboard-form">
                <label>Title</label>
                <input name="title" type="text" value="">
                <label>Text</label>
                <textarea name="text" type="text" value=""></textarea>
                <button name="addhome">Add Content</button>
            </form>
        <?php endif;?>
        <?php if(isset($edit_item) && isset($_GET['home'])):?>
            <?php while($edit = $edit_item->fetch(PDO::FETCH_ASSOC)):?>
                <form action="mng_content.php" method="post" class="dashboard-form">
                    <input class="hidden" type="text" name="id" value="<?php echo $edit['ID']?>">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo $edit['Title']?>">
                    <label>Text</label>
                    <textarea type="text" name="text" value=""><?php echo $edit['Text']?></textarea>
                    <button name="edithome">Edit Content</button>
                </form>
            <?php endwhile;?>
        <?php endif;?>
        <div class="table-form">
            <table>
            <tr>
                <th>Content ID</th>
                <th>Content Title</th>
                <th>Content Text</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tbody>
                <?php while($content = $home_contents->fetch(PDO::FETCH_ASSOC)):?>
                    <tr>
                        <td><?php echo $content['ID'];?></td>
                        <td><?php echo $content['Title'];?></td>
                        <td><?php echo $content['Text'];?></td>
                        <td><a href="mng_content.php?id=<?php echo $content['ID']?>&edit=true&home=true"><i class="fas fa-arrow-circle-right"></i></a></td>
                        <td><a href="mng_content.php?id=<?php echo $content['ID']?>&delete=true&home=true"><i class="fas fa-times-circle"></i></a></td>
                    <tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
        <a href="dashboard.php">Go Back <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</body>
</html>