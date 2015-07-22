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

            'click #logout': 'LogOut'
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
			var B = Backbone;
            
            Backbone.ajax({
            	url: "http://localhost/MyShopWeb/call.php?func=LogOut",
            	data: utente,
            	type: 'POST',
                success: function(response){
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

	    showBenvenuto: function(text) {
			document.getElementById('benvenuto').innerHTML= text;
	    },
	});
	
	return StructureView;
});