define(function(require) {
	var $ = require('jquery');
	var Backbone = require('backbone');
	
	var CollProdotti = require('collections/CollProdotti');
	var CollSupermercati = require('collections/CollSupermercati');
	  
	var StructureView = require('views/StructureView');
	var VHome = require('views/pages/VHome');
	//var VSpotlight = require('views/pages/VSpotlight');
	var VCategorie = require('views/pages/VCategorie');
	var VMarkets = require('views/pages/VMarkets');
	var VRicerca = require('views/pages/VRicerca');
	var VOffline = require('views/pages/VOffline');
    var VSignIn = require('views/pages/VSignIn');
    var VLogIn = require('views/pages/VLogIn');
	
	var AppRouter = Backbone.Router.extend({
		constructorName: 'AppRouter',
	
		routes: {
			// the default is the structure view  
			//SINISTRA path della view DESTRA FUNZIONE definita dentro al ROUTER
			'': 'showStructure', 
			'home':'Home',
			'spotlight':'Spotlight',
			'categorie': 'Categorie',
			'categorie/:categoria': 'ProdottiCategoria',
			'markets': 'Markets',
			'markets/:market': 'ProdottiMarket',
			'ricerca': 'Ricerca',
			'ricerca/:value': 'ProdottiRicerca', 
			'offline': 'Offline',
            'signin': 'Signin',
            'signinErroreDati': 'SignInErroreDati',
            'login':'LogIn',
            'loginAppenaRegistrato': 'LogInConDati',
            'loginErroreDati': 'LogInErroriDati'
			//note/:id/view: "show" oppure note/:id/edit : "edit" Nello show è definito un ID random 
			//quindi la rotta utilizza il criterio del longest match!!!!!!!!!
		},
	
		firstView: 'home',
	
		initialize: function(options) {
			document.addEventListener('offline', this.onOffline, false);
			this.currentView = undefined;
		},
		
		Home: function() {
			// highlight the nav1 tab bar element as the current one
			this.structureView.setActiveTabBarElement('nav1');
	
			var listaProdotti = new CollProdotti();
			var listaSupermercati = new CollSupermercati();
	  
			var thisRouter = this;
			
			listaProdotti.setProdottiHome();
			listaProdotti.fetch().done(function(data) {
				var IdsProdotti = listaProdotti.getIdsProdotti();    	  
				listaSupermercati.setSupHome(IdsProdotti);
				listaSupermercati.fetch().done(function(data) {
					// create the view
					var page = new VHome({
						listaProdotti: listaProdotti,
						listaSupermercati: listaSupermercati
					});
					// show the view
					thisRouter.changePage(page);
				})
			});
		},
/*
 * prova inserire immagini nei model
		Home: function() {
			// highlight the nav1 tab bar element as the current one
			this.structureView.setActiveTabBarElement('nav1');
			//set title
			this.structureView.setTitleContentElement('Home');
			//hide the back button
			this.structureView.setDisplayNoneBackBtnElement();
	
			var listaProdotti = new CollProdotti();
			var listaSupermercati = new CollSupermercati();
	  
			var thisRouter = this;
	  
			listaProdotti.setProdottiHome();
			listaProdotti.fetch().done(function(data) {
				var IdsProdotti = listaProdotti.getIdsProdotti();
				$.when(listaProdotti.getImmagini()).then(function(){
					listaSupermercati.setSupHome(IdsProdotti);
					listaSupermercati.fetch().done(function(data) {
						$.when(listaSupermercati.getImmagini()).then(function(){
							// create the view
							var page = new VHome({
								listaProdotti: listaProdotti,
								listaSupermercati: listaSupermercati
							});
							// show the view
							thisRouter.changePage(page);
						})
					})
				})
			});
	  },
*/
		Spotlight: function() {
			this.structureView.setActiveTabBarElement('nav2');

			var currentFollowed = window.localStorage.getItem('followed');

			var thisRouter = this;

			var B = Backbone;

			Backbone.ajax({
				url: "http://localhost/MyShopWeb/call.php?func=SpotProdWeb",
				type: 'POST',
			    success: function(response){
			    	console.log(response)
			        if(response != false){
			            window.localStorage.setItem('currentFollowed', response);

			            var currentFollowed = window.localStorage.getItem('currentFollowed');

			            var listaProdotti = new CollProdotti();
			  			var listaSupermercati = new CollSupermercati();    	   

						listaProdotti.setProdottiSpotlight(currentFollowed);
						listaProdotti.fetch().done(function(data) {
						  var IdsProdotti = listaProdotti.getIdsProdotti();    	  
						  listaSupermercati.setSupHome(IdsProdotti);
						  listaSupermercati.fetch().done(function(data) {
							  var page = new VHome({
								  listaProdotti: listaProdotti,
								  listaSupermercati: listaSupermercati
							  });
							  thisRouter.changePage(page);
						  })
						});
			        } else {
						var page = new VHome({
						  result : 'empty',
						});
						thisRouter.changePage(page);
			        }
			    },
			    error: function(){
			        B.history.navigate('signin', {
			            trigger: true,
			        });
			    }
			});
		},
	
	  Categorie: function() {
		  this.structureView.setActiveTabBarElement('nav3');

			  var page = new VCategorie({});
			  this.changePage(page);
	  },
	  
	  ProdottiCategoria: function(categoria){	
			var listaProdotti = new CollProdotti();
			var listaSupermercati = new CollSupermercati();
	  
			var thisRouter = this;
	  
			listaProdotti.setProdottiCategoria(categoria);
			listaProdotti.fetch().done(function(data) {
				var IdsProdotti = listaProdotti.getIdsProdotti();    	  
				listaSupermercati.setSupHome(IdsProdotti);
				listaSupermercati.fetch().done(function(data) {
					// create the view
					var page = new VHome({
						listaProdotti: listaProdotti,
						listaSupermercati: listaSupermercati
					});
					// show the view
					thisRouter.changePage(page);
				})
			});
	  },
	
		Markets: function() {
			this.structureView.setActiveTabBarElement('nav4');;
		 
			var thisRouter = this;
		 
			var listaSupermercati= new CollSupermercati();
			listaSupermercati.setSupMarket();
			listaSupermercati.fetch().done(function(data) {
				var page = new VMarkets({
					listaSupermercati: listaSupermercati,
				});
				thisRouter.changePage(page);
			});
		},
		
		ProdottiMarket: function(market){
		  var nomeSup = market.substring(7);
		  var Ids = market.substring(0,6);

			var listaProdotti = new CollProdotti();
			var listaSupermercati = new CollSupermercati();

			var thisRouter = this;

			listaProdotti.setProdottiMarket(Ids);
			listaProdotti.fetch().done(function(data) {
				console.log(listaProdotti);
				var IdsProdotti = listaProdotti.getIdsProdotti();  
				console.log(IdsProdotti);
				listaSupermercati.setSupHome(IdsProdotti);
				listaSupermercati.fetch().done(function(data) {
					// create the view
					console.log(listaProdotti);
					console.log(listaSupermercati);
					var page = new VHome({
						listaProdotti: listaProdotti,
						listaSupermercati: listaSupermercati
					});
					// show the view
					thisRouter.changePage(page);
				})
			});
		},
	
		Ricerca: function() {
			this.structureView.setActiveTabBarElement('nav5');
		    
		    var page = new VRicerca();
		    this.changePage(page);    	
		},
		
		ProdottiRicerca: function(value){	
			var listaProdotti = new CollProdotti();
			var listaSupermercati = new CollSupermercati();
	  
			var thisRouter = this;
	  
			listaProdotti.setProdottiRicerca(value);
			listaProdotti.fetch().done(function(data) {
				if(listaProdotti.getIdsProdotti() != ''){
					var IdsProdotti = listaProdotti.getIdsProdotti();    	  
					listaSupermercati.setSupHome(IdsProdotti);
					listaSupermercati.fetch().done(function(data) {
						// create the view
						var page = new VHome({
							listaProdotti: listaProdotti,
							listaSupermercati: listaSupermercati
						});
						thisRouter.addToPage(page, 'tabella')
					})
				} else {
					var page = new VHome({
						result: 'empty',
					});
					thisRouter.addToPage(page, 'tabella')
				}
				// show the view removing an elementById
			});
		},
		
        Signin: function() {
            this.structureView.setActiveTabBarElement('nav6');
    
            var page = new VSignIn();
            this.changePage(page);
        },

		SignInErroreDati: function(){
			this.structureView.setActiveTabBarElement('nav6');
    
            var page = new VSignIn({
            	erroreDati: 'sbagliato'
            });
            this.changePage(page)
		},

        LogIn: function() {
            this.structureView.setActiveTabBarElement('nav7');
    		
            var page = new VLogIn();
            this.changePage(page);
        },

        LogInConDati: function(){
        	this.structureView.setActiveTabBarElement('nav7');

        	var utente = {
        		nome: window.localStorage.getItem('utenteNome'),
                cognome: window.localStorage.getItem('utenteCognome'),                
                email: window.localStorage.getItem('utenteEmail'),
                password: window.localStorage.getItem('utentePassword'),
        	}

            var page = new VLogIn({
            	utente: utente,
            });
            this.changePage(page);
        },

        LogInErroriDati: function(){
        	this.structureView.setActiveTabBarElement('nav7');

            var page = new VLogIn({
            	erroreDati: 'sbagliato'
            });
            this.changePage(page);
        },

		Offline: function() {		    
		    var page = new VOffline();
		    this.changePage(page);
		},
		
		// load the structure view
		showStructure: function() {
			if (!this.structureView) {
		    this.structureView = new StructureView();
		    // put the el element of the structure view into the DOM
		    document.body.appendChild(this.structureView.render().el);
		    this.structureView.trigger('inTheDOM');
			}
			// go to first view
			this.navigate(this.firstView, {trigger: true});
		},
		
		onOffline: function(){
			console.log('offline');
	    	Backbone.history.navigate('offline', {
	    		trigger: true
	    	});
		},
	});
	return AppRouter;
});

