<?php

namespace Base;

use \участкиработ as Childучасткиработ;
use \участкиработQuery as ChildучасткиработQuery;
use \Exception;
use \PDO;
use Map\участкиработTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Участки_работ' table.
 *
 * 
 *
 * @method     ChildучасткиработQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildучасткиработQuery orderByучастокработ($order = Criteria::ASC) Order by the Участок_работ column
 * @method     ChildучасткиработQuery orderByпроект($order = Criteria::ASC) Order by the Проект column
 *
 * @method     ChildучасткиработQuery groupById() Group by the id column
 * @method     ChildучасткиработQuery groupByучастокработ() Group by the Участок_работ column
 * @method     ChildучасткиработQuery groupByпроект() Group by the Проект column
 *
 * @method     ChildучасткиработQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildучасткиработQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildучасткиработQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildучасткиработQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildучасткиработQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildучасткиработQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildучасткиработQuery leftJoinПроекты($relationAlias = null) Adds a LEFT JOIN clause to the query using the Проекты relation
 * @method     ChildучасткиработQuery rightJoinПроекты($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Проекты relation
 * @method     ChildучасткиработQuery innerJoinПроекты($relationAlias = null) Adds a INNER JOIN clause to the query using the Проекты relation
 *
 * @method     ChildучасткиработQuery joinWithПроекты($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Проекты relation
 *
 * @method     ChildучасткиработQuery leftJoinWithПроекты() Adds a LEFT JOIN clause and with to the query using the Проекты relation
 * @method     ChildучасткиработQuery rightJoinWithПроекты() Adds a RIGHT JOIN clause and with to the query using the Проекты relation
 * @method     ChildучасткиработQuery innerJoinWithПроекты() Adds a INNER JOIN clause and with to the query using the Проекты relation
 *
 * @method     ChildучасткиработQuery leftJoinвыработка($relationAlias = null) Adds a LEFT JOIN clause to the query using the выработка relation
 * @method     ChildучасткиработQuery rightJoinвыработка($relationAlias = null) Adds a RIGHT JOIN clause to the query using the выработка relation
 * @method     ChildучасткиработQuery innerJoinвыработка($relationAlias = null) Adds a INNER JOIN clause to the query using the выработка relation
 *
 * @method     ChildучасткиработQuery joinWithвыработка($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the выработка relation
 *
 * @method     ChildучасткиработQuery leftJoinWithвыработка() Adds a LEFT JOIN clause and with to the query using the выработка relation
 * @method     ChildучасткиработQuery rightJoinWithвыработка() Adds a RIGHT JOIN clause and with to the query using the выработка relation
 * @method     ChildучасткиработQuery innerJoinWithвыработка() Adds a INNER JOIN clause and with to the query using the выработка relation
 *
 * @method     ChildучасткиработQuery leftJoinфизическиеобъёмы($relationAlias = null) Adds a LEFT JOIN clause to the query using the физическиеобъёмы relation
 * @method     ChildучасткиработQuery rightJoinфизическиеобъёмы($relationAlias = null) Adds a RIGHT JOIN clause to the query using the физическиеобъёмы relation
 * @method     ChildучасткиработQuery innerJoinфизическиеобъёмы($relationAlias = null) Adds a INNER JOIN clause to the query using the физическиеобъёмы relation
 *
 * @method     ChildучасткиработQuery joinWithфизическиеобъёмы($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the физическиеобъёмы relation
 *
 * @method     ChildучасткиработQuery leftJoinWithфизическиеобъёмы() Adds a LEFT JOIN clause and with to the query using the физическиеобъёмы relation
 * @method     ChildучасткиработQuery rightJoinWithфизическиеобъёмы() Adds a RIGHT JOIN clause and with to the query using the физическиеобъёмы relation
 * @method     ChildучасткиработQuery innerJoinWithфизическиеобъёмы() Adds a INNER JOIN clause and with to the query using the физическиеобъёмы relation
 *
 * @method     \ПроектыQuery|\выработкаQuery|\физическиеобъёмыQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childучасткиработ findOne(ConnectionInterface $con = null) Return the first Childучасткиработ matching the query
 * @method     Childучасткиработ findOneOrCreate(ConnectionInterface $con = null) Return the first Childучасткиработ matching the query, or a new Childучасткиработ object populated from the query conditions when no match is found
 *
 * @method     Childучасткиработ findOneById(int $id) Return the first Childучасткиработ filtered by the id column
 * @method     Childучасткиработ findOneByучастокработ(string $Участок_работ) Return the first Childучасткиработ filtered by the Участок_работ column
 * @method     Childучасткиработ findOneByпроект(int $Проект) Return the first Childучасткиработ filtered by the Проект column *

 * @method     Childучасткиработ requirePk($key, ConnectionInterface $con = null) Return the Childучасткиработ by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childучасткиработ requireOne(ConnectionInterface $con = null) Return the first Childучасткиработ matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childучасткиработ requireOneById(int $id) Return the first Childучасткиработ filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childучасткиработ requireOneByучастокработ(string $Участок_работ) Return the first Childучасткиработ filtered by the Участок_работ column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childучасткиработ requireOneByпроект(int $Проект) Return the first Childучасткиработ filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childучасткиработ[]|ObjectCollection find(ConnectionInterface $con = null) Return Childучасткиработ objects based on current ModelCriteria
 * @method     Childучасткиработ[]|ObjectCollection findById(int $id) Return Childучасткиработ objects filtered by the id column
 * @method     Childучасткиработ[]|ObjectCollection findByучастокработ(string $Участок_работ) Return Childучасткиработ objects filtered by the Участок_работ column
 * @method     Childучасткиработ[]|ObjectCollection findByпроект(int $Проект) Return Childучасткиработ objects filtered by the Проект column
 * @method     Childучасткиработ[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class участкиработQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\участкиработQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\участкиработ', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildучасткиработQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildучасткиработQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildучасткиработQuery) {
            return $criteria;
        }
        $query = new ChildучасткиработQuery();
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
     * @return Childучасткиработ|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = участкиработTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(участкиработTableMap::DATABASE_NAME);
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
     * @return Childучасткиработ A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Участок_работ, Проект FROM Участки_работ WHERE id = :p0';
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
            /** @var Childучасткиработ $obj */
            $obj = new Childучасткиработ();
            $obj->hydrate($row);
            участкиработTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return Childучасткиработ|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildучасткиработQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(участкиработTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildучасткиработQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(участкиработTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildучасткиработQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(участкиработTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(участкиработTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(участкиработTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Участок_работ column
     *
     * Example usage:
     * <code>
     * $query->filterByучастокработ('fooValue');   // WHERE Участок_работ = 'fooValue'
     * $query->filterByучастокработ('%fooValue%'); // WHERE Участок_работ LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�частокработ The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildучасткиработQuery The current query, for fluid interface
     */
    public function filterByучастокработ($�частокработ = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�частокработ)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�частокработ)) {
                $�частокработ = str_replace('*', '%', $�частокработ);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(участкиработTableMap::COL_УЧАСТОК_РАБОТ, $�частокработ, $comparison);
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
     * @return $this|ChildучасткиработQuery The current query, for fluid interface
     */
    public function filterByпроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(участкиработTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(участкиработTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(участкиработTableMap::COL_ПРОЕКТ, $�роект, $comparison);
    }

    /**
     * Filter the query by a related \Проекты object
     *
     * @param \Проекты|ObjectCollection $�роекты The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildучасткиработQuery The current query, for fluid interface
     */
    public function filterByПроекты($�роекты, $comparison = null)
    {
        if ($�роекты instanceof \Проекты) {
            return $this
                ->addUsingAlias(участкиработTableMap::COL_ПРОЕКТ, $�роекты->getId(), $comparison);
        } elseif ($�роекты instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(участкиработTableMap::COL_ПРОЕКТ, $�роекты->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildучасткиработQuery The current query, for fluid interface
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
     * Filter the query by a related \выработка object
     *
     * @param \выработка|ObjectCollection $�ыработка the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildучасткиработQuery The current query, for fluid interface
     */
    public function filterByвыработка($�ыработка, $comparison = null)
    {
        if ($�ыработка instanceof \выработка) {
            return $this
                ->addUsingAlias(участкиработTableMap::COL_ID, $�ыработка->getучастокработ(), $comparison);
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
     * @return $this|ChildучасткиработQuery The current query, for fluid interface
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
     * @return ChildучасткиработQuery The current query, for fluid interface
     */
    public function filterByфизическиеобъёмы($�изическиеобъёмы, $comparison = null)
    {
        if ($�изическиеобъёмы instanceof \физическиеобъёмы) {
            return $this
                ->addUsingAlias(участкиработTableMap::COL_ID, $�изическиеобъёмы->getучастокработ(), $comparison);
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
     * @return $this|ChildучасткиработQuery The current query, for fluid interface
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
     * @param   Childучасткиработ $�часткиработ Object to remove from the list of results
     *
     * @return $this|ChildучасткиработQuery The current query, for fluid interface
     */
    public function prune($�часткиработ = null)
    {
        if ($�часткиработ) {
            $this->addUsingAlias(участкиработTableMap::COL_ID, $�часткиработ->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Участки_работ table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(участкиработTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            участкиработTableMap::clearInstancePool();
            участкиработTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(участкиработTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(участкиработTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            участкиработTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            участкиработTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // участкиработQuery
