<?php

namespace Base;

use \месяца as Childмесяца;
use \месяцаQuery as ChildмесяцаQuery;
use \Exception;
use \PDO;
use Map\месяцаTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Месяца' table.
 *
 * 
 *
 * @method     ChildмесяцаQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildмесяцаQuery orderByмесяц($order = Criteria::ASC) Order by the Месяц column
 *
 * @method     ChildмесяцаQuery groupById() Group by the id column
 * @method     ChildмесяцаQuery groupByмесяц() Group by the Месяц column
 *
 * @method     ChildмесяцаQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildмесяцаQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildмесяцаQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildмесяцаQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildмесяцаQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildмесяцаQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildмесяцаQuery leftJoinКалендарь($relationAlias = null) Adds a LEFT JOIN clause to the query using the Календарь relation
 * @method     ChildмесяцаQuery rightJoinКалендарь($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Календарь relation
 * @method     ChildмесяцаQuery innerJoinКалендарь($relationAlias = null) Adds a INNER JOIN clause to the query using the Календарь relation
 *
 * @method     ChildмесяцаQuery joinWithКалендарь($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Календарь relation
 *
 * @method     ChildмесяцаQuery leftJoinWithКалендарь() Adds a LEFT JOIN clause and with to the query using the Календарь relation
 * @method     ChildмесяцаQuery rightJoinWithКалендарь() Adds a RIGHT JOIN clause and with to the query using the Календарь relation
 * @method     ChildмесяцаQuery innerJoinWithКалендарь() Adds a INNER JOIN clause and with to the query using the Календарь relation
 *
 * @method     ChildмесяцаQuery leftJoinмобилизацияпомесяцам($relationAlias = null) Adds a LEFT JOIN clause to the query using the мобилизацияпомесяцам relation
 * @method     ChildмесяцаQuery rightJoinмобилизацияпомесяцам($relationAlias = null) Adds a RIGHT JOIN clause to the query using the мобилизацияпомесяцам relation
 * @method     ChildмесяцаQuery innerJoinмобилизацияпомесяцам($relationAlias = null) Adds a INNER JOIN clause to the query using the мобилизацияпомесяцам relation
 *
 * @method     ChildмесяцаQuery joinWithмобилизацияпомесяцам($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the мобилизацияпомесяцам relation
 *
 * @method     ChildмесяцаQuery leftJoinWithмобилизацияпомесяцам() Adds a LEFT JOIN clause and with to the query using the мобилизацияпомесяцам relation
 * @method     ChildмесяцаQuery rightJoinWithмобилизацияпомесяцам() Adds a RIGHT JOIN clause and with to the query using the мобилизацияпомесяцам relation
 * @method     ChildмесяцаQuery innerJoinWithмобилизацияпомесяцам() Adds a INNER JOIN clause and with to the query using the мобилизацияпомесяцам relation
 *
 * @method     ChildмесяцаQuery leftJoinпроизводственныепрограммы($relationAlias = null) Adds a LEFT JOIN clause to the query using the производственныепрограммы relation
 * @method     ChildмесяцаQuery rightJoinпроизводственныепрограммы($relationAlias = null) Adds a RIGHT JOIN clause to the query using the производственныепрограммы relation
 * @method     ChildмесяцаQuery innerJoinпроизводственныепрограммы($relationAlias = null) Adds a INNER JOIN clause to the query using the производственныепрограммы relation
 *
 * @method     ChildмесяцаQuery joinWithпроизводственныепрограммы($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the производственныепрограммы relation
 *
 * @method     ChildмесяцаQuery leftJoinWithпроизводственныепрограммы() Adds a LEFT JOIN clause and with to the query using the производственныепрограммы relation
 * @method     ChildмесяцаQuery rightJoinWithпроизводственныепрограммы() Adds a RIGHT JOIN clause and with to the query using the производственныепрограммы relation
 * @method     ChildмесяцаQuery innerJoinWithпроизводственныепрограммы() Adds a INNER JOIN clause and with to the query using the производственныепрограммы relation
 *
 * @method     \КалендарьQuery|\мобилизацияпомесяцамQuery|\производственныепрограммыQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childмесяца findOne(ConnectionInterface $con = null) Return the first Childмесяца matching the query
 * @method     Childмесяца findOneOrCreate(ConnectionInterface $con = null) Return the first Childмесяца matching the query, or a new Childмесяца object populated from the query conditions when no match is found
 *
 * @method     Childмесяца findOneById(int $id) Return the first Childмесяца filtered by the id column
 * @method     Childмесяца findOneByмесяц(string $Месяц) Return the first Childмесяца filtered by the Месяц column *

 * @method     Childмесяца requirePk($key, ConnectionInterface $con = null) Return the Childмесяца by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмесяца requireOne(ConnectionInterface $con = null) Return the first Childмесяца matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childмесяца requireOneById(int $id) Return the first Childмесяца filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childмесяца requireOneByмесяц(string $Месяц) Return the first Childмесяца filtered by the Месяц column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childмесяца[]|ObjectCollection find(ConnectionInterface $con = null) Return Childмесяца objects based on current ModelCriteria
 * @method     Childмесяца[]|ObjectCollection findById(int $id) Return Childмесяца objects filtered by the id column
 * @method     Childмесяца[]|ObjectCollection findByмесяц(string $Месяц) Return Childмесяца objects filtered by the Месяц column
 * @method     Childмесяца[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class месяцаQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\месяцаQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\месяца', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildмесяцаQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildмесяцаQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildмесяцаQuery) {
            return $criteria;
        }
        $query = new ChildмесяцаQuery();
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
     * @return Childмесяца|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = месяцаTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(месяцаTableMap::DATABASE_NAME);
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
     * @return Childмесяца A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Месяц FROM Месяца WHERE id = :p0';
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
            /** @var Childмесяца $obj */
            $obj = new Childмесяца();
            $obj->hydrate($row);
            месяцаTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return Childмесяца|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildмесяцаQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(месяцаTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildмесяцаQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(месяцаTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildмесяцаQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(месяцаTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(месяцаTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(месяцаTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Месяц column
     *
     * Example usage:
     * <code>
     * $query->filterByмесяц('fooValue');   // WHERE Месяц = 'fooValue'
     * $query->filterByмесяц('%fooValue%'); // WHERE Месяц LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�есяц The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildмесяцаQuery The current query, for fluid interface
     */
    public function filterByмесяц($�есяц = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�есяц)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�есяц)) {
                $�есяц = str_replace('*', '%', $�есяц);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(месяцаTableMap::COL_МЕСЯЦ, $�есяц, $comparison);
    }

    /**
     * Filter the query by a related \Календарь object
     *
     * @param \Календарь|ObjectCollection $�алендарь the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildмесяцаQuery The current query, for fluid interface
     */
    public function filterByКалендарь($�алендарь, $comparison = null)
    {
        if ($�алендарь instanceof \Календарь) {
            return $this
                ->addUsingAlias(месяцаTableMap::COL_ID, $�алендарь->getномермесяца(), $comparison);
        } elseif ($�алендарь instanceof ObjectCollection) {
            return $this
                ->useКалендарьQuery()
                ->filterByPrimaryKeys($�алендарь->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByКалендарь() only accepts arguments of type \Календарь or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Календарь relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildмесяцаQuery The current query, for fluid interface
     */
    public function joinКалендарь($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Календарь');

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
            $this->addJoinObject($join, 'Календарь');
        }

        return $this;
    }

    /**
     * Use the Календарь relation Календарь object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \КалендарьQuery A secondary query class using the current class as primary query
     */
    public function useКалендарьQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinКалендарь($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Календарь', '\КалендарьQuery');
    }

    /**
     * Filter the query by a related \мобилизацияпомесяцам object
     *
     * @param \мобилизацияпомесяцам|ObjectCollection $�обилизацияпомесяцам the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildмесяцаQuery The current query, for fluid interface
     */
    public function filterByмобилизацияпомесяцам($�обилизацияпомесяцам, $comparison = null)
    {
        if ($�обилизацияпомесяцам instanceof \мобилизацияпомесяцам) {
            return $this
                ->addUsingAlias(месяцаTableMap::COL_ID, $�обилизацияпомесяцам->getмесяц(), $comparison);
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
     * @return $this|ChildмесяцаQuery The current query, for fluid interface
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
     * Filter the query by a related \производственныепрограммы object
     *
     * @param \производственныепрограммы|ObjectCollection $�роизводственныепрограммы the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildмесяцаQuery The current query, for fluid interface
     */
    public function filterByпроизводственныепрограммы($�роизводственныепрограммы, $comparison = null)
    {
        if ($�роизводственныепрограммы instanceof \производственныепрограммы) {
            return $this
                ->addUsingAlias(месяцаTableMap::COL_ID, $�роизводственныепрограммы->getмесяц(), $comparison);
        } elseif ($�роизводственныепрограммы instanceof ObjectCollection) {
            return $this
                ->useпроизводственныепрограммыQuery()
                ->filterByPrimaryKeys($�роизводственныепрограммы->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByпроизводственныепрограммы() only accepts arguments of type \производственныепрограммы or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the производственныепрограммы relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildмесяцаQuery The current query, for fluid interface
     */
    public function joinпроизводственныепрограммы($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('производственныепрограммы');

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
            $this->addJoinObject($join, 'производственныепрограммы');
        }

        return $this;
    }

    /**
     * Use the производственныепрограммы relation производственныепрограммы object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \производственныепрограммыQuery A secondary query class using the current class as primary query
     */
    public function useпроизводственныепрограммыQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinпроизводственныепрограммы($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'производственныепрограммы', '\производственныепрограммыQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Childмесяца $�есяца Object to remove from the list of results
     *
     * @return $this|ChildмесяцаQuery The current query, for fluid interface
     */
    public function prune($�есяца = null)
    {
        if ($�есяца) {
            $this->addUsingAlias(месяцаTableMap::COL_ID, $�есяца->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Месяца table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(месяцаTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            месяцаTableMap::clearInstancePool();
            месяцаTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(месяцаTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(месяцаTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            месяцаTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            месяцаTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // месяцаQuery
