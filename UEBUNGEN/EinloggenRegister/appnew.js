$(document).ready(function() {

  $("#info-box").hide(); // Die Infobox ausblenden

  // DELETE

  $(".delete-icon").click(function() {
    console.log("Löschen?");

    if(confirm("Wollen Sie das Projekt wirklich löschen?")) {
      console.log("Löschen true: " + this.id); // "this" ist das <span>-Element, da an dieses das click-Event gebunden wurde

	   
      // Kommunikation mit dem Server aufnehmen, um ihm mitzuteilen, dass das Projekt mit der ID "id" zu löschen ist
      var myAjaxConf = {
        url: "http://localhost:82/Zitatliste/secret.php",
        method: "POST",
        data: "deletepid=" + this.id, // vom Typ String
        //data: {deletepid: this.id}  // vom Typ Object
        success: function(serverResponse) {
          console.log("Server response: " + serverResponse);
          if(serverResponse) {
            // Tabellenzeile entfernen und Infobox "Löschen erfolgreich" einblenden
            $("#info-box").text("Löschen erfolgreich!").addClass("bg-success").show(300).fadeOut(5000);
          }
          else {
            // Infobox "Löschen nicht erfolgreich" einblenden
            $("#info-box").text("Löschen fehlgeschlagen!").addClass("bg-error").show(300).fadeOut(5000);
          }
        },
      };
	  
      $.ajax(myAjaxConf); // Ajax-Request mit dem Konfigurations-Objekt absetzen
	  $(this).parent().parent().remove();
	}
    else {
      console.log("Löschen false " + $(this).attr("id")); // $(this) erzeugt aus der this-Referenz ein jQuery-Objekt.
    }                                                     //  Jetzt können alle jQuery-Methoden genutzt werden!
  });

// CHANGE

  $(".change-icon").click(function() {
    console.log("change");
  });

}); // end document.ready
