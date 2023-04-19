<?php
 $db = mysqli_connect('localhost', 'root', 'Dev@1999', 'medic') or
        die ('Ulanmadi.');
        mysqli_select_db($db, 'medic' ) or die(mysqli_error($db));
?>