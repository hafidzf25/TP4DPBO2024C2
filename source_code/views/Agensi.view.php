<?php

class AgensiView
{
  public function render($data)
  {
    $headerAgensi = null;

    $headerAgensi .= '<th>ID</th>
    <th>NAMA AGENSI</th>
    <th>PENDIRI</th>';
    
    $link_add = null;
    $link_add .= '<a type="button" class="btn btn-primary nav-link active" href="Agensi.php?tambah">Add New</a>';

    $dataAgensi = null;
    foreach ($data as $val) {
      list($id, $name, $pendiri) = $val;

      $dataAgensi .= "
            <tr>
              <th>" . $id . "</th>
              <td>" . $name . "</td>
              <td>" . $pendiri . "</td>
              <td>
                        <a class='btn btn-success' href='Agensi.php?id_edit=$id'>Edit</a>
                        <a class='btn btn-danger' href='Agensi.php?id_hapus=$id'>Delete</a>
                      </td>
            </tr>
            ";
    }
    $tpl = new Template("templates/index.html");
    $tpl->replace("HEADER_TABEL", $headerAgensi);
    $tpl->replace("LINK_ADD", $link_add);
    $tpl->replace("DATA_TABEL", $dataAgensi);
    $tpl->write();
  }

  public function rendertambah()
  {
    $judul = "Tambah Agensi";
    $data_form = null;

    $data_form .= '<form method="post" action="agensi.php">

        <br><br>
        <div class="card">
  
          <div class="card-header bg-primary">
            <h1 class="text-white text-center"> Create New Agensi </h1>
          </div><br>
  
          <label> NAME: </label>
          <input type="text" name="nama" class="form-control"> <br>
  
          <label> PENDIRI: </label>
          <input type="text" name="pendiri" class="form-control"> <br>
  
          <button class="btn btn-success" type="submit" name="add"> Submit </button><br>
          <a class="btn btn-info" type="submit" name="cancel" href="Agensi.php"> Cancel </a><br>
  
        </div>
      </form>';

    $tpl = new Template("templates/form.html");
    $tpl->replace("ISI_FORM", $data_form);
    $tpl->replace("JUDUL", $judul);
    $tpl->write();
  }

  public function renderubah($data)
  {
    $judul = 'Edit Agensi';
    $data_form = null;
    list($id, $name, $pendiri) = $data;

    $data_form .= '<form method="post" action="Agensi.php">

        <br><br>
        <div class="card">
  
          <div class="card-header bg-warning">
            <h1 class="text-white text-center"> Update Agensi </h1>
          </div><br>
  
          <input type="hidden" name="id" value="' . $id . '" class="form-control"> <br>
  
          <label> NAME: </label>
          <input type="text" name="nama" value="' . $name . '" class="form-control"> <br>
  
          <label> pendiri: </label>
          <input type="text" name="pendiri" value="' . $pendiri . '" class="form-control"> <br>
  
          <button class="btn btn-success" type="submit" name="edit"> Submit </button><br>
          <a class="btn btn-info" type="submit" name="cancel" href="Agensi.php"> Cancel </a><br>
  
        </div>
      </form>';

    $tpl = new Template("templates/form.html");
    $tpl->replace("ISI_FORM", $data_form);
    $tpl->replace("JUDUL", $judul);
    $tpl->write();
  }
}
