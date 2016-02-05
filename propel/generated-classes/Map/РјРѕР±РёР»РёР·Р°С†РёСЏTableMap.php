<?php

namespace Map;

use \мобилизация;
use \мобилизацияQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'Мобилизация' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class мобилизацияTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.мобилизацияTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Мобилизация';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\мобилизация';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'мобилизация';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id field
     */
    const COL_ID = 'Мобилизация.id';

    /**
     * the column name for the Тип_техники field
     */
    const COL_ТИП_ТЕХНИКИ = 'Мобилизация.Тип_техники';

    /**
     * the column name for the План_отгрузка_количество field
     */
    const COL_ПЛАН_ОТГРУЗКА_КОЛИЧЕСТВО = 'Мобилизация.План_отгрузка_количество';

    /**
     * the column name for the Факт_отгрузка_количество field
     */
    const COL_ФАКТ_ОТГРУЗКА_КОЛИЧЕСТВО = 'Мобилизация.Факт_отгрузка_количество';

    /**
     * the column name for the План_доставка_количество field
     */
    const COL_ПЛАН_ДОСТАВКА_КОЛИЧЕСТВО = 'Мобилизация.План_доставка_количество';

    /**
     * the column name for the Факт_доставка_количество field
     */
    const COL_ФАКТ_ДОСТАВКА_КОЛИЧЕСТВО = 'Мобилизация.Факт_доставка_количество';

    /**
     * the column name for the Аренда field
     */
    const COL_АРЕНДА = 'Мобилизация.Аренда';

    /**
     * the column name for the Остаток_к_доставке field
     */
    const COL_ОСТАТОК_К_ДОСТАВКЕ = 'Мобилизация.Остаток_к_доставке';

    /**
     * the column name for the Промежуточный_пункт_количество field
     */
    const COL_ПРОМЕЖУТОЧНЫЙ_ПУНКТ_КОЛИЧЕСТВО = 'Мобилизация.Промежуточный_пункт_количество';

    /**
     * the column name for the Проект field
     */
    const COL_ПРОЕКТ = 'Мобилизация.Проект';

    /**
     * the column name for the Дата_отчёта field
     */
    const COL_ДАТА_ОТЧЁТА = 'Мобилизация.Дата_отчёта';

    /**
     * the column name for the Участок_работ field
     */
    const COL_УЧАСТОК_РАБОТ = 'Мобилизация.Участок_работ';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'типтехники', 'планотгрузкаколичество', 'фактотгрузкаколичество', 'пландоставкаколичество', 'фактдоставкаколичество', 'аренда', 'остатоккдоставке', 'промежуточныйпунктколичество', 'проект', 'датаотчёта', 'участокработ', ),
        self::TYPE_CAMELNAME     => array('id', '�иптехники', '�ланотгрузкаколичество', '�актотгрузкаколичество', '�ландоставкаколичество', '�актдоставкаколичество', '�ренда', '�статоккдоставке', '�ромежуточныйпунктколичество', '�роект', '�атаотчёта', '�частокработ', ),
        self::TYPE_COLNAME       => array(мобилизацияTableMap::COL_ID, мобилизацияTableMap::COL_ТИП_ТЕХНИКИ, мобилизацияTableMap::COL_ПЛАН_ОТГРУЗКА_КОЛИЧЕСТВО, мобилизацияTableMap::COL_ФАКТ_ОТГРУЗКА_КОЛИЧЕСТВО, мобилизацияTableMap::COL_ПЛАН_ДОСТАВКА_КОЛИЧЕСТВО, мобилизацияTableMap::COL_ФАКТ_ДОСТАВКА_КОЛИЧЕСТВО, мобилизацияTableMap::COL_АРЕНДА, мобилизацияTableMap::COL_ОСТАТОК_К_ДОСТАВКЕ, мобилизацияTableMap::COL_ПРОМЕЖУТОЧНЫЙ_ПУНКТ_КОЛИЧЕСТВО, мобилизацияTableMap::COL_ПРОЕКТ, мобилизацияTableMap::COL_ДАТА_ОТЧЁТА, мобилизацияTableMap::COL_УЧАСТОК_РАБОТ, ),
        self::TYPE_FIELDNAME     => array('id', 'Тип_техники', 'План_отгрузка_количество', 'Факт_отгрузка_количество', 'План_доставка_количество', 'Факт_доставка_количество', 'Аренда', 'Остаток_к_доставке', 'Промежуточный_пункт_количество', 'Проект', 'Дата_отчёта', 'Участок_работ', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'типтехники' => 1, 'планотгрузкаколичество' => 2, 'фактотгрузкаколичество' => 3, 'пландоставкаколичество' => 4, 'фактдоставкаколичество' => 5, 'аренда' => 6, 'остатоккдоставке' => 7, 'промежуточныйпунктколичество' => 8, 'проект' => 9, 'датаотчёта' => 10, 'участокработ' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, '�иптехники' => 1, '�ланотгрузкаколичество' => 2, '�актотгрузкаколичество' => 3, '�ландоставкаколичество' => 4, '�актдоставкаколичество' => 5, '�ренда' => 6, '�статоккдоставке' => 7, '�ромежуточныйпунктколичество' => 8, '�роект' => 9, '�атаотчёта' => 10, '�частокработ' => 11, ),
        self::TYPE_COLNAME       => array(мобилизацияTableMap::COL_ID => 0, мобилизацияTableMap::COL_ТИП_ТЕХНИКИ => 1, мобилизацияTableMap::COL_ПЛАН_ОТГРУЗКА_КОЛИЧЕСТВО => 2, мобилизацияTableMap::COL_ФАКТ_ОТГРУЗКА_КОЛИЧЕСТВО => 3, мобилизацияTableMap::COL_ПЛАН_ДОСТАВКА_КОЛИЧЕСТВО => 4, мобилизацияTableMap::COL_ФАКТ_ДОСТАВКА_КОЛИЧЕСТВО => 5, мобилизацияTableMap::COL_АРЕНДА => 6, мобилизацияTableMap::COL_ОСТАТОК_К_ДОСТАВКЕ => 7, мобилизацияTableMap::COL_ПРОМЕЖУТОЧНЫЙ_ПУНКТ_КОЛИЧЕСТВО => 8, мобилизацияTableMap::COL_ПРОЕКТ => 9, мобилизацияTableMap::COL_ДАТА_ОТЧЁТА => 10, мобилизацияTableMap::COL_УЧАСТОК_РАБОТ => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'Тип_техники' => 1, 'План_отгрузка_количество' => 2, 'Факт_отгрузка_количество' => 3, 'План_доставка_количество' => 4, 'Факт_доставка_количество' => 5, 'Аренда' => 6, 'Остаток_к_доставке' => 7, 'Промежуточный_пункт_количество' => 8, 'Проект' => 9, 'Дата_отчёта' => 10, 'Участок_работ' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('Мобилизация');
        $this->setPhpName('мобилизация');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\мобилизация');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('Тип_техники', 'типтехники', 'INTEGER', 'Типы_техники_мобилизация', 'id', true, null, null);
        $this->addColumn('План_отгрузка_количество', 'планотгрузкаколичество', 'INTEGER', false, null, null);
        $this->addColumn('Факт_отгрузка_количество', 'фактотгрузкаколичество', 'INTEGER', false, null, null);
        $this->addColumn('План_доставка_количество', 'пландоставкаколичество', 'INTEGER', false, null, null);
        $this->addColumn('Факт_доставка_количество', 'фактдоставкаколичество', 'INTEGER', false, null, null);
        $this->addColumn('Аренда', 'аренда', 'INTEGER', false, null, null);
        $this->addColumn('Остаток_к_доставке', 'остатоккдоставке', 'INTEGER', false, null, null);
        $this->addColumn('Промежуточный_пункт_количество', 'промежуточныйпунктколичество', 'INTEGER', false, null, null);
        $this->addForeignKey('Проект', 'проект', 'INTEGER', 'Проекты', 'id', true, null, null);
        $this->addForeignKey('Дата_отчёта', 'датаотчёта', 'DATE', 'Календарь', 'Дата', true, null, null);
        $this->addForeignKey('Участок_работ', 'участокработ', 'INTEGER', 'Участки_работ_мобилизация', 'id', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Календарь', '\\Календарь', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Дата_отчёта',
    1 => ':Дата',
  ),
), null, null, null, false);
        $this->addRelation('Проекты', '\\Проекты', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Проект',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('типытехникимобилизация', '\\типытехникимобилизация', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Тип_техники',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('участкиработмобилизация', '\\участкиработмобилизация', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Участок_работ',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }
    
    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? мобилизацияTableMap::CLASS_DEFAULT : мобилизацияTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (мобилизация object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = мобилизацияTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = мобилизацияTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + мобилизацияTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = мобилизацияTableMap::OM_CLASS;
            /** @var мобилизация $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            мобилизацияTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = мобилизацияTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = мобилизацияTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var мобилизация $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                мобилизацияTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(мобилизацияTableMap::COL_ID);
            $criteria->addSelectColumn(мобилизацияTableMap::COL_ТИП_ТЕХНИКИ);
            $criteria->addSelectColumn(мобилизацияTableMap::COL_ПЛАН_ОТГРУЗКА_КОЛИЧЕСТВО);
            $criteria->addSelectColumn(мобилизацияTableMap::COL_ФАКТ_ОТГРУЗКА_КОЛИЧЕСТВО);
            $criteria->addSelectColumn(мобилизацияTableMap::COL_ПЛАН_ДОСТАВКА_КОЛИЧЕСТВО);
            $criteria->addSelectColumn(мобилизацияTableMap::COL_ФАКТ_ДОСТАВКА_КОЛИЧЕСТВО);
            $criteria->addSelectColumn(мобилизацияTableMap::COL_АРЕНДА);
            $criteria->addSelectColumn(мобилизацияTableMap::COL_ОСТАТОК_К_ДОСТАВКЕ);
            $criteria->addSelectColumn(мобилизацияTableMap::COL_ПРОМЕЖУТОЧНЫЙ_ПУНКТ_КОЛИЧЕСТВО);
            $criteria->addSelectColumn(мобилизацияTableMap::COL_ПРОЕКТ);
            $criteria->addSelectColumn(мобилизацияTableMap::COL_ДАТА_ОТЧЁТА);
            $criteria->addSelectColumn(мобилизацияTableMap::COL_УЧАСТОК_РАБОТ);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.Тип_техники');
            $criteria->addSelectColumn($alias . '.План_отгрузка_количество');
            $criteria->addSelectColumn($alias . '.Факт_отгрузка_количество');
            $criteria->addSelectColumn($alias . '.План_доставка_количество');
            $criteria->addSelectColumn($alias . '.Факт_доставка_количество');
            $criteria->addSelectColumn($alias . '.Аренда');
            $criteria->addSelectColumn($alias . '.Остаток_к_доставке');
            $criteria->addSelectColumn($alias . '.Промежуточный_пункт_количество');
            $criteria->addSelectColumn($alias . '.Проект');
            $criteria->addSelectColumn($alias . '.Дата_отчёта');
            $criteria->addSelectColumn($alias . '.Участок_работ');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(мобилизацияTableMap::DATABASE_NAME)->getTable(мобилизацияTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(мобилизацияTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(мобилизацияTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new мобилизацияTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a мобилизация or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or мобилизация object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(мобилизацияTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \мобилизация) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(мобилизацияTableMap::DATABASE_NAME);
            $criteria->add(мобилизацияTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = мобилизацияQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            мобилизацияTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                мобилизацияTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Мобилизация table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return мобилизацияQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a мобилизация or Criteria object.
     *
     * @param mixed               $criteria Criteria or мобилизация object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(мобилизацияTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from мобилизация object
        }

        if ($criteria->containsKey(мобилизацияTableMap::COL_ID) && $criteria->keyContainsValue(мобилизацияTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.мобилизацияTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = мобилизацияQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // мобилизацияTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
мобилизацияTableMap::buildTableMap();
