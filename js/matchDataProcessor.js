//Comment Functions
function getProblematicCannedCommentMatchCount(data){
    var problematicComments = ['Tipped', 'Didn\'t Move', 'Broken', 'Did Not Show Up', 'Bumpers Fell Off'];
    var commentDict = getCannedCommentsDictionary(data);
    var matchList = [];
    for (var i = 0; i != problematicComments.length; i++){
        var comment = problematicComments[i];
        if (comment in commentDict){
            matchList = [...matchList, ...commentDict[comment]];
        }
    }
    var matchSet = new Set(matchList);
    return matchSet.size;
}
function getCannedCommentsDictionary(data) {
    /* Returns a mapping of comment to list of matches */
    var commentLookup = {};
    for (var i = 0; i != data.length; i++) {
        var row = data[i];
        if (row['cannedComments'] === '' || row['cannedComments'] == 0) {
            continue;
        }
        var cannedSplit = row['cannedComments'].split(',');
        for (var j = 0; j != cannedSplit.length; j++) {
            var comment = cannedSplit[j];
            if (!(comment in commentLookup)) {
                commentLookup[comment] = [];
            }
            commentLookup[comment].push(row['matchNumber']);
        }
    }
    return commentLookup;
}
function getWrittenComments(data) {
    var comments = [];
    for (var i = 0; i != data.length; i++) {
        var row = data[i];
        if (row['textComments'] === '') {
            continue;
        }
        comments.push(row['textComments']);
        comments.push("Match " + row['matchNumber'] + ": ");
    }
    return comments;
}
//Climb Functions
function getMobilityAuto(row) {
    return row['autoMobility'] === 1;
}
function getNotInStage(row) {
    return row['climb'] == 'NONE';
}
function getInStage(row) {
    return row['climb'] == 'PARKED';
}
function getClimb(row) {
    return row['climb'] == 'ONSTAGE';
}
function getTrappedWhileClimbed(row) {
    return row['climb'] == 'TRAP';
}
function getSpotlighted(row) {
    return row['climbSpotlighted'] === 1;
}
function getHarmony(row) {
    return row['climbHarmony'] === 1;
}
function getTeleopClimbPoints(row){
    var points = 0;
    points += getInStage(row) ? 1 : 0;
	points += getClimb(row) ? 3 : 0;
	points += getTrappedWhileClimbed(row) ? 8 : 0;
	if((points != 0) && (getSpotlighted(row))){
		points+=1;
	}
	if((points != 0) && (getHarmony(row))){
		points+=1;
	}
	if ((points != 0) && (getHarmony(row) && (getSpotlighted(row)))){
		points+=1;
	}
    return points;
}
//Auto Piece Functions

function getAmpAuto(row){
	return row['autoAmpNote'];
}
function getSpeakerAuto(row) {
	return row['autoSpeakerNote'];
}

//Teleop Piece Functions
function getAmpTeleop(row){
	return row['teleopAmpNote'];
}
function getSpeakerTeleop(row){
	return row['teleopSpeaker'];
}
function getSpeakerAmplifiedTeleop(row){
	return row['teleopSpeakerAmplified'];
}
function getTotalSpeakerTeleop(row){
	return row['teleopSpeakerAmplified'] + row['teleopSpeaker'];
}
function getTrapTeleop(row){
	return row['teleopTrap'];
}
function getAllTrap(row){
	var climb = getTrappedWhileClimbed(row)  ? 1 : 0;
	return climb + getTrapTeleop(row);
}

//Piece Functions
function getAutoPieces(row){
	return (row['autoSpeakerNote'] + 
		row['autoAmpNote']);
}
function getTeleopPieces(row){
	return (row['teleopSpeaker'] + 
		row['teleopSpeakerAmplified'] + 
		row['teleopAmpNote'] + 
		row['teleopTrap']);
}
function getNotes(row){
	return getAutoPieces(row) + getTeleopPieces(row);
}
//Get Point Functions
function getMatchPointsAuto(row) {
	var points = 0;
	if (getMobilityAuto(row)) {
		points += 2;
	}
	points += 2 * getSpeakerAuto(row);
	points += 5 * getAmpAuto(row);
	return points;
}

function getMatchPointsTeleop(row) {
	var points = 0;
	points += getInStage(row) ? 1 : 0;
	points += getClimb(row) ? 3 : 0;
	points += getTrappedWhileClimbed(row) ? 8 : 0;
	if((points != 0) && (getSpotlighted(row))){
		points+=1;
	}
	else if((points != 0) && (getHarmony(row))){
		points+=2;
	}
	else if ((points != 0) && (getHarmony(row) && (getSpotligted(row)))){
		points+=3;
	}
	points += 2 * getSpeakerTeleop(row);
	points += 5 * getSpeakerAmplifiedTeleop(row);
	points += 1 * getAmpTeleop(row);
	points += 5 * getTrapTeleop(row);
	return points;
}

function getMatchPoints(row) {
	var points = 0;
	if (getMobilityAuto(row)) {
		points += 2;
	}
	points += getInStage(row) ? 1 : 0;
	points += getClimb(row) ? 3 : 0;
	points += getTrappedWhileClimbed(row) ? 8 : 0;
	if((points != 0) && (getSpotlighted(row))){
		points+=1;
	}
	else if((points != 0) && (getHarmony(row))){
		points+=2;
	}
	else if ((points != 0) && (getHarmony(row) && (getSpotligted(row)))){
		points+=3;
	}
	points += 2 * getSpeakerAuto(row);
	points += 5 * getAmpAuto(row);
	points += 2 * getSpeakerTeleop(row);
	points += 5 * getSpeakerAmplifiedTeleop(row);
	points += 1 * getAmpTeleop(row);
	points += 5 * getTrapTeleop(row);
	return points;
}

function getWeightedScoreFirst(row) {
	var weightedScore = 0;
	if (getMobilityAuto(row)){
		weightedScore+= 2;
	}
	if (getSpeakerAuto(row)){
		weightedScore+= 5;
	}
	if (getAmpAuto(row)){
		weightedScore+= 2;
	}

	if (getSpeakerTeleop(row)){
		weightedScore+= 2;
	}
	if (getSpeakerAmplifiedTeleop(row)){
		weightedScore+= 5;
	}
	if (getAmpTeleop(row)){
		weightedScore+= 1;
	}
	if (getTrapTeleop(row)){
		weightedScore+= 5;
	}

	if (getInStage(row)){
		weightedScore+= 1;
	}
	if (getClimb(row)){
		weightedScore+= 3;
	}
	if (getTrappedWhileClimbed(row)){
		weightedScore+= 8;
	}
	if (getSpotlighted(row)){
		weightedScore+= 1;
	}
	if (getHarmony(row)){
		weightedScore+= 2;
	}

	weightedScore +=  5 * getSpeakerAuto(row);
	weightedScore +=  4.75 * getTrapTeleop(row);
	weightedScore +=  4.75 * getTrappedWhileClimbed(row);
	weightedScore +=  4.5 * getSpeakerAmplifiedTeleop(row);
	weightedScore +=  4.25 * getSpeakerTeleop(row);
	weightedScore +=  3.75 * getClimb(row);
	weightedScore +=  3.5 * getSpotlighted(row);
	weightedScore +=  3 * getAmpTeleop(row);
	weightedScore +=  2.25 * getAmpAuto(row);
	weightedScore +=  1.25 * getHarmony(row);
	weightedScore +=  1 * getInStage(row);
	weightedScore +=  0.5 * getMobilityAuto(row);
	return weightedScore/12;
}