<?php include("header.php");

if(!isset($_SESSION['role'])) {
    echo '404';

}
elseif ($_SESSION['role']=='admin'){
    echo '
        <form action="alleventscategory.php"><button id="button_admin_merop">Просмотр мероприятий</button>
        </form>
        <form action="">
        <button type="submit" name="button_admin_users" id="button_admin_us">Просмотр всех пользователей</button>
        </form>
        ';
    if(isset($_GET['button_admin_users'])) {
        $query_users="SELECT * FROM users";

        $result=mysqli_query($link, $query_users);
        while ($array=mysqli_fetch_array($result)) {
            $deleteuser=$array['id_user'];
            echo ' 
               <div id="one_cell_user">
                    <div id="login_user">Логин пользователя: '.$array['login'].'</div>
                    <div id="email_user">Электронная почта: '.$array['email'].'</div>
                    <div id="role_user">Роль пользователя: '.$array['role'].'</div>
                    <div>
                        <form method="post" action="admin.php">
                            <input type="hidden" name="id" value="'.$deleteuser.'">
                            <input id="but_delete_user" type="image" src="img/delete.jpg" name="'.$deleteuser.'">
                        </form>
                    </div>
               </div>';
        }

    }

    if(isset($_POST['id'])) {
           $deleteuser2=$_POST['id']  ;
           $query_delete_user="DELETE FROM users WHERE id_user='".$deleteuser2."'";
           $result=mysqli_query($link, $query_delete_user);
           echo 'Выбранный пользователь удален';
    }
}

else {
    echo '404';
}

include("footer.php"); ?>