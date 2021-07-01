function ajax_modal(urls) {
    $('#ajax-modal').modal();
    load(urls, '#modal_content');
}

function ajax_modal_sm(urls) {
    $('#ajax-modal-sm').modal();
    load(urls, '#modal_content_sm');
}

function ajax_delete(urls) {
    $('#ajax-delete').modal();
    load(urls, '#modal_content');
}

function switch_menu(obj) {
    $(obj).toggleClass("active");
    $(obj).siblings().removeClass("active");
}

function load(page, div) {
    var image_load = "<div align='center'><i class='fa fa-refresh fa-spin'></i></div>";
    $.ajax({
        url: site + page,
        beforeSend: function() {
            $(div).html(image_load);
        },

        success: function(response) {
            $(div).html(response);
        },

        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        },
        dataType: "html"
    });
    return false;
}