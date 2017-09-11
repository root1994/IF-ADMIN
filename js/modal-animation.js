    // add the animation to the popover
    $('a[rel=popover]').popover().click(function (e) {
        e.preventDefault();
        var open = $(this).attr('data-easein');
        if (open == 'shake') {
            $(this).next().velocity('callout.' + open);
        } else if (open == 'pulse') {
            $(this).next().velocity('callout.' + open);
        } else if (open == 'tada') {
            $(this).next().velocity('callout.' + open);
        } else if (open == 'flash') {
            $(this).next().velocity('callout.' + open);
        } else if (open == 'bounce') {
            $(this).next().velocity('callout.' + open);
        } else if (open == 'swing') {
            $(this).next().velocity('callout.' + open);
        } else {
            $(this).next().velocity('transition.' + open);
        }    });


    // add the animation to the modal
    $(".modal").each(function (index) {
        $(this).on('show.bs.modal', function (e) {
            var open = $(this).attr('data-easein');
            if (open == 'shake') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if (open == 'pulse') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if (open == 'tada') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if (open == 'flash') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if (open == 'bounce') {
                $('.modal-dialog').velocity('callout.' + open);
            } else if (open == 'swing') {
                $('.modal-dialog').velocity('callout.' + open);
            } else {
                $('.modal-dialog').velocity('transition.' + open);
            }
        });
    });

// add the animation to the popover
$('[data-toggle=tooltip]').each(function (index) {
    $(this).attr('data-animation', 'false');
    
    $(this).tooltip()
    .on('shown.bs.tooltip', function (e) {
        var open = $(this).attr('data-easein');
        if (open == 'shake') {
            $('.tooltip').velocity('callout.' + open);
        } else if (open == 'pulse') {
            $('.tooltip').velocity('callout.' + open);
        } else if (open == 'tada') {
            $('.tooltip').velocity('callout.' + open);
        } else if (open == 'flash') {
            $('.tooltip').velocity('callout.' + open);
        } else if (open == 'bounce') {
            $('.tooltip').velocity('callout.' + open);
        } else if (open == 'swing') {
            $('.tooltip').velocity('callout.' + open);
        } else {
            $('.tooltip').velocity('transition.' + open);
        }
    });
});


   