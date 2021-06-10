<?php

use App\Traits\TranslationTrait;

class Products extends Controller
{
    use TranslationTrait;

    private $shopOwnerModel;
    public $shopModel;
    public $productModel;

    //instantiate models
    public function __construct() {
        $this->shopOwnerModel = $this->model('Shopowner');
        $this->shopModel = $this->model('Shop');
        $this->productModel = $this->model('Product');
    }

    // import products function
    public function importProduct() {

        // only accessible if shopOwner is logged in
        if (isLoggedInShopOwner()) {

            $data = [
                'fileError' => ''
            ];

            $shop = $this->shopModel->getMyShop($_SESSION['kvk_number']);

            // csv file is submitted
            if (isset($_POST['import_data'])) {
                // get file variables
                $fileName = $_FILES['csv_import']['name'];
                $fileTmp = $_FILES['csv_import']['tmp_name'];
                $fileError = $_FILES['csv_import']['error'];

                // check if file exists, else throw error
                if($fileName) {
                    // get file extension
                    $fileExt = explode('.', $fileName);
                    $realFileExt = strtolower(end($fileExt));

                    //check if file gives error and has csv extension
                    if($fileError === 0 && $realFileExt == 'csv') {
                        // open file read only
                        $handle = fopen($fileTmp, 'r');

                        // use while loop to process all data
                        $rows = 0;
                        while ($products = fgetcsv($handle, 1000, ';')) {
                            // skip first row (column headers)
                            $rows++;
                            if ($rows > 1) {
                                $product = [
                                    'shop_number'           => $shop->shop_number,
                                    'product_name'          =>
                                        [
                                            'EN' => trim($products[0]),
                                            'NL' => trim($products[1])
                                        ],
                                    'product_description'   =>
                                        [
                                            'EN' => trim($products[2]),
                                            'NL' => trim($products[3])
                                        ],
                                    'product_stock'         => trim($products[4]),
                                    'product_price'         => trim($products[5])
                                ];

                                if ($this->productModel->addProduct($product)) {
                                    continue;
                                } else {
                                    // import failed
                                    header('location: ' . URLROOT . '/products/importProduct?failed');
                                }
                            }
                        }
                        // close the file
                        fclose($handle);
                        // import success
                        header('location: ' . URLROOT . '/products/importProduct?success');
                    } else {
                        $data['fileError'] = 'file_error2';
                    }
                } else {
                    $data['fileError'] = 'file_error';
                }
            }

            //load view
            $this->view('products/importProduct', $data);

            // if not logged in redirect to login
        } else {
            header('location: ' . URLROOT . '/Shopowners/login');
        }
    }
}
