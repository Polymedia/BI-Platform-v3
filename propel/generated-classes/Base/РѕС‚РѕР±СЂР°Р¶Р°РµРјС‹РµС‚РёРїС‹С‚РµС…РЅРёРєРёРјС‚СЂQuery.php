<?php

namespace Base;

use \отображаемыетипытехникимтр as Childотображаемыетипытехникимтр;
use \отображаемыетипытехникимтрQuery as ChildотображаемыетипытехникимтрQuery;
use \Exception;
use \PDO;
use Map\отображаемыетипытехникимтрTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Отображаемые_типы_техники_МТР' table.
 *
 * 
 *
 * @method     ChildотображаемыетипытехникимтрQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildотображаемыетипытехникимтрQuery orderByотображаемыйтиптехники($order = Criteria::ASC) Order by the Отображаемый_тип_техники column
 *
 * @method     ChildотображаемыетипытехникимтрQuery groupById() Group by the id column
 * @method     ChildотображаемыетипытехникимтрQuery groupByотображаемыйтиптехники() Group by the Отображаемый_тип_техники column
 *
 * @method     ChildотображаемыетипытехникимтрQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildотображаемыетипытехникимтрQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildотображаемыетипытехникимтрQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildотображаемыетипытехникимтрQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildотображаемыетипытехникимтрQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildотображаемыетипытехникимтрQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildотображаемыетипытехникимтрQuery leftJoinтипытехникимтр($relationAlias = null) Adds a LEFT JOIN clause to the query using the типытехникимтр relation
 * @method     ChildотображаемыетипытехникимтрQuery rightJoinтипытехникимтр($relationAlias = null) Adds a RIGHT JOIN clause to the query using the типытехникимтр relation
 * @method     ChildотображаемыетипытехникимтрQuery innerJoinтипытехникимтр($relationAlias = null) Adds a INNER JOIN clause to the query using the типытехникимтр relation
 *
 * @method     ChildотображаемыетипытехникимтрQuery joinWithтипытехникимтр($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the типытехникимтр relation
 *
 * @method     ChildотображаемыетипытехникимтрQuery leftJoinWithтипытехникимтр() Adds a LEFT JOIN clause and with to the query using the типытехникимтр relation
 * @method     ChildотображаемыетипытехникимтрQuery rightJoinWithтипытехникимтр() Adds a RIGHT JOIN clause and with to the query using the типытехникимтр relation
 * @method     ChildотображаемыетипытехникимтрQuery innerJoinWithтипытехникимтр() Adds a INNER JOIN clause and with to the query using the типытехникимтр relation
 *
 * @method     \типытехникимтрQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childотображаемыетипытехникимтр findOne(ConnectionInterface $con = null) Return the first Childотображаемыетипытехникимтр matching the query
 * @method     Childотображаемыетипытехникимтр findOneOrCreate(ConnectionInterface $con = null) Return the first Childотображаемыетипытехникимтр matching the query, or a new Childотображаемыетипытехникимтр object populated from the query conditions when no match is found
 *
 * @method     Childотображаемыетипытехникимтр findOneById(int $id) Return the first Childотображаемыетипытехникимтр filtered by the id column
 * @method     Childотображаемыетипытехникимтр findOneByотображаемыйтиптехники(string $Отображаемый_тип_техники) Return the first Childотображаемыетипытехникимтр filtered by the Отображаемый_тип_техники column *

 * @method     Childотображаемыетипытехникимтр requirePk($key, ConnectionInterface $con = null) Return the Childотображаемыетипытехникимтр by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childотображаемыетипытехникимтр requireOne(ConnectionInterface $con = null) Return the first Childотображаемыетипытехникимтр matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childотображаемыетипытехникимтр requireOneById(int $id) Return the first Childотображаемыетипытехникимтр filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childотображаемыетипытехникимтр requireOneByотображаемыйтиптехники(string $Отображаемый_тип_техники) Return the first Childотображаемыетипытехникимтр filtered by the Отображаемый_тип_техники column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childотображаемыетипытехникимтр[]|ObjectCollection find(ConnectionInterface $con = null) Return Childотображаемыетипытехникимтр objects based on current ModelCriteria
 * @method     Childотображаемыетипытехникимтр[]|ObjectCollection findById(int $id) Return Childотображаемыетипытехникимтр objects filtered by the id column
 * @method     Childотображаемыетипытехникимтр[]|ObjectCollection findByотображаемыйтиптехники(string $Отображаемый_тип_техники) Return Childотображаемыетипытехникимтр objects filtered by the Отображаемый_тип_техники column
 * @method     Childотображаемыетипытехникимтр[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class отображаемыетипытехникимтрQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\отображаемыетипытехникимтрQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\отображаемыетипытехникимтр', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildотображаемыетипытехникимтрQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildотображаемыетипытехникимтрQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildотображаемыетипытехникимтрQuery) {
            return $criteria;
        }
        $query = new ChildотображаемыетипытехникимтрQuery();
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
     * @return Childотображаемыетипытехникимтр|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = отображаемыетипытехникимтрTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(отображаемыетипытехникимтрTableMap::DATABASE_NAME);
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
     * @return Childотображаемыетипытехникимтр A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Отображаемый_тип_техники FROM Отображаемые_типы_техники_МТР WHERE id = :p0';
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
            /** @var Childотображаемыетипытехникимтр $obj */
            $obj = new Childотображаемыетипытехникимтр();
            $obj->hydrate($row);
            отображаемыетипытехникимтрTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return Childотображаемыетипытехникимтр|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildотображаемыетипытехникимтрQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(отображаемыетипытехникимтрTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildотображаемыетипытехникимтрQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(отображаемыетипытехникимтрTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildотображаемыетипытехникимтрQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(отображаемыетипытехникимтрTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(отображаемыетипытехникимтрTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(отображаемыетипытехникимтрTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Отображаемый_тип_техники column
     *
     * Example usage:
     * <code>
     * $query->filterByотображаемыйтиптехники('fooValue');   // WHERE Отображаемый_тип_техники = 'fooValue'
     * $query->filterByотображаемыйтиптехники('%fooValue%'); // WHERE Отображаемый_тип_техники LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�тображаемыйтиптехники The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildотображаемыетипытехникимтрQuery The current query, for fluid interface
     */
    public function filterByотображаемыйтиптехники($�тображаемыйтиптехники = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�тображаемыйтиптехники)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�тображаемыйтиптехники)) {
                $�тображаемыйтиптехники = str_replace('*', '%', $�тображаемыйтиптехники);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(отображаемыетипытехникимтрTableMap::COL_ОТОБРАЖАЕМЫЙ_ТИП_ТЕХНИКИ, $�тображаемыйтиптехники, $comparison);
    }

    /**
     * Filter the query by a related \типытехникимтр object
     *
     * @param \типытехникимтр|ObjectCollection $�ипытехникимтр the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildотображаемыетипытехникимтрQuery The current query, for fluid interface
     */
    public function filterByтипытехникимтр($�ипытехникимтр, $comparison = null)
    {
        if ($�ипытехникимтр instanceof \типытехникимтр) {
            return $this
                ->addUsingAlias(отображаемыетипытехникимтрTableMap::COL_ID, $�ипытехникимтр->getотображаемыйтиптехники(), $comparison);
        } elseif ($�ипытехникимтр instanceof ObjectCollection) {
            return $this
                ->useтипытехникимтрQuery()
                ->filterByPrimaryKeys($�ипытехникимтр->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByтипытехникимтр() only accepts arguments of type \типытехникимтр or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the типытехникимтр relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildотображаемыетипытехникимтрQuery The current query, for fluid interface
     */
    public function joinтипытехникимтр($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('типытехникимтр');

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
            $this->addJoinObject($join, 'типытехникимтр');
        }

        return $this;
    }

    /**
     * Use the типытехникимтр relation типытехникимтр object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \типытехникимтрQuery A secondary query class using the current class as primary query
     */
    public function useтипытехникимтрQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinтипытехникимтр($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'типытехникимтр', '\типытехникимтрQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Childотображаемыетипытехникимтр $�тображаемыетипытехникимтр Object to remove from the list of results
     *
     * @return $this|ChildотображаемыетипытехникимтрQuery The current query, for fluid interface
     */
    public function prune($�тображаемыетипытехникимтр = null)
    {
        if ($�тображаемыетипытехникимтр) {
            $this->addUsingAlias(отображаемыетипытехникимтрTableMap::COL_ID, $�тображаемыетипытехникимтр->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Отображаемые_типы_техники_МТР table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(отображаемыетипытехникимтрTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            отображаемыетипытехникимтрTableMap::clearInstancePool();
            отображаемыетипытехникимтрTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(отображаемыетипытехникимтрTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(отображаемыетипытехникимтрTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            отображаемыетипытехникимтрTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            отображаемыетипытехникимтрTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // отображаемыетипытехникимтрQuery
