tippy("#anadirCurso", {
  content: "Anadir Curso",
  placement: "bottom",
  animation: "scale",
});

tippy("#rutPro", {
  content: "Por ejemplo de Rut: 2xx32xxxk no punto ni guion",
  placement: "bottom",
  animation: "scale",
});

function crearCurso() {
  var faltaNomCurso = document.forms["formCurso"]["nomCurso"].value;
  if (faltaNomCurso == "") {
    return false;
  }
  return true;
}

$(document).ready(function () {
  $("#vercurso2").change(function () {
    // show hide paragraph on button click
    $("#mascurso2").slideToggle();
  });

  $("#vercurso3").change(function () {
    // show hide paragraph on button click
    $("#mascurso3").slideToggle();
  });

  $("#vercurso4").change(function () {
    // show hide paragraph on button click
    $("#mascurso4").slideToggle();
  });

  $("#vercurso5").change(function () {
    // show hide paragraph on button click
    $("#mascurso5").slideToggle();
  });

  $("#vercurso6").change(function () {
    // show hide paragraph on button click
    $("#mascurso6").slideToggle();
  });

  $("#vercurso7").change(function () {
    // show hide paragraph on button click
    $("#mascurso7").slideToggle();
  });
});

function crearProfesor() {
  var rutPro = document.forms["formPro"]["rutPro"].value;
  var nomPro = document.forms["formPro"]["nomPro"].value;
  var elegirCurso = document.forms["formPro"]["cadaCurso"].value;
  var userPro = document.forms["formPro"]["userPro"].value;
  var passPro = document.forms["formPro"]["contrPro"].value;
  var correoPro = document.forms["formPro"]["mailPro"].value;
  if (rutPro == "" || rutPro == null) {
    $(document).ready(function () {
      $(".errorRutPro").toast("show");
    });
    return false;
  }

  if (nomPro == "" || nomPro == null) {
    $(document).ready(function () {
      $(".errorNomPro").toast("show");
    });
    return false;
  }

  if (elegirCurso == "vacio") {
    $(document).ready(function () {
      $(".errorCursoPro").toast("show");
    });
    return false;
  }

  if (userPro == "" || userPro == null) {
    $(document).ready(function () {
      $(".errorUserPro").toast("show");
    });
    return false;
  }

  if (passPro == "" || passPro == null) {
    $(document).ready(function () {
      $(".errorPassPro").toast("show");
    });
    return false;
  }

  if (correoPro == "" || correoPro == null) {
    $(document).ready(function () {
      $(".errorCorreoPro").toast("show");
    });
    return false;
  }
  
  return true;
}
