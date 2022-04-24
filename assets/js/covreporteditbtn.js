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
  var ref = r.parentNode.parentNode.children[0].innerText;
  document.getElementById("reporttable").deleteRow(i - 1);
  callActivityRef(ref);
}
