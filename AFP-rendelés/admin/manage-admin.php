<?php include('partial/menu.php'); ?>

//Fő téma

<div class="main-content" >


    <div class="wrapper" >

        <h1>Admin irányító</h1>

        <br /> <br />

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //üzenet kiírása
                unset($_SESSION['add']); //üzenet eltávolítása
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete']; //üzenet kiírása
                unset($_SESSION['delete']); //üzenet eltávolítása
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update']; //üzenet kiírása
                unset($_SESSION['update']); //üzenet eltávolítása
            }
        
        ?>

    </div>


</div>


<?php include('partials/footer.php'); ?>