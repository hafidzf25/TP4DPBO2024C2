<?php

include_once("conf.php");
include_once("models/Grup.class.php");
include_once("models/Agensi.class.php");
include_once("views/Grup.view.php");

class GrupController
{
    private $grup;
    private $agensi;

    function __construct()
    {
        $this->grup = new Grup(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->agensi = new Agensi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->grup->open();
        $this->grup->getGrupJoin();

        $data = array();
        while ($row = $this->grup->getResult()) {
            array_push($data, $row);
        }

        $this->grup->close();

        $view = new GrupView();
        $view->render($data);
    }

    public function tambah() {
        $view = new GrupView();
        
        $this->agensi->open();
        $this->agensi->getAgensi();

        $data_agensi = $this->agensi;

        $view->rendertambah($data_agensi);
    }

    public function ubah($id) {
        $this->grup->open();
        $this->grup->getGrupById($id);
        $data = $this->grup->getResult();
        
        $this->agensi->open();
        $this->agensi->getAgensi();
        $data_agensi = $this->agensi;

        $view = new GrupView();
        $view->renderubah($data, $data_agensi);
    }

    function add($data)
    {
        $this->grup->open();
        $this->grup->add($data);
        $this->grup->close();

        header("location: Grup.php");
    }

    function edit($data)
    {
        $this->grup->open();
        $this->grup->update($data);
        $this->grup->close();

        header("location: Grup.php");
    }

    function delete($id)
    {
        $this->grup->open();
        $this->grup->delete($id);
        $this->grup->close();

        header("location: Grup.php");
    }
}
