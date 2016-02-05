<?php

namespace Map;

use \Проекты;
use \ПроектыQuery;
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
     * the column name for the Код_проекта field
     */
    const COL_КОД_ПРОЕКТА = 'Проекты.Код_проекта';

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
     * the column name for the Период_выполнения_работ field
     */
    const COL_ПЕРИОД_ВЫПОЛНЕНИЯ_РАБОТ = 'Проекты.Период_выполнения_работ';

    /**
     * the column name for the Детали_проекта field
     */
    const COL_ДЕТАЛИ_ПРОЕКТА = 'Проекты.Детали_проекта';

    /**
     * the column name for the Тип_строительства field
     */
    const COL_ТИП_СТРОИТЕЛЬСТВА = 'Проекты.Тип_строительства';

    /**
     * the column name for the Название_папки_проекта field
     */
    const COL_НАЗВАНИЕ_ПАПКИ_ПРОЕКТА = 'Проекты.Название_папки_проекта';

    /**
     * the column name for the Картинка field
     */
    const COL_КАРТИНКА = 'Проекты.Картинка';

    /**
     * the column name for the Карточка_проекта field
     */
    const COL_КАРТОЧКА_ПРОЕКТА = 'Проекты.Карточка_проекта';

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
        self::TYPE_PHPNAME       => array('Id', 'кодпроекта', 'проект', 'руководитель', 'заказчик', 'подрядчики', 'периодвыполненияработ', 'деталипроекта', 'типстроительства', 'названиепапкипроекта', 'картинка', 'карточкапроекта', ),
        self::TYPE_CAMELNAME     => array('id', '�одпроекта', '�роект', '�уководитель', '�аказчик', '�одрядчики', '�ериодвыполненияработ', '�еталипроекта', '�ипстроительства', '�азваниепапкипроекта', '�артинка', '�арточкапроекта', ),
        self::TYPE_COLNAME       => array(ПроектыTableMap::COL_ID, ПроектыTableMap::COL_КОД_ПРОЕКТА, ПроектыTableMap::COL_ПРОЕКТ, ПроектыTableMap::COL_РУКОВОДИТЕЛЬ, ПроектыTableMap::COL_ЗАКАЗЧИК, ПроектыTableMap::COL_ПОДРЯДЧИКИ, ПроектыTableMap::COL_ПЕРИОД_ВЫПОЛНЕНИЯ_РАБОТ, ПроектыTableMap::COL_ДЕТАЛИ_ПРОЕКТА, ПроектыTableMap::COL_ТИП_СТРОИТЕЛЬСТВА, ПроектыTableMap::COL_НАЗВАНИЕ_ПАПКИ_ПРОЕКТА, ПроектыTableMap::COL_КАРТИНКА, ПроектыTableMap::COL_КАРТОЧКА_ПРОЕКТА, ),
        self::TYPE_FIELDNAME     => array('id', 'Код_проекта', 'Проект', 'Руководитель', 'Заказчик', 'Подрядчики', 'Период_выполнения_работ', 'Детали_проекта', 'Тип_строительства', 'Название_папки_проекта', 'Картинка', 'Карточка_проекта', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'кодпроекта' => 1, 'проект' => 2, 'руководитель' => 3, 'заказчик' => 4, 'подрядчики' => 5, 'периодвыполненияработ' => 6, 'деталипроекта' => 7, 'типстроительства' => 8, 'названиепапкипроекта' => 9, 'картинка' => 10, 'карточкапроекта' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, '�одпроекта' => 1, '�роект' => 2, '�уководитель' => 3, '�аказчик' => 4, '�одрядчики' => 5, '�ериодвыполненияработ' => 6, '�еталипроекта' => 7, '�ипстроительства' => 8, '�азваниепапкипроекта' => 9, '�артинка' => 10, '�арточкапроекта' => 11, ),
        self::TYPE_COLNAME       => array(ПроектыTableMap::COL_ID => 0, ПроектыTableMap::COL_КОД_ПРОЕКТА => 1, ПроектыTableMap::COL_ПРОЕКТ => 2, ПроектыTableMap::COL_РУКОВОДИТЕЛЬ => 3, ПроектыTableMap::COL_ЗАКАЗЧИК => 4, ПроектыTableMap::COL_ПОДРЯДЧИКИ => 5, ПроектыTableMap::COL_ПЕРИОД_ВЫПОЛНЕНИЯ_РАБОТ => 6, ПроектыTableMap::COL_ДЕТАЛИ_ПРОЕКТА => 7, ПроектыTableMap::COL_ТИП_СТРОИТЕЛЬСТВА => 8, ПроектыTableMap::COL_НАЗВАНИЕ_ПАПКИ_ПРОЕКТА => 9, ПроектыTableMap::COL_КАРТИНКА => 10, ПроектыTableMap::COL_КАРТОЧКА_ПРОЕКТА => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'Код_проекта' => 1, 'Проект' => 2, 'Руководитель' => 3, 'Заказчик' => 4, 'Подрядчики' => 5, 'Период_выполнения_работ' => 6, 'Детали_проекта' => 7, 'Тип_строительства' => 8, 'Название_папки_проекта' => 9, 'Картинка' => 10, 'Карточка_проекта' => 11, ),
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
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('Код_проекта', 'кодпроекта', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Проект', 'проект', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Руководитель', 'руководитель', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Заказчик', 'заказчик', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Подрядчики', 'подрядчики', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Период_выполнения_работ', 'периодвыполненияработ', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Детали_проекта', 'деталипроекта', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Тип_строительства', 'типстроительства', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Название_папки_проекта', 'названиепапкипроекта', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Картинка', 'картинка', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Карточка_проекта', 'карточкапроекта', 'LONGVARCHAR', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('датыобновленийдашбордов', '\\датыобновленийдашбордов', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Проект',
    1 => ':id',
  ),
), null, null, 'датыобновленийдашбордовs', false);
        $this->addRelation('мтр', '\\мтр', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Проект',
    1 => ':id',
  ),
), null, null, 'мтрs', false);
        $this->addRelation('мобилизация', '\\мобилизация', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Проект',
    1 => ':id',
  ),
), null, null, 'мобилизацияs', false);
        $this->addRelation('мобилизацияпомесяцам', '\\мобилизацияпомесяцам', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Проект',
    1 => ':id',
  ),
), null, null, 'мобилизацияпомесяцамs', false);
        $this->addRelation('Предписания', '\\Предписания', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Проект',
    1 => ':id',
  ),
), null, null, 'Предписанияs', false);
        $this->addRelation('проблемныевопросы', '\\проблемныевопросы', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Проект',
    1 => ':id',
  ),
), null, null, 'проблемныевопросыs', false);
        $this->addRelation('программы', '\\программы', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Проект',
    1 => ':id',
  ),
), null, null, 'программыs', false);
        $this->addRelation('участкиработ', '\\участкиработ', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Проект',
    1 => ':id',
  ),
), null, null, 'участкиработs', false);
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
            $criteria->addSelectColumn(ПроектыTableMap::COL_КОД_ПРОЕКТА);
            $criteria->addSelectColumn(ПроектыTableMap::COL_ПРОЕКТ);
            $criteria->addSelectColumn(ПроектыTableMap::COL_РУКОВОДИТЕЛЬ);
            $criteria->addSelectColumn(ПроектыTableMap::COL_ЗАКАЗЧИК);
            $criteria->addSelectColumn(ПроектыTableMap::COL_ПОДРЯДЧИКИ);
            $criteria->addSelectColumn(ПроектыTableMap::COL_ПЕРИОД_ВЫПОЛНЕНИЯ_РАБОТ);
            $criteria->addSelectColumn(ПроектыTableMap::COL_ДЕТАЛИ_ПРОЕКТА);
            $criteria->addSelectColumn(ПроектыTableMap::COL_ТИП_СТРОИТЕЛЬСТВА);
            $criteria->addSelectColumn(ПроектыTableMap::COL_НАЗВАНИЕ_ПАПКИ_ПРОЕКТА);
            $criteria->addSelectColumn(ПроектыTableMap::COL_КАРТИНКА);
            $criteria->addSelectColumn(ПроектыTableMap::COL_КАРТОЧКА_ПРОЕКТА);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.Код_проекта');
            $criteria->addSelectColumn($alias . '.Проект');
            $criteria->addSelectColumn($alias . '.Руководитель');
            $criteria->addSelectColumn($alias . '.Заказчик');
            $criteria->addSelectColumn($alias . '.Подрядчики');
            $criteria->addSelectColumn($alias . '.Период_выполнения_работ');
            $criteria->addSelectColumn($alias . '.Детали_проекта');
            $criteria->addSelectColumn($alias . '.Тип_строительства');
            $criteria->addSelectColumn($alias . '.Название_папки_проекта');
            $criteria->addSelectColumn($alias . '.Картинка');
            $criteria->addSelectColumn($alias . '.Карточка_проекта');
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
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ПроектыTableMap::DATABASE_NAME);
            $criteria->add(ПроектыTableMap::COL_ID, (array) $values, Criteria::IN);
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

        if ($criteria->containsKey(ПроектыTableMap::COL_ID) && $criteria->keyContainsValue(ПроектыTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ПроектыTableMap::COL_ID.')');
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
