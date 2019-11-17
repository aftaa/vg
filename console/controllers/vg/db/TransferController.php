<?php

namespace console\controllers\vg\db;

use Yii;
use yii\base\InvalidConfigException;
use yii\console\Controller;
use yii\console\controllers\BaseMigrateController;
use yii\db\Connection;
use yii\db\Exception;

class TransferController extends Controller
{
    const MIGRATE_TABLE_NAME = 'migrate';

    /**
     * @return int
     */
    public function actionPrepare()
    {
        try {
            $db = Yii::$app->getDb();
            $this->prepareDatabase($db);
            return 1;

        } catch (Exception $e) {
            echo "{$e->getMessage()}\n";
            return 0;
        }
    }

    /**
     * @param Connection $db
     * @throws Exception
     */
    private function foreignKeyChecksOff(Connection $db): void
    {
        $db->createCommand('SET foreign_key_checks = 0')->execute();
        echo "Проверка ссылочной целостности отключена.\n";
    }

    /**
     * @param Connection $db
     * @throws Exception
     */
    private function foreignKeyChecksOn(Connection $db): void
    {
        $db->createCommand('SET foreign_key_checks = 1')->execute();
        echo "Проверка ссылочной целостности включена.\n";
    }

    /**
     * @param Connection $db
     * @throws Exception
     */
    private function prepareDatabase(Connection $db): void
    {
        $this->foreignKeyChecksOff($db);
        $tables = $this->getTableNames($db);
        foreach ($tables as $table) {
            if ($this->isMigrateTable($table)) {
                $this->cleanMigrateTable($db);
            } else {
                $this->dropTable($db, $table);
            }
        }
        $this->foreignKeyChecksOn($db);
    }

    /**
     * @param Connection $db
     * @return array
     * @throws Exception
     */
    private function getTableNames(Connection $db): array
    {
        return $db->createCommand('SHOW TABLES')->queryColumn();
    }

    /**
     * @param Connection $db
     */
    private function cleanMigrateTable(Connection $db): void
    {
        $baseMigrationVersion = BaseMigrateController::BASE_MIGRATION;
        $db->createCommand("DELETE FROM migrate WHERE baseMigrationVersion <> '$baseMigrationVersion'");
        $migrateTableName = self::MIGRATE_TABLE_NAME;
        echo "Таблица $migrateTableName очищена.\n";
    }

    /**
     * @param Connection $db
     * @param $table
     * @throws Exception
     */
    private function dropTable(Connection $db, $table): void
    {
        $db->createCommand("DROP TABLE $table")->execute();
        echo "Таблица $table удалена.\n";
    }

    /**
     * @return bool
     */
    private function isMigrateTable(): bool
    {
        return self::MIGRATE_TABLE_NAME == $table;
    }
}