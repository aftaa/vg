<?php

namespace console\controllers\vg;

use common\models\User;
use Yii;
use yii\base\InvalidConfigException;
use yii\console\Controller;
use yii\db\Connection;
use yii\db\Exception;
use yii\db\Expression;
use yii\db\Query;

/**
 * Class ImportController
 * @package console\controllers\vg
 */
class ImportController extends Controller
{
    /**
     *
     */
    public function actionIndex()
    {
        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();

        echo "\n\nImport from current database to the new database.\n\n";

        echo "Truncates tables...";
        $this->truncateTables();
        echo "\ndone.\n\n";

        echo "Import areas... ";
        $this->importAreas();
        echo "done.\n\n";

        echo "Create root and admin users... ";
        $this->createRootAndAdmin();
        echo "done.\n\n";

        echo "Import company categories... ";
        $this->importCompanyCategories();
        echo "done.\n\n";

        $this->importUsersAndMembers();

        $this->importCompaniesAndTheirParams();

        echo "Import product categories... ";
        $this->importProductCategories();
        echo "done.\n\n";

        echo "Import products... \n";
        $this->importProducts();
        echo "done.\n\n";

        Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();
    }

    /**
     * @throws Exception
     */
    private function truncateTables()
    {
        $tables = [
            'area',
            'user',
            'member',
            'company',
            'company_param',
            'company_param_value',
            'company_category',
            'product_category',
            'product',
        ];

        foreach ($tables as $table) {
            echo "\n\t$table...";
            Yii::$app->db->createCommand("TRUNCATE TABLE $table")->execute();
        }
    }

    /**
     * @param array $items
     * @return array
     */
    private function map(array $items): array
    {
        $items = array_map(function (array $item) {
            return array_values($item);
        }, $items);
        return $items;
    }

    /**
     * @param string|null $thumb
     * @return string|null
     */
    private function modifyThumb(?string $thumb): ?string
    {
        if (!preg_match('/^http/', $thumb)) {
            $thumb = 'http://vseti-goroda.ru/' . $thumb;
        }

        $thumb = trim($thumb);
        if (empty($thumb)) {
            return null;
        }

        return $thumb;
    }

    /**
     * @throws InvalidConfigException
     * @throws Exception
     */
    private function importAreas()
    {
        $dbVsetigTest = Yii::$app->get('dbVsetigTest');

        $columns = [
            'id'        => 'areaid',
            'name'      => 'areaname',
            'sort'      => 'areaorder',
            'parent_id' => new Expression('IF(parentid, parentid, NULL)')
        ];

        $areas = (new Query)->select(array_values($columns))->from('aw_area')->all($dbVsetigTest);
        $areas = $this->map($areas);
        Yii::$app->db->createCommand()->batchInsert('area', array_keys($columns), $areas)->execute();
    }

    /**
     * @throws Exception
     * @throws InvalidConfigException
     */
    private function importCompanyCategories()
    {
        $dbVsetigTest = Yii::$app->get('dbVsetigTest');

        $columns = [
            'id'               => 'catid',
            'name'             => 'catname',
            'sort'             => 'catorder',
            'icon'             => 'catimg',
            'meta_description' => 'description',
            'meta_keywords'    => 'keywords',
            'parent_id'        => new Expression('IF(parentid, parentid, NULL)'),
        ];

        $companyCategories = (new Query)->select(array_values($columns))->from('aw_com_cat')->all($dbVsetigTest);
        $companyCategories = $this->map($companyCategories);

        Yii::$app->db->createCommand()->batchInsert('company_category', array_keys($columns), $companyCategories)->execute();
    }

