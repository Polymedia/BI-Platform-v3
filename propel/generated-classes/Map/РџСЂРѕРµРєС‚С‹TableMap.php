<?php

namespace Map;

use \Проекты;
use \ПроектыQuery;
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
 * This class defines the structure of the 'Проекты' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ПроектыTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ПроектыTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Проекты';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Проекты';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Проекты';

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
    const COL_ID = 'Проекты.id';

    /**
     * the column name for the КодПроекта field
     */
    const COL_КОДПРОЕКТА = 'Проекты.КодПроекта';

    /**
     * the column name for the Проект field
     */
    const COL_ПРОЕКТ = 'Проекты.Проект';

    /**
     * the column name for the Руководитель field
     */
    const COL_РУКОВОДИТЕЛЬ = 'Проекты.Руководитель';

    /**
     * the column name for the Заказчик field
     */
    const COL_ЗАКАЗЧИК = 'Проекты.Заказчик';

    /**
     * the column name for the Подрядчики field
     */
    const COL_ПОДРЯДЧИКИ = 'Проекты.Подрядчики';

    /**
     * the column name for the ПериодВыполненияРабот field
     */
    const COL_ПЕРИОДВЫПОЛНЕНИЯРАБОТ = 'Проекты.ПериодВыполненияРабот';

    /**
     * the column name for the ДеталиПроекта field
     */
    const COL_ДЕТАЛИПРОЕКТА = 'Проекты.ДеталиПроекта';

    /**
     * the column name for the ТипСтроительства field
     */
    const COL_ТИПСТРОИТЕЛЬСТВА = 'Проекты.ТипСтроительства';

    /**
     * the column name for the НазваниеПапкиПроекта field
     */
    const COL_НАЗВАНИЕПАПКИПРОЕКТА = 'Проекты.НазваниеПапкиПроекта';

    /**
     * the column name for the Картинка field
     */
    const COL_КАРТИНКА = 'Проекты.Картинка';

    /**
     * the column name for the КарточкаПроекта field
     */
    const COL_КАРТОЧКАПРОЕКТА = 'Проекты.КарточкаПроекта';

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
        self::TYPE_PHPNAME       => array('Id', 'Кодпроекта', 'Проект', 'Руководитель', 'Заказчик', 'Подрядчики', 'Периодвыполненияработ', 'Деталипроекта', 'Типстроительства', 'Названиепапкипроекта', 'Картинка', 'Карточкапроекта', ),
        self::TYPE_CAMELNAME     => array('id', '�одпроекта', '�роект', '�уководитель', '�аказчик', '�одрядчики', '�ериодвыполненияработ', '�еталипроекта', '�ипстроительства', '�азваниепапкипроекта', '�артинка', '�арточкапроекта', ),
        self::TYPE_COLNAME       => array(ПроектыTableMap::COL_ID, ПроектыTableMap::COL_КОДПРОЕКТА, ПроектыTableMap::COL_ПРОЕКТ, ПроектыTableMap::COL_РУКОВОДИТЕЛЬ, ПроектыTableMap::COL_ЗАКАЗЧИК, ПроектыTableMap::COL_ПОДРЯДЧИКИ, ПроектыTableMap::COL_ПЕРИОДВЫПОЛНЕНИЯРАБОТ, ПроектыTableMap::COL_ДЕТАЛИПРОЕКТА, ПроектыTableMap::COL_ТИПСТРОИТЕЛЬСТВА, ПроектыTableMap::COL_НАЗВАНИЕПАПКИПРОЕКТА, ПроектыTableMap::COL_КАРТИНКА, ПроектыTableMap::COL_КАРТОЧКАПРОЕКТА, ),
        self::TYPE_FIELDNAME     => array('id', 'КодПроекта', 'Проект', 'Руководитель', 'Заказчик', 'Подрядчики', 'ПериодВыполненияРабот', 'ДеталиПроекта', 'ТипСтроительства', 'НазваниеПапкиПроекта', 'Картинка', 'КарточкаПроекта', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Кодпроекта' => 1, 'Проект' => 2, 'Руководитель' => 3, 'Заказчик' => 4, 'Подрядчики' => 5, 'Периодвыполненияработ' => 6, 'Деталипроекта' => 7, 'Типстроительства' => 8, 'Названиепапкипроекта' => 9, 'Картинка' => 10, 'Карточкапроекта' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, '�одпроекта' => 1, '�роект' => 2, '�уководитель' => 3, '�аказчик' => 4, '�одрядчики' => 5, '�ериодвыполненияработ' => 6, '�еталипроекта' => 7, '�ипстроительства' => 8, '�азваниепапкипроекта' => 9, '�артинка' => 10, '�арточкапроекта' => 11, ),
        self::TYPE_COLNAME       => array(ПроектыTableMap::COL_ID => 0, ПроектыTableMap::COL_КОДПРОЕКТА => 1, ПроектыTableMap::COL_ПРОЕКТ => 2, ПроектыTableMap::COL_РУКОВОДИТЕЛЬ => 3, ПроектыTableMap::COL_ЗАКАЗЧИК => 4, ПроектыTableMap::COL_ПОДРЯДЧИКИ => 5, ПроектыTableMap::COL_ПЕРИОДВЫПОЛНЕНИЯРАБОТ => 6, ПроектыTableMap::COL_ДЕТАЛИПРОЕКТА => 7, ПроектыTableMap::COL_ТИПСТРОИТЕЛЬСТВА => 8, ПроектыTableMap::COL_НАЗВАНИЕПАПКИПРОЕКТА => 9, ПроектыTableMap::COL_КАРТИНКА => 10, ПроектыTableMap::COL_КАРТОЧКАПРОЕКТА => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'КодПроекта' => 1, 'Проект' => 2, 'Руководитель' => 3, 'Заказчик' => 4, 'Подрядчики' => 5, 'ПериодВыполненияРабот' => 6, 'ДеталиПроекта' => 7, 'ТипСтроительства' => 8, 'НазваниеПапкиПроекта' => 9, 'Картинка' => 10, 'КарточкаПроекта' => 11, ),
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
        $this->setName('Проекты');
        $this->setPhpName('Проекты');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Проекты');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('КодПроекта', 'Кодпроекта', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Проект', 'Проект', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Руководитель', 'Руководитель', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Заказчик', 'Заказчик', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Подрядчики', 'Подрядчики', 'LONGVARCHAR', true, null, null);
        $this->addColumn('ПериодВыполненияРабот', 'Периодвыполненияработ', 'LONGVARCHAR', true, null, null);
        $this->addColumn('ДеталиПроекта', 'Деталипроекта', 'LONGVARCHAR', true, null, null);
        $this->addColumn('ТипСтроительства', 'Типстроительства', 'LONGVARCHAR', true, null, null);
        $this->addColumn('НазваниеПапкиПроекта', 'Названиепапкипроекта', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Картинка', 'Картинка', 'LONGVARCHAR', true, null, null);
        $this->addColumn('КарточкаПроекта', 'Карточкапроекта', 'LONGVARCHAR', false, null, null);
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
        return $withPrefix ? ПроектыTableMap::CLASS_DEFAULT : ПроектыTableMap::OM_CLASS;
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
     * @return array           (Проекты object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ПроектыTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ПроектыTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ПроектыTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ПроектыTableMap::OM_CLASS;
            /** @var Проекты $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ПроектыTableMap::addInstanceToPool($obj, $key);
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
            $key = ПроектыTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ПроектыTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Проекты $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ПроектыTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ПроектыTableMap::COL_ID);
            $criteria->addSelectColumn(ПроектыTableMap::COL_КОДПРОЕКТА);
            $criteria->addSelectColumn(ПроектыTableMap::COL_ПРОЕКТ);
            $criteria->addSelectColumn(ПроектыTableMap::COL_РУКОВОДИТЕЛЬ);
            $criteria->addSelectColumn(ПроектыTableMap::COL_ЗАКАЗЧИК);
            $criteria->addSelectColumn(ПроектыTableMap::COL_ПОДРЯДЧИКИ);
            $criteria->addSelectColumn(ПроектыTableMap::COL_ПЕРИОДВЫПОЛНЕНИЯРАБОТ);
            $criteria->addSelectColumn(ПроектыTableMap::COL_ДЕТАЛИПРОЕКТА);
            $criteria->addSelectColumn(ПроектыTableMap::COL_ТИПСТРОИТЕЛЬСТВА);
            $criteria->addSelectColumn(ПроектыTableMap::COL_НАЗВАНИЕПАПКИПРОЕКТА);
            $criteria->addSelectColumn(ПроектыTableMap::COL_КАРТИНКА);
            $criteria->addSelectColumn(ПроектыTableMap::COL_КАРТОЧКАПРОЕКТА);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.КодПроекта');
            $criteria->addSelectColumn($alias . '.Проект');
            $criteria->addSelectColumn($alias . '.Руководитель');
            $criteria->addSelectColumn($alias . '.Заказчик');
            $criteria->addSelectColumn($alias . '.Подрядчики');
            $criteria->addSelectColumn($alias . '.ПериодВыполненияРабот');
            $criteria->addSelectColumn($alias . '.ДеталиПроекта');
            $criteria->addSelectColumn($alias . '.ТипСтроительства');
            $criteria->addSelectColumn($alias . '.НазваниеПапкиПроекта');
            $criteria->addSelectColumn($alias . '.Картинка');
            $criteria->addSelectColumn($alias . '.КарточкаПроекта');
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
        return Propel::getServiceContainer()->getDatabaseMap(ПроектыTableMap::DATABASE_NAME)->getTable(ПроектыTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ПроектыTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ПроектыTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ПроектыTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Проекты or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Проекты object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ПроектыTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Проекты) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The Проекты object has no primary key');
        }

        $query = ПроектыQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ПроектыTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ПроектыTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Проекты table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ПроектыQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Проекты or Criteria object.
     *
     * @param mixed               $criteria Criteria or Проекты object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ПроектыTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Проекты object
        }


        // Set the correct dbName
        $query = ПроектыQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ПроектыTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ПроектыTableMap::buildTableMap();
