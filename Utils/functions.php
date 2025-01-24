<?php


/**
 * Fonction échappant les caractères html dans $message
 * @param string $message chaîne à échapper
 * @return string chaîne échappée
 */
function e($message)
{
    return htmlspecialchars($message, ENT_QUOTES);
}

function prepare_search(){
    if (isset($GLOBALS["search"])){
        return;
    }
    $m = Model::getModel();
    $determinants = ["un","une","des","le","la","les","de","du","à","a"];
    $type_peinture = $m->getTypePeinture();
    foreach ($type_peinture as $key => $value) {
        $list_type[] = strtolower($value["nom_type_peinture"]);
    }
    $couleurs = $m->getAllColors();
    foreach ($couleurs as $key => $value) {
        $list_color[] = strtolower($value["coloris"]);
    }
    $quantite = $m->getQuantity();
    foreach ($quantite as $key => $value) {
        $list_quantite[] = strtolower($value["quantite"]);
    }
    $materiaux = $m->getListMateriaux();
    foreach ($materiaux as $key => $value) {
        $list_materiaux[] = strtolower($value["type_materiel"]);
    }
    
    $GLOBALS["search"] = ["determinants" => $determinants, "materiaux" => $list_materiaux, "couleur" => $list_color, "type" => $list_type, "quantite" => $list_quantite];

}

function tokenize($query){
    $price = "";
    $materiel = "all";
    $couleur = "all";
    $type = "all";
    $quantite = "any";
    $data = [];
    $keywords = preg_split("/ +/", $query);
    foreach ($keywords as $key => $word) {
        $word = strtolower($word);
        if($materiel == "all" && preg_match("/^p[ea]?i?(in|int|intu|intur|inture|intures)?$/", $word)){
            $materiel = "peinture";
            continue;
        }
        if($materiel == "all" && preg_grep("/^".$word."/",$GLOBALS["search"]["materiaux"])){ //in_array($word, $GLOBALS["search"]["materiaux"]) && $materiel == "all" //RAJOUTER PLURIEL
            $materiel = $word;
            if(preg_grep("/^".$word."/",$GLOBALS["search"]["couleur"])){
                $couleur = $word;
                $materiel = "all";
                $data["color_and_materiel"] = $word;
            }
            continue;
        }
        /*
        if(in_array($word, $GLOBALS["search"]["determinants"])){
            continue;
        }
        */
        if((preg_match("/^pas?$/", $word) || preg_match("/^moin.+$/", $word)) && isset($keywords[$key+1]) && preg_match("/^ch.+r.*$/", $keywords[$key+1])){
            $price = "ASC";
            continue;
        }
        if(preg_match("/^lux[ei].{0,4}$/", $word) || (preg_match("/^ch.+r.*$/", $word) && $price == "") || ((preg_match("/^plu.+$/", $word) && isset($keywords[$key+1]) && preg_match("/^ch.+r.*$/", $keywords[$key+1])))){
            $price = "DESC";
            continue;
        }
        if($type == "all" && preg_grep("/^".$word."/", $GLOBALS["search"]["type"])){
            $type = preg_replace("/'/", "''", $word);
            $materiel = "peinture";
            continue;
        }
        $match_color = preg_grep("/^(.* )?".$word."/",$GLOBALS["search"]["couleur"]);
        if($match_color){
            if($couleur == "all"){
                $couleur = $word;
            }
            else if(preg_grep("/^".$couleur.".* ".$word."/",$match_color)){
                $couleur .= "% ".$word;
            }
            else{
                $data["multiple_colors"][] = $couleur;
                $couleur = $word;
            }
            $materiel = "peinture";
            continue;
        }
        if(preg_match("/^[0-9]+(ml|l)?$/", $word) && preg_grep("/^".$word."/", $GLOBALS["search"]["quantite"])){
            $quantite = $word;
            $materiel = "peinture";
            continue;
        }
        /*
        if(preg_match("/^[0-9]+$/", $word) && isset($keywords[$key+1]) && preg_match("/^m?l$/", strtolower($keywords[$key+1])) && in_array(strtolower($word.strtolower($keywords[$key+1])), $GLOBALS["search"]["quantite"])){
            $quantite = $word.strtolower($keywords[$key+1]);
            $materiel = "peinture";
            continue;
        }
        */
    }
    return ["price" => $price, "materiel" => $materiel, "couleur" => $couleur, "type" => $type, "quantite" => $quantite, "data" => $data];
}

