<?php

namespace Base;

use \Днинедели as ChildДнинедели;
use \ДнинеделиQuery as ChildДнинеделиQuery;
use \Exception;
use \PDO;
use Map\ДнинеделиTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ДниНедели' table.
 *
 * 
 *
 * @method     ChildДнинеделиQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildДнинеделиQuery orderByДеньнедели($order = Criteria::ASC) Order by the ДеньНедели column
 *
 * @method     ChildДнинеделиQuery groupById() Group by the id column
 * @method     ChildДнинеделиQuery groupByДеньнедели() Group by the ДеньНедели column
 *
 * @method     ChildДнинеделиQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildДнинеделиQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildДнинеделиQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildДнинеделиQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildДнинеделиQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildДнинеделиQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildДнинедели findOne(ConnectionInterface $con = null) Return the first ChildДнинедели matching the query
 * @method     ChildДнинедели findOneOrCreate(ConnectionInterface $con = null) Return the first ChildДнинедели matching the query, or a new ChildДнинедели object populated from the query conditions when no match is found
 *
 * @method     ChildДнинедели findOneById(int $id) Return the first ChildДнинедели filtered by the id column
 * @method     ChildДнинедели findOneByДеньнедели(string $ДеньНедели) Return the first ChildДнинедели filtered by the ДеньНедели column *

 * @method     ChildДнинедели requirePk($key, ConnectionInterface $con = null) Return the ChildДнинедели by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildДнинедели requireOne(ConnectionInterface $con = null) Return the first ChildДнинедели matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildДнинедели requireOneById(int $id) Return the first ChildДнинедели filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildДнинедели requireOneByДеньнедели(string $ДеньНедели) Return the first ChildДнинедели filtered by the ДеньНедели column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildДнинедели[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildДнинедели objects based on current ModelCriteria
 * @method     ChildДнинедели[]|ObjectCollection findById(int $id) Return ChildДнинедели objects filtered by the id column
 * @method     ChildДнинедели[]|ObjectCollection findByДеньнедели(string $ДеньНедели) Return ChildДнинедели objects filtered by the ДеньНедели column
 * @method     ChildДнинедели[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ДнинеделиQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ДнинеделиQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Днинедели', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildДнинеделиQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildДнинеделиQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildДнинеделиQuery) {
            return $criteria;
        }
        $query = new ChildДнинеделиQuery();
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
     * @return ChildДнинедели|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ДнинеделиTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ДнинеделиTableMap::DATABASE_NAME);
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
     * @return ChildДнинедели A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ДеньНедели FROM ДниНедели WHERE id = :p0';
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
            /** @var ChildДнинедели $obj */
            $obj = new ChildДнинедели();
            $obj->hydrate($row);
            ДнинеделиTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildДнинедели|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildДнинеделиQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ДнинеделиTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildДнинеделиQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ДнинеделиTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildДнинеделиQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ДнинеделиTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ДнинеделиTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ДнинеделиTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the ДеньНедели column
     *
     * Example usage:
     * <code>
     * $query->filterByДеньнедели('fooValue');   // WHERE ДеньНедели = 'fooValue'
     * $query->filterByДеньнедели('%fooValue%'); // WHERE ДеньНедели LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�еньнедели The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildДнинеделиQuery The current query, for fluid interface
     */
    public function filterByДеньнедели($�еньнедели = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�еньнедели)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�еньнедели)) {
                $�еньнедели = str_replace('*', '%', $�еньнедели);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ДнинеделиTableMap::COL_ДЕНЬНЕДЕЛИ, $�еньнедели, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildДнинедели $�нинедели Object to remove from the list of results
     *
     * @return $this|ChildДнинеделиQuery The current query, for fluid interface
     */
    public function prune($�нинедели = null)
    {
        if ($�нинедели) {
            $this->addUsingAlias(ДнинеделиTableMap::COL_ID, $�нинедели->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ДниНедели table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ДнинеделиTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ДнинеделиTableMap::clearInstancePool();
            ДнинеделиTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ДнинеделиTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ДнинеделиTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ДнинеделиTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ДнинеделиTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ДнинеделиQuery
