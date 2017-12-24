<?php
chdir("../donnees/");
$dossiers = glob("../donnees/*");
foreach ($dossiers as $dossier) {
   if( is_dir($dossier) ) {
      $categorie = $dossier;
      $fichiers = glob("$categorie/*");
      foreach ( $fichiers as $fichier ){
         if($text = file_get_contents( $fichier )){
            $text = json_decode($text);
            echo "<h3>$categorie</h3><pre>"; print_r($text);
         }
      }   
   }
}

// else {
   
   // $note = [ "categorie" => "css",
             // "titre" => "Multi colonne",
             // "texte" => "<code><pre>
                           // div {
                              // -webkit-column-count: 3; /* Chrome, Safari, Opera */
                              // -moz-column-count: 3; /* Firefox */
                              // column-count: 3;
                           // }
                         // </pre></code>"
            // ];
            
   // $categorie = $note["categorie"];
   // unset($note["categorie"]);
   // $note = json_encode($note);

   // file_put_contents( "../donnees/" . $categorie . "/1.txt", $note );
// }
