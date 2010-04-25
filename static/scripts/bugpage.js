// Helper javascript for add bug page
// simple validation, but not good enough, not scalable on programmer's effort 
// part when the app grows bigger - TODO: a generic validation handler
//

function validateBugStatus(){
  // form validation for add status/comment
  hideValidationErrors();
  var isValid=true;

  if ($("#txtComment").val().length < 3){
    isValid=false;
    addError("please add some comment to this status change for the bug");
  }

  if (!isValid){
    showValidationErrors();
    $("#txtComment").focus();
  } else {
    $("#frmBugStatus").submit();
  }
}
