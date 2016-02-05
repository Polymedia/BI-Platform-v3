<?php

namespace Base;

use \производственныепрограммы as Childпроизводственныепрограммы;
use \производственныепрограммыQuery as ChildпроизводственныепрограммыQuery;
use \Exception;
use \PDO;
use Map\производственныепрограммыTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Производственные_программы' table.
 *
 * 
 *
 * @method     ChildпроизводственныепрограммыQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildпроизводственныепрограммыQuery orderByтиппрограммы($order = Criteria::ASC) Order by the Тип_программы column
 * @method     ChildпроизводственныепрограммыQuery orderByгод($order = Criteria::ASC) Order by the Год column
 * @method     ChildпроизводственныепрограммыQuery orderByмесяц($order = Criteria::ASC) Order by the Месяц column
 * @method     ChildпроизводственныепрограммыQuery orderByплан($order = Criteria::ASC) Order by the План column
 * @method     ChildпроизводственныепрограммыQuery orderByфакт($order = Criteria::ASC) Order by the Факт column
 *
 * @method     ChildпроизводственныепрограммыQuery groupById() Group by the id column
 * @method     ChildпроизводственныепрограммыQuery groupByтиппрограммы() Group by the Тип_программы column
 * @method     ChildпроизводственныепрограммыQuery groupByгод() Group by the Год column
 * @method     ChildпроизводственныепрограммыQuery groupByмесяц() Group by the Месяц column
 * @method     ChildпроизводственныепрограммыQuery groupByплан() Group by the План column
 * @method     ChildпроизводственныепрограммыQuery groupByфакт() Group by the Факт column
 *
 * @method     ChildпроизводственныепрограммыQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildпроизводственныепрограммыQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildпроизводственныепрограммыQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildпроизводственныепрограммыQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildпроизводственныепрограммыQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildпроизводственныепрограммыQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildпроизводственныепрограммыQuery leftJoinпрограммы($relationAlias = null) Adds a LEFT JOIN clause to the query using the программы relation
 * @method     ChildпроизводственныепрограммыQuery rightJoinпрограммы($relationAlias = null) Adds a RIGHT JOIN clause to the query using the программы relation
 * @method     ChildпроизводственныепрограммыQuery innerJoinпрограммы($relationAlias = null) Adds a INNER JOIN clause to the query using the программы relation
 *
 * @method     ChildпроизводственныепрограммыQuery joinWithпрограммы($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the программы relation
 *
 * @method     ChildпроизводственныепрограммыQuery leftJoinWithпрограммы() Adds a LEFT JOIN clause and with to the query using the программы relation
 * @method     ChildпроизводственныепрограммыQuery rightJoinWithпрограммы() Adds a RIGHT JOIN clause and with to the query using the программы relation
 * @method     ChildпроизводственныепрограммыQuery innerJoinWithпрограммы() Adds a INNER JOIN clause and with to the query using the программы relation
 *
 * @method     ChildпроизводственныепрограммыQuery leftJoinмесяца($relationAlias = null) Adds a LEFT JOIN clause to the query using the месяца relation
 * @method     ChildпроизводственныепрограммыQuery rightJoinмесяца($relationAlias = null) Adds a RIGHT JOIN clause to the query using the месяца relation
 * @method     ChildпроизводственныепрограммыQuery innerJoinмесяца($relationAlias = null) Adds a INNER JOIN clause to the query using the месяца relation
 *
 * @method     ChildпроизводственныепрограммыQuery joinWithмесяца($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the месяца relation
 *
 * @method     ChildпроизводственныепрограммыQuery leftJoinWithмесяца() Adds a LEFT JOIN clause and with to the query using the месяца relation
 * @method     ChildпроизводственныепрограммыQuery rightJoinWithмесяца() Adds a RIGHT JOIN clause and with to the query using the месяца relation
 * @method     ChildпроизводственныепрограммыQuery innerJoinWithмесяца() Adds a INNER JOIN clause and with to the query using the месяца relation
 *
 * @method     ChildпроизводственныепрограммыQuery leftJoinгода($relationAlias = null) Adds a LEFT JOIN clause to the query using the года relation
 * @method     ChildпроизводственныепрограммыQuery rightJoinгода($relationAlias = null) Adds a RIGHT JOIN clause to the query using the года relation
 * @method     ChildпроизводственныепрограммыQuery innerJoinгода($relationAlias = null) Adds a INNER JOIN clause to the query using the года relation
 *
 * @method     ChildпроизводственныепрограммыQuery joinWithгода($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the года relation
 *
 * @method     ChildпроизводственныепрограммыQuery leftJoinWithгода() Adds a LEFT JOIN clause and with to the query using the года relation
 * @method     ChildпроизводственныепрограммыQuery rightJoinWithгода() Adds a RIGHT JOIN clause and with to the query using the года relation
 * @method     ChildпроизводственныепрограммыQuery innerJoinWithгода() Adds a INNER JOIN clause and with to the query using the года relation
 *
 * @method     \программыQuery|\месяцаQuery|\годаQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childпроизводственныепрограммы findOne(ConnectionInterface $con = null) Return the first Childпроизводственныепрограммы matching the query
 * @method     Childпроизводственныепрограммы findOneOrCreate(ConnectionInterface $con = null) Return the first Childпроизводственныепрограммы matching the query, or a new Childпроизводственныепрограммы object populated from the query conditions when no match is found
 *
 * @method     Childпроизводственныепрограммы findOneById(int $id) Return the first Childпроизводственныепрограммы filtered by the id column
 * @method     Childпроизводственныепрограммы findOneByтиппрограммы(int $Тип_программы) Return the first Childпроизводственныепрограммы filtered by the Тип_программы column
 * @method     Childпроизводственныепрограммы findOneByгод(int $Год) Return the first Childпроизводственныепрограммы filtered by the Год column
 * @method     Childпроизводственныепрограммы findOneByмесяц(int $Месяц) Return the first Childпроизводственныепрограммы filtered by the Месяц column
 * @method     Childпроизводственныепрограммы findOneByплан(int $План) Return the first Childпроизводственныепрограммы filtered by the План column
 * @method     Childпроизводственныепрограммы findOneByфакт(int $Факт) Return the first Childпроизводственныепрограммы filtered by the Факт column *

 * @method     Childпроизводственныепрограммы requirePk($key, ConnectionInterface $con = null) Return the Childпроизводственныепрограммы by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроизводственныепрограммы requireOne(ConnectionInterface $con = null) Return the first Childпроизводственныепрограммы matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childпроизводственныепрограммы requireOneById(int $id) Return the first Childпроизводственныепрограммы filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроизводственныепрограммы requireOneByтиппрограммы(int $Тип_программы) Return the first Childпроизводственныепрограммы filtered by the Тип_программы column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроизводственныепрограммы requireOneByгод(int $Год) Return the first Childпроизводственныепрограммы filtered by the Год column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроизводственныепрограммы requireOneByмесяц(int $Месяц) Return the first Childпроизводственныепрограммы filtered by the Месяц column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроизводственныепрограммы requireOneByплан(int $План) Return the first Childпроизводственныепрограммы filtered by the План column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпроизводственныепрограммы requireOneByфакт(int $Факт) Return the first Childпроизводственныепрограммы filtered by the Факт column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childпроизводственныепрограммы[]|ObjectCollection find(ConnectionInterface $con = null) Return Childпроизводственныепрограммы objects based on current ModelCriteria
 * @method     Childпроизводственныепрограммы[]|ObjectCollection findById(int $id) Return Childпроизводственныепрограммы objects filtered by the id column
 * @method     Childпроизводственныепрограммы[]|ObjectCollection findByтиппрограммы(int $Тип_программы) Return Childпроизводственныепрограммы objects filtered by the Тип_программы column
 * @method     Childпроизводственныепрограммы[]|ObjectCollection findByгод(int $Год) Return Childпроизводственныепрограммы objects filtered by the Год column
 * @method     Childпроизводственныепрограммы[]|ObjectCollection findByмесяц(int $Месяц) Return Childпроизводственныепрограммы objects filtered by the Месяц column
 * @method     Childпроизводственныепрограммы[]|ObjectCollection findByплан(int $План) Return Childпроизводственныепрограммы objects filtered by the План column
 * @method     Childпроизводственныепрограммы[]|ObjectCollection findByфакт(int $Факт) Return Childпроизводственныепрограммы objects filtered by the Факт column
 * @method     Childпроизводственныепрограммы[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class производственныепрограммыQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\производственныепрограммыQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\производственныепрограммы', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildпроизводственныепрограммыQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildпроизводственныепрограммыQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildпроизводственныепрограммыQuery) {
            return $criteria;
        }
        $query = new ChildпроизводственныепрограммыQuery();
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
     * @return Childпроизводственныепрограммы|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = производственныепрограммыTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(производственныепрограммыTableMap::DATABASE_NAME);
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
     * @return Childпроизводственныепрограммы A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Тип_программы, Год, Месяц, План, Факт FROM Производственные_программы WHERE id = :p0';
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
            /** @var Childпроизводственныепрограммы $obj */
            $obj = new Childпроизводственныепрограммы();
            $obj->hydrate($row);
            производственныепрограммыTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return Childпроизводственныепрограммы|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(производственныепрограммыTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(производственныепрограммыTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(производственныепрограммыTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(производственныепрограммыTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(производственныепрограммыTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Тип_программы column
     *
     * Example usage:
     * <code>
     * $query->filterByтиппрограммы(1234); // WHERE Тип_программы = 1234
     * $query->filterByтиппрограммы(array(12, 34)); // WHERE Тип_программы IN (12, 34)
     * $query->filterByтиппрограммы(array('min' => 12)); // WHERE Тип_программы > 12
     * </code>
     *
     * @see       filterByпрограммы()
     *
     * @param     mixed $�иппрограммы The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByтиппрограммы($�иппрограммы = null, $comparison = null)
    {
        if (is_array($�иппрограммы)) {
            $useMinMax = false;
            if (isset($�иппрограммы['min'])) {
                $this->addUsingAlias(производственныепрограммыTableMap::COL_ТИП_ПРОГРАММЫ, $�иппрограммы['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�иппрограммы['max'])) {
                $this->addUsingAlias(производственныепрограммыTableMap::COL_ТИП_ПРОГРАММЫ, $�иппрограммы['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(производственныепрограммыTableMap::COL_ТИП_ПРОГРАММЫ, $�иппрограммы, $comparison);
    }

    /**
     * Filter the query on the Год column
     *
     * Example usage:
     * <code>
     * $query->filterByгод(1234); // WHERE Год = 1234
     * $query->filterByгод(array(12, 34)); // WHERE Год IN (12, 34)
     * $query->filterByгод(array('min' => 12)); // WHERE Год > 12
     * </code>
     *
     * @see       filterByгода()
     *
     * @param     mixed $�од The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByгод($�од = null, $comparison = null)
    {
        if (is_array($�од)) {
            $useMinMax = false;
            if (isset($�од['min'])) {
                $this->addUsingAlias(производственныепрограммыTableMap::COL_ГОД, $�од['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�од['max'])) {
                $this->addUsingAlias(производственныепрограммыTableMap::COL_ГОД, $�од['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(производственныепрограммыTableMap::COL_ГОД, $�од, $comparison);
    }

    /**
     * Filter the query on the Месяц column
     *
     * Example usage:
     * <code>
     * $query->filterByмесяц(1234); // WHERE Месяц = 1234
     * $query->filterByмесяц(array(12, 34)); // WHERE Месяц IN (12, 34)
     * $query->filterByмесяц(array('min' => 12)); // WHERE Месяц > 12
     * </code>
     *
     * @see       filterByмесяца()
     *
     * @param     mixed $�есяц The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByмесяц($�есяц = null, $comparison = null)
    {
        if (is_array($�есяц)) {
            $useMinMax = false;
            if (isset($�есяц['min'])) {
                $this->addUsingAlias(производственныепрограммыTableMap::COL_МЕСЯЦ, $�есяц['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�есяц['max'])) {
                $this->addUsingAlias(производственныепрограммыTableMap::COL_МЕСЯЦ, $�есяц['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(производственныепрограммыTableMap::COL_МЕСЯЦ, $�есяц, $comparison);
    }

    /**
     * Filter the query on the План column
     *
     * Example usage:
     * <code>
     * $query->filterByплан(1234); // WHERE План = 1234
     * $query->filterByплан(array(12, 34)); // WHERE План IN (12, 34)
     * $query->filterByплан(array('min' => 12)); // WHERE План > 12
     * </code>
     *
     * @param     mixed $�лан The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByплан($�лан = null, $comparison = null)
    {
        if (is_array($�лан)) {
            $useMinMax = false;
            if (isset($�лан['min'])) {
                $this->addUsingAlias(производственныепрограммыTableMap::COL_ПЛАН, $�лан['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�лан['max'])) {
                $this->addUsingAlias(производственныепрограммыTableMap::COL_ПЛАН, $�лан['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(производственныепрограммыTableMap::COL_ПЛАН, $�лан, $comparison);
    }

    /**
     * Filter the query on the Факт column
     *
     * Example usage:
     * <code>
     * $query->filterByфакт(1234); // WHERE Факт = 1234
     * $query->filterByфакт(array(12, 34)); // WHERE Факт IN (12, 34)
     * $query->filterByфакт(array('min' => 12)); // WHERE Факт > 12
     * </code>
     *
     * @param     mixed $�акт The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByфакт($�акт = null, $comparison = null)
    {
        if (is_array($�акт)) {
            $useMinMax = false;
            if (isset($�акт['min'])) {
                $this->addUsingAlias(производственныепрограммыTableMap::COL_ФАКТ, $�акт['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�акт['max'])) {
                $this->addUsingAlias(производственныепрограммыTableMap::COL_ФАКТ, $�акт['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(производственныепрограммыTableMap::COL_ФАКТ, $�акт, $comparison);
    }

    /**
     * Filter the query by a related \программы object
     *
     * @param \программы|ObjectCollection $�рограммы The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByпрограммы($�рограммы, $comparison = null)
    {
        if ($�рограммы instanceof \программы) {
            return $this
                ->addUsingAlias(производственныепрограммыTableMap::COL_ТИП_ПРОГРАММЫ, $�рограммы->getId(), $comparison);
        } elseif ($�рограммы instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(производственныепрограммыTableMap::COL_ТИП_ПРОГРАММЫ, $�рограммы->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByпрограммы() only accepts arguments of type \программы or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the программы relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function joinпрограммы($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('программы');

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
            $this->addJoinObject($join, 'программы');
        }

        return $this;
    }

    /**
     * Use the программы relation программы object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \программыQuery A secondary query class using the current class as primary query
     */
    public function useпрограммыQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinпрограммы($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'программы', '\программыQuery');
    }

    /**
     * Filter the query by a related \месяца object
     *
     * @param \месяца|ObjectCollection $�есяца The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByмесяца($�есяца, $comparison = null)
    {
        if ($�есяца instanceof \месяца) {
            return $this
                ->addUsingAlias(производственныепрограммыTableMap::COL_МЕСЯЦ, $�есяца->getId(), $comparison);
        } elseif ($�есяца instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(производственныепрограммыTableMap::COL_МЕСЯЦ, $�есяца->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByмесяца() only accepts arguments of type \месяца or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the месяца relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function joinмесяца($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('месяца');

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
            $this->addJoinObject($join, 'месяца');
        }

        return $this;
    }

    /**
     * Use the месяца relation месяца object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \месяцаQuery A secondary query class using the current class as primary query
     */
    public function useмесяцаQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinмесяца($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'месяца', '\месяцаQuery');
    }

    /**
     * Filter the query by a related \года object
     *
     * @param \года|ObjectCollection $�ода The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByгода($�ода, $comparison = null)
    {
        if ($�ода instanceof \года) {
            return $this
                ->addUsingAlias(производственныепрограммыTableMap::COL_ГОД, $�ода->getId(), $comparison);
        } elseif ($�ода instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(производственныепрограммыTableMap::COL_ГОД, $�ода->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByгода() only accepts arguments of type \года or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the года relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function joinгода($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('года');

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
            $this->addJoinObject($join, 'года');
        }

        return $this;
    }

    /**
     * Use the года relation года object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \годаQuery A secondary query class using the current class as primary query
     */
    public function useгодаQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinгода($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'года', '\годаQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Childпроизводственныепрограммы $�роизводственныепрограммы Object to remove from the list of results
     *
     * @return $this|ChildпроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function prune($�роизводственныепрограммы = null)
    {
        if ($�роизводственныепрограммы) {
            $this->addUsingAlias(производственныепрограммыTableMap::COL_ID, $�роизводственныепрограммы->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Производственные_программы table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(производственныепрограммыTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            производственныепрограммыTableMap::clearInstancePool();
            производственныепрограммыTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(производственныепрограммыTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(производственныепрограммыTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            производственныепрограммыTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            производственныепрограммыTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // производственныепрограммыQuery
