/*решение от жеки попова 2010*/
/*
$(document).ready(function(){
    total_reiting = 2; // итоговый ретинг
    id_arc = 55; // id статьи
    var star_widht = total_reiting*17 ;
    $('#raiting_votes').width(star_widht);
    $('#raiting_info h5').append(total_reiting);

    he_voted = $.cookies.get('article'+id_arc); // проверяем есть ли кука?
    if(he_voted == null){
        $('#raiting').hover(function() {
                $('#raiting_votes, #raiting_hover').toggle();
            },
            function() {
                $('#raiting_votes, #raiting_hover').toggle();
            });
        var margin_doc = $("#raiting").offset();
        $("#raiting").mousemove(function(e){
            var widht_votes = e.pageX - margin_doc.left;
            if (widht_votes == 0) widht_votes =1 ;
            user_votes = Math.ceil(widht_votes/17);
            // обратите внимание переменная  user_votes должна задаваться без var, т.к. в этом случае она будет глобальной и
            // мы сможем к ней обратиться из другой ф-ции (нужна будет при клике на оценке.
            $('#raiting_hover').width(user_votes*17);
        });
        // отправка
        $('#raiting').click(function(){
            $('#raiting_info h5, #raiting_info img').toggle();
            $.get(
                "raiting.php",
                {id_arc: id_arc, user_votes: user_votes},
                function(data){
                    $("#raiting_info h5").html(data);
                    $('#raiting_votes').width((total_reiting + user_votes)*17/2);
                    $('#raiting_info h5, #raiting_info img').toggle();
                    $.cookies.set('article'+id_arc, 123, {hoursToLive: 1}); // создаем куку
                    $("#raiting").unbind();
                    $('#raiting_hover').hide();
                }
            )
        });
    }
});*/


