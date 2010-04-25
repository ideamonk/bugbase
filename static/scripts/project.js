// Helper javascript for project page, only for admin
//

function validateNewProject(){
  // form validation for add status/comment
  hideValidationErrors();
  var isValid=true;

  if ($("#txtName").val().length < 2){
	isValid=false;
	addError("please add a name to this project");
  }
    
  if ($("#txtKeyword").val().length < 1){
	isValid=false;
	addError("please add some keywords");
  }
  
  if ($("#txtComment").val().length < 3){
    isValid=false;
    addError("please add some description to this new project");
  }
  
  if (!isValid){
    showValidationErrors();
  } else {
    $("#frmAddProject").submit();
  }
}
