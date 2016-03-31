
var ScriptRoute = "/onlymakebelieve/api/scripts.php";
var ContactRoute = "/onlymakebelieve/api/contacts.php";
var VenueRoute = "/onlymakebelieve/api/venue.php";

var log = function(data) {
	if(!data) data = "<br>";
	$("#test-output").html($("#test-output").html()+"<br>"+data);
}

$(document).ready(function() {

	// Test scripts
	log("Initializing tests...");
	log();

	/*
	$.get(ScriptRoute, {
		id:1
	}, function(data) {
		log("Testing Script by Id:");
		log(data);
		log();
	});

	$.get(ScriptRoute, {
		user:3
	}, function(data) {
		log("Testing Script by UserId:");
		log(data);
		log();
	});
	*/

	/*
	// Testing Insert
	$.post(ScriptRoute, {
		name:"Test",
		synopsis:"Test"
	}, function(data) {
		log("Testing Script Edit/Post:");
		log("Inserting: Name=Test Syn=Test");
		if(data == "Success") {
			log("Insert Success");
		} else {
			log("Test Failed");
		}
		log();
	})
	*/

	// Testing update
	/*
	$.post(ScriptRoute, {
		id:2,
		name:"Test",
		synopsis:"Test"
	}, function(data) {
		log("Testing Script Edit/Post:");
		log("Updating: Id=2, Name=Test Syn=Test");
		if(JSON.parse(data) == "Success") {
			log("Update Success");
		} else {
			log("Test Failed");
		}
		log();
	});
	*/
	$.get(ContactRoute, {
		id:1
	}, function(data) {
		log("Testing Contact by Id:");
		log(data);
		log();
	});
	
	// Testing Insert
	/*
	$.post(ContactRoute, {
		first_name:"Test",
		last_name:"Test"
	}, function(data) {
		log("Testing Contact Edit/Post:");
		log("Inserting: first_name=Test, last_name=Test");
		if(JSON.parse(data) == "Success") {
			log("Insert Success");
		} else {
			log("Test Failed");
		}
		log();
	});
	*/

	// Testing update
	$.post(ContactRoute, {
		id:100,
		first_name:"Test2",
		last_name:"Test2",
		details:"Test"
	}, function(data) {
		log("Testing Contact Edit/Post:");
		log("Updating: Id=100, first_name=Test2, last_name=Test2, details=Test");
		if(JSON.parse(data) == "Success") {
			log("Update Success");
		} else {
			log("Test Failed");
		}
		log();
	});

	// Testing Venue
	$.post(VenueRoute+"?func=editVenue", {
		id:1,
		name:"Test2",
		comments:"This is a nice place",
		contacts:"20,3",
		address:"17"
	}, function(data) {
		log("Testing Venue Edit/Post:");
		if(JSON.parse(data) == "Success") {
			log("Update Success");
		} else {
			log("Test Failed");
		}
		log();
	})

})