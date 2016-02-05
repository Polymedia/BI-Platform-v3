<?php

namespace Base;

use \типытехникивыработка as Childтипытехникивыработка;
use \типытехникивыработкаQuery as ChildтипытехникивыработкаQuery;
use \Exception;
use \PDO;
use Map\типытехникивыработкаTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Типы_техники_выработка' table.
 *
 * 
 *
 * @method     ChildтипытехникивыработкаQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildтипытехникивыработкаQuery orderByтиптехники($order = Criteria::ASC) Order by the Тип_техники column
 *
 * @method     ChildтипытехникивыработкаQuery groupById() Group by the id column
 * @method     ChildтипытехникивыработкаQuery groupByтиптехники() Group by the Тип_техники column
 *
 * @method     ChildтипытехникивыработкаQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildтипытехникивыработкаQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildтипытехникивыработкаQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildтипытехникивыработкаQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildтипытехникивыработкаQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildтипытехникивыработкаQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildтипытехникивыработкаQuery leftJoinвыработка($relationAlias = null) Adds a LEFT JOIN clause to the query using the выработка relation
 * @method     ChildтипытехникивыработкаQuery rightJoinвыработка($relationAlias = null) Adds a RIGHT JOIN clause to the query using the выработка relation
 * @method     ChildтипытехникивыработкаQuery innerJoinвыработка($relationAlias = null) Adds a INNER JOIN clause to the query using the выработка relation
 *
 * @method     ChildтипытехникивыработкаQuery joinWithвыработка($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the выработка relation
 *
 * @method     ChildтипытехникивыработкаQuery leftJoinWithвыработка() Adds a LEFT JOIN clause and with to the query using the выработка relation
 * @method     ChildтипытехникивыработкаQuery rightJoinWithвыработка() Adds a RIGHT JOIN clause and with to the query using the выработка relation
 * @method     ChildтипытехникивыработкаQuery innerJoinWithвыработка() Adds a INNER JOIN clause and with to the query using the выработка relation
 *
 * @method     \выработкаQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childтипытехникивыработка findOne(ConnectionInterface $con = null) Return the first Childтипытехникивыработка matching the query
 * @method     Childтипытехникивыработка findOneOrCreate(ConnectionInterface $con = null) Return the first Childтипытехникивыработка matching the query, or a new Childтипытехникивыработка object populated from the query conditions when no match is found
 *
 * @method     Childтипытехникивыработка findOneById(int $id) Return the first Childтипытехникивыработка filtered by the id column
 * @method     Childтипытехникивыработка findOneByтиптехники(string $Тип_техники) Return the first Childтипытехникивыработка filtered by the Тип_техники column *

 * @method     Childтипытехникивыработка requirePk($key, ConnectionInterface $con = null) Return the Childтипытехникивыработка by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childтипытехникивыработка requireOne(ConnectionInterface $con = null) Return the first Childтипытехникивыработка matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childтипытехникивыработка requireOneById(int $id) Return the first Childтипытехникивыработка filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childтипытехникивыработка requireOneByтиптехники(string $Тип_техники) Return the first Childтипытехникивыработка filtered by the Тип_техники column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childтипытехникивыработка[]|ObjectCollection find(ConnectionInterface $con = null) Return Childтипытехникивыработка objects based on current ModelCriteria
 * @method     Childтипытехникивыработка[]|ObjectCollection findById(int $id) Return Childтипытехникивыработка objects filtered by the id column
 * @method     Childтипытехникивыработка[]|ObjectCollection findByтиптехники(string $Тип_техники) Return Childтипытехникивыработка objects filtered by the Тип_техники column
 * @method     Childтипытехникивыработка[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class типытехникивыработкаQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\типытехникивыработкаQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\типытехникивыработка', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildтипытехникивыработкаQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildтипытехникивыработкаQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildтипытехникивыработкаQuery) {
            return $criteria;
        }
        $query = new ChildтипытехникивыработкаQuery();
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
     * @return Childтипытехникивыработка|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = типытехникивыработкаTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(типытехникивыработкаTableMap::DATABASE_NAME);
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
     * @return Childтипытехникивыработка A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Тип_техники FROM Типы_техники_выработка WHERE id = :p0';
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
            /** @var Childтипытехникивыработка $obj */
            $obj = new Childтипытехникивыработка();
            $obj->hydrate($row);
            типытехникивыработкаTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return Childтипытехникивыработка|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildтипытехникивыработкаQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(типытехникивыработкаTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildтипытехникивыработкаQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(типытехникивыработкаTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildтипытехникивыработкаQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(типытехникивыработкаTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(типытехникивыработкаTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(типытехникивыработкаTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildтипытехникивыработкаQuery The current query, for fluid interface
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

        return $this->addUsingAlias(типытехникивыработкаTableMap::COL_ТИП_ТЕХНИКИ, $�иптехники, $comparison);
    }

    /**
     * Filter the query by a related \выработка object
     *
     * @param \выработка|ObjectCollection $�ыработка the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildтипытехникивыработкаQuery The current query, for fluid interface
     */
    public function filterByвыработка($�ыработка, $comparison = null)
    {
        if ($�ыработка instanceof \выработка) {
            return $this
                ->addUsingAlias(типытехникивыработкаTableMap::COL_ID, $�ыработка->getтиптехники(), $comparison);
        } elseif ($�ыработка instanceof ObjectCollection) {
            return $this
                ->useвыработкаQuery()
                ->filterByPrimaryKeys($�ыработка->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByвыработка() only accepts arguments of type \выработка or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the выработка relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildтипытехникивыработкаQuery The current query, for fluid interface
     */
    public function joinвыработка($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('выработка');

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
            $this->addJoinObject($join, 'выработка');
        }

        return $this;
    }

    /**
     * Use the выработка relation выработка object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \выработкаQuery A secondary query class using the current class as primary query
     */
    public function useвыработкаQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinвыработка($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'выработка', '\выработкаQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Childтипытехникивыработка $�ипытехникивыработка Object to remove from the list of results
     *
     * @return $this|ChildтипытехникивыработкаQuery The current query, for fluid interface
     */
    public function prune($�ипытехникивыработка = null)
    {
        if ($�ипытехникивыработка) {
            $this->addUsingAlias(типытехникивыработкаTableMap::COL_ID, $�ипытехникивыработка->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Типы_техники_выработка table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(типытехникивыработкаTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            типытехникивыработкаTableMap::clearInstancePool();
            типытехникивыработкаTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(типытехникивыработкаTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(типытехникивыработкаTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            типытехникивыработкаTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            типытехникивыработкаTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // типытехникивыработкаQuery
