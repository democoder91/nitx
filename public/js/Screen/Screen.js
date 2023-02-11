const relinkScreenButtons = document.getElementsByClassName("relinkScreenBtn");
relinkScreenButtons.forEach((relinkScreenButton) => {
    relinkScreenButton.addEventListener("click", async function (e) {
        e.preventDefault()
        let screenId = fetchScreenIdNumber(this.id)
        await relinkScreen(screenId)
    });
})
const fetchScreenIdNumber = (screenIdString) => {
    let parts = screenIdString.split('-');
    return parts[1];
}
const relinkScreen = async (screenId) => {
    window.open(`/MediaOwner/relink_screen_view/${screenId}`);
}