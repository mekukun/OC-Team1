$(document).on("click", "button.editreportbutton", function (e) {
  e.preventDefault();
  var id = $(this).closest("tr").data("id");
  $(".modal-title #editModaltitle").text("Report #" + id);
  fetch("../assets/js/covreportdetail.json")
    .then((response) => response.json())
    .then((data) => {
      for (let item of data) {
        if (item.reporteditdetail.modalid == id) {
          $("#residentname").text(item.reporteditdetail.residentname);
          if (item.reporteditdetail.reportvalidation) {
            $("#reportvalidation").prop("checked", true);
          } else {
            $("#reportvalidation").prop("checked", false);
          }
          $("#roomnumber").text(item.reporteditdetail.roomnumber);
          $("#contactnumber").text(item.reporteditdetail.contactnumber);
          $("#reportdesc").text(item.reporteditdetail.reportdesc);
          lastexec(item);
        }
      }
    });
  $("#editreportModal").data("id", id).modal("show");
});

function lastexec(item) {
  if (item.reporteditdetail.lastexec == "default") {
    $("#defaultactivity").prop("checked", true);
  } else if (item.reporteditdetail.lastexec == "roominspection") {
    $("#roominspectioncheck").prop("checked", true);
  } else if (item.reporteditdetail.lastexec == "calltheresident") {
    $("#callresidentactivitycheck").prop("checked", true);
  } else if (item.reporteditdetail.lastexec == "notifyuser") {
    $("#notifyuser").prop("checked", true);
  }
}
