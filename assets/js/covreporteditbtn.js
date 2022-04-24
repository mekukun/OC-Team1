function covreporteditbtn() {
  document.getElementById("reportvalidation").removeAttribute("disabled");
  document.getElementById("defaultactivity").removeAttribute("disabled");
  document
    .getElementById("callresidentactivitycheck")
    .removeAttribute("disabled");
  document.getElementById("roominspectioncheck").removeAttribute("disabled");
  document.getElementById("reportnote").removeAttribute("disabled");
}

function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("reporttable").deleteRow(i - 1);
}