    /**
     * @throws Exception
     * @throws InvalidConfigException
     */
    private function importUsersAndMembers()
    {
        echo "Import users...";

        $dbVsetigTest = Yii::$app->get('dbVsetigTest');
        $members = (new Query)->select('*')->from('aw_member')->all($dbVsetigTest);

        $membersInsert = [];
        $usersInsert = [];
        $emails = [];
        foreach ($members as $i => $member) {

            $user = new User;
            $user->id = $member['userid'];
            $username = $member['username'];
            if ('admin' == $username) {
                $username = 'member';
            }
            $user->username = $username;
            $email = $username;
            if (in_array($email, $emails)) {
                $email = count($emails) . "_$email";
            }
            $emails[] = $email;
            $user->email = $email;
            $user->status = User::STATUS_ACTIVE;
            $user->created_at = $member['registertime'];
            $user->updated_at = time();
            $user->password_hash = '';
            $user->generateAuthKey();

            $membersInsert[] = [
                $member['userid'],
                $member['userid'],
                $member['password'],
                $member['ferstname'],
                $member['family'],
                $member['lastname'],
                $member['unp'],
                $member['phone'],
                $member['money'],
                $member['avatar'],
            ];

            $usersInsert[] = [
                $user->id,
                $user->username,
                $user->email,
                $user->status,
                $user->created_at,
                $user->updated_at,
                $user->password_hash,
                $user->auth_key,

            ];
        }

        $userColumns = [
            'id',
            'username',
            'email',
            'status',
            'created_at',
            'updated_at',
            'password_hash',
            'auth_key',
        ];

        Yii::$app->db->createCommand()->batchInsert('user', $userColumns, $usersInsert)->execute();
        echo "done.\n\n";

        echo "Import members... ";

        $memberColumns = [
            'id',
            'user_id',
            'old_password',
            'first_name',
            'last_name',
            'middle_name',
            'position',
            'phone',
            'balance',
            'user_pic',
        ];

        Yii::$app->db->createCommand()->batchInsert('member', $memberColumns, $membersInsert)->execute();
        echo "done.\n\n";
    }

    /**
     * @throws Exception
     * @throws InvalidConfigException
     */
    public function importCompaniesAndTheirParams()
    {
        /** @var Connection $dbVsetigTest */
        $dbVsetigTest = Yii::$app->get('dbVsetigTest');

        echo "Import company params... ";

        $params = [
            'phone'       => 'Телефон',
            'linkman'     => 'Контактное лицо',
            'icq'         => 'ICQ',
            'msn'         => 'MSN',
            'email'       => 'E-mail',
            'fax'         => 'Факс',
            'address'     => 'Адрес',
            'mappoint'    => 'map_point',
            'click'       => 'clicks',
            'postdate'    => 'Дата публикации',
            'total_votes' => 'total_votes',
            'total_value' => 'total_value',
            'sait'        => 'Веб-сайт',
            'socset'      => 'Ссылка на социальную сеть',
            'youtube'     => 'YouTube',
            'Mon'         => 'Пн',
            'Tue'         => 'Вт',
            'Wed'         => 'Ср',
            'Thu'         => 'Чт',
            'Fri'         => 'Пт',
            'Sat'         => 'Сб',
            'Sun'         => 'Вс',
        ];

        $paramId = [];
        $i = 1;
        $paramsInsert = [];
        foreach ($params as $paramCode => $paramName) {
            $paramsInsert[] = [
                $i,
                $i,
                $paramCode,
                $paramName,
            ];
            $paramId[$paramCode] = $i++;
        }

        $paramsColumns = ['id', 'sort', 'code', 'name'];
        Yii::$app->db->createCommand()->batchInsert('company_param', $paramsColumns, $paramsInsert)->execute();
        echo "done.\n\n";

        $companyColumns = [
            'id'                  => 'comid',
            'owner_id'            => 'userid',
            'company_category_id' => 'catid',
            'area_id'             => 'areaid',
            'name'                => 'comname',
            'introduce'           => 'introduce',
            'thumb'               => 'thumb',
            'checked'             => 'is_check',
            'meta_keywords'       => 'keywords',
            'meta_description'    => 'description',
        ];

        $paramValueColumns = [
            'company_id',
            'param_id',
            'value',
        ];

        $companies = (new Query)
            ->select(array_merge(array_values($companyColumns), array_keys($params)))
            ->from('aw_com')
            ->all($dbVsetigTest);

        $companyInsert = [];
        $paramValueInsert = [];
        foreach ($companies as $company) {
            $companyInsert[] = [
                $company['comid'],
                $company['userid'],
                $company['catid'],
                $company['areaid'],
                $company['comname'],
                $company['introduce'],
                $this->modifyThumb($company['thumb']),
                $company['is_check'],
                $company['keywords'],
                $company['description'],
            ];

            $i = 1;
            foreach ($params as $paramCode => $paramName) {
                $paramValueInsert[] = [
                    $company['comid'],
                    $i++,
                    $company[$paramCode] ?? '',
                ];
            }
        }

        echo "Import companies... ";
        Yii::$app->db->createCommand()->batchInsert('company', array_keys($companyColumns), $companyInsert)->execute();
        echo "done.\n\n";

        echo "Import companies params values... ";
        Yii::$app->db->createCommand()->batchInsert('company_param_value', $paramValueColumns, $paramValueInsert)->execute();
        echo "done.\n\n";
    }

