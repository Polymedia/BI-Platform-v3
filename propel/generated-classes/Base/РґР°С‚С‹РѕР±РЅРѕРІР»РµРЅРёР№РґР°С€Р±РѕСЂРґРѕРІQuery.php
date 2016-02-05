<?php

namespace Base;

use \датыобновленийдашбордов as Childдатыобновленийдашбордов;
use \датыобновленийдашбордовQuery as ChildдатыобновленийдашбордовQuery;
use \Exception;
use \PDO;
use Map\датыобновленийдашбордовTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Даты_обновлений_дашбордов' table.
 *
 * 
 *
 * @method     ChildдатыобновленийдашбордовQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildдатыобновленийдашбордовQuery orderByдашборд($order = Criteria::ASC) Order by the Дашборд column
 * @method     ChildдатыобновленийдашбордовQuery orderByпроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildдатыобновленийдашбордовQuery orderByдата($order = Criteria::ASC) Order by the Дата column
 *
 * @method     ChildдатыобновленийдашбордовQuery groupById() Group by the id column
 * @method     ChildдатыобновленийдашбордовQuery groupByдашборд() Group by the Дашборд column
 * @method     ChildдатыобновленийдашбордовQuery groupByпроект() Group by the Проект column
 * @method     ChildдатыобновленийдашбордовQuery groupByдата() Group by the Дата column
 *
 * @method     ChildдатыобновленийдашбордовQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildдатыобновленийдашбордовQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildдатыобновленийдашбордовQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildдатыобновленийдашбордовQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildдатыобновленийдашбордовQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildдатыобновленийдашбордовQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildдатыобновленийдашбордовQuery leftJoinПроекты($relationAlias = null) Adds a LEFT JOIN clause to the query using the Проекты relation
 * @method     ChildдатыобновленийдашбордовQuery rightJoinПроекты($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Проекты relation
 * @method     ChildдатыобновленийдашбордовQuery innerJoinПроекты($relationAlias = null) Adds a INNER JOIN clause to the query using the Проекты relation
 *
 * @method     ChildдатыобновленийдашбордовQuery joinWithПроекты($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Проекты relation
 *
 * @method     ChildдатыобновленийдашбордовQuery leftJoinWithПроекты() Adds a LEFT JOIN clause and with to the query using the Проекты relation
 * @method     ChildдатыобновленийдашбордовQuery rightJoinWithПроекты() Adds a RIGHT JOIN clause and with to the query using the Проекты relation
 * @method     ChildдатыобновленийдашбордовQuery innerJoinWithПроекты() Adds a INNER JOIN clause and with to the query using the Проекты relation
 *
 * @method     ChildдатыобновленийдашбордовQuery leftJoinКалендарь($relationAlias = null) Adds a LEFT JOIN clause to the query using the Календарь relation
 * @method     ChildдатыобновленийдашбордовQuery rightJoinКалендарь($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Календарь relation
 * @method     ChildдатыобновленийдашбордовQuery innerJoinКалендарь($relationAlias = null) Adds a INNER JOIN clause to the query using the Календарь relation
 *
 * @method     ChildдатыобновленийдашбордовQuery joinWithКалендарь($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Календарь relation
 *
 * @method     ChildдатыобновленийдашбордовQuery leftJoinWithКалендарь() Adds a LEFT JOIN clause and with to the query using the Календарь relation
 * @method     ChildдатыобновленийдашбордовQuery rightJoinWithКалендарь() Adds a RIGHT JOIN clause and with to the query using the Календарь relation
 * @method     ChildдатыобновленийдашбордовQuery innerJoinWithКалендарь() Adds a INNER JOIN clause and with to the query using the Календарь relation
 *
 * @method     \ПроектыQuery|\КалендарьQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     Childдатыобновленийдашбордов findOne(ConnectionInterface $con = null) Return the first Childдатыобновленийдашбордов matching the query
 * @method     Childдатыобновленийдашбордов findOneOrCreate(ConnectionInterface $con = null) Return the first Childдатыобновленийдашбордов matching the query, or a new Childдатыобновленийдашбордов object populated from the query conditions when no match is found
 *
 * @method     Childдатыобновленийдашбордов findOneById(int $id) Return the first Childдатыобновленийдашбордов filtered by the id column
 * @method     Childдатыобновленийдашбордов findOneByдашборд(string $Дашборд) Return the first Childдатыобновленийдашбордов filtered by the Дашборд column
 * @method     Childдатыобновленийдашбордов findOneByпроект(int $Проект) Return the first Childдатыобновленийдашбордов filtered by the Проект column
 * @method     Childдатыобновленийдашбордов findOneByдата(string $Дата) Return the first Childдатыобновленийдашбордов filtered by the Дата column *

 * @method     Childдатыобновленийдашбордов requirePk($key, ConnectionInterface $con = null) Return the Childдатыобновленийдашбордов by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childдатыобновленийдашбордов requireOne(ConnectionInterface $con = null) Return the first Childдатыобновленийдашбордов matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childдатыобновленийдашбордов requireOneById(int $id) Return the first Childдатыобновленийдашбордов filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childдатыобновленийдашбордов requireOneByдашборд(string $Дашборд) Return the first Childдатыобновленийдашбордов filtered by the Дашборд column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childдатыобновленийдашбордов requireOneByпроект(int $Проект) Return the first Childдатыобновленийдашбордов filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     Childдатыобновленийдашбордов requireOneByдата(string $Дата) Return the first Childдатыобновленийдашбордов filtered by the Дата column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     Childдатыобновленийдашбордов[]|ObjectCollection find(ConnectionInterface $con = null) Return Childдатыобновленийдашбордов objects based on current ModelCriteria
 * @method     Childдатыобновленийдашбордов[]|ObjectCollection findById(int $id) Return Childдатыобновленийдашбордов objects filtered by the id column
 * @method     Childдатыобновленийдашбордов[]|ObjectCollection findByдашборд(string $Дашборд) Return Childдатыобновленийдашбордов objects filtered by the Дашборд column
 * @method     Childдатыобновленийдашбордов[]|ObjectCollection findByпроект(int $Проект) Return Childдатыобновленийдашбордов objects filtered by the Проект column
 * @method     Childдатыобновленийдашбордов[]|ObjectCollection findByдата(string $Дата) Return Childдатыобновленийдашбордов objects filtered by the Дата column
 * @method     Childдатыобновленийдашбордов[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class датыобновленийдашбордовQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\датыобновленийдашбордовQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\датыобновленийдашбордов', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildдатыобновленийдашбордовQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildдатыобновленийдашбордовQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildдатыобновленийдашбордовQuery) {
            return $criteria;
        }
        $query = new ChildдатыобновленийдашбордовQuery();
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
     * @return Childдатыобновленийдашбордов|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = датыобновленийдашбордовTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(датыобновленийдашбордовTableMap::DATABASE_NAME);
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
     * @return Childдатыобновленийдашбордов A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, Дашборд, Проект, Дата FROM Даты_обновлений_дашбордов WHERE id = :p0';
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
            /** @var Childдатыобновленийдашбордов $obj */
            $obj = new Childдатыобновленийдашбордов();
            $obj->hydrate($row);
            датыобновленийдашбордовTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return Childдатыобновленийдашбордов|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildдатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildдатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildдатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Дашборд column
     *
     * Example usage:
     * <code>
     * $query->filterByдашборд('fooValue');   // WHERE Дашборд = 'fooValue'
     * $query->filterByдашборд('%fooValue%'); // WHERE Дашборд LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ашборд The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildдатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterByдашборд($�ашборд = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ашборд)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ашборд)) {
                $�ашборд = str_replace('*', '%', $�ашборд);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ДАШБОРД, $�ашборд, $comparison);
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
     * @return $this|ChildдатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterByпроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ПРОЕКТ, $�роект, $comparison);
    }

    /**
     * Filter the query on the Дата column
     *
     * Example usage:
     * <code>
     * $query->filterByдата('2011-03-14'); // WHERE Дата = '2011-03-14'
     * $query->filterByдата('now'); // WHERE Дата = '2011-03-14'
     * $query->filterByдата(array('max' => 'yesterday')); // WHERE Дата > '2011-03-13'
     * </code>
     *
     * @param     mixed $�ата The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildдатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterByдата($�ата = null, $comparison = null)
    {
        if (is_array($�ата)) {
            $useMinMax = false;
            if (isset($�ата['min'])) {
                $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ДАТА, $�ата['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ата['max'])) {
                $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ДАТА, $�ата['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ДАТА, $�ата, $comparison);
    }

    /**
     * Filter the query by a related \Проекты object
     *
     * @param \Проекты|ObjectCollection $�роекты The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildдатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterByПроекты($�роекты, $comparison = null)
    {
        if ($�роекты instanceof \Проекты) {
            return $this
                ->addUsingAlias(датыобновленийдашбордовTableMap::COL_ПРОЕКТ, $�роекты->getId(), $comparison);
        } elseif ($�роекты instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(датыобновленийдашбордовTableMap::COL_ПРОЕКТ, $�роекты->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildдатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function joinПроекты($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useПроектыQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinПроекты($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Проекты', '\ПроектыQuery');
    }

    /**
     * Filter the query by a related \Календарь object
     *
     * @param \Календарь|ObjectCollection $�алендарь The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildдатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function filterByКалендарь($�алендарь, $comparison = null)
    {
        if ($�алендарь instanceof \Календарь) {
            return $this
                ->addUsingAlias(датыобновленийдашбордовTableMap::COL_ДАТА, $�алендарь->getдата(), $comparison);
        } elseif ($�алендарь instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(датыобновленийдашбордовTableMap::COL_ДАТА, $�алендарь->toKeyValue('PrimaryKey', 'дата'), $comparison);
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
     * @return $this|ChildдатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function joinКалендарь($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useКалендарьQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinКалендарь($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Календарь', '\КалендарьQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Childдатыобновленийдашбордов $�атыобновленийдашбордов Object to remove from the list of results
     *
     * @return $this|ChildдатыобновленийдашбордовQuery The current query, for fluid interface
     */
    public function prune($�атыобновленийдашбордов = null)
    {
        if ($�атыобновленийдашбордов) {
            $this->addUsingAlias(датыобновленийдашбордовTableMap::COL_ID, $�атыобновленийдашбордов->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Даты_обновлений_дашбордов table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(датыобновленийдашбордовTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            датыобновленийдашбордовTableMap::clearInstancePool();
            датыобновленийдашбордовTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(датыобновленийдашбордовTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(датыобновленийдашбордовTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            датыобновленийдашбордовTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            датыобновленийдашбордовTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // датыобновленийдашбордовQuery
