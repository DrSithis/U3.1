<?php
if(isset($_SESSION['article'])){ switch($_SESSION['article']){
        case 'ajouté' :
            echo '<div class=alert alert.success>';
            echo "ajouté";
            echo '</div>';
            break;
        case 'modifié' :
            echo '<div class=alert alert.success>';
            echo "modifié";
            echo '</div>';
            break;
        case 'supprimé';
            echo '<div class=alert alert.success>';
            echo "supprimé";
            echo '</div>';
            break;
        case 'erreur';
            echo '<div class=alert alert.error>';
            echo "erreur";
            echo '</div>';
            break;   
        case 'co';
            echo '<div class=alert alert.success>';
            echo "connected";
            echo '</div>';
            break;   
         case 'deco';
            echo '<div class=alert alert.success>';
            echo "disconnected";
            echo '</div>';
            break; 
} unset($_SESSION['article']);}