function create_sql_from_tokens($tokens){
    $type = "1=1";
    $couleur = "1=1";
    $quantite = "1=1";
    $filter = "";
    if ($tokens["materiel"] == "all"){
        if($tokens["couleur"] != "all"){
            $couleur = $tokens["couleur"];
            $materiel = $tokens["data"]["color_and_materiel"];
            $filter .= " WHERE LOWER(coloris) LIKE '".$couleur."%' OR LOWER(type_materiel) LIKE '".$materiel."%'";
        }
        $base = "SELECT id_materiel,description_materiel,prix_materiel,code_hexadecimal AS code_hexadecimal,nom_materiel AS categories,lien_image AS image, coloris AS colors FROM peinture RIGHT JOIN materiel USING(id_materiel) LEFT JOIN autres_materiaux USING(id_materiel) LEFT JOIN type_peinture USING(id_type_peinture) LEFT JOIN couleur USING(id_couleur) LEFT JOIN Images USING(id_image)".$filter; //Valide
    }
    else { 
        if($tokens["materiel"] == "peinture"){
            if($tokens["type"] != "all"){
                $type = "LOWER(nom_type_peinture) LIKE '".$tokens["type"]."%'";
            }
            $arg_colors = "";
            if($tokens["couleur"] != "all"){
                $couleur = "(LOWER(coloris) LIKE '".$tokens["couleur"]."%' OR LOWER(coloris) LIKE '% ".$tokens["couleur"]."%'";
                if(isset($tokens["data"]["multiple_colors"])){
                    foreach ($tokens["data"]["multiple_colors"] as $key => $value) {
                        $couleur .= " OR LOWER(coloris) LIKE '".$value."%' OR LOWER(coloris) LIKE '% ".$value."%'";
                    }
                }
                $couleur .= ")";
                
            }
            if($tokens["quantite"] != "any"){
                $quantite = "LOWER(quantite) LIKE '".$tokens["quantite"]."%'";
            }
            $filter = " WHERE ".$type." AND ".$couleur." AND ".$quantite;
        
            $base = "SELECT id_materiel,description_materiel,prix_materiel,code_hexadecimal AS code_hexadecimal,nom_materiel AS categories,lien_image AS image, coloris AS colors FROM materiel RIGHT JOIN peinture USING(id_materiel) LEFT JOIN type_peinture USING(id_type_peinture) LEFT JOIN couleur USING(id_couleur) LEFT JOIN Images USING(id_image)".$filter;
        }
        else{
            $base = "SELECT id_materiel,description_materiel,prix_materiel,nom_materiel AS categories,lien_image AS image FROM materiel RIGHT JOIN autres_materiaux USING(id_materiel) LEFT JOIN Images USING(id_image) WHERE LOWER(type_materiel) LIKE '".$tokens["materiel"]."%'";
        }
    }
    if($tokens["price"] != ""){
        $base .= " ORDER BY prix_materiel ".$tokens["price"];
    }
    if($type == "1=1" && $couleur == "1=1" && $quantite == "1=1" && $tokens["price"] == "" && $tokens["materiel"] == "all"){
        return null;
    }
    return $base;

    //LINK table with id (img) = DONE
    //OR pour des mots non définis

    //ORDER BY catégorie ASC -> null come first so when matched by color you get the first match in color followed by the articles in the catégorie -> encapusler la requete et rajouter le deuxième order by donc une combinaison de select
    //To make the matching by type -> use regex to detect typo and match it with the correct one / list with regex or individuals trial (may takes time) / construct a LIKE with main material part and detect next one as a filter
    //To gain time maybe use a variable to skip next word when used in the current test (pas + chere etc) = USELESS
    //=> combine search like two colors with keyword (need thoughts on the order by)
    //adjectifs
    //ORDER BY -> doit être ordonnée par la première lettre en cas de recherche d'une lettre
    //double nom couleur = DONE
    //code hexa ?
    //specifier matériaux = DONE
}
