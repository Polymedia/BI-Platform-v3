<?php

namespace Base;

use \подрядчикимтр as Childподрядчикимтр;
use \подрядчикимтрQuery as ChildподрядчикимтрQuery;
use \Exception;
use \PDO;
use Map\подрядчикимтрTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Подрядчики_МТР' table.
 *
 * 
 *
 * @method     ChildподрядчикимтрQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildподрядчикимтрQuery orderByподрядчик($order = Criteria::ASC) Order by the Подрядчик column
 *
 * @method     ChildподрядчикимтрQuery groupById() Group by the id column
 * @method     ChildподрядчикимтрQuery groupByподрядчик() Group by the Подрядчик column
 *
 * @method     ChildподрядчикимтрQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildподрядчикимтрQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildподрядчикимтрQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildподрядчикимтрQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildподрядчикимтрQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildподрядчикимтрQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildподрядчикимтрQuery leftJoinмтр($relationAlias = null) Adds a LEFT JOIN clause to the query using the мтр relation
 * @method     ChildподрядчикимтрQuery rightJoinмтр($relationAlias = null) Adds a RIGHT JOIN clause to the query using the мтр relation
 * @method     ChildподрядчикимтрQuery innerJoinмтр($relationAlias = null) Adds a INNER JOIN clause to the query using the мтр relation
 *
 * @method     ChildподрядчикимтрQuery joinWithмтр($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the мтр relation
 *
 * @method     ChildподрядчикимтрQuery leftJoinWithмтр() Adds a LEFT JOIN clause and with to the query using the мтр relation
 * @method     ChildподрядчикимтрQuery rightJoinWithмтр() Adds a RIGHT JOIN clause and with to the query using the мтр relation
 * @method     ChildподрядчикимтрQuery innerJoinWithмтр() Adds a INNER JOIN clause and with to the query using the мтр relation
 *
 * @method     \мтрQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childподрядчикимтр findOne(ConnectionInterface $con = null) Return the first Childподрядчикимтр matching the query
 * @method     Childподрядчикимтр findOneOrCreate(ConnectionInterface $con = null) Return the first Childподрядчикимтр matching the query, or a new Childподрядчикимтр object populated from the query conditions when no match is found
 *
 * @method     Childподрядчикимтр findOneById(int $id) Return the first Childподрядчикимтр filtered by the id column
 * @method     Childподрядчикимтр findOneByподрядчик(string $Подрядчик) Return the first Childподрядчикимтр filtered by the Подрядчик column *

 * @method     Childподрядчикимтр requirePk($key, ConnectionInterface $con = null) Return the Childподрядчикимтр by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childподрядчикимтр requireOne(ConnectionInterface $con = null) Return the first Childподрядчикимтр matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childподрядчикимтр requireOneById(int $id) Return the first Childподрядчикимтр filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childподрядчикимтр requireOneByподрядчик(string $Подрядчик) Return the first Childподрядчикимтр filtered by the Подрядчик column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childподрядчикимтр[]|ObjectCollection find(ConnectionInterface $con = null) Return Childподрядчикимтр objects based on current ModelCriteria
 * @method     Childподрядчикимтр[]|ObjectCollection findById(int $id) Return Childподрядчикимтр objects filtered by the id column
 * @method     Childподрядчикимтр[]|ObjectCollection findByподрядчик(string $Подрядчик) Return Childподрядчикимтр objects filtered by the Подрядчик column
 * @method     Childподрядчикимтр[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class подрядчикимтрQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\подрядчикимтрQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\подрядчикимтр', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildподрядчикимтрQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildподрядчикимтрQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildподрядчикимтрQuery) {
            return $criteria;
        }
        $query = new ChildподрядчикимтрQuery();
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
     * @return Childподрядчикимтр|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = подрядчикимтрTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(подрядчикимтрTableMap::DATABASE_NAME);
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
     * @return Childподрядчикимтр A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Подрядчик FROM Подрядчики_МТР WHERE id = :p0';
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
            /** @var Childподрядчикимтр $obj */
            $obj = new Childподрядчикимтр();
            $obj->hydrate($row);
            подрядчикимтрTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return Childподрядчикимтр|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildподрядчикимтрQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(подрядчикимтрTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildподрядчикимтрQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(подрядчикимтрTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildподрядчикимтрQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(подрядчикимтрTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(подрядчикимтрTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(подрядчикимтрTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Подрядчик column
     *
     * Example usage:
     * <code>
     * $query->filterByподрядчик('fooValue');   // WHERE Подрядчик = 'fooValue'
     * $query->filterByподрядчик('%fooValue%'); // WHERE Подрядчик LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�одрядчик The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildподрядчикимтрQuery The current query, for fluid interface
     */
    public function filterByподрядчик($�одрядчик = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�одрядчик)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�одрядчик)) {
                $�одрядчик = str_replace('*', '%', $�одрядчик);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(подрядчикимтрTableMap::COL_ПОДРЯДЧИК, $�одрядчик, $comparison);
    }

    /**
     * Filter the query by a related \мтр object
     *
     * @param \мтр|ObjectCollection $�тр the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildподрядчикимтрQuery The current query, for fluid interface
     */
    public function filterByмтр($�тр, $comparison = null)
    {
        if ($�тр instanceof \мтр) {
            return $this
                ->addUsingAlias(подрядчикимтрTableMap::COL_ID, $�тр->getподрядчик(), $comparison);
        } elseif ($�тр instanceof ObjectCollection) {
            return $this
                ->useмтрQuery()
                ->filterByPrimaryKeys($�тр->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByмтр() only accepts arguments of type \мтр or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the мтр relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildподрядчикимтрQuery The current query, for fluid interface
     */
    public function joinмтр($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('мтр');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'мтр');
        }

        return $this;
    }

    /**
     * Use the мтр relation мтр object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \мтрQuery A secondary query class using the current class as primary query
     */
    public function useмтрQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinмтр($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'мтр', '\мтрQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Childподрядчикимтр $�одрядчикимтр Object to remove from the list of results
     *
     * @return $this|ChildподрядчикимтрQuery The current query, for fluid interface
     */
    public function prune($�одрядчикимтр = null)
    {
        if ($�одрядчикимтр) {
            $this->addUsingAlias(подрядчикимтрTableMap::COL_ID, $�одрядчикимтр->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Подрядчики_МТР table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(подрядчикимтрTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            подрядчикимтрTableMap::clearInstancePool();
            подрядчикимтрTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(подрядчикимтрTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(подрядчикимтрTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            подрядчикимтрTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            подрядчикимтрTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // подрядчикимтрQuery
