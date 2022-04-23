fetch("../assets/js/covreportdetail.json")
  .then((response) => response.json())
  .then((data) => {
    addActivity(data);
  });

function addActivity(data) {
  let activityDiv = document.getElementById("activitylist");
  for (let item of data) {
    activityType(item, activityDiv);
  }
}

function activityType(item, activityDiv) {
  if (item.activityoverview == "newreport") {
    let str =
      '<div class="activity" id="newreport"><i class="fa-solid fa-circle-exclamation"></i><div class="activitytext"><span>New report ' +
      item.reportlistdetail.reportid +
      "</span><span>" +
      item.reportlistdetail.reportdate +
      " " +
      item.lastupdatehour +
      "</span></div></div>";
    activityDiv.innerHTML += str;
  }
  if (item.activityoverview == "inspectionbegin") {
    const str =
      '<div class="activity" id="inspectionbegin"><i class="fa-solid fa-magnifying-glass"></i><div class="activitytext"><span>Inspection begin for report ' +
      item.reportlistdetail.reportid +
      "</span><span>" +
      item.reportlistdetail.reportdate +
      " " +
      item.lastupdatehour +
      "</span></div></div>";
    activityDiv.innerHTML += str;
  }
  if (item.activityoverview == "deletereport") {
    const str =
      '<div class="activity" id="delete"><i class="fa-solid fa-trash"></i><div class="activitytext"><span>Delete report ' +
      item.reportlistdetail.reportid +
      "</span><span>" +
      item.reportlistdetail.reportdate +
      " " +
      item.lastupdatehour +
      "</span></div></div>";
    activityDiv.innerHTML += str;
  }
  if (item.activityoverview == "callresident") {
    const str =
      '<div class="activity" id="call"><i class="fa-solid fa-phone"></i><div class="activitytext"><span>Call the resident of report ' +
      item.reportlistdetail.reportid +
      "</span><span>" +
      item.reportlistdetail.reportdate +
      " " +
      item.lastupdatehour +
      "</span></div></div>";
    activityDiv.innerHTML += str;
  }
  if (item.activityoverview == "validatereport") {
    const str =
      '<div class="activity" id="validate"><i class="fa-solid fa-check"></i><div class="activitytext"><span>Validate report ' +
      item.reportlistdetail.reportid +
      "</span><span>" +
      item.reportlistdetail.reportdate +
      " " +
      item.lastupdatehour +
      "</span></div></div>";
    activityDiv.innerHTML += str;
  }
  if (item.activityoverview == "addnote") {
    const str =
      '<div class="activity" id="note"><i class="fa-solid fa-notes-medical"></i><div class="activitytext"><span>Add a note to report ' +
      item.reportlistdetail.reportid +
      "</span><span>" +
      item.reportlistdetail.reportdate +
      " " +
      item.lastupdatehour +
      "</span></div></div>";
    activityDiv.innerHTML += str;
  }
  if (item.activityoverview == "completereport") {
    const str =
      '<div class="activity" id="completed"><i class="fa-solid fa-square-check"></i><div class="activitytext"><span>Complete report ' +
      item.reportlistdetail.reportid +
      "</span><span>" +
      item.reportlistdetail.reportdate +
      " " +
      item.lastupdatehour +
      "</span></div></div>";
    activityDiv.innerHTML += str;
  }
}
