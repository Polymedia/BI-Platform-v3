<?php

namespace Base;

use \DataTable as ChildDataTable;
use \DataTableQuery as ChildDataTableQuery;
use \Exception;
use \PDO;
use Map\DataTableTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'data_table' table.
 *
 *
 *
 * @method     ChildDataTableQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDataTableQuery orderByOne($order = Criteria::ASC) Order by the one column
 * @method     ChildDataTableQuery orderByTwo($order = Criteria::ASC) Order by the two column
 * @method     ChildDataTableQuery orderByThree($order = Criteria::ASC) Order by the three column
 * @method     ChildDataTableQuery orderByFour($order = Criteria::ASC) Order by the four column
 *
 * @method     ChildDataTableQuery groupById() Group by the id column
 * @method     ChildDataTableQuery groupByOne() Group by the one column
 * @method     ChildDataTableQuery groupByTwo() Group by the two column
 * @method     ChildDataTableQuery groupByThree() Group by the three column
 * @method     ChildDataTableQuery groupByFour() Group by the four column
 *
 * @method     ChildDataTableQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDataTableQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDataTableQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDataTableQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDataTableQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDataTableQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDataTable findOne(ConnectionInterface $con = null) Return the first ChildDataTable matching the query
 * @method     ChildDataTable findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDataTable matching the query, or a new ChildDataTable object populated from the query conditions when no match is found
 *
 * @method     ChildDataTable findOneById(int $id) Return the first ChildDataTable filtered by the id column
 * @method     ChildDataTable findOneByOne(int $one) Return the first ChildDataTable filtered by the one column
 * @method     ChildDataTable findOneByTwo(int $two) Return the first ChildDataTable filtered by the two column
 * @method     ChildDataTable findOneByThree(int $three) Return the first ChildDataTable filtered by the three column
 * @method     ChildDataTable findOneByFour(string $four) Return the first ChildDataTable filtered by the four column *

 * @method     ChildDataTable requirePk($key, ConnectionInterface $con = null) Return the ChildDataTable by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDataTable requireOne(ConnectionInterface $con = null) Return the first ChildDataTable matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDataTable requireOneById(int $id) Return the first ChildDataTable filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDataTable requireOneByOne(int $one) Return the first ChildDataTable filtered by the one column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDataTable requireOneByTwo(int $two) Return the first ChildDataTable filtered by the two column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDataTable requireOneByThree(int $three) Return the first ChildDataTable filtered by the three column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDataTable requireOneByFour(string $four) Return the first ChildDataTable filtered by the four column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDataTable[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDataTable objects based on current ModelCriteria
 * @method     ChildDataTable[]|ObjectCollection findById(int $id) Return ChildDataTable objects filtered by the id column
 * @method     ChildDataTable[]|ObjectCollection findByOne(int $one) Return ChildDataTable objects filtered by the one column
 * @method     ChildDataTable[]|ObjectCollection findByTwo(int $two) Return ChildDataTable objects filtered by the two column
 * @method     ChildDataTable[]|ObjectCollection findByThree(int $three) Return ChildDataTable objects filtered by the three column
 * @method     ChildDataTable[]|ObjectCollection findByFour(string $four) Return ChildDataTable objects filtered by the four column
 * @method     ChildDataTable[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DataTableQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DataTableQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DataTable', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDataTableQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDataTableQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDataTableQuery) {
            return $criteria;
        }
        $query = new ChildDataTableQuery();
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
     * @return ChildDataTable|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DataTableTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DataTableTableMap::DATABASE_NAME);
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
     * @return ChildDataTable A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, one, two, three, four FROM data_table WHERE id = :p0';
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
            /** @var ChildDataTable $obj */
            $obj = new ChildDataTable();
            $obj->hydrate($row);
            DataTableTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDataTable|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDataTableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DataTableTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDataTableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DataTableTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildDataTableQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DataTableTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DataTableTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataTableTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the one column
     *
     * Example usage:
     * <code>
     * $query->filterByOne(1234); // WHERE one = 1234
     * $query->filterByOne(array(12, 34)); // WHERE one IN (12, 34)
     * $query->filterByOne(array('min' => 12)); // WHERE one > 12
     * </code>
     *
     * @param     mixed $one The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDataTableQuery The current query, for fluid interface
     */
    public function filterByOne($one = null, $comparison = null)
    {
        if (is_array($one)) {
            $useMinMax = false;
            if (isset($one['min'])) {
                $this->addUsingAlias(DataTableTableMap::COL_ONE, $one['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($one['max'])) {
                $this->addUsingAlias(DataTableTableMap::COL_ONE, $one['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataTableTableMap::COL_ONE, $one, $comparison);
    }

    /**
     * Filter the query on the two column
     *
     * Example usage:
     * <code>
     * $query->filterByTwo(1234); // WHERE two = 1234
     * $query->filterByTwo(array(12, 34)); // WHERE two IN (12, 34)
     * $query->filterByTwo(array('min' => 12)); // WHERE two > 12
     * </code>
     *
     * @param     mixed $two The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDataTableQuery The current query, for fluid interface
     */
    public function filterByTwo($two = null, $comparison = null)
    {
        if (is_array($two)) {
            $useMinMax = false;
            if (isset($two['min'])) {
                $this->addUsingAlias(DataTableTableMap::COL_TWO, $two['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($two['max'])) {
                $this->addUsingAlias(DataTableTableMap::COL_TWO, $two['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataTableTableMap::COL_TWO, $two, $comparison);
    }

    /**
     * Filter the query on the three column
     *
     * Example usage:
     * <code>
     * $query->filterByThree(1234); // WHERE three = 1234
     * $query->filterByThree(array(12, 34)); // WHERE three IN (12, 34)
     * $query->filterByThree(array('min' => 12)); // WHERE three > 12
     * </code>
     *
     * @param     mixed $three The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDataTableQuery The current query, for fluid interface
     */
    public function filterByThree($three = null, $comparison = null)
    {
        if (is_array($three)) {
            $useMinMax = false;
            if (isset($three['min'])) {
                $this->addUsingAlias(DataTableTableMap::COL_THREE, $three['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($three['max'])) {
                $this->addUsingAlias(DataTableTableMap::COL_THREE, $three['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataTableTableMap::COL_THREE, $three, $comparison);
    }

    /**
     * Filter the query on the four column
     *
     * Example usage:
     * <code>
     * $query->filterByFour('fooValue');   // WHERE four = 'fooValue'
     * $query->filterByFour('%fooValue%'); // WHERE four LIKE '%fooValue%'
     * </code>
     *
     * @param     string $four The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDataTableQuery The current query, for fluid interface
     */
    public function filterByFour($four = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($four)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $four)) {
                $four = str_replace('*', '%', $four);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DataTableTableMap::COL_FOUR, $four, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDataTable $dataTable Object to remove from the list of results
     *
     * @return $this|ChildDataTableQuery The current query, for fluid interface
     */
    public function prune($dataTable = null)
    {
        if ($dataTable) {
            $this->addUsingAlias(DataTableTableMap::COL_ID, $dataTable->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the data_table table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DataTableTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DataTableTableMap::clearInstancePool();
            DataTableTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DataTableTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DataTableTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DataTableTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DataTableTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DataTableQuery
