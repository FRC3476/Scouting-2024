<title>Match Form</title>
<html lang="en">

<?php include('navbar.php'); ?>

<body class="bg-body">
  <div class="container row-offcanvas row-offcanvas-left">
    <div class="well column col-lg-12 col-sm-12 col-xs-12" id="content">
      <div class="row pt-3 pb-3 mb-3">

        <!-- Left column -->
        <div class="col-lg-12 col-sm-12 col-xs-12 gx-3">
          <div class="card" id="inputCard" class="card-border-width=10px" style="border-width: 5px;">
            <div class="card-header">Match Form</div>
            <div class="card-body">

              <div id="alertPlaceholder"></div>

              <ul class="nav nav-tabs" id="matchTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active cardTabSel" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane" type="button" role="tab" aria-controls="login-tab-pane" aria-selected="true">Log-in</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link cardTabSel" id="auto-tab" data-bs-toggle="tab" data-bs-target="#auto-tab-pane" type="button" role="tab" aria-controls="auto-tab-pane" aria-selected="false">Auto Scouting</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link cardTabSel" id="teleop-tab" data-bs-toggle="tab" data-bs-target="#teleop-tab-pane" type="button" role="tab" aria-controls="teleop-tab-pane" aria-selected="false">Teleop Scouting</button>
                </li>

                <li class="nav-item" role="presentation">
                <button class="nav-link cardTabSel" id="qrcode-tab" data-bs-toggle="tab" data-bs-target="#qrcode-tab-pane" type="button" role="tab" aria-controls="qrcode-tab-pane" aria-selected="false">QR Code</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <!--Login Tab-->
                <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab" tabindex="0">
                  <br>
                  <div class="mb-3">
                    <label for="scoutName" class="form-label">Scout Name</label>
                    <input type="text" name="nameForScout" class="form-control" id="scoutName" aria-describedby="scoutName">
                  </div>

                  <div class="mb-3">
                    <label for="matchNumber" class="form-label">Match Number</label>
                    <input type="text" class="form-control" id="matchNumber" aria-describedby="matchNumber">
                  </div>

                  <div class="mb-3">
                    <label for="teamNumber" class="form-label">Team Number</label>
                    <input type="text" class="form-control" id="teamNumber" aria-describedby="teamNumber">
                  </div>
                </div>

                <!--Auto Scouting-->
                <div class="tab-pane fade" id="auto-tab-pane" role="tabpanel" aria-labelledby="auto-tab" tabindex="0">
                  <br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="autoMobility">
                    <label class="form-check-label" for="autoMobility">
                      Mobility Completed?
                    </label>
                  </div>
                  <div class="row">
                  <h2 style="text-align: center"> Scoring Location </h2>
                    <div class="col-md-5">
                      <button class="border border-dark disable-dbl-tap-zoom-coral-rose" type="button" onClick="updateAAmp()" id="bigFont">Amp <div id="buttonAAmp" class="enlargedtext"></div></button>
                      <br>
                    </div>
                    <div class="col-md-5">
                      <button class="border border-dark disable-dbl-tap-zoom-sunkist-coral" type="button" onClick="updateASpeaker()" id="bigFont">Speaker <div id="buttonASpeaker" class="enlargedtext"></div></button>
                      <br>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <br>
                    <button class="disable-dbl-tap-zoom-danger" type="button" onClick="makeIncrementFalse()" id="bigFont">Subtract: <div id="negativeAIncrementButton" class="enlargedtext"></div></button>
                  </div>
                  
                </div>

                <!--Teleop Scouting-->
                <div class="tab-pane fade" id="teleop-tab-pane" role="tabpanel" aria-labelledby="teleop-tab" tabindex="0">
                  <br>
                  <br>
                  <div class="row">
                  <h2 style="text-align: center"> Scoring Location </h2>
                    <div class="col-md-5">
                      <button class="border border-dark disable-dbl-tap-zoom-coral-rose" type="button" onClick="updateTAmp()" id="bigFont">Amp <div id="buttonTAmp" class="enlargedtext"></div></button>
                      <button class="border border-dark disable-dbl-tap-zoom-ok-coral" type="button" onClick="updateTrap()" id="bigFont">Trap <div id="buttonTrap" class="enlargedtext"></div></button>
                      <br>
                    </div>
                    <div class="col-md-5">
                      <button class="border border-dark disable-dbl-tap-zoom-sunkist-coral" type="button" onClick="updateTSpeaker()" id="bigFont">Speaker <div id="buttonTSpeaker" class="enlargedtext"></div></button>
                      <button class="border border-dark disable-dbl-tap-zoom-dusty-coral" type="button" onClick="updateTAmpedSpeaker()" id="bigFont">Amplified Speaker <div id="buttonTAmpedSpeaker" class="enlargedtext"></div></button>
                      <br>
                    </div>
                    <br>
                    
                  </div>
                  <div class="center">
                    <br>
                    <button class="disable-dbl-tap-zoom-danger" type="button" onClick="makeTIncrementFalse()" id="bigFont">Subtract: <div id="negativeTIncrementButton" class="enlargedtext"></div></button>
                  </div>
                  <br>
                  <br>
                  <!--Endgame Scouting-->
                  <div>
                    <h3>Endgame</h3>
                    <div class="mb-3">
                      <label for="teleopChargeStation" class="form-label">Teleop Stage State</label>
                      <select id="teleopChargeStation" class="form-select" aria-label="Asd">
                        <option value="NONE" selected>Not in Stage</option>
                        <option value="PARKED">In Stage</option>
                        <option value="ONSTAGE">Climbed</option>
                        <option value="TRAP">Trap While Climb</option>
                      </select>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="autoMobility">
                      <label class="form-check-label" for="autoMobility">
                        Spotlighted?
                      </label>
                    </div>
                    <br>
                    <a>Comments</a>
                    <div class="col-md-12">
                      <div class="well column  col-lg-12  col-sm-12 col-xs-12" id="cannedComments">
                        <span class="badge rounded-pill text-bg-primary cannedComments">Slow Drive</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Fast Drive</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Good Driving</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Bad Driving</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Good Defense</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Bad Defense</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Attempted Endgame</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Source Pickup</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Floor Pickup</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Harmony with one</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Harmony with two</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Strategic Placement</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Held more than one note</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Drops Game Pieces</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Lots of Fouls</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Tipped</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Can go under stage</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Didn't Move</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Broken</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Did Not Show Up</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Slid down chain</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Did not slide down chain</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Climb fast</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">Bumpers Fell Off</span>
                        <span class="badge rounded-pill text-bg-primary cannedComments">DNP</span>
                        <br><br>
                      </div>
                      <br>
                      <div class="form-floating">
                        <textarea class="form-control" placeholder="Misc" id="miscComments"></textarea>
                        <label for="miscComments">Comments</label>
                      </div>
                      <br>
                    </div>
                  </div>
                </div>

                <!--QR Code Scouting-->
                <div class="tab-pane fade" id="qrcode-tab-pane" role="tabpanel" aria-labelledby="qrcode-tab" tabindex="0">
                  <br>
                  <div id="data-qr-code"></div>
				  <div class="col-md-3">
                    <button id="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include("footer.php"); ?>
