<?php
    include_once('services/variable.php');
?>
<?php 

    if( !(session_id() != '' && $GLOBALS['_OPEN'] == true ) ) {
        header('Location: '.$GLOBALS['INDEX'].'/landing.php');
        exit();
    } elseif ( isset( $_SESSION['tipo_empleado'] ) ) {
        if( $_SESSION['tipo_empleado'] == "admin"){
            header('Location: '.$GLOBALS['INDEX'].'/dashboardAdmin.php');
            exit();
        }elseif($_SESSION['tipo_empleado'] == 'empleado'){
            header('Location: '.$GLOBALS['INDEX'].'/dashboardEmpleado.php');
            exit();
        }else{
            header('Location: '.$GLOBALS['INDEX'].'/dashboardInstructor.php');
            exit();
        }

    }else{
         header('Location: '.$GLOBALS['INDEX'].'/landing.php');
        exit();
    }

?>