<?php

include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/Grup.class.php");
include_once("views/Member.view.php");

class MemberController
{
    private $member;
    private $grup;

    function __construct()
    {
        $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->grup = new Grup(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->member->open();
        $this->member->getMemberJoin();

        $this->grup->open();
        $this->grup->getGrup();

        $data = array();
        while ($row = $this->member->getResult()) {
            array_push($data, $row);
        }

        $this->member->close();
        $this->grup->close();

        $view = new MemberView();
        $view->render($data);
    }

    public function tambah() {
        $view = new MemberView();
        
        $this->grup->open();
        $this->grup->getGrup();

        $data_grup = $this->grup;

        $view->rendertambah($data_grup);
    }

    public function ubah($id) {
        $this->member->open();
        $this->member->getMemberById($id);
        $data = $this->member->getResult();
        
        $this->grup->open();
        $this->grup->getGrup();
        $data_grup = $this->grup;

        $view = new MemberView();
        $view->renderubah($data, $data_grup);
    }

    function add($data)
    {
        $this->member->open();
        $this->member->add($data);
        $this->member->close();

        header("location: index.php");
    }

    function edit($data)
    {
        $this->member->open();
        $this->member->update($data);
        $this->member->close();

        header("location: index.php");
    }

    function delete($id)
    {
        $this->member->open();
        $this->member->delete($id);
        $this->member->close();

        header("location: index.php");
    }
}
