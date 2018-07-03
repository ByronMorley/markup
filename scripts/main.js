$(document).ready(function () {
    setupMarkupLinks();
});

function setupMarkupLinks() {

    $('.reference').on('click', function (evt) {

        fetchReference($(this));
    });
}

function fetchReference($el) {

    var data = {
        reference: $el.attr('id')
    };

    $.ajax({
        type: "POST",
        url: window.location.href + "/markup",
        data: data,
        success: function (data) {
            showReferenceModal(data);
        }
    });
}

function showReferenceModal(text){
    var $modal = $('#markup-modal');
    $modal.find('.modal-body').html(text);
    $modal.modal('show');
}