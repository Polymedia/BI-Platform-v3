<?php

namespace Base;

use \Предписания as ChildПредписания;
use \ПредписанияQuery as ChildПредписанияQuery;
use \Exception;
use Map\ПредписанияTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Предписания' table.
 *
 * 
 *
 * @method     ChildПредписанияQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildПредписанияQuery orderByКонтролирующийорган($order = Criteria::ASC) Order by the КонтролирующийОрган column
 * @method     ChildПредписанияQuery orderByПодрядчик($order = Criteria::ASC) Order by the Подрядчик column
 * @method     ChildПредписанияQuery orderByДатавыдачи($order = Criteria::ASC) Order by the ДатаВыдачи column
 * @method     ChildПредписанияQuery orderByПлановаядатаустранения($order = Criteria::ASC) Order by the ПлановаяДатаУстранения column
 * @method     ChildПредписанияQuery orderByФактическаядатаустранения($order = Criteria::ASC) Order by the ФактическаяДатаУстранения column
 * @method     ChildПредписанияQuery orderByТипзамечания($order = Criteria::ASC) Order by the ТипЗамечания column
 * @method     ChildПредписанияQuery orderByПроект($order = Criteria::ASC) Order by the Проект column
 * @method     ChildПредписанияQuery orderByСтатусзаявкизавершение($order = Criteria::ASC) Order by the СтатусЗаявкиЗавершение column
 * @method     ChildПредписанияQuery orderByСтатусзаявкипросрочка($order = Criteria::ASC) Order by the СтатусЗаявкиПросрочка column
 *
 * @method     ChildПредписанияQuery groupById() Group by the id column
 * @method     ChildПредписанияQuery groupByКонтролирующийорган() Group by the КонтролирующийОрган column
 * @method     ChildПредписанияQuery groupByПодрядчик() Group by the Подрядчик column
 * @method     ChildПредписанияQuery groupByДатавыдачи() Group by the ДатаВыдачи column
 * @method     ChildПредписанияQuery groupByПлановаядатаустранения() Group by the ПлановаяДатаУстранения column
 * @method     ChildПредписанияQuery groupByФактическаядатаустранения() Group by the ФактическаяДатаУстранения column
 * @method     ChildПредписанияQuery groupByТипзамечания() Group by the ТипЗамечания column
 * @method     ChildПредписанияQuery groupByПроект() Group by the Проект column
 * @method     ChildПредписанияQuery groupByСтатусзаявкизавершение() Group by the СтатусЗаявкиЗавершение column
 * @method     ChildПредписанияQuery groupByСтатусзаявкипросрочка() Group by the СтатусЗаявкиПросрочка column
 *
 * @method     ChildПредписанияQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildПредписанияQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildПредписанияQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildПредписанияQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildПредписанияQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildПредписанияQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildПредписания findOne(ConnectionInterface $con = null) Return the first ChildПредписания matching the query
 * @method     ChildПредписания findOneOrCreate(ConnectionInterface $con = null) Return the first ChildПредписания matching the query, or a new ChildПредписания object populated from the query conditions when no match is found
 *
 * @method     ChildПредписания findOneById(int $id) Return the first ChildПредписания filtered by the id column
 * @method     ChildПредписания findOneByКонтролирующийорган(int $КонтролирующийОрган) Return the first ChildПредписания filtered by the КонтролирующийОрган column
 * @method     ChildПредписания findOneByПодрядчик(int $Подрядчик) Return the first ChildПредписания filtered by the Подрядчик column
 * @method     ChildПредписания findOneByДатавыдачи(string $ДатаВыдачи) Return the first ChildПредписания filtered by the ДатаВыдачи column
 * @method     ChildПредписания findOneByПлановаядатаустранения(string $ПлановаяДатаУстранения) Return the first ChildПредписания filtered by the ПлановаяДатаУстранения column
 * @method     ChildПредписания findOneByФактическаядатаустранения(string $ФактическаяДатаУстранения) Return the first ChildПредписания filtered by the ФактическаяДатаУстранения column
 * @method     ChildПредписания findOneByТипзамечания(int $ТипЗамечания) Return the first ChildПредписания filtered by the ТипЗамечания column
 * @method     ChildПредписания findOneByПроект(int $Проект) Return the first ChildПредписания filtered by the Проект column
 * @method     ChildПредписания findOneByСтатусзаявкизавершение(int $СтатусЗаявкиЗавершение) Return the first ChildПредписания filtered by the СтатусЗаявкиЗавершение column
 * @method     ChildПредписания findOneByСтатусзаявкипросрочка(int $СтатусЗаявкиПросрочка) Return the first ChildПредписания filtered by the СтатусЗаявкиПросрочка column *

 * @method     ChildПредписания requirePk($key, ConnectionInterface $con = null) Return the ChildПредписания by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOne(ConnectionInterface $con = null) Return the first ChildПредписания matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildПредписания requireOneById(int $id) Return the first ChildПредписания filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByКонтролирующийорган(int $КонтролирующийОрган) Return the first ChildПредписания filtered by the КонтролирующийОрган column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByПодрядчик(int $Подрядчик) Return the first ChildПредписания filtered by the Подрядчик column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByДатавыдачи(string $ДатаВыдачи) Return the first ChildПредписания filtered by the ДатаВыдачи column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByПлановаядатаустранения(string $ПлановаяДатаУстранения) Return the first ChildПредписания filtered by the ПлановаяДатаУстранения column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByФактическаядатаустранения(string $ФактическаяДатаУстранения) Return the first ChildПредписания filtered by the ФактическаяДатаУстранения column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByТипзамечания(int $ТипЗамечания) Return the first ChildПредписания filtered by the ТипЗамечания column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByПроект(int $Проект) Return the first ChildПредписания filtered by the Проект column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByСтатусзаявкизавершение(int $СтатусЗаявкиЗавершение) Return the first ChildПредписания filtered by the СтатусЗаявкиЗавершение column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildПредписания requireOneByСтатусзаявкипросрочка(int $СтатусЗаявкиПросрочка) Return the first ChildПредписания filtered by the СтатусЗаявкиПросрочка column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildПредписания[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildПредписания objects based on current ModelCriteria
 * @method     ChildПредписания[]|ObjectCollection findById(int $id) Return ChildПредписания objects filtered by the id column
 * @method     ChildПредписания[]|ObjectCollection findByКонтролирующийорган(int $КонтролирующийОрган) Return ChildПредписания objects filtered by the КонтролирующийОрган column
 * @method     ChildПредписания[]|ObjectCollection findByПодрядчик(int $Подрядчик) Return ChildПредписания objects filtered by the Подрядчик column
 * @method     ChildПредписания[]|ObjectCollection findByДатавыдачи(string $ДатаВыдачи) Return ChildПредписания objects filtered by the ДатаВыдачи column
 * @method     ChildПредписания[]|ObjectCollection findByПлановаядатаустранения(string $ПлановаяДатаУстранения) Return ChildПредписания objects filtered by the ПлановаяДатаУстранения column
 * @method     ChildПредписания[]|ObjectCollection findByФактическаядатаустранения(string $ФактическаяДатаУстранения) Return ChildПредписания objects filtered by the ФактическаяДатаУстранения column
 * @method     ChildПредписания[]|ObjectCollection findByТипзамечания(int $ТипЗамечания) Return ChildПредписания objects filtered by the ТипЗамечания column
 * @method     ChildПредписания[]|ObjectCollection findByПроект(int $Проект) Return ChildПредписания objects filtered by the Проект column
 * @method     ChildПредписания[]|ObjectCollection findByСтатусзаявкизавершение(int $СтатусЗаявкиЗавершение) Return ChildПредписания objects filtered by the СтатусЗаявкиЗавершение column
 * @method     ChildПредписания[]|ObjectCollection findByСтатусзаявкипросрочка(int $СтатусЗаявкиПросрочка) Return ChildПредписания objects filtered by the СтатусЗаявкиПросрочка column
 * @method     ChildПредписания[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ПредписанияQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ПредписанияQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Предписания', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildПредписанияQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildПредписанияQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildПредписанияQuery) {
            return $criteria;
        }
        $query = new ChildПредписанияQuery();
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
     * @return ChildПредписания|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Предписания object has no primary key');
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
        throw new LogicException('The Предписания object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Предписания object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Предписания object has no primary key');
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
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the КонтролирующийОрган column
     *
     * Example usage:
     * <code>
     * $query->filterByКонтролирующийорган(1234); // WHERE КонтролирующийОрган = 1234
     * $query->filterByКонтролирующийорган(array(12, 34)); // WHERE КонтролирующийОрган IN (12, 34)
     * $query->filterByКонтролирующийорган(array('min' => 12)); // WHERE КонтролирующийОрган > 12
     * </code>
     *
     * @param     mixed $�онтролирующийорган The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByКонтролирующийорган($�онтролирующийорган = null, $comparison = null)
    {
        if (is_array($�онтролирующийорган)) {
            $useMinMax = false;
            if (isset($�онтролирующийорган['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_КОНТРОЛИРУЮЩИЙОРГАН, $�онтролирующийорган['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�онтролирующийорган['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_КОНТРОЛИРУЮЩИЙОРГАН, $�онтролирующийорган['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_КОНТРОЛИРУЮЩИЙОРГАН, $�онтролирующийорган, $comparison);
    }

    /**
     * Filter the query on the Подрядчик column
     *
     * Example usage:
     * <code>
     * $query->filterByПодрядчик(1234); // WHERE Подрядчик = 1234
     * $query->filterByПодрядчик(array(12, 34)); // WHERE Подрядчик IN (12, 34)
     * $query->filterByПодрядчик(array('min' => 12)); // WHERE Подрядчик > 12
     * </code>
     *
     * @param     mixed $�одрядчик The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByПодрядчик($�одрядчик = null, $comparison = null)
    {
        if (is_array($�одрядчик)) {
            $useMinMax = false;
            if (isset($�одрядчик['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ПОДРЯДЧИК, $�одрядчик['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�одрядчик['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ПОДРЯДЧИК, $�одрядчик['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ПОДРЯДЧИК, $�одрядчик, $comparison);
    }

    /**
     * Filter the query on the ДатаВыдачи column
     *
     * Example usage:
     * <code>
     * $query->filterByДатавыдачи('2011-03-14'); // WHERE ДатаВыдачи = '2011-03-14'
     * $query->filterByДатавыдачи('now'); // WHERE ДатаВыдачи = '2011-03-14'
     * $query->filterByДатавыдачи(array('max' => 'yesterday')); // WHERE ДатаВыдачи > '2011-03-13'
     * </code>
     *
     * @param     mixed $�атавыдачи The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByДатавыдачи($�атавыдачи = null, $comparison = null)
    {
        if (is_array($�атавыдачи)) {
            $useMinMax = false;
            if (isset($�атавыдачи['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ДАТАВЫДАЧИ, $�атавыдачи['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�атавыдачи['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ДАТАВЫДАЧИ, $�атавыдачи['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ДАТАВЫДАЧИ, $�атавыдачи, $comparison);
    }

    /**
     * Filter the query on the ПлановаяДатаУстранения column
     *
     * Example usage:
     * <code>
     * $query->filterByПлановаядатаустранения('2011-03-14'); // WHERE ПлановаяДатаУстранения = '2011-03-14'
     * $query->filterByПлановаядатаустранения('now'); // WHERE ПлановаяДатаУстранения = '2011-03-14'
     * $query->filterByПлановаядатаустранения(array('max' => 'yesterday')); // WHERE ПлановаяДатаУстранения > '2011-03-13'
     * </code>
     *
     * @param     mixed $�лановаядатаустранения The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByПлановаядатаустранения($�лановаядатаустранения = null, $comparison = null)
    {
        if (is_array($�лановаядатаустранения)) {
            $useMinMax = false;
            if (isset($�лановаядатаустранения['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ПЛАНОВАЯДАТАУСТРАНЕНИЯ, $�лановаядатаустранения['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�лановаядатаустранения['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ПЛАНОВАЯДАТАУСТРАНЕНИЯ, $�лановаядатаустранения['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ПЛАНОВАЯДАТАУСТРАНЕНИЯ, $�лановаядатаустранения, $comparison);
    }

    /**
     * Filter the query on the ФактическаяДатаУстранения column
     *
     * Example usage:
     * <code>
     * $query->filterByФактическаядатаустранения('2011-03-14'); // WHERE ФактическаяДатаУстранения = '2011-03-14'
     * $query->filterByФактическаядатаустранения('now'); // WHERE ФактическаяДатаУстранения = '2011-03-14'
     * $query->filterByФактическаядатаустранения(array('max' => 'yesterday')); // WHERE ФактическаяДатаУстранения > '2011-03-13'
     * </code>
     *
     * @param     mixed $�актическаядатаустранения The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByФактическаядатаустранения($�актическаядатаустранения = null, $comparison = null)
    {
        if (is_array($�актическаядатаустранения)) {
            $useMinMax = false;
            if (isset($�актическаядатаустранения['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ФАКТИЧЕСКАЯДАТАУСТРАНЕНИЯ, $�актическаядатаустранения['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�актическаядатаустранения['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ФАКТИЧЕСКАЯДАТАУСТРАНЕНИЯ, $�актическаядатаустранения['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ФАКТИЧЕСКАЯДАТАУСТРАНЕНИЯ, $�актическаядатаустранения, $comparison);
    }

    /**
     * Filter the query on the ТипЗамечания column
     *
     * Example usage:
     * <code>
     * $query->filterByТипзамечания(1234); // WHERE ТипЗамечания = 1234
     * $query->filterByТипзамечания(array(12, 34)); // WHERE ТипЗамечания IN (12, 34)
     * $query->filterByТипзамечания(array('min' => 12)); // WHERE ТипЗамечания > 12
     * </code>
     *
     * @param     mixed $�ипзамечания The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByТипзамечания($�ипзамечания = null, $comparison = null)
    {
        if (is_array($�ипзамечания)) {
            $useMinMax = false;
            if (isset($�ипзамечания['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ТИПЗАМЕЧАНИЯ, $�ипзамечания['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�ипзамечания['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ТИПЗАМЕЧАНИЯ, $�ипзамечания['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ТИПЗАМЕЧАНИЯ, $�ипзамечания, $comparison);
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
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByПроект($�роект = null, $comparison = null)
    {
        if (is_array($�роект)) {
            $useMinMax = false;
            if (isset($�роект['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ПРОЕКТ, $�роект['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�роект['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_ПРОЕКТ, $�роект['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_ПРОЕКТ, $�роект, $comparison);
    }

    /**
     * Filter the query on the СтатусЗаявкиЗавершение column
     *
     * Example usage:
     * <code>
     * $query->filterByСтатусзаявкизавершение(1234); // WHERE СтатусЗаявкиЗавершение = 1234
     * $query->filterByСтатусзаявкизавершение(array(12, 34)); // WHERE СтатусЗаявкиЗавершение IN (12, 34)
     * $query->filterByСтатусзаявкизавершение(array('min' => 12)); // WHERE СтатусЗаявкиЗавершение > 12
     * </code>
     *
     * @param     mixed $�татусзаявкизавершение The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByСтатусзаявкизавершение($�татусзаявкизавершение = null, $comparison = null)
    {
        if (is_array($�татусзаявкизавершение)) {
            $useMinMax = false;
            if (isset($�татусзаявкизавершение['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_СТАТУСЗАЯВКИЗАВЕРШЕНИЕ, $�татусзаявкизавершение['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�татусзаявкизавершение['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_СТАТУСЗАЯВКИЗАВЕРШЕНИЕ, $�татусзаявкизавершение['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_СТАТУСЗАЯВКИЗАВЕРШЕНИЕ, $�татусзаявкизавершение, $comparison);
    }

    /**
     * Filter the query on the СтатусЗаявкиПросрочка column
     *
     * Example usage:
     * <code>
     * $query->filterByСтатусзаявкипросрочка(1234); // WHERE СтатусЗаявкиПросрочка = 1234
     * $query->filterByСтатусзаявкипросрочка(array(12, 34)); // WHERE СтатусЗаявкиПросрочка IN (12, 34)
     * $query->filterByСтатусзаявкипросрочка(array('min' => 12)); // WHERE СтатусЗаявкиПросрочка > 12
     * </code>
     *
     * @param     mixed $�татусзаявкипросрочка The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function filterByСтатусзаявкипросрочка($�татусзаявкипросрочка = null, $comparison = null)
    {
        if (is_array($�татусзаявкипросрочка)) {
            $useMinMax = false;
            if (isset($�татусзаявкипросрочка['min'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_СТАТУСЗАЯВКИПРОСРОЧКА, $�татусзаявкипросрочка['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($�татусзаявкипросрочка['max'])) {
                $this->addUsingAlias(ПредписанияTableMap::COL_СТАТУСЗАЯВКИПРОСРОЧКА, $�татусзаявкипросрочка['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ПредписанияTableMap::COL_СТАТУСЗАЯВКИПРОСРОЧКА, $�татусзаявкипросрочка, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildПредписания $�редписания Object to remove from the list of results
     *
     * @return $this|ChildПредписанияQuery The current query, for fluid interface
     */
    public function prune($�редписания = null)
    {
        if ($�редписания) {
            throw new LogicException('Предписания object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the Предписания table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ПредписанияTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ПредписанияTableMap::clearInstancePool();
            ПредписанияTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ПредписанияTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ПредписанияTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ПредписанияTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ПредписанияTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ПредписанияQuery
