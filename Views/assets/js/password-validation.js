$(function(){
  verifyLengthPassword()
  confirmPassword();
});

function verifyLengthPassword(){
  $("#password").keyup(function(){
    if($(this).val().length < 8){
       $($(this)).removeClass("is-valid").addClass("is-invalid");
    } else {
      $($(this)).removeClass("is-invalid").addClass("is-valid")
    }
  });
}

function confirmPassword(){
  $("#password").focusout(function () {
    if ($(this).val() != $("#confirm-password").val() || $("#confirm-password").val().length < 8) {
      $("#confirm-password").removeClass("is-valid").addClass("is-invalid");
    } else {
      $("#confirm-password").removeClass("is-invalid").addClass("is-valid");
    }
  });

  $("#confirm-password").keyup(function () {
    if ($("#password").val() != $(this).val() || $(this).val().length < 8) {
      $(this).removeClass("is-valid").addClass("is-invalid");
    } else {
      $(this).removeClass("is-invalid").addClass("is-valid");
    }
  });
}

