<?php
include '../../../../ajuste/TCPDF/tcpdf.php';
include_once "../../../../conectarSQL/conectar_SQL.php";

$rut = $_GET["rut"];

$buscarAutor = "SELECT * FROM administrar WHERE rut ='".$rut."'";

$encontrarAutor = mysqli_query($conexion, $buscarAutor);
if (mysqli_num_rows($encontrarAutor) > 0) {
    while ($row = mysqli_fetch_array($encontrarAutor)) {
     $nomAutor = $row['nombre'];
    }
}
mysqli_free_result($encontrarAutor);

if (!empty($_GET['verCurso'])) {
  if ($_GET['verCurso'] == "todas") {
      $revisarSQL = "SELECT DISTINCT rut, estudiante, telefono, mail FROM asistencias";
      $tituloCurso = $_GET['verCurso'];
  } else {
      $revisarSQL = "SELECT DISTINCT rut, estudiante, telefono, mail FROM asistencias WHERE cursos='" . $_GET['verCurso'] . "'";
      $tituloCurso = $_GET['verCurso'];
    }
} else {
  $revisarSQL = "SELECT DISTINCT rut, estudiante, telefono, mail FROM asistencias";
  $tituloCurso = "Ninguno";
}

$html = "<style>
  table {
    border: #b2b2b2 1px solid;
    padding: 3px;
  }
  td, th {
    border: black 1px solid;
  }
</style>
<h3>Autor: ".$nomAutor."</h3>
<h3>Curso: ".$tituloCurso."</h3>
<table>
<thead>
<tr>
    <th>Rut</th>
    <th>Nombre</th>
    <th>Contacto</th>
    <th>Mail</th>
</tr>
</thead>
<tbody>";
$resultados = mysqli_query($conexion, $revisarSQL);
if (mysqli_num_rows($resultados) > 0) {
    while ($row = mysqli_fetch_array($resultados)) {
     $html.= "<tr>
        <th>" . $row['rut'] . "</th>
        <th>" . $row['estudiante'] . "</th>
        <th>" . $row['telefono'] . "</th>
        <th>" . $row['mail'] . "</th>
    </tr>";
    }
}
mysqli_free_result($resultados);
$html.= "</tbody>
</table>";

class MYPDF extends TCPDF {
  //Page header
  public function Header() {
      // Logo
      $image_file = K_PATH_IMAGES.'../../../../image/logo_barloventoAzul.jpg';
      $this->Image($image_file, 5, 10, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
      // Set font
      $this->SetFont('helvetica', 'B', 20);
      // Title
      $this->Cell(0, 15, 'Lista de los Estudiantes', 0, false, 'C', 0, '', 0, false, 'M', 'M');
  }

  // Page footer
  public function Footer() {
      // Position at 15 mm from bottom
      $this->SetY(-15);
      // Set font
      $this->SetFont('helvetica', 'I', 8);
      // Page number
      $this->Cell(0, 10, 'Página'.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
  }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($nomAutor);
$pdf->SetTitle('Tabla de Centro Barloventos');
//* set margins o posicion en el centro.
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->setFontSubsetting(true);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->AddPage();
$pdf->writeHTML($html, true, 0, true, true);
$pdf->Output('listaEstudiante.pdf', 'I');
?>
