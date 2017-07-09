<?php
class KategoriDokumen_Controller extends Controller {
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
        $list = new KategoriDokumen;
        $this->Assign('list', $list->getKategori());
        $this->getHeaderFooter();
        $this->Load_View('admin/kategoridokumen');
    }
    public function tambahSimpan() {
        $error = '';
        if (!isset($_POST)) {
            $error = 'Data tidak ditemukan';
            $this->Assign('errorMessage', $error);
            return $this->index();
        }
        $this->Assign('kategoridokumen', $_POST['kategoridokumen']);
        $this->Assign('deskripsi', $_POST['deskripsi']);

        if ($_POST['kategoridokumen'] == '') {
            logs('kategoridokumen kosong');
            $error = 'Kategori dokumen tidak boleh kosong';
            $this->Assign('errorMessage', $error);
        }
        $data = [
            'kategori' => $_POST['kategoridokumen'],
            'deskripsi' => $_POST['deskripsi'],
        ];
        $kategoridokumen = new KategoriDokumen;
        if ($error == '') {
            $result = $kategoridokumen->tambah($data);
            if (!$result) {
                redirect(SITE_ROOT, 'admin/kategoridokumen');
            }
        }

        $this->Assign('tambahForm', 1);
        $this->index();
    }
    public function ubah($id) {
        $kategoridokumen = new KategoriDokumen;
        $data = $kategoridokumen->show($id);
        $this->Assign('ubahForm', 1);
        $this->Assign('id', $id);
        $this->Assign('kategoridokumen', $data->kategori);
        $this->Assign('deskripsi', $data->deskripsi);
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
        $this->Assign('kategoridokumen', $_POST['kategoridokumen']);
        $this->Assign('deskripsi', $_POST['deskripsi']);
        if ($_POST['kategoridokumen'] == '') {
            $error = 'Kategori dokumen tidak boleh kosong';
            $this->Assign('errorMessage', $error);
        }
        $data = [
            'id' => $_POST['id'],
            'kategori' => $_POST['kategoridokumen'],
            'deskripsi' => $_POST['deskripsi'],
        ];

        $kategoridokumen = new KategoriDokumen;
        if ($error == '') {
            $result = $kategoridokumen->ubah($data, $_POST['id']);
            if (!$result) {
                redirect(SITE_ROOT, 'admin/kategoridokumen');
            }
        }
        $this->Assign('ubahForm', 1);
        $this->index();
    }
    public function hapus($id) {
        $kategoridokumen = new KategoriDokumen;
        $kategoridokumen->hapus($id);
        redirect(SITE_ROOT, 'admin/kategoridokumen');
    }

}
