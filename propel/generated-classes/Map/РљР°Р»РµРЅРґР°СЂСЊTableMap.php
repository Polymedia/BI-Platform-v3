<?php

namespace Map;

use \Календарь;
use \КалендарьQuery;
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
 * This class defines the structure of the 'Календарь' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class КалендарьTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.КалендарьTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Календарь';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Календарь';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Календарь';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the Дата field
     */
    const COL_ДАТА = 'Календарь.Дата';

    /**
     * the column name for the Год field
     */
    const COL_ГОД = 'Календарь.Год';

    /**
     * the column name for the Полугодие field
     */
    const COL_ПОЛУГОДИЕ = 'Календарь.Полугодие';

    /**
     * the column name for the Квартал field
     */
    const COL_КВАРТАЛ = 'Календарь.Квартал';

    /**
     * the column name for the Номер_месяца field
     */
    const COL_НОМЕР_МЕСЯЦА = 'Календарь.Номер_месяца';

    /**
     * the column name for the Месяц field
     */
    const COL_МЕСЯЦ = 'Календарь.Месяц';

    /**
     * the column name for the День field
     */
    const COL_ДЕНЬ = 'Календарь.День';

    /**
     * the column name for the Номер_недели field
     */
    const COL_НОМЕР_НЕДЕЛИ = 'Календарь.Номер_недели';

    /**
     * the column name for the День_недели field
     */
    const COL_ДЕНЬ_НЕДЕЛИ = 'Календарь.День_недели';

    /**
     * the column name for the День_в_году field
     */
    const COL_ДЕНЬ_В_ГОДУ = 'Календарь.День_в_году';

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
        self::TYPE_PHPNAME       => array('дата', 'год', 'полугодие', 'квартал', 'номермесяца', 'месяц', 'день', 'номернедели', 'деньнедели', 'деньвгоду', ),
        self::TYPE_CAMELNAME     => array('�ата', '�од', '�олугодие', '�вартал', '�омермесяца', '�есяц', '�ень', '�омернедели', '�еньнедели', '�еньвгоду', ),
        self::TYPE_COLNAME       => array(КалендарьTableMap::COL_ДАТА, КалендарьTableMap::COL_ГОД, КалендарьTableMap::COL_ПОЛУГОДИЕ, КалендарьTableMap::COL_КВАРТАЛ, КалендарьTableMap::COL_НОМЕР_МЕСЯЦА, КалендарьTableMap::COL_МЕСЯЦ, КалендарьTableMap::COL_ДЕНЬ, КалендарьTableMap::COL_НОМЕР_НЕДЕЛИ, КалендарьTableMap::COL_ДЕНЬ_НЕДЕЛИ, КалендарьTableMap::COL_ДЕНЬ_В_ГОДУ, ),
        self::TYPE_FIELDNAME     => array('Дата', 'Год', 'Полугодие', 'Квартал', 'Номер_месяца', 'Месяц', 'День', 'Номер_недели', 'День_недели', 'День_в_году', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('дата' => 0, 'год' => 1, 'полугодие' => 2, 'квартал' => 3, 'номермесяца' => 4, 'месяц' => 5, 'день' => 6, 'номернедели' => 7, 'деньнедели' => 8, 'деньвгоду' => 9, ),
        self::TYPE_CAMELNAME     => array('�ата' => 0, '�од' => 1, '�олугодие' => 2, '�вартал' => 3, '�омермесяца' => 4, '�есяц' => 5, '�ень' => 6, '�омернедели' => 7, '�еньнедели' => 8, '�еньвгоду' => 9, ),
        self::TYPE_COLNAME       => array(КалендарьTableMap::COL_ДАТА => 0, КалендарьTableMap::COL_ГОД => 1, КалендарьTableMap::COL_ПОЛУГОДИЕ => 2, КалендарьTableMap::COL_КВАРТАЛ => 3, КалендарьTableMap::COL_НОМЕР_МЕСЯЦА => 4, КалендарьTableMap::COL_МЕСЯЦ => 5, КалендарьTableMap::COL_ДЕНЬ => 6, КалендарьTableMap::COL_НОМЕР_НЕДЕЛИ => 7, КалендарьTableMap::COL_ДЕНЬ_НЕДЕЛИ => 8, КалендарьTableMap::COL_ДЕНЬ_В_ГОДУ => 9, ),
        self::TYPE_FIELDNAME     => array('Дата' => 0, 'Год' => 1, 'Полугодие' => 2, 'Квартал' => 3, 'Номер_месяца' => 4, 'Месяц' => 5, 'День' => 6, 'Номер_недели' => 7, 'День_недели' => 8, 'День_в_году' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('Календарь');
        $this->setPhpName('Календарь');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Календарь');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('Дата', 'дата', 'DATE', true, null, null);
        $this->addForeignKey('Год', 'год', 'SMALLINT', 'Года', 'id', false, null, null);
        $this->addColumn('Полугодие', 'полугодие', 'SMALLINT', false, null, null);
        $this->addColumn('Квартал', 'квартал', 'SMALLINT', false, null, null);
        $this->addForeignKey('Номер_месяца', 'номермесяца', 'SMALLINT', 'Месяца', 'id', false, null, null);
        $this->addColumn('Месяц', 'месяц', 'LONGVARCHAR', false, null, null);
        $this->addColumn('День', 'день', 'SMALLINT', false, null, null);
        $this->addColumn('Номер_недели', 'номернедели', 'SMALLINT', false, null, null);
        $this->addForeignKey('День_недели', 'деньнедели', 'SMALLINT', 'Дни_недели', 'id', false, null, null);
        $this->addColumn('День_в_году', 'деньвгоду', 'SMALLINT', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('года', '\\года', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Год',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('днинедели', '\\днинедели', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':День_недели',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('месяца', '\\месяца', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Номер_месяца',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('выработка', '\\выработка', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Дата',
    1 => ':Дата',
  ),
), null, null, 'выработкаs', false);
        $this->addRelation('датыобновленийдашбордов', '\\датыобновленийдашбордов', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Дата',
    1 => ':Дата',
  ),
), null, null, 'датыобновленийдашбордовs', false);
        $this->addRelation('мтр', '\\мтр', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Дата',
    1 => ':Дата',
  ),
), null, null, 'мтрs', false);
        $this->addRelation('мобилизация', '\\мобилизация', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Дата_отчёта',
    1 => ':Дата',
  ),
), null, null, 'мобилизацияs', false);
        $this->addRelation('мобилизацияпомесяцам', '\\мобилизацияпомесяцам', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Дата_отчёта',
    1 => ':Дата',
  ),
), null, null, 'мобилизацияпомесяцамs', false);
        $this->addRelation('ПредписанияRelatedByдатавыдачи', '\\Предписания', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Дата_выдачи',
    1 => ':Дата',
  ),
), null, null, 'ПредписанияsRelatedByдатавыдачи', false);
        $this->addRelation('ПредписанияRelatedByплановаядатаустранения', '\\Предписания', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Плановая_дата_устранения',
    1 => ':Дата',
  ),
), null, null, 'ПредписанияsRelatedByплановаядатаустранения', false);
        $this->addRelation('ПредписанияRelatedByфактическаядатаустранения', '\\Предписания', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Фактическая_дата_устранения',
    1 => ':Дата',
  ),
), null, null, 'ПредписанияsRelatedByфактическаядатаустранения', false);
        $this->addRelation('физическиеобъёмы', '\\физическиеобъёмы', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Дата',
    1 => ':Дата',
  ),
), null, null, 'физическиеобъёмыs', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('дата', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('дата', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('дата', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('дата', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('дата', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('дата', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('дата', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? КалендарьTableMap::CLASS_DEFAULT : КалендарьTableMap::OM_CLASS;
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
     * @return array           (Календарь object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = КалендарьTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = КалендарьTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + КалендарьTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = КалендарьTableMap::OM_CLASS;
            /** @var Календарь $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            КалендарьTableMap::addInstanceToPool($obj, $key);
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
            $key = КалендарьTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = КалендарьTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Календарь $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                КалендарьTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(КалендарьTableMap::COL_ДАТА);
            $criteria->addSelectColumn(КалендарьTableMap::COL_ГОД);
            $criteria->addSelectColumn(КалендарьTableMap::COL_ПОЛУГОДИЕ);
            $criteria->addSelectColumn(КалендарьTableMap::COL_КВАРТАЛ);
            $criteria->addSelectColumn(КалендарьTableMap::COL_НОМЕР_МЕСЯЦА);
            $criteria->addSelectColumn(КалендарьTableMap::COL_МЕСЯЦ);
            $criteria->addSelectColumn(КалендарьTableMap::COL_ДЕНЬ);
            $criteria->addSelectColumn(КалендарьTableMap::COL_НОМЕР_НЕДЕЛИ);
            $criteria->addSelectColumn(КалендарьTableMap::COL_ДЕНЬ_НЕДЕЛИ);
            $criteria->addSelectColumn(КалендарьTableMap::COL_ДЕНЬ_В_ГОДУ);
        } else {
            $criteria->addSelectColumn($alias . '.Дата');
            $criteria->addSelectColumn($alias . '.Год');
            $criteria->addSelectColumn($alias . '.Полугодие');
            $criteria->addSelectColumn($alias . '.Квартал');
            $criteria->addSelectColumn($alias . '.Номер_месяца');
            $criteria->addSelectColumn($alias . '.Месяц');
            $criteria->addSelectColumn($alias . '.День');
            $criteria->addSelectColumn($alias . '.Номер_недели');
            $criteria->addSelectColumn($alias . '.День_недели');
            $criteria->addSelectColumn($alias . '.День_в_году');
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
        return Propel::getServiceContainer()->getDatabaseMap(КалендарьTableMap::DATABASE_NAME)->getTable(КалендарьTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(КалендарьTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(КалендарьTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new КалендарьTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Календарь or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Календарь object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(КалендарьTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Календарь) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(КалендарьTableMap::DATABASE_NAME);
            $criteria->add(КалендарьTableMap::COL_ДАТА, (array) $values, Criteria::IN);
        }

        $query = КалендарьQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            КалендарьTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                КалендарьTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Календарь table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return КалендарьQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Календарь or Criteria object.
     *
     * @param mixed               $criteria Criteria or Календарь object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(КалендарьTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Календарь object
        }


        // Set the correct dbName
        $query = КалендарьQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // КалендарьTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
КалендарьTableMap::buildTableMap();
