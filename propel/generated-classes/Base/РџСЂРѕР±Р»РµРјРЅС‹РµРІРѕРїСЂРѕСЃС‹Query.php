<?php

namespace Base;

use \Проблемныевопросы as ChildПроблемныевопросы;
use \ПроблемныевопросыQuery as ChildПроблемныевопросыQuery;
use \Exception;
use Map\ПроблемныевопросыTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ПроблемныеВопросы' table.
 *
 * 
 *
 * @method     ChildПроблемныевопросыQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildПроблемныевопросыQuery orderByПроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildПроблемныевопросыQuery orderByДата($order = Criteria::ASC) Order by the Дата column
 * @method     ChildПроблемныевопросыQuery orderByКому($order = Criteria::ASC) Order by the Кому column
 * @method     ChildПроблемныевопросыQuery orderByПроблемныевопросы($order = Criteria::ASC) Order by the ПроблемныеВопросы column
 * @method     ChildПроблемныевопросыQuery orderByМерыдлярешения($order = Criteria::ASC) Order by the МерыДляРешения column
 * @method     ChildПроблемныевопросыQuery orderByОтветсвенный($order = Criteria::ASC) Order by the Ответсвенный column
 * @method     ChildПроблемныевопросыQuery orderByСрок($order = Criteria::ASC) Order by the Срок column
 * @method     ChildПроблемныевопросыQuery orderByСтатус($order = Criteria::ASC) Order by the Статус column
 *
 * @method     ChildПроблемныевопросыQuery groupById() Group by the id column
 * @method     ChildПроблемныевопросыQuery groupByПроект() Group by the Проект column
 * @method     ChildПроблемныевопросыQuery groupByДата() Group by the Дата column
 * @method     ChildПроблемныевопросыQuery groupByКому() Group by the Кому column
 * @method     ChildПроблемныевопросыQuery groupByПроблемныевопросы() Group by the ПроблемныеВопросы column
 * @method     ChildПроблемныевопросыQuery groupByМерыдлярешения() Group by the МерыДляРешения column
 * @method     ChildПроблемныевопросыQuery groupByОтветсвенный() Group by the Ответсвенный column
 * @method     ChildПроблемныевопросыQuery groupByСрок() Group by the Срок column
 * @method     ChildПроблемныевопросыQuery groupByСтатус() Group by the Статус column
 *
 * @method     ChildПроблемныевопросыQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildПроблемныевопросыQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildПроблемныевопросыQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildПроблемныевопросыQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildПроблемныевопросыQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildПроблемныевопросыQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildПроблемныевопросы findOne(ConnectionInterface $con = null) Return the first ChildПроблемныевопросы matching the query
 * @method     ChildПроблемныевопросы findOneOrCreate(ConnectionInterface $con = null) Return the first ChildПроблемныевопросы matching the query, or a new ChildПроблемныевопросы object populated from the query conditions when no match is found
 *
 * @method     ChildПроблемныевопросы findOneById(int $id) Return the first ChildПроблемныевопросы filtered by the id column
 * @method     ChildПроблемныевопросы findOneByПроект(int $Проект) Return the first ChildПроблемныевопросы filtered by the Проект column
 * @method     ChildПроблемныевопросы findOneByДата(string $Дата) Return the first ChildПроблемныевопросы filtered by the Дата column
 * @method     ChildПроблемныевопросы findOneByКому(string $Кому) Return the first ChildПроблемныевопросы filtered by the Кому column
 * @method     ChildПроблемныевопросы findOneByПроблемныевопросы(string $ПроблемныеВопросы) Return the first ChildПроблемныевопросы filtered by the ПроблемныеВопросы column
 * @method     ChildПроблемныевопросы findOneByМерыдлярешения(string $МерыДляРешения) Return the first ChildПроблемныевопросы filtered by the МерыДляРешения column
 * @method     ChildПроблемныевопросы findOneByОтветсвенный(string $Ответсвенный) Return the first ChildПроблемныевопросы filtered by the Ответсвенный column
 * @method     ChildПроблемныевопросы findOneByСрок(string $Срок) Return the first ChildПроблемныевопросы filtered by the Срок column
 * @method     ChildПроблемныевопросы findOneByСтатус(string $Статус) Return the first ChildПроблемныевопросы filtered by the Статус column *

 * @method     ChildПроблемныевопросы requirePk($key, ConnectionInterface $con = null) Return the ChildПроблемныевопросы by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроблемныевопросы requireOne(ConnectionInterface $con = null) Return the first ChildПроблемныевопросы matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildПроблемныевопросы requireOneById(int $id) Return the first ChildПроблемныевопросы filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроблемныевопросы requireOneByПроект(int $Проект) Return the first ChildПроблемныевопросы filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроблемныевопросы requireOneByДата(string $Дата) Return the first ChildПроблемныевопросы filtered by the Дата column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроблемныевопросы requireOneByКому(string $Кому) Return the first ChildПроблемныевопросы filtered by the Кому column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроблемныевопросы requireOneByПроблемныевопросы(string $ПроблемныеВопросы) Return the first ChildПроблемныевопросы filtered by the ПроблемныеВопросы column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроблемныевопросы requireOneByМерыдлярешения(string $МерыДляРешения) Return the first ChildПроблемныевопросы filtered by the МерыДляРешения column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроблемныевопросы requireOneByОтветсвенный(string $Ответсвенный) Return the first ChildПроблемныевопросы filtered by the Ответсвенный column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроблемныевопросы requireOneByСрок(string $Срок) Return the first ChildПроблемныевопросы filtered by the Срок column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПроблемныевопросы requireOneByСтатус(string $Статус) Return the first ChildПроблемныевопросы filtered by the Статус column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildПроблемныевопросы[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildПроблемныевопросы objects based on current ModelCriteria
 * @method     ChildПроблемныевопросы[]|ObjectCollection findById(int $id) Return ChildПроблемныевопросы objects filtered by the id column
 * @method     ChildПроблемныевопросы[]|ObjectCollection findByПроект(int $Проект) Return ChildПроблемныевопросы objects filtered by the Проект column
 * @method     ChildПроблемныевопросы[]|ObjectCollection findByДата(string $Дата) Return ChildПроблемныевопросы objects filtered by the Дата column
 * @method     ChildПроблемныевопросы[]|ObjectCollection findByКому(string $Кому) Return ChildПроблемныевопросы objects filtered by the Кому column
 * @method     ChildПроблемныевопросы[]|ObjectCollection findByПроблемныевопросы(string $ПроблемныеВопросы) Return ChildПроблемныевопросы objects filtered by the ПроблемныеВопросы column
 * @method     ChildПроблемныевопросы[]|ObjectCollection findByМерыдлярешения(string $МерыДляРешения) Return ChildПроблемныевопросы objects filtered by the МерыДляРешения column
 * @method     ChildПроблемныевопросы[]|ObjectCollection findByОтветсвенный(string $Ответсвенный) Return ChildПроблемныевопросы objects filtered by the Ответсвенный column
 * @method     ChildПроблемныевопросы[]|ObjectCollection findByСрок(string $Срок) Return ChildПроблемныевопросы objects filtered by the Срок column
 * @method     ChildПроблемныевопросы[]|ObjectCollection findByСтатус(string $Статус) Return ChildПроблемныевопросы objects filtered by the Статус column
 * @method     ChildПроблемныевопросы[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ПроблемныевопросыQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ПроблемныевопросыQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Проблемныевопросы', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildПроблемныевопросыQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildПроблемныевопросыQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildПроблемныевопросыQuery) {
            return $criteria;
        }
        $query = new ChildПроблемныевопросыQuery();
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
     * @return ChildПроблемныевопросы|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Проблемныевопросы object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Проблемныевопросы object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildПроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Проблемныевопросы object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildПроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Проблемныевопросы object has no primary key');
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
     * @return $this|ChildПроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ПроблемныевопросыTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ПроблемныевопросыTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПроблемныевопросыTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Проект column
     *
     * Example usage:
     * <code>
     * $query->filterByПроект(1234); // WHERE Проект = 1234
     * $query->filterByПроект(array(12, 34)); // WHERE Проект IN (12, 34)
     * $query->filterByПроект(array('min' => 12)); // WHERE Проект > 12
     * </code>
     *
     * @param     mixed $�роект The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByПроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(ПроблемныевопросыTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(ПроблемныевопросыTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПроблемныевопросыTableMap::COL_ПРОЕКТ, $�роект, $comparison);
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
     * @return $this|ChildПроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByДата($�ата = null, $comparison = null)
    {
        if (is_array($�ата)) {
            $useMinMax = false;
            if (isset($�ата['min'])) {
                $this->addUsingAlias(ПроблемныевопросыTableMap::COL_ДАТА, $�ата['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ата['max'])) {
                $this->addUsingAlias(ПроблемныевопросыTableMap::COL_ДАТА, $�ата['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПроблемныевопросыTableMap::COL_ДАТА, $�ата, $comparison);
    }

    /**
     * Filter the query on the Кому column
     *
     * Example usage:
     * <code>
     * $query->filterByКому('fooValue');   // WHERE Кому = 'fooValue'
     * $query->filterByКому('%fooValue%'); // WHERE Кому LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ому The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByКому($�ому = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ому)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ому)) {
                $�ому = str_replace('*', '%', $�ому);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроблемныевопросыTableMap::COL_КОМУ, $�ому, $comparison);
    }

    /**
     * Filter the query on the ПроблемныеВопросы column
     *
     * Example usage:
     * <code>
     * $query->filterByПроблемныевопросы('fooValue');   // WHERE ПроблемныеВопросы = 'fooValue'
     * $query->filterByПроблемныевопросы('%fooValue%'); // WHERE ПроблемныеВопросы LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�роблемныевопросы The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByПроблемныевопросы($�роблемныевопросы = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�роблемныевопросы)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�роблемныевопросы)) {
                $�роблемныевопросы = str_replace('*', '%', $�роблемныевопросы);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроблемныевопросыTableMap::COL_ПРОБЛЕМНЫЕВОПРОСЫ, $�роблемныевопросы, $comparison);
    }

    /**
     * Filter the query on the МерыДляРешения column
     *
     * Example usage:
     * <code>
     * $query->filterByМерыдлярешения('fooValue');   // WHERE МерыДляРешения = 'fooValue'
     * $query->filterByМерыдлярешения('%fooValue%'); // WHERE МерыДляРешения LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�ерыдлярешения The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByМерыдлярешения($�ерыдлярешения = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�ерыдлярешения)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�ерыдлярешения)) {
                $�ерыдлярешения = str_replace('*', '%', $�ерыдлярешения);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроблемныевопросыTableMap::COL_МЕРЫДЛЯРЕШЕНИЯ, $�ерыдлярешения, $comparison);
    }

    /**
     * Filter the query on the Ответсвенный column
     *
     * Example usage:
     * <code>
     * $query->filterByОтветсвенный('fooValue');   // WHERE Ответсвенный = 'fooValue'
     * $query->filterByОтветсвенный('%fooValue%'); // WHERE Ответсвенный LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�тветсвенный The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByОтветсвенный($�тветсвенный = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�тветсвенный)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�тветсвенный)) {
                $�тветсвенный = str_replace('*', '%', $�тветсвенный);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроблемныевопросыTableMap::COL_ОТВЕТСВЕННЫЙ, $�тветсвенный, $comparison);
    }

    /**
     * Filter the query on the Срок column
     *
     * Example usage:
     * <code>
     * $query->filterByСрок('2011-03-14'); // WHERE Срок = '2011-03-14'
     * $query->filterByСрок('now'); // WHERE Срок = '2011-03-14'
     * $query->filterByСрок(array('max' => 'yesterday')); // WHERE Срок > '2011-03-13'
     * </code>
     *
     * @param     mixed $�рок The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByСрок($�рок = null, $comparison = null)
    {
        if (is_array($�рок)) {
            $useMinMax = false;
            if (isset($�рок['min'])) {
                $this->addUsingAlias(ПроблемныевопросыTableMap::COL_СРОК, $�рок['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�рок['max'])) {
                $this->addUsingAlias(ПроблемныевопросыTableMap::COL_СРОК, $�рок['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПроблемныевопросыTableMap::COL_СРОК, $�рок, $comparison);
    }

    /**
     * Filter the query on the Статус column
     *
     * Example usage:
     * <code>
     * $query->filterByСтатус('fooValue');   // WHERE Статус = 'fooValue'
     * $query->filterByСтатус('%fooValue%'); // WHERE Статус LIKE '%fooValue%'
     * </code>
     *
     * @param     string $�татус The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПроблемныевопросыQuery The current query, for fluid interface
     */
    public function filterByСтатус($�татус = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($�татус)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $�татус)) {
                $�татус = str_replace('*', '%', $�татус);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ПроблемныевопросыTableMap::COL_СТАТУС, $�татус, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildПроблемныевопросы $�роблемныевопросы Object to remove from the list of results
     *
     * @return $this|ChildПроблемныевопросыQuery The current query, for fluid interface
     */
    public function prune($�роблемныевопросы = null)
    {
        if ($�роблемныевопросы) {
            throw new LogicException('Проблемныевопросы object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the ПроблемныеВопросы table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ПроблемныевопросыTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ПроблемныевопросыTableMap::clearInstancePool();
            ПроблемныевопросыTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ПроблемныевопросыTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ПроблемныевопросыTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ПроблемныевопросыTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ПроблемныевопросыTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ПроблемныевопросыQuery
