<title>rhhankings</title>
<html lang="en">

<style>
  th:first-child, td:first-child
{
  position:sticky;
  left:0px;
  background-color:grey;
}

thead th
{
  position:sticky;
  top:0;
  background-color:grey;
}
</style>

<?php include('navbar.php'); ?>


<body class="bg-body">
  <div class="container row-offcanvas row-offcanvas-left">
    <div class="well column col-lg-12 col-sm-12 col-xs-12" id="content">
      <div class="row pt-3">
        <div class="float-right">
          <button type="button" id="downloadTable" class="btn btn-primary">Download Table As CSV</button>
        </div>
      </div>

      <div class="row pt-3 pb-3 mb-3">
        <div class='overflow-auto'>
          <table id='fullDataTable' class='table sortable table-striped'>
            <thead style="position: sticky;top: 0">
              <tr>
                <th col='scope' style='z-index:2' class='table-secondary' >Team</th>
                <th col='scope'>Rank</th>
                <th col='scope'>Weighted Score</th>
                <th col='scope'>Avg Points</th>
                <th col='scope'>Max Points</th>
                <th col='scope'>Avg Auto Pieces</th>
                <th col='scope'>Max Auto Pieces</th>
                <th col='scope'>Avg Teleop Pieces</th>
                <th col='scope'>Max Teleop Pieces</th>
                <th col='scope'>Max Teleop Speaker</th>
                <th col='scope'>Max Teleop Amp</th>
                <th col='scope'>Teleop Climb %</th>
                <th col='scope'>Teleop Trap %</th>
                <th col='scope'>Teleop Spotlighted %</th>
                <th col='scope'>Teleop Harmony %</th>
                <th col='scope'>Teleop Stage %</th>
                <th col='scope'>Organization Level</th>
                <th col='scope'># Batteries</th>
                <th col='scope'># Chargers</th>
                <th col='scope'>Language</th>
                <th col='scope'>Drive Train</th>
                <th col='scope'>Auto Path</th>
                <th col='scope'>Frame Dimensions</th>
                <th col='scope'>Pit Comments</th>
                <th col='scope'>Scout Flagged Matches</th>
                <th col='scope'>Avg Strike Rating (0-5)</th>
                <th col='scope'>Strike Comments</th>
                <th col='scope'>Strike Vibes</th>
              </tr>
            </thead>
            <tbody id="dataTable">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include("footer.php"); ?>
<script type="text/javascript" src="js/matchDataProcessor.js"></script>

