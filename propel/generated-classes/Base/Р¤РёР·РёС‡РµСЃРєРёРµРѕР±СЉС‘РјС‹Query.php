<?php

namespace Base;

use \Физическиеобъёмы as ChildФизическиеобъёмы;
use \ФизическиеобъёмыQuery as ChildФизическиеобъёмыQuery;
use \Exception;
use Map\ФизическиеобъёмыTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ФизическиеОбъёмы' table.
 *
 * 
 *
 * @method     ChildФизическиеобъёмыQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildФизическиеобъёмыQuery orderByДата($order = Criteria::ASC) Order by the Дата column
 * @method     ChildФизическиеобъёмыQuery orderByУчастокработ($order = Criteria::ASC) Order by the УчастокРабот column
 * @method     ChildФизическиеобъёмыQuery orderByТипработ($order = Criteria::ASC) Order by the ТипРабот column
 * @method     ChildФизическиеобъёмыQuery orderByПлан($order = Criteria::ASC) Order by the План column
 * @method     ChildФизическиеобъёмыQuery orderByФакт($order = Criteria::ASC) Order by the Факт column
 * @method     ChildФизическиеобъёмыQuery orderByПричинаотставания($order = Criteria::ASC) Order by the ПричинаОтставания column
 *
 * @method     ChildФизическиеобъёмыQuery groupById() Group by the id column
 * @method     ChildФизическиеобъёмыQuery groupByДата() Group by the Дата column
 * @method     ChildФизическиеобъёмыQuery groupByУчастокработ() Group by the УчастокРабот column
 * @method     ChildФизическиеобъёмыQuery groupByТипработ() Group by the ТипРабот column
 * @method     ChildФизическиеобъёмыQuery groupByПлан() Group by the План column
 * @method     ChildФизическиеобъёмыQuery groupByФакт() Group by the Факт column
 * @method     ChildФизическиеобъёмыQuery groupByПричинаотставания() Group by the ПричинаОтставания column
 *
 * @method     ChildФизическиеобъёмыQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildФизическиеобъёмыQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildФизическиеобъёмыQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildФизическиеобъёмыQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildФизическиеобъёмыQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildФизическиеобъёмыQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildФизическиеобъёмы findOne(ConnectionInterface $con = null) Return the first ChildФизическиеобъёмы matching the query
 * @method     ChildФизическиеобъёмы findOneOrCreate(ConnectionInterface $con = null) Return the first ChildФизическиеобъёмы matching the query, or a new ChildФизическиеобъёмы object populated from the query conditions when no match is found
 *
 * @method     ChildФизическиеобъёмы findOneById(int $id) Return the first ChildФизическиеобъёмы filtered by the id column
 * @method     ChildФизическиеобъёмы findOneByДата(string $Дата) Return the first ChildФизическиеобъёмы filtered by the Дата column
 * @method     ChildФизическиеобъёмы findOneByУчастокработ(int $УчастокРабот) Return the first ChildФизическиеобъёмы filtered by the УчастокРабот column
 * @method     ChildФизическиеобъёмы findOneByТипработ(int $ТипРабот) Return the first ChildФизическиеобъёмы filtered by the ТипРабот column
 * @method     ChildФизическиеобъёмы findOneByПлан(double $План) Return the first ChildФизическиеобъёмы filtered by the План column
 * @method     ChildФизическиеобъёмы findOneByФакт(double $Факт) Return the first ChildФизическиеобъёмы filtered by the Факт column
 * @method     ChildФизическиеобъёмы findOneByПричинаотставания(string $ПричинаОтставания) Return the first ChildФизическиеобъёмы filtered by the ПричинаОтставания column *

 * @method     ChildФизическиеобъёмы requirePk($key, ConnectionInterface $con = null) Return the ChildФизическиеобъёмы by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildФизическиеобъёмы requireOne(ConnectionInterface $con = null) Return the first ChildФизическиеобъёмы matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildФизическиеобъёмы requireOneById(int $id) Return the first ChildФизическиеобъёмы filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildФизическиеобъёмы requireOneByДата(string $Дата) Return the first ChildФизическиеобъёмы filtered by the Дата column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildФизическиеобъёмы requireOneByУчастокработ(int $УчастокРабот) Return the first ChildФизическиеобъёмы filtered by the УчастокРабот column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildФизическиеобъёмы requireOneByТипработ(int $ТипРабот) Return the first ChildФизическиеобъёмы filtered by the ТипРабот column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildФизическиеобъёмы requireOneByПлан(double $План) Return the first ChildФизическиеобъёмы filtered by the План column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildФизическиеобъёмы requireOneByФакт(double $Факт) Return the first ChildФизическиеобъёмы filtered by the Факт column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildФизическиеобъёмы requireOneByПричинаотставания(string $ПричинаОтставания) Return the first ChildФизическиеобъёмы filtered by the ПричинаОтставания column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildФизическиеобъёмы[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildФизическиеобъёмы objects based on current ModelCriteria
 * @method     ChildФизическиеобъёмы[]|ObjectCollection findById(int $id) Return ChildФизическиеобъёмы objects filtered by the id column
 * @method     ChildФизическиеобъёмы[]|ObjectCollection findByДата(string $Дата) Return ChildФизическиеобъёмы objects filtered by the Дата column
 * @method     ChildФизическиеобъёмы[]|ObjectCollection findByУчастокработ(int $УчастокРабот) Return ChildФизическиеобъёмы objects filtered by the УчастокРабот column
 * @method     ChildФизическиеобъёмы[]|ObjectCollection findByТипработ(int $ТипРабот) Return ChildФизическиеобъёмы objects filtered by the ТипРабот column
 * @method     ChildФизическиеобъёмы[]|ObjectCollection findByПлан(double $План) Return ChildФизическиеобъёмы objects filtered by the План column
 * @method     ChildФизическиеобъёмы[]|ObjectCollection findByФакт(double $Факт) Return ChildФизическиеобъёмы objects filtered by the Факт column
 * @method     ChildФизическиеобъёмы[]|ObjectCollection findByПричинаотставания(string $ПричинаОтставания) Return ChildФизическиеобъёмы objects filtered by the ПричинаОтставания column
 * @method     ChildФизическиеобъёмы[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ФизическиеобъёмыQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ФизическиеобъёмыQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Физическиеобъёмы', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildФизическиеобъёмыQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildФизическиеобъёмыQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildФизическиеобъёмыQuery) {
            return $criteria;
        }
        $query = new ChildФизическиеобъёмыQuery();
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
     * @return ChildФизическиеобъёмы|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Физическиеобъёмы object has no primary key');
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
        throw new LogicException('The Физическиеобъёмы object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildФизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Физическиеобъёмы object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildФизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Физическиеобъёмы object has no primary key');
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
     * @return $this|ChildФизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildФизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByДата($�ата = null, $comparison = null)
    {
        if (is_array($�ата)) {
            $useMinMax = false;
            if (isset($�ата['min'])) {
                $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ДАТА, $�ата['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ата['max'])) {
                $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ДАТА, $�ата['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ДАТА, $�ата, $comparison);
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
     * @return $this|ChildФизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByУчастокработ($�частокработ = null, $comparison = null)
    {
        if (is_array($�частокработ)) {
            $useMinMax = false;
            if (isset($�частокработ['min'])) {
                $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_УЧАСТОКРАБОТ, $�частокработ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�частокработ['max'])) {
                $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_УЧАСТОКРАБОТ, $�частокработ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_УЧАСТОКРАБОТ, $�частокработ, $comparison);
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
     * @return $this|ChildФизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByТипработ($�ипработ = null, $comparison = null)
    {
        if (is_array($�ипработ)) {
            $useMinMax = false;
            if (isset($�ипработ['min'])) {
                $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ТИПРАБОТ, $�ипработ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ипработ['max'])) {
                $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ТИПРАБОТ, $�ипработ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ТИПРАБОТ, $�ипработ, $comparison);
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
     * @return $this|ChildФизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByПлан($�лан = null, $comparison = null)
    {
        if (is_array($�лан)) {
            $useMinMax = false;
            if (isset($�лан['min'])) {
                $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ПЛАН, $�лан['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�лан['max'])) {
                $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ПЛАН, $�лан['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ПЛАН, $�лан, $comparison);
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
     * @return $this|ChildФизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByФакт($�акт = null, $comparison = null)
    {
        if (is_array($�акт)) {
            $useMinMax = false;
            if (isset($�акт['min'])) {
                $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ФАКТ, $�акт['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�акт['max'])) {
                $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ФАКТ, $�акт['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ФАКТ, $�акт, $comparison);
    }

    /**
     * Filter the query on the ПричинаОтставания column
     *
     * Example usage:
     * <code>
     * $query->filterByПричинаотставания('fooValue');   // WHERE ПричинаОтставания = 'fooValue'
     * $query->filterByПричинаотставания('%fooValue%'); // WHERE ПричинаОтставания LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ричинаотставания The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildФизическиеобъёмыQuery The current query, for fluid interface
     */
    public function filterByПричинаотставания($�ричинаотставания = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ричинаотставания)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ричинаотставания)) {
                $�ричинаотставания = str_replace('*', '%', $�ричинаотставания);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ФизическиеобъёмыTableMap::COL_ПРИЧИНАОТСТАВАНИЯ, $�ричинаотставания, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildФизическиеобъёмы $�изическиеобъёмы Object to remove from the list of results
     *
     * @return $this|ChildФизическиеобъёмыQuery The current query, for fluid interface
     */
    public function prune($�изическиеобъёмы = null)
    {
        if ($�изическиеобъёмы) {
            throw new LogicException('Физическиеобъёмы object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ФизическиеОбъёмы table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ФизическиеобъёмыTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ФизическиеобъёмыTableMap::clearInstancePool();
            ФизическиеобъёмыTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ФизическиеобъёмыTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ФизическиеобъёмыTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ФизическиеобъёмыTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ФизическиеобъёмыTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ФизическиеобъёмыQuery
