<?php

namespace Base;

use \программы as Childпрограммы;
use \программыQuery as ChildпрограммыQuery;
use \Exception;
use \PDO;
use Map\программыTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Программы' table.
 *
 * 
 *
 * @method     ChildпрограммыQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildпрограммыQuery orderByпрограмма($order = Criteria::ASC) Order by the Программа column
 * @method     ChildпрограммыQuery orderByпроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildпрограммыQuery orderByобъем($order = Criteria::ASC) Order by the Объем column
 *
 * @method     ChildпрограммыQuery groupById() Group by the id column
 * @method     ChildпрограммыQuery groupByпрограмма() Group by the Программа column
 * @method     ChildпрограммыQuery groupByпроект() Group by the Проект column
 * @method     ChildпрограммыQuery groupByобъем() Group by the Объем column
 *
 * @method     ChildпрограммыQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildпрограммыQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildпрограммыQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildпрограммыQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildпрограммыQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildпрограммыQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildпрограммыQuery leftJoinПроекты($relationAlias = null) Adds a LEFT JOIN clause to the query using the Проекты relation
 * @method     ChildпрограммыQuery rightJoinПроекты($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Проекты relation
 * @method     ChildпрограммыQuery innerJoinПроекты($relationAlias = null) Adds a INNER JOIN clause to the query using the Проекты relation
 *
 * @method     ChildпрограммыQuery joinWithПроекты($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Проекты relation
 *
 * @method     ChildпрограммыQuery leftJoinWithПроекты() Adds a LEFT JOIN clause and with to the query using the Проекты relation
 * @method     ChildпрограммыQuery rightJoinWithПроекты() Adds a RIGHT JOIN clause and with to the query using the Проекты relation
 * @method     ChildпрограммыQuery innerJoinWithПроекты() Adds a INNER JOIN clause and with to the query using the Проекты relation
 *
 * @method     ChildпрограммыQuery leftJoinпроизводственныепрограммы($relationAlias = null) Adds a LEFT JOIN clause to the query using the производственныепрограммы relation
 * @method     ChildпрограммыQuery rightJoinпроизводственныепрограммы($relationAlias = null) Adds a RIGHT JOIN clause to the query using the производственныепрограммы relation
 * @method     ChildпрограммыQuery innerJoinпроизводственныепрограммы($relationAlias = null) Adds a INNER JOIN clause to the query using the производственныепрограммы relation
 *
 * @method     ChildпрограммыQuery joinWithпроизводственныепрограммы($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the производственныепрограммы relation
 *
 * @method     ChildпрограммыQuery leftJoinWithпроизводственныепрограммы() Adds a LEFT JOIN clause and with to the query using the производственныепрограммы relation
 * @method     ChildпрограммыQuery rightJoinWithпроизводственныепрограммы() Adds a RIGHT JOIN clause and with to the query using the производственныепрограммы relation
 * @method     ChildпрограммыQuery innerJoinWithпроизводственныепрограммы() Adds a INNER JOIN clause and with to the query using the производственныепрограммы relation
 *
 * @method     \ПроектыQuery|\производственныепрограммыQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childпрограммы findOne(ConnectionInterface $con = null) Return the first Childпрограммы matching the query
 * @method     Childпрограммы findOneOrCreate(ConnectionInterface $con = null) Return the first Childпрограммы matching the query, or a new Childпрограммы object populated from the query conditions when no match is found
 *
 * @method     Childпрограммы findOneById(int $id) Return the first Childпрограммы filtered by the id column
 * @method     Childпрограммы findOneByпрограмма(string $Программа) Return the first Childпрограммы filtered by the Программа column
 * @method     Childпрограммы findOneByпроект(int $Проект) Return the first Childпрограммы filtered by the Проект column
 * @method     Childпрограммы findOneByобъем(double $Объем) Return the first Childпрограммы filtered by the Объем column *

 * @method     Childпрограммы requirePk($key, ConnectionInterface $con = null) Return the Childпрограммы by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпрограммы requireOne(ConnectionInterface $con = null) Return the first Childпрограммы matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childпрограммы requireOneById(int $id) Return the first Childпрограммы filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпрограммы requireOneByпрограмма(string $Программа) Return the first Childпрограммы filtered by the Программа column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпрограммы requireOneByпроект(int $Проект) Return the first Childпрограммы filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childпрограммы requireOneByобъем(double $Объем) Return the first Childпрограммы filtered by the Объем column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childпрограммы[]|ObjectCollection find(ConnectionInterface $con = null) Return Childпрограммы objects based on current ModelCriteria
 * @method     Childпрограммы[]|ObjectCollection findById(int $id) Return Childпрограммы objects filtered by the id column
 * @method     Childпрограммы[]|ObjectCollection findByпрограмма(string $Программа) Return Childпрограммы objects filtered by the Программа column
 * @method     Childпрограммы[]|ObjectCollection findByпроект(int $Проект) Return Childпрограммы objects filtered by the Проект column
 * @method     Childпрограммы[]|ObjectCollection findByобъем(double $Объем) Return Childпрограммы objects filtered by the Объем column
 * @method     Childпрограммы[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class программыQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\программыQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\программы', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildпрограммыQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildпрограммыQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildпрограммыQuery) {
            return $criteria;
        }
        $query = new ChildпрограммыQuery();
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
     * @return Childпрограммы|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = программыTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(программыTableMap::DATABASE_NAME);
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
     * @return Childпрограммы A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Программа, Проект, Объем FROM Программы WHERE id = :p0';
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
            /** @var Childпрограммы $obj */
            $obj = new Childпрограммы();
            $obj->hydrate($row);
            программыTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return Childпрограммы|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildпрограммыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(программыTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildпрограммыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(программыTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildпрограммыQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(программыTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(программыTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(программыTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Программа column
     *
     * Example usage:
     * <code>
     * $query->filterByпрограмма('fooValue');   // WHERE Программа = 'fooValue'
     * $query->filterByпрограмма('%fooValue%'); // WHERE Программа LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�рограмма The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпрограммыQuery The current query, for fluid interface
     */
    public function filterByпрограмма($�рограмма = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�рограмма)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�рограмма)) {
                $�рограмма = str_replace('*', '%', $�рограмма);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(программыTableMap::COL_ПРОГРАММА, $�рограмма, $comparison);
    }

    /**
     * Filter the query on the Проект column
     *
     * Example usage:
     * <code>
     * $query->filterByпроект(1234); // WHERE Проект = 1234
     * $query->filterByпроект(array(12, 34)); // WHERE Проект IN (12, 34)
     * $query->filterByпроект(array('min' => 12)); // WHERE Проект > 12
     * </code>
     *
     * @see       filterByПроекты()
     *
     * @param     mixed $�роект The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпрограммыQuery The current query, for fluid interface
     */
    public function filterByпроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(программыTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(программыTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(программыTableMap::COL_ПРОЕКТ, $�роект, $comparison);
    }

    /**
     * Filter the query on the Объем column
     *
     * Example usage:
     * <code>
     * $query->filterByобъем(1234); // WHERE Объем = 1234
     * $query->filterByобъем(array(12, 34)); // WHERE Объем IN (12, 34)
     * $query->filterByобъем(array('min' => 12)); // WHERE Объем > 12
     * </code>
     *
     * @param     mixed $�бъем The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildпрограммыQuery The current query, for fluid interface
     */
    public function filterByобъем($�бъем = null, $comparison = null)
    {
        if (is_array($�бъем)) {
            $useMinMax = false;
            if (isset($�бъем['min'])) {
                $this->addUsingAlias(программыTableMap::COL_ОБЪЕМ, $�бъем['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�бъем['max'])) {
                $this->addUsingAlias(программыTableMap::COL_ОБЪЕМ, $�бъем['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(программыTableMap::COL_ОБЪЕМ, $�бъем, $comparison);
    }

    /**
     * Filter the query by a related \Проекты object
     *
     * @param \Проекты|ObjectCollection $�роекты The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildпрограммыQuery The current query, for fluid interface
     */
    public function filterByПроекты($�роекты, $comparison = null)
    {
        if ($�роекты instanceof \Проекты) {
            return $this
                ->addUsingAlias(программыTableMap::COL_ПРОЕКТ, $�роекты->getId(), $comparison);
        } elseif ($�роекты instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(программыTableMap::COL_ПРОЕКТ, $�роекты->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByПроекты() only accepts arguments of type \Проекты or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Проекты relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildпрограммыQuery The current query, for fluid interface
     */
    public function joinПроекты($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Проекты');

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
            $this->addJoinObject($join, 'Проекты');
        }

        return $this;
    }

    /**
     * Use the Проекты relation Проекты object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ПроектыQuery A secondary query class using the current class as primary query
     */
    public function useПроектыQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinПроекты($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Проекты', '\ПроектыQuery');
    }

    /**
     * Filter the query by a related \производственныепрограммы object
     *
     * @param \производственныепрограммы|ObjectCollection $�роизводственныепрограммы the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildпрограммыQuery The current query, for fluid interface
     */
    public function filterByпроизводственныепрограммы($�роизводственныепрограммы, $comparison = null)
    {
        if ($�роизводственныепрограммы instanceof \производственныепрограммы) {
            return $this
                ->addUsingAlias(программыTableMap::COL_ID, $�роизводственныепрограммы->getтиппрограммы(), $comparison);
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
     * @return $this|ChildпрограммыQuery The current query, for fluid interface
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
     * @param   Childпрограммы $�рограммы Object to remove from the list of results
     *
     * @return $this|ChildпрограммыQuery The current query, for fluid interface
     */
    public function prune($�рограммы = null)
    {
        if ($�рограммы) {
            $this->addUsingAlias(программыTableMap::COL_ID, $�рограммы->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Программы table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(программыTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            программыTableMap::clearInstancePool();
            программыTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(программыTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(программыTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            программыTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            программыTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // программыQuery
