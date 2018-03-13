$(document).ready(function(){
    $("#contact-form").submit(function(e){
        e.preventDefault();
        $('.commantaire').empty();
        var postdata = $('#contact-form').serialize();
        $.ajax({
            type: 'POST',
            url: 'modele/logintest.php',
            data : postdata,
            dataType: 'json',
            success: function(result){
                if (result.reussi) {
                    $("#contact-form").append("<p class=\'merci\'>Bienvenue</p>");
                    $("#contact-form")[0].reset();
                } else {
                    $("#mail + .commantaire").html(result.mailError);
                    $("#password + .commantaire").html(result.passwordError);
                    $("#passwordControl + .commantaire").html(result.passwordControlError);
                }
            }
        });
    });
})

/* Upload d'un fichier */
// function upFile(evt) {
//     var formData = new FormData();
//     var chemin = $('#monPath').val();
//
//     formData.append('fic_chemin', chemin);
//     formData.append( 'file', $('#upFile')[0].files[0]);
//
//     /* Declenche le modal avec message d'attente */
//     $('#upInfos h4').html("Chargement en cours...");
//     $('#upInfos').modal();
//
//     $.ajax({
// 	type: 'POST',
// 	url: 'actions.php',
// 	data: formData,
// 	processData: false,
// 	contentType: false,
// 	encode: true,
// 	success: function(data) {
// 	    /* Maj du modal */
// 	    if (data != "" && JSON.parse(data)) $('#upInfos h4').html("Fichier uploadé avec succès");
// 	    else $('#upInfos h4').html("Échec de l'upload");
// 	    loadLst(chemin);
// 	},
// 	error: function() {
// 	    $('#upInfos h4').html("Échec de l'upload");
// 	}
//     });
// }
