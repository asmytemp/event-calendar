<?php
if (isset($_GET['idse'])) {
    $delete_event=$_GET['idse'];
    echo $delete_event;
}
else echo '0000';