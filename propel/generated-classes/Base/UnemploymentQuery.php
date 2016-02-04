<?php

namespace Base;

use \Unemployment as ChildUnemployment;
use \UnemploymentQuery as ChildUnemploymentQuery;
use \Exception;
use \PDO;
use Map\UnemploymentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'unemployment' table.
 *
 *
 *
 * @method     ChildUnemploymentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildUnemploymentQuery orderByUnemploymentAdult($order = Criteria::ASC) Order by the unemployment_adult column
 * @method     ChildUnemploymentQuery orderByUnemploymentYouth($order = Criteria::ASC) Order by the unemployment_youth column
 * @method     ChildUnemploymentQuery orderByRegionId($order = Criteria::ASC) Order by the region_id column
 * @method     ChildUnemploymentQuery orderByRegionName($order = Criteria::ASC) Order by the region_name column
 * @method     ChildUnemploymentQuery orderByYear($order = Criteria::ASC) Order by the year column
 *
 * @method     ChildUnemploymentQuery groupById() Group by the id column
 * @method     ChildUnemploymentQuery groupByUnemploymentAdult() Group by the unemployment_adult column
 * @method     ChildUnemploymentQuery groupByUnemploymentYouth() Group by the unemployment_youth column
 * @method     ChildUnemploymentQuery groupByRegionId() Group by the region_id column
 * @method     ChildUnemploymentQuery groupByRegionName() Group by the region_name column
 * @method     ChildUnemploymentQuery groupByYear() Group by the year column
 *
 * @method     ChildUnemploymentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUnemploymentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUnemploymentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUnemploymentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUnemploymentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUnemploymentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUnemployment findOne(ConnectionInterface $con = null) Return the first ChildUnemployment matching the query
 * @method     ChildUnemployment findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUnemployment matching the query, or a new ChildUnemployment object populated from the query conditions when no match is found
 *
 * @method     ChildUnemployment findOneById(int $id) Return the first ChildUnemployment filtered by the id column
 * @method     ChildUnemployment findOneByUnemploymentAdult(string $unemployment_adult) Return the first ChildUnemployment filtered by the unemployment_adult column
 * @method     ChildUnemployment findOneByUnemploymentYouth(string $unemployment_youth) Return the first ChildUnemployment filtered by the unemployment_youth column
 * @method     ChildUnemployment findOneByRegionId(string $region_id) Return the first ChildUnemployment filtered by the region_id column
 * @method     ChildUnemployment findOneByRegionName(string $region_name) Return the first ChildUnemployment filtered by the region_name column
 * @method     ChildUnemployment findOneByYear(int $year) Return the first ChildUnemployment filtered by the year column *

 * @method     ChildUnemployment requirePk($key, ConnectionInterface $con = null) Return the ChildUnemployment by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnemployment requireOne(ConnectionInterface $con = null) Return the first ChildUnemployment matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUnemployment requireOneById(int $id) Return the first ChildUnemployment filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnemployment requireOneByUnemploymentAdult(string $unemployment_adult) Return the first ChildUnemployment filtered by the unemployment_adult column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnemployment requireOneByUnemploymentYouth(string $unemployment_youth) Return the first ChildUnemployment filtered by the unemployment_youth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnemployment requireOneByRegionId(string $region_id) Return the first ChildUnemployment filtered by the region_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnemployment requireOneByRegionName(string $region_name) Return the first ChildUnemployment filtered by the region_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUnemployment requireOneByYear(int $year) Return the first ChildUnemployment filtered by the year column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUnemployment[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUnemployment objects based on current ModelCriteria
 * @method     ChildUnemployment[]|ObjectCollection findById(int $id) Return ChildUnemployment objects filtered by the id column
 * @method     ChildUnemployment[]|ObjectCollection findByUnemploymentAdult(string $unemployment_adult) Return ChildUnemployment objects filtered by the unemployment_adult column
 * @method     ChildUnemployment[]|ObjectCollection findByUnemploymentYouth(string $unemployment_youth) Return ChildUnemployment objects filtered by the unemployment_youth column
 * @method     ChildUnemployment[]|ObjectCollection findByRegionId(string $region_id) Return ChildUnemployment objects filtered by the region_id column
 * @method     ChildUnemployment[]|ObjectCollection findByRegionName(string $region_name) Return ChildUnemployment objects filtered by the region_name column
 * @method     ChildUnemployment[]|ObjectCollection findByYear(int $year) Return ChildUnemployment objects filtered by the year column
 * @method     ChildUnemployment[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UnemploymentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UnemploymentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Unemployment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUnemploymentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUnemploymentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUnemploymentQuery) {
            return $criteria;
        }
        $query = new ChildUnemploymentQuery();
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
     * @return ChildUnemployment|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UnemploymentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UnemploymentTableMap::DATABASE_NAME);
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
     * @return ChildUnemployment A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, unemployment_adult, unemployment_youth, region_id, region_name, year FROM unemployment WHERE id = :p0';
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
            /** @var ChildUnemployment $obj */
            $obj = new ChildUnemployment();
            $obj->hydrate($row);
            UnemploymentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUnemployment|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUnemploymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UnemploymentTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUnemploymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UnemploymentTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildUnemploymentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UnemploymentTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UnemploymentTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnemploymentTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the unemployment_adult column
     *
     * Example usage:
     * <code>
     * $query->filterByUnemploymentAdult(1234); // WHERE unemployment_adult = 1234
     * $query->filterByUnemploymentAdult(array(12, 34)); // WHERE unemployment_adult IN (12, 34)
     * $query->filterByUnemploymentAdult(array('min' => 12)); // WHERE unemployment_adult > 12
     * </code>
     *
     * @param     mixed $unemploymentAdult The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnemploymentQuery The current query, for fluid interface
     */
    public function filterByUnemploymentAdult($unemploymentAdult = null, $comparison = null)
    {
        if (is_array($unemploymentAdult)) {
            $useMinMax = false;
            if (isset($unemploymentAdult['min'])) {
                $this->addUsingAlias(UnemploymentTableMap::COL_UNEMPLOYMENT_ADULT, $unemploymentAdult['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unemploymentAdult['max'])) {
                $this->addUsingAlias(UnemploymentTableMap::COL_UNEMPLOYMENT_ADULT, $unemploymentAdult['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnemploymentTableMap::COL_UNEMPLOYMENT_ADULT, $unemploymentAdult, $comparison);
    }

    /**
     * Filter the query on the unemployment_youth column
     *
     * Example usage:
     * <code>
     * $query->filterByUnemploymentYouth(1234); // WHERE unemployment_youth = 1234
     * $query->filterByUnemploymentYouth(array(12, 34)); // WHERE unemployment_youth IN (12, 34)
     * $query->filterByUnemploymentYouth(array('min' => 12)); // WHERE unemployment_youth > 12
     * </code>
     *
     * @param     mixed $unemploymentYouth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnemploymentQuery The current query, for fluid interface
     */
    public function filterByUnemploymentYouth($unemploymentYouth = null, $comparison = null)
    {
        if (is_array($unemploymentYouth)) {
            $useMinMax = false;
            if (isset($unemploymentYouth['min'])) {
                $this->addUsingAlias(UnemploymentTableMap::COL_UNEMPLOYMENT_YOUTH, $unemploymentYouth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unemploymentYouth['max'])) {
                $this->addUsingAlias(UnemploymentTableMap::COL_UNEMPLOYMENT_YOUTH, $unemploymentYouth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnemploymentTableMap::COL_UNEMPLOYMENT_YOUTH, $unemploymentYouth, $comparison);
    }

    /**
     * Filter the query on the region_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionId('fooValue');   // WHERE region_id = 'fooValue'
     * $query->filterByRegionId('%fooValue%'); // WHERE region_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regionId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnemploymentQuery The current query, for fluid interface
     */
    public function filterByRegionId($regionId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regionId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regionId)) {
                $regionId = str_replace('*', '%', $regionId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnemploymentTableMap::COL_REGION_ID, $regionId, $comparison);
    }

    /**
     * Filter the query on the region_name column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionName('fooValue');   // WHERE region_name = 'fooValue'
     * $query->filterByRegionName('%fooValue%'); // WHERE region_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regionName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnemploymentQuery The current query, for fluid interface
     */
    public function filterByRegionName($regionName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regionName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regionName)) {
                $regionName = str_replace('*', '%', $regionName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnemploymentTableMap::COL_REGION_NAME, $regionName, $comparison);
    }

    /**
     * Filter the query on the year column
     *
     * Example usage:
     * <code>
     * $query->filterByYear(1234); // WHERE year = 1234
     * $query->filterByYear(array(12, 34)); // WHERE year IN (12, 34)
     * $query->filterByYear(array('min' => 12)); // WHERE year > 12
     * </code>
     *
     * @param     mixed $year The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUnemploymentQuery The current query, for fluid interface
     */
    public function filterByYear($year = null, $comparison = null)
    {
        if (is_array($year)) {
            $useMinMax = false;
            if (isset($year['min'])) {
                $this->addUsingAlias(UnemploymentTableMap::COL_YEAR, $year['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($year['max'])) {
                $this->addUsingAlias(UnemploymentTableMap::COL_YEAR, $year['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnemploymentTableMap::COL_YEAR, $year, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUnemployment $unemployment Object to remove from the list of results
     *
     * @return $this|ChildUnemploymentQuery The current query, for fluid interface
     */
    public function prune($unemployment = null)
    {
        if ($unemployment) {
            $this->addUsingAlias(UnemploymentTableMap::COL_ID, $unemployment->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the unemployment table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UnemploymentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UnemploymentTableMap::clearInstancePool();
            UnemploymentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UnemploymentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UnemploymentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UnemploymentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UnemploymentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UnemploymentQuery
