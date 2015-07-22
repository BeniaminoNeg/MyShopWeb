define (function(require) {
	var Backbone = require('backbone');
	var Utils = require('utils');
  
	var MProdotto = require('../../models/MProdotto');
	var MSupermercato = require('../../models/MSupermercato');
	var MImmagine = require('../../models/MImmagine');

  
	var VBoxProdotto = Utils.Page.extend({
		constructorName: 'VBoxProdotto',
      
		Prodotto: MProdotto,
		Supermercato: MSupermercato,
		ImmagineProd: MImmagine,
		ImmagineSup: MImmagine,
      
		initialize: function(options) {
			this.template =Utils.templates.prodotto;
			this.Prodotto = options.Prodotto;
			this.Supermercato = options.Supermercato;
		},
      
		tagName: 'div',
		id: 'prodotto',

		events: {
			'click #tofollow': 'Follow'
		},
       
		render: function() {
			var JSON = this.Prodotto.toJSON();
			JSON['Supermercato'] = this.Supermercato.toJSON();
/*
 * prova inserire immagini nei model
			JSON['Immagine'] = this.Prodotto.get('Immagine').toJSON();
			JSON['Supermercato']['Logo'] = this.Supermercato.get('Logo').toJSON();
*/
			this.$el.html(this.template(JSON));
			this.checkPreferitoWeb();
			this.getImmagini();
			return this;
		},
       
		Follow: function (e) {
			if($(this.el).find('#tofollow').attr('class') == 'followed') {
				$(this.el).find('#tofollow').removeClass("followed");
				this.removePreferitoWeb($(this.el).find('#id').text());
				$(this.el).find('#tofollow').children('span').removeClass('icon icon-star-filled');
				$(this.el).find('#tofollow').children('span').addClass('icon icon-star');
			} else {
				$(this.el).find('#tofollow').addClass('followed');
				this.addPreferitoWeb($(this.el).find('#id').text());
				$(this.el).find('#tofollow').children('span').removeClass('icon icon-star');
				$(this.el).find('#tofollow').children('span').addClass('icon icon-star-filled');
			}
		},
       
		addPreferitoWeb: function(toFollow) {
			toFollow = {
				Idp: toFollow
			};

			var B = Backbone;

			Backbone.ajax({
            	url: "http://localhost/MyShopWeb/call.php?func=AddPref",
            	type: 'GET',
            	data: toFollow,
                success: function(response){
                	console.log('aggiunto');
                },
                error: function(errorType){
                    console.log(errorType);
                }
            });			
        },
        
        removePreferitoWeb: function(toUnfollow){
			toUnfollow = {
				Idp: toUnfollow
			};

			var B = Backbone;

			Backbone.ajax({
            	url: "http://localhost/MyShopWeb/call.php?func=RemPref",
            	type: 'GET',
            	data: toUnfollow,
                success: function(response){
                	console.log('rimosso');
                },
                error: function(errorType){
                	console.log(errorType);
                	/*
                    B.history.navigate('home', {
                        trigger: true,
                    });
					*/
                }
            });
        },
        
        checkPreferitoWeb: function() {
	        var utenteNome = window.localStorage.getItem('utenteNome');

	        var B = Backbone;

	        var thisView = this;

			if(utenteNome){	
	    		Backbone.ajax({
	            	url: "http://localhost/MyShopWeb/callnojson.php?func=SpotProdWeb",
	            	type: 'GET',
	                success: function(response){
	                	window.localStorage.setItem('currentFollowed', response);  

			    		var currentFollowed = window.localStorage.getItem('currentFollowed');

					    if(currentFollowed != null || currentFollowed == ''){
							var id = $(thisView.el).find('#id').text();
							if (currentFollowed.search(id) != '-1') {
								$(thisView.el).find('#tofollow').addClass('followed');
								$(thisView.el).find('#tofollow').children('span').removeClass('icon icon-star');
			        			$(thisView.el).find('#tofollow').children('span').addClass('icon icon-star-filled');
			        			console.log('modificato');
							}
						} 	                	            	
	                },
	                error: function(errorType){
	                	console.log(errorType);
	                	Backbone.history.navigate('home', {
	                		trigger: true,
	                		replace: true
		    			})
	                }
	    		}); 
	        }
        },
        
        getImmagini: function() {
        	var id = this.Prodotto.get('Id');
        	var ids = this.Supermercato.get('Ids');
        	this.ImmagineProd = new MImmagine();
        	this.ImmagineSup = new MImmagine();
        	this.ImmagineProd.setImmagine(id);
        	this.ImmagineSup.setImmagine(ids);
        	
        	var thisView = this;
        	
			this.ImmagineProd.fetch().done(function(data) {
				$(thisView.el).find('#imgProd').attr('src', 'data:image/' + thisView.ImmagineProd.get('Type') +';base64,' + thisView.ImmagineProd.get('Immagine'));
				thisView.ImmagineSup.fetch().done(function(data) {
					$(thisView.el).find('#imgSup').attr('src', 'data:image/' + thisView.ImmagineSup.get('Type') +';base64,' + thisView.ImmagineSup.get('Immagine'));
				})
			});
        	
			/*
        	var thisView = this;
        	$.getJSON(url, function(data) {
        		$(thisView.el).find('#imgProd').attr('src', data);
        		url = 'http://localhost/MyShopWeb/index.php?func=GetImmagine&Id=' + ids;
            	$.getJSON(url, function(data) {
            		$(thisView.el).find('#imgSup').attr('src', data);
            	})
        	})	
        	*/
        }
	});
	
	return VBoxProdotto;
});