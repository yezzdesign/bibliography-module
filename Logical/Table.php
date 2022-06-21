<?php

namespace Modules\Bibliography\Logical;

use phpDocumentor\Reflection\Types\String_;

class Table
{
    private static array $databaseFields   =    array();
    private static array $databaseValues   =    array();
    private static array $tableRowComponentsPath    =   array();

    /**
     * @return array
     */
    public static function getTableRowComponentsPath(): array
    {
        return self::$tableRowComponentsPath;
    }

    /**
     * @param string $tableRowComponentsPath
     */
    public static function setTableRowComponentsPath(string $tableRowComponentsPath, int $id = 0): void
    {
        self::$tableRowComponentsPath[] .= $tableRowComponentsPath;
    }

    /**
     * @param string $databaseValues
     */
    public static function setDatabaseValues(string $databaseValues, int $id = 0): void
    {
        self::$databaseValues[] .= $databaseValues;
    }

    /**
     * @return array
     */
    public static function getDatabaseValues(): array
    {
        return self::$databaseValues;
    }

    /**
     * @param string $databaseFields
     */
    public static function setDatabaseFields(string $databaseFields): void
    {
        self::$databaseFields[] .= $databaseFields;
    }

    /**
     * @return string
     */
    public static function getDatabaseFields(): array
    {
        return self::$databaseFields;
    }




}
