

$(document).ready(function () {

    applyMediaDurationValidation()
});
// after the add-media-to-sequence-btn is clicked 
$('#add-media-to-sequence-btn').on('click', function () {
    // wait for the dom to update
    setTimeout(function () {
        applyMediaDurationValidation()
    }, 100);
});
// get all the input fields with the name 'minutes[]' and 'seconds[]'
function applyMediaDurationValidation() {

    const minutesFields = document.getElementsByName('minutes[]');
    const secondsFields = document.getElementsByName('seconds[]');
    // trigger the change event on the minutes and seconds fields
    for (let i = 0; i < minutesFields.length; i++) {
        const minutesField = minutesFields[i];
        const secondsField = secondsFields[i];
        minutesField.dispatchEvent(new Event('change'));
        secondsField.dispatchEvent(new Event('change'));
    }

    // loop through each field and apply the validation
    for (let i = 0; i < minutesFields.length; i++) {
        const minutesField = minutesFields[i];
        const secondsField = secondsFields[i];

        // add a change event listener to the minutes field
        minutesField.addEventListener('change', () => {
            if (minutesField.value > 0 && minutesField.value < 60) {
                // if the minutes value is valid, remove the 'required' attribute from the seconds field
                secondsField.removeAttribute('required');
                secondsField.removeAttribute('data-parsley-range', '[1, 60]');
            } else {
                // if the minutes value is not valid, add the 'required' attribute to the seconds field
                secondsField.setAttribute('required', true);
                secondsField.setAttribute('data-parsley-range', '[1, 60]');
            }
        });

        // add a change event listener to the seconds field
        secondsField.addEventListener('change', () => {
            if (secondsField.value > 0 && secondsField.value < 60) {
                // if the seconds value is valid, remove the 'required' attribute from the minutes field
                minutesField.removeAttribute('required');
                minutesField.removeAttribute('data-parsley-range', '[1, 60]');
            } else {
                // if the seconds value is not valid, add the 'required' attribute to the minutes field
                minutesField.setAttribute('required', true);
                minutesField.setAttribute('data-parsley-range', '[1, 60]');
            }
        });
    }
}



































// $(document).ready(function () {
//     validateMediaTime();
// });

// // on minutes or seconds change
// $('.minutes, .seconds').on('change', function () {
//     validateMediaTime();
// });




// function validateMediaTime() {
//     var minutesElArr = $('.minutes');
//     // for each minutes element in the array
//     minutesElArr.each(function (index, minutesEl) {
//         var secondsEl = $(minutesEl).parents('div.row').first().find('.seconds:first');;
//         var minutes = $(minutesEl).val();
//         var seconds = $(secondsEl).val();
//         if (
//             (minutes == 0 && seconds == 0) ||
//             (minutes == '' && seconds == '') ||
//             (minutes == 0 && seconds == '') ||
//             (minutes == '' && seconds == 0)

//         ) {
//             // add required attribute to minutes and seconds
//             $(minutesEl).attr('required', 'required');
//             $(secondsEl).attr('required', 'required');
//             $(minutesEl).attr('data-parsley-range', '[1, 60]');
//             $(secondsEl).attr('data-parsley-range', '[1, 60]');

//         } else {
//             // remove required attribute from minutes and seconds
//             $(minutesEl).removeAttr('required');
//             $(secondsEl).removeAttr('required');
//             $(minutesEl).removeAttr('data-parsley-range');
//             $(secondsEl).removeAttr('data-parsley-range');
//         }
//         // consolelog the seconds elemet value if it was required
//     });
// };
