// $(document).ready(function(){
//     $("#contact-form").submit(function(e){
//         e.preventDefault();
//         $('.commantaire').empty();
//         var postdata = $('#contact-form').serialize();
//         $.ajax({
//             type: 'POST',
//             url: 'controller/functions.php',
//             data : postdata,
//             dataType: 'json',
//             success: function(result){
//                 if (result.reussi) {
//                     $("#contact-form").append("<p class=\'merci\'>Bienvenue</p>");
//                     $("#contact-form")[0].reset();
//                 } else {
//                     $("#mail + .commantaire").html(result.mailError);
//                     $("#password + .commantaire").html(result.passwordError);
//                 }
//             }
//         });
//     });
// })
