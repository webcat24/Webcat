<?php
/**
 * @brief Classe du gestionnaire contenant toutes les fonctionnalités du gestionnaire
 * 
 * Pas encore fonctionnel
 *
 */
class Controller_inspiration extends Controller
{
    /**
     * @inheritDoc
     * Action par défaut qui appelle l'action clients
     */
    public function action_default()
    {
        $this->action_afficheroeuvre();
    }


    public function action_afficheroeuvre()
    {

        $this->render('oeuvre');
    }
    public function action_afficherentreprise()
    {

        $this->render('entreprise');
    }
    public function action_affichepalettes()
    {

        $this->render('inspiration');
    }
}
