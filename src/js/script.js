$('div#rating input[type=radio]').click(function () {
    var self = $(this);
    var rating = self.attr('value');
    var id = self.parent('.rating').data('id');
    var rait_count = self.parent('.rating').data('rait_count');
    var rating_db = self.parent('.rating').data('rating_db');

    $.post('/index.php', {
        value: rating,
        id: id,
        rait_count: rait_count,
        rating_db: rating_db,
    }).done(function (response) {
        //if (response.success) {}
    }).fail(function (error) {
        console.log(error);
    });
});