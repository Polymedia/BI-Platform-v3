<?php

namespace Map;

use \выработка;
use \выработкаQuery;
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
 * This class defines the structure of the 'Выработка' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class выработкаTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.выработкаTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Выработка';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\выработка';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'выработка';

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
    const COL_ID = 'Выработка.id';

    /**
     * the column name for the Дата field
     */
    const COL_ДАТА = 'Выработка.Дата';

    /**
     * the column name for the Участок_работ field
     */
    const COL_УЧАСТОК_РАБОТ = 'Выработка.Участок_работ';

    /**
     * the column name for the Тип_техники field
     */
    const COL_ТИП_ТЕХНИКИ = 'Выработка.Тип_техники';

    /**
     * the column name for the План field
     */
    const COL_ПЛАН = 'Выработка.План';

    /**
     * the column name for the Факт field
     */
    const COL_ФАКТ = 'Выработка.Факт';

    /**
     * the column name for the Тип_работ field
     */
    const COL_ТИП_РАБОТ = 'Выработка.Тип_работ';

    /**
     * the column name for the Выработка field
     */
    const COL_ВЫРАБОТКА = 'Выработка.Выработка';

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
        self::TYPE_PHPNAME       => array('Id', 'дата', 'участокработ', 'типтехники', 'план', 'факт', 'типработ', 'выработка', ),
        self::TYPE_CAMELNAME     => array('id', '�ата', '�частокработ', '�иптехники', '�лан', '�акт', '�ипработ', '�ыработка', ),
        self::TYPE_COLNAME       => array(выработкаTableMap::COL_ID, выработкаTableMap::COL_ДАТА, выработкаTableMap::COL_УЧАСТОК_РАБОТ, выработкаTableMap::COL_ТИП_ТЕХНИКИ, выработкаTableMap::COL_ПЛАН, выработкаTableMap::COL_ФАКТ, выработкаTableMap::COL_ТИП_РАБОТ, выработкаTableMap::COL_ВЫРАБОТКА, ),
        self::TYPE_FIELDNAME     => array('id', 'Дата', 'Участок_работ', 'Тип_техники', 'План', 'Факт', 'Тип_работ', 'Выработка', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'дата' => 1, 'участокработ' => 2, 'типтехники' => 3, 'план' => 4, 'факт' => 5, 'типработ' => 6, 'выработка' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, '�ата' => 1, '�частокработ' => 2, '�иптехники' => 3, '�лан' => 4, '�акт' => 5, '�ипработ' => 6, '�ыработка' => 7, ),
        self::TYPE_COLNAME       => array(выработкаTableMap::COL_ID => 0, выработкаTableMap::COL_ДАТА => 1, выработкаTableMap::COL_УЧАСТОК_РАБОТ => 2, выработкаTableMap::COL_ТИП_ТЕХНИКИ => 3, выработкаTableMap::COL_ПЛАН => 4, выработкаTableMap::COL_ФАКТ => 5, выработкаTableMap::COL_ТИП_РАБОТ => 6, выработкаTableMap::COL_ВЫРАБОТКА => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'Дата' => 1, 'Участок_работ' => 2, 'Тип_техники' => 3, 'План' => 4, 'Факт' => 5, 'Тип_работ' => 6, 'Выработка' => 7, ),
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
        $this->setName('Выработка');
        $this->setPhpName('выработка');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\выработка');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('Дата', 'дата', 'DATE', 'Календарь', 'Дата', true, null, null);
        $this->addForeignKey('Участок_работ', 'участокработ', 'INTEGER', 'Участки_работ', 'id', true, null, null);
        $this->addForeignKey('Тип_техники', 'типтехники', 'INTEGER', 'Типы_техники_выработка', 'id', true, null, null);
        $this->addColumn('План', 'план', 'INTEGER', false, null, null);
        $this->addColumn('Факт', 'факт', 'INTEGER', false, null, null);
        $this->addForeignKey('Тип_работ', 'типработ', 'INTEGER', 'Типы_работ', 'id', true, null, null);
        $this->addColumn('Выработка', 'выработка', 'BOOLEAN', true, 1, null);
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
        $this->addRelation('типыработ', '\\типыработ', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Тип_работ',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('типытехникивыработка', '\\типытехникивыработка', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Тип_техники',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('участкиработ', '\\участкиработ', RelationMap::MANY_TO_ONE, array (
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
        return $withPrefix ? выработкаTableMap::CLASS_DEFAULT : выработкаTableMap::OM_CLASS;
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
     * @return array           (выработка object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = выработкаTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = выработкаTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + выработкаTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = выработкаTableMap::OM_CLASS;
            /** @var выработка $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            выработкаTableMap::addInstanceToPool($obj, $key);
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
            $key = выработкаTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = выработкаTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var выработка $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                выработкаTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(выработкаTableMap::COL_ID);
            $criteria->addSelectColumn(выработкаTableMap::COL_ДАТА);
            $criteria->addSelectColumn(выработкаTableMap::COL_УЧАСТОК_РАБОТ);
            $criteria->addSelectColumn(выработкаTableMap::COL_ТИП_ТЕХНИКИ);
            $criteria->addSelectColumn(выработкаTableMap::COL_ПЛАН);
            $criteria->addSelectColumn(выработкаTableMap::COL_ФАКТ);
            $criteria->addSelectColumn(выработкаTableMap::COL_ТИП_РАБОТ);
            $criteria->addSelectColumn(выработкаTableMap::COL_ВЫРАБОТКА);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.Дата');
            $criteria->addSelectColumn($alias . '.Участок_работ');
            $criteria->addSelectColumn($alias . '.Тип_техники');
            $criteria->addSelectColumn($alias . '.План');
            $criteria->addSelectColumn($alias . '.Факт');
            $criteria->addSelectColumn($alias . '.Тип_работ');
            $criteria->addSelectColumn($alias . '.Выработка');
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
        return Propel::getServiceContainer()->getDatabaseMap(выработкаTableMap::DATABASE_NAME)->getTable(выработкаTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(выработкаTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(выработкаTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new выработкаTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a выработка or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or выработка object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(выработкаTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \выработка) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(выработкаTableMap::DATABASE_NAME);
            $criteria->add(выработкаTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = выработкаQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            выработкаTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                выработкаTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Выработка table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return выработкаQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a выработка or Criteria object.
     *
     * @param mixed               $criteria Criteria or выработка object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(выработкаTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from выработка object
        }

        if ($criteria->containsKey(выработкаTableMap::COL_ID) && $criteria->keyContainsValue(выработкаTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.выработкаTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = выработкаQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // выработкаTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
выработкаTableMap::buildTableMap();
