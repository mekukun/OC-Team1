function covreporteditbtn() {
  document.getElementById("reportvalidation").removeAttribute("disabled");
  document.getElementById("defaultactivity").removeAttribute("disabled");
  document.getElementById("notifyuser").removeAttribute("disabled");
  document
    .getElementById("callresidentactivitycheck")
    .removeAttribute("disabled");
  document.getElementById("roominspectioncheck").removeAttribute("disabled");
  document.getElementById("reportnote").removeAttribute("disabled");
}

function covreportcloseedit() {
  document.getElementById("reportvalidation").setAttribute("disabled", "");
  document.getElementById("defaultactivity").setAttribute("disabled", "");
  document.getElementById("notifyuser").setAttribute("disabled", "");
  document
    .getElementById("callresidentactivitycheck")
    .setAttribute("disabled", "");
  document.getElementById("roominspectioncheck").setAttribute("disabled", "");
  document.getElementById("reportnote").setAttribute("disabled", "");
}

function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  var ref = r.parentNode.parentNode.children[0].innerText;
  document.getElementById("reporttable").deleteRow(i - 1);
  callActivityRef(ref);
}
