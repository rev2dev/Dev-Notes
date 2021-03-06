<?php phpinfo(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="wCours.css">
	<script type="text/javascript" src="//localhost/ceam/projets/JS/CEAM.js"></script>
	<script type="text/javascript" src="index.js"></script>
 	<title>HELP !!! (PHP version)</title>
 	<style type="text/css">.liste_niveau > .niveau{ display: block; }</style>
</head>

<body id="haut" >
	<noscript>L'expérience utilisateur sera plus intense avec JavaScript activé... mais ce n'est pas obligatoire <div class="roth">:-)</div></noscript>
	<dl class="liste_niveau">
		<dt class="niveau"><h2 class="libelle">CSS</h2>
			<ul class="liste_niveau">
				<li class="niveau"><h3 class="libelle">Multi colonne</h3>
					<div class="liste_niveau">
						<code><pre>
							div {
								-webkit-column-count: 3; /* Chrome, Safari, Opera */
								-moz-column-count: 3; /* Firefox */
								column-count: 3;
							}
						</pre></code>
					</div>
				</li>
				<li class="niveau"><h3 class="libelle">Cacher</h3>
					<div class="liste_niveau">
						<code><pre>
							div{
								position: absolute;
								visibility: hidden;
							}
						</pre></code>
							déclaration équivalente à
						<code><pre>
							div{
								display: none;
							}
						</pre></code>
					</div>
				</li>
				<li class="niveau"><h3 class="libelle">Utiliser une nouvelle police</h3>
					<ol class="liste_niveau">
						<li class="niveau"><h4>Définition</h4>
							<p><code><pre>
								@font-face{
									font-family : "nomlocal";
									src : url('/chemin/du/fichier/police.ttf');
									font-weight : 200;
								}
							</pre></code></p>
						</li>
						<li class="niveau"><h4>Utilisation</h4>
							<p><code><pre>
								selecteur{
									font-family : "nomlocal";
									font-size : 14px;
								}</pre></code></p>
						</li>
						<li class="niveau"><h4>Type de fichier</h4>
							<p>Tous les formats de police ne sont pas reconnus par tous les navigateurs... </p>

						</li>
					</ol>
				</li>
				<li class="niveau"><h3 class="libelle">Variables CSS</h3>
					<style>
					  :root {
						-webkit-var-beautifulColor: rgba(255,40,100, 0.8);
						-moz-var-beautifulColor: rgba(255,40,100, 0.8);
						-ms-var-beautifulColor: rgba(255,40,100, 0.8);
						-o-var-beautifulColor: rgba(255,40,100, 0.8);
						var-beautifulColor: rgba(255,40,100, 0.8);
						--beautifulColor: rgba(255,40,100, 0.8);
					  }
					  #variablecss h4 {
						color: -webkit-var(--beautifulColor);
						color: -moz-var(--beautifulColor);
						color: -ms-var(--beautifulColor);
						color: -o-var(--beautifulColor);
						color: var(-beautifulColor);
						color: var(--beautifulColor);
					  }
					</style>
						<div class='liste_niveau' id="variablecss">
						  <h4>This is is styled with a color defined as a variable.</h4>
						</div>
				</li>
				<li class="niveau"><h3 class="libelle">Incrémentation</h3>
					<ol class="liste_niveau">
						<li class="niveau"><h4>counter-reset</h4>
							<p><code>selecteur{ counter-reset : <cite>compteur</cite>; }</code></p>
							<p>Le parent du sélecteur qui va être incrémenté</p>
						</li>
						<li class="niveau"><h4>counter-increment</h4>
							<p><code>selecteur{counter-increment : <cite>compteur</cite> <span title="valeur numérique, positive, nulle ou négative">intervalle</span>}</code></p>
							<p>Sélecteur CSS qui va définir la valeur de l'incrémentation de <cite>compteur</cite>, selon un pas équivalent à <cite>intervalle</cite>.</p>

						</li>
						<li class="niveau"><h4>content</h4>
							<p>la propriété CSS <code>content</code> n'affecte que les pseudo-éléments <code>::after</code> et <code>::before</code>.</p>
							<p><code>selecteur::before{ content : "texte " counter(<cite>compteur</cite>); }</code></p>
						</li>
					</ol>
				</li>
				<li class="niveau"><h3 class="libelle">Portée</h3>
					Si on cherche à annuler une clause CSS sur un sélecteur dont le style est défini plus <mark>haut</mark>, 
					il suffit de le redéfinir plus <mark>bas</mark>. Mais si le sélecteur est moins <mark>précis</mark>, il 
					n'est pas pris en compte. Ex : <code>.classe1 > .classe2 {}</code> est plus précis que <code>.classe2 {}</code>
				</li>

			</ul>
		</dt>
		
		<dt class="niveau"><h2 class="libelle" id="top">JAVASCRIPT</h2>
			<ul class="liste_niveau">
				<li class="niveau"><h3 class="libelle">DOCUMENT</h3>
					<ul class="liste_niveau">
						<li class="niveau"><h4>getElement...</h4>
							<p>Quand on utilise les fonctions </p>
							<ul>
								<li>document.getElementsByTagName</li>
								<li>document.getElementsByClassName</li>
								<li>document.getElementsByName</li>
							</ul>
							<p>on pourrait croire que le type d'argument retourné est un Array.</p>
							<p>Or, il n'en est rien, même si la manipulation des résultats se fait de la même manière. Les fonctions </p>
							<ul>
								<li>document.getElementsByTagName</li>
								<li>document.getElementsByClassName</li>
							</ul>
							<p>renvoient un objet <strong>HTMLCollection</strong>, tandis que </p>
							<ul>
								<li>document.getElementsByName</li>
							</ul>
							<p>renvoie un objet <strong>NodeList</strong>. </p>
							<p>Comme il s'agit tout de même de tableau, pour récupérer un élément de la liste ou de la collection, on utilise son indice numérique : <code>elements[1]</code>. On aura donc accès à ses propriétés <code>elements[4].innerHTML</code>, etc. </p>
							<p>Le seul inconvénient de ces listes est l'utilisation du <code>FOR(.. IN ..)</code>, l'équivalent JavaScript du <code>FOREACH</code> de PHP. Rappel : en JavaScript, un Array ne peut avoir que des indices numériques donc le parcours se fait ainsi :</p>
							<code><pre>

               var tableau = ["ceci", "est", 1, "array"];
               var chaine = "";
               for(i in tableau){
                  chaine += tableau[i] + "\t ";
               }
               //chaine = "ceci est 1 array "
							</pre></code>
							<p>Mais avec une liste (ou une collection) vous allez accéder à des "indices" non numériques. Rappelez-vous qu'en fait, tout est objet en javascript et donc qu'un Array est un objet dont les propriétés peuvent être récupérées par leur nom (0, 1, 2, ...) qui sont vus comme des indices d'un tableau. Sans entrer dans les détails, voici ce qu'il faut penser à faire pour parcourir une liste (collection) : </p>
							<code><pre>

                var elements = document.getElementsByClassName["DIV"];
                var chaine = "";
                for(i in elements){
                   <mark>if(!isNaN(i)){</mark>
                      chaine += elements[i].id + "\t ";
                   <mark>}</mark>
                }
                //chaine = "les id de toutes les div de la page "
							</pre></code>
						</li>
						<li class="niveau"><h4>NodeList != HTMLCollection</h4>
							<p>Tout élément d'une page est un <code>Node</code> (élément, attribut, texte,...). Les éléments HTML (dans <code>HTMLCollection</code>) sont des <code>Node</code> dont la propriété <code>.nodeType</code> est égale à 1 (constante <code>ELEMENT_NODE</code>)</p>
						</li>
					</ul>
				</li> <!-- méthodes -->
				<li class="niveau"><h3 class="libelle">Ajouter un élément à une page HTML</h3>
					<ol class="liste_niveau">
						<li><h4>Créer un élément</h4>
							<p>var elem = document.createElement("baliseHtml");</p>
						</li>
						<li><h4>Définir ses attributs</h4>
							<p>elem.setAttribute("attribut", "valeur";)</p>
						</li>
						<li><h4>Ajouter l'élément'</h4>
							<p>document.body.appendChild(elem);</p><p>ou</p>
							<p>elemntparent.appendChild(elem)</p>
						</li>
					</ol>
				</li> <!-- ajouter -->
				<li class="niveau"><h3 class="libelle">Modifier une page dynamiquement</h3>
					<ol class="liste_niveau">
						<li class="niveau"><h4>innerHTML</h4>
							<fieldset>
								<label>sélection<input type="radio" name="inner" value="select"></label>
								<label>lien			<input type="radio" name="inner" value="link" ></label>
							</fieldset><br>
							<div class="code">
								<code>&lt;div id=&quot;element&quot;&gt;</code>
								<div ><code id="elementInnerHtml" style="margin-left:10px;"></code> </div>
								<code>&lt;/div&gt;</code>
							</div>
							<div class="wysiwyg" id="elementInnerHtmlWYS">
							</div>
						</li>
					</ol>
				</li>
				<li class="niveau"><h3 class="libelle">Les Constantes</h3>
					<ol class="liste_niveau">
						<li><h4>Affectations</h4>
							<p>Utilisez le mot résérvé <mark>const</mark>. <span class="rappel">Rappel : par convention, les constantes sont en majuscules</span></p>
							<p>ex: </p>
							<code><pre>
					const A="constanteA", PI=3.1415927;
							</pre></code>
						</li>
						<li><h4>Nommage</h4>
							<p>Par convention, le nom de la constante sera en MAJUSCULE</p>

						</li>
					</ol>
				</li> <!-- constantes -->
				<li class="niveau"><h3 class="libelle">Les Chaînes de Caractères</h3>
					<ol class="liste_niveau">
						<li><h4>Caractère</h4>
							<p>On peut accéder à un caractère par sa position dans la chaîne :</p>
							<code>chaine[position] &lt;=&gt; chaine.substr(position, 1)</code>
						</li>
						<li><h4>Dernier caratère d'une chaîne</h4>
							<code>
								var chaine = "ceci est une chaîne de caratères.";
								<ol class="version">
									<li><cite>var fin = chaine.substr(this.length-1,1);</cite></li>
									<li><cite>var fin = chaine.substr(-1, 1);</cite></li>
								</ol>
									fin = "."
								<ol class="version">
									<li><cite>chaine = chaine.substr(0, chaine.length-1);</cite></li>
									<li><cite>chaine = chaine.substring(-2, str.length-1);</cite></li>
								</ol>
								chaine = "ceci est une chaîne de caratères"
							</code>
						</li>
						<li><h4>Sous-chaîne : la différence entre <code>slice</code>, <code>substring</code> et <code>substr</code></h4>
							<p>Les trois méthodes renvoient un chaîne tronquée : </p>
							<ul>
								<li>slice(indiceDebut, indiceFinNonInclu)</li>
								<li>substring(indiceDebut, indiceFinNonInclu)</li>
								<li>substr(indiceDebut[, nombreDeCaracteres])</li>
							</ul>
							<p>La différence entre  <code>slice</code> et <code>substring</code></p>
							<ul>
								<li>Un indice négatif sera interprété comme 0 (premier caratère de la chaîne) pour <code>substring</code></li>
								<li>Dans le même cas, <code>slice</code> renverra "" (chaîne vide)</li>
							</ul>
						</li>
						<li><h4>Remplacement d'une sous-chaîne : replace</h4>
							<code>replace("chaine_recherchee", "chaine_remplacante")</code>
							La méthode renvoie une chaîne.
						</li>
					</ol>
				</li><!-- chaîne -->
				<li class="niveau"><h3 class="libelle">Les Tableaux</h3>
					<ul class="liste_niveau">
						<li class="niveau"><h4>Déclaration</h4>
							<ol>
								<li><code>var tableau = [];</code></li>
								<li><code>var tableau = new Array();</code></li>
							</ol>
						</li>
						<li><h4>Indice chaîne de caractères</h4>
							<p>Bien qu'il ne soit pas possible, en théorie, de créer des indices de tableau de type string comme en php, il existe une astuce. </p>
							<p>Il faut se rappeler que tout est objet en JavaScript. Donc un Array est un objet. Si on ajoute une valeur comme suit :</p>
							<code>tableau['chaine'] = valeur</code>, cela revient à créer une propriété <cite>chaine</cite> à l'objet <cite>tableau</cite>.
							<p>Il devient alors possible de récupérer la valeur par deux syntaxes :</p>
							<ul>
								<li><code>tableau['chaine']</code> comme un indice de tableau</li>
								<li><code>tableau.chaine</code> comme la propriété d'un objet</li>
							</ul>
							<p>Néanmoins, il faut garder à l'esprit que, pour le compilateur JavaScript, un tableau n'a que des indices numériques. Donc :</p>
							<h5>Restrictions pour les valeurs des indices string</h5>
							<ol class="liste_niveau">
								<li>Elles ne sont pas comptabilisés dans la propriété <cite>.length</cite></li>
								<li>Les méthodes comme <cite>.indexOf</cite> ne les prennent pas en compte</li>
								<li>Les indices sont sensible à la casse</li>
								<li>Par contre, le parcours par <code>for(i in tableau)</code> atteint les valeurs des indices string (ce qui peut permettre de compter le nombre de valeurs)</li>
							</ol>
							<p>En conclusion, il s'agit d'un gadget qui peut être pratique si on veux absolument utiliser des noms précis pour les indices, mais on ne peut plus considérer l'objet comme un tableau (en ce qui concerne ces indices string)</p>
						</li>
					</ul>
				</li><!-- chaîne -->
				<li class="niveau"><h3 class="libelle">REGEX</h3>
					<ol class="liste_niveau"><h4>Search</h4>
						<li class="niveau">méthode search(motif) : </li>
					</ol>
				</li>
				<li class="niveau" id="temp"><h3 class="libelle">Valeurs fausses</h3>
					<ul class="liste_niveau">
						<li class="niveau" ><h4 id="lifalse" class="libelle">False</h4>
							<ul class="liste_niveau">
								<li>chaîne vide ""</li>
								<li>numérique 0</li>
								<li>undefined</li>
								<li>null</li>
								<li>Attention ! : en js un array vide n'est pas <i>égal</i> false
									<code>[] == false</code> vaut <cite>true</cite>
									Mais
									<code>[] ? true : false;</code> vaut
									 <cite>true</cite> contrairement à PHP.
									Mais pour autant <code>unarray == true</code> vaut toujours <cite>false</cite>
								</li>
							</ul>
						</li>
						<li class="niveau" id="comparaisons"><h4 class="libelle">Comparaison</h4>
							<ul class="liste_niveau">
								<li><code>null == undefined</code> = <code>true</code></li>
								<li><code>null === undefined</code> = <code>false</code></li>
								<li><code>false == null</code> = <code>false</code></li>
								<li><code>false === undefined</code> = <code>false</code></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="niveau"><h3 class="libelle">Méthodes</h3>
					<div class="liste_niveau"><pre>
						// constructor function
						function MyClass () {
						  var privateVariable; // private member only available within the constructor fn

						  this.privilegedMethod = function () { // it can access private members
						    //..
						  };
						}

						// A 'static method', it's just like a normal function
						// it has no relation with any 'MyClass' object instance
						MyClass.staticMethod = function () {};

						MyClass.prototype.publicMethod = function () {
						  // the 'this' keyword refers to the object instance
						  // you can access only 'privileged' and 'public' members
						};

						var myObj = new MyClass(); // new object instance

						myObj.publicMethod();
						MyClass.staticMethod();
					</pre></div>
				</li>
				<li class="niveau"><h3 class="libelle">OBJETS</h3>
					<ul class="liste_niveau">
						<li class="niveau"><h4>Savoir si un objet à cette propriété</h4>
							<p>Il suffit de comparer <cite>objet.propriete</cite> strictement avec <cite>undefined</cite></p>
							<p>ex: <code>document.onwheel !== undefined</code></p>
						</li>
					</ul>
				</li>

				<li class="niveau"><h3 class="libelle">ÉVÈNEMENTS</h3>
					<ul class="liste_niveau">
						<li class="niveau"><h4>BeforeUnload</h4>
							<p>Pour que cet évènement soit déclenché (par Firefox), la gestionnaire doit retourner une chaîne !</p>
							ex:
							<pre><code>
							window.onload = function(){
							                    //instructions;
							                    return "";
							                }
							</code></pre>
						</li>
					</ul>
				</li>

				<li class="niveau"><h3 class="libelle">ERREURS</h3>
					<div class="liste_niveau">
						<code><pre>
							var logMyErrors = function(err){
							 console.log(err);
							}
							try {
							   throw "myException"; // generates an exception
							}
							catch (e) {
							   // statements to handle any exceptions
							   logMyErrors(e); // pass exception object to error handler
							}
						</pre></code>
						<code><pre>
							try {
							    myroutine(); // may throw three types of exceptions
							} catch (e if e instanceof TypeError) {
							    // statements to handle TypeError exceptions
							} catch (e if e instanceof RangeError) {
							    // statements to handle RangeError exceptions
							} catch (e if e instanceof EvalError) {
							    // statements to handle EvalError exceptions
							} catch (e) {
							    // statements to handle any unspecified exceptions
							    logMyErrors(e); // pass exception object to error handler
							}
						</pre></code>
					</div>
				</li>

			</ul>
		</dt><!-- JAVASCRIPT  -->
		
		<dt class="niveau"><h2 class="libelle">SQL</h2>
			<ul class="liste_niveau">
				<li class="niveau"><h3 class="libelle">UTF8</h3>
					<p class="liste_niveau">ALTER TABLE &lt;table_name&gt; CONVERT TO CHARACTER SET utf8;</p>
				</li>
			</ul>
		</dt>
		
		<dt class="niveau"><h2 class="libelle">HTML</h2>
			<ul class="liste_niveau">
				<li class="niveau"><h3 class="libelle">ATTRIBUTS</h3>
					<ul class="liste_niveau">
						<li class="niveau"><h4>contenteditable</h4>
							Rendre un élément contenant du texte (div, p, span, ...) modifiable  : Ajouter l'attribut <code>contenteditable</code>
						</li>
					</ul>

				</li>
			</ul>
		</dt>
		
		<dt class="niveau"><h2 class="libelle">SEO</h2>
			<ul class="liste_niveau">
				<li class="niveau"><h3 class="libelle">&lt;meta description&gt;</h3>
					<p>70 caractères (150 maximum)</p>
				</li>
				<li class="niveau"><h3 class="libelle">&lt;h1&gt;</h3>
					<p>Plusieurs &lt;h1&gt; dans une même page (html 4)</p>
					<p>Un &lt;h1&gt; par section </p>
				</li>
				<li class="niveau"><h3 class="libelle">Liens</h3>
					<p>30 à 80 caractères max</p>
					<p>pas de liens cachés</p>
				</li>
				<li class="niveau"><h3 class="libelle">&lt;img&gt; : Attribut alt</h3>
					<p>contenu important surtout pour les images cliquables</p>
				</li>
				<li class="niveau"><h3 class="libelle">Ratio : mots clés / page</h3>
					<p>entre 2% et 7%</p>
				</li>
				<li class="niveau"><h3 class="libelle">Attribut itemscope itemtype itemprop</h3>
					<p></p>
				</li>
			</ul>
		</dt>
		
		<dt><h2 class="libelle">JS : test KeyboardEvent</h2>
			<button onclick="zonesaisie.value=''; zoneresultat.value='';">X</button><br>
			<div class="testevent">
				<textarea id="zonesaisie" spellcheck="false" rows=20></textarea>
				<textarea id="zoneresultat" spellcheck="false" rows=20></textarea>
			</div>
		</dt>
	</dl><!-- liste_niveau -->

	<div id="code" > </div>
	<div id="resultat">
	</div>

	<div id="bas"></div>
	<br><br>
	<a href="#haut">
		<button style="display:block; bottom:0; right:0; position:fixed">^</button>
	</a>
	<a href="#bas">
		<button style="display:block; top:0; right:0; position:fixed; transform:rotate(180deg)">^</button>
	</a>

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
