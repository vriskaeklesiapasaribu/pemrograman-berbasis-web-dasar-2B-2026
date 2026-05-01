document.getElementById("signupForm").onsubmit = function(e) {
  e.preventDefault();

  let nama = document.getElementById("sNama").value;
  let email = document.getElementById("sEmail").value;
  let pass = document.getElementById("sPassword").value;

  let errNama = document.getElementById("sENama");
  let errEmail = document.getElementById("sEEmail");
  let errPass = document.getElementById("sEPass");

  let valid = true;

  errNama.innerText = "";
  errEmail.innerText = "";
  errPass.innerText = "";

  if (nama === "") {
    errNama.innerText = "Nama wajib diisi";
    valid = false;
  }

  if (!email.includes("@")) {
    errEmail.innerText = "Email tidak valid";
    valid = false;
  }

  if (pass.length < 6) {
    errPass.innerText = "Password minimal 6 karakter";
    valid = false;
  }

  if (valid) {
    alert("Berhasil Sign Up!");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
};
