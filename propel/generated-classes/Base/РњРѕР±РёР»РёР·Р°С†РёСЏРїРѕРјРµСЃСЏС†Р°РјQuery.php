<?php

namespace Base;

use \Мобилизацияпомесяцам as ChildМобилизацияпомесяцам;
use \МобилизацияпомесяцамQuery as ChildМобилизацияпомесяцамQuery;
use \Exception;
use Map\МобилизацияпомесяцамTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'МобилизацияПоМесяцам' table.
 *
 * 
 *
 * @method     ChildМобилизацияпомесяцамQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildМобилизацияпомесяцамQuery orderByТиптехники($order = Criteria::ASC) Order by the ТипТехники column
 * @method     ChildМобилизацияпомесяцамQuery orderByПлаоотгрузкаколичество($order = Criteria::ASC) Order by the ПлаОотгрузкаКоличество column
 * @method     ChildМобилизацияпомесяцамQuery orderByФактотгрузкаколичество($order = Criteria::ASC) Order by the ФактОтгрузкаКоличество column
 * @method     ChildМобилизацияпомесяцамQuery orderByПландоставкаколичество($order = Criteria::ASC) Order by the ПланДоставкаКоличество column
 * @method     ChildМобилизацияпомесяцамQuery orderByФактдоставкаколичество($order = Criteria::ASC) Order by the ФактДоставкаКоличество column
 * @method     ChildМобилизацияпомесяцамQuery orderByПроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildМобилизацияпомесяцамQuery orderByГод($order = Criteria::ASC) Order by the Год column
 * @method     ChildМобилизацияпомесяцамQuery orderByМесяц($order = Criteria::ASC) Order by the Месяц column
 * @method     ChildМобилизацияпомесяцамQuery orderByДатаотчёта($order = Criteria::ASC) Order by the ДатаОтчёта column
 * @method     ChildМобилизацияпомесяцамQuery orderByУчастокработ($order = Criteria::ASC) Order by the УчастокРабот column
 *
 * @method     ChildМобилизацияпомесяцамQuery groupById() Group by the id column
 * @method     ChildМобилизацияпомесяцамQuery groupByТиптехники() Group by the ТипТехники column
 * @method     ChildМобилизацияпомесяцамQuery groupByПлаоотгрузкаколичество() Group by the ПлаОотгрузкаКоличество column
 * @method     ChildМобилизацияпомесяцамQuery groupByФактотгрузкаколичество() Group by the ФактОтгрузкаКоличество column
 * @method     ChildМобилизацияпомесяцамQuery groupByПландоставкаколичество() Group by the ПланДоставкаКоличество column
 * @method     ChildМобилизацияпомесяцамQuery groupByФактдоставкаколичество() Group by the ФактДоставкаКоличество column
 * @method     ChildМобилизацияпомесяцамQuery groupByПроект() Group by the Проект column
 * @method     ChildМобилизацияпомесяцамQuery groupByГод() Group by the Год column
 * @method     ChildМобилизацияпомесяцамQuery groupByМесяц() Group by the Месяц column
 * @method     ChildМобилизацияпомесяцамQuery groupByДатаотчёта() Group by the ДатаОтчёта column
 * @method     ChildМобилизацияпомесяцамQuery groupByУчастокработ() Group by the УчастокРабот column
 *
 * @method     ChildМобилизацияпомесяцамQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildМобилизацияпомесяцамQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildМобилизацияпомесяцамQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildМобилизацияпомесяцамQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildМобилизацияпомесяцамQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildМобилизацияпомесяцамQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildМобилизацияпомесяцам findOne(ConnectionInterface $con = null) Return the first ChildМобилизацияпомесяцам matching the query
 * @method     ChildМобилизацияпомесяцам findOneOrCreate(ConnectionInterface $con = null) Return the first ChildМобилизацияпомесяцам matching the query, or a new ChildМобилизацияпомесяцам object populated from the query conditions when no match is found
 *
 * @method     ChildМобилизацияпомесяцам findOneById(int $id) Return the first ChildМобилизацияпомесяцам filtered by the id column
 * @method     ChildМобилизацияпомесяцам findOneByТиптехники(int $ТипТехники) Return the first ChildМобилизацияпомесяцам filtered by the ТипТехники column
 * @method     ChildМобилизацияпомесяцам findOneByПлаоотгрузкаколичество(int $ПлаОотгрузкаКоличество) Return the first ChildМобилизацияпомесяцам filtered by the ПлаОотгрузкаКоличество column
 * @method     ChildМобилизацияпомесяцам findOneByФактотгрузкаколичество(int $ФактОтгрузкаКоличество) Return the first ChildМобилизацияпомесяцам filtered by the ФактОтгрузкаКоличество column
 * @method     ChildМобилизацияпомесяцам findOneByПландоставкаколичество(int $ПланДоставкаКоличество) Return the first ChildМобилизацияпомесяцам filtered by the ПланДоставкаКоличество column
 * @method     ChildМобилизацияпомесяцам findOneByФактдоставкаколичество(int $ФактДоставкаКоличество) Return the first ChildМобилизацияпомесяцам filtered by the ФактДоставкаКоличество column
 * @method     ChildМобилизацияпомесяцам findOneByПроект(int $Проект) Return the first ChildМобилизацияпомесяцам filtered by the Проект column
 * @method     ChildМобилизацияпомесяцам findOneByГод(int $Год) Return the first ChildМобилизацияпомесяцам filtered by the Год column
 * @method     ChildМобилизацияпомесяцам findOneByМесяц(int $Месяц) Return the first ChildМобилизацияпомесяцам filtered by the Месяц column
 * @method     ChildМобилизацияпомесяцам findOneByДатаотчёта(string $ДатаОтчёта) Return the first ChildМобилизацияпомесяцам filtered by the ДатаОтчёта column
 * @method     ChildМобилизацияпомесяцам findOneByУчастокработ(int $УчастокРабот) Return the first ChildМобилизацияпомесяцам filtered by the УчастокРабот column *

 * @method     ChildМобилизацияпомесяцам requirePk($key, ConnectionInterface $con = null) Return the ChildМобилизацияпомесяцам by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизацияпомесяцам requireOne(ConnectionInterface $con = null) Return the first ChildМобилизацияпомесяцам matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildМобилизацияпомесяцам requireOneById(int $id) Return the first ChildМобилизацияпомесяцам filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизацияпомесяцам requireOneByТиптехники(int $ТипТехники) Return the first ChildМобилизацияпомесяцам filtered by the ТипТехники column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизацияпомесяцам requireOneByПлаоотгрузкаколичество(int $ПлаОотгрузкаКоличество) Return the first ChildМобилизацияпомесяцам filtered by the ПлаОотгрузкаКоличество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизацияпомесяцам requireOneByФактотгрузкаколичество(int $ФактОтгрузкаКоличество) Return the first ChildМобилизацияпомесяцам filtered by the ФактОтгрузкаКоличество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизацияпомесяцам requireOneByПландоставкаколичество(int $ПланДоставкаКоличество) Return the first ChildМобилизацияпомесяцам filtered by the ПланДоставкаКоличество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизацияпомесяцам requireOneByФактдоставкаколичество(int $ФактДоставкаКоличество) Return the first ChildМобилизацияпомесяцам filtered by the ФактДоставкаКоличество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизацияпомесяцам requireOneByПроект(int $Проект) Return the first ChildМобилизацияпомесяцам filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизацияпомесяцам requireOneByГод(int $Год) Return the first ChildМобилизацияпомесяцам filtered by the Год column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизацияпомесяцам requireOneByМесяц(int $Месяц) Return the first ChildМобилизацияпомесяцам filtered by the Месяц column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизацияпомесяцам requireOneByДатаотчёта(string $ДатаОтчёта) Return the first ChildМобилизацияпомесяцам filtered by the ДатаОтчёта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизацияпомесяцам requireOneByУчастокработ(int $УчастокРабот) Return the first ChildМобилизацияпомесяцам filtered by the УчастокРабот column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildМобилизацияпомесяцам[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildМобилизацияпомесяцам objects based on current ModelCriteria
 * @method     ChildМобилизацияпомесяцам[]|ObjectCollection findById(int $id) Return ChildМобилизацияпомесяцам objects filtered by the id column
 * @method     ChildМобилизацияпомесяцам[]|ObjectCollection findByТиптехники(int $ТипТехники) Return ChildМобилизацияпомесяцам objects filtered by the ТипТехники column
 * @method     ChildМобилизацияпомесяцам[]|ObjectCollection findByПлаоотгрузкаколичество(int $ПлаОотгрузкаКоличество) Return ChildМобилизацияпомесяцам objects filtered by the ПлаОотгрузкаКоличество column
 * @method     ChildМобилизацияпомесяцам[]|ObjectCollection findByФактотгрузкаколичество(int $ФактОтгрузкаКоличество) Return ChildМобилизацияпомесяцам objects filtered by the ФактОтгрузкаКоличество column
 * @method     ChildМобилизацияпомесяцам[]|ObjectCollection findByПландоставкаколичество(int $ПланДоставкаКоличество) Return ChildМобилизацияпомесяцам objects filtered by the ПланДоставкаКоличество column
 * @method     ChildМобилизацияпомесяцам[]|ObjectCollection findByФактдоставкаколичество(int $ФактДоставкаКоличество) Return ChildМобилизацияпомесяцам objects filtered by the ФактДоставкаКоличество column
 * @method     ChildМобилизацияпомесяцам[]|ObjectCollection findByПроект(int $Проект) Return ChildМобилизацияпомесяцам objects filtered by the Проект column
 * @method     ChildМобилизацияпомесяцам[]|ObjectCollection findByГод(int $Год) Return ChildМобилизацияпомесяцам objects filtered by the Год column
 * @method     ChildМобилизацияпомесяцам[]|ObjectCollection findByМесяц(int $Месяц) Return ChildМобилизацияпомесяцам objects filtered by the Месяц column
 * @method     ChildМобилизацияпомесяцам[]|ObjectCollection findByДатаотчёта(string $ДатаОтчёта) Return ChildМобилизацияпомесяцам objects filtered by the ДатаОтчёта column
 * @method     ChildМобилизацияпомесяцам[]|ObjectCollection findByУчастокработ(int $УчастокРабот) Return ChildМобилизацияпомесяцам objects filtered by the УчастокРабот column
 * @method     ChildМобилизацияпомесяцам[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class МобилизацияпомесяцамQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\МобилизацияпомесяцамQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Мобилизацияпомесяцам', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildМобилизацияпомесяцамQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildМобилизацияпомесяцамQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildМобилизацияпомесяцамQuery) {
            return $criteria;
        }
        $query = new ChildМобилизацияпомесяцамQuery();
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
     * @return ChildМобилизацияпомесяцам|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Мобилизацияпомесяцам object has no primary key');
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
        throw new LogicException('The Мобилизацияпомесяцам object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Мобилизацияпомесяцам object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Мобилизацияпомесяцам object has no primary key');
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
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the ТипТехники column
     *
     * Example usage:
     * <code>
     * $query->filterByТиптехники(1234); // WHERE ТипТехники = 1234
     * $query->filterByТиптехники(array(12, 34)); // WHERE ТипТехники IN (12, 34)
     * $query->filterByТиптехники(array('min' => 12)); // WHERE ТипТехники > 12
     * </code>
     *
     * @param     mixed $�иптехники The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByТиптехники($�иптехники = null, $comparison = null)
    {
        if (is_array($�иптехники)) {
            $useMinMax = false;
            if (isset($�иптехники['min'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ТИПТЕХНИКИ, $�иптехники['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�иптехники['max'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ТИПТЕХНИКИ, $�иптехники['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ТИПТЕХНИКИ, $�иптехники, $comparison);
    }

    /**
     * Filter the query on the ПлаОотгрузкаКоличество column
     *
     * Example usage:
     * <code>
     * $query->filterByПлаоотгрузкаколичество(1234); // WHERE ПлаОотгрузкаКоличество = 1234
     * $query->filterByПлаоотгрузкаколичество(array(12, 34)); // WHERE ПлаОотгрузкаКоличество IN (12, 34)
     * $query->filterByПлаоотгрузкаколичество(array('min' => 12)); // WHERE ПлаОотгрузкаКоличество > 12
     * </code>
     *
     * @param     mixed $�лаоотгрузкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByПлаоотгрузкаколичество($�лаоотгрузкаколичество = null, $comparison = null)
    {
        if (is_array($�лаоотгрузкаколичество)) {
            $useMinMax = false;
            if (isset($�лаоотгрузкаколичество['min'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ПЛАООТГРУЗКАКОЛИЧЕСТВО, $�лаоотгрузкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�лаоотгрузкаколичество['max'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ПЛАООТГРУЗКАКОЛИЧЕСТВО, $�лаоотгрузкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ПЛАООТГРУЗКАКОЛИЧЕСТВО, $�лаоотгрузкаколичество, $comparison);
    }

    /**
     * Filter the query on the ФактОтгрузкаКоличество column
     *
     * Example usage:
     * <code>
     * $query->filterByФактотгрузкаколичество(1234); // WHERE ФактОтгрузкаКоличество = 1234
     * $query->filterByФактотгрузкаколичество(array(12, 34)); // WHERE ФактОтгрузкаКоличество IN (12, 34)
     * $query->filterByФактотгрузкаколичество(array('min' => 12)); // WHERE ФактОтгрузкаКоличество > 12
     * </code>
     *
     * @param     mixed $�актотгрузкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByФактотгрузкаколичество($�актотгрузкаколичество = null, $comparison = null)
    {
        if (is_array($�актотгрузкаколичество)) {
            $useMinMax = false;
            if (isset($�актотгрузкаколичество['min'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ФАКТОТГРУЗКАКОЛИЧЕСТВО, $�актотгрузкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�актотгрузкаколичество['max'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ФАКТОТГРУЗКАКОЛИЧЕСТВО, $�актотгрузкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ФАКТОТГРУЗКАКОЛИЧЕСТВО, $�актотгрузкаколичество, $comparison);
    }

    /**
     * Filter the query on the ПланДоставкаКоличество column
     *
     * Example usage:
     * <code>
     * $query->filterByПландоставкаколичество(1234); // WHERE ПланДоставкаКоличество = 1234
     * $query->filterByПландоставкаколичество(array(12, 34)); // WHERE ПланДоставкаКоличество IN (12, 34)
     * $query->filterByПландоставкаколичество(array('min' => 12)); // WHERE ПланДоставкаКоличество > 12
     * </code>
     *
     * @param     mixed $�ландоставкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByПландоставкаколичество($�ландоставкаколичество = null, $comparison = null)
    {
        if (is_array($�ландоставкаколичество)) {
            $useMinMax = false;
            if (isset($�ландоставкаколичество['min'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ПЛАНДОСТАВКАКОЛИЧЕСТВО, $�ландоставкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ландоставкаколичество['max'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ПЛАНДОСТАВКАКОЛИЧЕСТВО, $�ландоставкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ПЛАНДОСТАВКАКОЛИЧЕСТВО, $�ландоставкаколичество, $comparison);
    }

    /**
     * Filter the query on the ФактДоставкаКоличество column
     *
     * Example usage:
     * <code>
     * $query->filterByФактдоставкаколичество(1234); // WHERE ФактДоставкаКоличество = 1234
     * $query->filterByФактдоставкаколичество(array(12, 34)); // WHERE ФактДоставкаКоличество IN (12, 34)
     * $query->filterByФактдоставкаколичество(array('min' => 12)); // WHERE ФактДоставкаКоличество > 12
     * </code>
     *
     * @param     mixed $�актдоставкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByФактдоставкаколичество($�актдоставкаколичество = null, $comparison = null)
    {
        if (is_array($�актдоставкаколичество)) {
            $useMinMax = false;
            if (isset($�актдоставкаколичество['min'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ФАКТДОСТАВКАКОЛИЧЕСТВО, $�актдоставкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�актдоставкаколичество['max'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ФАКТДОСТАВКАКОЛИЧЕСТВО, $�актдоставкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ФАКТДОСТАВКАКОЛИЧЕСТВО, $�актдоставкаколичество, $comparison);
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
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByПроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ПРОЕКТ, $�роект, $comparison);
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
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByГод($�од = null, $comparison = null)
    {
        if (is_array($�од)) {
            $useMinMax = false;
            if (isset($�од['min'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ГОД, $�од['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�од['max'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ГОД, $�од['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ГОД, $�од, $comparison);
    }

    /**
     * Filter the query on the Месяц column
     *
     * Example usage:
     * <code>
     * $query->filterByМесяц(1234); // WHERE Месяц = 1234
     * $query->filterByМесяц(array(12, 34)); // WHERE Месяц IN (12, 34)
     * $query->filterByМесяц(array('min' => 12)); // WHERE Месяц > 12
     * </code>
     *
     * @param     mixed $�есяц The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByМесяц($�есяц = null, $comparison = null)
    {
        if (is_array($�есяц)) {
            $useMinMax = false;
            if (isset($�есяц['min'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_МЕСЯЦ, $�есяц['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�есяц['max'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_МЕСЯЦ, $�есяц['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_МЕСЯЦ, $�есяц, $comparison);
    }

    /**
     * Filter the query on the ДатаОтчёта column
     *
     * Example usage:
     * <code>
     * $query->filterByДатаотчёта('2011-03-14'); // WHERE ДатаОтчёта = '2011-03-14'
     * $query->filterByДатаотчёта('now'); // WHERE ДатаОтчёта = '2011-03-14'
     * $query->filterByДатаотчёта(array('max' => 'yesterday')); // WHERE ДатаОтчёта > '2011-03-13'
     * </code>
     *
     * @param     mixed $�атаотчёта The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByДатаотчёта($�атаотчёта = null, $comparison = null)
    {
        if (is_array($�атаотчёта)) {
            $useMinMax = false;
            if (isset($�атаотчёта['min'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ДАТАОТЧЁТА, $�атаотчёта['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�атаотчёта['max'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ДАТАОТЧЁТА, $�атаотчёта['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_ДАТАОТЧЁТА, $�атаотчёта, $comparison);
    }

    /**
     * Filter the query on the УчастокРабот column
     *
     * Example usage:
     * <code>
     * $query->filterByУчастокработ(1234); // WHERE УчастокРабот = 1234
     * $query->filterByУчастокработ(array(12, 34)); // WHERE УчастокРабот IN (12, 34)
     * $query->filterByУчастокработ(array('min' => 12)); // WHERE УчастокРабот > 12
     * </code>
     *
     * @param     mixed $�частокработ The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function filterByУчастокработ($�частокработ = null, $comparison = null)
    {
        if (is_array($�частокработ)) {
            $useMinMax = false;
            if (isset($�частокработ['min'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_УЧАСТОКРАБОТ, $�частокработ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�частокработ['max'])) {
                $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_УЧАСТОКРАБОТ, $�частокработ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияпомесяцамTableMap::COL_УЧАСТОКРАБОТ, $�частокработ, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildМобилизацияпомесяцам $�обилизацияпомесяцам Object to remove from the list of results
     *
     * @return $this|ChildМобилизацияпомесяцамQuery The current query, for fluid interface
     */
    public function prune($�обилизацияпомесяцам = null)
    {
        if ($�обилизацияпомесяцам) {
            throw new LogicException('Мобилизацияпомесяцам object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the МобилизацияПоМесяцам table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(МобилизацияпомесяцамTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            МобилизацияпомесяцамTableMap::clearInstancePool();
            МобилизацияпомесяцамTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(МобилизацияпомесяцамTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(МобилизацияпомесяцамTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            МобилизацияпомесяцамTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            МобилизацияпомесяцамTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // МобилизацияпомесяцамQuery
