<?php

namespace Base;

use \Выработка as ChildВыработка;
use \ВыработкаQuery as ChildВыработкаQuery;
use \Exception;
use \PDO;
use Map\ВыработкаTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Выработка' table.
 *
 * 
 *
 * @method     ChildВыработкаQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildВыработкаQuery orderByДата($order = Criteria::ASC) Order by the Дата column
 * @method     ChildВыработкаQuery orderByУчастокработ($order = Criteria::ASC) Order by the УчастокРабот column
 * @method     ChildВыработкаQuery orderByТиптехники($order = Criteria::ASC) Order by the ТипТехники column
 * @method     ChildВыработкаQuery orderByПлан($order = Criteria::ASC) Order by the План column
 * @method     ChildВыработкаQuery orderByФакт($order = Criteria::ASC) Order by the Факт column
 * @method     ChildВыработкаQuery orderByТипработ($order = Criteria::ASC) Order by the ТипРабот column
 * @method     ChildВыработкаQuery orderByВыработка($order = Criteria::ASC) Order by the Выработка column
 *
 * @method     ChildВыработкаQuery groupById() Group by the id column
 * @method     ChildВыработкаQuery groupByДата() Group by the Дата column
 * @method     ChildВыработкаQuery groupByУчастокработ() Group by the УчастокРабот column
 * @method     ChildВыработкаQuery groupByТиптехники() Group by the ТипТехники column
 * @method     ChildВыработкаQuery groupByПлан() Group by the План column
 * @method     ChildВыработкаQuery groupByФакт() Group by the Факт column
 * @method     ChildВыработкаQuery groupByТипработ() Group by the ТипРабот column
 * @method     ChildВыработкаQuery groupByВыработка() Group by the Выработка column
 *
 * @method     ChildВыработкаQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildВыработкаQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildВыработкаQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildВыработкаQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildВыработкаQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildВыработкаQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildВыработка findOne(ConnectionInterface $con = null) Return the first ChildВыработка matching the query
 * @method     ChildВыработка findOneOrCreate(ConnectionInterface $con = null) Return the first ChildВыработка matching the query, or a new ChildВыработка object populated from the query conditions when no match is found
 *
 * @method     ChildВыработка findOneById(int $id) Return the first ChildВыработка filtered by the id column
 * @method     ChildВыработка findOneByДата(string $Дата) Return the first ChildВыработка filtered by the Дата column
 * @method     ChildВыработка findOneByУчастокработ(int $УчастокРабот) Return the first ChildВыработка filtered by the УчастокРабот column
 * @method     ChildВыработка findOneByТиптехники(int $ТипТехники) Return the first ChildВыработка filtered by the ТипТехники column
 * @method     ChildВыработка findOneByПлан(int $План) Return the first ChildВыработка filtered by the План column
 * @method     ChildВыработка findOneByФакт(int $Факт) Return the first ChildВыработка filtered by the Факт column
 * @method     ChildВыработка findOneByТипработ(int $ТипРабот) Return the first ChildВыработка filtered by the ТипРабот column
 * @method     ChildВыработка findOneByВыработка(boolean $Выработка) Return the first ChildВыработка filtered by the Выработка column *

 * @method     ChildВыработка requirePk($key, ConnectionInterface $con = null) Return the ChildВыработка by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildВыработка requireOne(ConnectionInterface $con = null) Return the first ChildВыработка matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildВыработка requireOneById(int $id) Return the first ChildВыработка filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildВыработка requireOneByДата(string $Дата) Return the first ChildВыработка filtered by the Дата column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildВыработка requireOneByУчастокработ(int $УчастокРабот) Return the first ChildВыработка filtered by the УчастокРабот column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildВыработка requireOneByТиптехники(int $ТипТехники) Return the first ChildВыработка filtered by the ТипТехники column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildВыработка requireOneByПлан(int $План) Return the first ChildВыработка filtered by the План column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildВыработка requireOneByФакт(int $Факт) Return the first ChildВыработка filtered by the Факт column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildВыработка requireOneByТипработ(int $ТипРабот) Return the first ChildВыработка filtered by the ТипРабот column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildВыработка requireOneByВыработка(boolean $Выработка) Return the first ChildВыработка filtered by the Выработка column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildВыработка[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildВыработка objects based on current ModelCriteria
 * @method     ChildВыработка[]|ObjectCollection findById(int $id) Return ChildВыработка objects filtered by the id column
 * @method     ChildВыработка[]|ObjectCollection findByДата(string $Дата) Return ChildВыработка objects filtered by the Дата column
 * @method     ChildВыработка[]|ObjectCollection findByУчастокработ(int $УчастокРабот) Return ChildВыработка objects filtered by the УчастокРабот column
 * @method     ChildВыработка[]|ObjectCollection findByТиптехники(int $ТипТехники) Return ChildВыработка objects filtered by the ТипТехники column
 * @method     ChildВыработка[]|ObjectCollection findByПлан(int $План) Return ChildВыработка objects filtered by the План column
 * @method     ChildВыработка[]|ObjectCollection findByФакт(int $Факт) Return ChildВыработка objects filtered by the Факт column
 * @method     ChildВыработка[]|ObjectCollection findByТипработ(int $ТипРабот) Return ChildВыработка objects filtered by the ТипРабот column
 * @method     ChildВыработка[]|ObjectCollection findByВыработка(boolean $Выработка) Return ChildВыработка objects filtered by the Выработка column
 * @method     ChildВыработка[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ВыработкаQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ВыработкаQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Выработка', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildВыработкаQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildВыработкаQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildВыработкаQuery) {
            return $criteria;
        }
        $query = new ChildВыработкаQuery();
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
     * @return ChildВыработка|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ВыработкаTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ВыработкаTableMap::DATABASE_NAME);
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
     * @return ChildВыработка A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Дата, УчастокРабот, ТипТехники, План, Факт, ТипРабот, Выработка FROM Выработка WHERE id = :p0';
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
            /** @var ChildВыработка $obj */
            $obj = new ChildВыработка();
            $obj->hydrate($row);
            ВыработкаTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildВыработка|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildВыработкаQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ВыработкаTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildВыработкаQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ВыработкаTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildВыработкаQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ВыработкаTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Дата column
     *
     * Example usage:
     * <code>
     * $query->filterByДата('2011-03-14'); // WHERE Дата = '2011-03-14'
     * $query->filterByДата('now'); // WHERE Дата = '2011-03-14'
     * $query->filterByДата(array('max' => 'yesterday')); // WHERE Дата > '2011-03-13'
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
     * @return $this|ChildВыработкаQuery The current query, for fluid interface
     */
    public function filterByДата($�ата = null, $comparison = null)
    {
        if (is_array($�ата)) {
            $useMinMax = false;
            if (isset($�ата['min'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_ДАТА, $�ата['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ата['max'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_ДАТА, $�ата['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ВыработкаTableMap::COL_ДАТА, $�ата, $comparison);
    }

    /**
     * Filter the query on the УчастокРабот column
     *
     * Example usage:
     * <code>
     * $query->filterByУчастокработ(1234); // WHERE УчастокРабот = 1234
     * $query->filterByУчастокработ(array(12, 34)); // WHERE УчастокРабот IN (12, 34)
     * $query->filterByУчастокработ(array('min' => 12)); // WHERE УчастокРабот > 12
     * </code>
     *
     * @param     mixed $�частокработ The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildВыработкаQuery The current query, for fluid interface
     */
    public function filterByУчастокработ($�частокработ = null, $comparison = null)
    {
        if (is_array($�частокработ)) {
            $useMinMax = false;
            if (isset($�частокработ['min'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_УЧАСТОКРАБОТ, $�частокработ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�частокработ['max'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_УЧАСТОКРАБОТ, $�частокработ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ВыработкаTableMap::COL_УЧАСТОКРАБОТ, $�частокработ, $comparison);
    }

    /**
     * Filter the query on the ТипТехники column
     *
     * Example usage:
     * <code>
     * $query->filterByТиптехники(1234); // WHERE ТипТехники = 1234
     * $query->filterByТиптехники(array(12, 34)); // WHERE ТипТехники IN (12, 34)
     * $query->filterByТиптехники(array('min' => 12)); // WHERE ТипТехники > 12
     * </code>
     *
     * @param     mixed $�иптехники The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildВыработкаQuery The current query, for fluid interface
     */
    public function filterByТиптехники($�иптехники = null, $comparison = null)
    {
        if (is_array($�иптехники)) {
            $useMinMax = false;
            if (isset($�иптехники['min'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_ТИПТЕХНИКИ, $�иптехники['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�иптехники['max'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_ТИПТЕХНИКИ, $�иптехники['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ВыработкаTableMap::COL_ТИПТЕХНИКИ, $�иптехники, $comparison);
    }

    /**
     * Filter the query on the План column
     *
     * Example usage:
     * <code>
     * $query->filterByПлан(1234); // WHERE План = 1234
     * $query->filterByПлан(array(12, 34)); // WHERE План IN (12, 34)
     * $query->filterByПлан(array('min' => 12)); // WHERE План > 12
     * </code>
     *
     * @param     mixed $�лан The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildВыработкаQuery The current query, for fluid interface
     */
    public function filterByПлан($�лан = null, $comparison = null)
    {
        if (is_array($�лан)) {
            $useMinMax = false;
            if (isset($�лан['min'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_ПЛАН, $�лан['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�лан['max'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_ПЛАН, $�лан['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ВыработкаTableMap::COL_ПЛАН, $�лан, $comparison);
    }

    /**
     * Filter the query on the Факт column
     *
     * Example usage:
     * <code>
     * $query->filterByФакт(1234); // WHERE Факт = 1234
     * $query->filterByФакт(array(12, 34)); // WHERE Факт IN (12, 34)
     * $query->filterByФакт(array('min' => 12)); // WHERE Факт > 12
     * </code>
     *
     * @param     mixed $�акт The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildВыработкаQuery The current query, for fluid interface
     */
    public function filterByФакт($�акт = null, $comparison = null)
    {
        if (is_array($�акт)) {
            $useMinMax = false;
            if (isset($�акт['min'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_ФАКТ, $�акт['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�акт['max'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_ФАКТ, $�акт['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ВыработкаTableMap::COL_ФАКТ, $�акт, $comparison);
    }

    /**
     * Filter the query on the ТипРабот column
     *
     * Example usage:
     * <code>
     * $query->filterByТипработ(1234); // WHERE ТипРабот = 1234
     * $query->filterByТипработ(array(12, 34)); // WHERE ТипРабот IN (12, 34)
     * $query->filterByТипработ(array('min' => 12)); // WHERE ТипРабот > 12
     * </code>
     *
     * @param     mixed $�ипработ The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildВыработкаQuery The current query, for fluid interface
     */
    public function filterByТипработ($�ипработ = null, $comparison = null)
    {
        if (is_array($�ипработ)) {
            $useMinMax = false;
            if (isset($�ипработ['min'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_ТИПРАБОТ, $�ипработ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ипработ['max'])) {
                $this->addUsingAlias(ВыработкаTableMap::COL_ТИПРАБОТ, $�ипработ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ВыработкаTableMap::COL_ТИПРАБОТ, $�ипработ, $comparison);
    }

    /**
     * Filter the query on the Выработка column
     *
     * Example usage:
     * <code>
     * $query->filterByВыработка(true); // WHERE Выработка = true
     * $query->filterByВыработка('yes'); // WHERE Выработка = true
     * </code>
     *
     * @param     boolean|string $�ыработка The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildВыработкаQuery The current query, for fluid interface
     */
    public function filterByВыработка($�ыработка = null, $comparison = null)
    {
        if (is_string($�ыработка)) {
            $�ыработка = in_array(strtolower($�ыработка), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ВыработкаTableMap::COL_ВЫРАБОТКА, $�ыработка, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildВыработка $�ыработка Object to remove from the list of results
     *
     * @return $this|ChildВыработкаQuery The current query, for fluid interface
     */
    public function prune($�ыработка = null)
    {
        if ($�ыработка) {
            $this->addUsingAlias(ВыработкаTableMap::COL_ID, $�ыработка->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Выработка table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ВыработкаTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ВыработкаTableMap::clearInstancePool();
            ВыработкаTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ВыработкаTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ВыработкаTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ВыработкаTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ВыработкаTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ВыработкаQuery
