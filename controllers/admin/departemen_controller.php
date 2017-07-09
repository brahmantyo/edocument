<?php
class Departemen_Controller extends Controller {
    private $style;
    private $script_top;
    private $script_bottom;

    public function __construct() {
        parent::__construct();
        if (!checkSession()) {
            session_destroy();
            return redirect(SITE_ROOT, 'auth/login');
        }
        $modules = new Module(['menu']);
        $sidebarleft = new View;
        $sidebarleft->Assign('modules', $modules->Render());
        $this->Assign('sidebarleft', $sidebarleft->Render('sidebarleft', false));
    }

    private function getHeaderFooter() {
        $header = new View();
        $header->Assign('app_title', APP_TITLE);
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
        $list = new Departemen;
        $this->Assign('list', $list->getDepartemen());
        $this->getHeaderFooter();
        $this->Load_View('admin/departemen');
    }
    public function tambahSimpan() {
        $error = '';
        if (!isset($_POST)) {
            $error = 'Data tidak ditemukan';
            $this->Assign('errorMessage', $error);
            return $this->index();
        }
        $this->Assign('namadepartemen', $_POST['namadepartemen']);

        if ($_POST['namadepartemen'] == '') {
            $error = 'Nama departemen tidak boleh kosong';
            $this->Assign('errorMessage', $error);
        }
        $data = [
            'name' => $_POST['namadepartemen'],
        ];
        $departemen = new Departemen;
        if ($error == '') {
            $result = $departemen->tambah($data);
            if (!$result) {
                redirect(SITE_ROOT, 'admin/departemen');
            }
        }

        $this->Assign('tambahForm', 1);
        $this->index();
    }
    public function ubah($id) {
        $departemen = new Departemen;
        $data = $departemen->show($id);
        $this->Assign('ubahForm', 1);
        $this->Assign('id', $id);
        $this->Assign('namadepartemen', $data->name);
        $this->index();
    }
    public function ubahSimpan() {
        $error = '';
        if (!isset($_POST)) {
            $error = 'Data pengubahan tidak ditemukan';
            $this->Assign('errorMessage', $error);
            $this->index();
        }
        $this->Assign('id', $_POST['id']);
        $this->Assign('namadepartemen', $_POST['namadepartemen']);
        if ($_POST['namadepartemen'] == '') {
            $error = 'Nama departemen tidak boleh kosong';
            $this->Assign('errorMessage', $error);
        }
        $data = [
            'iddepartemen' => $_POST['id'],
            'name' => $_POST['namadepartemen'],
        ];

        $departemen = new Departemen;
        if ($error == '') {
            $result = $departemen->ubah($data, $_POST['id']);
            if (!$result) {
                redirect(SITE_ROOT, 'admin/departemen');
            }
        }
        $this->Assign('ubahForm', 1);
        $this->index();
    }
    public function hapus($id) {
        $departemen = new Departemen;
        $departemen->hapus($id);
        redirect(SITE_ROOT, 'admin/departemen');
    }

}