/*
 * esecuzione con fetch annidata in .setProdottiHome(), non funziona e non so il motivo
 * 
	 		  $.when(function(data){
	    	  listaProdotti.setProdottiHome();
	    	  //listaSupermercati.setSupHome();
	      }).then(function(data){
	          // create the view
	          var page = new VHome({
	            listaProdotti: listaProdotti,
	            listaSupermercati: listaSupermercati
	          });
	          // show the view
	          thisRouter.changePage(page);
	      });
	*/

// create a model with an arbitrary attribute for testing the template engine
/*
 * collection di esempio
 * 
var listaProdotti = new CollProdotti([
                              		{
                              		  "Id":"009",
                              		  "Nome":"Riso Scotti ai funghi porcini",
                              		  "Immagine": "../img/es_prodotto.jpg",
                              		  "Descrizione":"Riso scotti ai funghi porcini 210g",
                              		  "Prezzo":"1.55",
                              		  "Ids":"00002"
                              		},
                              		  
                              		{
                              		  "Id":"010",
                              		  "Nome":"Riso scotti agli asparagi",
                              		  "Immagine": "../img/es_prodotto.jpg",
                              		  "Descrizione":"Riso scotti agli asparagi gr.210",
                              		  "Prezzo":"1.55",
                              		  "Ids":"00001"
                              		}
                              ]);

  var listaSupermercati = new CollSupermercati([
  	  {
  	  	  "Nome":"Tigre",
  		  "Logo": "../img/es_logo.png",
  		  "Indirizzo":{"Via":"Via Preturo",
  			  					"Citt\u00e0":"Coppito",
  			  					"NumeroCivico":null},
  		  "Id":"00002"},
  		  {"Nome":"Conad",
  			  "Logo": "../img/es_logo.png",
  			 "Indirizzo":{"Via":"Via Giuseppe Saragat",
  				 				   "Citt\u00e0":"L'Aquila",
  				 				   "NumeroCivico":null},
  			 "Id":"00003"},
  			 {"Nome":"Conad",
     			  "Logo": "../img/es_logo.png",
     			 "Indirizzo":{"Via":"Via Giuseppe Saragat",
     				 				   "Citt\u00e0":"L'Aquila",
     				 				   "NumeroCivico":null},
     			 "Id":"00004"},
     			{"Nome":"Conad",
     			  "Logo": "../img/es_logo.png",
     			 "Indirizzo":{"Via":"Via Giuseppe Saragat",
     				 				   "Citt\u00e0":"L'Aquila",
     				 				   "NumeroCivico":null},
     			 "Id":"00005"},
     			{"Nome":"Conad",
     			  "Logo": "../img/es_logo.png",
     			 "Indirizzo":{"Via":"Via Giuseppe Saragat",
     				 				   "Citt\u00e0":"L'Aquila",
     				 				   "NumeroCivico":null},
     			 "Id":"00006"},
     			{"Nome":"Conad",
     			  "Logo": "../img/es_logo.png",
     			 "Indirizzo":{"Via":"Via Giuseppe Saragat",
     				 				   "Citt\u00e0":"L'Aquila",
     				 				   "NumeroCivico":null},
     			 "Id":"00001"}
  		  ]);

*/