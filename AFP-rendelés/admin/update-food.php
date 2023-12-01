<?php include('partials/menu.php'); ?>

<?php 
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $current_image = $_POST['current_image'];
        $category = $_POST['category'];

        $featured = $_POST['featured'];
        $active = $_POST['active'];

        if(isset($_FILES['image']['name']))
        {
            $image_name = $_FILES['image']['name'];

            if($image_name!="")
            {
                $val = explode('.', $image_name);
                $ext = end($val);

                $image_name = "uj_kaja".rand(0000,9999).".".$ext;

                $src_path = $_FILES['image']['tmp_name'];
                $dest_path = "../images/food/".$image_name;

                $upload = move_uploaded_file($src_path, $dest_path);
            }
            else
            {
                $image_name = $current_image;
            }
        }
     
    }
?>