define(function(require){

    var Backbone = require('backbone');
    var Utils = require('utils');

    var VAmministratore = Utils.Page.extend({
        constructorName: 'VAmministratore',

        initialize: function(options) {
        this.template=Utils.templates.admin;
        },

        tagName: 'div',
        className: 'bar bar-standard bar-header-secondary scrollable',

        events: {
            'click #BtnAddImg': 'AddImmagine', //Devo vedere gli id e le classi sul template
            'click #BtnUpdateImg': 'UpdateImmagine', //Devo vedere gli id e le classi sul template  
            'click #BtnRemoveImg': 'RemoveImmagine', //Devo vedere gli id e le classi sul template
            'click #BtnAddProd': 'AddProd', //Devo vedere gli id e le classi sul template
            'click #BtnUpdateProd': 'UpdateProd', //Devo vedere gli id e le classi sul template 
            'click #BtnRemoveProd': 'RemoveProd', //Devo vedere gli id e le classi sul template
            'click #BtnAddSup': 'AddSupermercato', //Devo vedere gli id e le classi sul template
            'click #BtnUpdateSup': 'UpdateSupermercato', //Devo vedere gli id e le classi sul template  
            'click #BtnRemoveSup': 'RemoveSupermercato', //Devo vedere gli id e le classi sul template
            'click #BtnUpdateUt': 'UpdateUtente', //Devo vedere gli id e le classi sul template 
            'click #BtnRemoveUt': 'RemoveUtente', //Devo vedere gli id e le classi sul template

        },

        render: function() {
            this.$el.html(this.template());
            return this;
        }, 

        AddImmagine: function() { 

                var dati = {
                    Id: this.$el.find('#idImgAdd').attr('value'),
                    Size: this.$el.find('#SizeImgAdd').attr('value'),
                    Type: this.$el.find('#TypeImgAdd').attr('value'), 
                    Immagine_originale: this.$el.find('#ImgAdd').attr('value'),
                }

                Backbone.ajax({
                    url: "http://localhost/MyShopWeb/callnojson.php?func=AdminAddImg",
                    data: dati,
                    type: 'GET',
                    success: function(response){
                        if(response == 'Immagine Aggiunta Con Successo'){
                            alert(response);
                        }
                    }
                }) 
        },

        UpdateImmagine: function() { 

                var dati = {
                    Colonna: this.$el.find('#colImgUpdate').attr('value'),
                    Valore: this.$el.find('#valImgUpdate').attr('value'),
                    ValChiave: this.$el.find('#idImgUpdate').attr('value'), 
                }
                Backbone.ajax({
                    url: "http://localhost/MyShopWeb/callnojson.php?func=AdminUpdateImg",
                    data: dati,
                    type: 'GET',
                    success: function(response){
                        if(response == 'Immagine Modificata Con Successo'){
                            alert(response);
                        }
                    }
                }) 
        },

        RemoveImmagine: function() { 

                var dati = {
                    Id : this.$el.find('#IdImgRemove').attr('value')
                }
                Backbone.ajax({
                    url: "http://localhost/MyShopWeb/callnojson.php?func=AdminRemoveImg",
                    data: dati,
                    type: 'GET',
                    success: function(response){
                        if(response == 'Immagine Rimossa Con Successo'){
                            alert(response);
                        }
                    }
                }) 
        },

        AddProd: function() { 

                var dati = { 
                    Id: this.$el.find('#idProdAdd').attr('value'),
                    Nome: this.$el.find('#NomeProdAdd').attr('value'),
                    Descrizione: this.$el.find('#DescrProdAdd').attr('value'), 
                    Prezzo: this.$el.find('#PrezzoProdAdd').attr('value'),   
                    Ids: this.$el.find('#SupProdAdd').attr('value'),
                    Categoria: this.$el.find('#CatProdAdd').attr('value'),

                }
                console.log(dati);
                Backbone.ajax({
                    url: "http://localhost/MyShopWeb/callnojson.php?func=AdminAddProd",
                    data: dati,
                    type: 'GET',
                    success: function(response){
                        if(response == 'Prodotto Rimosso Con Successo'){
                            alert(response);
                        }
                    }
                }) 
        },

        UpdateProd: function() { 

                var dati = {
                    Colonna: this.$el.find('#colProdUpdate').attr('value'),
                    Valore: this.$el.find('#valProdUpdate').attr('value'),
                    ValChiave: this.$el.find('#idProdUpdate').attr('value'), 
                }
                Backbone.ajax({
                    url: "http://localhost/MyShopWeb/callnojson.php?func=AdminUpdateProd",
                    data: dati,
                    type: 'GET',
                    success: function(response){
<<<<<<< HEAD
                        if(response == 'Prodotto Modificato Con Successo'){
=======
                        if(response == 'Prodotto Modificata Con Successo'){
>>>>>>> 59de65585e4ccb8a4b3a009b7cb9f743e4d33fce
                            alert(response);
                        }
                    }
                }) 
        },

        RemoveProd: function() { 

                var dati = {
                    Id: this.$el.find('#idProdRemove').attr('value')
                }
                Backbone.ajax({
                    url: "http://localhost/MyShopWeb/callnojson.php?func=AdminRemoveProd",
                    data: dati,
                    type: 'GET',
                    success: function(response){
                        if(response == 'Prodotto Rimosso Con Successo'){
                            alert(response);
                        }
                    }
                }) 
        },

        AddSupermercato: function() { 

                var dati = {
                Ids: this.$el.find('#idSupAdd').attr('value'),
                Nome: this.$el.find('#NomeSupAdd').attr('value'),
                Via: this.$el.find('#ViaSupAdd').attr('value'), 
                Città: this.$el.find('#CittàSupAdd').attr('value'),
                Civico: this.$el.find('#CivicoSupAdd').attr('value'),
                }
                Backbone.ajax({
<<<<<<< HEAD
                    url: "http://localhost/MyShopWeb/callnojson.php?func=AdminAddSup",
                    data: dati,
                    type: 'GET',
                    success: function(response){
                        if(response == 'Supermercato Aggiunto Con Successo'){
                            alert(response);
                        }                    
                    }
=======
                        url: "http://localhost/MyShopWeb/callnojson.php?func=AdminAddSup",
                        data: dati,
        type: 'GET',
        success: function(response){
                console.log(response)
        }
>>>>>>> 59de65585e4ccb8a4b3a009b7cb9f743e4d33fce
                }) 
        },

        UpdateSupermercato: function() { 

<<<<<<< HEAD
                var dati = {
                Colonna: this.$el.find('#colSupUpdate').attr('value'),
                Valore: this.$el.find('#valSupUpdate').attr('value'),
                ValChiave: this.$el.find('#idSupUpdate').attr('value'), 
                }
                Backbone.ajax({
                    url: "http://localhost/MyShopWeb/callnojson.php?func=AdminUpdateSup",
                    data: dati,
                    type: 'GET',
                    success: function(response){
                        if(response == 'Supermercato Modificato Con Successo'){
                            alert(response);
                        }                
                    }
=======
                var dati = {dati:{
                Colonna: this.$el.find('#colSupUpdate').attr('value'),
                Valore: this.$el.find('#valSupUpdate').attr('value'),
                ValChiave: this.$el.find('#idSupUpdate').attr('value'), 
    }}
                Backbone.ajax({
                        url: "http://localhost/MyShopWeb/callnojson.php?func=AdminUpdateSup",
                        data: dati,
        type: 'GET',
        success: function(response){
                console.log(response)
        }

>>>>>>> 59de65585e4ccb8a4b3a009b7cb9f743e4d33fce
                }) 
        },

        RemoveSupermercato: function() { 

<<<<<<< HEAD
                var dati = {
                    Ids: this.$el.find('#idSupRemove').attr('value')
                }
=======
                var dati = {dati:{
                    Ids: this.$el.find('#idSupRemove').attr('value')
                }}
>>>>>>> 59de65585e4ccb8a4b3a009b7cb9f743e4d33fce
                Backbone.ajax({
                    url: "http://localhost/MyShopWeb/callnojson.php?func=AdminRemoveProd",
                    data: dati,
                    type: 'GET',
                    success: function(response){
<<<<<<< HEAD
                        if(response == 'Supermercato Rimosso Con Successo'){
                            alert(response);
                        }
=======
                            console.log(response)
>>>>>>> 59de65585e4ccb8a4b3a009b7cb9f743e4d33fce
                    }
                }) 
        },

        UpdateUtente: function() { 

<<<<<<< HEAD
                var dati = {
                    Colonna: this.$el.find('#colUtUpdate').attr('value'),
                    Valore: this.$el.find('#valUtUpdate').attr('value'),
                    ValChiave: this.$el.find('#idUtUpdate').attr('value'), 
                }
=======
                var dati = {dati:{
                    Colonna: this.$el.find('#colUtUpdate').attr('value'),
                    Valore: this.$el.find('#valUtUpdate').attr('value'),
                    ValChiave: this.$el.find('#idUtUpdate').attr('value'), 
                }}
>>>>>>> 59de65585e4ccb8a4b3a009b7cb9f743e4d33fce
                Backbone.ajax({
                    url: "http://localhost/MyShopWeb/callnojson.php?func=AdminUpdateUtente",
                    data: dati,
                    type: 'GET',
                    success: function(response){
<<<<<<< HEAD
                        if(response == 'Utente Modificato Con Successo'){
                            alert(response);
                        }
=======
                            console.log(response)
>>>>>>> 59de65585e4ccb8a4b3a009b7cb9f743e4d33fce
                    }
                }) 
        },

        RemoveUtente: function() { 

<<<<<<< HEAD
                var dati = {
                    Id: this.$el.find('#idUtRemove').attr('value')
                }
=======
                var dati = {dati:{
                    Id: this.$el.find('#idUtRemove').attr('value')
                }}
>>>>>>> 59de65585e4ccb8a4b3a009b7cb9f743e4d33fce
                Backbone.ajax({
                    url: "http://localhost/MyShopWeb/callnojson.php?func=AdminRemoveUtente",
                    data: dati,
                    type: 'GET',
                    success: function(response){
<<<<<<< HEAD
                        if(response == 'Utente Aggiunto Con Successo'){
                            alert(response);
                        }                   
=======
                            console.log(response)
>>>>>>> 59de65585e4ccb8a4b3a009b7cb9f743e4d33fce
                    }
                }) 
        },
    });
        return VAmministratore;
})
