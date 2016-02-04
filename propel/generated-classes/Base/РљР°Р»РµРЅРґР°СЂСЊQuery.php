<?php

namespace Base;

use \Календарь as ChildКалендарь;
use \КалендарьQuery as ChildКалендарьQuery;
use \Exception;
use \PDO;
use Map\КалендарьTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Календарь' table.
 *
 * 
 *
 * @method     ChildКалендарьQuery orderByДата($order = Criteria::ASC) Order by the Дата column
 * @method     ChildКалендарьQuery orderByГод($order = Criteria::ASC) Order by the Год column
 * @method     ChildКалендарьQuery orderByПолугодие($order = Criteria::ASC) Order by the Полугодие column
 * @method     ChildКалендарьQuery orderByКвартал($order = Criteria::ASC) Order by the Квартал column
 * @method     ChildКалендарьQuery orderByНомермесяца($order = Criteria::ASC) Order by the НомерМесяца column
 * @method     ChildКалендарьQuery orderByМесяц($order = Criteria::ASC) Order by the Месяц column
 * @method     ChildКалендарьQuery orderByДень($order = Criteria::ASC) Order by the День column
 * @method     ChildКалендарьQuery orderByНомернедели($order = Criteria::ASC) Order by the НомерНедели column
 * @method     ChildКалендарьQuery orderByДеньнедели($order = Criteria::ASC) Order by the ДеньНедели column
 * @method     ChildКалендарьQuery orderByДеньвгоду($order = Criteria::ASC) Order by the ДеньВГоду column
 *
 * @method     ChildКалендарьQuery groupByДата() Group by the Дата column
 * @method     ChildКалендарьQuery groupByГод() Group by the Год column
 * @method     ChildКалендарьQuery groupByПолугодие() Group by the Полугодие column
 * @method     ChildКалендарьQuery groupByКвартал() Group by the Квартал column
 * @method     ChildКалендарьQuery groupByНомермесяца() Group by the НомерМесяца column
 * @method     ChildКалендарьQuery groupByМесяц() Group by the Месяц column
 * @method     ChildКалендарьQuery groupByДень() Group by the День column
 * @method     ChildКалендарьQuery groupByНомернедели() Group by the НомерНедели column
 * @method     ChildКалендарьQuery groupByДеньнедели() Group by the ДеньНедели column
 * @method     ChildКалендарьQuery groupByДеньвгоду() Group by the ДеньВГоду column
 *
 * @method     ChildКалендарьQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildКалендарьQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildКалендарьQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildКалендарьQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildКалендарьQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildКалендарьQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildКалендарь findOne(ConnectionInterface $con = null) Return the first ChildКалендарь matching the query
 * @method     ChildКалендарь findOneOrCreate(ConnectionInterface $con = null) Return the first ChildКалендарь matching the query, or a new ChildКалендарь object populated from the query conditions when no match is found
 *
 * @method     ChildКалендарь findOneByДата(string $Дата) Return the first ChildКалендарь filtered by the Дата column
 * @method     ChildКалендарь findOneByГод(int $Год) Return the first ChildКалендарь filtered by the Год column
 * @method     ChildКалендарь findOneByПолугодие(int $Полугодие) Return the first ChildКалендарь filtered by the Полугодие column
 * @method     ChildКалендарь findOneByКвартал(int $Квартал) Return the first ChildКалендарь filtered by the Квартал column
 * @method     ChildКалендарь findOneByНомермесяца(int $НомерМесяца) Return the first ChildКалендарь filtered by the НомерМесяца column
 * @method     ChildКалендарь findOneByМесяц(string $Месяц) Return the first ChildКалендарь filtered by the Месяц column
 * @method     ChildКалендарь findOneByДень(int $День) Return the first ChildКалендарь filtered by the День column
 * @method     ChildКалендарь findOneByНомернедели(int $НомерНедели) Return the first ChildКалендарь filtered by the НомерНедели column
 * @method     ChildКалендарь findOneByДеньнедели(int $ДеньНедели) Return the first ChildКалендарь filtered by the ДеньНедели column
 * @method     ChildКалендарь findOneByДеньвгоду(int $ДеньВГоду) Return the first ChildКалендарь filtered by the ДеньВГоду column *

 * @method     ChildКалендарь requirePk($key, ConnectionInterface $con = null) Return the ChildКалендарь by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOne(ConnectionInterface $con = null) Return the first ChildКалендарь matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildКалендарь requireOneByДата(string $Дата) Return the first ChildКалендарь filtered by the Дата column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByГод(int $Год) Return the first ChildКалендарь filtered by the Год column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByПолугодие(int $Полугодие) Return the first ChildКалендарь filtered by the Полугодие column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByКвартал(int $Квартал) Return the first ChildКалендарь filtered by the Квартал column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByНомермесяца(int $НомерМесяца) Return the first ChildКалендарь filtered by the НомерМесяца column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByМесяц(string $Месяц) Return the first ChildКалендарь filtered by the Месяц column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByДень(int $День) Return the first ChildКалендарь filtered by the День column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByНомернедели(int $НомерНедели) Return the first ChildКалендарь filtered by the НомерНедели column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByДеньнедели(int $ДеньНедели) Return the first ChildКалендарь filtered by the ДеньНедели column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildКалендарь requireOneByДеньвгоду(int $ДеньВГоду) Return the first ChildКалендарь filtered by the ДеньВГоду column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildКалендарь[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildКалендарь objects based on current ModelCriteria
 * @method     ChildКалендарь[]|ObjectCollection findByДата(string $Дата) Return ChildКалендарь objects filtered by the Дата column
 * @method     ChildКалендарь[]|ObjectCollection findByГод(int $Год) Return ChildКалендарь objects filtered by the Год column
 * @method     ChildКалендарь[]|ObjectCollection findByПолугодие(int $Полугодие) Return ChildКалендарь objects filtered by the Полугодие column
 * @method     ChildКалендарь[]|ObjectCollection findByКвартал(int $Квартал) Return ChildКалендарь objects filtered by the Квартал column
 * @method     ChildКалендарь[]|ObjectCollection findByНомермесяца(int $НомерМесяца) Return ChildКалендарь objects filtered by the НомерМесяца column
 * @method     ChildКалендарь[]|ObjectCollection findByМесяц(string $Месяц) Return ChildКалендарь objects filtered by the Месяц column
 * @method     ChildКалендарь[]|ObjectCollection findByДень(int $День) Return ChildКалендарь objects filtered by the День column
 * @method     ChildКалендарь[]|ObjectCollection findByНомернедели(int $НомерНедели) Return ChildКалендарь objects filtered by the НомерНедели column
 * @method     ChildКалендарь[]|ObjectCollection findByДеньнедели(int $ДеньНедели) Return ChildКалендарь objects filtered by the ДеньНедели column
 * @method     ChildКалендарь[]|ObjectCollection findByДеньвгоду(int $ДеньВГоду) Return ChildКалендарь objects filtered by the ДеньВГоду column
 * @method     ChildКалендарь[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class КалендарьQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\КалендарьQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Календарь', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildКалендарьQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildКалендарьQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildКалендарьQuery) {
            return $criteria;
        }
        $query = new ChildКалендарьQuery();
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
     * @return ChildКалендарь|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = КалендарьTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(КалендарьTableMap::DATABASE_NAME);
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
     * @return ChildКалендарь A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Дата, Год, Полугодие, Квартал, НомерМесяца, Месяц, День, НомерНедели, ДеньНедели, ДеньВГоду FROM Календарь WHERE Дата = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key ? $key->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildКалендарь $obj */
            $obj = new ChildКалендарь();
            $obj->hydrate($row);
            КалендарьTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildКалендарь|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(КалендарьTableMap::COL_ДАТА, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(КалендарьTableMap::COL_ДАТА, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Дата column
     *
     * Example usage:
     * <code>
     * $query->filterByДата('2011-03-14'); // WHERE Дата = '2011-03-14'
     * $query->filterByДата('now'); // WHERE Дата = '2011-03-14'
     * $query->filterByДата(array('max' => 'yesterday')); // WHERE Дата > '2011-03-13'
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
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByДата($�ата = null, $comparison = null)
    {
        if (is_array($�ата)) {
            $useMinMax = false;
            if (isset($�ата['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�ата['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ата['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�ата['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�ата, $comparison);
    }

    /**
     * Filter the query on the Год column
     *
     * Example usage:
     * <code>
     * $query->filterByГод(1234); // WHERE Год = 1234
     * $query->filterByГод(array(12, 34)); // WHERE Год IN (12, 34)
     * $query->filterByГод(array('min' => 12)); // WHERE Год > 12
     * </code>
     *
     * @param     mixed $�од The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByГод($�од = null, $comparison = null)
    {
        if (is_array($�од)) {
            $useMinMax = false;
            if (isset($�од['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ГОД, $�од['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�од['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ГОД, $�од['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_ГОД, $�од, $comparison);
    }

    /**
     * Filter the query on the Полугодие column
     *
     * Example usage:
     * <code>
     * $query->filterByПолугодие(1234); // WHERE Полугодие = 1234
     * $query->filterByПолугодие(array(12, 34)); // WHERE Полугодие IN (12, 34)
     * $query->filterByПолугодие(array('min' => 12)); // WHERE Полугодие > 12
     * </code>
     *
     * @param     mixed $�олугодие The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByПолугодие($�олугодие = null, $comparison = null)
    {
        if (is_array($�олугодие)) {
            $useMinMax = false;
            if (isset($�олугодие['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ПОЛУГОДИЕ, $�олугодие['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�олугодие['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ПОЛУГОДИЕ, $�олугодие['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_ПОЛУГОДИЕ, $�олугодие, $comparison);
    }

    /**
     * Filter the query on the Квартал column
     *
     * Example usage:
     * <code>
     * $query->filterByКвартал(1234); // WHERE Квартал = 1234
     * $query->filterByКвартал(array(12, 34)); // WHERE Квартал IN (12, 34)
     * $query->filterByКвартал(array('min' => 12)); // WHERE Квартал > 12
     * </code>
     *
     * @param     mixed $�вартал The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByКвартал($�вартал = null, $comparison = null)
    {
        if (is_array($�вартал)) {
            $useMinMax = false;
            if (isset($�вартал['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_КВАРТАЛ, $�вартал['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�вартал['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_КВАРТАЛ, $�вартал['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_КВАРТАЛ, $�вартал, $comparison);
    }

    /**
     * Filter the query on the НомерМесяца column
     *
     * Example usage:
     * <code>
     * $query->filterByНомермесяца(1234); // WHERE НомерМесяца = 1234
     * $query->filterByНомермесяца(array(12, 34)); // WHERE НомерМесяца IN (12, 34)
     * $query->filterByНомермесяца(array('min' => 12)); // WHERE НомерМесяца > 12
     * </code>
     *
     * @param     mixed $�омермесяца The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByНомермесяца($�омермесяца = null, $comparison = null)
    {
        if (is_array($�омермесяца)) {
            $useMinMax = false;
            if (isset($�омермесяца['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_НОМЕРМЕСЯЦА, $�омермесяца['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�омермесяца['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_НОМЕРМЕСЯЦА, $�омермесяца['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_НОМЕРМЕСЯЦА, $�омермесяца, $comparison);
    }

    /**
     * Filter the query on the Месяц column
     *
     * Example usage:
     * <code>
     * $query->filterByМесяц('fooValue');   // WHERE Месяц = 'fooValue'
     * $query->filterByМесяц('%fooValue%'); // WHERE Месяц LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�есяц The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByМесяц($�есяц = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�есяц)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�есяц)) {
                $�есяц = str_replace('*', '%', $�есяц);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_МЕСЯЦ, $�есяц, $comparison);
    }

    /**
     * Filter the query on the День column
     *
     * Example usage:
     * <code>
     * $query->filterByДень(1234); // WHERE День = 1234
     * $query->filterByДень(array(12, 34)); // WHERE День IN (12, 34)
     * $query->filterByДень(array('min' => 12)); // WHERE День > 12
     * </code>
     *
     * @param     mixed $�ень The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByДень($�ень = null, $comparison = null)
    {
        if (is_array($�ень)) {
            $useMinMax = false;
            if (isset($�ень['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ, $�ень['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ень['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ, $�ень['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬ, $�ень, $comparison);
    }

    /**
     * Filter the query on the НомерНедели column
     *
     * Example usage:
     * <code>
     * $query->filterByНомернедели(1234); // WHERE НомерНедели = 1234
     * $query->filterByНомернедели(array(12, 34)); // WHERE НомерНедели IN (12, 34)
     * $query->filterByНомернедели(array('min' => 12)); // WHERE НомерНедели > 12
     * </code>
     *
     * @param     mixed $�омернедели The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByНомернедели($�омернедели = null, $comparison = null)
    {
        if (is_array($�омернедели)) {
            $useMinMax = false;
            if (isset($�омернедели['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_НОМЕРНЕДЕЛИ, $�омернедели['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�омернедели['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_НОМЕРНЕДЕЛИ, $�омернедели['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_НОМЕРНЕДЕЛИ, $�омернедели, $comparison);
    }

    /**
     * Filter the query on the ДеньНедели column
     *
     * Example usage:
     * <code>
     * $query->filterByДеньнедели(1234); // WHERE ДеньНедели = 1234
     * $query->filterByДеньнедели(array(12, 34)); // WHERE ДеньНедели IN (12, 34)
     * $query->filterByДеньнедели(array('min' => 12)); // WHERE ДеньНедели > 12
     * </code>
     *
     * @param     mixed $�еньнедели The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByДеньнедели($�еньнедели = null, $comparison = null)
    {
        if (is_array($�еньнедели)) {
            $useMinMax = false;
            if (isset($�еньнедели['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬНЕДЕЛИ, $�еньнедели['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�еньнедели['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬНЕДЕЛИ, $�еньнедели['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬНЕДЕЛИ, $�еньнедели, $comparison);
    }

    /**
     * Filter the query on the ДеньВГоду column
     *
     * Example usage:
     * <code>
     * $query->filterByДеньвгоду(1234); // WHERE ДеньВГоду = 1234
     * $query->filterByДеньвгоду(array(12, 34)); // WHERE ДеньВГоду IN (12, 34)
     * $query->filterByДеньвгоду(array('min' => 12)); // WHERE ДеньВГоду > 12
     * </code>
     *
     * @param     mixed $�еньвгоду The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function filterByДеньвгоду($�еньвгоду = null, $comparison = null)
    {
        if (is_array($�еньвгоду)) {
            $useMinMax = false;
            if (isset($�еньвгоду['min'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬВГОДУ, $�еньвгоду['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�еньвгоду['max'])) {
                $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬВГОДУ, $�еньвгоду['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(КалендарьTableMap::COL_ДЕНЬВГОДУ, $�еньвгоду, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildКалендарь $�алендарь Object to remove from the list of results
     *
     * @return $this|ChildКалендарьQuery The current query, for fluid interface
     */
    public function prune($�алендарь = null)
    {
        if ($�алендарь) {
            $this->addUsingAlias(КалендарьTableMap::COL_ДАТА, $�алендарь->getДата(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Календарь table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(КалендарьTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            КалендарьTableMap::clearInstancePool();
            КалендарьTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(КалендарьTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(КалендарьTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            КалендарьTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            КалендарьTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // КалендарьQuery
