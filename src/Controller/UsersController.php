<?php
namespace App\Controller;

use Core\Controller;

class UsersController extends Controller
{

    public function index(){
        if (isset($_SESSION['ConnectOK'])&&($_SESSION['ConnectOK'] == true)) // Si la variable existe, et qu'elle contient ce qu'il faut...
        {
            // Ici faites ce que vous voulez : affichage de la page par exemple
            $this->render('index');
        }
    else $this->render('login');

    }
    public function login(){
        $email = "le-campus-numerique@in-the-alps.fr";
        $psw = "LeCampusNumerique@2019";

        if(($_POST['email'] && ($_POST['psw'])// on vérifie que les identifiants sont bons
        {
            $_SESSION['email'] = $_POST['email']; // Je stocke dans le tableau, un champ "Email", avec l'email à l'intérieur
            $_SESSION['ConnectOK'] = true; // Statut de connexion à "Ok"
            header("Location:index.php"); // redirection vers la page d'accueil, ou un espace perso...
        }
    else $this->render('login');
    }
    public function logout(){

    }
}