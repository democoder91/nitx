$('#minutes').on('change', function() {
    var minutes = $('#minutes').val();
    var seconds = $('#seconds').val();
    if ((minutes == 0 && seconds == 0) || (minutes == '' && seconds == '')) {
        // add required attribute to minutes and seconds
        $('#minutes').attr('required', 'required');
        $('#seconds').attr('required', 'required');
        $('#minutes').attr('data-parsley-range', '[1, 60]');
        $('#seconds').attr('data-parsley-range', '[1, 60]');

    }else{
        // remove required attribute from minutes and seconds
        $('#minutes').removeAttr('required');
        $('#seconds').removeAttr('required');
        $('#minutes').removeAttr('data-parsley-range');
        $('#seconds').removeAttr('data-parsley-range');
    }
        
    });