<script type="text/javascript" src="js/qrcode.min.js"></script>

<script>
  // Var
  aAmp = 0;
  aSpeaker = 0;
  tAmp = 0;
  tSpeaker = 0;
  tAmpedSpeaker = 0;
  tTrap = 0;
  isIncrement = true;
  makeIncrementTrue();

  var qrcode = null;

  var teamList = new Set();

  function loadTeamList() {
    $.get("tbaAPI.php", {
      "getTeamList": 1
    }, function(data) {
      teamList = new Set(JSON.parse(data));
    });
  }

  // Auto Functions
  function updateAAmp() {
    if (isIncrement == true) {
      aAmp++;
    } else {
      if (aAmp != 0) {
        aAmp--;
        makeIncrementTrue();
      } else {
        makeIncrementTrue();
      }
    }
    document.getElementById("buttonAAmp").innerHTML = aAmp;
    console.log(aAmp);
  }

  function updateASpeaker() {
    if (isIncrement == true) {
      aSpeaker++;
    } else {
      if (aSpeaker != 0) {
        aSpeaker--;
        makeIncrementTrue();
      } else {
        makeIncrementTrue();
      }
    }
    document.getElementById("buttonASpeaker").innerHTML = aSpeaker;
    console.log(aSpeaker);
  }

  

  

 
  // Teleop Functions
  function updateTAmp() {
    if (isIncrement == true) {
      tAmp++;
    } else {
      if (tAmp != 0) {
        tAmp--;
        makeTIncrementTrue();
      } else {
        makeTIncrementTrue();
      }
    }
    document.getElementById("buttonTAmp").innerHTML = tAmp;
    console.log(tAmp);
  } 

  function updateTSpeaker() {
    if (isIncrement == true) {
      tSpeaker++;
    } else {
      if (tSpeaker != 0) {
        tSpeaker--;
        makeTIncrementTrue();
      } else {
        makeTIncrementTrue();
      }
    }
    document.getElementById("buttonTSpeaker").innerHTML = tSpeaker;
    console.log(tSpeaker);
  }
  

  function updateTAmpedSpeaker() {
    if (isIncrement == true) {
      tAmpedSpeaker++;
    } else {
      if (tAmpedSpeaker != 0) {
        tAmpedSpeaker--;
        makeTIncrementTrue();
      } else {
        makeTIncrementTrue();
      }
    }
    document.getElementById("buttonTAmpedSpeaker").innerHTML = tAmpedSpeaker;
    console.log(tAmpedSpeaker);
  }

  function updateTrap() {
    if (isIncrement == true && tTrap == 3) {
      console.log('should not update');
    } else if (isIncrement == true) {
      tTrap++;
    } else {
      if (tTrap != 0) {
        tTrap--;
        makeTIncrementTrue();
      } else {
        makeTIncrementTrue();
      }
    }
    document.getElementById("buttonTrap").innerHTML = tTrap;
    console.log(tTrap);
  }

  
  // Increment Functions
  function makeIncrementFalse() {
    isIncrement = false;
    document.getElementById("negativeAIncrementButton").innerHTML = -1;
  }

  function makeIncrementTrue() {
    isIncrement = true;
    document.getElementById("negativeAIncrementButton").innerHTML = 1;
  }

  function makeTIncrementFalse() {
    isIncrement = false;
    document.getElementById("negativeTIncrementButton").innerHTML = -1;
  }

  function makeTIncrementTrue() {
    isIncrement = true;
    document.getElementById("negativeTIncrementButton").innerHTML = 1;
  }


  // Comment Functions
  function getCannedComments() {
    /* Return list of canned comments based on if they have the 'selected' class. */
    var comments = [];
    $('.selected').each(function(i, obj) { // Iterates through each object with element 'selected'.
      comments.push($(this).text()); // this returns to the current element with class 'selected'.
    });
    return comments.toString();
  }

  // Binds all HTML dom objects with class 'cannedComments' to run the function when clicked
  $('.cannedComments').on('click', function(event) {
    var isSelected = $(this).hasClass('selected'); // Check if clicked badge has 'selected' class.
    if (isSelected) {
      // If previously selected, remove the class and make primary.
      $(this).removeClass('text-bg-success selected');
      $(this).addClass('text-bg-primary');
    } else {
      // If not selected, make selected and add class + change color.
      $(this).removeClass('text-bg-primary');
      $(this).addClass('text-bg-success selected');
    }
  });


  // Backend Functions
  function createErrorAlert(errorMessage) {
    /* Creats a Error alert. 
    
    Args:
      successMessage: String of message to send.
    */
    var alertValue = [`<div class="alert alert-danger alert-dismissible" role="alert">`,
      `  <div>${errorMessage}</div>`,
      `  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`,
      `</div>`
    ].join('');
    $('#alertPlaceholder').append(alertValue);
  }

  function createSuccessAlert(successMessage) {
    /* Creats a success alert. 
    
    Args:
      successMessage: String of message to send.
    */
    var alertValue = [`<div class="alert alert-success alert-dismissible" role="alert">`,
      `  <div>${successMessage}</div>`,
      `  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`,
      `</div>`
    ].join('');
    $('#alertPlaceholder').append(alertValue);
  }

  function clearAlerts() {
    /* Clears all allerts in the placeholder. */
    $('#alertPlaceholder').empty();
  }

  function getMatchFormData() {
    /* Gets values from HTML form and formats as dictionary. */
    var data = {};
    data['scout'] = $('#scoutName').val();
    data['matchNumber'] = parseInt($('#matchNumber').val());
    data['teamNumber'] = parseInt($('#teamNumber').val());
    var mobile = $('#autoMobility').is(':checked');
    //data['autoMobility'] needs to be an integer when not checked.
    if (!mobile) mobile = 0;
    data['autoMobility'] = mobile;
    data['autoAmpNote'] = aAmp; // Either form input or 0 if no form input
    data['autoSpeakerNote'] = aSpeaker; // Either form input or 0 if no form input
    data['autoChargeStation'] = $('#autoChargeStation').val();
    data['teleopAmpNote'] = tAmp; // Either form input or 0 if no form input
    data['teleopSpeaker'] = tSpeaker; // Either form input or 0 if no form input
    data['teleopSpeakerAmplified'] = tAmpedSpeaker; // Either form input or 0 if no form input
    data['teleopTrap'] = tTrap; // Either form input or 0 if no form input
    data['teleopChargeStation'] = $('#teleopChargeStation').val();
    data['cannedComments'] = getCannedComments();
    data['textComments'] = $('#miscComments').val();
    return data;
  }

  function getQRCodeJSON() {
    var originalJSON = getMatchFormData();
    var data = [];
    data.push(originalJSON['scout']);
    data.push(originalJSON['matchNumber']);
    data.push(originalJSON['teamNumber']);
    data.push(originalJSON['autoMobility']);
    data.push(originalJSON['autoConeLevel1']);
    data.push(originalJSON['autoConeLevel2']);
    data.push(originalJSON['autoConeLevel3']);
    data.push(originalJSON['autoCubeLevel1']);
    data.push(originalJSON['autoCubeLevel2']);
    data.push(originalJSON['autoCubeLevel3']);
    data.push(originalJSON['autoChargeStation']);
    data.push(originalJSON['teleopConeLevel1']);
    data.push(originalJSON['teleopConeLevel2']);
    data.push(originalJSON['teleopConeLevel3']);
    data.push(originalJSON['teleopCubeLevel1']);
    data.push(originalJSON['teleopCubeLevel2']);
    data.push(originalJSON['teleopCubeLevel3']);
    data.push(originalJSON['teleopChargeStation']);
    data.push(originalJSON['cannedComments']);
    return data;
  }

  //synchronous http request
  function httpRequest(adr) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", adr, false);
    xhttp.send();
    return xhttp.responseText;
  }

  function validateFormData(data) {
    /* Return false and send error if not valid form data.
    
    Args:
      data: dictionary of values from form.
    */
    var valid = true;
    if (data['scout'] == '') {
      createErrorAlert('Scout name empty.');
      valid = false;
    }
    if (!data['matchNumber']) {
      createErrorAlert('Match number not valid.');
      valid = false;
    }
    if (!data['teamNumber']) {
      createErrorAlert('Team number not valid.');
      valid = false;
    }
    if ((teamList.size > 0) && !teamList.has(data['teamNumber'])) {
      createErrorAlert('Team number not in TBA team list!');
      valid = false;
    }

    //make sure the team being scouted is in the match
    var formattedTeam = `frc${data['teamNumber']}`;
    var tba = httpRequest("./tbaAPI.php?getTeamsInMatch=" + data["matchNumber"]);
    tba = JSON.parse(tba);
    var teams = [];
    for (var i = 0; i < tba.red.length; i++) teams.push(tba.red[i]);
    for (var i = 0; i < tba.blue.length; i++) teams.push(tba.blue[i]);
    var check = teams.indexOf(formattedTeam);
    if (data["matchNumber"] < 5000 && check == -1) {
      createErrorAlert(`Team ${data["teamNumber"]} is not in match ${data["matchNumber"]}`);
      // Allow submit even if invalid.
      // valid = false; 
    }

    return valid;
  }

  function validateFormDataQR(data) {
    /* Return false and send error if not valid form data.
      This does not do a TBA check because QR will likely be used without internet
    
    Args:
      data: dictionary of values from form.
    */
    var valid = true;
    if (data['scout'] == '') {
      createErrorAlert('Scout name empty.');
      valid = false;
    }
    if (!data['matchNumber']) {
      createErrorAlert('Match number not valid.');
      valid = false;
    }
    if (!data['teamNumber']) {
      createErrorAlert('Team number not valid.');
      valid = false;
    }
    if ((teamList.size > 0) && !teamList.has(data['teamNumber'])) {
      createErrorAlert('Team number not in TBA team list!');
      valid = false;
    }

    return valid;
  }

  function clearForm() {
    $('#matchNumber').val('');
    $('#teamNumber').val('');
    $('#autoMobility').prop('checked', false);
    $('#buttonaSpeaker').val('0');
    $('#buttonAAmp').val('0');
    $('#buttonASpeaker').val('0');
    $('#autoChargeStation').val('NONE');
    $('#buttontAmp').val('0');
    $('#buttontSpeaker').val('0');
    $('#buttonTAmp').val('0');
    $('#buttonTrap').val('0');
    $('#teleopChargeStation').val('NONE');
    $('#cannedComents').val('');
    $('#miscComments').val('');
  }

  function createInitialQR() {
    qrcode = new QRCode("data-qr-code", {
      text: JSON.stringify([]),
      width: 512,
      height: 512,
      colorDark: "#000000",
      colorLight: "#ffffff",
      correctLevel: QRCode.CorrectLevel.H
    });
  }

  function updateQRCode() {
    if (qrcode == null) {
      createInitialQR();
    }
    qrcode.clear();
    var data = getQRCodeJSON();
    var validData = validateFormDataQR(getMatchFormData());
    if (validData) {
      qrcode.makeCode(JSON.stringify(data));
    }
  }

  function submitData() {
    /* Gets data from form, validates it, and creates appropriate error messages. 

    Returns:
      True if successful, false if not.
    */
    clearAlerts();
    var data = getMatchFormData();
    console.log(data);
    var validData = validateFormData(data);
    if (validData) {
      // Create POST request.
      $.post("writeAPI.php", {
          "writeSingleMatchData": JSON.stringify(data)
        }, function(data) {
          data = JSON.parse(data);
          console.log(data);
          const success = data["success"];
          if (success) {
            createSuccessAlert('Form Submitted. Clearing form.');
            location.reload();
          } else {
            createErrorAlert('Form submitted to server but failed to process. Please try again or contact admin.');
            createErrorAlert(JSON.stringify(data["error"]));
          }
        })
        .fail(function() {
          createErrorAlert('Form submitted but failure on server side. Please try again or contact admin.');
        });

    }
  }

  $("#submit").on('click', function(event) {
    submitData();
  });

  $('#qrcode-tab').on('click', function(event) {
    updateQRCode();
  });

  $('.cardTabSel').click(function(){
    var tabID = $(this).attr('id');
    if (tabID == 'auto-tab'){
      $('#inputCard').addClass('border-warning');
      $('#inputCard').removeClass('border-info');
    }
    else if (tabID == 'teleop-tab'){
      $('#inputCard').removeClass('border-warning');
      $('#inputCard').addClass('border-info');
    }
    else {
      $('#inputCard').removeClass('border-warning');
      $('#inputCard').removeClass('border-info');
    }
  })

  $(document).ready(function() {
    loadTeamList();
  });
