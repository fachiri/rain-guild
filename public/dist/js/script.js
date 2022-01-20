function showOption(optionButton) {
    // when user click the button
    var optionModal = document.getElementById('option'+optionButton+'');
    optionModal.style.display = 'block';

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == optionModal) {
            optionModal.style.display = "none";
        }
    }
}

