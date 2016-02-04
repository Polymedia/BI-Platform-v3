<?php

namespace Base;

use \Мобилизация as ChildМобилизация;
use \МобилизацияQuery as ChildМобилизацияQuery;
use \Exception;
use Map\МобилизацияTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Мобилизация' table.
 *
 * 
 *
 * @method     ChildМобилизацияQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildМобилизацияQuery orderByТиптехники($order = Criteria::ASC) Order by the ТипТехники column
 * @method     ChildМобилизацияQuery orderByПланотгрузкаколичество($order = Criteria::ASC) Order by the ПланОтгрузкаКоличество column
 * @method     ChildМобилизацияQuery orderByФактотгрузкаколичество($order = Criteria::ASC) Order by the ФактОтгрузкаКоличество column
 * @method     ChildМобилизацияQuery orderByПландоставкаколичество($order = Criteria::ASC) Order by the ПланДоставкаКоличество column
 * @method     ChildМобилизацияQuery orderByФактдоставкаколичество($order = Criteria::ASC) Order by the ФактДоставкаКоличество column
 * @method     ChildМобилизацияQuery orderByАренда($order = Criteria::ASC) Order by the Аренда column
 * @method     ChildМобилизацияQuery orderByОстатоккдоставке($order = Criteria::ASC) Order by the ОстатокКДоставке column
 * @method     ChildМобилизацияQuery orderByПромежуточныйпунктколичество($order = Criteria::ASC) Order by the ПромежуточныйПунктКоличество column
 * @method     ChildМобилизацияQuery orderByПроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildМобилизацияQuery orderByДатаотчёта($order = Criteria::ASC) Order by the ДатаОтчёта column
 * @method     ChildМобилизацияQuery orderByУчастокработ($order = Criteria::ASC) Order by the УчастокРабот column
 *
 * @method     ChildМобилизацияQuery groupById() Group by the id column
 * @method     ChildМобилизацияQuery groupByТиптехники() Group by the ТипТехники column
 * @method     ChildМобилизацияQuery groupByПланотгрузкаколичество() Group by the ПланОтгрузкаКоличество column
 * @method     ChildМобилизацияQuery groupByФактотгрузкаколичество() Group by the ФактОтгрузкаКоличество column
 * @method     ChildМобилизацияQuery groupByПландоставкаколичество() Group by the ПланДоставкаКоличество column
 * @method     ChildМобилизацияQuery groupByФактдоставкаколичество() Group by the ФактДоставкаКоличество column
 * @method     ChildМобилизацияQuery groupByАренда() Group by the Аренда column
 * @method     ChildМобилизацияQuery groupByОстатоккдоставке() Group by the ОстатокКДоставке column
 * @method     ChildМобилизацияQuery groupByПромежуточныйпунктколичество() Group by the ПромежуточныйПунктКоличество column
 * @method     ChildМобилизацияQuery groupByПроект() Group by the Проект column
 * @method     ChildМобилизацияQuery groupByДатаотчёта() Group by the ДатаОтчёта column
 * @method     ChildМобилизацияQuery groupByУчастокработ() Group by the УчастокРабот column
 *
 * @method     ChildМобилизацияQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildМобилизацияQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildМобилизацияQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildМобилизацияQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildМобилизацияQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildМобилизацияQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildМобилизация findOne(ConnectionInterface $con = null) Return the first ChildМобилизация matching the query
 * @method     ChildМобилизация findOneOrCreate(ConnectionInterface $con = null) Return the first ChildМобилизация matching the query, or a new ChildМобилизация object populated from the query conditions when no match is found
 *
 * @method     ChildМобилизация findOneById(int $id) Return the first ChildМобилизация filtered by the id column
 * @method     ChildМобилизация findOneByТиптехники(int $ТипТехники) Return the first ChildМобилизация filtered by the ТипТехники column
 * @method     ChildМобилизация findOneByПланотгрузкаколичество(int $ПланОтгрузкаКоличество) Return the first ChildМобилизация filtered by the ПланОтгрузкаКоличество column
 * @method     ChildМобилизация findOneByФактотгрузкаколичество(int $ФактОтгрузкаКоличество) Return the first ChildМобилизация filtered by the ФактОтгрузкаКоличество column
 * @method     ChildМобилизация findOneByПландоставкаколичество(int $ПланДоставкаКоличество) Return the first ChildМобилизация filtered by the ПланДоставкаКоличество column
 * @method     ChildМобилизация findOneByФактдоставкаколичество(int $ФактДоставкаКоличество) Return the first ChildМобилизация filtered by the ФактДоставкаКоличество column
 * @method     ChildМобилизация findOneByАренда(int $Аренда) Return the first ChildМобилизация filtered by the Аренда column
 * @method     ChildМобилизация findOneByОстатоккдоставке(int $ОстатокКДоставке) Return the first ChildМобилизация filtered by the ОстатокКДоставке column
 * @method     ChildМобилизация findOneByПромежуточныйпунктколичество(int $ПромежуточныйПунктКоличество) Return the first ChildМобилизация filtered by the ПромежуточныйПунктКоличество column
 * @method     ChildМобилизация findOneByПроект(int $Проект) Return the first ChildМобилизация filtered by the Проект column
 * @method     ChildМобилизация findOneByДатаотчёта(string $ДатаОтчёта) Return the first ChildМобилизация filtered by the ДатаОтчёта column
 * @method     ChildМобилизация findOneByУчастокработ(int $УчастокРабот) Return the first ChildМобилизация filtered by the УчастокРабот column *

 * @method     ChildМобилизация requirePk($key, ConnectionInterface $con = null) Return the ChildМобилизация by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизация requireOne(ConnectionInterface $con = null) Return the first ChildМобилизация matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildМобилизация requireOneById(int $id) Return the first ChildМобилизация filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизация requireOneByТиптехники(int $ТипТехники) Return the first ChildМобилизация filtered by the ТипТехники column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизация requireOneByПланотгрузкаколичество(int $ПланОтгрузкаКоличество) Return the first ChildМобилизация filtered by the ПланОтгрузкаКоличество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизация requireOneByФактотгрузкаколичество(int $ФактОтгрузкаКоличество) Return the first ChildМобилизация filtered by the ФактОтгрузкаКоличество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизация requireOneByПландоставкаколичество(int $ПланДоставкаКоличество) Return the first ChildМобилизация filtered by the ПланДоставкаКоличество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизация requireOneByФактдоставкаколичество(int $ФактДоставкаКоличество) Return the first ChildМобилизация filtered by the ФактДоставкаКоличество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизация requireOneByАренда(int $Аренда) Return the first ChildМобилизация filtered by the Аренда column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизация requireOneByОстатоккдоставке(int $ОстатокКДоставке) Return the first ChildМобилизация filtered by the ОстатокКДоставке column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизация requireOneByПромежуточныйпунктколичество(int $ПромежуточныйПунктКоличество) Return the first ChildМобилизация filtered by the ПромежуточныйПунктКоличество column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизация requireOneByПроект(int $Проект) Return the first ChildМобилизация filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизация requireOneByДатаотчёта(string $ДатаОтчёта) Return the first ChildМобилизация filtered by the ДатаОтчёта column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildМобилизация requireOneByУчастокработ(int $УчастокРабот) Return the first ChildМобилизация filtered by the УчастокРабот column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildМобилизация[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildМобилизация objects based on current ModelCriteria
 * @method     ChildМобилизация[]|ObjectCollection findById(int $id) Return ChildМобилизация objects filtered by the id column
 * @method     ChildМобилизация[]|ObjectCollection findByТиптехники(int $ТипТехники) Return ChildМобилизация objects filtered by the ТипТехники column
 * @method     ChildМобилизация[]|ObjectCollection findByПланотгрузкаколичество(int $ПланОтгрузкаКоличество) Return ChildМобилизация objects filtered by the ПланОтгрузкаКоличество column
 * @method     ChildМобилизация[]|ObjectCollection findByФактотгрузкаколичество(int $ФактОтгрузкаКоличество) Return ChildМобилизация objects filtered by the ФактОтгрузкаКоличество column
 * @method     ChildМобилизация[]|ObjectCollection findByПландоставкаколичество(int $ПланДоставкаКоличество) Return ChildМобилизация objects filtered by the ПланДоставкаКоличество column
 * @method     ChildМобилизация[]|ObjectCollection findByФактдоставкаколичество(int $ФактДоставкаКоличество) Return ChildМобилизация objects filtered by the ФактДоставкаКоличество column
 * @method     ChildМобилизация[]|ObjectCollection findByАренда(int $Аренда) Return ChildМобилизация objects filtered by the Аренда column
 * @method     ChildМобилизация[]|ObjectCollection findByОстатоккдоставке(int $ОстатокКДоставке) Return ChildМобилизация objects filtered by the ОстатокКДоставке column
 * @method     ChildМобилизация[]|ObjectCollection findByПромежуточныйпунктколичество(int $ПромежуточныйПунктКоличество) Return ChildМобилизация objects filtered by the ПромежуточныйПунктКоличество column
 * @method     ChildМобилизация[]|ObjectCollection findByПроект(int $Проект) Return ChildМобилизация objects filtered by the Проект column
 * @method     ChildМобилизация[]|ObjectCollection findByДатаотчёта(string $ДатаОтчёта) Return ChildМобилизация objects filtered by the ДатаОтчёта column
 * @method     ChildМобилизация[]|ObjectCollection findByУчастокработ(int $УчастокРабот) Return ChildМобилизация objects filtered by the УчастокРабот column
 * @method     ChildМобилизация[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class МобилизацияQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\МобилизацияQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Мобилизация', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildМобилизацияQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildМобилизацияQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildМобилизацияQuery) {
            return $criteria;
        }
        $query = new ChildМобилизацияQuery();
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
     * @return ChildМобилизация|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Мобилизация object has no primary key');
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
        throw new LogicException('The Мобилизация object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Мобилизация object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Мобилизация object has no primary key');
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
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByТиптехники($�иптехники = null, $comparison = null)
    {
        if (is_array($�иптехники)) {
            $useMinMax = false;
            if (isset($�иптехники['min'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ТИПТЕХНИКИ, $�иптехники['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�иптехники['max'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ТИПТЕХНИКИ, $�иптехники['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияTableMap::COL_ТИПТЕХНИКИ, $�иптехники, $comparison);
    }

    /**
     * Filter the query on the ПланОтгрузкаКоличество column
     *
     * Example usage:
     * <code>
     * $query->filterByПланотгрузкаколичество(1234); // WHERE ПланОтгрузкаКоличество = 1234
     * $query->filterByПланотгрузкаколичество(array(12, 34)); // WHERE ПланОтгрузкаКоличество IN (12, 34)
     * $query->filterByПланотгрузкаколичество(array('min' => 12)); // WHERE ПланОтгрузкаКоличество > 12
     * </code>
     *
     * @param     mixed $�ланотгрузкаколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByПланотгрузкаколичество($�ланотгрузкаколичество = null, $comparison = null)
    {
        if (is_array($�ланотгрузкаколичество)) {
            $useMinMax = false;
            if (isset($�ланотгрузкаколичество['min'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ПЛАНОТГРУЗКАКОЛИЧЕСТВО, $�ланотгрузкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ланотгрузкаколичество['max'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ПЛАНОТГРУЗКАКОЛИЧЕСТВО, $�ланотгрузкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияTableMap::COL_ПЛАНОТГРУЗКАКОЛИЧЕСТВО, $�ланотгрузкаколичество, $comparison);
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
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByФактотгрузкаколичество($�актотгрузкаколичество = null, $comparison = null)
    {
        if (is_array($�актотгрузкаколичество)) {
            $useMinMax = false;
            if (isset($�актотгрузкаколичество['min'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ФАКТОТГРУЗКАКОЛИЧЕСТВО, $�актотгрузкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�актотгрузкаколичество['max'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ФАКТОТГРУЗКАКОЛИЧЕСТВО, $�актотгрузкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияTableMap::COL_ФАКТОТГРУЗКАКОЛИЧЕСТВО, $�актотгрузкаколичество, $comparison);
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
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByПландоставкаколичество($�ландоставкаколичество = null, $comparison = null)
    {
        if (is_array($�ландоставкаколичество)) {
            $useMinMax = false;
            if (isset($�ландоставкаколичество['min'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ПЛАНДОСТАВКАКОЛИЧЕСТВО, $�ландоставкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ландоставкаколичество['max'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ПЛАНДОСТАВКАКОЛИЧЕСТВО, $�ландоставкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияTableMap::COL_ПЛАНДОСТАВКАКОЛИЧЕСТВО, $�ландоставкаколичество, $comparison);
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
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByФактдоставкаколичество($�актдоставкаколичество = null, $comparison = null)
    {
        if (is_array($�актдоставкаколичество)) {
            $useMinMax = false;
            if (isset($�актдоставкаколичество['min'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ФАКТДОСТАВКАКОЛИЧЕСТВО, $�актдоставкаколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�актдоставкаколичество['max'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ФАКТДОСТАВКАКОЛИЧЕСТВО, $�актдоставкаколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияTableMap::COL_ФАКТДОСТАВКАКОЛИЧЕСТВО, $�актдоставкаколичество, $comparison);
    }

    /**
     * Filter the query on the Аренда column
     *
     * Example usage:
     * <code>
     * $query->filterByАренда(1234); // WHERE Аренда = 1234
     * $query->filterByАренда(array(12, 34)); // WHERE Аренда IN (12, 34)
     * $query->filterByАренда(array('min' => 12)); // WHERE Аренда > 12
     * </code>
     *
     * @param     mixed $�ренда The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByАренда($�ренда = null, $comparison = null)
    {
        if (is_array($�ренда)) {
            $useMinMax = false;
            if (isset($�ренда['min'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_АРЕНДА, $�ренда['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ренда['max'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_АРЕНДА, $�ренда['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияTableMap::COL_АРЕНДА, $�ренда, $comparison);
    }

    /**
     * Filter the query on the ОстатокКДоставке column
     *
     * Example usage:
     * <code>
     * $query->filterByОстатоккдоставке(1234); // WHERE ОстатокКДоставке = 1234
     * $query->filterByОстатоккдоставке(array(12, 34)); // WHERE ОстатокКДоставке IN (12, 34)
     * $query->filterByОстатоккдоставке(array('min' => 12)); // WHERE ОстатокКДоставке > 12
     * </code>
     *
     * @param     mixed $�статоккдоставке The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByОстатоккдоставке($�статоккдоставке = null, $comparison = null)
    {
        if (is_array($�статоккдоставке)) {
            $useMinMax = false;
            if (isset($�статоккдоставке['min'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ОСТАТОККДОСТАВКЕ, $�статоккдоставке['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�статоккдоставке['max'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ОСТАТОККДОСТАВКЕ, $�статоккдоставке['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияTableMap::COL_ОСТАТОККДОСТАВКЕ, $�статоккдоставке, $comparison);
    }

    /**
     * Filter the query on the ПромежуточныйПунктКоличество column
     *
     * Example usage:
     * <code>
     * $query->filterByПромежуточныйпунктколичество(1234); // WHERE ПромежуточныйПунктКоличество = 1234
     * $query->filterByПромежуточныйпунктколичество(array(12, 34)); // WHERE ПромежуточныйПунктКоличество IN (12, 34)
     * $query->filterByПромежуточныйпунктколичество(array('min' => 12)); // WHERE ПромежуточныйПунктКоличество > 12
     * </code>
     *
     * @param     mixed $�ромежуточныйпунктколичество The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByПромежуточныйпунктколичество($�ромежуточныйпунктколичество = null, $comparison = null)
    {
        if (is_array($�ромежуточныйпунктколичество)) {
            $useMinMax = false;
            if (isset($�ромежуточныйпунктколичество['min'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ПРОМЕЖУТОЧНЫЙПУНКТКОЛИЧЕСТВО, $�ромежуточныйпунктколичество['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ромежуточныйпунктколичество['max'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ПРОМЕЖУТОЧНЫЙПУНКТКОЛИЧЕСТВО, $�ромежуточныйпунктколичество['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияTableMap::COL_ПРОМЕЖУТОЧНЫЙПУНКТКОЛИЧЕСТВО, $�ромежуточныйпунктколичество, $comparison);
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
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByПроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияTableMap::COL_ПРОЕКТ, $�роект, $comparison);
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
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByДатаотчёта($�атаотчёта = null, $comparison = null)
    {
        if (is_array($�атаотчёта)) {
            $useMinMax = false;
            if (isset($�атаотчёта['min'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ДАТАОТЧЁТА, $�атаотчёта['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�атаотчёта['max'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_ДАТАОТЧЁТА, $�атаотчёта['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияTableMap::COL_ДАТАОТЧЁТА, $�атаотчёта, $comparison);
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
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function filterByУчастокработ($�частокработ = null, $comparison = null)
    {
        if (is_array($�частокработ)) {
            $useMinMax = false;
            if (isset($�частокработ['min'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_УЧАСТОКРАБОТ, $�частокработ['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�частокработ['max'])) {
                $this->addUsingAlias(МобилизацияTableMap::COL_УЧАСТОКРАБОТ, $�частокработ['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(МобилизацияTableMap::COL_УЧАСТОКРАБОТ, $�частокработ, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildМобилизация $�обилизация Object to remove from the list of results
     *
     * @return $this|ChildМобилизацияQuery The current query, for fluid interface
     */
    public function prune($�обилизация = null)
    {
        if ($�обилизация) {
            throw new LogicException('Мобилизация object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the Мобилизация table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(МобилизацияTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            МобилизацияTableMap::clearInstancePool();
            МобилизацияTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(МобилизацияTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(МобилизацияTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            МобилизацияTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            МобилизацияTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // МобилизацияQuery
