/**
 * Delete popup     
 */
$(document).on("click",'.delete-confirm',function() { 
    var current_form = $(this).parent(); 
    bootbox.dialog({
      message: "Are You Sure You Want to Delete This Record ??",
      title: "Delete Record !!",
      buttons: {
        danger: {
          label: "Delete",
          className: "btn-danger",
          callback: function() {
            current_form.submit();
          }
        },
        main: {
          label: "Cancel",
          className: "btn-primary",
          callback: function() {
                    
          }
        }
      }
    });
    return false;        
});