<script>
  var matchDataLookUp = {};
  var pitDataLookUp = {};
  var rankingLookUp = {}
  var strikeLookup = {};
  var teamList = [];

  function safeDataLookup(key, obj) {
    if (key in obj) {
      return obj[key];
    }
    return {};
  }

  function safeLookup(key, obj) {
    if (key in obj) {
      return obj[key];
    }
    return 0;
  }

  function getTeamList() {
    var matchTeamSet = new Set(Object.keys(matchDataLookUp));
    var teamListSet = new Set(Array.from(teamList, x => `${x}`));
    return Array.from(new Set([...matchTeamSet, ...teamListSet]));
  }

  function reDrawTable() {
    $('#dataTable').html('');
    var teams = getTeamList()
    for (var i = 0; i != teams.length; i++) {
      var team = teams[i];
      var matchData = safeDataLookup(team, matchDataLookUp);
      var pitData = safeDataLookup(team, pitDataLookUp);
      var strikeData = safeDataLookup(team, strikeLookup);
      var rows = [
        `<tr>`,
        `  <td style='z-index:2' class='table-secondary' scope='row' sorttable_customkey='${team}'><a href='./teamData.php?team=${team}'>${team}</a></td>`,
        `  <td scope='row'>${safeLookup(`frc${team}`, rankingLookUp)}</td>`,
        `  <td scope='row'>${safeLookup('avgPoints', matchData)}</td>`,
        `  <td scope='row'>${safeLookup('weightedScore', matchData)}</td>`,
        `  <td scope='row'>${safeLookup('maxPoints', matchData)}</td>`,
        `  <td scope='row'>${safeLookup('avgAutoPieces', matchData)}</td>`,
        `  <td scope='row'>${safeLookup('maxAutoPieces', matchData)}</td>`,
        `  <td scope='row'>${safeLookup('avgTeleopPieces', matchData)}</td>`,
        `  <td scope='row'>${safeLookup('maxTeleopPieces', matchData)}</td>`,
        `  <td scope='row'>${safeLookup('maxTeleopSpeaker', matchData)}</td>`,
        `  <td scope='row'>${safeLookup('maxTeleopAmp', matchData)}</td>`,
        `  <td scope='row'>${safeLookup('avgTeleopClimb', matchData)}%</td>`,
        `  <td scope='row'>${safeLookup('avgTeleopTrap', matchData)}%</td>`,
        `  <td scope='row'>${safeLookup('avgTeleopSpotlighted', matchData)}%</td>`,
        `  <td scope='row'>${safeLookup('avgTeleopHarmony', matchData)}%</td>`,
        `  <td scope='row'>${safeLookup('avgTeleopStage', matchData)}%</td>`,
        `  <td scope='row'>${safeLookup('disorganized', pitData)}</td>`,
        `  <td scope='row'>${safeLookup('numBatteries', pitData)}</td>`,
        `  <td scope='row'>${safeLookup('chargedBatteries', pitData)}</td>`,
        `  <td scope='row'>${safeLookup('codeLanguage', pitData)}</td>`,
        `  <td scope='row'>${safeLookup('drivetrainType', pitData)}</td>`,
        `  <td scope='row'>${safeLookup('autoPath', pitData)}</td>`,
        `  <td scope='row'>${safeLookup('framePerimeterDimensions', pitData)}</td>`,
        `  <td scope='row'>${safeLookup('pitComments', pitData)}</td>`,
        `  <td scope='row'>${safeLookup('problematicMatchCount', matchData)}</td>`,
        `  <td scope='row'>${safeLookup('rating', strikeData)}</td>`,
        `  <td scope='row'>${safeLookup('strikeComments', strikeData)}</td>`,
        `  <td scope='row'>${safeLookup('vibes', strikeData)}</td>`,
        `</tr>`
      ].join('');
      $('#dataTable').append(rows);
    }

    var fullTable = document.getElementById('fullDataTable');
    sorttable.makeSortable(fullTable);
    sorttable.makeSortable(fullTable);
  }

  function strikeDataToStrikeLookup(data){
    for (var i = 0; i != data.length; i++){
      var strike = data[i];
      var team = strike['strikeTeamNumber'];
      strikeLookup[team] = strike
      var rating = 0;

      if (strike['bumpers'] == 'average') {rating += 3}
      if (strike['bumpers'] == 'great') {rating += 5}

      if (strike['mechRobustness'] == 'average') {rating += 3}
      if (strike['mechRobustness'] == 'good') {rating += 5}

      if (strike['elecRobustness'] == 'average') {rating += 3}
      if (strike['elecRobustness'] == 'good') {rating += 5}


      strikeLookup[team]['rating'] = roundInt(rating/3);
    }
  }

  function pitDataToPitDataLookUp(data) {
    for (var i = 0; i != data.length; i++) {
      var pit = data[i];
      var team = pit['pitTeamNumber'];
      pitDataLookUp[team] = pit;
    }
  }

  function matchDataTomatchDataLookUp(data) {
    var teamToDataList = {};
    for (var i = 0; i != data.length; i++) {
      var match = data[i];
      if (!(match['teamNumber'] in teamToDataList)) {
        teamToDataList[match['teamNumber']] = [];
      }
      teamToDataList[match['teamNumber']].push(match);
    }

    // Process data for each team.
    for (let team in teamToDataList) {
      var matchCount = 0;
      var weightedScore = 0;
      var totalPoints = 0;
      var maxPoints = 0;
      var totalAutoPieces = 0;
      var maxAutoPieces = 0;
      var totalTeleopPiece = 0;
      var maxTeleopSpeaker = 0;
      var maxTeleopAmp = 0;
      var maxTeleopPieces = 0;
      var avgTeleopClimb = 0;
      var avgTeleopTrap = 0;
      var avgTeleopSpotlighted = 0;
      var avgTeleopHarmony = 0;
      var avgTeleopStage = 0;
      for (var i = 0; i != teamToDataList[team].length; i++) {
        var match = teamToDataList[team][i];
        matchCount++;
        weightedScore += getWeightedScoreFirst(match);
        totalPoints += getMatchPoints(match);
        maxPoints = Math.max(maxPoints, getMatchPoints(match));
        totalAutoPieces += getAutoPieces(match);
        maxAutoPieces = Math.max(maxAutoPieces, getAutoPieces(match));
        totalTeleopPiece += getTeleopPieces(match);
        maxTeleopSpeaker = Math.max(maxTeleopSpeaker, getSpeakerTeleop(match));
        maxTeleopAmp = Math.max(maxTeleopAmp, getAmpTeleop(match));
        maxTeleopPieces = Math.max(maxTeleopPieces, getTeleopPieces(match));
        avgTeleopClimb += getClimb(match) ? 1 : 0;
        avgTeleopTrap += getTrappedWhileClimbed(match) ? 1 : 0;
        avgTeleopSpotlighted += getSpotlighted(match) ? 1 : 0;
        avgTeleopHarmony += getHarmony(match) ? 1 : 0;
        avgTeleopStage += getInStage(match) ? 1 : 0;
      }

      // Add to matchDataLookUp.
      var lookup = {};
      lookup['weighedScore'] = (weightedScore / matchCount);
      lookup['avgPoints'] = (totalPoints / matchCount);
      lookup['maxPoints'] = (maxPoints);
      lookup['avgAutoPieces'] = (totalAutoPieces / matchCount);
      lookup['maxAutoPieces'] = (maxAutoPieces);
      lookup['avgTeleopPieces'] = (totalTeleopPiece / matchCount);
      lookup['maxTeleopPieces'] = maxTeleopPieces;
      lookup['maxTeleopSpeaker'] = (maxTeleopSpeaker);
      lookup['maxTeleopAmp'] = (maxTeleopAmp);
      lookup['avgTeleopClimb'] = ((avgTeleopClimb / matchCount) * 100);
      lookup['avgTeleopTrap'] = ((avgTeleopTrap / matchCount) * 100);
      lookup['avgTeleopSpotlighted'] = ((avgTeleopSpotlighted / matchCount) * 100);
      lookup['avgTeleopHarmony'] = ((avgTeleopHarmony / matchCount) * 100);
      lookup['avgTeleopStage'] = ((avgTeleopStage / matchCount) * 100);
      lookup['problematicMatchCount'] = getProblematicCannedCommentMatchCount(teamToDataList[team]);

      matchDataLookUp[team] = lookup;
    }
  }

  function loadMatchData() {
    $.get('readAPI.php', {
      'readAllMatchData': 1
    }).done(function(data) {
      var data = JSON.parse(data);
      matchDataTomatchDataLookUp(data);
      reDrawTable();
    });
  }

  function loadPitData() {
    $.get('readAPI.php', {
      'readAllPitScoutData': 1
    }).done(function(data) {
      var data = JSON.parse(data);
      pitDataToPitDataLookUp(data);
      reDrawTable();
    });
  }

  function loadRankingData() {
    $.get('tbaAPI.php', {
      'getRankings': 1
    }).done(function(data) {
      var data = JSON.parse(data);
      rankingLookUp = data;
      reDrawTable();
    });
  }

  function loadTeamList() {
    $.get('tbaAPI.php', {
      'getTeamList': 1
    }).done(function(data) {
      var data = JSON.parse(data);
      teamList = data;
      reDrawTable();
    });
  }

  function loadStrikeData(){
    $.post("readAPI.php", {
      "readAllStrikeScoutData": true
    }, function(data) {
      var data = JSON.parse(data);
      strikeDataToStrikeLookup(data);
      reDrawTable();
    });
  }


  function getTableAsCSVString() {
    var table_array = [];
    var rows = document.getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {
      var cols = rows[i].querySelectorAll('td,th');
      var row_array = []
      for (var j = 0; j < cols.length; j++) {
        if (j == 0) { // Strip link from team number in col 1
          var team_link = cols[j].querySelectorAll('a');
          if (team_link.length == 0) {
            row_array.push(cols[j].innerHTML);
          } else {
            row_array.push(team_link[0].innerHTML);
          }
        } else {
          row_array.push(cols[j].innerHTML);
        }
      }
      table_array.push(row_array.join(','));
    }
    return table_array.join('\n');
  }

  function downloadTable() {
    CSVFile = new Blob([getTableAsCSVString()], {
      type: "text/csv"
    });
    var temp_link = document.createElement('a');
    temp_link.download = "rankings.csv";
    var url = window.URL.createObjectURL(CSVFile);
    temp_link.href = url;
    temp_link.style.display = "none";
    document.body.appendChild(temp_link);
    temp_link.click();
    document.body.removeChild(temp_link);
  }

  $('#downloadTable').on('click', function() {
    downloadTable();
  });

  $(document).ready(function() {
    loadMatchData();
    loadPitData();
    loadTeamList();
    loadRankingData();
    loadStrikeData();
  });
</script>

</html>