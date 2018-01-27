<?php
  chdir("../donnees");
  $dossiers = glob("*");
  foreach ($dossiers as $dossier) :
    if( is_dir($dossier) ) :
      $categorie = $dossier;
?>
      <dl class="liste_niveau">
        <dt class="niveau"><h2 class="libelle"><?php echo $categorie ?></h2>
<?php

          $fichiers = glob("$categorie/*");
          foreach ( $fichiers as $fichier ) :
            if($article = file_get_contents( $fichier )) :
              $article = json_decode($article);
              echo "<li class='niveau'><h3 class='libelle'>$article->titre</h3>";
              echo "  <div class='liste_niveau'>";
              echo $article->texte;
              echo "  </div>";
              echo "</li>";
            endif; // $article
          endforeach; //$fichiers
?>
        </dt>
      </dl>

<?php

    endif;  //is_dir($dossier)
  endforeach; //$dossiers

