<?php

namespace Base;

use \Типыработ as ChildТипыработ;
use \ТипыработQuery as ChildТипыработQuery;
use \Exception;
use Map\ТипыработTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ТипыРабот' table.
 *
 * 
 *
 * @method     ChildТипыработQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildТипыработQuery orderByТипработ($order = Criteria::ASC) Order by the ТипРабот column
 * @method     ChildТипыработQuery orderByЕдиницыизмерения($order = Criteria::ASC) Order by the ЕдиницыИзмерения column
 * @method     ChildТипыработQuery orderByОтображение($order = Criteria::ASC) Order by the Отображение column
 *
 * @method     ChildТипыработQuery groupById() Group by the id column
 * @method     ChildТипыработQuery groupByТипработ() Group by the ТипРабот column
 * @method     ChildТипыработQuery groupByЕдиницыизмерения() Group by the ЕдиницыИзмерения column
 * @method     ChildТипыработQuery groupByОтображение() Group by the Отображение column
 *
 * @method     ChildТипыработQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildТипыработQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildТипыработQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildТипыработQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildТипыработQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildТипыработQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildТипыработ findOne(ConnectionInterface $con = null) Return the first ChildТипыработ matching the query
 * @method     ChildТипыработ findOneOrCreate(ConnectionInterface $con = null) Return the first ChildТипыработ matching the query, or a new ChildТипыработ object populated from the query conditions when no match is found
 *
 * @method     ChildТипыработ findOneById(int $id) Return the first ChildТипыработ filtered by the id column
 * @method     ChildТипыработ findOneByТипработ(string $ТипРабот) Return the first ChildТипыработ filtered by the ТипРабот column
 * @method     ChildТипыработ findOneByЕдиницыизмерения(string $ЕдиницыИзмерения) Return the first ChildТипыработ filtered by the ЕдиницыИзмерения column
 * @method     ChildТипыработ findOneByОтображение(boolean $Отображение) Return the first ChildТипыработ filtered by the Отображение column *

 * @method     ChildТипыработ requirePk($key, ConnectionInterface $con = null) Return the ChildТипыработ by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildТипыработ requireOne(ConnectionInterface $con = null) Return the first ChildТипыработ matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildТипыработ requireOneById(int $id) Return the first ChildТипыработ filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildТипыработ requireOneByТипработ(string $ТипРабот) Return the first ChildТипыработ filtered by the ТипРабот column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildТипыработ requireOneByЕдиницыизмерения(string $ЕдиницыИзмерения) Return the first ChildТипыработ filtered by the ЕдиницыИзмерения column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildТипыработ requireOneByОтображение(boolean $Отображение) Return the first ChildТипыработ filtered by the Отображение column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildТипыработ[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildТипыработ objects based on current ModelCriteria
 * @method     ChildТипыработ[]|ObjectCollection findById(int $id) Return ChildТипыработ objects filtered by the id column
 * @method     ChildТипыработ[]|ObjectCollection findByТипработ(string $ТипРабот) Return ChildТипыработ objects filtered by the ТипРабот column
 * @method     ChildТипыработ[]|ObjectCollection findByЕдиницыизмерения(string $ЕдиницыИзмерения) Return ChildТипыработ objects filtered by the ЕдиницыИзмерения column
 * @method     ChildТипыработ[]|ObjectCollection findByОтображение(boolean $Отображение) Return ChildТипыработ objects filtered by the Отображение column
 * @method     ChildТипыработ[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ТипыработQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ТипыработQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Типыработ', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildТипыработQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildТипыработQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildТипыработQuery) {
            return $criteria;
        }
        $query = new ChildТипыработQuery();
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
     * @return ChildТипыработ|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Типыработ object has no primary key');
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
        throw new LogicException('The Типыработ object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildТипыработQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Типыработ object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildТипыработQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Типыработ object has no primary key');
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
     * @return $this|ChildТипыработQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ТипыработTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ТипыработTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ТипыработTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the ТипРабот column
     *
     * Example usage:
     * <code>
     * $query->filterByТипработ('fooValue');   // WHERE ТипРабот = 'fooValue'
     * $query->filterByТипработ('%fooValue%'); // WHERE ТипРабот LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ипработ The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildТипыработQuery The current query, for fluid interface
     */
    public function filterByТипработ($�ипработ = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ипработ)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ипработ)) {
                $�ипработ = str_replace('*', '%', $�ипработ);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ТипыработTableMap::COL_ТИПРАБОТ, $�ипработ, $comparison);
    }

    /**
     * Filter the query on the ЕдиницыИзмерения column
     *
     * Example usage:
     * <code>
     * $query->filterByЕдиницыизмерения('fooValue');   // WHERE ЕдиницыИзмерения = 'fooValue'
     * $query->filterByЕдиницыизмерения('%fooValue%'); // WHERE ЕдиницыИзмерения LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�диницыизмерения The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildТипыработQuery The current query, for fluid interface
     */
    public function filterByЕдиницыизмерения($�диницыизмерения = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�диницыизмерения)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�диницыизмерения)) {
                $�диницыизмерения = str_replace('*', '%', $�диницыизмерения);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ТипыработTableMap::COL_ЕДИНИЦЫИЗМЕРЕНИЯ, $�диницыизмерения, $comparison);
    }

    /**
     * Filter the query on the Отображение column
     *
     * Example usage:
     * <code>
     * $query->filterByОтображение(true); // WHERE Отображение = true
     * $query->filterByОтображение('yes'); // WHERE Отображение = true
     * </code>
     *
     * @param     boolean|string $�тображение The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildТипыработQuery The current query, for fluid interface
     */
    public function filterByОтображение($�тображение = null, $comparison = null)
    {
        if (is_string($�тображение)) {
            $�тображение = in_array(strtolower($�тображение), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ТипыработTableMap::COL_ОТОБРАЖЕНИЕ, $�тображение, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildТипыработ $�ипыработ Object to remove from the list of results
     *
     * @return $this|ChildТипыработQuery The current query, for fluid interface
     */
    public function prune($�ипыработ = null)
    {
        if ($�ипыработ) {
            throw new LogicException('Типыработ object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ТипыРабот table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ТипыработTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ТипыработTableMap::clearInstancePool();
            ТипыработTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ТипыработTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ТипыработTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ТипыработTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ТипыработTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ТипыработQuery
