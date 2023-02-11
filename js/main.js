$('.input input').focus(function () {
    $(this).siblings("label").css({
        'top': '-11px',
        'font-size': '12px',
        'background': '#fff',
        'padding': '2px'
    });
    $(this).parent().css({
        'border': '2px solid #03A9F4'
    });
})
$('.input input').focusout(function () {
    if ($(this).val() != '') {
        $(this).parent().css({
            'border': '1px solid #ccc'
        });
        $(this).siblings('.err').css({
            'display': 'none'
        })
    } else {
        $(this).siblings("label").css({
            'left': '10px',
            'top': '10px',
            'font-size': '18px'
        });
        $(this).parent().css({
            'border': '1px solid #ccc'
        });
    }
})
$('.input input').on('input', function () {
    $(this).siblings('.err').css({
        'display': 'none'
    })
});


function open_private_chat(hosted_user_id, invited_user_id) {
    $.ajax({
        type: 'POST',
        url: 'inc/creatingOfPrivateChat.php',
        data: {
            hosted_user_id: hosted_user_id,
            invited_user_id: invited_user_id
        },
        success: function (data) {
            console.log(data);
            chat_id = data;
            window.open('privat_messages.php?chat_id=' + chat_id + '&client_id=' + hosted_user_id + '&another_id=' + invited_user_id);
        }
    });
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

