<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//$url = 'http://cenipokarmanu.com/index.php?route=feed/yandex_market';       //адрес YML-файла
//echo('as1');
define('IN_AWEBCOM', true);
require dirname(__FILE__) . '/include/common.php';
require dirname(__FILE__) . '/xmlparse.php';
//print_r($_userid);


if (empty($_userid)) {
    //redirect to login page
    header('Location: http://vseti-goroda.ru');
}


//zagruzka url ili fayla post
$syncing = false;
$is_ok = true;

$parser = new Xmlparse($_SESSION['userid']);
echo('aaa');
print_r($_POST);
print_r($_FILES);
exit();
if (isset($_POST['lv']) && $_POST['lv'] == 'load') {

    $parser->user_id = $_userid;

    $parsing_file = '';

    $url = $_POST['xml_url'];

    if (!empty($url)) {
        $parsing_file = $url;
    } elseif (isset($_FILES['xml'])) {
        $parsing_file = $_FILES['xml'];
        print_r($parsing_file);
        $is_file_uploaded = $parser->uploadFile($parsing_file);
        if ($is_file_uploaded === false) {
            $is_ok = false;
        }
    }

    if ($is_ok) {
        $is_ok = $parser->is_xml_parsed();
    }

    if ($is_ok) {
        $parser->file = $parsing_file;
        $saved_id = $parser->save_init();
    }

    //var_dump($saved_id);
    if ($saved_id !== false) {
        $_SESSION['loaded'] = true;
        $_SESSION['raw_id'] = $saved_id;
        //header('Location: '.$_SERVER["PHP_SELF"]);
        exit();
    } else {
        $is_ok = false;
    }
    $error = $parser->operation_error;

}

if (isset($_SESSION['loaded'])) {
    $parsing_id = $_SESSION['raw_id'];
    $parse_info = $parser->get_parse_info($parsing_id);
    var_dump($parser->isInit($parse_info));
    //etap linkovka kategoriy
    if ($parser->isInit($parse_info)) {
        $all_cats = $parser->get_cat_list_array();

        $parser->file = $parse_info['file'];
        $result = $parser->parsing();
        if ($result) {
            $syncing = true;
            $info = $parser->info;
            $cats_json = $parser->getTreeNode();
        }
    }


}
include template('custom_parser');
?>