<?php
class User_Controller extends Controller {
    private $style;
    private $script_top;
    private $script_bottom;

    public function __construct() {
        parent::__construct();
        $modules = new Module(['menu']);
        $sidebarleft = new View;
        $sidebarleft->Assign('modules', $modules->Render());
        $this->Assign('sidebarleft', $sidebarleft->Render('sidebarleft', false));
        $this->style = '<link href="assets/css/style-responsive.css" rel="stylesheet">';
        $this->script_top = '';
        $this->script_bottom = '

		';
    }

    private function getHeaderFooter() {
        $header = new View();
        $header->Assign('brand', APP_NAME);
        $header->Assign('user', getLoggedUser('fullname'));
        $header->Assign('style', $this->style);
        $header->Assign('script_top', $this->script_top);
        $this->Assign('header', $header->Render('header', false));
        $footer = new View();
        $footer->Assign('script_bottom', $this->script_bottom);
        $this->Assign('footer', $footer->Render('footer', false));
    }

    public function index() {
        $data = [];
        $list = new User;
        // var_dump($list->getUsers()); die;
        foreach ($list->getUsers() as $l) {
            switch ($l->status) {
            case 'A':$status = "Aktif";
                break;
            case 'B':$status = "Block";
                break;
            default:
                $status = "-";
                break;
            }
            $data[] = (Object) [
                'tgl' => $l->created,
                'userid' => $l->userid,
                'name' => $l->name,
                'email' => $l->email,
                // 'last' => $l->last_login,
                'wewenang' => $l->wewenang,
                'status' => $status,
                'statuscode' => $l->status,
            ];
        }
        $this->Assign('list', $data);
        $this->getHeaderFooter();
        $this->Load_View('admin/user');
    }

    private function formTambah() {

    }

    public function tambah() {
        $this->getHeaderFooter();
        // $this->Load_View('dokumen/tambah');
    }

    private function formUbah() {

    }

    public function ubah($id) {
        $user = new User;
        $data = $user->getUser($id);
        $this->Assign('ubahForm', 1);
        $this->Assign('userid', $id);
        $this->Assign('name', $data->getName());
        $this->Assign('email', $data->getEmail());
        $this->Assign('wewenang', $data->getWewenang());
        $this->Assign('status', $data->getStatus());
        $this->index();
    }

    public function hapus($userid) {

    }

}