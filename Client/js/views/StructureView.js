define(function(require) {
	var $ = require('jquery');
	var Backbone = require('backbone');
	var Utils = require('utils');

	var StructureView = Backbone.View.extend({
		constructorName: 'StructureView',
	
		id: 'main',
	
		events: {
			'click #nav1': 'goToHome',
			'click #nav2': 'goToSpotlight',
			'click #nav3': 'goToCategorie',
			'click #nav4': 'goToMarket',
			'click #nav5': 'goToRicerca',
            'click #nav6': 'goToSignIn',
            'click #nav7': 'goToLogIn',

            'click #nav10': 'LogOut'
		},
	
	    initialize: function(options) {
	    	// load the precompiled template
	    	this.template = Utils.templates.structure;
	    	//this.on("inTheDOM", this.rendered);
	    	//bind the back event to the goBack function
	    	//document.getElementById("back").addEventListener("back", this.goBack(), false);
	    },
	
	    render: function() {
	    	// load the template
	    	this.el.innerHTML = this.template({});
	    	// cache a reference to the content element
	    	this.contentElement = this.$el.find('#content')[0];
	    	return this;
	    },
	
	    goToHome: function(e) {
	    	Backbone.history.navigate('home', {
	    		trigger: true
	    	});
	    },
	       
	    goToSpotlight: function(e) {
	    	Backbone.history.navigate('spotlight', {
	    		trigger: true
	    	});
	    },
	       
	    goToCategorie: function(e) {
	    	Backbone.history.navigate('categorie', {
	        trigger: true
	        });
	       },
	       
		goToMarket: function(e) {
		    Backbone.history.navigate('markets', {
		    	trigger: true
		    });
		},
		   
		goToRicerca: function(e) {
			Backbone.history.navigate('ricerca', {
				trigger: true
			});
		},
		
        goToSignIn : function(e) {
			Backbone.history.navigate('signin', {
				trigger: true
			});
		},
                
		goToLogIn : function(e) {
			Backbone.history.navigate('login', {
				trigger: true
			});
		},

		LogOut: function(e) {

			var thisView = this;
			var B = Backbone;
            
            Backbone.ajax({
            	url: "http://myshopp.altervista.org/callnojson.php?func=LogOut",
            	type: 'GET',
                success: function(response){
                		window.localStorage.setItem('currentFollowed', '');
				        window.localStorage.setItem('utenteNome', '');
				        window.localStorage.setItem('utenteCognome', '');
				        window.localStorage.setItem('utenteEmail', '');
				        window.localStorage.setItem('utentePassword', '');
				        window.localStorage.setItem('utenteAdmin', '');	
				        console.log('svuotato');
				        thisView.showTabNonLoggato();
                		alert('Non sei più loggato! Noi siamo tristi :(');
                        
                        B.history.navigate('home', {
                            trigger: true,
                            replace: true
                        });
                },
                error: function(errorType){
                	console.log(errorType);
                }
            });
		},	
	
	    setActiveTabBarElement: function(elementId) {
	    	// here we assume that at any time at least one tab bar element is active
	    	document.getElementsByClassName('active')[0].classList.remove('active');
	    	document.getElementsByClassName('active')[0].classList.remove('active');
	    	document.getElementById(elementId).classList.add('active');
	    	document.getElementById(elementId).getElementsByClassName('tab-label')[0].classList.add('active');
	    },
		
		removeElementById: function(id) {
			if(document.getElementById(id)){
				document.getElementById(id).remove();
			}
		},

		showTabNonLoggato: function(){
			this.showHome();
			this.showSpotlight();
			this.showCategorie();
			this.showMarkets();
			this.showRicerca();
			this.showSignIn();
			this.showLogIn();
			this.hidePannelloAdmin();
			this.hideBenvenuto();
			this.hideLogOut();
		},

		showTabUtente: function(nome){
			this.showHome();
			this.showSpotlight();
			this.showCategorie();
			this.showMarkets();
			this.showRicerca();
			this.hideSignIn();
			this.hideLogIn();
			this.hidePannelloAdmin();
			this.showBenvenuto(nome);
			this.showLogOut();
		},

		showTabAdmin: function(nome){
			this.hideHome();
			this.hideSpotlight();
			this.hideCategorie();
			this.hideMarkets();
			this.hideRicerca();
			this.hideSignIn();
			this.hideLogIn();
			this.showPannelloAdmin();
			this.showBenvenuto(nome);
			this.showLogOut();
		},

//Hide methods		

	    hideHome: function(){
	    	if($(this.el).find('#nav1').css('pointer-events') != 'none'){
		    	$(this.el).find('#nav1').css('pointer-events', 'none');
				$(this.el).find('#nav1').children('span').addClass('displaynone');
			}
	    },

	    hideSpotlight: function(){
	    	if($(this.el).find('#nav2').css('pointer-events') != 'none'){
		    	$(this.el).find('#nav2').css('pointer-events', 'none');
				$(this.el).find('#nav2').children('span').addClass('displaynone');
			}
	    },

	    hideCategorie: function(){
	    	if($(this.el).find('#nav3').css('pointer-events') != 'none'){
		    	$(this.el).find('#nav3').css('pointer-events', 'none');
				$(this.el).find('#nav3').children('span').addClass('displaynone');
			}
	    },

	    hideMarkets: function(){
	    	if($(this.el).find('#nav4').css('pointer-events') != 'none'){
		    	$(this.el).find('#nav4').css('pointer-events', 'none');
				$(this.el).find('#nav4').children('span').addClass('displaynone');
			}
	    },

	    hideRicerca: function(){
	    	if($(this.el).find('#nav5').css('pointer-events') != 'none'){
		    	$(this.el).find('#nav5').css('pointer-events', 'none');
				$(this.el).find('#nav5').children('span').addClass('displaynone');
			}
	    },

	    hideSignIn: function(){
	    	if($(this.el).find('#nav6').css('pointer-events') != 'none'){
		    	$(this.el).find('#nav6').css('pointer-events', 'none');
				$(this.el).find('#nav6').children('span').addClass('displaynone');
			}
	    },    

	    hideLogIn: function(){
	    	if($(this.el).find('#nav7').css('pointer-events') != 'none'){
		    	$(this.el).find('#nav7').css('pointer-events', 'none');
				$(this.el).find('#nav7').children('span').addClass('displaynone');
			}
	    },	    

	    hidePannelloAdmin: function(){
	    	if($(this.el).find('#nav8').css('pointer-events') != 'none'){
		    	$(this.el).find('#nav8').css('pointer-events', 'none');
				$(this.el).find('#nav8').children('span').addClass('displaynone');
			}
	    },

	    hideBenvenuto: function(){
	    	if($(this.el).find('#nav9').css('pointer-events') != 'none'){
		    	$(this.el).find('#nav9').css('pointer-events', 'none');
				$(this.el).find('#nav9').children('span').addClass('displaynone');
				$(this.el).find('#nav9').children('span').text('');
			}
	    },

	   	hideLogOut: function(){
	    	if($(this.el).find('#nav10').css('pointer-events') != 'none'){
		    	$(this.el).find('#nav10').css('pointer-events', 'none');
				$(this.el).find('#nav10').children('span').addClass('displaynone');
			}
	    },

//Show methods

	    showHome: function(){
	    	if($(this.el).find('#nav1').css('pointer-events') != 'auto'){
		    	$(this.el).find('#nav1').css('pointer-events', 'auto');
				$(this.el).find('#nav1').children('span').removeClass('displaynone');
			}
	    },

	    showSpotlight: function(){
	    	if($(this.el).find('#nav2').css('pointer-events') != 'auto'){
		    	$(this.el).find('#nav2').css('pointer-events', 'auto');
				$(this.el).find('#nav2').children('span').removeClass('displaynone');
			}
	    },

	    showCategorie: function(){
	    	if($(this.el).find('#nav3').css('pointer-events') != 'auto'){
		    	$(this.el).find('#nav3').css('pointer-events', 'auto');
				$(this.el).find('#nav3').children('span').removeClass('displaynone');
			}
	    },

	    showMarkets: function(){
	    	if($(this.el).find('#nav4').css('pointer-events') != 'auto'){
		    	$(this.el).find('#nav4').css('pointer-events', 'auto');
				$(this.el).find('#nav4').children('span').removeClass('displaynone');
			}
	    },

	    showRicerca: function(){
	    	if($(this.el).find('#nav5').css('pointer-events') != 'auto'){
		    	$(this.el).find('#nav5').css('pointer-events', 'auto');
				$(this.el).find('#nav5').children('span').removeClass('displaynone');
			}
	    },

	    showSignIn: function(){
	    	if($(this.el).find('#nav6').css('pointer-events') != 'auto'){
		    	$(this.el).find('#nav6').css('pointer-events', 'auto');
				$(this.el).find('#nav6').children('span').removeClass('displaynone');
			}
	    },

	    showLogIn: function(){
	    	if($(this.el).find('#nav7').css('pointer-events') != 'auto'){
		    	$(this.el).find('#nav7').css('pointer-events', 'auto');
				$(this.el).find('#nav7').children('span').removeClass('displaynone');
			}
	    },	    

	    showPannelloAdmin: function(){
	    	if($(this.el).find('#nav8').css('pointer-events') != 'auto'){
		    	$(this.el).find('#nav8').css('pointer-events', 'auto');
				$(this.el).find('#nav8').children('span').removeClass('displaynone');
			}
	    },

	    showBenvenuto: function(nome){
	    	if($(this.el).find('#nav9').css('pointer-events') != 'auto'){
		    	$(this.el).find('#nav9').css('pointer-events', 'auto');
				$(this.el).find('#nav9').children('span').removeClass('displaynone');
				$(this.el).find('#nav9').children('span').text(nome);
			}
	    },

	   	showLogOut: function(){
	    	if($(this.el).find('#nav10').css('pointer-events') != 'auto'){
		    	$(this.el).find('#nav10').css('pointer-events', 'auto');
				$(this.el).find('#nav10').children('span').removeClass('displaynone');
			}
	    }


	});
	
	return StructureView;
});