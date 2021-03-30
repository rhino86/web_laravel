$('.use-number').number( true,0 );
$(document).ready(function() {
    $('.use-select2-non-multiple').select2();
    $('.user-select2').select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });
    $('.user-select-audiens').select2({
        tags: true,
        tokenSeparators: [',', ' '],
        placeholder: "Pilih Audiens Character"
    });
    $(".user-select2").on("select2:select", function(evt) {
        var element = evt.params.data.element;
        var $element = $(element);
        $element.detach();
        $(this).append($element);
        $(this).trigger("change");
    });
    
    $(".user-select-general").on("select2:select", function(evt) {
        var element = evt.params.data.element;
        var $element = $(element);
        $element.detach();
        $(this).append($element);
        $(this).trigger("change");
    });

    $('.use-datepicker').datepicker({ dateFormat: 'dd-mm-yy' });
});

// $('.radio-sosmed').click(function (e) {
//     e.preventDefault();
//     let id = $(this).attr('data-id');
//     if ($('#'+id).hasClass('checked-label')) {
//         $('#'+id).removeClass('checked-label');
//         // $(this).removeAttr('checked');
//     }else{
//         $('#'+id).addClass('checked-label');
//         // $(this).attr('checked','true');
//     }
// })



