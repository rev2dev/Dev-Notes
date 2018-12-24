 /* TEST MODIF INNERHTML */

var chgInnerHtml = function(choix){
   console.log(choix);
   switch(choix){
    case "select":
      document.getElementById("elementInnerHtml").innerHTML="&lt;select&gt;&lt;option&gt;1&lt;/option&gt;&lt;option&gt;2&lt;/option&gt;&lt;/select&gt;";
      document.getElementById("elementInnerHtmlWYS").innerHTML="&lt;select&gt;&lt;option&gt;1&lt;/option&gt;&lt;option&gt;2&lt;/option&gt;&lt;/select&gt;";
    break;
    case "link":
      document.getElementById("elementInnerHtml").innerHTML="&lt;a href='#top'&gt;Top&lt;/a&gt;";
      document.getElementById("elementInnerHtmlWYS").innerHTML="<a href='#top'>Top</a>";
    break;
   }
}

/* TEST EVENEMENTS KEY... */
//Seule KeyPress fait la différence entre majuscule et minuscule. Sinon le keyCode est celui de la majuscule 
// ex: a code 97 => keyCode = 65 
var appuyee = function(clavier){
   zoneresultat.value += navigateur() + "\n";
   zoneresultat.value += "\tKeyDown\n\t";
   zoneresultat.value += "key:" + clavier.key + "\tcode:" + clavier.code + "\tkeyCode:" + clavier.keyCode + "\tcharCode:" + clavier.charCode + "\tkeyIdentifier:" + clavier.keyIdentifier + "\n" ;
   zoneresultat.value += "-------------------------------------------------------------------------------\n";
   // clavier.preventDefault();
};
var pressee = function(clavier){
   zoneresultat.value += "\tKeyPress\n\t";
   zoneresultat.value += "key:" + clavier.key + "\tcode:" + clavier.code + "\tkeyCode:" + clavier.keyCode + "\tcharCode:" + clavier.charCode + "\tkeyIdentifier:" + clavier.keyIdentifier + "\n" ;
   zoneresultat.value += "-------------------------------------------------------------------------------\n";
   clavier.preventDefault();
};
var relachee = function(clavier){
   zoneresultat.value += "\tKeyUp\n\t";
   zoneresultat.value += "key:" + clavier.key + "\tcode:" + clavier.code + "\tkeyCode:" + clavier.keyCode + "\tcharCode:" + clavier.charCode + "\tkeyIdentifier:" + clavier.keyIdentifier + "\n" ;
   zoneresultat.value += "-------------------------------------------------------------------------------\n";
   zoneresultat.value += "-------------------------------------------------------------------------------\n\n";
   clavier.preventDefault();
};

// IHM
var clickMenu = function(){
   var nv = this.parentElement.tagName;
   if(parenteCliquee(this.id)){
      if(this.parent("niveau").parent("niveau")) {
        elmts = this.parent("niveau").parent("niveau").wselecteurs(".cliquee");
        if( !elmts.vide() ) elmts.oteClasse("cliquee");
        wAjouteClasse(this.parentElement, "cliquee");
      }
   } else {
      elmts = wclasses("cliquee");
      if(! elmts.vide() ){
        wOteClasse(elmts, "cliquee");
      }
      wAjouteClasse(this.parentElement, "cliquee");
   }  };

var parenteCliquee = function(ident){
   elt = wid(ident);
   var retour = false;
   if(elt){
      while(elt = elt.parentElement){
         if(elt.aClasse("niveau")){
            if(elt.aClasse("cliquee")){
               return true;
            }
            // retour = elt.aClasse("cliquee");
         }
      }
   }
   return elt; };

var quelNiveau = function(ident){
   var elt = wid(ident);
   if(!elt) return null;
   var continuer = true;
   elt = elt.parentElement;
   if(elt.aClasse("niveau")){
    var niveau = 1;
    while (elt = elt.parentElement) {
      if(elt.aClasse("niveau")){
        niveau++;
      }
    }
   }
   return niveau;  };

window.addEventListener("load", function(){
   console.log("index.js 1.1");
   identifiantsUniques();
   // wselecteurs("input[type='radio'][name='inner']").ecouteurs("click", chgInnerHtml);

   /*MENU*/
   mnu = wselecteurs(".libelle");
   premnu = wselecteurs(".niveau");

   premnu.ecouteurs("click", function() {
      this.wselecteurs(".libelle")[0].declenche("click");
   });

   mnu.ecouteurs("click",  clickMenu);
   // mnu.ecouteurs("keypress", function(key){
    // if(key.code == 13){
       // this.declenche("click");
    // }
   // });

   
   /* TEST EVENMENTS KEY... */
   zonesaisie.addEventListener("keydown", appuyee);
   zonesaisie.addEventListener("keypress", pressee);
   zonesaisie.addEventListener("keyup", relachee);

   wbalises("body").ecouteurs("keydown", function (clavier) {
    switch(clavier.keyCode) {
      case 27:
        wclasses("cliquee").oteClasse("cliquee");  
        break;
    }
   });

   });
