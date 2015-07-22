define (function(require) {
	var Backbone = require('backbone');
	var Utils = require('utils');
  
	var VHome = require('views/pages/VHome');
	

	var VLogIn = Utils.Page.extend({
		constructorName: 'VLogIn',
        
        utente: '',
        erroreDati: '',

		initialize: function(options) {
			this.template = Utils.templates.login;
			if(options != undefined){
				if(options.utente != undefined){
					this.utente = options.utente;
				}else if(options.erroreDati != undefined){
					this.erroreDati = options.erroreDati;}
			}
		},
      
        tagName: 'div',
        className: 'bar bar-standard bar-header-secondary scrollable',

		events: {
			'click .loginUtente': 'LogInUtente',
            'click .loginAdmin': 'LogInAdmin',
            'click .redirect': 'Redirect',
		},
        
		render: function() {
			if(this.erroreDati == 'sbagliato'){
				this.$el.html(this.template());
                this.showErrore();
		    } else if (this.utente != '') {
				this.$el.html(this.template(this.utente));
			} else { this.$el.html(this.template());}
			return this;
		},

        LogInUtente: function() {

            var utente = {
            		email: this.$el.find('.emailUtente').attr('value'), 
            		password: this.$el.find('.passwordUtente').attr('value'),
            }

            var B = Backbone;

            Backbone.ajax({
            	url: "http://localhost/MyShopWeb/callnojson.php?func=LogIn",
            	data: utente,
            	type: 'POST',
                success: function(response){
                    if(response != false){
                        window.localStorage.setItem('utenteEmail', utente['email']);
                        window.localStorage.setItem('utentePassword', utente['password']);

                        B.history.navigate('home', {
                            trigger: true,
                            replace: true,
                        }); 
                    } else {
                        B.history.navigate('loginErroreDati', {
                            trigger: true,
                            replace: true
                        });
                    }
                }, 
                error: function(errorType){
                	B.history.navigate('login', {
	                    trigger: true,
	                    replace: true,
	                }); 
                }       
            });
		},

        LogInAdmin: function() {

            var utente = {
                    username: this.$el.find('.usernameAdmin').attr('value'), 
                    password: this.$el.find('.passwordAdmin').attr('value'),
            }

            var B = Backbone;

            Backbone.ajax({
                url: "http://localhost/MyShopWeb/callnojson.php?func=LogInAdmin",
                data: utente,
                type: 'POST',
                success: function(response){
                    if(response != false){
                        window.localStorage.setItem('utenteEmail', utente['email']);
                        window.localStorage.setItem('utentePassword', utente['password']);
                        window.localStorage.setItem('utenteAdmin', 'si');

                        B.history.navigate('admin', {
                            trigger: true,
                            replace: true,
                        }); 
                    } else {
                        B.history.navigate('loginErroreDati', {
                            trigger: true,
                            replace: true
                        });
                    }
                }, 
                error: function(errorType){
                    B.history.navigate('login', {
                        trigger: true,
                        replace: true,
                    }); 
                }       
            });
        },

		showErrore: function(){
            this.$el.find('#errore').removeClass('displaynone');
        },

        Redirect: function(){
            Backbone.history.navigate('signin', {
                trigger: true,
                replace: true
            });
        }
	});
  
	return VLogIn;
});