</script>
<style>
  .disable-dbl-tap-zoom-purple {
    touch-action: manipulation;
    background-color: rgb(159, 43, 104);
    color: white;
    border: 2px solid black;
    font-family: Helvetica;
    font-weight: bold;
    /*To get rid of weird 3D affect in some browsers*/
    border: solid rgb(159, 43, 104);
    height: 100px;
    width: 500px;
  }

  .disable-dbl-tap-zoom-yellow {
    touch-action: manipulation;
    background-color: rgb(222, 169, 24);
    color: white;
    border-radius: 2px solid black;
    font-family: Helvetica;
    font-weight: bold;
    /*To get rid of weird 3D affect in some browsers*/
    border: solid rgb(222, 169, 24);
    height: 100px;
    width: 500px;
  }

  .disable-dbl-tap-zoom-sunkist-coral {
    touch-action: manipulation;
    background-color: rgb(234,102,118);
    color: white;
    border-radius: 2px solid black;
    font-family: Helvetica;
    font-weight: bold;
    /*To get rid of weird 3D affect in some browsers*/
    border: solid rgb(234,102,118);
    height: 100px;
    width: 500px;
  }

  .disable-dbl-tap-zoom-ok-coral {
    touch-action: manipulation;
    background-color: rgb(208, 115, 96);
    color: white;
    border-radius: 2px solid black;
    font-family: Helvetica;
    font-weight: bold;
    /*To get rid of weird 3D affect in some browsers*/
    border: solid rgb(208, 115, 96);
    height: 100px;
    width: 500px;
  }

  .disable-dbl-tap-zoom-coral-rose {
    touch-action: manipulation;
    background-color: rgb(243,119,77);
    color: white;
    border-radius: 2px solid black;
    font-family: Helvetica;
    font-weight: bold;
    /*To get rid of weird 3D affect in some browsers*/
    border: solid rgb(243,119,77);
    height: 100px;
    width: 500px;
  }

  .disable-dbl-tap-zoom-dusty-coral {
    touch-action: manipulation;
    background-color: rgb(245,183,177);
    color: white;
    border: 2px solid black;
    font-family: Helvetica;
    font-weight: bold;
    /*To get rid of weird 3D affect in some browsers*/
    border: solid rgb(245,183,177);
    height: 100px;
    width: 500px;
  }

  .disable-dbl-tap-zoom-danger {
    touch-action: manipulation;
    background-color: rgb(245, 108, 108);
    color: white;
    border-radius: 2px;
    font-family: Helvetica;
    margin-left: 250px;
    font-weight: bold;
    /*To get rid of weird 3D affect in some browsers*/
    border: solid rgb(245, 108, 108);
    height: 50px;
    width: 500px;
  }
</style>

</html>