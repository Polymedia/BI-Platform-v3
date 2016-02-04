<?php

namespace Base;

use \Статусызаявкипросрочка as ChildСтатусызаявкипросрочка;
use \СтатусызаявкипросрочкаQuery as ChildСтатусызаявкипросрочкаQuery;
use \Exception;
use Map\СтатусызаявкипросрочкаTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'СтатусыЗаявкиПросрочка' table.
 *
 * 
 *
 * @method     ChildСтатусызаявкипросрочкаQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildСтатусызаявкипросрочкаQuery orderByСтатуспросрочки($order = Criteria::ASC) Order by the СтатусПросрочки column
 *
 * @method     ChildСтатусызаявкипросрочкаQuery groupById() Group by the id column
 * @method     ChildСтатусызаявкипросрочкаQuery groupByСтатуспросрочки() Group by the СтатусПросрочки column
 *
 * @method     ChildСтатусызаявкипросрочкаQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildСтатусызаявкипросрочкаQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildСтатусызаявкипросрочкаQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildСтатусызаявкипросрочкаQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildСтатусызаявкипросрочкаQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildСтатусызаявкипросрочкаQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildСтатусызаявкипросрочка findOne(ConnectionInterface $con = null) Return the first ChildСтатусызаявкипросрочка matching the query
 * @method     ChildСтатусызаявкипросрочка findOneOrCreate(ConnectionInterface $con = null) Return the first ChildСтатусызаявкипросрочка matching the query, or a new ChildСтатусызаявкипросрочка object populated from the query conditions when no match is found
 *
 * @method     ChildСтатусызаявкипросрочка findOneById(int $id) Return the first ChildСтатусызаявкипросрочка filtered by the id column
 * @method     ChildСтатусызаявкипросрочка findOneByСтатуспросрочки(string $СтатусПросрочки) Return the first ChildСтатусызаявкипросрочка filtered by the СтатусПросрочки column *

 * @method     ChildСтатусызаявкипросрочка requirePk($key, ConnectionInterface $con = null) Return the ChildСтатусызаявкипросрочка by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildСтатусызаявкипросрочка requireOne(ConnectionInterface $con = null) Return the first ChildСтатусызаявкипросрочка matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildСтатусызаявкипросрочка requireOneById(int $id) Return the first ChildСтатусызаявкипросрочка filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildСтатусызаявкипросрочка requireOneByСтатуспросрочки(string $СтатусПросрочки) Return the first ChildСтатусызаявкипросрочка filtered by the СтатусПросрочки column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildСтатусызаявкипросрочка[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildСтатусызаявкипросрочка objects based on current ModelCriteria
 * @method     ChildСтатусызаявкипросрочка[]|ObjectCollection findById(int $id) Return ChildСтатусызаявкипросрочка objects filtered by the id column
 * @method     ChildСтатусызаявкипросрочка[]|ObjectCollection findByСтатуспросрочки(string $СтатусПросрочки) Return ChildСтатусызаявкипросрочка objects filtered by the СтатусПросрочки column
 * @method     ChildСтатусызаявкипросрочка[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class СтатусызаявкипросрочкаQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\СтатусызаявкипросрочкаQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Статусызаявкипросрочка', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildСтатусызаявкипросрочкаQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildСтатусызаявкипросрочкаQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildСтатусызаявкипросрочкаQuery) {
            return $criteria;
        }
        $query = new ChildСтатусызаявкипросрочкаQuery();
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
     * @return ChildСтатусызаявкипросрочка|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Статусызаявкипросрочка object has no primary key');
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
        throw new LogicException('The Статусызаявкипросрочка object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildСтатусызаявкипросрочкаQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Статусызаявкипросрочка object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildСтатусызаявкипросрочкаQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Статусызаявкипросрочка object has no primary key');
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
     * @return $this|ChildСтатусызаявкипросрочкаQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(СтатусызаявкипросрочкаTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(СтатусызаявкипросрочкаTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(СтатусызаявкипросрочкаTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the СтатусПросрочки column
     *
     * Example usage:
     * <code>
     * $query->filterByСтатуспросрочки('fooValue');   // WHERE СтатусПросрочки = 'fooValue'
     * $query->filterByСтатуспросрочки('%fooValue%'); // WHERE СтатусПросрочки LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�татуспросрочки The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildСтатусызаявкипросрочкаQuery The current query, for fluid interface
     */
    public function filterByСтатуспросрочки($�татуспросрочки = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�татуспросрочки)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�татуспросрочки)) {
                $�татуспросрочки = str_replace('*', '%', $�татуспросрочки);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(СтатусызаявкипросрочкаTableMap::COL_СТАТУСПРОСРОЧКИ, $�татуспросрочки, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildСтатусызаявкипросрочка $�татусызаявкипросрочка Object to remove from the list of results
     *
     * @return $this|ChildСтатусызаявкипросрочкаQuery The current query, for fluid interface
     */
    public function prune($�татусызаявкипросрочка = null)
    {
        if ($�татусызаявкипросрочка) {
            throw new LogicException('Статусызаявкипросрочка object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the СтатусыЗаявкиПросрочка table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(СтатусызаявкипросрочкаTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            СтатусызаявкипросрочкаTableMap::clearInstancePool();
            СтатусызаявкипросрочкаTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(СтатусызаявкипросрочкаTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(СтатусызаявкипросрочкаTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            СтатусызаявкипросрочкаTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            СтатусызаявкипросрочкаTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // СтатусызаявкипросрочкаQuery
