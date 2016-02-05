<?php

namespace Base;

use \типыработ as Childтипыработ;
use \типыработQuery as ChildтипыработQuery;
use \Exception;
use \PDO;
use Map\типыработTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Типы_работ' table.
 *
 * 
 *
 * @method     ChildтипыработQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildтипыработQuery orderByтипработ($order = Criteria::ASC) Order by the Тип_работ column
 * @method     ChildтипыработQuery orderByединицыизмерения($order = Criteria::ASC) Order by the Единицы_измерения column
 * @method     ChildтипыработQuery orderByотображение($order = Criteria::ASC) Order by the Отображение column
 *
 * @method     ChildтипыработQuery groupById() Group by the id column
 * @method     ChildтипыработQuery groupByтипработ() Group by the Тип_работ column
 * @method     ChildтипыработQuery groupByединицыизмерения() Group by the Единицы_измерения column
 * @method     ChildтипыработQuery groupByотображение() Group by the Отображение column
 *
 * @method     ChildтипыработQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildтипыработQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildтипыработQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildтипыработQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildтипыработQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildтипыработQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildтипыработQuery leftJoinвыработка($relationAlias = null) Adds a LEFT JOIN clause to the query using the выработка relation
 * @method     ChildтипыработQuery rightJoinвыработка($relationAlias = null) Adds a RIGHT JOIN clause to the query using the выработка relation
 * @method     ChildтипыработQuery innerJoinвыработка($relationAlias = null) Adds a INNER JOIN clause to the query using the выработка relation
 *
 * @method     ChildтипыработQuery joinWithвыработка($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the выработка relation
 *
 * @method     ChildтипыработQuery leftJoinWithвыработка() Adds a LEFT JOIN clause and with to the query using the выработка relation
 * @method     ChildтипыработQuery rightJoinWithвыработка() Adds a RIGHT JOIN clause and with to the query using the выработка relation
 * @method     ChildтипыработQuery innerJoinWithвыработка() Adds a INNER JOIN clause and with to the query using the выработка relation
 *
 * @method     ChildтипыработQuery leftJoinфизическиеобъёмы($relationAlias = null) Adds a LEFT JOIN clause to the query using the физическиеобъёмы relation
 * @method     ChildтипыработQuery rightJoinфизическиеобъёмы($relationAlias = null) Adds a RIGHT JOIN clause to the query using the физическиеобъёмы relation
 * @method     ChildтипыработQuery innerJoinфизическиеобъёмы($relationAlias = null) Adds a INNER JOIN clause to the query using the физическиеобъёмы relation
 *
 * @method     ChildтипыработQuery joinWithфизическиеобъёмы($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the физическиеобъёмы relation
 *
 * @method     ChildтипыработQuery leftJoinWithфизическиеобъёмы() Adds a LEFT JOIN clause and with to the query using the физическиеобъёмы relation
 * @method     ChildтипыработQuery rightJoinWithфизическиеобъёмы() Adds a RIGHT JOIN clause and with to the query using the физическиеобъёмы relation
 * @method     ChildтипыработQuery innerJoinWithфизическиеобъёмы() Adds a INNER JOIN clause and with to the query using the физическиеобъёмы relation
 *
 * @method     \выработкаQuery|\физическиеобъёмыQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childтипыработ findOne(ConnectionInterface $con = null) Return the first Childтипыработ matching the query
 * @method     Childтипыработ findOneOrCreate(ConnectionInterface $con = null) Return the first Childтипыработ matching the query, or a new Childтипыработ object populated from the query conditions when no match is found
 *
 * @method     Childтипыработ findOneById(int $id) Return the first Childтипыработ filtered by the id column
 * @method     Childтипыработ findOneByтипработ(string $Тип_работ) Return the first Childтипыработ filtered by the Тип_работ column
 * @method     Childтипыработ findOneByединицыизмерения(string $Единицы_измерения) Return the first Childтипыработ filtered by the Единицы_измерения column
 * @method     Childтипыработ findOneByотображение(boolean $Отображение) Return the first Childтипыработ filtered by the Отображение column *

 * @method     Childтипыработ requirePk($key, ConnectionInterface $con = null) Return the Childтипыработ by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childтипыработ requireOne(ConnectionInterface $con = null) Return the first Childтипыработ matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childтипыработ requireOneById(int $id) Return the first Childтипыработ filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childтипыработ requireOneByтипработ(string $Тип_работ) Return the first Childтипыработ filtered by the Тип_работ column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childтипыработ requireOneByединицыизмерения(string $Единицы_измерения) Return the first Childтипыработ filtered by the Единицы_измерения column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childтипыработ requireOneByотображение(boolean $Отображение) Return the first Childтипыработ filtered by the Отображение column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childтипыработ[]|ObjectCollection find(ConnectionInterface $con = null) Return Childтипыработ objects based on current ModelCriteria
 * @method     Childтипыработ[]|ObjectCollection findById(int $id) Return Childтипыработ objects filtered by the id column
 * @method     Childтипыработ[]|ObjectCollection findByтипработ(string $Тип_работ) Return Childтипыработ objects filtered by the Тип_работ column
 * @method     Childтипыработ[]|ObjectCollection findByединицыизмерения(string $Единицы_измерения) Return Childтипыработ objects filtered by the Единицы_измерения column
 * @method     Childтипыработ[]|ObjectCollection findByотображение(boolean $Отображение) Return Childтипыработ objects filtered by the Отображение column
 * @method     Childтипыработ[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class типыработQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\типыработQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\типыработ', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildтипыработQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildтипыработQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildтипыработQuery) {
            return $criteria;
        }
        $query = new ChildтипыработQuery();
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
     * @return Childтипыработ|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = типыработTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(типыработTableMap::DATABASE_NAME);
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
     * @return Childтипыработ A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Тип_работ, Единицы_измерения, Отображение FROM Типы_работ WHERE id = :p0';
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
            /** @var Childтипыработ $obj */
            $obj = new Childтипыработ();
            $obj->hydrate($row);
            типыработTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return Childтипыработ|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildтипыработQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(типыработTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildтипыработQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(типыработTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildтипыработQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(типыработTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(типыработTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(типыработTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Тип_работ column
     *
     * Example usage:
     * <code>
     * $query->filterByтипработ('fooValue');   // WHERE Тип_работ = 'fooValue'
     * $query->filterByтипработ('%fooValue%'); // WHERE Тип_работ LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ипработ The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildтипыработQuery The current query, for fluid interface
     */
    public function filterByтипработ($�ипработ = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ипработ)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ипработ)) {
                $�ипработ = str_replace('*', '%', $�ипработ);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(типыработTableMap::COL_ТИП_РАБОТ, $�ипработ, $comparison);
    }

    /**
     * Filter the query on the Единицы_измерения column
     *
     * Example usage:
     * <code>
     * $query->filterByединицыизмерения('fooValue');   // WHERE Единицы_измерения = 'fooValue'
     * $query->filterByединицыизмерения('%fooValue%'); // WHERE Единицы_измерения LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�диницыизмерения The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildтипыработQuery The current query, for fluid interface
     */
    public function filterByединицыизмерения($�диницыизмерения = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�диницыизмерения)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�диницыизмерения)) {
                $�диницыизмерения = str_replace('*', '%', $�диницыизмерения);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(типыработTableMap::COL_ЕДИНИЦЫ_ИЗМЕРЕНИЯ, $�диницыизмерения, $comparison);
    }

    /**
     * Filter the query on the Отображение column
     *
     * Example usage:
     * <code>
     * $query->filterByотображение(true); // WHERE Отображение = true
     * $query->filterByотображение('yes'); // WHERE Отображение = true
     * </code>
     *
     * @param     boolean|string $�тображение The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildтипыработQuery The current query, for fluid interface
     */
    public function filterByотображение($�тображение = null, $comparison = null)
    {
        if (is_string($�тображение)) {
            $�тображение = in_array(strtolower($�тображение), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(типыработTableMap::COL_ОТОБРАЖЕНИЕ, $�тображение, $comparison);
    }

    /**
     * Filter the query by a related \выработка object
     *
     * @param \выработка|ObjectCollection $�ыработка the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildтипыработQuery The current query, for fluid interface
     */
    public function filterByвыработка($�ыработка, $comparison = null)
    {
        if ($�ыработка instanceof \выработка) {
            return $this
                ->addUsingAlias(типыработTableMap::COL_ID, $�ыработка->getтипработ(), $comparison);
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
     * @return $this|ChildтипыработQuery The current query, for fluid interface
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
     * Filter the query by a related \физическиеобъёмы object
     *
     * @param \физическиеобъёмы|ObjectCollection $�изическиеобъёмы the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildтипыработQuery The current query, for fluid interface
     */
    public function filterByфизическиеобъёмы($�изическиеобъёмы, $comparison = null)
    {
        if ($�изическиеобъёмы instanceof \физическиеобъёмы) {
            return $this
                ->addUsingAlias(типыработTableMap::COL_ID, $�изическиеобъёмы->getтипработ(), $comparison);
        } elseif ($�изическиеобъёмы instanceof ObjectCollection) {
            return $this
                ->useфизическиеобъёмыQuery()
                ->filterByPrimaryKeys($�изическиеобъёмы->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByфизическиеобъёмы() only accepts arguments of type \физическиеобъёмы or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the физическиеобъёмы relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildтипыработQuery The current query, for fluid interface
     */
    public function joinфизическиеобъёмы($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('физическиеобъёмы');

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
            $this->addJoinObject($join, 'физическиеобъёмы');
        }

        return $this;
    }

    /**
     * Use the физическиеобъёмы relation физическиеобъёмы object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \физическиеобъёмыQuery A secondary query class using the current class as primary query
     */
    public function useфизическиеобъёмыQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinфизическиеобъёмы($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'физическиеобъёмы', '\физическиеобъёмыQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Childтипыработ $�ипыработ Object to remove from the list of results
     *
     * @return $this|ChildтипыработQuery The current query, for fluid interface
     */
    public function prune($�ипыработ = null)
    {
        if ($�ипыработ) {
            $this->addUsingAlias(типыработTableMap::COL_ID, $�ипыработ->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Типы_работ table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(типыработTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            типыработTableMap::clearInstancePool();
            типыработTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(типыработTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(типыработTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            типыработTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            типыработTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // типыработQuery
