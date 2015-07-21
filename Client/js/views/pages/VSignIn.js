define (function(require) {
	var Backbone = require('backbone');
	var Utils = require('utils');
  
	var VHome = require('views/pages/VHome');
	

	var VSignIn = Utils.Page.extend({
		constructorName: 'VSignIn',
            
		initialize: function(options) {
			this.template=Utils.templates.signin;
		},
      
		

		events: {
			'click #btnRegistrati': 'Registrati',
		},
                
                Registrati: function() {
               
                    var nome = this.$el.find('#nome').attr('value');
                    var cognome = this.$el.find('#cognome').attr('value');
                    var email = this.$el.find('#email').attr('value');
                    var password = this.$el.find('#password').attr('value');
                    var data = "nome="+nome+"&cognome="+cognome+"&email="+email+"&password="+password;
                    var thisView = this;
                    //console.log(data);

                    $.post("http://localhost/MyShopWeb/callnojson.php?func=Reg", data, function(risposta){
                    	console.log('ciao');
                    	console.log(risposta);
                        if (risposta == 1)
                        thisView.$el.find("#PgRegistrazione").children().remove();
                        thisView.$el.find("#PgRegistrazione").append(
                        '<div class="content-padded"> <h1> Registrazione Effettuata con Successo!</h1></div>'
                        );
                    })
                    console.log("Registrazione effettuata");
                    //$('#formSignin').remove();
                    //$('#formSignin').append(
                      // '<div class="content-padded"> <h1> Registrazione Effettuata con Successo!</h1></div>'
                       // );
                    
                Backbone.history.navigate('home' , {
		        trigger: true,
		        });
                   
                    
                },
       
       
       
		render: function() {
			this.$el.html(this.template());
			return this;
		},
       
		
       
	});
  
	return VSignIn;
});


