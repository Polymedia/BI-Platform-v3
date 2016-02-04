<?php

namespace Map;

use \Мтр;
use \МтрQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
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
class МтрTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.МтрTableMap';

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
    const OM_CLASS = '\\Мтр';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Мтр';

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
     * the column name for the ТипТехники field
     */
    const COL_ТИПТЕХНИКИ = 'МТР.ТипТехники';

    /**
     * the column name for the Дата field
     */
    const COL_ДАТА = 'МТР.Дата';

    /**
     * the column name for the СостояниеТехники field
     */
    const COL_СОСТОЯНИЕТЕХНИКИ = 'МТР.СостояниеТехники';

    /**
     * the column name for the Подрядчик field
     */
    const COL_ПОДРЯДЧИК = 'МТР.Подрядчик';

    /**
     * the column name for the Проект field
     */
    const COL_ПРОЕКТ = 'МТР.Проект';

    /**
     * the column name for the ДатаОтчёта field
     */
    const COL_ДАТАОТЧЁТА = 'МТР.ДатаОтчёта';

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
        self::TYPE_PHPNAME       => array('Id', 'Vin', 'Типтехники', 'Дата', 'Состояниетехники', 'Подрядчик', 'Проект', 'Датаотчёта', ),
        self::TYPE_CAMELNAME     => array('id', 'vin', '�иптехники', '�ата', '�остояниетехники', '�одрядчик', '�роект', '�атаотчёта', ),
        self::TYPE_COLNAME       => array(МтрTableMap::COL_ID, МтрTableMap::COL_VIN, МтрTableMap::COL_ТИПТЕХНИКИ, МтрTableMap::COL_ДАТА, МтрTableMap::COL_СОСТОЯНИЕТЕХНИКИ, МтрTableMap::COL_ПОДРЯДЧИК, МтрTableMap::COL_ПРОЕКТ, МтрTableMap::COL_ДАТАОТЧЁТА, ),
        self::TYPE_FIELDNAME     => array('id', 'VIN', 'ТипТехники', 'Дата', 'СостояниеТехники', 'Подрядчик', 'Проект', 'ДатаОтчёта', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Vin' => 1, 'Типтехники' => 2, 'Дата' => 3, 'Состояниетехники' => 4, 'Подрядчик' => 5, 'Проект' => 6, 'Датаотчёта' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'vin' => 1, '�иптехники' => 2, '�ата' => 3, '�остояниетехники' => 4, '�одрядчик' => 5, '�роект' => 6, '�атаотчёта' => 7, ),
        self::TYPE_COLNAME       => array(МтрTableMap::COL_ID => 0, МтрTableMap::COL_VIN => 1, МтрTableMap::COL_ТИПТЕХНИКИ => 2, МтрTableMap::COL_ДАТА => 3, МтрTableMap::COL_СОСТОЯНИЕТЕХНИКИ => 4, МтрTableMap::COL_ПОДРЯДЧИК => 5, МтрTableMap::COL_ПРОЕКТ => 6, МтрTableMap::COL_ДАТАОТЧЁТА => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'VIN' => 1, 'ТипТехники' => 2, 'Дата' => 3, 'СостояниеТехники' => 4, 'Подрядчик' => 5, 'Проект' => 6, 'ДатаОтчёта' => 7, ),
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
        $this->setPhpName('Мтр');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Мтр');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('VIN', 'Vin', 'LONGVARCHAR', true, null, null);
        $this->addColumn('ТипТехники', 'Типтехники', 'INTEGER', true, null, null);
        $this->addColumn('Дата', 'Дата', 'DATE', true, null, null);
        $this->addColumn('СостояниеТехники', 'Состояниетехники', 'INTEGER', true, null, null);
        $this->addColumn('Подрядчик', 'Подрядчик', 'INTEGER', true, null, null);
        $this->addColumn('Проект', 'Проект', 'INTEGER', false, null, null);
        $this->addColumn('ДатаОтчёта', 'Датаотчёта', 'DATE', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
        return null;
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
        return '';
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
        return $withPrefix ? МтрTableMap::CLASS_DEFAULT : МтрTableMap::OM_CLASS;
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
     * @return array           (Мтр object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = МтрTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = МтрTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + МтрTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = МтрTableMap::OM_CLASS;
            /** @var Мтр $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            МтрTableMap::addInstanceToPool($obj, $key);
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
            $key = МтрTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = МтрTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Мтр $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                МтрTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(МтрTableMap::COL_ID);
            $criteria->addSelectColumn(МтрTableMap::COL_VIN);
            $criteria->addSelectColumn(МтрTableMap::COL_ТИПТЕХНИКИ);
            $criteria->addSelectColumn(МтрTableMap::COL_ДАТА);
            $criteria->addSelectColumn(МтрTableMap::COL_СОСТОЯНИЕТЕХНИКИ);
            $criteria->addSelectColumn(МтрTableMap::COL_ПОДРЯДЧИК);
            $criteria->addSelectColumn(МтрTableMap::COL_ПРОЕКТ);
            $criteria->addSelectColumn(МтрTableMap::COL_ДАТАОТЧЁТА);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.VIN');
            $criteria->addSelectColumn($alias . '.ТипТехники');
            $criteria->addSelectColumn($alias . '.Дата');
            $criteria->addSelectColumn($alias . '.СостояниеТехники');
            $criteria->addSelectColumn($alias . '.Подрядчик');
            $criteria->addSelectColumn($alias . '.Проект');
            $criteria->addSelectColumn($alias . '.ДатаОтчёта');
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
        return Propel::getServiceContainer()->getDatabaseMap(МтрTableMap::DATABASE_NAME)->getTable(МтрTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(МтрTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(МтрTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new МтрTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Мтр or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Мтр object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(МтрTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Мтр) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The Мтр object has no primary key');
        }

        $query = МтрQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            МтрTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                МтрTableMap::removeInstanceFromPool($singleval);
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
        return МтрQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Мтр or Criteria object.
     *
     * @param mixed               $criteria Criteria or Мтр object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(МтрTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Мтр object
        }


        // Set the correct dbName
        $query = МтрQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // МтрTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
МтрTableMap::buildTableMap();