    /**
     * @throws Exception
     * @throws InvalidConfigException
     */
    public function importProductCategories()
    {
        /** @var Connection $dbVsetigTest */
        $dbVsetigTest = Yii::$app->get('dbVsetigTest');

        $columns = [
            'id'               => 'catid',
            'name'             => 'catname',
            'meta_keywords'    => 'keywords',
            'meta_description' => 'description',
            'sort'             => 'catorder',
            'icon'             => 'catimg',
            'parent_id'        => new Expression('IF(parentid, parentid, NULL)'),
        ];

        $categories = (new Query)->select(array_values($columns))->from('aw_category')->all($dbVsetigTest);
        $categories = $this->map($categories);
        Yii::$app->db->createCommand()->batchInsert('product_category', array_keys($columns), $categories)->execute();

        unset($columns['icon']);
        $categories = (new Query)->select(array_values($columns))->from('aw_category3')->all($dbVsetigTest);
        $categories = $this->map($categories);
        Yii::$app->db->createCommand()->batchInsert('product_category', array_keys($columns), $categories)->execute();
    }

    /**
     * @throws Exception
     * @throws InvalidConfigException
     */
    public function importProducts()
    {
        /** @var Connection $dbVsetigInfoCom */
        $dbVsetigInfoCom = Yii::$app->get('dbVsetigInfoCom');

        $columns = [
            'category_id'      => 'catid',
            'name'             => 'title',
            'description'      => 'content',
            'thumb'            => 'thumb',
            'checked'          => 'is_check',
            'meta_description' => 'description',
            'meta_keywords'    => 'keywords',
            'price'            => 'price',
            'created_at'       => 'lastupdatetime',
        ];

        $tables = $dbVsetigInfoCom->createCommand('SHOW TABLES')->queryColumn();
        $productsInsert = [];

        $limit = 100;

        $columnsForInsert = array_keys($columns);
        array_unshift($columnsForInsert, 'company_id');
        $insertedAll = 0;

        foreach ($tables as $table) {

            if (!preg_match('/^aw_info\d+/', $table)) {
                continue;
            }
            $companyId = $this->getCompanyIdByTableName($table);

            $count = (new Query)->from($table)->count();

            for ($offset = 0; $offset < $count; $offset += $limit) {
                $products = (new Query)
                    ->select(array_values($columns))
                    ->from($table)
                    ->offset($offset)
                    ->limit($limit)
                    ->all($dbVsetigInfoCom);
                $products = $this->map($products);

                foreach ($products as &$product) {
                    array_unshift($product, $companyId);
                    if (!$product[9]) {
                        $product[9] = time();
                    }
                    $product[9] = date('Y-m-d H:i:s', $product[9]);
                }

                $inserted = Yii::$app->db
                    ->createCommand()
                    ->batchInsert('product', $columnsForInsert, $products)
                    ->execute();
                $insertedAll += $inserted;
            }
        }
    }

    /**
     * @param string $tableName
     * @return int|null
     * @throws Exception
     */
    public function getCompanyIdByTableName(string $tableName): ?int
    {
        $memberId = (int)str_replace('aw_info', '', $tableName);
        $companyId = Yii::$app->db->createCommand("SELECT id FROM company WHERE owner_id=$memberId")->queryScalar();
        return $companyId ?? null;
    }

    private function createRootAndAdmin()
    {
        $root = new User;
        $root->id = 1;
        $root->username = 'root';
        $root->setPassword('darkside');
        $root->email = 'root@vseti-goroda.ru';
        $root->status = User::STATUS_ACTIVE;
        $root->generateAuthKey();
        $root->save();

        $admin = new User;
        $admin->id = 2;
        $admin->username = 'admin';
        $admin->setPassword('vsetigoroda');
        $admin->email = 'admin@vseti-goroda.ru';
        $admin->status = User::STATUS_ACTIVE;
        $admin->generateAuthKey();
        $admin->save();
    }
}
