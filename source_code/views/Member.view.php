<?php

class MemberView
{
  public function render($data)
  {
    $headerMember = null;

    $headerMember .= '<th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>PHONE</th>
    <th>JOIN DATE</th>
    <th>GRUP</th>';

    $link_add = null;
    $link_add .= '<a type="button" class="btn btn-primary nav-link active" href="index.php?tambah">Add New</a>';

    $dataMember = null;
    foreach ($data as $val) {
      list($id, $name, $email, $phone, $join, $grup) = $val;
      $grup = $val['nama'];

      $dataMember .= "
            <tr>
              <th>" . $id . "</th>
              <td>" . $name . "</td>
              <td>" . $email . "</td>
              <td>" . $phone . "</td>
              <td>" . $join . "</td>
              <td>" . $grup . "</td>
              <td>
                        <a class='btn btn-success' href='index.php?id_edit=$id'>Edit</a>
                        <a class='btn btn-danger' href='index.php?id_hapus=$id'>Delete</a>
                      </td>
            </tr>
            ";
    }
    $tpl = new Template("templates/index.html");
    $tpl->replace("HEADER_TABEL", $headerMember);
    $tpl->replace("LINK_ADD", $link_add);
    $tpl->replace("DATA_TABEL", $dataMember);
    $tpl->write();
  }

  public function rendertambah($data_grup)
  {
    $judul = "Tambah Member";
    $data_form = null;

    $data_form .= '<form method="post" action="index.php">

        <br><br>
        <div class="card">
  
          <div class="card-header bg-primary">
            <h1 class="text-white text-center"> Create New Member </h1>
          </div><br>
  
          <label> NAME: </label>
          <input type="text" name="name" class="form-control"> <br>
  
          <label> EMAIL: </label>
          <input type="text" name="email" class="form-control"> <br>
  
          <label> PHONE: </label>
          <input type="text" name="phone" class="form-control"> <br>
  
          <label> JOIN DATE: </label>
          <input type="date" name="join_date" class="form-control"> <br>
  
          <label> GRUP MEMBER: </label>
          <select required class="form-control" name="grup_id" id="exampleFormControlSelect1">';
    while ($row = $data_grup->getResult()) {
      $data_form .= "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
    }
    $data_form .= '
                                </select> <br>
  
          <button class="btn btn-success" type="submit" name="add"> Submit </button><br>
          <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
  
        </div>
      </form>';

    $tpl = new Template("templates/form.html");
    $tpl->replace("ISI_FORM", $data_form);
    $tpl->replace("JUDUL", $judul);
    $tpl->write();
  }

  public function renderubah($data, $data_grup)
  {
    $judul = 'Edit Member';
    $data_form = null;
    list($id, $name, $email, $phone, $join, $grup) = $data;

    $data_form .= '<form method="post" action="index.php">

        <br><br>
        <div class="card">
  
          <div class="card-header bg-warning">
            <h1 class="text-white text-center"> Update Member </h1>
          </div><br>
  
          <input type="hidden" name="id" value="' . $id . '" class="form-control"> <br>
  
          <label> NAME: </label>
          <input type="text" name="name" value="' . $name . '" class="form-control"> <br>
  
          <label> EMAIL: </label>
          <input type="text" name="email" value="' . $email . '" class="form-control"> <br>
  
          <label> PHONE: </label>
          <input type="text" name="phone" value="' . $phone . '" class="form-control"> <br>
  
          <label> JOIN DATE: </label>
          <input type="date" name="join_date" value="' . $join . '" class="form-control"> <br>

          <label> GRUP MEMBER: </label>
          <select required class="form-control" name="grup_id" id="exampleFormControlSelect1">';
    while ($row = $data_grup->getResult()) {
      $selected = ($row["id"] == $grup) ? 'selected' : ''; // Menandai pilihan saat ini 
      $data_form .= "<option value='" . $row['id'] . "' ' . $selected . '>" . $row['nama'] . "</option>";
    }
    $data_form .= '
                                </select> <br>
  
          <button class="btn btn-success" type="submit" name="edit"> Submit </button><br>
          <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
  
        </div>
      </form>';

    $tpl = new Template("templates/form.html");
    $tpl->replace("ISI_FORM", $data_form);
    $tpl->replace("JUDUL", $judul);
    $tpl->write();
  }
}
