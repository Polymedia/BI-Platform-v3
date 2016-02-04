<?php

namespace Map;

use \Мобилизацияпомесяцам;
use \МобилизацияпомесяцамQuery;
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
 * This class defines the structure of the 'МобилизацияПоМесяцам' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class МобилизацияпомесяцамTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.МобилизацияпомесяцамTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'МобилизацияПоМесяцам';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Мобилизацияпомесяцам';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Мобилизацияпомесяцам';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'МобилизацияПоМесяцам.id';

    /**
     * the column name for the ТипТехники field
     */
    const COL_ТИПТЕХНИКИ = 'МобилизацияПоМесяцам.ТипТехники';

    /**
     * the column name for the ПлаОотгрузкаКоличество field
     */
    const COL_ПЛАООТГРУЗКАКОЛИЧЕСТВО = 'МобилизацияПоМесяцам.ПлаОотгрузкаКоличество';

    /**
     * the column name for the ФактОтгрузкаКоличество field
     */
    const COL_ФАКТОТГРУЗКАКОЛИЧЕСТВО = 'МобилизацияПоМесяцам.ФактОтгрузкаКоличество';

    /**
     * the column name for the ПланДоставкаКоличество field
     */
    const COL_ПЛАНДОСТАВКАКОЛИЧЕСТВО = 'МобилизацияПоМесяцам.ПланДоставкаКоличество';

    /**
     * the column name for the ФактДоставкаКоличество field
     */
    const COL_ФАКТДОСТАВКАКОЛИЧЕСТВО = 'МобилизацияПоМесяцам.ФактДоставкаКоличество';

    /**
     * the column name for the Проект field
     */
    const COL_ПРОЕКТ = 'МобилизацияПоМесяцам.Проект';

    /**
     * the column name for the Год field
     */
    const COL_ГОД = 'МобилизацияПоМесяцам.Год';

    /**
     * the column name for the Месяц field
     */
    const COL_МЕСЯЦ = 'МобилизацияПоМесяцам.Месяц';

    /**
     * the column name for the ДатаОтчёта field
     */
    const COL_ДАТАОТЧЁТА = 'МобилизацияПоМесяцам.ДатаОтчёта';

    /**
     * the column name for the УчастокРабот field
     */
    const COL_УЧАСТОКРАБОТ = 'МобилизацияПоМесяцам.УчастокРабот';

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
        self::TYPE_PHPNAME       => array('Id', 'Типтехники', 'Плаоотгрузкаколичество', 'Фактотгрузкаколичество', 'Пландоставкаколичество', 'Фактдоставкаколичество', 'Проект', 'Год', 'Месяц', 'Датаотчёта', 'Участокработ', ),
        self::TYPE_CAMELNAME     => array('id', '�иптехники', '�лаоотгрузкаколичество', '�актотгрузкаколичество', '�ландоставкаколичество', '�актдоставкаколичество', '�роект', '�од', '�есяц', '�атаотчёта', '�частокработ', ),
        self::TYPE_COLNAME       => array(МобилизацияпомесяцамTableMap::COL_ID, МобилизацияпомесяцамTableMap::COL_ТИПТЕХНИКИ, МобилизацияпомесяцамTableMap::COL_ПЛАООТГРУЗКАКОЛИЧЕСТВО, МобилизацияпомесяцамTableMap::COL_ФАКТОТГРУЗКАКОЛИЧЕСТВО, МобилизацияпомесяцамTableMap::COL_ПЛАНДОСТАВКАКОЛИЧЕСТВО, МобилизацияпомесяцамTableMap::COL_ФАКТДОСТАВКАКОЛИЧЕСТВО, МобилизацияпомесяцамTableMap::COL_ПРОЕКТ, МобилизацияпомесяцамTableMap::COL_ГОД, МобилизацияпомесяцамTableMap::COL_МЕСЯЦ, МобилизацияпомесяцамTableMap::COL_ДАТАОТЧЁТА, МобилизацияпомесяцамTableMap::COL_УЧАСТОКРАБОТ, ),
        self::TYPE_FIELDNAME     => array('id', 'ТипТехники', 'ПлаОотгрузкаКоличество', 'ФактОтгрузкаКоличество', 'ПланДоставкаКоличество', 'ФактДоставкаКоличество', 'Проект', 'Год', 'Месяц', 'ДатаОтчёта', 'УчастокРабот', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Типтехники' => 1, 'Плаоотгрузкаколичество' => 2, 'Фактотгрузкаколичество' => 3, 'Пландоставкаколичество' => 4, 'Фактдоставкаколичество' => 5, 'Проект' => 6, 'Год' => 7, 'Месяц' => 8, 'Датаотчёта' => 9, 'Участокработ' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, '�иптехники' => 1, '�лаоотгрузкаколичество' => 2, '�актотгрузкаколичество' => 3, '�ландоставкаколичество' => 4, '�актдоставкаколичество' => 5, '�роект' => 6, '�од' => 7, '�есяц' => 8, '�атаотчёта' => 9, '�частокработ' => 10, ),
        self::TYPE_COLNAME       => array(МобилизацияпомесяцамTableMap::COL_ID => 0, МобилизацияпомесяцамTableMap::COL_ТИПТЕХНИКИ => 1, МобилизацияпомесяцамTableMap::COL_ПЛАООТГРУЗКАКОЛИЧЕСТВО => 2, МобилизацияпомесяцамTableMap::COL_ФАКТОТГРУЗКАКОЛИЧЕСТВО => 3, МобилизацияпомесяцамTableMap::COL_ПЛАНДОСТАВКАКОЛИЧЕСТВО => 4, МобилизацияпомесяцамTableMap::COL_ФАКТДОСТАВКАКОЛИЧЕСТВО => 5, МобилизацияпомесяцамTableMap::COL_ПРОЕКТ => 6, МобилизацияпомесяцамTableMap::COL_ГОД => 7, МобилизацияпомесяцамTableMap::COL_МЕСЯЦ => 8, МобилизацияпомесяцамTableMap::COL_ДАТАОТЧЁТА => 9, МобилизацияпомесяцамTableMap::COL_УЧАСТОКРАБОТ => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'ТипТехники' => 1, 'ПлаОотгрузкаКоличество' => 2, 'ФактОтгрузкаКоличество' => 3, 'ПланДоставкаКоличество' => 4, 'ФактДоставкаКоличество' => 5, 'Проект' => 6, 'Год' => 7, 'Месяц' => 8, 'ДатаОтчёта' => 9, 'УчастокРабот' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('МобилизацияПоМесяцам');
        $this->setPhpName('Мобилизацияпомесяцам');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Мобилизацияпомесяцам');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('ТипТехники', 'Типтехники', 'INTEGER', true, null, null);
        $this->addColumn('ПлаОотгрузкаКоличество', 'Плаоотгрузкаколичество', 'INTEGER', false, null, null);
        $this->addColumn('ФактОтгрузкаКоличество', 'Фактотгрузкаколичество', 'INTEGER', false, null, null);
        $this->addColumn('ПланДоставкаКоличество', 'Пландоставкаколичество', 'INTEGER', false, null, null);
        $this->addColumn('ФактДоставкаКоличество', 'Фактдоставкаколичество', 'INTEGER', false, null, null);
        $this->addColumn('Проект', 'Проект', 'INTEGER', true, null, null);
        $this->addColumn('Год', 'Год', 'INTEGER', true, null, null);
        $this->addColumn('Месяц', 'Месяц', 'INTEGER', true, null, null);
        $this->addColumn('ДатаОтчёта', 'Датаотчёта', 'DATE', true, null, null);
        $this->addColumn('УчастокРабот', 'Участокработ', 'INTEGER', true, null, null);
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
        return $withPrefix ? МобилизацияпомесяцамTableMap::CLASS_DEFAULT : МобилизацияпомесяцамTableMap::OM_CLASS;
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
     * @return array           (Мобилизацияпомесяцам object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = МобилизацияпомесяцамTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = МобилизацияпомесяцамTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + МобилизацияпомесяцамTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = МобилизацияпомесяцамTableMap::OM_CLASS;
            /** @var Мобилизацияпомесяцам $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            МобилизацияпомесяцамTableMap::addInstanceToPool($obj, $key);
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
            $key = МобилизацияпомесяцамTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = МобилизацияпомесяцамTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Мобилизацияпомесяцам $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                МобилизацияпомесяцамTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(МобилизацияпомесяцамTableMap::COL_ID);
            $criteria->addSelectColumn(МобилизацияпомесяцамTableMap::COL_ТИПТЕХНИКИ);
            $criteria->addSelectColumn(МобилизацияпомесяцамTableMap::COL_ПЛАООТГРУЗКАКОЛИЧЕСТВО);
            $criteria->addSelectColumn(МобилизацияпомесяцамTableMap::COL_ФАКТОТГРУЗКАКОЛИЧЕСТВО);
            $criteria->addSelectColumn(МобилизацияпомесяцамTableMap::COL_ПЛАНДОСТАВКАКОЛИЧЕСТВО);
            $criteria->addSelectColumn(МобилизацияпомесяцамTableMap::COL_ФАКТДОСТАВКАКОЛИЧЕСТВО);
            $criteria->addSelectColumn(МобилизацияпомесяцамTableMap::COL_ПРОЕКТ);
            $criteria->addSelectColumn(МобилизацияпомесяцамTableMap::COL_ГОД);
            $criteria->addSelectColumn(МобилизацияпомесяцамTableMap::COL_МЕСЯЦ);
            $criteria->addSelectColumn(МобилизацияпомесяцамTableMap::COL_ДАТАОТЧЁТА);
            $criteria->addSelectColumn(МобилизацияпомесяцамTableMap::COL_УЧАСТОКРАБОТ);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.ТипТехники');
            $criteria->addSelectColumn($alias . '.ПлаОотгрузкаКоличество');
            $criteria->addSelectColumn($alias . '.ФактОтгрузкаКоличество');
            $criteria->addSelectColumn($alias . '.ПланДоставкаКоличество');
            $criteria->addSelectColumn($alias . '.ФактДоставкаКоличество');
            $criteria->addSelectColumn($alias . '.Проект');
            $criteria->addSelectColumn($alias . '.Год');
            $criteria->addSelectColumn($alias . '.Месяц');
            $criteria->addSelectColumn($alias . '.ДатаОтчёта');
            $criteria->addSelectColumn($alias . '.УчастокРабот');
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
        return Propel::getServiceContainer()->getDatabaseMap(МобилизацияпомесяцамTableMap::DATABASE_NAME)->getTable(МобилизацияпомесяцамTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(МобилизацияпомесяцамTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(МобилизацияпомесяцамTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new МобилизацияпомесяцамTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Мобилизацияпомесяцам or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Мобилизацияпомесяцам object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(МобилизацияпомесяцамTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Мобилизацияпомесяцам) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The Мобилизацияпомесяцам object has no primary key');
        }

        $query = МобилизацияпомесяцамQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            МобилизацияпомесяцамTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                МобилизацияпомесяцамTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the МобилизацияПоМесяцам table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return МобилизацияпомесяцамQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Мобилизацияпомесяцам or Criteria object.
     *
     * @param mixed               $criteria Criteria or Мобилизацияпомесяцам object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(МобилизацияпомесяцамTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Мобилизацияпомесяцам object
        }


        // Set the correct dbName
        $query = МобилизацияпомесяцамQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // МобилизацияпомесяцамTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
МобилизацияпомесяцамTableMap::buildTableMap();
