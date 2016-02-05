<?php

namespace Map;

use \мтр;
use \мтрQuery;
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
 * This class defines the structure of the 'МТР' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class мтрTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.мтрTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'МТР';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\мтр';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'мтр';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'МТР.id';

    /**
     * the column name for the VIN field
     */
    const COL_VIN = 'МТР.VIN';

    /**
     * the column name for the Тип_техники field
     */
    const COL_ТИП_ТЕХНИКИ = 'МТР.Тип_техники';

    /**
     * the column name for the Дата field
     */
    const COL_ДАТА = 'МТР.Дата';

    /**
     * the column name for the Состояние_техники field
     */
    const COL_СОСТОЯНИЕ_ТЕХНИКИ = 'МТР.Состояние_техники';

    /**
     * the column name for the Подрядчик field
     */
    const COL_ПОДРЯДЧИК = 'МТР.Подрядчик';

    /**
     * the column name for the Проект field
     */
    const COL_ПРОЕКТ = 'МТР.Проект';

    /**
     * the column name for the Дата_отчёта field
     */
    const COL_ДАТА_ОТЧЁТА = 'МТР.Дата_отчёта';

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
        self::TYPE_PHPNAME       => array('Id', 'Vin', 'типтехники', 'дата', 'состояниетехники', 'подрядчик', 'проект', 'датаотчёта', ),
        self::TYPE_CAMELNAME     => array('id', 'vin', '�иптехники', '�ата', '�остояниетехники', '�одрядчик', '�роект', '�атаотчёта', ),
        self::TYPE_COLNAME       => array(мтрTableMap::COL_ID, мтрTableMap::COL_VIN, мтрTableMap::COL_ТИП_ТЕХНИКИ, мтрTableMap::COL_ДАТА, мтрTableMap::COL_СОСТОЯНИЕ_ТЕХНИКИ, мтрTableMap::COL_ПОДРЯДЧИК, мтрTableMap::COL_ПРОЕКТ, мтрTableMap::COL_ДАТА_ОТЧЁТА, ),
        self::TYPE_FIELDNAME     => array('id', 'VIN', 'Тип_техники', 'Дата', 'Состояние_техники', 'Подрядчик', 'Проект', 'Дата_отчёта', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Vin' => 1, 'типтехники' => 2, 'дата' => 3, 'состояниетехники' => 4, 'подрядчик' => 5, 'проект' => 6, 'датаотчёта' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'vin' => 1, '�иптехники' => 2, '�ата' => 3, '�остояниетехники' => 4, '�одрядчик' => 5, '�роект' => 6, '�атаотчёта' => 7, ),
        self::TYPE_COLNAME       => array(мтрTableMap::COL_ID => 0, мтрTableMap::COL_VIN => 1, мтрTableMap::COL_ТИП_ТЕХНИКИ => 2, мтрTableMap::COL_ДАТА => 3, мтрTableMap::COL_СОСТОЯНИЕ_ТЕХНИКИ => 4, мтрTableMap::COL_ПОДРЯДЧИК => 5, мтрTableMap::COL_ПРОЕКТ => 6, мтрTableMap::COL_ДАТА_ОТЧЁТА => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'VIN' => 1, 'Тип_техники' => 2, 'Дата' => 3, 'Состояние_техники' => 4, 'Подрядчик' => 5, 'Проект' => 6, 'Дата_отчёта' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('МТР');
        $this->setPhpName('мтр');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\мтр');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('VIN', 'Vin', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('Тип_техники', 'типтехники', 'INTEGER', 'Типы_техники_МТР', 'id', true, null, null);
        $this->addForeignKey('Дата', 'дата', 'DATE', 'Календарь', 'Дата', true, null, null);
        $this->addForeignKey('Состояние_техники', 'состояниетехники', 'INTEGER', 'Статус_состояния_техники', 'id', true, null, null);
        $this->addForeignKey('Подрядчик', 'подрядчик', 'INTEGER', 'Подрядчики_МТР', 'id', true, null, null);
        $this->addForeignKey('Проект', 'проект', 'INTEGER', 'Проекты', 'id', false, null, null);
        $this->addColumn('Дата_отчёта', 'датаотчёта', 'DATE', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Календарь', '\\Календарь', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Дата',
    1 => ':Дата',
  ),
), null, null, null, false);
        $this->addRelation('подрядчикимтр', '\\подрядчикимтр', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Подрядчик',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Проекты', '\\Проекты', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Проект',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('статуссостояниятехники', '\\статуссостояниятехники', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Состояние_техники',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('типытехникимтр', '\\типытехникимтр', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Тип_техники',
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
        return $withPrefix ? мтрTableMap::CLASS_DEFAULT : мтрTableMap::OM_CLASS;
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
     * @return array           (мтр object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = мтрTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = мтрTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + мтрTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = мтрTableMap::OM_CLASS;
            /** @var мтр $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            мтрTableMap::addInstanceToPool($obj, $key);
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
            $key = мтрTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = мтрTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var мтр $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                мтрTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(мтрTableMap::COL_ID);
            $criteria->addSelectColumn(мтрTableMap::COL_VIN);
            $criteria->addSelectColumn(мтрTableMap::COL_ТИП_ТЕХНИКИ);
            $criteria->addSelectColumn(мтрTableMap::COL_ДАТА);
            $criteria->addSelectColumn(мтрTableMap::COL_СОСТОЯНИЕ_ТЕХНИКИ);
            $criteria->addSelectColumn(мтрTableMap::COL_ПОДРЯДЧИК);
            $criteria->addSelectColumn(мтрTableMap::COL_ПРОЕКТ);
            $criteria->addSelectColumn(мтрTableMap::COL_ДАТА_ОТЧЁТА);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.VIN');
            $criteria->addSelectColumn($alias . '.Тип_техники');
            $criteria->addSelectColumn($alias . '.Дата');
            $criteria->addSelectColumn($alias . '.Состояние_техники');
            $criteria->addSelectColumn($alias . '.Подрядчик');
            $criteria->addSelectColumn($alias . '.Проект');
            $criteria->addSelectColumn($alias . '.Дата_отчёта');
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
        return Propel::getServiceContainer()->getDatabaseMap(мтрTableMap::DATABASE_NAME)->getTable(мтрTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(мтрTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(мтрTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new мтрTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a мтр or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or мтр object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(мтрTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \мтр) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(мтрTableMap::DATABASE_NAME);
            $criteria->add(мтрTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = мтрQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            мтрTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                мтрTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the МТР table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return мтрQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a мтр or Criteria object.
     *
     * @param mixed               $criteria Criteria or мтр object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(мтрTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from мтр object
        }

        if ($criteria->containsKey(мтрTableMap::COL_ID) && $criteria->keyContainsValue(мтрTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.мтрTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = мтрQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // мтрTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
мтрTableMap::buildTableMap();
