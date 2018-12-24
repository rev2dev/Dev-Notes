<?php chdir("donnees");             ?> 
<?php $dossiers = glob("*");        ?>
<?php const PROJET = "dev-notes";   ?>
<?php $title = "HELP !!! (PHP version 2.1)" ?>  
<?php require_once("vues/" . PROJET . "/tete.vue.php"); ?>
 

<body contextmenu="wenu">
      <div id="haut"></div>
   <section class="principale">      
      <a href="bin/enr.php" id="goenr"></a>
      <menu type="context" id="wenu" label="Wenu">
         <menuitem label="Ajouter/Modifier" icon="puceBas.gif" onclick="console.log('click menu'); wid('goenr').declenche('click');"></menuitem>
         <menuitem label="Récupérer"><a href="bin/rec.php"></a></menuitem>
      </menu>
   <header>
      <menu type="context" label="Wenu">
         <li><a href="bin/enr.php">Ajouter/Modifier</a></li>
         <li><a href="bin/rec.php">Récupérer</a></li>
      </menu>
   </header>
      <noscript>L'expérience utilisateur sera plus intense avec JavaScript activé... mais ce n'est pas obligatoire <div class="roth">:-)</div></noscript>

      <dl class="liste_niveau">

         <?php foreach ($dossiers as $dossier) :                                                         ?>
         <?php    if( is_dir($dossier) ) :                                                               ?>
         <?php       $categorie = $dossier;                                                              ?>

         <dt class="niveau"><h2 class="libelle"><?php echo $categorie ?></h2>
           <ul class="liste_niveau">

         <?php       $fichiers = glob("$categorie/*");                                                   ?>
         <?php       foreach ( $fichiers as $fichier ) :                                                 ?>
         <?php          if($article = file_get_contents( $fichier )) :                                   ?>
         <?php             $article = json_decode($article);                                             ?>
               <li class='niveau'><h3 class='libelle'><?php echo $article->titre ?></h3>    
                  <div class='liste_niveau'>

         <?php              echo $article->texte;                                                        ?>

                  </div>
               </li>

         <?php          endif; // $article                                                               ?>
         <?php       endforeach; //$fichiers                                                             ?>

                        </ul>
         </dt>

         <?php    endif;  //is_dir($dossier)                                                             ?>
         <?php endforeach; //$dossiers                                                                   ?>

         <dt><h2 class="libelle">JS : test KeyboardEvent</h2>
            <button onclick="zonesaisie.value=''; zoneresultat.value='';">X</button><br>
            <div class="testevent">
               <textarea id="zonesaisie" spellcheck="false" rows=20></textarea>
               <textarea id="zoneresultat" spellcheck="false" rows=20></textarea>
            </div>
         </dt>
      </dl>

      <div id="code" > </div>
      <div id="resultat"></div>
      <div id="bas"></div>
      <br><br>
      <a href="#haut" >
         <button style="display:block; bottom:0; right:0; position:fixed">^</button>
      </a>
      <a href="#bas" >
         <button style="display:block; top:0; right:0; position:fixed; transform:rotate(180deg)">^</button>
      </a>
   </section>

</body>
</html>

<!--
      <pre><code>
      </code></pre>
      élément AUDIO : volume {0, 1}
                      muted  {false, true}
 -->

    <!--
      <dt class="niveau"><h2 class="libelle"></h2>
         <ul class="liste_niveau">
            <li class="niveau"><h3 class="libelle"></h3>
               <ol class="liste_niveau">
                  <li class="niveau"><h4></h4>
                     texte
                  </li>
                  <li class="niveau"><h4></h4>
                     texte
                  </li>
               </ol>
            </li>
            <li class="niveau"><h3 class="libelle"></h3>
               <ol class="liste_niveau">
                  <li class="niveau"><h4></h4>
                     texte
                  </li>
                  <li class="niveau"><h4></h4>
                     texte
                  </li>
               </ol>
            </li>
         </ul>
      </dt>
    -->
