var buyTogether =  {
    id: '',
    url: '',

    init: function(url, id) {
        this.id = id;
        this.url = url;
        jQuery('.button-together').on('click', function() {
            buyTogether.redirect(jQuery(this).attr('data-id'));
        });
    },


    redirect: function(idProductTogether) {
        window.location.href = this.getUrl(idProductTogether);
        return;
    },

    getUrl: function(idProductTogether) {
        var controller = 'buytogether/index/index/';
        var products = 'products/'+this.id+','+idProductTogether+'/';
        var quantity = this.getQtd(idProductTogether);
        var qtd = 'qtd/'+quantity.current+','+quantity.together;

        var urlBuy = this.url+controller+products+qtd;
        return urlBuy;
    },

    getQtd: function(idProductTogether) {
        var idSearch = '#buy-together-'+idProductTogether;
        var quantity = {};

        quantity.current = jQuery(idSearch).find('.current-quantity').val();
        quantity.together = jQuery(idSearch).find('.together-quantity').val();

        return quantity;
    },

    updatePrice: function(price) {
        var newPrice = parseInt(price.replace('.', ','));
        jQuery('.combo').each(function() {
            var priceTogether = parseInt(jQuery(this).find('.button-together').attr('data-price').replace('.', ','));

            var installments = jQuery(this).find('.installments-together');
            var priceBy = jQuery(this).find('.price-by-together');

            var totalPrice = (priceTogether+newPrice);
            var totalInstalments = totalPrice/10;
            installments.html('10 X DE R$'+totalInstalments.toString().replace('.', ','));
            priceBy.html('R$'+totalPrice);
        });
    },

    updateProduct: function(id) {
        if (!id) {
            return;
        }
        var product = spConfig.config.childProducts[id];
        this.updateProductId(id);
        this.updateName(product.productName);
        this.updateImage(product.imageUrl);
        this.updatePrice(product.finalPrice);
    },

    updateProductId: function(id) {
        this.id = id;
    },

    updateName: function(name) {
        jQuery('.current-product-name').text(name);
    },

    updateImage: function(src) {
        jQuery('.current-product-img').attr('src', src);
    }
};
