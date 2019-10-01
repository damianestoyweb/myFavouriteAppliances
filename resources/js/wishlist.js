(function () {
    function Wishlist(options) {
        this.options = options;
    }

    Wishlist.prototype = {

        init: function () {
            this.getElements().setEvents();
            this.$el.data('widget', this);
            return this;
        },

        getElements: function () {
            this.$el = $(this.options.$el);
            this.$shareButton = this.$el.find('.share-button');
            this.$modal = this.$el.find('.modal');
            return this;
        },

        setEvents: function () {
            this.$shareButton.on('click', this.onShareButtonClick.bind(this));
            this.$el.on('click', '.modal .btn-primary', this.onShareClick.bind(this));
            return this;
        },

        onShareButtonClick: function (event) {
            event.preventDefault();
            this.$modal.modal('show');
        },

        onShareClick: function (event) {
            event.preventDefault();
            this.$modal.find('form').submit();
        }
    };

    function wishlist($selector) {
        return new Wishlist($selector).init();
    }

    $(function () {
        var elements = $('[data-page="wishlist"]');
        for (var i = 0; i < elements.length; i++) {
            wishlist({$el: elements[i]});
        }
    });
}());
