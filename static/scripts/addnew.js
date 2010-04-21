// Helper javascript for add new page
// simple validation, but not good enough, not scalable on programmer's effort 
// part when the app grows bigger - TODO: a generic validation handler
//

function validateAddNewBug(){
  // form validation for addition form
  hideValidationErrors();
  var isValid=true;

  if ($("#bugName").val().length < 3){
    isValid=false;
    addError("bug subject too small");
  }

  if ($("#description").val().length < 5){
    isValid=false;
    addError("bug description needs some more information");
  }

  if ($("#keywords").val().length < 2){
    isValid=false;
    addError("adding some keywords would be great");
  }

  if (!isValid){
    showValidationErrors();
  } else {
    $("#frmReportBug").submit();
  }
}

