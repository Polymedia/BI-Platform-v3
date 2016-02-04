<?php

namespace Base;

use \Мтр as ChildМтр;
use \МтрQuery as ChildМтрQuery;
use \Exception;
use Map\МтрTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'МТР' table.
 *
 * 
 *
 * @method     ChildМтрQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildМтрQuery orderByVin($order = Criteria::ASC) Order by the VIN column
 * @method     ChildМтрQuery orderByТиптехники($order = Criteria::ASC) Order by the ТипТехники column
 * @method     ChildМтрQuery orderByДата($order = Criteria::ASC) Order by the Дата column
 * @method     ChildМтрQuery orderByСостояниетехники($order = Criteria::ASC) Order by the СостояниеТехники column
 * @method     ChildМтрQuery orderByПодрядчик($order = Criteria::ASC) Order by the Подрядчик column
 * @method     ChildМтрQuery orderByПроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildМтрQuery orderByДатаотчёта($order = Criteria::ASC) Order by the ДатаОтчёта column
 *
 * @method     ChildМтрQuery groupById() Group by the id column
 * @method     ChildМтрQuery groupByVin() Group by the VIN column
 * @method     ChildМтрQuery groupByТиптехники() Group by the ТипТехники column
 * @method     ChildМтрQuery groupByДата() Group by the Дата column
 * @method     ChildМтрQuery groupByСостояниетехники() Group by the СостояниеТехники column
 * @method     ChildМтрQuery groupByПодрядчик() Group by the Подрядчик column
 * @method     ChildМтрQuery groupByПроект() Group by the Проект column
 * @method     ChildМтрQuery groupByДатаотчёта() Group by the ДатаОтчёта column
 *
 * @method     ChildМтрQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildМтрQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildМтрQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildМтрQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildМтрQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildМтрQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildМтр findOne(ConnectionInterface $con = null) Return the first ChildМтр matching the query
 * @method     ChildМтр findOneOrCreate(ConnectionInterface $con = null) Return the first ChildМтр matching the query, or a new ChildМтр object populated from the query conditions when no match is found
 *
 * @method     ChildМтр findOneById(int $id) Return the first ChildМтр filtered by the id column
 * @method     ChildМтр findOneByVin(string $VIN) Return the first ChildМтр filtered by the VIN column
 * @method     ChildМтр findOneByТиптехники(int $ТипТехники) Return the first ChildМтр filtered by the ТипТехники column
 * @method     ChildМтр findOneByДата(string $Дата) Return the first ChildМтр filtered by the Дата column
 * @method     ChildМтр findOneByСостояниетехники(int $СостояниеТехники) Return the first ChildМтр filtered by the СостояниеТехники column
 * @method     ChildМтр findOneByПодрядчик(int $Подрядчик) Return the first ChildМтр filtered by the Подрядчик column
 * @method     ChildМтр findOneByПроект(int $Проект) Return the first ChildМтр filtered by the Проект column
 * @method     ChildМтр findOneByДатаотчёта(string $ДатаОтчёта) Return the first ChildМтр filtered by the ДатаОтчёта column *

 * @method     ChildМтр requirePk($key, ConnectionInterface $con = null) Return the ChildМтр by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМтр requireOne(ConnectionInterface $con = null) Return the first ChildМтр matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildМтр requireOneById(int $id) Return the first ChildМтр filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМтр requireOneByVin(string $VIN) Return the first ChildМтр filtered by the VIN column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМтр requireOneByТиптехники(int $ТипТехники) Return the first ChildМтр filtered by the ТипТехники column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМтр requireOneByДата(string $Дата) Return the first ChildМтр filtered by the Дата column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМтр requireOneByСостояниетехники(int $СостояниеТехники) Return the first ChildМтр filtered by the СостояниеТехники column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМтр requireOneByПодрядчик(int $Подрядчик) Return the first ChildМтр filtered by the Подрядчик column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМтр requireOneByПроект(int $Проект) Return the first ChildМтр filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМтр requireOneByДатаотчёта(string $ДатаОтчёта) Return the first ChildМтр filtered by the ДатаОтчёта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildМтр[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildМтр objects based on current ModelCriteria
 * @method     ChildМтр[]|ObjectCollection findById(int $id) Return ChildМтр objects filtered by the id column
 * @method     ChildМтр[]|ObjectCollection findByVin(string $VIN) Return ChildМтр objects filtered by the VIN column
 * @method     ChildМтр[]|ObjectCollection findByТиптехники(int $ТипТехники) Return ChildМтр objects filtered by the ТипТехники column
 * @method     ChildМтр[]|ObjectCollection findByДата(string $Дата) Return ChildМтр objects filtered by the Дата column
 * @method     ChildМтр[]|ObjectCollection findByСостояниетехники(int $СостояниеТехники) Return ChildМтр objects filtered by the СостояниеТехники column
 * @method     ChildМтр[]|ObjectCollection findByПодрядчик(int $Подрядчик) Return ChildМтр objects filtered by the Подрядчик column
 * @method     ChildМтр[]|ObjectCollection findByПроект(int $Проект) Return ChildМтр objects filtered by the Проект column
 * @method     ChildМтр[]|ObjectCollection findByДатаотчёта(string $ДатаОтчёта) Return ChildМтр objects filtered by the ДатаОтчёта column
 * @method     ChildМтр[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class МтрQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\МтрQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Мтр', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildМтрQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildМтрQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildМтрQuery) {
            return $criteria;
        }
        $query = new ChildМтрQuery();
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
     * @return ChildМтр|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Мтр object has no primary key');
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
        throw new LogicException('The Мтр object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildМтрQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Мтр object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildМтрQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Мтр object has no primary key');
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
     * @return $this|ChildМтрQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(МтрTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(МтрTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МтрTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the VIN column
     *
     * Example usage:
     * <code>
     * $query->filterByVin('fooValue');   // WHERE VIN = 'fooValue'
     * $query->filterByVin('%fooValue%'); // WHERE VIN LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМтрQuery The current query, for fluid interface
     */
    public function filterByVin($vin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $vin)) {
                $vin = str_replace('*', '%', $vin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(МтрTableMap::COL_VIN, $vin, $comparison);
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
     * @return $this|ChildМтрQuery The current query, for fluid interface
     */
    public function filterByТиптехники($�иптехники = null, $comparison = null)
    {
        if (is_array($�иптехники)) {
            $useMinMax = false;
            if (isset($�иптехники['min'])) {
                $this->addUsingAlias(МтрTableMap::COL_ТИПТЕХНИКИ, $�иптехники['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�иптехники['max'])) {
                $this->addUsingAlias(МтрTableMap::COL_ТИПТЕХНИКИ, $�иптехники['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МтрTableMap::COL_ТИПТЕХНИКИ, $�иптехники, $comparison);
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
     * @return $this|ChildМтрQuery The current query, for fluid interface
     */
    public function filterByДата($�ата = null, $comparison = null)
    {
        if (is_array($�ата)) {
            $useMinMax = false;
            if (isset($�ата['min'])) {
                $this->addUsingAlias(МтрTableMap::COL_ДАТА, $�ата['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ата['max'])) {
                $this->addUsingAlias(МтрTableMap::COL_ДАТА, $�ата['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МтрTableMap::COL_ДАТА, $�ата, $comparison);
    }

    /**
     * Filter the query on the СостояниеТехники column
     *
     * Example usage:
     * <code>
     * $query->filterByСостояниетехники(1234); // WHERE СостояниеТехники = 1234
     * $query->filterByСостояниетехники(array(12, 34)); // WHERE СостояниеТехники IN (12, 34)
     * $query->filterByСостояниетехники(array('min' => 12)); // WHERE СостояниеТехники > 12
     * </code>
     *
     * @param     mixed $�остояниетехники The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМтрQuery The current query, for fluid interface
     */
    public function filterByСостояниетехники($�остояниетехники = null, $comparison = null)
    {
        if (is_array($�остояниетехники)) {
            $useMinMax = false;
            if (isset($�остояниетехники['min'])) {
                $this->addUsingAlias(МтрTableMap::COL_СОСТОЯНИЕТЕХНИКИ, $�остояниетехники['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�остояниетехники['max'])) {
                $this->addUsingAlias(МтрTableMap::COL_СОСТОЯНИЕТЕХНИКИ, $�остояниетехники['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МтрTableMap::COL_СОСТОЯНИЕТЕХНИКИ, $�остояниетехники, $comparison);
    }

    /**
     * Filter the query on the Подрядчик column
     *
     * Example usage:
     * <code>
     * $query->filterByПодрядчик(1234); // WHERE Подрядчик = 1234
     * $query->filterByПодрядчик(array(12, 34)); // WHERE Подрядчик IN (12, 34)
     * $query->filterByПодрядчик(array('min' => 12)); // WHERE Подрядчик > 12
     * </code>
     *
     * @param     mixed $�одрядчик The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМтрQuery The current query, for fluid interface
     */
    public function filterByПодрядчик($�одрядчик = null, $comparison = null)
    {
        if (is_array($�одрядчик)) {
            $useMinMax = false;
            if (isset($�одрядчик['min'])) {
                $this->addUsingAlias(МтрTableMap::COL_ПОДРЯДЧИК, $�одрядчик['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�одрядчик['max'])) {
                $this->addUsingAlias(МтрTableMap::COL_ПОДРЯДЧИК, $�одрядчик['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МтрTableMap::COL_ПОДРЯДЧИК, $�одрядчик, $comparison);
    }

    /**
     * Filter the query on the Проект column
     *
     * Example usage:
     * <code>
     * $query->filterByПроект(1234); // WHERE Проект = 1234
     * $query->filterByПроект(array(12, 34)); // WHERE Проект IN (12, 34)
     * $query->filterByПроект(array('min' => 12)); // WHERE Проект > 12
     * </code>
     *
     * @param     mixed $�роект The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМтрQuery The current query, for fluid interface
     */
    public function filterByПроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(МтрTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(МтрTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МтрTableMap::COL_ПРОЕКТ, $�роект, $comparison);
    }

    /**
     * Filter the query on the ДатаОтчёта column
     *
     * Example usage:
     * <code>
     * $query->filterByДатаотчёта('2011-03-14'); // WHERE ДатаОтчёта = '2011-03-14'
     * $query->filterByДатаотчёта('now'); // WHERE ДатаОтчёта = '2011-03-14'
     * $query->filterByДатаотчёта(array('max' => 'yesterday')); // WHERE ДатаОтчёта > '2011-03-13'
     * </code>
     *
     * @param     mixed $�атаотчёта The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМтрQuery The current query, for fluid interface
     */
    public function filterByДатаотчёта($�атаотчёта = null, $comparison = null)
    {
        if (is_array($�атаотчёта)) {
            $useMinMax = false;
            if (isset($�атаотчёта['min'])) {
                $this->addUsingAlias(МтрTableMap::COL_ДАТАОТЧЁТА, $�атаотчёта['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�атаотчёта['max'])) {
                $this->addUsingAlias(МтрTableMap::COL_ДАТАОТЧЁТА, $�атаотчёта['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МтрTableMap::COL_ДАТАОТЧЁТА, $�атаотчёта, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildМтр $�тр Object to remove from the list of results
     *
     * @return $this|ChildМтрQuery The current query, for fluid interface
     */
    public function prune($�тр = null)
    {
        if ($�тр) {
            throw new LogicException('Мтр object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the МТР table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(МтрTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            МтрTableMap::clearInstancePool();
            МтрTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(МтрTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(МтрTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            МтрTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            МтрTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // МтрQuery
