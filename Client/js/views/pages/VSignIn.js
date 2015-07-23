define (function(require) {
	var Backbone = require('backbone');
	var Utils = require('utils');
  
	var VHome = require('views/pages/VHome');
	

	var VSignIn = Utils.Page.extend({
		constructorName: 'VSignIn',

        erroreDati: '',
            
		initialize: function(options) {
			this.template=Utils.templates.signin;
            if(options != undefined){
                this.erroreDati = options.erroreDati;
            }
		},
      
        tagName: 'ul',
        id: 'tabella',
        className: 'table-view',
		
		events: {
			'click .registrati': 'Registrati',
            'blur .emailUtente': 'checkEsistenzaEmail', 
            'click .redirect': 'Redirect',
		},
        
        render: function() {
            if (this.erroreDati == 'sbagliato') {
                this.$el.html(this.template());
                this.showErrore(); //è come se non partisse, ma se lo eseguo nell'else funziona, la sesta in VLogIn funziona
            } else { 
                this.$el.html(this.template());
            }
            return this;
        },    

        Registrati: function() {  
            var utente = {
            		nome: this.$el.find('.nomeUtente').attr('value'),
            		cognome: this.$el.find('.cognomeUtente').attr('value'),
            		email: this.$el.find('.emailUtente').attr('value'), 
            		password: this.$el.find('.passwordUtente').attr('value'),
            }
            
            //qui ci va una if su un'espressione regolare che verifica i dati, anzi delle call a funzioni che fanno check dei dati così da poterli usare anche per il check istantaneo quando unbluro un campo

            var B = Backbone;
            
            Backbone.ajax({
            	url: "http://localhost/MyShopWeb/callnojson.php?func=Reg",
            	data: utente,
            	type: 'POST',
                success: function(response){
                    if(response == true){
                        window.localStorage.setItem('utenteNome', utente['nome']);
                        window.localStorage.setItem('utenteCognome', utente['cognome']);
                        window.localStorage.setItem('utenteEmail', utente['email']);
                        window.localStorage.setItem('utentePassword', utente['password']);

                        B.history.navigate('loginAppenaRegistrato', {
                            trigger: true,
                            replace: true
                        }); 
                    } else {
                        B.history.navigate('signin/erroreDati', {
                            trigger: true,
                            replace: true
                        });
                    }
                },
                error: function(){
                    B.history.navigate('signin', {
                        trigger: true,
                        replace: true
                    });
                }
            });
	    },

        checkEmail: function(e){
            console.log(e);
            var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            //return re.test(e);
        },

        checkEsistenzaEmail: function(){
            console.log(this.$el.find('.emailUtente').attr('value'));
            var email = {
                email: this.$el.find('.emailUtente').attr('value')
            }
            Backbone.ajax({
                url: "http://localhost/MyShopWeb/callnojson.php?func=MailUnica",
                data: email,
                type: 'GET',
                success: function(response){
                            if(response == false){
                                alert('email già usata');
                            }
                        } ,
                error: function(errorType){
                    console.log(errorType);
                }
            });
        },

        showErrore: function(){
            this.$el.find('#errore').removeClass('displaynone');
        },

        Redirect: function(){
            Backbone.history.navigate('login', {
                trigger: true,
                replace: true
            });
        }
    });

	return VSignIn;
});


