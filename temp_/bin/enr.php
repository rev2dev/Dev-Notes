<?php require("../vues/tete.vue.php") ?>


<?php
  chdir("../donnees/");
  $dossiers = glob("*");
  //enregistrement
  if( !empty($_POST) ){
    $categorie = $_POST["categorie"];
    unset($_POST["categorie"]);
    //categorie = dossier
    if( !in_array($categorie, $dossiers) ){
      mkdir($categorie);
    }
    chdir($categorie);
    //article = fichier
    if( ($debut = strpos($_POST["titre"], "_")) !== false &&  ($fin = strpos($_POST["titre"], ".txt")) !== false ) {
      $nf = $_POST["titre"];
      $_POST["titre"] = substr($_POST["titre"], $debut + 1,  $fin - $debut - 1);     
    } else {
      $nf = (count(glob("*.txt")) + 1) . "_$_POST[titre].txt";
    }
    $article = json_encode($_POST);
    file_put_contents($nf, $article);
    chdir("..");
  }
?>

  <body>
    <script type="text/javascript">
        var articleSelectionne = "";
        window.addEventListener("load", function () {
           var optPlus = wid("optPlus");
           var selCategorie = wid("categorie");
           var selTitre = wid("titre");
           
           selCategorie.addEventListener("change", function () {
             if(this.value == "+") {
               //2DO
                this.ajClasse("cachee");
                this.name = "";
                var elt = wid("categorie_txt");
                elt.name = "categorie";
                elt.oteClasse("cachee");
             } else {
                wid("categorie_txt").ajClasse("cachee");
                var selects = wselecteurs("select[id ^= 'selFichiers']");
                selects.ajClasse("cachee");
                wid("selFichiers_" + this.value).oteClasse("cachee")
                wid("selFichiers_" + this.value).name = "titre";
                wid("titre_txt").ajClasse("cachee")
                wid("titre_txt").name = "";
             }
           });
           
           /*  */
           var selectsTitre = wselecteurs("select[id ^= 'selFichiers']");
           selectsTitre.ecouteurs("change", function(){
             if(this.value == "+") {
               //2DO
                this.ajClasse("cachee");
                this.name = "";
                var elt = wid("titre_txt");
                elt.oteClasse("cachee").name = "titre";
                wid("article").innerHTML = "";
             } else {
                var chemin = wnoms("categorie")[0].value + "/" + this.value;
                articleSelectionne = wAjax("../bin/temp.php", [ { indice: "fichier_donnees", valeur: chemin } ], undefined);
                articleSelectionne = JSON.parse(articleSelectionne);
                wid("article").innerHTML = articleSelectionne ? articleSelectionne.texte : "";
             }
              
           } );

        });
    </script>
    <form class="" action="" method="post">
      <fieldset style="width: 50%; margin-top: 5%;" class="centreH">
        
        <div class="champs_form">
          <label>Catégorie <span class="cachee">(nouvelle)</span></label>
          <select class="" name="categorie" id="categorie">
            <option value=""></option>
            <?php foreach ($dossiers as $dossier) : ?>                
            <?php    if ( is_dir($dossier) ) : ?>
                        <option value="<?php echo $dossier; ?>"><?php echo $dossier; ?></option>
            <?php       chdir($dossier);  ?>                     
            <?php       $fichiers = glob("*");  ?>
            <?php       $selects[] = "<select class='cachee' id='selFichiers_$dossier' >"; ?>
            <?php       $selects[count($selects) -1] .= "<option></option>"; ?>
            <?php       foreach ($fichiers as $fichier):  ?>
            <?php          $selects[count($selects) -1] .= "<option value=\"$fichier\">$fichier</option>"; ?>
            <?php       endforeach; ?>
            <?php       $selects[count($selects) -1] .= "<option value='+'>+</option>"; ?>
            <?php       $selects[count($selects) -1] .= "</select>";  ?>
            <?php       chdir(".."); ?>
            <?php    endif; ?>
            <?php endforeach; ?>

            <option value="+" id="optPlus">+</option>
          </select>
          <input type="text" class="cachee" id="categorie_txt">
        </div>


        <div class="champs_form">
          <label>Titre</label>
          <input type="text" name="titre" id="titre_txt">
<?php
foreach($selects as $select):
  echo $select;
endforeach;
?>
        </div>
        
        <div class="champs_form">
          <label>Texte</label>
          <textarea name="texte" id="article"></textarea>
        </div>
        
        <div class="champs_form">
          <button>ENVOYER</button>
        </div>

      </fieldset>
    </form>

