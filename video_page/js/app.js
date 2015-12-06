var apiKey,
    sessionId,
    token;

$(document).ready(function() {
  // Make an Ajax request to get the OpenTok API key, session ID, and token from the server
	$.get(SAMPLE_SERVER_BASE_URL + '/session', function(res) {
		apiKey = <?php echo $apiKey; ?>;
		sessionId = <?php echo $sessionID; ?>;
		token = <?php echo $token; ?>;
		initializeSession();
	});
});

function initializeSession() {
	var session = OT.initSession(apiKey, sessionId);
	var userType = <?php echo $_POST["userType"]; ?>;

	session.on('streamCreated', function(event) {
		session.subscribe(event.stream, 'subscriber', {
			nsertMode: 'append',
			width: '100%',
			height: '100%'
		});
	});
	
	session.on('sessionDisconnected', function(event) {
		alert('You were disconnected from the session.', event.reason);
		setTimeout(5000, redirect(<?php echo $_POST["userType"]; ?>));
	});

	session.connect(token, function(error) {
		if (!error) {
			var publisher = OT.initPublisher('publisher', {
				insertMode: 'append',
				width: '100%',
				height: '100%'
			});

			session.publish(publisher);
		} else {
			console.log('There was an error connecting to the session: ', error.code, error.message);
		}
	});
  
	function redirect(userType) {
		if (userType == "asker") {
			//set to location asker should be sent
			window.location = "";
		} else {
			//set to location answerer should be sent
		}
	}
	
	function endSession() {
		session.disconnect();
	}
}
