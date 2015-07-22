define (function(require) {
	var Backbone = require('backbone');
	var Utils = require('utils');
  
	var VHome = require('views/pages/VHome');
	

	var VLogIn = Utils.Page.extend({
		constructorName: 'VLogIn',
            
		initialize: function(options) {
			this.template=Utils.templates.login;
		},
      
		tagName: 'form',
		classsName: "input-group",

		events: {
			'click #btnLoggati': 'Loggati',
		},
                
                Loggati: function() {
                    var email = this.$el.find('#email').attr('value');
                    var password = this.$el.find('#password').attr('value');
                    var data = "email="+email+"&password="+password;
                    $("#btnLoggati").click(function(){
                        console.log("Log effettuata");
                        $.ajax({
                        type: "POST",
                        url: "https://localhost/MyShopWeb/callnojson.php?func=LogIn",
                        data: data,
                        dataType: "html",
                        success: function(){
                        console.log("Log effettuata");
                    }
                        /*if(risposta=== '1') {
                        thisView.$el.find("#formSignin").children().remove();
                        thisView.$el.find("#formSignin").append(
                        '<div class="content-padded"> <h1> Login Effettuato con Successo!</h1></div>'
                        );}
                       Backbone.history.navigate('home' , {
		        trigger: true,
		        });}
                    })*/})
		});
            },
       
		render: function() {
			this.$el.html(this.template());
			return this;
		},
       
		
       
	});
  
	return VLogIn;
});
