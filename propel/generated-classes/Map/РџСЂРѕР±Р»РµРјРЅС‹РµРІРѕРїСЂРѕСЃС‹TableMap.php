<?php

namespace Map;

use \Проблемныевопросы;
use \ПроблемныевопросыQuery;
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
 * This class defines the structure of the 'ПроблемныеВопросы' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ПроблемныевопросыTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ПроблемныевопросыTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ПроблемныеВопросы';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Проблемныевопросы';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Проблемныевопросы';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'ПроблемныеВопросы.id';

    /**
     * the column name for the Проект field
     */
    const COL_ПРОЕКТ = 'ПроблемныеВопросы.Проект';

    /**
     * the column name for the Дата field
     */
    const COL_ДАТА = 'ПроблемныеВопросы.Дата';

    /**
     * the column name for the Кому field
     */
    const COL_КОМУ = 'ПроблемныеВопросы.Кому';

    /**
     * the column name for the ПроблемныеВопросы field
     */
    const COL_ПРОБЛЕМНЫЕВОПРОСЫ = 'ПроблемныеВопросы.ПроблемныеВопросы';

    /**
     * the column name for the МерыДляРешения field
     */
    const COL_МЕРЫДЛЯРЕШЕНИЯ = 'ПроблемныеВопросы.МерыДляРешения';

    /**
     * the column name for the Ответсвенный field
     */
    const COL_ОТВЕТСВЕННЫЙ = 'ПроблемныеВопросы.Ответсвенный';

    /**
     * the column name for the Срок field
     */
    const COL_СРОК = 'ПроблемныеВопросы.Срок';

    /**
     * the column name for the Статус field
     */
    const COL_СТАТУС = 'ПроблемныеВопросы.Статус';

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
        self::TYPE_PHPNAME       => array('Id', 'Проект', 'Дата', 'Кому', 'Проблемныевопросы', 'Мерыдлярешения', 'Ответсвенный', 'Срок', 'Статус', ),
        self::TYPE_CAMELNAME     => array('id', '�роект', '�ата', '�ому', '�роблемныевопросы', '�ерыдлярешения', '�тветсвенный', '�рок', '�татус', ),
        self::TYPE_COLNAME       => array(ПроблемныевопросыTableMap::COL_ID, ПроблемныевопросыTableMap::COL_ПРОЕКТ, ПроблемныевопросыTableMap::COL_ДАТА, ПроблемныевопросыTableMap::COL_КОМУ, ПроблемныевопросыTableMap::COL_ПРОБЛЕМНЫЕВОПРОСЫ, ПроблемныевопросыTableMap::COL_МЕРЫДЛЯРЕШЕНИЯ, ПроблемныевопросыTableMap::COL_ОТВЕТСВЕННЫЙ, ПроблемныевопросыTableMap::COL_СРОК, ПроблемныевопросыTableMap::COL_СТАТУС, ),
        self::TYPE_FIELDNAME     => array('id', 'Проект', 'Дата', 'Кому', 'ПроблемныеВопросы', 'МерыДляРешения', 'Ответсвенный', 'Срок', 'Статус', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Проект' => 1, 'Дата' => 2, 'Кому' => 3, 'Проблемныевопросы' => 4, 'Мерыдлярешения' => 5, 'Ответсвенный' => 6, 'Срок' => 7, 'Статус' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, '�роект' => 1, '�ата' => 2, '�ому' => 3, '�роблемныевопросы' => 4, '�ерыдлярешения' => 5, '�тветсвенный' => 6, '�рок' => 7, '�татус' => 8, ),
        self::TYPE_COLNAME       => array(ПроблемныевопросыTableMap::COL_ID => 0, ПроблемныевопросыTableMap::COL_ПРОЕКТ => 1, ПроблемныевопросыTableMap::COL_ДАТА => 2, ПроблемныевопросыTableMap::COL_КОМУ => 3, ПроблемныевопросыTableMap::COL_ПРОБЛЕМНЫЕВОПРОСЫ => 4, ПроблемныевопросыTableMap::COL_МЕРЫДЛЯРЕШЕНИЯ => 5, ПроблемныевопросыTableMap::COL_ОТВЕТСВЕННЫЙ => 6, ПроблемныевопросыTableMap::COL_СРОК => 7, ПроблемныевопросыTableMap::COL_СТАТУС => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'Проект' => 1, 'Дата' => 2, 'Кому' => 3, 'ПроблемныеВопросы' => 4, 'МерыДляРешения' => 5, 'Ответсвенный' => 6, 'Срок' => 7, 'Статус' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('ПроблемныеВопросы');
        $this->setPhpName('Проблемныевопросы');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Проблемныевопросы');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('Проект', 'Проект', 'INTEGER', false, null, null);
        $this->addColumn('Дата', 'Дата', 'DATE', true, null, null);
        $this->addColumn('Кому', 'Кому', 'LONGVARCHAR', true, null, null);
        $this->addColumn('ПроблемныеВопросы', 'Проблемныевопросы', 'LONGVARCHAR', true, null, null);
        $this->addColumn('МерыДляРешения', 'Мерыдлярешения', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Ответсвенный', 'Ответсвенный', 'LONGVARCHAR', false, null, null);
        $this->addColumn('Срок', 'Срок', 'DATE', false, null, null);
        $this->addColumn('Статус', 'Статус', 'LONGVARCHAR', false, null, null);
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
        return $withPrefix ? ПроблемныевопросыTableMap::CLASS_DEFAULT : ПроблемныевопросыTableMap::OM_CLASS;
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
     * @return array           (Проблемныевопросы object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ПроблемныевопросыTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ПроблемныевопросыTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ПроблемныевопросыTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ПроблемныевопросыTableMap::OM_CLASS;
            /** @var Проблемныевопросы $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ПроблемныевопросыTableMap::addInstanceToPool($obj, $key);
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
            $key = ПроблемныевопросыTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ПроблемныевопросыTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Проблемныевопросы $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ПроблемныевопросыTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ПроблемныевопросыTableMap::COL_ID);
            $criteria->addSelectColumn(ПроблемныевопросыTableMap::COL_ПРОЕКТ);
            $criteria->addSelectColumn(ПроблемныевопросыTableMap::COL_ДАТА);
            $criteria->addSelectColumn(ПроблемныевопросыTableMap::COL_КОМУ);
            $criteria->addSelectColumn(ПроблемныевопросыTableMap::COL_ПРОБЛЕМНЫЕВОПРОСЫ);
            $criteria->addSelectColumn(ПроблемныевопросыTableMap::COL_МЕРЫДЛЯРЕШЕНИЯ);
            $criteria->addSelectColumn(ПроблемныевопросыTableMap::COL_ОТВЕТСВЕННЫЙ);
            $criteria->addSelectColumn(ПроблемныевопросыTableMap::COL_СРОК);
            $criteria->addSelectColumn(ПроблемныевопросыTableMap::COL_СТАТУС);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.Проект');
            $criteria->addSelectColumn($alias . '.Дата');
            $criteria->addSelectColumn($alias . '.Кому');
            $criteria->addSelectColumn($alias . '.ПроблемныеВопросы');
            $criteria->addSelectColumn($alias . '.МерыДляРешения');
            $criteria->addSelectColumn($alias . '.Ответсвенный');
            $criteria->addSelectColumn($alias . '.Срок');
            $criteria->addSelectColumn($alias . '.Статус');
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
        return Propel::getServiceContainer()->getDatabaseMap(ПроблемныевопросыTableMap::DATABASE_NAME)->getTable(ПроблемныевопросыTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ПроблемныевопросыTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ПроблемныевопросыTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ПроблемныевопросыTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Проблемныевопросы or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Проблемныевопросы object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ПроблемныевопросыTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Проблемныевопросы) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The Проблемныевопросы object has no primary key');
        }

        $query = ПроблемныевопросыQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ПроблемныевопросыTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ПроблемныевопросыTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ПроблемныеВопросы table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ПроблемныевопросыQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Проблемныевопросы or Criteria object.
     *
     * @param mixed               $criteria Criteria or Проблемныевопросы object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ПроблемныевопросыTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Проблемныевопросы object
        }


        // Set the correct dbName
        $query = ПроблемныевопросыQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ПроблемныевопросыTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ПроблемныевопросыTableMap::buildTableMap();
