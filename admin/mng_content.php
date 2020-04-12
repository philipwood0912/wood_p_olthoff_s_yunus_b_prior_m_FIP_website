<?php
    require_once '../load.php';
    confirm_logged_in();
    $home_tbl = "tbl_home";
    $about_tbl = "tbl_about";
    $home_contents = getAll($home_tbl);
    $about_contents = getAll($about_tbl);

    if(isset($_GET['edit'])){
        $id = $_GET['id'];
        if(isset($_GET['home'])){
            $edit_item = getItem($id, $home_tbl);
        } else if (isset($_GET['about']) && !isset($_GET['new'])){
            $_SESSION['count'] = 0;
            $edit_item = getItem($id, $about_tbl);
        } else if (isset($_GET['about']) && isset($_GET['new'])){
            $edit_item = getItem($id, $about_tbl);
        }
    }
    if(isset($_GET['delete'])){
        $id = $_GET['id'];
        if($_GET['home']){
            $home_message = deleteItem($id, $home_tbl);
        } else if($_GET['about']){
            $about_message = deleteItem($id, $about_tbl);
        }
    }
    if(isset($_POST['addhome'])){
        $args = array(
            'title'=>$_POST['title'],
            'text'=>$_POST['text'],
            'image'=>$_FILES['image']
        );
        $home_message = addHomeItem($args);
    }
    if(isset($_POST['edithome'])){
        $args = array(
            'id'=>$_POST['id'],
            'title'=>$_POST['title'],
            'text'=>$_POST['text'],
            'oldimage'=>$_POST['oldimage'],
            'image'=>$_FILES['image']
        );
        $home_message = editHomeItem($args);
    }
    if(isset($_POST['editabout']) || isset($_POST['addabout'])) {
        $_SESSION['count'] = 0;
        $text = $_POST['text'];
        $text_check = array();
        for($i = 0; $size = count($text), $i < $size; $i++){
            if($text[$i] == ""){
                continue;
            } else {
                $text_check[] = $text[$i];
            }
        }
        $full_text = implode('^', $text_check);
        if(!isset($_POST['addabout'])) {
            $args = array(
                'id'=>$_POST['id'],
                'title'=>$_POST['title'],
                'text'=>$full_text
            );
            $about_message = editAboutItem($args);
        } else if(!isset($_POST['editabout'])) {
            $args = array(
                'title'=>$_POST['title'],
                'text'=>$full_text
            );
            $about_message = addAboutItem($args);
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
        <a class="headerLogo" href="dashboard.php"><img src="../public/images/gettested_logo.svg" alt="logo"></a>
    </header>
    <div class="sub-dash-wrap">
        <div class="sub-dashboard">
            <div class="sub-dash-title"><h2>Manage Content</h2><a href="dashboard.php"><button><i class="fas fa-arrow-circle-left"></i> Go Back</button></a></div>
            <div class="sub-form-title"><h3><?php echo !empty($home_message)? $home_message:'Home Page';?></h3><a href="mng_content.php?add=true&home=true"><button>Add Content <i class="fas fa-arrow-circle-right"></i></button></a></div>
            <?php if(isset($_GET['add']) && isset($_GET['home'])):?>
                <form action="mng_content.php" method="post" class="dashboard-form" enctype="multipart/form-data">
                    <label>Title</label>
                    <input name="title" type="text" value="">
                    <label>Text</label>
                    <textarea name="text" type="text" value=""></textarea>
                    <label>Image</label>
                    <input type="file" name="image" value="">
                    <button name="addhome">Add Content</button>
                </form>
            <?php endif;?>
            <?php if(isset($edit_item) && isset($_GET['home'])):?>
                <?php while($edit = $edit_item->fetch(PDO::FETCH_ASSOC)):?>
                    <form action="mng_content.php" method="post" class="dashboard-form" enctype="multipart/form-data">
                        <input class="hidden" type="text" name="id" value="<?php echo $edit['ID']?>">
                        <label>Title</label>
                        <input type="text" name="title" value="<?php echo $edit['Title']?>">
                        <label>Text</label>
                        <textarea type="text" name="text" value=""><?php echo $edit['Text']?></textarea>
                        <label>Image</label>
                        <input class="hidden" type="text" name="oldimage" value="<?php echo $edit['Image']?>">
                        <input type="file" name="image" value="">
                        <button name="edithome">Edit Content</button>
                    </form>
                <?php endwhile;?>
            <?php endif;?>
            <div class="table-form">
                <table>
                    <tr>
                        <th>Popup #</th>
                        <th>Content Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <tbody>
                        <?php $home_index = 1;?>
                        <?php while($content = $home_contents->fetch(PDO::FETCH_ASSOC)):?>
                            <tr>
                                <td><?php echo $home_index;?></td>
                                <td><?php echo $content['Title'];?></td>
                                <td><a href="mng_content.php?id=<?php echo $content['ID']?>&edit=true&home=true"><i class="fas fa-arrow-circle-right fa-2x"></i></a></td>
                                <td><a href="mng_content.php?id=<?php echo $content['ID']?>&delete=true&home=true"><i class="fas fa-times-circle fa-2x"></i></a></td>
                                <?php $home_index++;?>
                            <tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
            <div class="sub-form-title"><h3><?php echo !empty($about_message)? $about_message:'About Page';?></h3><a href="mng_content.php?add=true&about=true"><button>Add Content <i class="fas fa-arrow-circle-right"></i></button></a></div>
            <?php if(isset($_GET['add']) && isset($_GET['about'])):?>
                <?php
                    if(!isset($_GET['new'])){
                        $_SESSION['count'] = 0;
                    }
                    if(isset($_GET['new'])){
                        $_SESSION['count']++;
                        $textArr = array();
                        for($i=0; $i < $_SESSION['count']; $i++){
                            $textArr[] = "";
                        }
                    }    
                ?>
                <form action="mng_content.php" method="post" class="dashboard-form">
                    <label>Title</label>
                    <input name="title" type="text" value="">
                    <label>Text</label>
                    <textarea name="text[]" type="text"></textarea>
                    <?php if(isset($textArr)):?>
                        <?php foreach($textArr as $value):?>
                            <textarea name="text[]" type="text"></textarea>
                        <?php endforeach;?>
                    <?php endif;?>
                    <a href="mng_content.php?&add=true&about=true&new=true"><button type="button">Add More</button></a>
                    <button name="addabout">Add Content</button>
                </form>
            <?php endif;?>
            <?php if(isset($edit_item) && isset($_GET['about'])):?>
                <?php while($edit = $edit_item->fetch(PDO::FETCH_ASSOC)):?>
                    <?php
                        if(isset($_GET['new'])){
                            $_SESSION['count']++;
                            $textArr = explode('^', $edit['Text']);
                            for($i=0; $i < $_SESSION['count']; $i++){
                                $textArr[] = "";
                            }
                        } else {
                            $textArr = explode('^', $edit['Text']);
                        }
                    ?>
                    <form action="mng_content.php" method="post" class="dashboard-form">
                        <input class="hidden" type="text" name="id" value="<?php echo $edit['ID']?>">
                        <label>Title</label>
                        <input type="text" name="title" value="<?php echo $edit['Title']?>">
                        <label>Text</label>
                        <?php foreach($textArr as $value):?>
                            <textarea type="text" name="text[]"><?php echo $value;?></textarea>
                        <?php endforeach;?>
                        <a href="mng_content.php?id=<?php echo $edit['ID']?>&edit=true&about=true&new=true"><button type="button">Add More</button></a>
                        <button name="editabout">Edit Content</button>
                    </form>
                <?php endwhile;?>
            <?php endif;?>
            <div class="table-form">
                <table>
                    <tr>
                        <th>Popup #</th>
                        <th>Content Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <tbody>
                        <?php $about_index = 1;?>
                        <?php while($content = $about_contents->fetch(PDO::FETCH_ASSOC)):?>
                            <tr>
                                <td><?php echo $about_index;?></td>
                                <td><?php echo $content['Title'];?></td>
                                <td><a href="mng_content.php?id=<?php echo $content['ID']?>&edit=true&about=true"><i class="fas fa-arrow-circle-right fa-2x"></i></a></td>
                                <td><a href="mng_content.php?id=<?php echo $content['ID']?>&delete=true&about=true"><i class="fas fa-times-circle fa-2x"></i></a></td>
                                <?php $about_index++;?>
                            <tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>