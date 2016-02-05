<?php

namespace Base;

use \мобилизация as Childмобилизация;
use \мобилизацияQuery as ChildмобилизацияQuery;
use \Exception;
use \PDO;
use Map\мобилизацияTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Мобилизация' table.
 *
 * 
 *
 * @method     ChildмобилизацияQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildмобилизацияQuery orderByтиптехники($order = Criteria::ASC) Order by the Тип_техники column
 * @method     ChildмобилизацияQuery orderByпланотгрузкаколичество($order = Criteria::ASC) Order by the План_отгрузка_количество column
 * @method     ChildмобилизацияQuery orderByфактотгрузкаколичество($order = Criteria::ASC) Order by the Факт_отгрузка_количество column
 * @method     ChildмобилизацияQuery orderByпландоставкаколичество($order = Criteria::ASC) Order by the План_доставка_количество column
 * @method     ChildмобилизацияQuery orderByфактдоставкаколичество($order = Criteria::ASC) Order by the Факт_доставка_количество column
 * @method     ChildмобилизацияQuery orderByаренда($order = Criteria::ASC) Order by the Аренда column
 * @method     ChildмобилизацияQuery orderByостатоккдоставке($order = Criteria::ASC) Order by the Остаток_к_доставке column
 * @method     ChildмобилизацияQuery orderByпромежуточныйпунктколичество($order = Criteria::ASC) Order by the Промежуточный_пункт_количество column
 * @method     ChildмобилизацияQuery orderByпроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildмобилизацияQuery orderByдатаотчёта($order = Criteria::ASC) Order by the Дата_отчёта column
 * @method     ChildмобилизацияQuery orderByучастокработ($order = Criteria::ASC) Order by the Участок_работ column
 *
 * @method     ChildмобилизацияQuery groupById() Group by the id column
 * @method     ChildмобилизацияQuery groupByтиптехники() Group by the Тип_техники column
 * @method     ChildмобилизацияQuery groupByпланотгрузкаколичество() Group by the План_отгрузка_количество column
 * @method     ChildмобилизацияQuery groupByфактотгрузкаколичество() Group by the Факт_отгрузка_количество column
 * @method     ChildмобилизацияQuery groupByпландоставкаколичество() Group by the План_доставка_количество column
 * @method     ChildмобилизацияQuery groupByфактдоставкаколичество() Group by the Факт_доставка_количество column
 * @method     ChildмобилизацияQuery groupByаренда() Group by the Аренда column
 * @method     ChildмобилизацияQuery groupByостатоккдоставке() Group by the Остаток_к_доставке column
 * @method     ChildмобилизацияQuery groupByпромежуточныйпунктколичество() Group by the Промежуточный_пункт_количество column
 * @method     ChildмобилизацияQuery groupByпроект() Group by the Проект column
 * @method     ChildмобилизацияQuery groupByдатаотчёта() Group by the Дата_отчёта column
 * @method     ChildмобилизацияQuery groupByучастокработ() Group by the Участок_работ column
 *
 * @method     ChildмобилизацияQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildмобилизацияQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildмобилизацияQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildмобилизацияQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildмобилизацияQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildмобилизацияQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildмобилизацияQuery leftJoinКалендарь($relationAlias = null) Adds a LEFT JOIN clause to the query using the Календарь relation
 * @method     ChildмобилизацияQuery rightJoinКалендарь($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Календарь relation
 * @method     ChildмобилизацияQuery innerJoinКалендарь($relationAlias = null) Adds a INNER JOIN clause to the query using the Календарь relation
 *
 * @method     ChildмобилизацияQuery joinWithКалендарь($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Календарь relation
 *
 * @method     ChildмобилизацияQuery leftJoinWithКалендарь() Adds a LEFT JOIN clause and with to the query using the Календарь relation
 * @method     ChildмобилизацияQuery rightJoinWithКалендарь() Adds a RIGHT JOIN clause and with to the query using the Календарь relation
 * @method     ChildмобилизацияQuery innerJoinWithКалендарь() Adds a INNER JOIN clause and with to the query using the Календарь relation
 *
 * @method     ChildмобилизацияQuery leftJoinПроекты($relationAlias = null) Adds a LEFT JOIN clause to the query using the Проекты relation
 * @method     ChildмобилизацияQuery rightJoinПроекты($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Проекты relation
 * @method     ChildмобилизацияQuery innerJoinПроекты($relationAlias = null) Adds a INNER JOIN clause to the query using the Проекты relation
 *
 * @method     ChildмобилизацияQuery joinWithПроекты($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Проекты relation
 *
 * @method     ChildмобилизацияQuery leftJoinWithПроекты() Adds a LEFT JOIN clause and with to the query using the Проекты relation
 * @method     ChildмобилизацияQuery rightJoinWithПроекты() Adds a RIGHT JOIN clause and with to the query using the Проекты relation
 * @method     ChildмобилизацияQuery innerJoinWithПроекты() Adds a INNER JOIN clause and with to the query using the Проекты relation
 *
 * @method     ChildмобилизацияQuery leftJoinтипытехникимобилизация($relationAlias = null) Adds a LEFT JOIN clause to the query using the типытехникимобилизация relation
 * @method     ChildмобилизацияQuery rightJoinтипытехникимобилизация($relationAlias = null) Adds a RIGHT JOIN clause to the query using the типытехникимобилизация relation
 * @method     ChildмобилизацияQuery innerJoinтипытехникимобилизация($relationAlias = null) Adds a INNER JOIN clause to the query using the типытехникимобилизация relation
 *
 * @method     ChildмобилизацияQuery joinWithтипытехникимобилизация($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the типытехникимобилизация relation
 *
 * @method     ChildмобилизацияQuery leftJoinWithтипытехникимобилизация() Adds a LEFT JOIN clause and with to the query using the типытехникимобилизация relation
 * @method     ChildмобилизацияQuery rightJoinWithтипытехникимобилизация() Adds a RIGHT JOIN clause and with to the query using the типытехникимобилизация relation
 * @method     ChildмобилизацияQuery innerJoinWithтипытехникимобилизация() Adds a INNER JOIN clause and with to the query using the типытехникимобилизация relation
 *
 * @method     ChildмобилизацияQuery leftJoinучасткиработмобилизация($relationAlias = null) Adds a LEFT JOIN clause to the query using the участкиработмобилизация relation
 * @method     ChildмобилизацияQuery rightJoinучасткиработмобилизация($relationAlias = null) Adds a RIGHT JOIN clause to the query using the участкиработмобилизация relation
 * @method     ChildмобилизацияQuery innerJoinучасткиработмобилизация($relationAlias = null) Adds a INNER JOIN clause to the query using the участкиработмобилизация relation
 *
 * @method     ChildмобилизацияQuery joinWithучасткиработмобилизация($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the участкиработмобилизация relation
 *
 * @method     ChildмобилизацияQuery leftJoinWithучасткиработмобилизация() Adds a LEFT JOIN clause and with to the query using the участкиработмобилизация relation
 * @method     ChildмобилизацияQuery rightJoinWithучасткиработмобилизация() Adds a RIGHT JOIN clause and with to the query using the участкиработмобилизация relation
 * @method     ChildмобилизацияQuery innerJoinWithучасткиработмобилизация() Adds a INNER JOIN clause and with to the query using the участкиработмобилизация relation
 *
 * @method     \КалендарьQuery|\ПроектыQuery|\типытехникимобилизацияQuery|\участкиработмобилизацияQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childмобилизация findOne(ConnectionInterface $con = null) Return the first Childмобилизация matching the query
 * @method     Childмобилизация findOneOrCreate(ConnectionInterface $con = null) Return the first Childмобилизация matching the query, or a new Childмобилизация object populated from the query conditions when no match is found
 *
 * @method     Childмобилизация findOneById(int $id) Return the first Childмобилизация filtered by the id column
 * @method     Childмобилизация findOneByтиптехники(int $Тип_техники) Return the first Childмобилизация filtered by the Тип_техники column
 * @method     Childмобилизация findOneByпланотгрузкаколичество(int $План_отгрузка_количество) Return the first Childмобилизация filtered by the План_отгрузка_количество column
 * @method     Childмобилизация findOneByфактотгрузкаколичество(int $Факт_отгрузка_количество) Return the first Childмобилизация filtered by the Факт_отгрузка_количество column
 * @method     Childмобилизация findOneByпландоставкаколичество(int $План_доставка_количество) Return the first Childмобилизация filtered by the План_доставка_количество column
 * @method     Childмобилизация findOneByфактдоставкаколичество(int $Факт_доставка_количество) Return the first Childмобилизация filtered by the Факт_доставка_количество column
 * @method     Childмобилизация findOneByаренда(int $Аренда) Return the first Childмобилизация filtered by the Аренда column
 * @method     Childмобилизация findOneByостатоккдоставке(int $Остаток_к_доставке) Return the first Childмобилизация filtered by the Остаток_к_доставке column
 * @method     Childмобилизация findOneByпромежуточныйпунктколичество(int $Промежуточный_пункт_количество) Return the first Childмобилизация filtered by the Промежуточный_пункт_количество column
 * @method     Childмобилизация findOneByпроект(int $Проект) Return the first Childмобилизация filtered by the Проект column
 * @method     Childмобилизация findOneByдатаотчёта(string $Дата_отчёта) Return the first Childмобилизация filtered by the Дата_отчёта column
 * @method     Childмобилизация findOneByучастокработ(int $Участок_работ) Return the first Childмобилизация filtered by the Участок_работ column *

 * @method     Childмобилизация requirePk($key, ConnectionInterface $con = null) Return the Childмобилизация by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизация requireOne(ConnectionInterface $con = null) Return the first Childмобилизация matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childмобилизация requireOneById(int $id) Return the first Childмобилизация filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизация requireOneByтиптехники(int $Тип_техники) Return the first Childмобилизация filtered by the Тип_техники column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизация requireOneByпланотгрузкаколичество(int $План_отгрузка_количество) Return the first Childмобилизация filtered by the План_отгрузка_количество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизация requireOneByфактотгрузкаколичество(int $Факт_отгрузка_количество) Return the first Childмобилизация filtered by the Факт_отгрузка_количество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизация requireOneByпландоставкаколичество(int $План_доставка_количество) Return the first Childмобилизация filtered by the План_доставка_количество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизация requireOneByфактдоставкаколичество(int $Факт_доставка_количество) Return the first Childмобилизация filtered by the Факт_доставка_количество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизация requireOneByаренда(int $Аренда) Return the first Childмобилизация filtered by the Аренда column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизация requireOneByостатоккдоставке(int $Остаток_к_доставке) Return the first Childмобилизация filtered by the Остаток_к_доставке column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизация requireOneByпромежуточныйпунктколичество(int $Промежуточный_пункт_количество) Return the first Childмобилизация filtered by the Промежуточный_пункт_количество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизация requireOneByпроект(int $Проект) Return the first Childмобилизация filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизация requireOneByдатаотчёта(string $Дата_отчёта) Return the first Childмобилизация filtered by the Дата_отчёта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмобилизация requireOneByучастокработ(int $Участок_работ) Return the first Childмобилизация filtered by the Участок_работ column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childмобилизация[]|ObjectCollection find(ConnectionInterface $con = null) Return Childмобилизация objects based on current ModelCriteria
 * @method     Childмобилизация[]|ObjectCollection findById(int $id) Return Childмобилизация objects filtered by the id column
 * @method     Childмобилизация[]|ObjectCollection findByтиптехники(int $Тип_техники) Return Childмобилизация objects filtered by the Тип_техники column
 * @method     Childмобилизация[]|ObjectCollection findByпланотгрузкаколичество(int $План_отгрузка_количество) Return Childмобилизация objects filtered by the План_отгрузка_количество column
 * @method     Childмобилизация[]|ObjectCollection findByфактотгрузкаколичество(int $Факт_отгрузка_количество) Return Childмобилизация objects filtered by the Факт_отгрузка_количество column
 * @method     Childмобилизация[]|ObjectCollection findByпландоставкаколичество(int $План_доставка_количество) Return Childмобилизация objects filtered by the План_доставка_количество column
 * @method     Childмобилизация[]|ObjectCollection findByфактдоставкаколичество(int $Факт_доставка_количество) Return Childмобилизация objects filtered by the Факт_доставка_количество column
 * @method     Childмобилизация[]|ObjectCollection findByаренда(int $Аренда) Return Childмобилизация objects filtered by the Аренда column
 * @method     Childмобилизация[]|ObjectCollection findByостатоккдоставке(int $Остаток_к_доставке) Return Childмобилизация objects filtered by the Остаток_к_доставке column
 * @method     Childмобилизация[]|ObjectCollection findByпромежуточныйпунктколичество(int $Промежуточный_пункт_количество) Return Childмобилизация objects filtered by the Промежуточный_пункт_количество column
 * @method     Childмобилизация[]|ObjectCollection findByпроект(int $Проект) Return Childмобилизация objects filtered by the Проект column
 * @method     Childмобилизация[]|ObjectCollection findByдатаотчёта(string $Дата_отчёта) Return Childмобилизация objects filtered by the Дата_отчёта column
 * @method     Childмобилизация[]|ObjectCollection findByучастокработ(int $Участок_работ) Return Childмобилизация objects filtered by the Участок_работ column
 * @method     Childмобилизация[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class мобилизацияQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\мобилизацияQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\мобилизация', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildмобилизацияQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildмобилизацияQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildмобилизацияQuery) {
            return $criteria;
        }
        $query = new ChildмобилизацияQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Childмобилизация|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = мобилизацияTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(мобилизацияTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return Childмобилизация A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Тип_техники, План_отгрузка_количество, Факт_отгрузка_количество, План_доставка_количество, Факт_доставка_количество, Аренда, Остаток_к_доставке, Промежуточный_пункт_количество, Проект, Дата_отчёта, Участок_работ FROM Мобилизация WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var Childмобилизация $obj */
            $obj = new Childмобилизация();
            $obj->hydrate($row);
            мобилизацияTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return Childмобилизация|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(мобилизацияTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(мобилизацияTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Тип_техники column
     *
     * Example usage:
     * <code>
     * $query->filterByтиптехники(1234); // WHERE Тип_техники = 1234
     * $query->filterByтиптехники(array(12, 34)); // WHERE Тип_техники IN (12, 34)
     * $query->filterByтиптехники(array('min' => 12)); // WHERE Тип_техники > 12
     * </code>
     *
     * @see       filterByтипытехникимобилизация()
     *
     * @param     mixed $�иптехники The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByтиптехники($�иптехники = null, $comparison = null)
    {
        if (is_array($�иптехники)) {
            $useMinMax = false;
            if (isset($�иптехники['min'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ТИП_ТЕХНИКИ, $�иптехники['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�иптехники['max'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ТИП_ТЕХНИКИ, $�иптехники['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияTableMap::COL_ТИП_ТЕХНИКИ, $�иптехники, $comparison);
    }

    /**
     * Filter the query on the План_отгрузка_количество column
     *
     * Example usage:
     * <code>
     * $query->filterByпланотгрузкаколичество(1234); // WHERE План_отгрузка_количество = 1234
     * $query->filterByпланотгрузкаколичество(array(12, 34)); // WHERE План_отгрузка_количество IN (12, 34)
     * $query->filterByпланотгрузкаколичество(array('min' => 12)); // WHERE План_отгрузка_количество > 12
     * </code>
     *
     * @param     mixed $�ланотгрузкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByпланотгрузкаколичество($�ланотгрузкаколичество = null, $comparison = null)
    {
        if (is_array($�ланотгрузкаколичество)) {
            $useMinMax = false;
            if (isset($�ланотгрузкаколичество['min'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ПЛАН_ОТГРУЗКА_КОЛИЧЕСТВО, $�ланотгрузкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ланотгрузкаколичество['max'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ПЛАН_ОТГРУЗКА_КОЛИЧЕСТВО, $�ланотгрузкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияTableMap::COL_ПЛАН_ОТГРУЗКА_КОЛИЧЕСТВО, $�ланотгрузкаколичество, $comparison);
    }

    /**
     * Filter the query on the Факт_отгрузка_количество column
     *
     * Example usage:
     * <code>
     * $query->filterByфактотгрузкаколичество(1234); // WHERE Факт_отгрузка_количество = 1234
     * $query->filterByфактотгрузкаколичество(array(12, 34)); // WHERE Факт_отгрузка_количество IN (12, 34)
     * $query->filterByфактотгрузкаколичество(array('min' => 12)); // WHERE Факт_отгрузка_количество > 12
     * </code>
     *
     * @param     mixed $�актотгрузкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByфактотгрузкаколичество($�актотгрузкаколичество = null, $comparison = null)
    {
        if (is_array($�актотгрузкаколичество)) {
            $useMinMax = false;
            if (isset($�актотгрузкаколичество['min'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ФАКТ_ОТГРУЗКА_КОЛИЧЕСТВО, $�актотгрузкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�актотгрузкаколичество['max'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ФАКТ_ОТГРУЗКА_КОЛИЧЕСТВО, $�актотгрузкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияTableMap::COL_ФАКТ_ОТГРУЗКА_КОЛИЧЕСТВО, $�актотгрузкаколичество, $comparison);
    }

    /**
     * Filter the query on the План_доставка_количество column
     *
     * Example usage:
     * <code>
     * $query->filterByпландоставкаколичество(1234); // WHERE План_доставка_количество = 1234
     * $query->filterByпландоставкаколичество(array(12, 34)); // WHERE План_доставка_количество IN (12, 34)
     * $query->filterByпландоставкаколичество(array('min' => 12)); // WHERE План_доставка_количество > 12
     * </code>
     *
     * @param     mixed $�ландоставкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByпландоставкаколичество($�ландоставкаколичество = null, $comparison = null)
    {
        if (is_array($�ландоставкаколичество)) {
            $useMinMax = false;
            if (isset($�ландоставкаколичество['min'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ПЛАН_ДОСТАВКА_КОЛИЧЕСТВО, $�ландоставкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ландоставкаколичество['max'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ПЛАН_ДОСТАВКА_КОЛИЧЕСТВО, $�ландоставкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияTableMap::COL_ПЛАН_ДОСТАВКА_КОЛИЧЕСТВО, $�ландоставкаколичество, $comparison);
    }

    /**
     * Filter the query on the Факт_доставка_количество column
     *
     * Example usage:
     * <code>
     * $query->filterByфактдоставкаколичество(1234); // WHERE Факт_доставка_количество = 1234
     * $query->filterByфактдоставкаколичество(array(12, 34)); // WHERE Факт_доставка_количество IN (12, 34)
     * $query->filterByфактдоставкаколичество(array('min' => 12)); // WHERE Факт_доставка_количество > 12
     * </code>
     *
     * @param     mixed $�актдоставкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByфактдоставкаколичество($�актдоставкаколичество = null, $comparison = null)
    {
        if (is_array($�актдоставкаколичество)) {
            $useMinMax = false;
            if (isset($�актдоставкаколичество['min'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ФАКТ_ДОСТАВКА_КОЛИЧЕСТВО, $�актдоставкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�актдоставкаколичество['max'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ФАКТ_ДОСТАВКА_КОЛИЧЕСТВО, $�актдоставкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияTableMap::COL_ФАКТ_ДОСТАВКА_КОЛИЧЕСТВО, $�актдоставкаколичество, $comparison);
    }

    /**
     * Filter the query on the Аренда column
     *
     * Example usage:
     * <code>
     * $query->filterByаренда(1234); // WHERE Аренда = 1234
     * $query->filterByаренда(array(12, 34)); // WHERE Аренда IN (12, 34)
     * $query->filterByаренда(array('min' => 12)); // WHERE Аренда > 12
     * </code>
     *
     * @param     mixed $�ренда The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByаренда($�ренда = null, $comparison = null)
    {
        if (is_array($�ренда)) {
            $useMinMax = false;
            if (isset($�ренда['min'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_АРЕНДА, $�ренда['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ренда['max'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_АРЕНДА, $�ренда['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияTableMap::COL_АРЕНДА, $�ренда, $comparison);
    }

    /**
     * Filter the query on the Остаток_к_доставке column
     *
     * Example usage:
     * <code>
     * $query->filterByостатоккдоставке(1234); // WHERE Остаток_к_доставке = 1234
     * $query->filterByостатоккдоставке(array(12, 34)); // WHERE Остаток_к_доставке IN (12, 34)
     * $query->filterByостатоккдоставке(array('min' => 12)); // WHERE Остаток_к_доставке > 12
     * </code>
     *
     * @param     mixed $�статоккдоставке The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByостатоккдоставке($�статоккдоставке = null, $comparison = null)
    {
        if (is_array($�статоккдоставке)) {
            $useMinMax = false;
            if (isset($�статоккдоставке['min'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ОСТАТОК_К_ДОСТАВКЕ, $�статоккдоставке['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�статоккдоставке['max'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ОСТАТОК_К_ДОСТАВКЕ, $�статоккдоставке['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияTableMap::COL_ОСТАТОК_К_ДОСТАВКЕ, $�статоккдоставке, $comparison);
    }

    /**
     * Filter the query on the Промежуточный_пункт_количество column
     *
     * Example usage:
     * <code>
     * $query->filterByпромежуточныйпунктколичество(1234); // WHERE Промежуточный_пункт_количество = 1234
     * $query->filterByпромежуточныйпунктколичество(array(12, 34)); // WHERE Промежуточный_пункт_количество IN (12, 34)
     * $query->filterByпромежуточныйпунктколичество(array('min' => 12)); // WHERE Промежуточный_пункт_количество > 12
     * </code>
     *
     * @param     mixed $�ромежуточныйпунктколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByпромежуточныйпунктколичество($�ромежуточныйпунктколичество = null, $comparison = null)
    {
        if (is_array($�ромежуточныйпунктколичество)) {
            $useMinMax = false;
            if (isset($�ромежуточныйпунктколичество['min'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ПРОМЕЖУТОЧНЫЙ_ПУНКТ_КОЛИЧЕСТВО, $�ромежуточныйпунктколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ромежуточныйпунктколичество['max'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ПРОМЕЖУТОЧНЫЙ_ПУНКТ_КОЛИЧЕСТВО, $�ромежуточныйпунктколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияTableMap::COL_ПРОМЕЖУТОЧНЫЙ_ПУНКТ_КОЛИЧЕСТВО, $�ромежуточныйпунктколичество, $comparison);
    }

    /**
     * Filter the query on the Проект column
     *
     * Example usage:
     * <code>
     * $query->filterByпроект(1234); // WHERE Проект = 1234
     * $query->filterByпроект(array(12, 34)); // WHERE Проект IN (12, 34)
     * $query->filterByпроект(array('min' => 12)); // WHERE Проект > 12
     * </code>
     *
     * @see       filterByПроекты()
     *
     * @param     mixed $�роект The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByпроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияTableMap::COL_ПРОЕКТ, $�роект, $comparison);
    }

    /**
     * Filter the query on the Дата_отчёта column
     *
     * Example usage:
     * <code>
     * $query->filterByдатаотчёта('2011-03-14'); // WHERE Дата_отчёта = '2011-03-14'
     * $query->filterByдатаотчёта('now'); // WHERE Дата_отчёта = '2011-03-14'
     * $query->filterByдатаотчёта(array('max' => 'yesterday')); // WHERE Дата_отчёта > '2011-03-13'
     * </code>
     *
     * @param     mixed $�атаотчёта The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByдатаотчёта($�атаотчёта = null, $comparison = null)
    {
        if (is_array($�атаотчёта)) {
            $useMinMax = false;
            if (isset($�атаотчёта['min'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ДАТА_ОТЧЁТА, $�атаотчёта['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�атаотчёта['max'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_ДАТА_ОТЧЁТА, $�атаотчёта['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияTableMap::COL_ДАТА_ОТЧЁТА, $�атаотчёта, $comparison);
    }

    /**
     * Filter the query on the Участок_работ column
     *
     * Example usage:
     * <code>
     * $query->filterByучастокработ(1234); // WHERE Участок_работ = 1234
     * $query->filterByучастокработ(array(12, 34)); // WHERE Участок_работ IN (12, 34)
     * $query->filterByучастокработ(array('min' => 12)); // WHERE Участок_работ > 12
     * </code>
     *
     * @see       filterByучасткиработмобилизация()
     *
     * @param     mixed $�частокработ The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByучастокработ($�частокработ = null, $comparison = null)
    {
        if (is_array($�частокработ)) {
            $useMinMax = false;
            if (isset($�частокработ['min'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_УЧАСТОК_РАБОТ, $�частокработ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�частокработ['max'])) {
                $this->addUsingAlias(мобилизацияTableMap::COL_УЧАСТОК_РАБОТ, $�частокработ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(мобилизацияTableMap::COL_УЧАСТОК_РАБОТ, $�частокработ, $comparison);
    }

    /**
     * Filter the query by a related \Календарь object
     *
     * @param \Календарь|ObjectCollection $�алендарь The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByКалендарь($�алендарь, $comparison = null)
    {
        if ($�алендарь instanceof \Календарь) {
            return $this
                ->addUsingAlias(мобилизацияTableMap::COL_ДАТА_ОТЧЁТА, $�алендарь->getдата(), $comparison);
        } elseif ($�алендарь instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(мобилизацияTableMap::COL_ДАТА_ОТЧЁТА, $�алендарь->toKeyValue('PrimaryKey', 'дата'), $comparison);
        } else {
            throw new PropelException('filterByКалендарь() only accepts arguments of type \Календарь or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Календарь relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function joinКалендарь($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Календарь');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Календарь');
        }

        return $this;
    }

    /**
     * Use the Календарь relation Календарь object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \КалендарьQuery A secondary query class using the current class as primary query
     */
    public function useКалендарьQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinКалендарь($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Календарь', '\КалендарьQuery');
    }

    /**
     * Filter the query by a related \Проекты object
     *
     * @param \Проекты|ObjectCollection $�роекты The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByПроекты($�роекты, $comparison = null)
    {
        if ($�роекты instanceof \Проекты) {
            return $this
                ->addUsingAlias(мобилизацияTableMap::COL_ПРОЕКТ, $�роекты->getId(), $comparison);
        } elseif ($�роекты instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(мобилизацияTableMap::COL_ПРОЕКТ, $�роекты->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByПроекты() only accepts arguments of type \Проекты or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Проекты relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function joinПроекты($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Проекты');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Проекты');
        }

        return $this;
    }

    /**
     * Use the Проекты relation Проекты object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ПроектыQuery A secondary query class using the current class as primary query
     */
    public function useПроектыQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinПроекты($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Проекты', '\ПроектыQuery');
    }

    /**
     * Filter the query by a related \типытехникимобилизация object
     *
     * @param \типытехникимобилизация|ObjectCollection $�ипытехникимобилизация The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByтипытехникимобилизация($�ипытехникимобилизация, $comparison = null)
    {
        if ($�ипытехникимобилизация instanceof \типытехникимобилизация) {
            return $this
                ->addUsingAlias(мобилизацияTableMap::COL_ТИП_ТЕХНИКИ, $�ипытехникимобилизация->getId(), $comparison);
        } elseif ($�ипытехникимобилизация instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(мобилизацияTableMap::COL_ТИП_ТЕХНИКИ, $�ипытехникимобилизация->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByтипытехникимобилизация() only accepts arguments of type \типытехникимобилизация or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the типытехникимобилизация relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function joinтипытехникимобилизация($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('типытехникимобилизация');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'типытехникимобилизация');
        }

        return $this;
    }

    /**
     * Use the типытехникимобилизация relation типытехникимобилизация object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \типытехникимобилизацияQuery A secondary query class using the current class as primary query
     */
    public function useтипытехникимобилизацияQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinтипытехникимобилизация($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'типытехникимобилизация', '\типытехникимобилизацияQuery');
    }

    /**
     * Filter the query by a related \участкиработмобилизация object
     *
     * @param \участкиработмобилизация|ObjectCollection $�часткиработмобилизация The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildмобилизацияQuery The current query, for fluid interface
     */
    public function filterByучасткиработмобилизация($�часткиработмобилизация, $comparison = null)
    {
        if ($�часткиработмобилизация instanceof \участкиработмобилизация) {
            return $this
                ->addUsingAlias(мобилизацияTableMap::COL_УЧАСТОК_РАБОТ, $�часткиработмобилизация->getId(), $comparison);
        } elseif ($�часткиработмобилизация instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(мобилизацияTableMap::COL_УЧАСТОК_РАБОТ, $�часткиработмобилизация->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByучасткиработмобилизация() only accepts arguments of type \участкиработмобилизация or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the участкиработмобилизация relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function joinучасткиработмобилизация($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('участкиработмобилизация');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'участкиработмобилизация');
        }

        return $this;
    }

    /**
     * Use the участкиработмобилизация relation участкиработмобилизация object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \участкиработмобилизацияQuery A secondary query class using the current class as primary query
     */
    public function useучасткиработмобилизацияQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinучасткиработмобилизация($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'участкиработмобилизация', '\участкиработмобилизацияQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Childмобилизация $�обилизация Object to remove from the list of results
     *
     * @return $this|ChildмобилизацияQuery The current query, for fluid interface
     */
    public function prune($�обилизация = null)
    {
        if ($�обилизация) {
            $this->addUsingAlias(мобилизацияTableMap::COL_ID, $�обилизация->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Мобилизация table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(мобилизацияTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            мобилизацияTableMap::clearInstancePool();
            мобилизацияTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(мобилизацияTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(мобилизацияTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            мобилизацияTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            мобилизацияTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // мобилизацияQuery
