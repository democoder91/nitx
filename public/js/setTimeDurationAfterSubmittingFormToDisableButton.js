/**
 * @author: Abdullah Alqahtani
 * @job: to set a time duration after submitting a from to disable a button in order to prevent sending multiple
 * requests to the server.
 * */

const setTimeDurationAfterSubmittingFormToDisableButton = (duration, buttonId) => {
    setTimeout(() => {
        document.getElementById(buttonId).setAttribute('disabled', 'disabled')
    }, 1);
    setTimeout(() => {
        document.getElementById(buttonId).removeAttribute('disabled')
    }, duration);
    window.location.reload();
}



