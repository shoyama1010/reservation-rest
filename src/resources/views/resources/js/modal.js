document.addEventListener('DOMContentLoaded', function () {
	// Get the modal
	var loginModal = document.getElementById("login-modal");
	var registerModal = document.getElementById("register-modal");

	// Get the button that opens the modal
	var openLoginModalBtn = document.getElementById("open-login-modal");
	var openRegisterModalBtn = document.getElementById("open-register-modal");

	// Get the <span> element that closes the modal
	var closeLoginModalBtn = document.getElementById("close-login-modal");
	var closeRegisterModalBtn = document.getElementById("close-register-modal");

	// When the user clicks the button, open the modal 
	openLoginModalBtn.onclick = function () {
		loginModal.style.display = "block";
	}

	openRegisterModalBtn.onclick = function () {
		registerModal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	closeLoginModalBtn.onclick = function () {
		loginModal.style.display = "none";
	}

	closeRegisterModalBtn.onclick = function () {
		registerModal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function (event) {
		if (event.target == loginModal) {
			loginModal.style.display = "none";
		}
		if (event.target == registerModal) {
			registerModal.style.display = "none";
		}
	}
});
