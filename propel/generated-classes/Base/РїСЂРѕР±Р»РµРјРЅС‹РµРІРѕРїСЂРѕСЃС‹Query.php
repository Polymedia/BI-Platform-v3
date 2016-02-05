<?php

namespace Base;

use \проблемныевопросы as Childпроблемныевопросы;
use \проблемныевопросыQuery as ChildпроблемныевопросыQuery;
use \Exception;
use \PDO;
use Map\проблемныевопросыTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Проблемные_вопросы' table.
 *
 * 
 *
 * @method     ChildпроблемныевопросыQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildпроблемныевопросыQuery orderByпроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildпроблемныевопросыQuery orderByдата($order = Criteria::ASC) Order by the Дата column
 * @method     ChildпроблемныевопросыQuery orderByкому($order = Criteria::ASC) Order by the Кому column
 * @method     ChildпроблемныевопросыQuery orderByпроблемныевопросы($order = Criteria::ASC) Order by the Проблемные_вопросы column
 * @method     ChildпроблемныевопросыQuery orderByмерыдлярешения($order = Criteria::ASC) Order by the Меры_для_решения column
 * @method     ChildпроблемныевопросыQuery orderByответсвенный($order = Criteria::ASC) Order by the Ответсвенный column
 * @method     ChildпроблемныевопросыQuery orderByсрок($order = Criteria::ASC) Order by the Срок column
 * @method     ChildпроблемныевопросыQuery orderByстатус($order = Criteria::ASC) Order by the Статус column
 *
 * @method     ChildпроблемныевопросыQuery groupById() Group by the id column
 * @method     ChildпроблемныевопросыQuery groupByпроект() Group by the Проект column
 * @method     ChildпроблемныевопросыQuery groupByдата() Group by the Дата column
 * @method     ChildпроблемныевопросыQuery groupByкому() Group by the Кому column
 * @method     ChildпроблемныевопросыQuery groupByпроблемныевопросы() Group by the Проблемные_вопросы column
 * @method     ChildпроблемныевопросыQuery groupByмерыдлярешения() Group by the Меры_для_решения column
 * @method     ChildпроблемныевопросыQuery groupByответсвенный() Group by the Ответсвенный column
 * @method     ChildпроблемныевопросыQuery groupByсрок() Group by the Срок column
 * @method     ChildпроблемныевопросыQuery groupByстатус() Group by the Статус column
 *
 * @method     ChildпроблемныевопросыQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildпроблемныевопросыQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildпроблемныевопросыQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildпроблемныевопросыQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildпроблемныевопросыQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildпроблемныевопросыQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildпроблемныевопросыQuery leftJoinПроекты($relationAlias = null) Adds a LEFT JOIN clause to the query using the Проекты relation
 * @method     ChildпроблемныевопросыQuery rightJoinПроекты($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Проекты relation
 * @method     ChildпроблемныевопросыQuery innerJoinПроекты($relationAlias = null) Adds a INNER JOIN clause to the query using the Проекты relation
 *
 * @method     ChildпроблемныевопросыQuery joinWithПроекты($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Проекты relation
 *
 * @method     ChildпроблемныевопросыQuery leftJoinWithПроекты() Adds a LEFT JOIN clause and with to the query using the Проекты relation
 * @method     ChildпроблемныевопросыQuery rightJoinWithПроекты() Adds a RIGHT JOIN clause and with to the query using the Проекты relation
 * @method     ChildпроблемныевопросыQuery innerJoinWithПроекты() Adds a INNER JOIN clause and with to the query using the Проекты relation
 *
 * @method     \ПроектыQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childпроблемныевопросы findOne(ConnectionInterface $con = null) Return the first Childпроблемныевопросы matching the query
 * @method     Childпроблемныевопросы findOneOrCreate(ConnectionInterface $con = null) Return the first Childпроблемныевопросы matching the query, or a new Childпроблемныевопросы object populated from the query conditions when no match is found
 *
 * @method     Childпроблемныевопросы findOneById(int $id) Return the first Childпроблемныевопросы filtered by the id column
 * @method     Childпроблемныевопросы findOneByпроект(int $Проект) Return the first Childпроблемныевопросы filtered by the Проект column
 * @method     Childпроблемныевопросы findOneByдата(string $Дата) Return the first Childпроблемныевопросы filtered by the Дата column
 * @method     Childпроблемныевопросы findOneByкому(string $Кому) Return the first Childпроблемныевопросы filtered by the Кому column
 * @method     Childпроблемныевопросы findOneByпроблемныевопросы(string $Проблемные_вопросы) Return the first Childпроблемныевопросы filtered by the Проблемные_вопросы column
 * @method     Childпроблемныевопросы findOneByмерыдлярешения(string $Меры_для_решения) Return the first Childпроблемныевопросы filtered by the Меры_для_решения column
 * @method     Childпроблемныевопросы findOneByответсвенный(string $Ответсвенный) Return the first Childпроблемныевопросы filtered by the Ответсвенный column
 * @method     Childпроблемныевопросы findOneByсрок(string $Срок) Return the first Childпроблемныевопросы filtered by the Срок column
 * @method     Childпроблемныевопросы findOneByстатус(string $Статус) Return the first Childпроблемныевопросы filtered by the Статус column *

 * @method     Childпроблемныевопросы requirePk($key, ConnectionInterface $con = null) Return the Childпроблемныевопросы by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроблемныевопросы requireOne(ConnectionInterface $con = null) Return the first Childпроблемныевопросы matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childпроблемныевопросы requireOneById(int $id) Return the first Childпроблемныевопросы filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроблемныевопросы requireOneByпроект(int $Проект) Return the first Childпроблемныевопросы filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроблемныевопросы requireOneByдата(string $Дата) Return the first Childпроблемныевопросы filtered by the Дата column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроблемныевопросы requireOneByкому(string $Кому) Return the first Childпроблемныевопросы filtered by the Кому column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроблемныевопросы requireOneByпроблемныевопросы(string $Проблемные_вопросы) Return the first Childпроблемныевопросы filtered by the Проблемные_вопросы column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроблемныевопросы requireOneByмерыдлярешения(string $Меры_для_решения) Return the first Childпроблемныевопросы filtered by the Меры_для_решения column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроблемныевопросы requireOneByответсвенный(string $Ответсвенный) Return the first Childпроблемныевопросы filtered by the Ответсвенный column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроблемныевопросы requireOneByсрок(string $Срок) Return the first Childпроблемныевопросы filtered by the Срок column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроблемныевопросы requireOneByстатус(string $Статус) Return the first Childпроблемныевопросы filtered by the Статус column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childпроблемныевопросы[]|ObjectCollection find(ConnectionInterface $con = null) Return Childпроблемныевопросы objects based on current ModelCriteria
 * @method     Childпроблемныевопросы[]|ObjectCollection findById(int $id) Return Childпроблемныевопросы objects filtered by the id column
 * @method     Childпроблемныевопросы[]|ObjectCollection findByпроект(int $Проект) Return Childпроблемныевопросы objects filtered by the Проект column
 * @method     Childпроблемныевопросы[]|ObjectCollection findByдата(string $Дата) Return Childпроблемныевопросы objects filtered by the Дата column
 * @method     Childпроблемныевопросы[]|ObjectCollection findByкому(string $Кому) Return Childпроблемныевопросы objects filtered by the Кому column
 * @method     Childпроблемныевопросы[]|ObjectCollection findByпроблемныевопросы(string $Проблемные_вопросы) Return Childпроблемныевопросы objects filtered by the Проблемные_вопросы column
 * @method     Childпроблемныевопросы[]|ObjectCollection findByмерыдлярешения(string $Меры_для_решения) Return Childпроблемныевопросы objects filtered by the Меры_для_решения column
 * @method     Childпроблемныевопросы[]|ObjectCollection findByответсвенный(string $Ответсвенный) Return Childпроблемныевопросы objects filtered by the Ответсвенный column
 * @method     Childпроблемныевопросы[]|ObjectCollection findByсрок(string $Срок) Return Childпроблемныевопросы objects filtered by the Срок column
 * @method     Childпроблемныевопросы[]|ObjectCollection findByстатус(string $Статус) Return Childпроблемныевопросы objects filtered by the Статус column
 * @method     Childпроблемныевопросы[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class проблемныевопросыQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\проблемныевопросыQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\проблемныевопросы', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildпроблемныевопросыQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildпроблемныевопросыQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildпроблемныевопросыQuery) {
            return $criteria;
        }
        $query = new ChildпроблемныевопросыQuery();
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
     * @return Childпроблемныевопросы|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = проблемныевопросыTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(проблемныевопросыTableMap::DATABASE_NAME);
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
     * @return Childпроблемныевопросы A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Проект, Дата, Кому, Проблемные_вопросы, Меры_для_решения, Ответсвенный, Срок, Статус FROM Проблемные_вопросы WHERE id = :p0';
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
            /** @var Childпроблемныевопросы $obj */
            $obj = new Childпроблемныевопросы();
            $obj->hydrate($row);
            проблемныевопросыTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return Childпроблемныевопросы|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(проблемныевопросыTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(проблемныевопросыTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(проблемныевопросыTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(проблемныевопросыTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(проблемныевопросыTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByпроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(проблемныевопросыTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(проблемныевопросыTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(проблемныевопросыTableMap::COL_ПРОЕКТ, $�роект, $comparison);
    }

    /**
     * Filter the query on the Дата column
     *
     * Example usage:
     * <code>
     * $query->filterByдата('2011-03-14'); // WHERE Дата = '2011-03-14'
     * $query->filterByдата('now'); // WHERE Дата = '2011-03-14'
     * $query->filterByдата(array('max' => 'yesterday')); // WHERE Дата > '2011-03-13'
     * </code>
     *
     * @param     mixed $�ата The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByдата($�ата = null, $comparison = null)
    {
        if (is_array($�ата)) {
            $useMinMax = false;
            if (isset($�ата['min'])) {
                $this->addUsingAlias(проблемныевопросыTableMap::COL_ДАТА, $�ата['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ата['max'])) {
                $this->addUsingAlias(проблемныевопросыTableMap::COL_ДАТА, $�ата['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(проблемныевопросыTableMap::COL_ДАТА, $�ата, $comparison);
    }

    /**
     * Filter the query on the Кому column
     *
     * Example usage:
     * <code>
     * $query->filterByкому('fooValue');   // WHERE Кому = 'fooValue'
     * $query->filterByкому('%fooValue%'); // WHERE Кому LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ому The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByкому($�ому = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ому)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ому)) {
                $�ому = str_replace('*', '%', $�ому);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(проблемныевопросыTableMap::COL_КОМУ, $�ому, $comparison);
    }

    /**
     * Filter the query on the Проблемные_вопросы column
     *
     * Example usage:
     * <code>
     * $query->filterByпроблемныевопросы('fooValue');   // WHERE Проблемные_вопросы = 'fooValue'
     * $query->filterByпроблемныевопросы('%fooValue%'); // WHERE Проблемные_вопросы LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�роблемныевопросы The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByпроблемныевопросы($�роблемныевопросы = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�роблемныевопросы)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�роблемныевопросы)) {
                $�роблемныевопросы = str_replace('*', '%', $�роблемныевопросы);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(проблемныевопросыTableMap::COL_ПРОБЛЕМНЫЕ_ВОПРОСЫ, $�роблемныевопросы, $comparison);
    }

    /**
     * Filter the query on the Меры_для_решения column
     *
     * Example usage:
     * <code>
     * $query->filterByмерыдлярешения('fooValue');   // WHERE Меры_для_решения = 'fooValue'
     * $query->filterByмерыдлярешения('%fooValue%'); // WHERE Меры_для_решения LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ерыдлярешения The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByмерыдлярешения($�ерыдлярешения = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ерыдлярешения)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ерыдлярешения)) {
                $�ерыдлярешения = str_replace('*', '%', $�ерыдлярешения);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(проблемныевопросыTableMap::COL_МЕРЫ_ДЛЯ_РЕШЕНИЯ, $�ерыдлярешения, $comparison);
    }

    /**
     * Filter the query on the Ответсвенный column
     *
     * Example usage:
     * <code>
     * $query->filterByответсвенный('fooValue');   // WHERE Ответсвенный = 'fooValue'
     * $query->filterByответсвенный('%fooValue%'); // WHERE Ответсвенный LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�тветсвенный The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByответсвенный($�тветсвенный = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�тветсвенный)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�тветсвенный)) {
                $�тветсвенный = str_replace('*', '%', $�тветсвенный);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(проблемныевопросыTableMap::COL_ОТВЕТСВЕННЫЙ, $�тветсвенный, $comparison);
    }

    /**
     * Filter the query on the Срок column
     *
     * Example usage:
     * <code>
     * $query->filterByсрок('2011-03-14'); // WHERE Срок = '2011-03-14'
     * $query->filterByсрок('now'); // WHERE Срок = '2011-03-14'
     * $query->filterByсрок(array('max' => 'yesterday')); // WHERE Срок > '2011-03-13'
     * </code>
     *
     * @param     mixed $�рок The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByсрок($�рок = null, $comparison = null)
    {
        if (is_array($�рок)) {
            $useMinMax = false;
            if (isset($�рок['min'])) {
                $this->addUsingAlias(проблемныевопросыTableMap::COL_СРОК, $�рок['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�рок['max'])) {
                $this->addUsingAlias(проблемныевопросыTableMap::COL_СРОК, $�рок['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(проблемныевопросыTableMap::COL_СРОК, $�рок, $comparison);
    }

    /**
     * Filter the query on the Статус column
     *
     * Example usage:
     * <code>
     * $query->filterByстатус('fooValue');   // WHERE Статус = 'fooValue'
     * $query->filterByстатус('%fooValue%'); // WHERE Статус LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�татус The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByстатус($�татус = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�татус)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�татус)) {
                $�татус = str_replace('*', '%', $�татус);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(проблемныевопросыTableMap::COL_СТАТУС, $�татус, $comparison);
    }

    /**
     * Filter the query by a related \Проекты object
     *
     * @param \Проекты|ObjectCollection $�роекты The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByПроекты($�роекты, $comparison = null)
    {
        if ($�роекты instanceof \Проекты) {
            return $this
                ->addUsingAlias(проблемныевопросыTableMap::COL_ПРОЕКТ, $�роекты->getId(), $comparison);
        } elseif ($�роекты instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(проблемныевопросыTableMap::COL_ПРОЕКТ, $�роекты->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function joinПроекты($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useПроектыQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinПроекты($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Проекты', '\ПроектыQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Childпроблемныевопросы $�роблемныевопросы Object to remove from the list of results
     *
     * @return $this|ChildпроблемныевопросыQuery The current query, for fluid interface
     */
    public function prune($�роблемныевопросы = null)
    {
        if ($�роблемныевопросы) {
            $this->addUsingAlias(проблемныевопросыTableMap::COL_ID, $�роблемныевопросы->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Проблемные_вопросы table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(проблемныевопросыTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            проблемныевопросыTableMap::clearInstancePool();
            проблемныевопросыTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(проблемныевопросыTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(проблемныевопросыTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            проблемныевопросыTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            проблемныевопросыTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // проблемныевопросыQuery
