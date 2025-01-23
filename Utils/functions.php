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
    $materiel = ["toile"];
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
    
    $GLOBALS["search"] = ["determinants" => $determinants, "materiel" => $materiel, "couleur" => $list_color, "type" => $list_type, "quantite" => $list_quantite];

}

function tokenize($query){
    //var_dump($query);
    $price = "";
    $materiel = "all";
    $couleur = "all";
    $type = "all";
    $quantite = "any";
    $keywords = preg_split("/ +/", $query);
    //var_dump($keywords);
    foreach ($keywords as $key => $word) {
        if(preg_match("/^p[ea]intures?$/", $word) && $materiel == "all"){
            $materiel = "peinture";
            continue;
        }
        if(in_array($word, $GLOBALS["search"]["materiel"]) && $materiel == "all"){
            $materiel = "autres_materiaux";
            continue;
        }
        if(in_array($word, $GLOBALS["search"]["determinants"])){
            continue;
        }
        if((preg_match("/^pas?$/", $word) || preg_match("/^moin.+$/", $word)) && isset($keywords[$key+1]) && preg_match("/^ch.+r.*$/", $keywords[$key+1])){
            $price = "ASC";
            continue;
        }
        if(preg_match("/^lux[ei].{0,4}$/", $word) || ((preg_match("/^plu.+$/", $word) && isset($keywords[$key+1]) && preg_match("/^ch.+r.*$/", $keywords[$key+1])))){
            $price = "DESC";
            continue;
        }
        if(in_array(strtolower($word), $GLOBALS["search"]["couleur"])){
            $couleur = strtolower($word); //voir cat
            $materiel = "peinture";
            continue;
        }
        if($type == "all" && in_array(strtolower($word), $GLOBALS["search"]["type"])){
            $type = strtolower($word);
            $materiel = "peinture";
            continue;
        }
        if(preg_match("/^[0-9]+m?l$/", strtolower($word)) && in_array(strtolower($word), $GLOBALS["search"]["quantite"])){
            $quantite = strtolower($word);
            $materiel = "peinture";
            continue;
        }
        if(preg_match("/^[0-9]+$/", $word) && isset($keywords[$key+1]) && preg_match("/^m?l$/", strtolower($keywords[$key+1])) && in_array(strtolower($word.strtolower($keywords[$key+1])), $GLOBALS["search"]["quantite"])){
            $quantite = $word.strtolower($keywords[$key+1]);
            $materiel = "peinture";
            continue;
        }
    }
    return ["price" => $price, "materiel" => $materiel, "couleur" => $couleur, "type" => $type, "quantite" => $quantite];
}

function create_sql_from_tokens($tokens){
    $type = "1=1";
    $couleur = "1=1";
    $quantite = "1=1";
    $filter = "";
    if ($tokens["materiel"] == "all"){
        $base = "SELECT id_materiel,description_materiel,prix_materiel,code_hexadecimal AS code_hexadecimal,nom_materiel AS categories,lien_image AS image, coloris AS colors FROM peinture RIGHT JOIN materiel USING(id_materiel) LEFT JOIN autres_materiaux USING(id_materiel) LEFT JOIN type_peinture USING(id_type_peinture) LEFT JOIN couleur USING(id_couleur) LEFT JOIN Images USING(id_image)"; //Valide
    }
    else { 
        $materiel = $tokens["materiel"];
        if($tokens["materiel"] == "peinture"){
            if($tokens["type"] != "all"){
                $type = "LOWER(nom_type_peinture) = '".$tokens["type"]."'";
            }
            if($tokens["couleur"] != "all"){
                $couleur = "LOWER(coloris) LIKE '%".$tokens["couleur"]."%'";
            }
            if($tokens["quantite"] != "any"){
                $quantite = "LOWER(quantite) = '".$tokens["quantite"]."'";
            }
            $filter = " WHERE ".$type." AND ".$couleur." AND ".$quantite;
        }
        $base = "SELECT id_materiel,description_materiel,prix_materiel,code_hexadecimal AS code_hexadecimal,nom_materiel AS categories,lien_image AS image, coloris AS colors FROM materiel RIGHT JOIN ".$materiel." USING(id_materiel) LEFT JOIN type_peinture USING(id_type_peinture) LEFT JOIN couleur USING(id_couleur) LEFT JOIN Images USING(id_image)".$filter;
    }
    if($tokens["price"] != ""){
        $base .= " ORDER BY prix_materiel ".$tokens["price"];
    }
    if($type == "1=1" && $couleur == "1=1" && $quantite == "1=1" && $tokens["price"] == "" && $tokens["materiel"] == "all"){
        return null;
    }
    return $base;

    //LINK table with id (img)
    //OR pour des mots non définis

    //ORDER BY catégorie ASC -> null come first so when matched by color you get the first match in color followed by the articles in the catégorie -> encapusler la requete et rajouter le deuxième order by donc une combinaison de select
    //To make the matching by type -> use regex to detect typo and match it with the correct one / list with regex or individuals trial (may takes time) / construct a LIKE with main material part and detect next one as a filter
    //To gain time maybe use a variable to skip next word when used in the current test (pas + chere etc)
    //=> combine search like two colors with keyword (need thoughts on the order by)
    //switch to GET
    //adjectifs
}
