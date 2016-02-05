<?php

namespace Base;

use \СтатусыЗаявкиЗавершение as ChildСтатусыЗаявкиЗавершение;
use \СтатусыЗаявкиЗавершениеQuery as ChildСтатусыЗаявкиЗавершениеQuery;
use \Exception;
use \PDO;
use Map\СтатусыЗаявкиЗавершениеTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Статусы_заявки_завершение' table.
 *
 * 
 *
 * @method     ChildСтатусыЗаявкиЗавершениеQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildСтатусыЗаявкиЗавершениеQuery orderByстатусзавершения($order = Criteria::ASC) Order by the Статус_завершения column
 *
 * @method     ChildСтатусыЗаявкиЗавершениеQuery groupById() Group by the id column
 * @method     ChildСтатусыЗаявкиЗавершениеQuery groupByстатусзавершения() Group by the Статус_завершения column
 *
 * @method     ChildСтатусыЗаявкиЗавершениеQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildСтатусыЗаявкиЗавершениеQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildСтатусыЗаявкиЗавершениеQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildСтатусыЗаявкиЗавершениеQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildСтатусыЗаявкиЗавершениеQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildСтатусыЗаявкиЗавершениеQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildСтатусыЗаявкиЗавершениеQuery leftJoinПредписания($relationAlias = null) Adds a LEFT JOIN clause to the query using the Предписания relation
 * @method     ChildСтатусыЗаявкиЗавершениеQuery rightJoinПредписания($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Предписания relation
 * @method     ChildСтатусыЗаявкиЗавершениеQuery innerJoinПредписания($relationAlias = null) Adds a INNER JOIN clause to the query using the Предписания relation
 *
 * @method     ChildСтатусыЗаявкиЗавершениеQuery joinWithПредписания($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Предписания relation
 *
 * @method     ChildСтатусыЗаявкиЗавершениеQuery leftJoinWithПредписания() Adds a LEFT JOIN clause and with to the query using the Предписания relation
 * @method     ChildСтатусыЗаявкиЗавершениеQuery rightJoinWithПредписания() Adds a RIGHT JOIN clause and with to the query using the Предписания relation
 * @method     ChildСтатусыЗаявкиЗавершениеQuery innerJoinWithПредписания() Adds a INNER JOIN clause and with to the query using the Предписания relation
 *
 * @method     \ПредписанияQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildСтатусыЗаявкиЗавершение findOne(ConnectionInterface $con = null) Return the first ChildСтатусыЗаявкиЗавершение matching the query
 * @method     ChildСтатусыЗаявкиЗавершение findOneOrCreate(ConnectionInterface $con = null) Return the first ChildСтатусыЗаявкиЗавершение matching the query, or a new ChildСтатусыЗаявкиЗавершение object populated from the query conditions when no match is found
 *
 * @method     ChildСтатусыЗаявкиЗавершение findOneById(int $id) Return the first ChildСтатусыЗаявкиЗавершение filtered by the id column
 * @method     ChildСтатусыЗаявкиЗавершение findOneByстатусзавершения(string $Статус_завершения) Return the first ChildСтатусыЗаявкиЗавершение filtered by the Статус_завершения column *

 * @method     ChildСтатусыЗаявкиЗавершение requirePk($key, ConnectionInterface $con = null) Return the ChildСтатусыЗаявкиЗавершение by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildСтатусыЗаявкиЗавершение requireOne(ConnectionInterface $con = null) Return the first ChildСтатусыЗаявкиЗавершение matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildСтатусыЗаявкиЗавершение requireOneById(int $id) Return the first ChildСтатусыЗаявкиЗавершение filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildСтатусыЗаявкиЗавершение requireOneByстатусзавершения(string $Статус_завершения) Return the first ChildСтатусыЗаявкиЗавершение filtered by the Статус_завершения column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildСтатусыЗаявкиЗавершение[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildСтатусыЗаявкиЗавершение objects based on current ModelCriteria
 * @method     ChildСтатусыЗаявкиЗавершение[]|ObjectCollection findById(int $id) Return ChildСтатусыЗаявкиЗавершение objects filtered by the id column
 * @method     ChildСтатусыЗаявкиЗавершение[]|ObjectCollection findByстатусзавершения(string $Статус_завершения) Return ChildСтатусыЗаявкиЗавершение objects filtered by the Статус_завершения column
 * @method     ChildСтатусыЗаявкиЗавершение[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class СтатусыЗаявкиЗавершениеQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\СтатусыЗаявкиЗавершениеQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\СтатусыЗаявкиЗавершение', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildСтатусыЗаявкиЗавершениеQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildСтатусыЗаявкиЗавершениеQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildСтатусыЗаявкиЗавершениеQuery) {
            return $criteria;
        }
        $query = new ChildСтатусыЗаявкиЗавершениеQuery();
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
     * @return ChildСтатусыЗаявкиЗавершение|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = СтатусыЗаявкиЗавершениеTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(СтатусыЗаявкиЗавершениеTableMap::DATABASE_NAME);
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
     * @return ChildСтатусыЗаявкиЗавершение A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Статус_завершения FROM Статусы_заявки_завершение WHERE id = :p0';
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
            /** @var ChildСтатусыЗаявкиЗавершение $obj */
            $obj = new ChildСтатусыЗаявкиЗавершение();
            $obj->hydrate($row);
            СтатусыЗаявкиЗавершениеTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildСтатусыЗаявкиЗавершение|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildСтатусыЗаявкиЗавершениеQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(СтатусыЗаявкиЗавершениеTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildСтатусыЗаявкиЗавершениеQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(СтатусыЗаявкиЗавершениеTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildСтатусыЗаявкиЗавершениеQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(СтатусыЗаявкиЗавершениеTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(СтатусыЗаявкиЗавершениеTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(СтатусыЗаявкиЗавершениеTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Статус_завершения column
     *
     * Example usage:
     * <code>
     * $query->filterByстатусзавершения('fooValue');   // WHERE Статус_завершения = 'fooValue'
     * $query->filterByстатусзавершения('%fooValue%'); // WHERE Статус_завершения LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�татусзавершения The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildСтатусыЗаявкиЗавершениеQuery The current query, for fluid interface
     */
    public function filterByстатусзавершения($�татусзавершения = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�татусзавершения)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�татусзавершения)) {
                $�татусзавершения = str_replace('*', '%', $�татусзавершения);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(СтатусыЗаявкиЗавершениеTableMap::COL_СТАТУС_ЗАВЕРШЕНИЯ, $�татусзавершения, $comparison);
    }

    /**
     * Filter the query by a related \Предписания object
     *
     * @param \Предписания|ObjectCollection $�редписания the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildСтатусыЗаявкиЗавершениеQuery The current query, for fluid interface
     */
    public function filterByПредписания($�редписания, $comparison = null)
    {
        if ($�редписания instanceof \Предписания) {
            return $this
                ->addUsingAlias(СтатусыЗаявкиЗавершениеTableMap::COL_ID, $�редписания->getстатусзаявкизавершение(), $comparison);
        } elseif ($�редписания instanceof ObjectCollection) {
            return $this
                ->useПредписанияQuery()
                ->filterByPrimaryKeys($�редписания->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByПредписания() only accepts arguments of type \Предписания or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Предписания relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildСтатусыЗаявкиЗавершениеQuery The current query, for fluid interface
     */
    public function joinПредписания($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Предписания');

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
            $this->addJoinObject($join, 'Предписания');
        }

        return $this;
    }

    /**
     * Use the Предписания relation Предписания object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ПредписанияQuery A secondary query class using the current class as primary query
     */
    public function useПредписанияQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinПредписания($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Предписания', '\ПредписанияQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildСтатусыЗаявкиЗавершение $�татусыЗаявкиЗавершение Object to remove from the list of results
     *
     * @return $this|ChildСтатусыЗаявкиЗавершениеQuery The current query, for fluid interface
     */
    public function prune($�татусыЗаявкиЗавершение = null)
    {
        if ($�татусыЗаявкиЗавершение) {
            $this->addUsingAlias(СтатусыЗаявкиЗавершениеTableMap::COL_ID, $�татусыЗаявкиЗавершение->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Статусы_заявки_завершение table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(СтатусыЗаявкиЗавершениеTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            СтатусыЗаявкиЗавершениеTableMap::clearInstancePool();
            СтатусыЗаявкиЗавершениеTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(СтатусыЗаявкиЗавершениеTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(СтатусыЗаявкиЗавершениеTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            СтатусыЗаявкиЗавершениеTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            СтатусыЗаявкиЗавершениеTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // СтатусыЗаявкиЗавершениеQuery
