function messageDeletePosts() {
    if (confirm('Druk op "OK" om de reacties van de gebruiker mee te verwijderen')) {
        document.getElementById('deletePosts').value = "true";
    } else {
        document.getElementById('deletePosts').value = "false";
    }
}
