<?php
    require_once '../load.php';
    confirm_logged_in();
    // set variables and pull table content to be processed
    $home_tbl = "tbl_home";
    $about_tbl = "tbl_about";
    $home_contents = getAll($home_tbl);
    $about_contents = getAll($about_tbl);

    if(isset($_GET['edit'])){
        // if edit is set, get id
        $id = $_GET['id'];
        if(isset($_GET['home'])){
            // if home is set, get item according to id and table
            $edit_item = getItem($id, $home_tbl);
        } else if (isset($_GET['about']) && !isset($_GET['new'])){
            // if about is set and new is not
            // reset session count and git item according to id and table
            $_SESSION['count'] = 0;
            $edit_item = getItem($id, $about_tbl);
        } else if (isset($_GET['about']) && isset($_GET['new'])){
            // if about is set and new is set and item according to id and table
            $edit_item = getItem($id, $about_tbl);
        }
    }
    if(isset($_GET['delete'])){
        // if delete is set, get id
        $id = $_GET['id'];
        if($_GET['home']){
            // if home is true, delete item according to id and table
            $home_message = deleteItem($id, $home_tbl);
        } else if($_GET['about']){
            // if about is true, delete item according to id and table
            $about_message = deleteItem($id, $about_tbl);
        }
    }
    if(isset($_POST['addhome'])){
        // if addhome is set, create args array and add new item to home according to args
        $args = array(
            'title'=>$_POST['title'],
            'text'=>$_POST['text'],
            'image'=>$_FILES['image']
        );
        $home_message = addHomeItem($args);
    }
    if(isset($_POST['edithome'])){
        // if edithome is set, create args array and edit item in home according to args
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
        // if editabout or addabout is set, first reset session count to 0
        $_SESSION['count'] = 0;
        // text is coming in as an array
        $text = $_POST['text'];
        $text_check = array();
        // run for loop to check for empty values in array
        for($i = 0; $size = count($text), $i < $size; $i++){
            if($text[$i] == ""){
                // if text is empty, continue iteration
                continue;
            } else {
                // else add to new array
                $text_check[] = $text[$i];
            }
        }
        // create new string from array, adding them all together with ^
        // I did this so I could split string on client side and render as individual
        // lines opposed to a chunk of text
        // this allows CMS users to add and remove lines with ease 
        $full_text = implode('^', $text_check);
        if(!isset($_POST['addabout'])) {
            // if addabout is not set, create args array and edit about item according to args
            $args = array(
                'id'=>$_POST['id'],
                'title'=>$_POST['title'],
                'text'=>$full_text
            );
            $about_message = editAboutItem($args);
        } else if(!isset($_POST['editabout'])) {
            // if editabout is not set, create args array and add about item according to args
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

<div class="signin-body">
    <div class="signin">
        <div class="blueBorder">
            <form action="logout.php" method="get"><button class="backwardBtn homeBtn" id="homeBtn"><i class="fas fa-home"></i> Home</button></form>
                <div class="sub-dash-title"><h2 class="dash-head">Manage Content</h2></div>
                <div class="sub-form-title"><h3 class="popUpSmall"><?php echo !empty($home_message)? $home_message:'Home Page';?></h3></div>
                
               <a href="mng_content.php?add=true&home=true" class="forwardBtn">Add Content <i class="fas fa-arrow-circle-right"></i></a>
                <!-- Render add home form when add content button is clicked -->
                <?php if(isset($_GET['add']) && isset($_GET['home'])):?>
                    <form action="mng_content.php" method="post" class="dashboard-form" enctype="multipart/form-data">
                        <div class="labelWrapDashboard">
                            <label>Title:</label>
                            <input name="title" type="text" value="">
                        </div>
                        <div class="labelWrapDashboard">
                            <label>Text:</label>
                            <textarea name="text" type="text" value=""></textarea>
                        </div>
                        <div class="labelWrapDashboard">
                            <label>Image:</label>
                            <input type="file" name="image" value="">
                        </div>
                        <div class="buttonWrapSubDash formBut">
                            <button class="buttonMain" name="addhome">Add Content</button>
                        </div>
                    </form>
                <?php endif;?>
                <!-- Render home edit item form when edit button in table is clicked -->
                <?php if(isset($edit_item) && isset($_GET['home'])):?>
                    <?php while($edit = $edit_item->fetch(PDO::FETCH_ASSOC)):?>
                        <form action="mng_content.php" method="post" class="dashboard-form" enctype="multipart/form-data">
                            <input class="hidden" type="text" name="id" value="<?php echo $edit['ID']?>">
                                <label>Title:</label>
                                <input type="text" name="title" value="<?php echo $edit['Title']?>">
                           
                                <label>Text:</label>
                                <textarea type="text" name="text" value=""><?php echo $edit['Text']?></textarea>
                                <label>Image:</label>
                                <input class="hidden" type="text" name="oldimage" value="<?php echo $edit['Image']?>">
                            
                            <input type="file" name="image" value="">
                            
                            <button class="buttonMain" name="edithome">Edit Content</button>
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
                            <!-- Render table for home - index increments at the end of each loop -->
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
                <div class="sub-form-title"><h3 class="popUpSmall"><?php echo !empty($about_message)? $about_message:'About Page';?></h3></div>

                <a href="mng_content.php?add=true&about=true" class="forwardBtn">Add Content <i class="fas fa-arrow-circle-right"></i></a>
                <!-- Render add about form on add content button click with option to add more text lines -->
                <?php if(isset($_GET['add']) && isset($_GET['about'])):?>
                    <?php
                        if(!isset($_GET['new'])){
                            // if new is not set, reset session count to 0
                            $_SESSION['count'] = 0;
                        }
                        if(isset($_GET['new'])){
                            // if new is set, session count increments
                            // used to render blank input fields to add more text to about page
                            $_SESSION['count']++;
                            $textArr = array();
                            for($i=0; $i < $_SESSION['count']; $i++){
                                // on each loop text array gets new value
                                $textArr[] = "";
                            }
                        }    
                    ?>
                    <form id="addabout" action="mng_content.php" method="post" class="dashboard-form">
                        <div class="labelWrapDashboard">
                            <label>Title:</label>
                            <input name="title" type="text" value="">
                        </div>
                        <div class="labelWrapDashboard">
                            <label>Text:</label>
                            <textarea name="text[]" type="text"></textarea>
                        </div>
                        <!-- if text array is set render blank inputs according to length of text array -->
                        <?php if(isset($textArr)):?>
                            <?php foreach($textArr as $value):?>
                                <div class="labelWrapDashboard"><textarea name="text[]" type="text"></textarea></div>
                            <?php endforeach;?>
                        <?php endif;?>
                        <a class="forwardBtn" href="mng_content.php?&add=true&about=true&new=true">More Text</a>
                        <button class="forwardBtn" name="addabout">Add Content</button>
                        
                    </form>
                <?php endif;?>
                <!-- Render about edit item form when edit button in table is clicked -->
                <?php if(isset($edit_item) && isset($_GET['about'])):?>
                    <?php while($edit = $edit_item->fetch(PDO::FETCH_ASSOC)):?>
                        <?php
                            if(isset($_GET['new'])){
                                // if new is set, session count increments
                                $_SESSION['count']++;
                                // text array is created by spliting text pulled from database on ^ character
                                $textArr = explode('^', $edit['Text']);
                                for($i=0; $i < $_SESSION['count']; $i++){
                                    // extra slots are added according to session count
                                    $textArr[] = "";
                                }
                            } else {
                                // else create text array from spliting text from database
                                $textArr = explode('^', $edit['Text']);
                            }
                        ?>
                        <form action="mng_content.php" method="post" class="dashboard-form">
                            <input class="hidden" type="text" name="id" value="<?php echo $edit['ID']?>">
                                <label>Title:</label>
                                <input type="text" name="title" value="<?php echo $edit['Title']?>">
                                <label>Text:</label>
                                <!-- Loop through text array adding new input field for each value -->
                                <?php foreach($textArr as $value):?>
                                    <textarea type="text" name="text[]"><?php echo $value;?></textarea><hr>
                                <?php endforeach;?>

                                <a class="forwardBtn" href="mng_content.php?id=<?php echo $edit['ID']?>&edit=true&about=true&new=true">More Text</a>
                                <hr>
                            
                                <button class="forwardBtn" name="editabout">Edit Content</button>
                            </div>
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
                            <!-- Render about table content, index increments at end of each loop -->
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

                <a href="dashboard.php" class="backwardBtn"><i class="fas fa-arrow-circle-left"></i> Go Back</a>
                
            </div> 
        </div>
    </div>
</div>
</body>
</html>