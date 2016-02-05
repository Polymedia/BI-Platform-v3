<?php

namespace Base;

use \типытехникимобилизация as Childтипытехникимобилизация;
use \типытехникимобилизацияQuery as ChildтипытехникимобилизацияQuery;
use \Exception;
use \PDO;
use Map\типытехникимобилизацияTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Типы_техники_мобилизация' table.
 *
 * 
 *
 * @method     ChildтипытехникимобилизацияQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildтипытехникимобилизацияQuery orderByтиптехники($order = Criteria::ASC) Order by the Тип_техники column
 *
 * @method     ChildтипытехникимобилизацияQuery groupById() Group by the id column
 * @method     ChildтипытехникимобилизацияQuery groupByтиптехники() Group by the Тип_техники column
 *
 * @method     ChildтипытехникимобилизацияQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildтипытехникимобилизацияQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildтипытехникимобилизацияQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildтипытехникимобилизацияQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildтипытехникимобилизацияQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildтипытехникимобилизацияQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildтипытехникимобилизацияQuery leftJoinмобилизация($relationAlias = null) Adds a LEFT JOIN clause to the query using the мобилизация relation
 * @method     ChildтипытехникимобилизацияQuery rightJoinмобилизация($relationAlias = null) Adds a RIGHT JOIN clause to the query using the мобилизация relation
 * @method     ChildтипытехникимобилизацияQuery innerJoinмобилизация($relationAlias = null) Adds a INNER JOIN clause to the query using the мобилизация relation
 *
 * @method     ChildтипытехникимобилизацияQuery joinWithмобилизация($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the мобилизация relation
 *
 * @method     ChildтипытехникимобилизацияQuery leftJoinWithмобилизация() Adds a LEFT JOIN clause and with to the query using the мобилизация relation
 * @method     ChildтипытехникимобилизацияQuery rightJoinWithмобилизация() Adds a RIGHT JOIN clause and with to the query using the мобилизация relation
 * @method     ChildтипытехникимобилизацияQuery innerJoinWithмобилизация() Adds a INNER JOIN clause and with to the query using the мобилизация relation
 *
 * @method     ChildтипытехникимобилизацияQuery leftJoinмобилизацияпомесяцам($relationAlias = null) Adds a LEFT JOIN clause to the query using the мобилизацияпомесяцам relation
 * @method     ChildтипытехникимобилизацияQuery rightJoinмобилизацияпомесяцам($relationAlias = null) Adds a RIGHT JOIN clause to the query using the мобилизацияпомесяцам relation
 * @method     ChildтипытехникимобилизацияQuery innerJoinмобилизацияпомесяцам($relationAlias = null) Adds a INNER JOIN clause to the query using the мобилизацияпомесяцам relation
 *
 * @method     ChildтипытехникимобилизацияQuery joinWithмобилизацияпомесяцам($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the мобилизацияпомесяцам relation
 *
 * @method     ChildтипытехникимобилизацияQuery leftJoinWithмобилизацияпомесяцам() Adds a LEFT JOIN clause and with to the query using the мобилизацияпомесяцам relation
 * @method     ChildтипытехникимобилизацияQuery rightJoinWithмобилизацияпомесяцам() Adds a RIGHT JOIN clause and with to the query using the мобилизацияпомесяцам relation
 * @method     ChildтипытехникимобилизацияQuery innerJoinWithмобилизацияпомесяцам() Adds a INNER JOIN clause and with to the query using the мобилизацияпомесяцам relation
 *
 * @method     \мобилизацияQuery|\мобилизацияпомесяцамQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childтипытехникимобилизация findOne(ConnectionInterface $con = null) Return the first Childтипытехникимобилизация matching the query
 * @method     Childтипытехникимобилизация findOneOrCreate(ConnectionInterface $con = null) Return the first Childтипытехникимобилизация matching the query, or a new Childтипытехникимобилизация object populated from the query conditions when no match is found
 *
 * @method     Childтипытехникимобилизация findOneById(int $id) Return the first Childтипытехникимобилизация filtered by the id column
 * @method     Childтипытехникимобилизация findOneByтиптехники(string $Тип_техники) Return the first Childтипытехникимобилизация filtered by the Тип_техники column *

 * @method     Childтипытехникимобилизация requirePk($key, ConnectionInterface $con = null) Return the Childтипытехникимобилизация by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childтипытехникимобилизация requireOne(ConnectionInterface $con = null) Return the first Childтипытехникимобилизация matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childтипытехникимобилизация requireOneById(int $id) Return the first Childтипытехникимобилизация filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childтипытехникимобилизация requireOneByтиптехники(string $Тип_техники) Return the first Childтипытехникимобилизация filtered by the Тип_техники column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childтипытехникимобилизация[]|ObjectCollection find(ConnectionInterface $con = null) Return Childтипытехникимобилизация objects based on current ModelCriteria
 * @method     Childтипытехникимобилизация[]|ObjectCollection findById(int $id) Return Childтипытехникимобилизация objects filtered by the id column
 * @method     Childтипытехникимобилизация[]|ObjectCollection findByтиптехники(string $Тип_техники) Return Childтипытехникимобилизация objects filtered by the Тип_техники column
 * @method     Childтипытехникимобилизация[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class типытехникимобилизацияQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\типытехникимобилизацияQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\типытехникимобилизация', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildтипытехникимобилизацияQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildтипытехникимобилизацияQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildтипытехникимобилизацияQuery) {
            return $criteria;
        }
        $query = new ChildтипытехникимобилизацияQuery();
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
     * @return Childтипытехникимобилизация|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = типытехникимобилизацияTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(типытехникимобилизацияTableMap::DATABASE_NAME);
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
     * @return Childтипытехникимобилизация A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Тип_техники FROM Типы_техники_мобилизация WHERE id = :p0';
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
            /** @var Childтипытехникимобилизация $obj */
            $obj = new Childтипытехникимобилизация();
            $obj->hydrate($row);
            типытехникимобилизацияTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return Childтипытехникимобилизация|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildтипытехникимобилизацияQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(типытехникимобилизацияTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildтипытехникимобилизацияQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(типытехникимобилизацияTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildтипытехникимобилизацияQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(типытехникимобилизацияTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(типытехникимобилизацияTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(типытехникимобилизацияTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Тип_техники column
     *
     * Example usage:
     * <code>
     * $query->filterByтиптехники('fooValue');   // WHERE Тип_техники = 'fooValue'
     * $query->filterByтиптехники('%fooValue%'); // WHERE Тип_техники LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�иптехники The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildтипытехникимобилизацияQuery The current query, for fluid interface
     */
    public function filterByтиптехники($�иптехники = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�иптехники)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�иптехники)) {
                $�иптехники = str_replace('*', '%', $�иптехники);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(типытехникимобилизацияTableMap::COL_ТИП_ТЕХНИКИ, $�иптехники, $comparison);
    }

    /**
     * Filter the query by a related \мобилизация object
     *
     * @param \мобилизация|ObjectCollection $�обилизация the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildтипытехникимобилизацияQuery The current query, for fluid interface
     */
    public function filterByмобилизация($�обилизация, $comparison = null)
    {
        if ($�обилизация instanceof \мобилизация) {
            return $this
                ->addUsingAlias(типытехникимобилизацияTableMap::COL_ID, $�обилизация->getтиптехники(), $comparison);
        } elseif ($�обилизация instanceof ObjectCollection) {
            return $this
                ->useмобилизацияQuery()
                ->filterByPrimaryKeys($�обилизация->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByмобилизация() only accepts arguments of type \мобилизация or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the мобилизация relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildтипытехникимобилизацияQuery The current query, for fluid interface
     */
    public function joinмобилизация($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('мобилизация');

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
            $this->addJoinObject($join, 'мобилизация');
        }

        return $this;
    }

    /**
     * Use the мобилизация relation мобилизация object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \мобилизацияQuery A secondary query class using the current class as primary query
     */
    public function useмобилизацияQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinмобилизация($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'мобилизация', '\мобилизацияQuery');
    }

    /**
     * Filter the query by a related \мобилизацияпомесяцам object
     *
     * @param \мобилизацияпомесяцам|ObjectCollection $�обилизацияпомесяцам the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildтипытехникимобилизацияQuery The current query, for fluid interface
     */
    public function filterByмобилизацияпомесяцам($�обилизацияпомесяцам, $comparison = null)
    {
        if ($�обилизацияпомесяцам instanceof \мобилизацияпомесяцам) {
            return $this
                ->addUsingAlias(типытехникимобилизацияTableMap::COL_ID, $�обилизацияпомесяцам->getтиптехники(), $comparison);
        } elseif ($�обилизацияпомесяцам instanceof ObjectCollection) {
            return $this
                ->useмобилизацияпомесяцамQuery()
                ->filterByPrimaryKeys($�обилизацияпомесяцам->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByмобилизацияпомесяцам() only accepts arguments of type \мобилизацияпомесяцам or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the мобилизацияпомесяцам relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildтипытехникимобилизацияQuery The current query, for fluid interface
     */
    public function joinмобилизацияпомесяцам($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('мобилизацияпомесяцам');

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
            $this->addJoinObject($join, 'мобилизацияпомесяцам');
        }

        return $this;
    }

    /**
     * Use the мобилизацияпомесяцам relation мобилизацияпомесяцам object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \мобилизацияпомесяцамQuery A secondary query class using the current class as primary query
     */
    public function useмобилизацияпомесяцамQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinмобилизацияпомесяцам($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'мобилизацияпомесяцам', '\мобилизацияпомесяцамQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Childтипытехникимобилизация $�ипытехникимобилизация Object to remove from the list of results
     *
     * @return $this|ChildтипытехникимобилизацияQuery The current query, for fluid interface
     */
    public function prune($�ипытехникимобилизация = null)
    {
        if ($�ипытехникимобилизация) {
            $this->addUsingAlias(типытехникимобилизацияTableMap::COL_ID, $�ипытехникимобилизация->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Типы_техники_мобилизация table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(типытехникимобилизацияTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            типытехникимобилизацияTableMap::clearInstancePool();
            типытехникимобилизацияTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(типытехникимобилизацияTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(типытехникимобилизацияTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            типытехникимобилизацияTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            типытехникимобилизацияTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // типытехникимобилизацияQuery
