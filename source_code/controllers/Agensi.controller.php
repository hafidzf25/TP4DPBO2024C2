<?php

include_once("conf.php");
include_once("models/Agensi.class.php");
include_once("views/Agensi.view.php");

class AgensiController
{
    private $agensi;

    function __construct()
    {
        $this->agensi = new Agensi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->agensi->open();
        $this->agensi->getAgensi();
        $data = array();
        while ($row = $this->agensi->getResult()) {
            array_push($data, $row);
        }

        $this->agensi->close();

        $view = new AgensiView();
        $view->render($data);
    }

    public function tambah() {
        $view = new AgensiView();
        $view->rendertambah();
    }

    public function ubah($id) {
        $this->agensi->open();
        $this->agensi->getAgensiById($id);
        $data = $this->agensi->getResult();

        $view = new AgensiView();
        $view->renderubah($data);
    }

    function add($data)
    {
        $this->agensi->open();
        $this->agensi->add($data);
        $this->agensi->close();

        header("location: Agensi.php");
    }

    function edit($data)
    {
        $this->agensi->open();
        $this->agensi->update($data);
        $this->agensi->close();

        header("location: Agensi.php");
    }

    function delete($id)
    {
        $this->agensi->open();
        $this->agensi->delete($id);
        $this->agensi->close();

        header("location: Agensi.php");
    }
}
