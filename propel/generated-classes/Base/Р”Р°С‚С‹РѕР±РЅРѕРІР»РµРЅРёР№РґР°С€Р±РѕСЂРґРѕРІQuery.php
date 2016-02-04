<?php

namespace Base;

use \Датыобновленийдашбордов as ChildДатыобновленийдашбордов;
use \ДатыобновленийдашбордовQuery as ChildДатыобновленийдашбордовQuery;
use \Exception;
use \PDO;
use Map\ДатыобновленийдашбордовTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ДатыОбновленийДашбордов' table.
 *
 * 
 *
 * @method     ChildДатыобновленийдашбордовQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildДатыобновленийдашбордовQuery orderByДашборд($order = Criteria::ASC) Order by the Дашборд column
 * @method     ChildДатыобновленийдашбордовQuery orderByПроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildДатыобновленийдашбордовQuery orderByДата($order = Criteria::ASC) Order by the Дата column
 *
 * @method     ChildДатыобновленийдашбордовQuery groupById() Group by the id column
 * @method     ChildДатыобновленийдашбордовQuery groupByДашборд() Group by the Дашборд column
 * @method     ChildДатыобновленийдашбордовQuery groupByПроект() Group by the Проект column
 * @method     ChildДатыобновленийдашбордовQuery groupByДата() Group by the Дата column
 *
 * @method     ChildДатыобновленийдашбордовQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildДатыобновленийдашбордовQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildДатыобновленийдашбордовQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildДатыобновленийдашбордовQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildДатыобновленийдашбордовQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildДатыобновленийдашбордовQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildДатыобновленийдашбордов findOne(ConnectionInterface $con = null) Return the first ChildДатыобновленийдашбордов matching the query
 * @method     ChildДатыобновленийдашбордов findOneOrCreate(ConnectionInterface $con = null) Return the first ChildДатыобновленийдашбордов matching the query, or a new ChildДатыобновленийдашбордов object populated from the query conditions when no match is found
 *
 * @method     ChildДатыобновленийдашбордов findOneById(int $id) Return the first ChildДатыобновленийдашбордов filtered by the id column
 * @method     ChildДатыобновленийдашбордов findOneByДашборд(string $Дашборд) Return the first ChildДатыобновленийдашбордов filtered by the Дашборд column
 * @method     ChildДатыобновленийдашбордов findOneByПроект(int $Проект) Return the first ChildДатыобновленийдашбордов filtered by the Проект column
 * @method     ChildДатыобновленийдашбордов findOneByДата(string $Дата) Return the first ChildДатыобновленийдашбордов filtered by the Дата column *

 * @method     ChildДатыобновленийдашбордов requirePk($key, ConnectionInterface $con = null) Return the ChildДатыобновленийдашбордов by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildДатыобновленийдашбордов requireOne(ConnectionInterface $con = null) Return the first ChildДатыобновленийдашбордов matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildДатыобновленийдашбордов requireOneById(int $id) Return the first ChildДатыобновленийдашбордов filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildДатыобновленийдашбордов requireOneByДашборд(string $Дашборд) Return the first ChildДатыобновленийдашбордов filtered by the Дашборд column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildДатыобновленийдашбордов requireOneByПроект(int $Проект) Return the first ChildДатыобновленийдашбордов filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildДатыобновленийдашбордов requireOneByДата(string $Дата) Return the first ChildДатыобновленийдашбордов filtered by the Дата column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildДатыобновленийдашбордов[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildДатыобновленийдашбордов objects based on current ModelCriteria
 * @method     ChildДатыобновленийдашбордов[]|ObjectCollection findById(int $id) Return ChildДатыобновленийдашбордов objects filtered by the id column
 * @method     ChildДатыобновленийдашбордов[]|ObjectCollection findByДашборд(string $Дашборд) Return ChildДатыобновленийдашбордов objects filtered by the Дашборд column
 * @method     ChildДатыобновленийдашбордов[]|ObjectCollection findByПроект(int $Проект) Return ChildДатыобновленийдашбордов objects filtered by the Проект column
 * @method     ChildДатыобновленийдашбордов[]|ObjectCollection findByДата(string $Дата) Return ChildДатыобновленийдашбордов objects filtered by the Дата column
 * @method     ChildДатыобновленийдашбордов[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ДатыобновленийдашбордовQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ДатыобновленийдашбордовQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Датыобновленийдашбордов', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildДатыобновленийдашбордовQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildДатыобновленийдашбордовQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildДатыобновленийдашбордовQuery) {
            return $criteria;
        }
        $query = new ChildДатыобновленийдашбордовQuery();
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
     * @return ChildДатыобновленийдашбордов|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ДатыобновленийдашбордовTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ДатыобновленийдашбордовTableMap::DATABASE_NAME);
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
     * @return ChildДатыобновленийдашбордов A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Дашборд, Проект, Дата FROM ДатыОбновленийДашбордов WHERE id = :p0';
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
            /** @var ChildДатыобновленийдашбордов $obj */
            $obj = new ChildДатыобновленийдашбордов();
            $obj->hydrate($row);
            ДатыобновленийдашбордовTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildДатыобновленийдашбордов|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildДатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildДатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildДатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Дашборд column
     *
     * Example usage:
     * <code>
     * $query->filterByДашборд('fooValue');   // WHERE Дашборд = 'fooValue'
     * $query->filterByДашборд('%fooValue%'); // WHERE Дашборд LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ашборд The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildДатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterByДашборд($�ашборд = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ашборд)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ашборд)) {
                $�ашборд = str_replace('*', '%', $�ашборд);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ДАШБОРД, $�ашборд, $comparison);
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
     * @return $this|ChildДатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterByПроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ПРОЕКТ, $�роект, $comparison);
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
     * @return $this|ChildДатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterByДата($�ата = null, $comparison = null)
    {
        if (is_array($�ата)) {
            $useMinMax = false;
            if (isset($�ата['min'])) {
                $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ДАТА, $�ата['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ата['max'])) {
                $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ДАТА, $�ата['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ДАТА, $�ата, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildДатыобновленийдашбордов $�атыобновленийдашбордов Object to remove from the list of results
     *
     * @return $this|ChildДатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function prune($�атыобновленийдашбордов = null)
    {
        if ($�атыобновленийдашбордов) {
            $this->addUsingAlias(ДатыобновленийдашбордовTableMap::COL_ID, $�атыобновленийдашбордов->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ДатыОбновленийДашбордов table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ДатыобновленийдашбордовTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ДатыобновленийдашбордовTableMap::clearInstancePool();
            ДатыобновленийдашбордовTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ДатыобновленийдашбордовTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ДатыобновленийдашбордовTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ДатыобновленийдашбордовTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ДатыобновленийдашбордовTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ДатыобновленийдашбордовQuery
