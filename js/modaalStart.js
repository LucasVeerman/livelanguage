$(document).ready( function() {
    // inhoud van de modale vensters in variabelen gestopt en uit de DOM verwijderd
    var addCategory = $('#addcategory').detach();
    var addWord = $('#addWord').detach();
    var addUser = $('#addUser').detach();

    
    
    // modaal venster plaatsen
    $('#addCategoryLink').on('click', function(){
         modaalVenObject.openen({inhoud: addCategory, breedte: 600});//breedte van modaal-inhoud
    });
    $('#addWordLink').on('click', function(){
        modaalVenObject.openen({inhoud: addWord, breedte: 600});//breedte van modaal-inhoud
    });
    $('#addUserLink').on('click', function(){
        modaalVenObject.openen({inhoud: addUser, breedte: 600});//breedte van modaal-inhoud
    });

    
});
