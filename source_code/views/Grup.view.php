<?php

class GrupView
{
  public function render($data)
  {
    $headerGrup = null;

    $headerGrup .= '<th>ID</th>
    <th>NAMA GRUP</th>
    <th>TAHUN DEBUT</th>
    <th>AGENSI</th>';

    $link_add = null;
    $link_add .= '<a type="button" class="btn btn-primary nav-link active" href="Grup.php?tambah">Add New</a>';

    $dataGrup = null;
    foreach ($data as $val) {
      list($id, $name, $tahundebut, $agensi) = $val;
      $agensi = $val['nama'];

      $dataGrup .= "
            <tr>
              <th>" . $id . "</th>
              <td>" . $name . "</td>
              <td>" . $tahundebut . "</td>
              <td>" . $agensi . "</td>
              <td>
                        <a class='btn btn-success' href='Grup.php?id_edit=$id'>Edit</a>
                        <a class='btn btn-danger' href='Grup.php?id_hapus=$id'>Delete</a>
                      </td>
            </tr>
            ";
    }
    $tpl = new Template("templates/index.html");
    $tpl->replace("HEADER_TABEL", $headerGrup);
    $tpl->replace("LINK_ADD", $link_add);
    $tpl->replace("DATA_TABEL", $dataGrup);
    $tpl->write();
  }

  public function rendertambah($data_agensi)
  {
    $judul = "Tambah Member";
    $data_form = null;

    $data_form .= '<form method="post" action="Grup.php">

        <br><br>
        <div class="card">
  
          <div class="card-header bg-primary">
            <h1 class="text-white text-center"> Create New Grup </h1>
          </div><br>
  
          <label> NAMA GRUP: </label>
          <input type="text" name="nama" class="form-control"> <br>
  
          <label> TAHUN DEBUT: </label>
          <input type="text" name="tahun_debut" class="form-control"> <br>
  
          <label> AGENSI: </label>
          <select required class="form-control" name="agensi_id" id="exampleFormControlSelect1">';
    while ($row = $data_agensi->getResult()) {
      $data_form .= "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
    }
    $data_form .= '
                                </select> <br>
  
          <button class="btn btn-success" type="submit" name="add"> Submit </button><br>
          <a class="btn btn-info" type="submit" name="cancel" href="Grup.php"> Cancel </a><br>
  
        </div>
      </form>';

    $tpl = new Template("templates/form.html");
    $tpl->replace("ISI_FORM", $data_form);
    $tpl->replace("JUDUL", $judul);
    $tpl->write();
  }

  public function renderubah($data, $data_grup)
  {
    $judul = 'Edit Grup';
    $data_form = null;
    list($id, $name, $tahundebut, $agensi) = $data;

    $data_form .= '<form method="post" action="Grup.php">

        <br><br>
        <div class="card">
  
          <div class="card-header bg-warning">
            <h1 class="text-white text-center"> Update Member </h1>
          </div><br>
  
          <input type="hidden" name="id" value="' . $id . '" class="form-control"> <br>
  
          <label> NAME: </label>
          <input type="text" name="nama" value="' . $name . '" class="form-control"> <br>
  
          <label> TAHUN DEBUT: </label>
          <input type="text" name="tahun_debut" value="' . $tahundebut . '" class="form-control"> <br>

          <label> AGENSI: </label>
          <select required class="form-control" name="agensi_id" id="exampleFormControlSelect1">';
    while ($row = $data_grup->getResult()) {
      $selected = ($row["id"] == $agensi) ? 'selected' : ''; // Menandai pilihan saat ini 
      $data_form .= "<option value='" . $row['id'] . "' ' . $selected . '>" . $row['nama'] . "</option>";
    }
    $data_form .= '
                                </select> <br>
  
          <button class="btn btn-success" type="submit" name="edit"> Submit </button><br>
          <a class="btn btn-info" type="submit" name="cancel" href="Grup.php"> Cancel </a><br>
  
        </div>
      </form>';

    $tpl = new Template("templates/form.html");
    $tpl->replace("ISI_FORM", $data_form);
    $tpl->replace("JUDUL", $judul);
    $tpl->write();
  }
}
