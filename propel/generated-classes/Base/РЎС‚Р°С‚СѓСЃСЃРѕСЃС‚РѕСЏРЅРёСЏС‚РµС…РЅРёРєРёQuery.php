<?php

namespace Base;

use \Статуссостояниятехники as ChildСтатуссостояниятехники;
use \СтатуссостояниятехникиQuery as ChildСтатуссостояниятехникиQuery;
use \Exception;
use Map\СтатуссостояниятехникиTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'СтатусСостоянияТехники' table.
 *
 * 
 *
 * @method     ChildСтатуссостояниятехникиQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildСтатуссостояниятехникиQuery orderByСтатус($order = Criteria::ASC) Order by the Статус column
 *
 * @method     ChildСтатуссостояниятехникиQuery groupById() Group by the id column
 * @method     ChildСтатуссостояниятехникиQuery groupByСтатус() Group by the Статус column
 *
 * @method     ChildСтатуссостояниятехникиQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildСтатуссостояниятехникиQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildСтатуссостояниятехникиQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildСтатуссостояниятехникиQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildСтатуссостояниятехникиQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildСтатуссостояниятехникиQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildСтатуссостояниятехники findOne(ConnectionInterface $con = null) Return the first ChildСтатуссостояниятехники matching the query
 * @method     ChildСтатуссостояниятехники findOneOrCreate(ConnectionInterface $con = null) Return the first ChildСтатуссостояниятехники matching the query, or a new ChildСтатуссостояниятехники object populated from the query conditions when no match is found
 *
 * @method     ChildСтатуссостояниятехники findOneById(int $id) Return the first ChildСтатуссостояниятехники filtered by the id column
 * @method     ChildСтатуссостояниятехники findOneByСтатус(string $Статус) Return the first ChildСтатуссостояниятехники filtered by the Статус column *

 * @method     ChildСтатуссостояниятехники requirePk($key, ConnectionInterface $con = null) Return the ChildСтатуссостояниятехники by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildСтатуссостояниятехники requireOne(ConnectionInterface $con = null) Return the first ChildСтатуссостояниятехники matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildСтатуссостояниятехники requireOneById(int $id) Return the first ChildСтатуссостояниятехники filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildСтатуссостояниятехники requireOneByСтатус(string $Статус) Return the first ChildСтатуссостояниятехники filtered by the Статус column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildСтатуссостояниятехники[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildСтатуссостояниятехники objects based on current ModelCriteria
 * @method     ChildСтатуссостояниятехники[]|ObjectCollection findById(int $id) Return ChildСтатуссостояниятехники objects filtered by the id column
 * @method     ChildСтатуссостояниятехники[]|ObjectCollection findByСтатус(string $Статус) Return ChildСтатуссостояниятехники objects filtered by the Статус column
 * @method     ChildСтатуссостояниятехники[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class СтатуссостояниятехникиQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\СтатуссостояниятехникиQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Статуссостояниятехники', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildСтатуссостояниятехникиQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildСтатуссостояниятехникиQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildСтатуссостояниятехникиQuery) {
            return $criteria;
        }
        $query = new ChildСтатуссостояниятехникиQuery();
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
     * @return ChildСтатуссостояниятехники|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Статуссостояниятехники object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Статуссостояниятехники object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildСтатуссостояниятехникиQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Статуссостояниятехники object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildСтатуссостояниятехникиQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Статуссостояниятехники object has no primary key');
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
     * @return $this|ChildСтатуссостояниятехникиQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(СтатуссостояниятехникиTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(СтатуссостояниятехникиTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(СтатуссостояниятехникиTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Статус column
     *
     * Example usage:
     * <code>
     * $query->filterByСтатус('fooValue');   // WHERE Статус = 'fooValue'
     * $query->filterByСтатус('%fooValue%'); // WHERE Статус LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�татус The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildСтатуссостояниятехникиQuery The current query, for fluid interface
     */
    public function filterByСтатус($�татус = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�татус)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�татус)) {
                $�татус = str_replace('*', '%', $�татус);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(СтатуссостояниятехникиTableMap::COL_СТАТУС, $�татус, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildСтатуссостояниятехники $�татуссостояниятехники Object to remove from the list of results
     *
     * @return $this|ChildСтатуссостояниятехникиQuery The current query, for fluid interface
     */
    public function prune($�татуссостояниятехники = null)
    {
        if ($�татуссостояниятехники) {
            throw new LogicException('Статуссостояниятехники object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the СтатусСостоянияТехники table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(СтатуссостояниятехникиTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            СтатуссостояниятехникиTableMap::clearInstancePool();
            СтатуссостояниятехникиTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(СтатуссостояниятехникиTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(СтатуссостояниятехникиTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            СтатуссостояниятехникиTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            СтатуссостояниятехникиTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // СтатуссостояниятехникиQuery
