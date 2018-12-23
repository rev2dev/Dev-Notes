<?php 
   if( !empty($fichier_donnees) ) : 
      echo file_get_contents($fichier_donnees);
   endif; 