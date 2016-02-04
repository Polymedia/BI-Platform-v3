<?php

namespace Base;

use \Производственныепрограммы as ChildПроизводственныепрограммы;
use \ПроизводственныепрограммыQuery as ChildПроизводственныепрограммыQuery;
use \Exception;
use Map\ПроизводственныепрограммыTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ПроизводственныеПрограммы' table.
 *
 * 
 *
 * @method     ChildПроизводственныепрограммыQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildПроизводственныепрограммыQuery orderByТиппрограммы($order = Criteria::ASC) Order by the ТипПрограммы column
 * @method     ChildПроизводственныепрограммыQuery orderByГод($order = Criteria::ASC) Order by the Год column
 * @method     ChildПроизводственныепрограммыQuery orderByМесяц($order = Criteria::ASC) Order by the Месяц column
 * @method     ChildПроизводственныепрограммыQuery orderByПлан($order = Criteria::ASC) Order by the План column
 * @method     ChildПроизводственныепрограммыQuery orderByФакт($order = Criteria::ASC) Order by the Факт column
 *
 * @method     ChildПроизводственныепрограммыQuery groupById() Group by the id column
 * @method     ChildПроизводственныепрограммыQuery groupByТиппрограммы() Group by the ТипПрограммы column
 * @method     ChildПроизводственныепрограммыQuery groupByГод() Group by the Год column
 * @method     ChildПроизводственныепрограммыQuery groupByМесяц() Group by the Месяц column
 * @method     ChildПроизводственныепрограммыQuery groupByПлан() Group by the План column
 * @method     ChildПроизводственныепрограммыQuery groupByФакт() Group by the Факт column
 *
 * @method     ChildПроизводственныепрограммыQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildПроизводственныепрограммыQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildПроизводственныепрограммыQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildПроизводственныепрограммыQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildПроизводственныепрограммыQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildПроизводственныепрограммыQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildПроизводственныепрограммы findOne(ConnectionInterface $con = null) Return the first ChildПроизводственныепрограммы matching the query
 * @method     ChildПроизводственныепрограммы findOneOrCreate(ConnectionInterface $con = null) Return the first ChildПроизводственныепрограммы matching the query, or a new ChildПроизводственныепрограммы object populated from the query conditions when no match is found
 *
 * @method     ChildПроизводственныепрограммы findOneById(int $id) Return the first ChildПроизводственныепрограммы filtered by the id column
 * @method     ChildПроизводственныепрограммы findOneByТиппрограммы(int $ТипПрограммы) Return the first ChildПроизводственныепрограммы filtered by the ТипПрограммы column
 * @method     ChildПроизводственныепрограммы findOneByГод(int $Год) Return the first ChildПроизводственныепрограммы filtered by the Год column
 * @method     ChildПроизводственныепрограммы findOneByМесяц(int $Месяц) Return the first ChildПроизводственныепрограммы filtered by the Месяц column
 * @method     ChildПроизводственныепрограммы findOneByПлан(int $План) Return the first ChildПроизводственныепрограммы filtered by the План column
 * @method     ChildПроизводственныепрограммы findOneByФакт(int $Факт) Return the first ChildПроизводственныепрограммы filtered by the Факт column *

 * @method     ChildПроизводственныепрограммы requirePk($key, ConnectionInterface $con = null) Return the ChildПроизводственныепрограммы by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроизводственныепрограммы requireOne(ConnectionInterface $con = null) Return the first ChildПроизводственныепрограммы matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildПроизводственныепрограммы requireOneById(int $id) Return the first ChildПроизводственныепрограммы filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроизводственныепрограммы requireOneByТиппрограммы(int $ТипПрограммы) Return the first ChildПроизводственныепрограммы filtered by the ТипПрограммы column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроизводственныепрограммы requireOneByГод(int $Год) Return the first ChildПроизводственныепрограммы filtered by the Год column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроизводственныепрограммы requireOneByМесяц(int $Месяц) Return the first ChildПроизводственныепрограммы filtered by the Месяц column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроизводственныепрограммы requireOneByПлан(int $План) Return the first ChildПроизводственныепрограммы filtered by the План column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроизводственныепрограммы requireOneByФакт(int $Факт) Return the first ChildПроизводственныепрограммы filtered by the Факт column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildПроизводственныепрограммы[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildПроизводственныепрограммы objects based on current ModelCriteria
 * @method     ChildПроизводственныепрограммы[]|ObjectCollection findById(int $id) Return ChildПроизводственныепрограммы objects filtered by the id column
 * @method     ChildПроизводственныепрограммы[]|ObjectCollection findByТиппрограммы(int $ТипПрограммы) Return ChildПроизводственныепрограммы objects filtered by the ТипПрограммы column
 * @method     ChildПроизводственныепрограммы[]|ObjectCollection findByГод(int $Год) Return ChildПроизводственныепрограммы objects filtered by the Год column
 * @method     ChildПроизводственныепрограммы[]|ObjectCollection findByМесяц(int $Месяц) Return ChildПроизводственныепрограммы objects filtered by the Месяц column
 * @method     ChildПроизводственныепрограммы[]|ObjectCollection findByПлан(int $План) Return ChildПроизводственныепрограммы objects filtered by the План column
 * @method     ChildПроизводственныепрограммы[]|ObjectCollection findByФакт(int $Факт) Return ChildПроизводственныепрограммы objects filtered by the Факт column
 * @method     ChildПроизводственныепрограммы[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ПроизводственныепрограммыQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ПроизводственныепрограммыQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Производственныепрограммы', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildПроизводственныепрограммыQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildПроизводственныепрограммыQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildПроизводственныепрограммыQuery) {
            return $criteria;
        }
        $query = new ChildПроизводственныепрограммыQuery();
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
     * @return ChildПроизводственныепрограммы|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Производственныепрограммы object has no primary key');
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
        throw new LogicException('The Производственныепрограммы object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildПроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Производственныепрограммы object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildПроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Производственныепрограммы object has no primary key');
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
     * @return $this|ChildПроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the ТипПрограммы column
     *
     * Example usage:
     * <code>
     * $query->filterByТиппрограммы(1234); // WHERE ТипПрограммы = 1234
     * $query->filterByТиппрограммы(array(12, 34)); // WHERE ТипПрограммы IN (12, 34)
     * $query->filterByТиппрограммы(array('min' => 12)); // WHERE ТипПрограммы > 12
     * </code>
     *
     * @param     mixed $�иппрограммы The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByТиппрограммы($�иппрограммы = null, $comparison = null)
    {
        if (is_array($�иппрограммы)) {
            $useMinMax = false;
            if (isset($�иппрограммы['min'])) {
                $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ТИППРОГРАММЫ, $�иппрограммы['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�иппрограммы['max'])) {
                $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ТИППРОГРАММЫ, $�иппрограммы['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ТИППРОГРАММЫ, $�иппрограммы, $comparison);
    }

    /**
     * Filter the query on the Год column
     *
     * Example usage:
     * <code>
     * $query->filterByГод(1234); // WHERE Год = 1234
     * $query->filterByГод(array(12, 34)); // WHERE Год IN (12, 34)
     * $query->filterByГод(array('min' => 12)); // WHERE Год > 12
     * </code>
     *
     * @param     mixed $�од The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByГод($�од = null, $comparison = null)
    {
        if (is_array($�од)) {
            $useMinMax = false;
            if (isset($�од['min'])) {
                $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ГОД, $�од['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�од['max'])) {
                $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ГОД, $�од['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ГОД, $�од, $comparison);
    }

    /**
     * Filter the query on the Месяц column
     *
     * Example usage:
     * <code>
     * $query->filterByМесяц(1234); // WHERE Месяц = 1234
     * $query->filterByМесяц(array(12, 34)); // WHERE Месяц IN (12, 34)
     * $query->filterByМесяц(array('min' => 12)); // WHERE Месяц > 12
     * </code>
     *
     * @param     mixed $�есяц The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByМесяц($�есяц = null, $comparison = null)
    {
        if (is_array($�есяц)) {
            $useMinMax = false;
            if (isset($�есяц['min'])) {
                $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_МЕСЯЦ, $�есяц['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�есяц['max'])) {
                $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_МЕСЯЦ, $�есяц['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_МЕСЯЦ, $�есяц, $comparison);
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
     * @return $this|ChildПроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByПлан($�лан = null, $comparison = null)
    {
        if (is_array($�лан)) {
            $useMinMax = false;
            if (isset($�лан['min'])) {
                $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ПЛАН, $�лан['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�лан['max'])) {
                $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ПЛАН, $�лан['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ПЛАН, $�лан, $comparison);
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
     * @return $this|ChildПроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function filterByФакт($�акт = null, $comparison = null)
    {
        if (is_array($�акт)) {
            $useMinMax = false;
            if (isset($�акт['min'])) {
                $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ФАКТ, $�акт['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�акт['max'])) {
                $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ФАКТ, $�акт['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПроизводственныепрограммыTableMap::COL_ФАКТ, $�акт, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildПроизводственныепрограммы $�роизводственныепрограммы Object to remove from the list of results
     *
     * @return $this|ChildПроизводственныепрограммыQuery The current query, for fluid interface
     */
    public function prune($�роизводственныепрограммы = null)
    {
        if ($�роизводственныепрограммы) {
            throw new LogicException('Производственныепрограммы object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ПроизводственныеПрограммы table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ПроизводственныепрограммыTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ПроизводственныепрограммыTableMap::clearInstancePool();
            ПроизводственныепрограммыTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ПроизводственныепрограммыTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ПроизводственныепрограммыTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ПроизводственныепрограммыTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ПроизводственныепрограммыTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ПроизводственныепрограммыQuery
